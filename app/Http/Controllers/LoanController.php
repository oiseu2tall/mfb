<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Loan;
use Illuminate\Http\Request;
use Gate;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $loans = Loan::all();
        return view('loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('isAdmin')){
            abort(403,"Sorry, You don't have permission to create a loan stage");
        }
        return view('loans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Gate::allows('isAdmin')){
            abort(403,"Sorry, You don't have permission to create a loan stage");
        }
        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'duration' => 'required',
            'principal' => 'required',
            'interest' => 'required',
            'weekly_remittance' => 'required',
            'interest_rate' => 'required'
        ]);
        
        $loan = new Loan([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'duration' => $request->get('duration'),
            'principal' => $request->get('principal'),
            'interest' => $request->get('interest'),
            'total_savings' => $request->get('total_savings'),
            'weekly_savings' => $request->get('weekly_savings'),
            'weekly_remittance' => $request->get('weekly_remittance'),
            'interest_rate' => $request->get('interest_rate')
        ]);
        $loan->save();
        session()->flash('message', 'This Loan type has been created successfully');
        return redirect(route('loans.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        return view('loans.show', compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        if(!Gate::allows('isAdmin')){
            abort(403,"Sorry, You don't have permission to update a loan stage");
        }
        return view('loans.edit', compact('loan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        if(!Gate::allows('isAdmin')){
            abort(403,"Sorry, You don't have permission to update a loan stage");
        }
        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'duration' => 'required',
            'principal' => 'required',
            'interest' => 'required',
            'weekly_remittance' => 'required',
            'interest_rate' => 'required'
        ]);

            $loan->name = $request->name;
            $loan->description = $request->description;
            $loan->duration = $request->duration;
            $loan->principal = $request->principal;
            $loan->interest = $request->interest;
            $loan->total_savings = $request->total_savings;
            $loan->weekly_remittance = $request->weekly_remittance;
            $loan->weekly_savings = $request->weekly_savings;
            $loan->interest_rate = $request->interest_rate;
            $loan->save();
        session()->flash('message', 'This loan type has been updated successfully');
        return redirect(route('loans.show', $loan->id));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        if(!Gate::allows('isAdmin')){
            abort(403,"Sorry, You don't have permission to delete a loan stage");
        }
        $loan->delete();
        session()->flash('message', 'This loan type has been deleted successfully');
        return redirect(route('loans.index'));
    }
}
