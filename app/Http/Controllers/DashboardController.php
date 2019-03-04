<?php

namespace App\Http\Controllers;


use App\Account;
use App\Activity;
use App\Contact;
use App\AccountOpportunity;
use App\ContactOpportunity;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    function index(){
        return view('dashboard', [
            'users' => User::all()
        ]);
    }

    function search(Request $request){
        $search_in = $request->search_in;
        $search_by = $request->search_by;
        $search_data = $request->search_data;
        $data = null;
        if($search_in === 'Account'){

            if($search_by === 'Name'){
                $data = Account::where('name', '=', $search_data)->get();
            }elseif ($search_by === 'Phone'){
                $data = Account::where('main_number', '=', $search_data)->get();
            }elseif ($search_by === 'Email'){
                $data = Account::where('company_email', '=', $search_data)->get();
            }

        }elseif ($search_in === 'Contact'){

            if($search_by === 'Name'){
                $data = Contact::where('name', '=', $search_data)->get();
            }elseif ($search_by === 'Phone'){
                $data = Contact::where('main_number', '=', $search_data)->get();
            }elseif ($search_by === 'Email'){
                $data = Contact::where('company_email', '=', $search_data)->get();
            }

        }elseif ($search_in === 'Account Opportunity'){

            if($search_by === 'Name'){
                $data = AccountOpportunity::where('name', '=', $search_data)->get();
            }

        }elseif ($search_in === 'Contact Opportunity'){

            if($search_by === 'Name'){
                $data = ContactOpportunity::where('name', '=', $search_data)->get();
            }

        }elseif($search_in === 'Activity'){

            if($search_by === 'Name'){
                $data = Activity::where('activity', '=', $search_data)->get();
            }

        }

        return $data;
    }

    function getOpportunityData(Request $request){

        $month = $request->month;
        $PRD = $request->PRD;
        $type = $request->type;
        $user_id = $request->user_id;

        if($PRD === "sa" && $type === "a"){
//            $user = User::find($user_id);
            return AccountOpportunity::where('estimated_closing_month', '=', $month)->where('won', '=', 'won')->where('user_id', '=', $user_id)->get();

        }else if($PRD === "sa" && $type === "c"){

            return ContactOpportunity::where('estimated_closing_month', '=', $month)->where('won', '=', 'won')->where('user_id', '=', $user_id)->get();

        }else if($PRD === "pl" && $type === "a"){

            return AccountOpportunity::where('estimated_closing_month', '=', $month)->where('won', '=', 'in-progress')->where('user_id', '=', $user_id)->get();

        }else if($PRD === "pl" && $type === "c"){

            return ContactOpportunity::where('estimated_closing_month', '=', $month)->where('won', '=', 'in-progress')->where('user_id', '=', $user_id)->get();
        }else{
            return null;
        }
    }
}
