<?php

namespace App\Http\Controllers;

use App\Repayment;
use App\Credit;
use App\Customer;
use App\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RepaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$repayments = repayment::all();
       // return view('repayments.index', compact('repayments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view('repayments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'payment_date' => 'required',
            'installment' => 'required|numeric',
            'customer_id' => 'required|numeric',
            'loan_id' => 'required',
            'credit_id' => 'required'
            
        ]);
         
        $repayment = new Repayment([
            'payment_date' => $request->get('payment_date'),
            'installment' => $request->get('installment'),
            'savings' => $request->get('savings'),
            'extra_savings' => $request->get('extra_savings'),
            'customer_id' => $request->get('customer_id'),
            'loan_id' => $request->get('loan_id'),
            'credit_id' => $request->get('credit_id')

            ]);
        $repayment->save();
        session()->flash('message', 'This repayment has been created successfully');
        return redirect(route('customers.show', $repayment->customer_id));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Repayment  $repayment
     * @return \Illuminate\Http\Response
     */
    public function show(Repayment $repayment)
    {
        return view('repayments.show', compact('repayment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Repayment  $repayment
     * @return \Illuminate\Http\Response
     */
    public function edit(Repayment $repayment)
    {
        return view('repayments.edit', compact('repayment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Repayment  $repayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repayment $repayment)
    {
        //$loans = Loan::all('id', 'name');
        $this->validate($request, [
            'payment_date' => 'required',
            'installment' => 'required',
            'customer_id' => 'required|numeric',
            'loan_id' => 'required',
            'credit_id' => 'required'
           
                 ]);
        $repayment->payment_date = $request->payment_date;
        $repayment->installment = $request->installment;
        $repayment->savings = $request->savings;
        $repayment->extra_savings = $request->extra_savings;
        $repayment->customer_id = $request->customer_id;
        $repayment->loan_id = $request->loan_id;
        $repayment->credit_id = $request->credit_id;

        
        $repayment->save();
        session()->flash('message', "This Customer's Repayment has been updated successfully");
        return redirect(route('customers.show', $repayment->customer_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Repayment  $repayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repayment $repayment)
    {
        $repayment->delete();
        session()->flash('message', 'This repayment has been deleted successfully');
        //return redirect(route('repayments.index'));
        return back();
    }
}
