<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Group;
use App\Repayment;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


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
            //'image_name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

          //$imageName = time().'.'.request()->image->getClientOriginalExtension();
        $imageName = time().'.'.request()->image->getClientOriginalExtension();


          //$imagename = request()->file('image')->store('images');
            
           //$request->file('image')->storeAs('images', $request->customer()->id,

        request()->image->move(storage_path('/app/public/images'), $imageName);
        //request()->image->move(public_path('images'));
            
      /**
       Customer::create([

           
            'first_name' => $request->first_name,
            'surname' => $request->surname,
            'dateOfBirth' => $request->dateOfBirth,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'group_id' => $request->group_id,
            
            //'image_name' => $request->file('image')->hashName()
            //'image_name' => $request->file('image')->store('images'),
            //'image_name' => $request->$imageName
        ]);

        **/
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->surname = $request->surname;
        $customer->dateOfBirth = $request->dateOfBirth;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->group_id = $request->group_id;
        $customer->image_name = $imageName;

        $customer->save();

        
        

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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

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
