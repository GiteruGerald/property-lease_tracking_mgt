<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Property::latest()->get();
        return PropertyResource::collection(Property::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:40',
            'type'=>'required|string',
            'value'=>'required|numeric',
            'location'=>'required|numeric',
            // 'description'=>'string'
        ]);
        return Property::create([
            'name'=> $request['name'],
            'type'=> $request['type'],
            'value'=> $request['value'],
            'location_id'=> $request['location'],
            'description'=> $request['description'],

        ]);
        // $property = Property::create($request->validate());
        // return new PropertyResource($property); 


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return  ['message' => 'Property deleted'];

    }

}
