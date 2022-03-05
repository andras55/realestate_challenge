<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Rules\ExternalNumberRule;
use App\Rules\InternalNumberRule;
use App\Rules\BathroomRule;
use App\Rules\CountryRule;
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
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'real_estate_type' => ['required', Rule::in(['house', 'departament', 'land', 'commercial_ground'])],
                'street' => 'required',
                'external_number' => ['required', new ExternalNumberRule],
                'internal_number' => [
                    Rule::requiredIf(function () use ($request){
                        $ret = $request->real_estate_type;
                        return ($ret == 'departament' || $ret == 'commercial_ground');
                    }),
                    new InternalNumberRule
                ],
                'neighborhood' => 'required',
                'city' => 'required',
                'country' => ['required', new CountryRule],
                'rooms' => 'required',
                'bathrooms' => new BathroomRule($request->real_estate_type),
            ]);
            if ($validator->fails()) {
                return response()->json([$validator->errors()]);
            }
            else{
                $property = Property::create([
                    'name' => $request->name,
                    'real_estate_type' => $request->real_estate_type,
                    'street' => $request->street,
                    'external_number' => $request->external_number,
                    'internal_number' => $request->internal_number,
                    'neighborhood' => $request->neighborhood,
                    'city' => $request->city,
                    'country' => $request->country,
                    'rooms' => $request->rooms,
                    'bathrooms' => $request->bathrooms,
                    'comments' => $request->comments
                ]);
            }
            return response()->json([['message' => 'Property saved successfully'],$property]);            
        } catch (Exception $e) {
            return response()->json([['message' => $e->getMessage()]], 422);
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
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'real_estate_type' => ['required', Rule::in(['house', 'departament', 'land', 'commercial_ground'])],
                'street' => 'required',
                'external_number' => ['required', new ExternalNumberRule],
                'internal_number' => [
                    Rule::requiredIf(function () use ($request){
                        $ret = $request->real_estate_type;
                        return ($ret == 'departament' || $ret == 'commercial_ground');
                    }),
                    new InternalNumberRule
                ],
                'neighborhood' => 'required',
                'city' => 'required',
                'country' => ['required', new CountryRule],
                'rooms' => 'required',
                'bathrooms' => new BathroomRule($request->real_estate_type),
            ]);
            if ($validator->fails()) {
                return response()->json([$validator->errors()]);
            }
            else{
                $property = Property::find($id);
                if (isset($property)) {
                    $property->update([
                        'name' => $request->name,
                        'real_estate_type' => $request->real_estate_type,
                        'street' => $request->street,
                        'external_number' => $request->external_number,
                        'internal_number' => $request->internal_number,
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
