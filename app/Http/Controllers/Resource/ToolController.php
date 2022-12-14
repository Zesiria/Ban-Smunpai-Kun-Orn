<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\DBConnector;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dbConnector = new DBConnector();
        return view('tool',['tools' =>  $dbConnector->getTool()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tool_name' => ['min:2', 'max:30', 'string', 'required']
        ]);

        $tool_name = $request->tool_name;

        $dbConnector = new DBConnector();
        if($dbConnector->addTool($tool_name)){
            return redirect( route('tool.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dbConnector = new DBConnector();
        $tools = $dbConnector->getTool();

        return $tools[$id];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tool_id' => ['required'],
            'tool_name' => ['min:2', 'max:30', 'string', 'required']
        ]);

        $dbConnector = new DBConnector();

        $tool_id = $request->tool_id;
        $new_tool_name = $request->tool_name;

        if($tool_id != $id){
            return response()->json([
                "success" => false
            ]);
        }


        $dbConnector->updateTool($tool_id, $new_tool_name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
