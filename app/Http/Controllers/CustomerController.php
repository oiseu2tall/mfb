<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Customer;
use App\User;
use App\Group;
use App\Repayment;
use App\Credit;
use App\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Gate;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Pagination\Paginator;


class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all()->sortBy('surname');
        //$customers = Customer::paginate(3);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
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
            'card_number' => 'required',
            'guarantor_name' => 'required|min:3',
            'guarantor_address' => 'required|min:3',
            'guarantor_phone' => 'required|min:3',
            'address' => 'required|min:10',
            'surname' => 'required|min:3',
            'dateOfBirth' => 'required',
            'phone' => 'required|min:6',
            'group_id' => 'required',
            //'image_name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


//$filename = time().'.'.request()->image->getClientOriginalExtension();
$filename = time().'.jpg';

$image = $this->imagecreatefromjpegexif(request()->image);

imagejpeg($image, public_path('images/'.$filename), 60);

       /** 
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->middle_name = $request->middle_name;
        $customer->surname = $request->surname;
        $customer->card_number = $request->card_number;
        $customer->aka = $request->aka;
        $customer->dateOfBirth = $request->dateOfBirth;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->guarantor_name = $request->guarantor_name;
        $customer->guarantor_address = $request->guarantor_address;
        $customer->guarantor_phone = $request->guarantor_phone;
        $customer->group_id = $request->group_id;
        $customer->image_name = $filename;
    */

   $customer = new Customer([
            'first_name' => $request->get('first_name'),
            'middle_name' => $request->get('middle_name'),
            'surname' => $request->get('surname'),
            'aka' => $request->get('aka'),
            'dateOfBirth' => $request->get('dateOfBirth'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'guarantor_name' => $request->get('guarantor_name'),
            'guarantor_address' => $request->get('guarantor_address'),
            'guarantor_phone' => $request->get('guarantor_phone'),
            'card_number' => $request->get('card_number'),
            'group_id' => $request->get('group_id'),
            'image_name' => $filename,
        ]);


        $customer->save();
        session()->flash('message', 'The Customer has been created successfully');
        return redirect(route('customers.index'));
    }


private function imagecreatefromjpegexif($filename)
    {
        $img = imagecreatefromjpeg($filename);
        $exif = exif_read_data($filename);
        if ($img && $exif && isset($exif['Orientation']))
        {
            $ort = $exif['Orientation'];

            if ($ort == 6 || $ort == 5)
                $img = imagerotate($img, 270, null);
            if ($ort == 3 || $ort == 4)
                $img = imagerotate($img, 180, null);
            if ($ort == 8 || $ort == 7)
                $img = imagerotate($img, 90, null);

            if ($ort == 5 || $ort == 4 || $ort == 7)
                imageflip($img, IMG_FLIP_HORIZONTAL);
        }
        return $img;
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
        $groups = Group::all('id', 'name', 'user_id');
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
        
        if((!Gate::allows('isAdmin') && !Gate::allows('isManager')) || Auth::users()->id == $this->$customer->group->user_id){
            abort(403,"Sorry, You don't have permission to view this page");
        }


$this->validate($request, [
            'first_name' => 'required|min:3',
            'card_number' => 'required',
            'guarantor_name' => 'required|min:3',
            'guarantor_address' => 'required|min:3',
            'guarantor_phone' => 'required|min:3',
            'address' => 'required|min:10',
            'surname' => 'required|min:3',
            'dateOfBirth' => 'required',
            'phone' => 'required|min:6',
            'group_id' => 'required',
            //'image_name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

    if ($request->hasFile('image') && file_exists(public_path('images/'.$customer->image_name))) {
    //$oldphoto = public_path('images/'.$customer->image_name);
    unlink(public_path('images/'.$customer->image_name));
$filename = time().'.jpg';

$image = $this->imagecreatefromjpegexif(request()->image);

imagejpeg($image, public_path('images/'.$filename), 60);
$customer->image_name = $filename;
    }
elseif ($request->hasFile('image') && !file_exists(public_path('images/'.$customer->image_name))) {
    //$oldphoto = public_path('images/'.$customer->image_name);
   // unlink(public_path('images/'.$customer->image_name));
$filename = time().'.jpg';

$image = $this->imagecreatefromjpegexif(request()->image);

imagejpeg($image, public_path('images/'.$filename), 60);
$customer->image_name = $filename;
    }

        $customer->first_name = $request->first_name;
        $customer->middle_name = $request->middle_name;
        $customer->surname = $request->surname;
        $customer->card_number = $request->card_number;
        $customer->aka = $request->aka;
        $customer->dateOfBirth = $request->dateOfBirth;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->guarantor_name = $request->guarantor_name;
        $customer->guarantor_address = $request->guarantor_address;
        $customer->guarantor_phone = $request->guarantor_phone;
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
        unlink(public_path('images/'.$customer->image_name));
        $customer->delete();
        session()->flash('message', 'This customer has been deleted successfully');
        return redirect(route('customers.index'));
    }



}
