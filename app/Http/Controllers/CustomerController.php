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
        ]);


//$filename = time().'.'.request()->image->getClientOriginalExtension();
$filename = time().'.jpg';

$image = $this->imagecreatefromjpegexif(request()->image);

imagejpeg($image, storage_path('app/public/images/'.$filename), 60);

        
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->surname = $request->surname;
        $customer->dateOfBirth = $request->dateOfBirth;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->group_id = $request->group_id;
        $customer->image_name = $filename;

        $customer->save();

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
    // Compress image
private function compressimage($source, $destination, $quality) {

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source);

  elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source);

elseif ($info['mime'] == 'image/jpg') 
    $image = imagecreatefromjpg($source);

  elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);

elseif ($info['mime'] == 'image/svg') 
    $image = imagecreatefromsvg($source);

  imagejpeg($image, $destination, $quality);

}

**/



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
            //'image_name' => 'required',

        ]);
    
    $imageName = time().'.'.request()->image->getClientOriginalExtension();
    request()->image->move(storage_path('/app/public/images'), $imageName);


        $customer->first_name = $request->first_name;
        $customer->surname = $request->surname;
        $customer->email = $request->email;
        $customer->dateOfBirth = $request->dateOfBirth;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->group_id = $request->group_id;
            $customer->image_name = $imageName;

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
