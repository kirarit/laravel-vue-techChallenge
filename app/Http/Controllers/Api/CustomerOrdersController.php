<?php

namespace App\Http\Controllers\Api;

use App\Models\Fleet;
use Illuminate\Http\Request;
use App\Mail\OrderDispatched;
use App\Models\CustomerOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\CustomerOrderResource;
use App\Http\Requests\Api\CustomerOrderRequest;

class CustomerOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CustomerOrderResource(CustomerOrder::with(['customer', 'order', 'fleet'])->get());
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
    public function store(CustomerOrderRequest $request)
    {
        $customerOrder = CustomerOrder::create($request->only(['name', 'description', 'quantity']));

        return (new CustomerOrderResource($customerOrder))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customerOrder = CustomerOrder::with(['customer', 'order', 'fleet'])->where('id', $id)->first();
        $fleet = Fleet::select('id', 'name')->get();
        return response()->json([
            'customerOrder' => $customerOrder,
            'fleets' => $fleet,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerOrder  $customerOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerOrder $customerOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerOrderRequest $request, $id)
    {
        $customerOrder = CustomerOrder::with(['customer', 'fleet', 'order'])->where('id', $id)->first();
        $customerOrder->update($request->only(['status']));

        //send email to customer if order is dispatched
        if ($customerOrder->status == 'Dispatched') {
            Mail::to($customerOrder->customer->email)->send(new OrderDispatched($customerOrder));
        }
        //return
        return response()->json('Customer Orders Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerOrder  $customerOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerOrder $customerOrder)
    {
        $customerOrder->delete();
        return response(null, 204);
    }
}
