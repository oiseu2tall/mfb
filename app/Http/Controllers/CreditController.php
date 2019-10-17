<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Credit;
use App\Customer;
use App\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gate;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(!Gate::allows('isAdmin')){
            abort(403,"Sorry, You don't have permission to view this page");
        }
        $credits = credit::all();
        return view('credits.index', compact('credits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loans = Loan::all();
        //$customers = Customer::all('id', 'first_name', 'surname');
       //return view('credits.create', compact('loans'), compact('customers'));
        return view('credits.create', compact('loans'));
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
            'start_date' => 'required',
           //'end_date' => 'required',
            //'customer_id' => 'required|numeric',
            'loan_id' => 'required|numeric'
            
        ]);
        $enddate= Carbon::parse($request->get('start_date'))->addDays(168);
        //$y=  $enddate->addDays(168);
                $credit = new Credit([
            'start_date' => $request->get('start_date'),
            //'end_date' => $request->get('start_date')->addDays(30),
            'end_date' => $enddate,
            'customer_id' => $request->get('customer_id'),
            'loan_id' => $request->get('loan_id')
            ]);
        $credit->save();
        session()->flash('message', 'This Loan Request has been created successfully');
        session()->forget('customerid');
        return redirect(route('customers.show', $credit->customer_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Credit  $credit
     * @return \Illuminate\Http\Response
     */
    public function show(Credit $credit)
    {
        return view('credits.show', compact('credit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Credit  $credit
     * @return \Illuminate\Http\Response
     */
    public function edit(Credit $credit)
    {
        $loans = Loan::all('id', 'name');
        $customers = Customer::all('id', 'first_name');
        return view('credits.edit', compact('credit'), compact('loans'), compact('customers') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Credit  $credit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credit $credit)
    {
        $loans = Loan::all('id', 'name');
        $this->validate($request, [
            'start_date' => 'required',
            //'end_date' => 'required',
            //'customer_id' => 'required',
            'loan_id' => 'required|numeric'
                 ]);
        $enddate= Carbon::parse($request->get('start_date'))->addDays(168);
        
        $credit->start_date = $request->start_date;
        $credit->end_date = $enddate;
       // $credit->customer_id = $request->customer_id;
        $credit->loan_id = $request->loan_id;
        
        $credit->save();
        session()->flash('message', 'This Loan Request has been updated successfully');
        return redirect(route('credits.show', $credit->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Credit  $credit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credit $credit)
    {
        $credit->delete();
        session()->flash('message', 'This loan request has been deleted successfully');
        return redirect(route('credits.index'));
    }
}
