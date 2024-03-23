<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use App\Http\Requests\StorePaymentTypeRequest;
use App\Http\Requests\UpdatePaymentTypeRequest;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentList(Request $request)
    {
        $keywords = $request->input('keywords');
        $sortBy = $request->input('sortBy', 'id');
        $sortDirection = $request->input('sortDirection', 'desc');
    
        $query = PaymentType::orderBy($sortBy, $sortDirection);
    
        if (!empty($keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%');
            });
        }
    
        $paymentTypes = $query->paginate(5);
        return view ('admins.payments.index', compact('paymentTypes', 'keywords', 'sortBy', 'sortDirection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $data = [
            'name' => $request->input('name')
        ];
        PaymentType::create($data);
        return redirect()->route('payment.list')->with('store', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentType  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentType $id)
    {
        return view('admins.payments.edit', [
            'payment' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentTypeRequest  $request
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $payment = PaymentType::find($request->id);
        $payment->name = $request->name;
        $payment->save();

        return redirect()->route('payment.list')->with('update', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PaymentType::destroy($id);
        return redirect()->route('payment.list')->with('destroy', 'success');
    }
}
