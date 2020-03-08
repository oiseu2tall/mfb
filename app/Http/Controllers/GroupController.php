<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Group;
use App\User;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;

class GroupController extends Controller
{
   private function leader()
   {
    $group_leader = Customer::first()->where('group_leader')->equal($group->id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /**  if(!Gate::allows('isAdmin') && !Gate::allows('isManager')){
            abort(403,"Sorry, You don't have permission to view this page");
        }
        */
        $groups = Group::all()->sortBy('name');
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = User::all();
        return view('groups.create', compact('users'));
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
            'name' => 'required|min:3',
            'venue' => 'required|min:10',
            'meeting_day' => 'required',
            'user_id' => 'required',
            //'user_id.required' => 'this is my custom error message for required'
        ]);
        //$user = Auth::user();
        Group::create([
            'name' => $request->name,
            'venue' => $request->venue,
            'meeting_day' => $request->meeting_day,
            'user_id' => $request->user_id,
        ]);
        session()->flash('message', 'This group has been created successfully');
        return redirect(route('groups.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {   
        //$leaders = $group->customers->first()->where('group_leader', $group->id);
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {   
        $users = User::all();
        return view('groups.edit', compact('group'), compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {   /**
        if((!Gate::allows('isAdmin') && !Gate::allows('isManager')) || (!Gate::allows('isCashOfficer') && Auth::user()->id == $group->user_id)) {
            abort(403,"Sorry, You don't have permission to view this page");
        }
        */
        $this->validate($request, [
            'name' => 'required|min:3',
            'venue' => 'required|min:10',
            'meeting_day' => 'required',
            'user_id' => 'required'
        ]);

        $group->name = $request->name;
        $group->venue = $request->venue;
        $group->meeting_day = $request->meeting_day;
        $group->user_id = $request->user_id;
        $group->save();
        session()->flash('message', 'This group has been updated successfully');
        //return redirect()->back();
        return redirect(route('groups.show', $group->id));
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
        session()->flash('message', 'This group has been deleted successfully');
        return redirect(route('groups.index'));
    }



}
