<?php

namespace App\Http\Controllers;

use App\Account;
use App\AccountOpportunity;
use App\Activity;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    //

    function index(){
        $user_name = Session::get('user.name');
        return view('account', [
            'accounts' => Account::with('user')->where('national_account_manager', '=', $user_name)->get(),
            'my' => 'true',
            'all' => 'false'
        ]);
    }

    function allAccount(){
        return view('account', [
            'accounts' => Account::with('user')->get(),
            'my' => 'false',
            'all' => 'true'
        ]);
    }

    function details($id){
        return view('account_details', [
            'account' => Account::with('user')->find($id),
            'contacts' => Account::find($id)->contact,
            'opportunities' => Account::find($id)->opportunity,
            'note' => Account::find($id)->note,
            'note_histories' => Note::where('type', '=', 'account')->where('type_id', '=', $id)->get(),
            'activity_histories' => Activity::where('type', '=', 'account')->where('type_id', '=', $id)->get(),
            'current_user' => Session::get('user.id'),
            'current_user_type' => Session::get('user.type')
        ]);
    }

    function addAccount(Request $request){


        $account = new Account();

        $account->name = $request->input('name');
        $account->address = $request->input('address');
        $account->city = $request->input('city');
        $account->state = $request->input('state');
        $account->country = $request->input('country');
        $account->zipcode = $request->input('zipcode');
        $account->website = $request->input('website');
        $account->main_number = $request->input('main_number');
//        $account->company_email = $request->input('company_email');
        $account->main_point_of_contact = $request->input('main_point_of_contact');
        $account->billing_address = $request->input('billing_address');
        $account->billing_city = $request->input('billing_city');
        $account->billing_state = $request->input('billing_state');
        $account->billing_country = $request->input('billing_country');
        $account->billing_email = $request->input('billing_email');
        $account->billing_phone = $request->input('billing_phone');
        $account->account_development_plan = $request->input('account_development_plan');
        $account->national_account_manager = $request->input('national_account_manager');
        $account->user_id = $request->session()->get('user.id');
        $account->ISDR = $request->input('isdr');
        //$account->notes_and_comments = $request->input('notes_and_comments');
        $account->created_by = Session::get('user.id');

        $account->save();

        return redirect()->route('account');
    }

    function editAccount(Request $request){
        $account =Account::find($request->id);

        $account->name = $request->input('name');
        $account->address = $request->input('address');
        $account->city = $request->input('city');
        $account->state = $request->input('state');
        $account->country = $request->input('country');
        $account->zipcode = $request->input('zipcode');
        $account->website = $request->input('website');
        $account->main_number = $request->input('main_number');
//        $account->company_email = $request->input('company_email');
        $account->main_point_of_contact = $request->input('main_point_of_contact');
        $account->billing_address = $request->input('billing_address');
        $account->billing_city = $request->input('billing_city');
        $account->billing_state = $request->input('billing_state');
        $account->billing_country = $request->input('billing_country');
        $account->billing_email = $request->input('billing_email');
        $account->billing_phone = $request->input('billing_phone');
        $account->account_development_plan = $request->input('account_development_plan');
        $account->national_account_manager = $request->input('national_account_manager');
        $account->ISDR = $request->input('isdr');
        //$account->notes_and_comments = $request->input('notes_and_comments');

        $account->save();

        return redirect()->back();
    }

    function deleteAccount($id){

        if(Session::get('user.type') == 'admin'){
            $account = Account::find($id);
            $account->delete();

            return "Delete Success";
        }else{
            return "you are not authorised to delete";
        }

    }

    function addOpportunity(Request $request){
        $account_opportunity = new AccountOpportunity();

        $account_opportunity->account_id = $request->input('account_id');
        $account_opportunity->name = $request->input('name');
        $account_opportunity->online = $request->input('online');
        $account_opportunity->live = $request->input('live');
        $account_opportunity->hybrid = $request->input('hybrid');
        $account_opportunity->group = $request->input('group');
        $account_opportunity->course_name = $request->input('course_name');
//        $account_opportunity->amount = $request->input('amount');
        $account_opportunity->number_of_learners = $request->input('number_of_learners');
        $account_opportunity->proposal_amount = $request->input('proposal_amount');
        $account_opportunity->delivery_data = $request->input('delivery_data');
        $account_opportunity->payment_method = $request->input('payment_method');
        $account_opportunity->estimated_closing_date = $request->input('estimated_closing_date');
        $account_opportunity->estimated_closing_month = date("F", strtotime($request->input('estimated_closing_date')));
        $account_opportunity->estimated_closing_year = date("Y", strtotime($request->input('estimated_closing_date')));
        $account_opportunity->add_to_forecast = $request->input('add_to_forecast');
        $account_opportunity->TDR = $request->input('TDR');
        $account_opportunity->national_account_manager = $request->input('national_account_manager');
        $account_opportunity->ISDR = $request->input('ISDR');
        $account_opportunity->user_id = $request->session()->get('user.id');
        $account_opportunity->won = "in-progress";
        //$account_opportunity->notes_and_comments = $request->input('notes_and_comments');
        $account_opportunity->created_by = Session::get('user.id');

        $account_opportunity->save();

        return redirect()->back();

    }

    function updateOpportunityStatus(Request $request){
        $account_opportunity = AccountOpportunity::find($request->id);
        $account_opportunity->won = $request->value;
        $account_opportunity->save();
    }

    function duplicateAccountCheck($website){
        $account = Account::where('website', '=', $website)->first();
        if ($account === null) {
            return "false";
        }else{
            return "true";
        }
    }

    function addNotes(Request $request){

        $note = new Note();

        $note->notes_and_comments = $request->notes_and_comments;
        $note->type = $request->type;
        $note->type_id = $request->id;

        $note->save();

        $account = Account::find($request->id);
        $account->note_id = $note->id;
        $account->save();

        return redirect()->back();
    }

    function addActivity(Request $request){

        $activity = new Activity();

        $activity->activity = $request->activity;
        $activity->todays_date = $request->todays_date;
        $activity->followup_date = $request->followup_date;
        $activity->status = "pending";
        $activity->type = $request->type;
        $activity->type_id = $request->id;
        $activity->user_id = $request->session()->get('user.id');

        $activity->save();

        $account = Account::find($request->id);
        $account->activity_id = $activity->id;
        $account->save();

        return redirect()->back();
    }
}
