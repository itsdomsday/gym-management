<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Membership;

class MembershipController extends Controller
{
    public function memberships(){
        return view('memberships')->with('memberships', Membership::all());
    }

    public function create_membership(){
        return view('add-membership');
    }

    public function edit_membership($id){
        $membership = Membership::find($id);

        return view('update-membership')->with('membership', $membership);
    }

    public function store_membership(Request $request){
        $membership = new Membership();
        $membership->membership_type = $request->membership_type;
        $membership->membership_price = $request->membership_price;
        $membership->save();

        return redirect()->route('memberships')->with('success', 'New membership added!');
    }

    public function update_membership(Request $request){
        $membership = Membership::find($request->id);
        $membership->membership_type = $request->membership_type;
        $membership->membership_price = $request->membership_price;
        $membership->save();

        return redirect()->route('index')->with('success', 'Member updated!');
    }

    public function delete_membership($id){
        $membership = Membership::find($id);
        $membership->delete();

        return redirect()->route('memberships')->with('success', 'Membership deleted.');
    }
}
