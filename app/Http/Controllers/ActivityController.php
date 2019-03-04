<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    function index(){
        return view('activity', [
            'pending_activities' => Activity::where('status', '=', 'pending')->with('account')->with('contact')->with('user')->get(),
            'complete_activities' => Activity::where('status', '=', 'complete')->with('account')->with('contact')->with('user')->get()
        ]);

//        return response()->json(Activity::where('status', '=', 'complete')->with('account')->with('contact')->with('user')->get());
    }

    function updateStatus(Request $request){
        $activity = Activity::find($request->id);

        $activity->status = "complete";
        $activity->save();

        return redirect()->back();
    }
}
