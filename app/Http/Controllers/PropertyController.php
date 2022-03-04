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
        return response()->json([['message' => 'List of properties'],$list]);
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
        try {
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
        } catch (Exception $e) {
            return response()->json([['message' => $e->getMessage()]]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $property = Property::find($id);
            if (isset($property)) {
                return response()->json($property);
            }
            else{
                return response()->json([['message' => 'Record: '.$id.' doesn\'t exist']]);    
            }             
        }
        catch (Exception $e) {
            return response()->json([['message' => $e->getMessage()]]);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
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
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $property = Property::find($id);
            if (isset($property)) {
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
            else{
                return response()->json([['message' => 'Record: '.$id.' doesn\'t exist']]);
            }
           
        } catch (Exception $e) {
            return response()->json([['message' => $e->getMessage()]]);            
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $property = Property::find($id);
            if (isset($property)) {
                $property->delete();
                return response()->json([['message' => 'Property deleted successfully'],$property]); 
            }
            else{
                return response()->json([['message' => 'Record: '.$id.' doesn\'t exist']]);
            }
           
        } catch (Exception $e) {
            return response()->json([['message' => $e->getMessage()]]);            
        }
    }
}
