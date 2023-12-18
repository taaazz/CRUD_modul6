<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleBrandRequest;
use App\Http\Requests\UpdateVehicleBrandRequest;

use App\Http\Resources\VehicleBrandCollection as ResourcesVehicleBrandCollection;
use App\Http\Resources\VehicleBrandResource as ResourcesVehicleBrandResource;


use Exception;

use App\Models\VehicleBrand;
use Illuminate\Http\Request;

class VehicleBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $queryData = VehicleBrand::all();
            $formattedDatas = new ResourcesVehicleBrandCollection($queryData);
            return response()->json([
                "message" => "success",
                "data" => $formattedDatas
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleBrandRequest $request)
    {
        $validatedRequest = $request->validated();
        try {
            $queryData = VehicleBrand::create($validatedRequest);
            $formattedDatas = new ResourcesVehicleBrandResource($queryData);
            return response()->json([
                "message" => "success",
                "data" => $formattedDatas
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $queryData = VehicleBrand::findOrFail($id);
            $formattedDatas =  new ResourcesVehicleBrandResource($queryData);
            return response()->json([
                "message" => "success",
                "data" => $formattedDatas
            ], 200);
        } catch (Exception $e) {
            return response()->jon($e->getMessage(), 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleBrandRequest $request, string $id)
    {
        $validatedRequest = $request->validated();
        try {
            $queryData = VehicleBrand::findOrFail($id);
            $queryData->update($validatedRequest);
            $queryData->save();
            $formattedDatas = new ResourcesVehicleBrandResource($queryData);
            return response()->json([
                "message" => "success",
                "data" => $formattedDatas

            ], 200);
        } catch (Exception $e) {
            return response()->jon($e->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $queryData = VehicleBrand::findOrFail($id);
            $queryData->delete();
            $formattedDatas = new ResourcesVehicleBrandResource($queryData);
            return response()->json([
                "message" => "success",
                "data" => $formattedDatas

            ], 200);
        } catch (Exception $e) {
            return response()->jon($e->getMessage(), 400);
        }
    }


    public function indexWithCategory()
    {
        try {
            $response = VehicleBrand::findAllWithCategory();
            return response()->json([
                "message" => "success",
                "data" => $response

            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    // Method untuk mencari berdasarkan category_id
    public function findByCategoryId($category_id)
    {
        try {
            $response = VehicleBrand::findByCategoryId($category_id);

            if ($response->isEmpty()) {
                return response()->json([
                    "message" => "No products found for the given category_id"
                ], 404);
            }

            return response()->json([
                "message" => "success",
                "data" => $response
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }
}
