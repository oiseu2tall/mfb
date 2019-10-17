<?php

namespace App\Http\Controllers;
use App\Customer;
use App\User;
use App\Group;
use Illuminate\Http\Request;
use Gate;
use Auth;

class UserController extends Controller
{
       public function index() {
      
   }
   

   public function show($id) {
      
   }

   public function edit(User $user)
    {
        if(!Gate::allows('isAdmin')){
            abort(403,"Sorry, You don't have permission to update user");
        }
        return view('users.edit', compact('user'));
    }
/**
protected function validator(Request $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'first_name' => ['required', 'string', 'max:50'],,
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
            'first_name' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'max:11'],
        ]);
    }
**/


    public function update(Request $data, User $user)
    {
       if(!Gate::allows('isAdmin')){
            abort(403,"Sorry, You don't have permission to update user");
        }
        $this->validate($data, [
            'name' => 'required|string|max:50',
            'first_name' => 'required|string|max:50',
            //'email' => 'required|string|email|max:255|unique:users',
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
            'email' => 'required|string|email|max:255',
            'role' => 'required',
            'first_name' => 'required|string|max:50',
            'phone' => 'required|max:11',
        ]);

            $user->name = $data->name;
            $user->first_name = $data->first_name;
            $user->middle_name = $data->middle_name;
            $user->phone = $data->phone;
            $user->email = $data->email;
            $user->role = $data->role;
        $user->save();
        session()->flash('message', 'This user has been updated successfully');
        return redirect(route('home'));
    }

   public function destroy(User $user) {
      
      if(!Gate::allows('isAdmin')){
            abort(403,"Sorry, You don't have permission to update user");
        }
      $user->delete();
        session()->flash('message', 'This User has been deleted successfully');
        return redirect(route('home'));

   }
}
