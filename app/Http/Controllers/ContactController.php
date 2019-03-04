<?php

namespace App\Http\Controllers;

use App\Account;
use App\Activity;
use App\Contact;
use App\ContactOpportunity;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    function index(){
        $user_name = Session::get('user.name');
        return view('contact', [
            'contacts' =>  $contacts = Contact::with('account')->with('user')->where('national_account_manager', '=', $user_name)->get(),
            'accounts' => $accounts = Account::all(),
            'my' => 'true',
            'all' => 'false'
        ]);
    }

    function allContact(){
        return view('contact', [
            'contacts' => $contacts = Contact::with('account')->with('user')->get(),
            'accounts' => $accounts = Account::all(),
            'my' => 'false',
            'all' => 'true'
        ]);
    }

    function details($id){
        return view('contact_details', [
            'contact' => Contact::find($id),
            'opportunities' => Contact::find($id)->opportunity,
            'account' => Contact::find($id)->account,
            'accounts' => Account::all(),
            'note' => Contact::find($id)->note,
            'note_histories' => Note::where('type', '=', 'contact')->where('type_id', '=', $id)->get(),
            'activity_histories' => Activity::where('type', '=', 'contact')->where('type_id', '=', $id)->get(),
            'current_user' => Session::get('user.id'),
            'current_user_type' => Session::get('user.type')
        ]);
    }

    function addContact(Request $request){
        $contact = new Contact();

        $contact->account_id = $request->input('account_id');
        $contact->name = $request->input('name');
        $contact->address = $request->input('address');
        $contact->city = $request->input('city');
        $contact->state = $request->input('state');
        $contact->zipcode = $request->input('zipcode');
        $contact->country = $request->input('country');
        $contact->cell_number = $request->input('cell_number');
        $contact->main_number = $request->input('main_number');
        $contact->company_email = $request->input('company_email');
        $contact->job_title = $request->input('job_title');
        $contact->recent_enrollment = $request->input('recent_enrollment');
        $contact->opportunity_details = $request->input('opportunity_details');
        $contact->national_account_manager = $request->input('national_account_manager');
        $contact->ISDR = $request->input('isdr');
        $contact->user_id = $request->session()->get('user.id');
        //$contact->notes_and_comments = $request->input('notes_and_comments');
        $contact->created_by = Session::get('user.id');

        $contact->save();

        return redirect()->route('contact');
    }

    function editContact(Request $request){
        $contact = Contact::find($request->id);

        $contact->account_id = $request->input('account_id');
        $contact->name = $request->input('name');
        $contact->address = $request->input('address');
        $contact->city = $request->input('city');
        $contact->state = $request->input('state');
        $contact->country = $request->input('country');
        $contact->zipcode = $request->input('zipcode');
        $contact->cell_number = $request->input('cell_number');
        $contact->main_number = $request->input('main_number');
        $contact->company_email = $request->input('company_email');
        $contact->job_title = $request->input('job_title');
        $contact->recent_enrollment = $request->input('recent_enrollment');
        $contact->opportunity_details = $request->input('opportunity_details');
        $contact->national_account_manager = $request->input('national_account_manager');
        $contact->ISDR = $request->input('isdr');
        //$contact->notes_and_comments = $request->input('notes_and_comments');

        $contact->save();

        return redirect()->back();
    }

    function deleteContact($id){

        if(Session::get('user.type') == 'admin'){
            $contact = Contact::find($id);
            $contact->delete();

            return "Delete Success";
        }else{
            return "you are not authorised to delete";
        }

    }

    function addOpportunity(Request $request){
        $contact_opportunity = new ContactOpportunity();

        $contact_opportunity->contact_id = $request->input('contact_id');
        $contact_opportunity->name = $request->input('name');
        $contact_opportunity->online = $request->input('online');
        $contact_opportunity->live = $request->input('live');
        $contact_opportunity->hybrid = $request->input('hybrid');
        $contact_opportunity->group = $request->input('group');
        $contact_opportunity->course_name = $request->input('course_name');
//        $account_opportunity->amount = $request->input('amount');
        $contact_opportunity->number_of_learners = $request->input('number_of_learners');
        $contact_opportunity->proposal_amount = $request->input('proposal_amount');
        $contact_opportunity->delivery_data = $request->input('delivery_data');
        $contact_opportunity->payment_method = $request->input('payment_method');
        $contact_opportunity->estimated_closing_date = $request->input('estimated_closing_date');
        $contact_opportunity->estimated_closing_month = date("F", strtotime($request->input('estimated_closing_date')));
        $contact_opportunity->estimated_closing_year = date("Y", strtotime($request->input('estimated_closing_date')));
        $contact_opportunity->add_to_forecast = $request->input('add_to_forecast');
        $contact_opportunity->TDR = $request->input('TDR');
        $contact_opportunity->national_account_manager = $request->input('national_account_manager');
        $contact_opportunity->ISDR = $request->input('ISDR');
        $contact_opportunity->user_id = $request->session()->get('user.id');
        $contact_opportunity->won = "in-progress";
        //$account_opportunity->notes_and_comments = $request->input('notes_and_comments');
        $contact_opportunity->created_by = Session::get('user.id');

        $contact_opportunity->save();

        return redirect()->back();

    }

    function updateOpportunityStatus(Request $request){
        $contact_opportunity = ContactOpportunity::find($request->id);
        $contact_opportunity->won = $request->value;
        $contact_opportunity->save();
    }

    function duplicateContactCheck($email){
        $contact = Contact::where('company_email', '=', $email)->first();
        if ($contact === null) {
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

        $contact = Contact::find($request->id);
        $contact->note_id = $note->id;
        $contact->save();

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

        $contact = Contact::find($request->id);
        $contact->activity_id = $activity->id;
        $contact->save();

        return redirect()->back();
    }
}
