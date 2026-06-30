<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request): JsonResponse
    {
        return response()->json(['message' => 'Order created successfully'], Response::HTTP_OK);
    }
}
