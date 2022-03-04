<?php

namespace App\Http\Controllers;

use App\Models\Property;
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
        $list = Property::list();
        return response()->json($list);
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
        $property = Property::create([
            'name' => $request->name,
            'real_estate_type' => $request->real_estate_type,
            'street' => $request->street,
            'external_number' => $request->external_number,
            'internal_number' => isset($request->internal_number) ? $request->internal_number : '',
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'country' => $request->country,
            'rooms' => $request->rooms,
            'bathrooms' => $request->bathrooms,
            'comments' => $request->comments
        ]);

        return response()->json([['message' => 'Property saved successfully'],$property]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return response()->json($property);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $property->update([
            'name' => $request->name,
            'real_estate_type' => $request->real_estate_type,
            'street' => $request->street,
            'external_number' => $request->external_number,
            'internal_number' => isset($request->internal_number) ? $request->internal_number : '',
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'country' => $request->country,
            'rooms' => $request->rooms,
            'bathrooms' => $request->bathrooms,
            'comments' => $request->comments
        ]);
        return response()->json([['message' => 'Property updated successfully'],$property]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
