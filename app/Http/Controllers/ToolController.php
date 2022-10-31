<?php

namespace App\Http\Controllers;

use App\Models\DBConnector;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index(){
        $dbConnector = new DBConnector();
        return $dbConnector->getCourse();
    }

    public function store(Request $request){
        $request->validate([
            'tool_name' => ['min:2', 'max:30', 'string', 'required']
        ]);

        $tool_name = $request->course_name;

        $dbConnector = new DBConnector();
        $dbConnector->addTool($tool_name);
    }

    public function update(Request $request){
        $request->validate([
            'tool_id' => ['required'],
            'tool_name' => ['min:2', 'max:30', 'string', 'required']
        ]);

        $dbConnector = new DBConnector();

        try {
            $tool_id = $dbConnector->getToolById($request->tool_id);
        } catch (\Exception) {
            throw new \Exception("This tool is not exist.");
        }

        $new_tool_name = $request->tool_name;

        $dbConnector->updateTool($tool_id, $new_tool_name);
    }
}
