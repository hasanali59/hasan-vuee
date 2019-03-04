<?php

namespace App\Http\Controllers;

use App\Account;
use App\AccountOpportunity;
use App\Contact;
use App\ContactOpportunity;
use App\File;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class OpportunityController extends Controller
{

    function index(){
        return view('opportunity', [
            'account_opportunities' => AccountOpportunity::with('account')->with('user')->get(),
            'contact_opportunities' => ContactOpportunity::with('contact')->with('user')->get(),
        ]);
    }

    function accountOpportunityDetails($id){
        return view('account_opportunity_details', [
            'opportunity' => AccountOpportunity::with('user')->find($id),
            'account' => AccountOpportunity::find($id)->account,
            'accounts' => Account::all(),
            'note' => AccountOpportunity::find($id)->note,
            'note_histories' => Note::where('type', '=', 'account-opportunity')->where('type_id', '=', $id)->get(),
            'files' => AccountOpportunity::find($id)->file,
            'current_user' => Session::get('user.id'),
            'current_user_type' => Session::get('user.type')
        ]);
    }

    function editAccountOpportunity(Request $request){
        $account_opportunity = AccountOpportunity::find($request->id);

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
//        $account_opportunity->notes_and_comments = $request->input('notes_and_comments');

        $account_opportunity->save();

        return redirect()->back();
    }

    function contactOpportunityDetails($id){
        return view('contact_opportunity_details', [
            'opportunity' => ContactOpportunity::find($id),
            'contact' => ContactOpportunity::find($id)->contact,
            'contacts' => Contact::all(),
            'note' => ContactOpportunity::find($id)->note,
            'note_histories' => Note::where('type', '=', 'contact-opportunity')->where('type_id', '=', $id)->get(),
            'files' => ContactOpportunity::find($id)->file,
            'current_user' => Session::get('user.id'),
            'current_user_type' => Session::get('user.type')
        ]);
    }

    function editContactOpportunity(Request $request){
        $contact_opportunity = ContactOpportunity::find($request->id);

        $contact_opportunity->contact_id = $request->input('contact_id');
        $contact_opportunity->name = $request->input('name');
        $contact_opportunity->online = $request->input('online');
        $contact_opportunity->live = $request->input('live');
        $contact_opportunity->hybrid = $request->input('hybrid');
        $contact_opportunity->group = $request->input('group');
        $contact_opportunity->course_name = $request->input('course_name');
//        $contact_opportunity->amount = $request->input('amount');
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
//        $contact_opportunity->notes_and_comments = $request->input('notes_and_comments');

        $contact_opportunity->save();

        return redirect()->back();
    }

    function deleteAccountOpportunity($id){
        if(Session::get('user.type') == 'admin'){
            $account_opportunity = AccountOpportunity::find($id);
            $account_opportunity->delete();

            return "Delete Success";
        }else{
            return "you are not authorised to delete";
        }
    }

    function deleteContactOpportunity($id){
        if(Session::get('user.type') == 'admin'){
            $contact_opportunity = ContactOpportunity::find($id);
            $contact_opportunity->delete();

            return "Delete Success";
        }else{
            return "you are not authorised to delete";
        }
    }

    function addNotes(Request $request){

        $note = new Note();

        if($request->type == "account-opportunity"){
            $note->notes_and_comments = $request->notes_and_comments;
            $note->type = $request->type;
            $note->type_id = $request->id;

            $note->save();

            $account_opportunity = AccountOpportunity::find($request->id);
            $account_opportunity->note_id = $note->id;
            $account_opportunity->save();
        }else if($request->type == "contact-opportunity"){
            $note->notes_and_comments = $request->notes_and_comments;
            $note->type = $request->type;
            $note->type_id = $request->id;

            $note->save();

            $contact_opportunity = ContactOpportunity::find($request->id);
            $contact_opportunity->note_id = $note->id;
            $contact_opportunity->save();
        }

        return redirect()->back();
    }

    function addAccountFile(Request $request){
        $file = $request->file('file');
        $file_hash_name = $file->hashName();
        $file_name = $file->getClientOriginalName();

        Storage::putFile('public/uploads/account_opportunity',$file);

        $file = new File();
        $file->file_name = $file_name;
        $file->file_hash_name = $file_hash_name;
        $file->type_name = "account_opportunity";
        $file->type_id = $request->id;
        $file->save();

        return redirect()->back();
    }

    function addContactFile(Request $request){

        $file = $request->file('file');
        $file_hash_name = $file->hashName();
        $file_name = $file->getClientOriginalName();

        Storage::putFile('public/uploads/contact_opportunity',$file);

        $file = new File();
        $file->file_name = $file_name;
        $file->file_hash_name = $file_hash_name;
        $file->type_name = "contact_opportunity";
        $file->type_id = $request->id;
        $file->save();

        return redirect()->back();
    }

    function getAccountWonOpportunity($name){
        return AccountOpportunity::where('national_account_manager', '=', $name)->where('won', '=', 'won')->get();
    }

    function getContactWonOpportunity($name){
        return ContactOpportunity::where('national_account_manager', '=', $name)->where('won', '=', 'won')->get();
    }

    function getAccountPipeline($name){
        return AccountOpportunity::where('national_account_manager', '=', $name)->where('won', '=', 'in-progress')->get();
    }

    function getContactPipeline($name){
        return ContactOpportunity::where('national_account_manager', '=', $name)->where('won', '=', 'in-progress')->get();
    }
}
