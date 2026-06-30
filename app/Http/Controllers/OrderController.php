<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request): JsonResponse
    {
        $order = Order::create($request->validated());

        foreach ($request->validated('items', []) as $product) {
            $order->items()->create($product);
        }

        return response()->json(new OrderResource($order), Response::HTTP_OK);
    }
}
