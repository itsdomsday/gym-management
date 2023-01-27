<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index(){
        return view('index')->with('members', Member::all());
    }

    public function create(){
        return view('add-member');
    }

    public function edit($id){
        $member = Member::find($id);

        return view('update-member')->with('member', $member);
    }

    public function store(Request $request){
        $member = new Member();
        $member->name = $request->name;
        $member->email = $request->email;
        $member->membership_expiration = $request->membership_expiration;
        $member->trainer_id = $request->trainer_id;
        $member->save();

        return redirect()->route('index')->with('success', 'New member added!');
    }

    public function update(Request $request){
        $member = Member::find($request->id);
        $member->name = $request->name;
        $member->email = $request->email;
        $member->membership_expiration = $request->membership_expiration;
        $member->trainer_id = $request->trainer_id;
        $member->save();

        return redirect()->route('index')->with('success', 'Member updated!');
    }

    public function delete($id){
        $member = Member::find($id);
        $member->delete();

        return redirect()->route('index')->with('success', 'Member deleted.');
    }

    public function view_trainer($id){
        $member = Member::where('trainer_id', $id);
        return view('view-trainer')->with('trainers', $member);
    }
}
