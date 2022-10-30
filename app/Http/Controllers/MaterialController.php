<?php

namespace App\Http\Controllers;

use App\Models\DBConnector;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index(){
        $materials = new DBConnector();
        return $materials->getMaterial();
    }

    public function store(Request $request){
        $request->validate([
            'material_name' => ['min:2', 'max:30', 'string', 'required'],
            'quantity' => ['min:0', 'max:999', 'numberic' , 'required'],
            'minimum_value' => ['min:0', 'max:999', 'numberic']
        ]);

        $material_name = $request->material_name;
        $quantity = $request->quantity;
        if($request->has('minimum_value'))
            $minimum_value = $request->minimum_value;
        else
            $minimum_value = 0;

        $dbConnector = new DBConnector();
        $dbConnector->addMaterial($material_name, $quantity, $minimum_value);
    }

    public function update(Request $request){
        $request->validate([
            'material_id' => ['required'],
            'material_name' => ['min:2', 'max:30', 'string'],
            'quantity' => ['min:0', 'max:999', 'numberic'],
            'minimum_value' => ['min:0', 'max:999', 'numberic']
        ]);

        $dbConnector = new DBConnector();
        if(!$request->has('material_id'))
            throw new \Exception("No material_id provided.");
        try {
            $material_id = $dbConnector->getMaterialById($request->material_id);
        } catch (\Exception) {
            throw new \Exception("This course is not exist.");
        }

        $new_material_name = $request->material_name;
        $new_quantity = $request->quantity;
        $new_minimum_value = $request->minimum_value;

        $dbConnector->updateMaterial($material_id, $new_material_name, $new_quantity, $new_minimum_value);
    }

}
