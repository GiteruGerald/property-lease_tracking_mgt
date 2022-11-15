<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaseRequest;
use App\Http\Resources\LeaseResource;
use App\Lease;
use App\Property;
use Illuminate\Http\Request;

class LeaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function store(LeaseRequest $request)
    {
        $lease = Lease::create($request->validated());

        return new LeaseResource($lease);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function show(Lease $lease)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function update(LeaseRequest $request, Lease $lease)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lease  $lease
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lease $lease)
    {
        //
    }

    public function getlease($id){
        $lease = Lease::with('property')->where('property_id',$id)->get();

        // return response()->json([
        //     'lease'=> $lease
        // ]);
        return json_encode($lease);

    } 
    
  
}
