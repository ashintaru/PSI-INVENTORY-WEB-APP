<?php

namespace App\Http\Controllers;

use App\Models\batching;
use App\Models\cars;
use App\Models\Log;
use App\Models\tool;
use App\Models\damage;
use App\Models\invoce;
use App\Models\inventory;
use Illuminate\Http\Request;
use App\Models\carstatus;
use Exception;
use App\Models\blockings;
use App\Models\recieving;
use App\Models\set_tool;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Carbon;


class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('data.index');
    }

    public function unitindex(){
        $id=Auth()->user()->id;
        if(Cache::has("searchUnitData-".$id)){
            $search = Cache::get("searchUnitData-".$id);
            $data = cars::where('status',null)->with(['batch'])->where('vehicleidno',$search)->get();
            return view('data.recieve',['data'=>$data,'start'=>'','end'=>'']);
        }else{
            if(Cache::has('startUnitData-'.$id)&&Cache::has('endUnitData-'.$id)){
                $start = Carbon::parse(Cache::get('startUnitData-'.$id))->toDateTimeString();
                $end = Carbon::parse(Cache::get('endUnitData-'.$id))->toDateTimeString();
                $data = cars::where('status',null)->with(['batch'])->whereBetween('created_at',[$start, $end])->paginate(25);
                // return dd($start);
                return view('data.recieve',['data'=>$data,'start'=>Cache::get('startUnitData-'.$id),'end'=>Cache::get('endUnitData-'.$id)]);
            }else{
                $data = cars::where('status',null)->with(['batch'])->paginate(25);
                return view('data.recieve',['data'=>$data,'start'=>'','end'=>'']);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( Request $req, cars $cars)
    {
        $validated = $req->validate([
            'search' => 'required|min:17',
        ]);
        $search = $req->search;
        $data = cars::
        where('cars.vehicleidno', $search)
        ->get();
        // return back->with()
        return view('data.recieve',['data'=>$data]);
    }

    public function unitBatching(Request $request){

        $userid = Auth::user()->id;
        // return dd($request->unitid);
        batching::create(
            ['vehicleidno'=>$request->unitid,'userid'=>$userid]
        );
        return redirect()->route('unit-list')->with(['success'=>'have been transfered in batch']);
    }

    public function view($id = null,$action = 'null')
    {
        $data = cars::findOrFail($id);
        return view('data.carprofile',['car'=>$data]);
    }

    public function resetSearchRawData(){
        $id=Auth()->user()->id;
        Cache::forget("searchRawData-".$id);
        return redirect()->route('raw-data');
    }

    public function searchRawData(Request $request){
        $id=Auth()->user()->id;
        switch ($request['process']) {
            case '1':
                    if (Cache::has("searchRawData-".$id)) {
                        Cache::forget("searchRawData-".$id);
                        Cache::put("searchRawData-".$id,$request['search']);
                    }else{
                        Cache::put("searchRawData-".$id,$request['search']);
                    }
                break;
            case '2':
                    $this->resetSearchRawData();
                break;
        }
        return redirect()->route('raw-data');
    }

    public function rawData(){
        $id=Auth()->user()->id;
        if(Cache::has("searchRawData-".$id)){
            $search = Cache::get("searchRawData-".$id);
            $data = cars::where('vehicleidno',$search)->get();
            return view('data.rawdata',['data'=>$data,'start'=>'','end'=>'']);
        }else{
            if(Cache::has('startRawData-'.$id)&&Cache::has('endRawData-'.$id)){
                $start = Carbon::parse(Cache::get('startRawData-'.$id))->toDateTimeString();
                $end = Carbon::parse(Cache::get('endRawData-'.$id))->toDateTimeString();
                $data = cars::whereBetween('created_at',[$start, $end])->paginate(25);
                // return dd($start);
                return view('data.rawdata',['data'=>$data,'start'=>Cache::get('startRawData-'.$id),'end'=>Cache::get('endRawData-'.$id)]);
            }else{
                $data = cars::paginate(25);
                return view('data.rawdata',['data'=>$data,'start'=>'','end'=>'']);
            }
        }

    }

    public function setFilter(Request $request){
        $validated = $request->validate([
            'start' => 'required',
            'end' => 'required',
        ]);
        switch ($request['process']) {
            case 'Filter':
                $this->filterRawData($request['start'],$request['end']);
                break;
            default:
                $this->resetFilter();
                break;
        }
        return redirect()->route('raw-data');
    }

    public function resetFilter(){
        $id=Auth()->user()->id;
        Cache::forget('startRawData-'.$id);
        Cache::forget('endRawData-'.$id);
    }

    public function filterRawData($start , $end)
    {
        $id=Auth()->user()->id;
        Cache::forget("searchRawData-".$id);
        if(Cache::has('startRawData-'.$id)&&Cache::has('endRawData-'.$id)){
            Cache::forget('startRawData-'.$id);
            Cache::forget('endRawData-'.$id);

            Cache::put('startRawData-'.$id, $start);
            Cache::put('endRawData-'.$id, $end);
        }else{
            Cache::put('startRawData-'.$id, $start);
            Cache::put('endRawData-'.$id, $end);
        }
    }

    public function setFilterUnitList(Request $request){
        $validated = $request->validate([
            'start' => 'required',
            'end' => 'required',
        ]);
        switch ($request['process']) {
            case 'Filter':
                $this->filterUnitList($request['start'],$request['end']);
                break;
            default:
                $this->resetFilterUnit();
                break;
        }
        return redirect()->route('unit-list');
    }

    public function resetFilterUnit(){
        $id=Auth()->user()->id;

        Cache::forget('startUnitData-'.$id);
        Cache::forget('endUnitData-'.$id);
        // Cache::flush();
    }

    public function filterUnitList($start , $end)
    {
        $id=Auth()->user()->id;
        // Cache::forget("searchRawData-".$id);
        if(Cache::has('startUnitData-'.$id)&&Cache::has('endUnitData-'.$id)){
            Cache::forget('startUnitData-'.$id);
            Cache::forget('endUnitData-'.$id);

            Cache::put('startUnitData-'.$id, $start);
            Cache::put('endUnitData-'.$id, $end);
        }else{
            Cache::put('startUnitData-'.$id, $start);
            Cache::put('endUnitData-'.$id, $end);
        }
    }

    public function resetSearchUnitData(){
        $id=Auth()->user()->id;
        Cache::forget("searchUnitData-".$id);
        return redirect()->route('unit-list');
    }

    public function searchUnitData(Request $request){
        $id=Auth()->user()->id;
        switch ($request['process']) {
            case '1':
                    if (Cache::has("searchUnitData-".$id)) {
                        Cache::forget("searchUnitData-".$id);
                        Cache::put("searchUnitData-".$id,$request['search']);
                    }else{
                        Cache::put("searchUnitData-".$id,$request['search']);
                    }
                break;
            case '2':
                    $this->resetSearchUnitData();
                break;
        }
        return redirect()->route('unit-list');
    }


    public function approve( $carid = null,Request $request)
    {
       try {
            $car = cars::with('status')->findOrFail($carid);
            $result = ($car->status->hasloosetool == 1 && $car->status->hassettool == 1 && $car->status->hasdamage == 1 )?true : false;
            if($result){
                $validated = $request->validate([
                    'status' => 'required',
                ]);
                if(!$validated) {
                    return redirect()->back()->withErrors($validated);
                }else{
                    $inputs = $request->all();
                    $result = ($inputs['status'] == 1 ) ? 1 : 0 ;
                    $car->status->havebeenchecked = 1;
                    $car->status->havebeenpassed = $result;
                    $car->status->update();
                    $mesage = ($result)?"have been passed and approved and now it will be moved to the Good storage by":"have been failed and disapproved and now will be moved to the bad storage for furhter inspection";
                    $this->checkinventory($car,$result);
                    Log::create([
                        'idNum'=>$carid,
                        'logs'=>'Car VI#'. ' '. $carid .' '.$mesage.' '. $request->user()->name
                    ]);

                    return redirect()->route('show-profile',$car->id)->with(['success' => 'success:: the Car '.$carid .' has been moved in the virtual storage....']);
                }
            }
            else{
                return redirect()->route('show-profile',$car->id)->with(['msg' => 'Error:: the Car '.$carid .' has been not moved in the virtual storage due to an error pls check all he required form....']);
            }

        } catch (Exception $error) {
            //throw $th;
            return redirect()->route('show-profile',$car->id)->with(['msg' => $error->getMessage()]);
        }
    }

    public function checkinvoice( cars $car){
        if(invoce::where('vehicleidno',$car->vehicleidno)->exists()){
            $invoice = invoce::where('vehicleidno',$car->vehicleidno)->first();
            $invoice->status = 0;
            $invoice->update();
        }else{
            invoce::create([
                'vehicleid'=>$car->id,
                'vehicleidno'=>$car->vehicleidno,
                'status'=>0,
            ]);

        }

    }
    public function  checkinventory(cars $car , $status){
        if(inventory::where('vehicleidno',$car->vehicleidno)->exists()){
            $inventory = inventory::where('vehicleidno',$car->vehicleidno)->first();
            $inventory->invstatus = $status;
            $inventory->update();
        }else{
            inventory::create([
                'vehicleid'=>$car->id,
                'vehicleidno'=>$car->vehicleidno,
                'invstatus'=>$status,
            ]);
            // return dd($car->vehicleidno);
        }
    }

    public function editloosetool($id = null){
        $tools = tool::findOrFail($id);
        return response()->json($tools);
    }
    public function showcarprofile($id){
        $cars = cars::findorFail($id);
        return response()->json($cars);
    }
    public function editcarprofile($id){
        $cars = cars::findorFail($id);
        return response()->json($cars);
    }


    public function updateBlockings( Request $request , $id = null ){
        $validated = $request->validate([
            'blockings'=> 'required',
        ]);
        $car = cars::findOrFail($id);
        if($car->blockings==null){
            $car->blockings = $request->blockings;
            $car->update();
            $blocks = blockings::findOrFail($request->blockings);
            $blocks->blockstatus=1;
            $blocks->update();
        }else{
            $oldBlocking = $car->blockings;
            $car->blockings = $request->blockings;
            $car->update();
            $oldblocks = blockings::findOrFail($oldBlocking);
            $oldblocks->blockstatus=0;
            $oldblocks->update();
            $newblocks = blockings::findOrFail($request->blockings);
            $newblocks->blockstatus=1;
            $newblocks->update();
        }
        return back()->with(['success'=>'Success:: the car have been update properly... ']);
    }
    public function updatecardetails(Request $request, $id = null){
        $validated = $request->validate([
            'mmpcmodelcode'=> 'required',
            'mmpcmodelyear'=> 'required|numeric|min:2000|max:3000',
            'mmpcoptioncode'=> 'required',
            'extcolorcode'=> 'required',
            'modeldescription'=> 'required',
            'exteriorcolor'=> 'required',
            'csno'=> 'required',
            'bilingdate'=> 'required',
            'vehicleidno'=> 'required',
            'engineno'=> 'required',
            'productioncbunumber'=>'required',
            'bilingdocuments'=> 'required',
            'vehiclestockyard'=> 'required',
        ]);

        $inputs = $request->all();

        $modelcode = $inputs['mmpcmodelcode'];
        $modelyear = $inputs['mmpcmodelyear'];
        $captioncode = $inputs['mmpcoptioncode'];
        $colorcode = $inputs['extcolorcode'];
        $description = $inputs['modeldescription'];
        $exteriorcolor = $inputs['exteriorcolor'];
        $csno = $inputs['csno'];
        $bilingdate = $inputs['bilingdate'];
        $vehicleidno = $inputs['vehicleidno'];
        $engineno = $inputs['engineno'];
        $productionnumber = $inputs['productioncbunumber'];
        $billingdocuments = $inputs['bilingdocuments'];
        $vehiclestockyard = $inputs['vehiclestockyard'];

        $car = cars::findorFail($id);
        $car->mmpcmodelcode = $modelcode;
        $car->mmpcmodelyear = $modelyear;
        $car->mmpcoptioncode = $captioncode;
        $car->extcolorcode = $colorcode;
        $car->modeldescription = $description;
        $car->exteriorcolor = $exteriorcolor;
        $car->csno  =$csno;
        $car->bilingdate = $bilingdate;
        $car->vehicleidno = $vehicleidno;
        $car->engineno  = $engineno;
        $car->productioncbunumber = $productionnumber;
        $car->bilingdocuments = $billingdocuments;
        $car->vehiclestockyard = $vehiclestockyard;
        $car->update();
        return back()->with(['success'=>'Success:: the car have been update properly... ']);
    }
    public function submitcardamage(Request $request , $id = null){

    }


    public function editdamgecar($id = null){
        $damage = damage::findorFail($id);
        return view('edit-car-damage',['data'=>$damage]);
    }

    public function editcarstatus($id = null){
        $carstatus = carstatus::where('vehicleidno',$id)->first();
        return view('edit-car-status',['data'=>$carstatus]);
    }

    public function defaultloosetool($carid){
        // $loosetool = loos
        $tool = tool::where('vehicleidno',$carid)->first();
        if(empty($tool)){
            return tool::create([
                'vehicleidno'=>$carid,
                'ownermanual'=>0,
                'warantybooklet'=>0,
                'key'=>0,
                'remotecontrol'=>0,
                'others'=>0
            ]);
        }else{
            return null;
        }
    }
    public function defaulttools($carid){
        $tools = set_tool::where('vehicleidno',$carid)->first();
        if(empty($tools)){
            set_tool::create([
                'vehicleidno'=>$carid,
                'toolbag'=>1,
                'tirewrench'=>1,
                'jack'=>1,
                'jackhandle'=>1,
                'openwrench'=>1,
                'towhook'=>1,
                'slottedscrewdriver'=>1,
                'philipsscrewdriver'=>1,
                'wheels'=>1,
                'cigarettelighter'=>1,
                'wheelcap'=>4,
                'sparetire'=>1,
                'antena'=>1,
                'mating'=>1,
                'other'=>1,
            ]);
        }else{
            return null;
        }
    }

    public function defaultdamage($carid){
        $damage = damage::where('vehicleidno',$carid)->first();
        // return dd(empty($damage));
        if(empty($damage)){
              damage::create(
                [
                    'vehicleidno'=>$carid,
                    'dents'=>0,
                    'dings'=>0,
                    'scratches'=>0,
                    'paintdefects'=>0,
                    'damage'=>0,
                    'other'=>0,
                    'remark'=>"no damage at all"
                ]
            );
        }else{
            return null;
        }
    }

    public function defaultapprove($carid){

        $this->defaultloosetool($carid);
        $this->defaulttools($carid);
        $this->defaultdamage($carid);
        $car = cars::findOrFail($carid);
        $receiving = recieving::findOrFail($carid);
        inventory::create(
            [
                'vehicleidno'=>$receiving->vehicleidno,
            ]
        );
        $car->status = 2;
        $car->update();
        $receiving->delete();
        return redirect()->route('recive')->with(['success' => 'success:: UPDATE PROPERLY....']);
    }

    public function updatecarstatus(Request $request , $carid = null){
        try {
            switch (request()->approved) {
                case "1":
                    $car = recieving::findOrFail($carid);
                    inventory::create(
                        [
                            'mmpcmodelcode'=>$car->mmpcmodelcode,
                            'mmpcmodelyear'=>$car->mmpcmodelyear,
                            'mmpcoptioncode'=>$car->mmpcoptioncode,
                            'extcolorcode'=>$car->extcolorcode,
                            'modeldescription'=>$car->modeldescription,
                            'exteriorcolor'=>$car->exteriorcolor,
                            'csno'=>$car->csno,
                            'tag'=>$car->tag,
                            'bilingdate'=>$car->bilingdate,
                            'vehicleidno'=>$car->vehicleidno,
                            'engineno'=>$car->engineno,
                            'productioncbunumber'=>$car->productioncbunumber,
                            'bilingdocuments'=>$car->bilingdocuments,
                            'vehiclestockyard'=>$car->vehiclestockyard,
                            'blockings'=>$car->blockings,
                            'receiveBy'=>$car->receiveBy,
                            'dateIn'=>$car->dateIn,
                            'dateEncode'=>$car->dateEncode
                        ]
                    );
                    $car->delete();
                    return redirect()->route('recive')->with(['success' => 'success:: UPDATE PROPERLY....']);
                    break;
                case "2":
                    $car = inventory::findOrFail($carid);
                    recieving::create(
                        [
                            'mmpcmodelcode'=>$car->mmpcmodelcode,
                            'mmpcmodelyear'=>$car->mmpcmodelyear,
                            'mmpcoptioncode'=>$car->mmpcoptioncode,
                            'extcolorcode'=>$car->extcolorcode,
                            'modeldescription'=>$car->modeldescription,
                            'exteriorcolor'=>$car->exteriorcolor,
                            'csno'=>$car->csno,
                            'tag'=>$car->tag,
                            'bilingdate'=>$car->bilingdate,
                            'vehicleidno'=>$car->vehicleidno,
                            'engineno'=>$car->engineno,
                            'productioncbunumber'=>$car->productioncbunumber,
                            'bilingdocuments'=>$car->bilingdocuments,
                            'vehiclestockyard'=>$car->vehiclestockyard,
                            'blockings'=>$car->blockings,
                            'receiveBy'=>$car->receiveBy,
                            'dateIn'=>$car->dateIn,
                            'dateEncode'=>$car->dateEncode
                        ]
                    );
                    $car->delete();
                    return redirect()->route('show-inventory')->with(['success' => 'success:: UPDATE PROPERLY....']);
                    break;
                default:
                    return dd('magic');
                    return redirect()->back()->with(['msg' => 'Error:: the Car '.$carid .' has been not moved in the virtual storage due to an error pls check all he required form....']);
                    break;
            }
        } catch (Exception $error) {
            return redirect()->back()->with(['msg' => $error->getMessage()]);
        }
    }

    // public function preinvoice($description){

    //        if(invoicecount::where('modeldescription',$description)->exists()){
    //             $invoice = invoicecount::where('modeldescription',$description)->first();
    //             $id = $invoice->id;
    //             $invoice->count = $invoice->count + 1;
    //             $invoice->update();
    //             return $id;
    //         }else{
    //             $invoice = DB::table('invoicecounts')->insertGetId(
    //                 [ 'modeldescription' => $description ,'count'=>1]
    //             );
    //             return $invoice;
    //         }
    // }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cars $cars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cars $cars)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cars $cars)
    {
        //
    }

}
