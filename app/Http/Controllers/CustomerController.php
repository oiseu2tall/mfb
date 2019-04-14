<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Group;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all('id', 'name');
       return view('customers.create', compact('groups'));
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
            'first_name' => 'required|min:3',
            'address' => 'required|min:10',
            'surname' => 'required|min:3',
            'dateOfBirth' => 'required',
            'phone' => 'required|min:6',
            'group_id' => 'required',

        ]);


        Customer::create([
            'first_name' => $request->first_name,
            'surname' => $request->surname,
            'dateOfBirth' => $request->dateOfBirth,
            'phone' => $request->phone,
            'address' => $request->address,
            'group_id' => $request->group_id
        ]);
        return redirect(route('customers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $groups = Group::all('id', 'name');
        //$groups = Group::where('Group.id=$customer->group_id');
        return view('customers.show', compact('customer'), compact('groups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $groups = Group::all('id', 'name');
        return view('customers.edit', compact('customer'),compact('groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        
$this->validate($request, [
            'first_name' => 'required|min:3',
            'address' => 'required|min:10',
            'surname' => 'required|min:3',
            'dateOfBirth' => 'required',
            'phone' => 'required|min:6',
            'group_id' => 'required',

        ]);
        $customer->first_name = $request->first_name;
        $customer->surname = $request->surname;
        $customer->email = $request->email;
        $customer->dateOfBirth = $request->dateOfBirth;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->group_id = $request->group_id;
        $customer->save();
        session()->flash('message', 'This customer has been updated successfully');
        //return redirect()->back();
        return redirect(route('customers.show', $customer->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        session()->flash('message', 'This customer has been deleted successfully');
        return redirect(route('customers.index'));
    }
    
}
