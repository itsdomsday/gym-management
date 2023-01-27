<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;

class TrainerController extends Controller
{
    public function trainers(){
        return view('trainers')->with('trainers', Trainer::all());
    }

    public function create_trainer(){
        return view('add-trainer');
    }

    public function edit_trainer($id){
        $trainer = Trainer::find($id);

        return view('update-trainer')->with('trainer', $trainer);
    }

    public function store_trainer(Request $request){
        $trainer = new Trainer();
        $trainer->name = $request->name;
        $trainer->email = $request->email;
        $trainer->specialization = $request->specialization;
        $trainer->phone = $request->phone;
        $trainer->save();

        return redirect()->route('trainers')->with('success', 'New trainer added!');
    }

    public function update_trainer(Request $request){
        $trainer = Trainer::find($request->id);
        $trainer->name = $request->name;
        $trainer->email = $request->email;
        $trainer->specialization = $request->specialization;
        $trainer->phone = $request->phone;
        $trainer->save();

        return redirect()->route('trainers')->with('success', 'Trainer updated!');
    }

    public function delete_trainer($id){
        $trainer = Trainer::find($id);
        $trainer->delete();

        return redirect()->route('trainers')->with('success', 'Trainer deleted.');
    }
}
