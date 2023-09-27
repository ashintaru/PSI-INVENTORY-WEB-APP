<?php

namespace App\Http\Controllers;

use Spatie\Health\Checks\Checks\DatabaseCheck;
use Illuminate\Http\Request;
use App\Models\blocks as bloke;
use App\Models\blockings;
use Exception;
use Illuminate\Http\Resources\Json\JsonResource;

class blocks extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = bloke::with('blockings')->get();
        return view('blocks.blocks',['data'=>$data]);
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
        try {
            $input = $request->all();
            $validate = $request->validate([
                'blocks'=>'required'
            ]);
            bloke::create([
                'blockname'=>$input['blocks'],
                'status'=>0
            ]);
            return redirect()->back()->with(['success'=>"save copletely"]);
        } catch (Exception $th) {
            //throw $th;
            return redirect()->back()->with(['msg'=>$th]);
        }
    }

    public function fetchBlocks($id = null)
    {
        $block = bloke::findOrFail($id);
        $data = blockings::where('blockId',$block->id)->where('blockstatus',0)->get();
        return response()->json($data);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
