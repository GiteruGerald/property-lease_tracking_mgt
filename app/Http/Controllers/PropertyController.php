<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Http\Resources\PropertyResource;
use App\Property;
use Intervention\Image\Image;

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
    public function store(PropertyRequest $request)
    {
        $property = Property::create($request->validated());

        if ($request->image) {
            $name = time() . '.' . explode('/', explode(
                ':',
                substr($request->image, 0, strpos($request->image, ';'))
            )[1])[1];

            \Image::make($request->image)->save(public_path('img/property/') . $name);
            $property->update(['image' => $name]);

            // $currentPhoto = public_path('img/property/') . $name;
            // if (file_exists($currentPhoto)) {
            //     @unlink($currentPhoto);
            // }
        }
        return new PropertyResource($property);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return new PropertyResource($property);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, Property $property)
    {
        $property->update($request->validated());


        return new PropertyResource($property);
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


      
    public function getPropertyByType(Request $request){

        $query = Property::query();

        if($f = $request->input('filter')){
            $query->where('type', 'like', '%' . $f.'%');
        }
        return $query->get();
        // return response()->json([
        //     'property'=>$properties
        // ]);
    } 

    public function searchProperty(Request $request){

        $query = Property::query();
        if($s = $request->input('s')){
            $query->where('name', 'like', '%' . $s.'%')
            ->orWhere('description', 'like', '%' . $s.'%')
            ->orWhere('type', 'like', '%' . $s.'%');
        }
        return $query->get();
    }
}
