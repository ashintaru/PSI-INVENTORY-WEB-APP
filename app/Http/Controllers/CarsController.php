<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\Log;
use App\Models\tool;

use Illuminate\Http\Request;
use App\Models\carstatus;
use Exception;
use Redirect;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = cars::join('carstatus','carstatus.vehicleidno','=','cars.vehicleidno')
        ->paginate(25);
        // return dd($data);
        return view('recieve',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        $data = cars::where('vehicleidno', $search)
        ->first();
        return view('searchResult',['data'=>$data]);


    }
    public function view($id = null)
    {
        

        $data = cars::where('cars.vehicleidno', $id)
        ->join('carstatus','carstatus.vehicleidno','=','cars.vehicleidno')
        ->first();

        $tools = tool::where('vehicleidno',$id)->get();
        $logs = Log::where('idNum',$id)->get();

        // return dd(json_decode($tools,true) );
        return view('viewcar',['car'=>$data,'log'=>$logs,'tool'=>$tools]);
    }
    public function approve($carid = null,Request $request)
    {

        try {
            //code...
            
            $car = carstatus::where('vehicleidno',$carid)->first();
            $car->havebeenstored = 1;
            $car->update();

            Log::create([
                'idNum'=>$carid,
                'logs'=>'Car VI#'. ' '. $carid .' have been approved and moved to the storage by  '. $request->user()->name
            ]);
    


            return redirect()->route('show-profile',$carid)->with(['success' => 'success:: the Car '.$carid .' has been moved in the virtual storage....']);
    
        } catch (Exception $error) {
            //throw $th;
            return redirect()->route('show-profile',$carid)->with(['msg' => $error->getMessage()]);
        }
    
        // return dd($car);

    }
    public function submitlooseitem($carid = null,Request $request)
    {

        try {
            //code...
            
        

            $inputs = $request->all();

            if(($request->has('key') && $request->keyvalue == null)|| ( $request->has('other') && $request->othervalue == null)){
                return redirect()->route('show-profile',$carid)->withErrors(['msg'=>'the user should provide ']);
            }else{
                $manual = ($request->has('manual'))?$inputs['manual']:false;
                $waranty = ($request->has('waranty'))?$inputs['waranty']:false; 
                $waranty = ($request->has('waranty'))?$inputs['waranty']:false;  
                $keyvalue = ($request->has('key'))?$inputs['keyvalue']:false;
                $remote = ($request->has('remote'))?$inputs['remote']:false;            
                $othervalue = ($request->has('other'))?$inputs['othervalue']:false;

                tool::create([
                    'vehicleidno'=>$carid,
                    'ownermanual'=>$manual,	
                    'warantybooklet'=>$waranty,	
                    'key'=>$keyvalue,	
                    'remotecontrol'=>$remote,
                    'others'=>$othervalue	
                ]);

                Log::create([ 
                    'idNum'=>$carid,
                    'logs'=>'Car VI#'. ' '. $carid .' have been checked the loose tools by '. $request->user()->name
                ]);

                $car = carstatus::where('vehicleidno',$carid)->first();
                $car->hasloosetool = 1;
                $car->update();
        
            }              
          
            // return dd($key);
             
            



            return redirect()->route('show-profile',$carid)->with(['success' => 'success:: the Car '.$carid .' has been moved in the virtual storage....']);
    
        } catch (Exception $error) {
            //throw $th;
            return redirect()->route('show-profile',$carid)->with(['msg' => $error->getMessage()]);
        }
    
        // return dd($car);

    }


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
    public function delete(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

}
