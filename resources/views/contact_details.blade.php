@extends('layouts.layout')

@section('title', 'Accounts')

@section('content')
    <div class="container">
        <div class="card" style="margin: 30px 0">
            <div class="card-header">
                {{$contact->name}}
            </div>
            <div class="card-body">
                <a href="/contact" class="btn btn-info">Back</a>

                @if($current_user_type == "admin")
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit">Edit</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-opportunity">Add Opportunity</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-note">Add Note</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-activity">Add Activity</button>
                    <button onclick="confirmDelete()" class="btn btn-info">Delete</button>
                @elseif($current_user_type == "user" and $current_user == $contact->created_by)
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit">Edit</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-opportunity">Add Opportunity</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-note">Add Note</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-activity">Add Activity</button>
                @endif
                <br>

                <label style="margin-top: 15px">Account:</label> <a href="/account/details/{{$account->id}}">{{$account->name}}</a><br>
                <label>Address:</label> {{$contact->address}}<br>
                <label>City:</label> {{$contact->city}}<br>
                <label>State:</label> {{$contact->state}}<br>
                <label>Country:</label> {{$contact->country}}<br>
                <label>Zip Code:</label> {{$contact->zipcode}}<br>
                <label>cell_number:</label> {{$contact->cell_number}}<br>
                <label>Main Number:</label> {{$contact->main_number}} <br>
                <label>Company Email:</label> {{$contact->company_email}}<br>
                <label>Job Title:</label> {{$contact->job_title}}<br>
                <label>Recent Enrollment:</label> {{$contact->recent_enrollment}}<br>
                <label>Opportunity Details:</label> {{$contact->opportunity_details}}<br>
                <label>National Account Manager:</label> <a href="/viewprofile/{{$contact['user']->id}}">{{$contact['user']->name}}</a><br>
                <label>ISDR:</label> {{$contact->ISDR}}<br>
                <label>Notes And Comments:</label> @if(!empty($note->notes_and_comments)) {{$note->notes_and_comments}} @endif<br>
                <a href="#" data-toggle="modal" data-target="#view-note">View History</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Related Opportunities
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Closing Date</th>
                    </tr>
                    @foreach($opportunities as $opportunity)
                        <tr>
                            <td> <a href="/opportunity/contact/details/{{$opportunity->id}}">{{$opportunity->name}}</a> </td>
                            <td>{{$opportunity->proposal_amount}}</td>
                            <td>{{$opportunity->estimated_closing_date}}</td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Contact</h4>
                </div>
                <div class="modal-body">
                    <form action="/contact/edit" class="register-form" method="post">
                        @csrf

                        <input type="hidden" value="{{$contact->id}}" name="id">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Account</label>
                                    <select class="form-control" name="account_id">
                                        @foreach($accounts as $account)
                                            @if($account->id == $contact->account_id)
                                                <option value="{{$account->id}}" selected="selected">{{$account->name}}</option>
                                            @else
                                                <option value="{{$account->id}}">{{$account->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$contact->name}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea type="text" class="form-control" name="address" required>{{$contact->address}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" value="{{$contact->city}}" required>
                                </div>

                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control" name="state" value="{{$contact->state}}" required>
                                </div>

                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" name="country" value="{{$contact->country}}" required>
                                </div>

                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input type="text" class="form-control" name="zipcode" value="{{$account->zipcode}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cell Number</label>
                                    <input type="text" class="form-control" name="cell_number" value="{{$contact->cell_number}}" required>
                                </div>

                                <div class="form-group">
                                    <label>Main Number</label>
                                    <input type="text" class="form-control" name="main_number" value="{{$contact->main_number}}" required>
                                </div>

                                <div class="form-group">
                                    <label>Company Email</label>
                                    <input type="email" class="form-control" name="company_email" value="{{$contact->company_email}}" required>
                                </div>

                                <div class="form-group">
                                    <label>Job Title</label>
                                    <input type="text" class="form-control" name="job_title" value="{{$contact->job_title}}" required>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Recent Enrollment</label>
                                    <textarea type="text" class="form-control" name="recent_enrollment" required>{{$contact->recent_enrollment}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Opportunity Details</label>
                                    <textarea type="text" class="form-control" name="opportunity_details" required>{{$contact->opportunity_details}}</textarea>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>National Account Manager</label>
                                    <input type="text" class="form-control" name="national_account_manager" value="{{$contact->national_account_manager}}" required>
                                </div>

                                <div class="form-group">
                                    <label>ISDR</label>
                                    <input type="text" class="form-control" name="isdr" value="{{$contact->ISDR}}">
                                </div>
                            </div>
                        </div>

                        <hr>

                        {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label>Notes And Comments</label>--}}
                                    {{--<textarea type="text" class="form-control" name="notes_and_comments">{{$contact->notes_and_comments}}</textarea>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-opportunity" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <form action="/contact/add-opportunity" class="register-form" method="post">
                        @csrf

                        <input type="hidden" value="{{$contact->id}}" name="contact_id">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input type="text" class="form-control"  name="name" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Online ?*</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" name="online" value="1">YES
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="online" value="0">NO
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Live ?*</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" name="live" value="1">YES
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="live" value="0">NO
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Hybrid ?*</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" name="hybrid" value="1">YES
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="hybrid" value="0">NO
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Group ?*</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" name="group" value="1">YES
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="group" value="0">NO
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Course Name*</label>
                                    <input type="text" class="form-control"  name="course_name" required>
                                </div>
                            </div>

                            {{--<div class="col-md-3">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label>Amount</label>--}}
                                    {{--<input type="text" class="form-control"  name="amount" required>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Number Of Learners*</label>
                                    <input type="text" class="form-control"  name="number_of_learners" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Proposal Amount*</label>
                                    <input type="text" class="form-control"  name="proposal_amount" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Delivery Data*</label>
                                    <input type="date" class="form-control"  name="delivery_data" required>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Payment Method*</label>
                                    <input type="text" class="form-control"  name="payment_method" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Estimated Closing Date*</label>
                                    <input type="date" class="form-control"  name="estimated_closing_date" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Add To Forecast ?*</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" name="add_to_forecast" value="1">YES
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="add_to_forecast" value="0">NO
                                    </label>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>TDR</label><br>
                                    <select name="TDR">
                                        <option value="yes">YES</option>
                                        <option value="no">NO</option>
                                        <option value="pending">PENDING</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>National Account Manager</label>
                                    <input type="text" class="form-control"  name="national_account_manager" value="{{Session::get('user.name')}}" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ISDR</label>
                                    <input type="text" class="form-control"  name="ISDR" >
                                </div>
                            </div>
                        </div>

                        {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label>Notes And Comments</label>--}}
                                    {{--<textarea type="text" class="form-control" name="notes_and_comments" ></textarea>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-note" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Note</h4>
                </div>
                <div class="modal-body">
                    <form action="/contact/add-notes" class="register-form" method="post">
                        @csrf

                        <input type="hidden" value="{{$contact->id}}" name="id">
                        <input type="hidden" value="contact" name="type">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Notes And Comments</label>
                                    <textarea type="text" class="form-control" name="notes_and_comments" required></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="view-note" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Notes And Comments</th>
                            <th>Created At</th>
                        </tr>
                        @foreach($note_histories as $note_history)
                            <tr>
                                <td>{{$note_history->notes_and_comments}}</td>
                                <td>{{$note_history->created_at}}</td>
                            </tr>
                        @endforeach
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-activity" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Activity</h4>
                </div>
                <div class="modal-body">

                    @if( !empty($activity_histories[0]) )
                        <label>Activity History</label>
                        <table class="table table-bordered">
                            <tr>
                                <th>Activity</th>
                                <th>Created Date</th>
                                <th>Follow Up Date</th>
                            </tr>
                            @foreach($activity_histories as $activity_history)
                                <tr>
                                    <td>{{$activity_history->activity}}</td>
                                    <td>{{$activity_history->todays_date}}</td>
                                    <td>{{$activity_history->followup_date}}</td>
                                </tr>
                            @endforeach
                        </table>
                    @endif


                    <form action="/contact/add-activity" class="register-form" method="post">
                        @csrf

                        <input type="hidden" value="{{$contact->id}}" name="id">
                        <input type="hidden" value="contact" name="type">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Write an activity</label>
                                    <textarea type="text" class="form-control" name="activity" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label>Today's Date</label>
                                <input class="form-control" readonly type="text" name="todays_date" value="{{date('d/m/Y')}}" required/>
                            </div>

                            <div class="col-md-4">
                                <label>Future Follow up Date</label>
                                <input class="form-control" type="date" name="followup_date" required>
                            </div>
                        </div>
                        <hr>

                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        function confirmDelete() {
            if (confirm('Are you sure you want to delete?')) {
                $.ajax({url: "/contact/delete/{{$contact->id}}", success: function(result){
                    window.location.replace("/contact");
                }});
            } else {
                // Do nothing!
            }
        }
    </script>
@endsection