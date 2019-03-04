@extends('layouts.layout')

@section('title', 'Contact Opportunity Details')

@section('content')

    <div class="container">
        <div class="card" style="margin: 30px 0">
            <div class="card-header">{{$opportunity->name}}</div>
            <div class="card-body">
                <a href="/opportunity" class="btn btn-info">Back</a>

                @if($current_user_type == "admin")
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit">Edit</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-note">Add Note</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-file">Add File</button>
                    <button onclick="confirmDelete()" class="btn btn-info" >Delete Opportunity</button><br><br>
                    <select id="opportunity-won">
                        @if($opportunity->won === "in-progress")
                            <option value="in-progress" selected>In progress</option>
                            <option value="won">Won</option>
                            <option value="lost">Lost</option>
                        @elseif($opportunity->won === "won")
                            <option value="in-progress">In progress</option>
                            <option value="won" selected>Won</option>
                            <option value="lost">Lost</option>
                        @else
                            <option value="in-progress">In progress</option>
                            <option value="won">Won</option>
                            <option value="lost" selected>Lost</option>
                        @endif
                    </select>
                @elseif($current_user_type == "user" and $current_user == $account->created_by)
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit">Edit</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-note">Add Note</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-file">Add File</button><br><br>
                @endif
                <br>

                <label style="margin-top: 15px">Contact Name:</label> <a href="/contact/details/{{$contact->id}}">{{$contact->name}}</a> <br>
                <label>name:</label> {{$opportunity->name}}<br>
                <label>online:</label> {{$opportunity->online}}<br>
                <label>live:</label> {{$opportunity->live}}<br>
                <label>hybrid:</label> {{$opportunity->hybrid}}<br>
                <label>group:</label> {{$opportunity->group}} <br>
                <label>course_name:</label> {{$opportunity->course_name}}<br>
                <label>number_of_learners:</label> {{$opportunity->number_of_learners}}<br>
                <label>proposal_amount:</label> {{$opportunity->proposal_amount}}<br>
                <label>delivery_data:</label> {{$opportunity->delivery_data}}<br>
                <label>payment_method:</label> {{$opportunity->payment_method}}<br>
                <label>estimated_closing_date:</label> {{$opportunity->estimated_closing_date}}<br>
                <label>add_to_forecast:</label> {{$opportunity->add_to_forecast}}<br>
                <label>TDR:</label> {{$opportunity->TDR}}<br>
                <label>national_account_manager:</label> <a href="/viewprofile/{{$opportunity['user']->id}}">{{$opportunity['user']->name}}</a><br>
                <label>ISDR:</label> {{$opportunity->ISDR}}<br>
                <label>Notes And Comments:</label> @if(!empty($note->notes_and_comments)) {{$note->notes_and_comments}} @endif<br>
                <a href="#" data-toggle="modal" data-target="#view-note">View History</a>
            </div>
        </div>


        <div class="card" style="margin: 30px 0">
            <div class="card-header">Files</div>
            <div class="card-body">

                @foreach($files as $file)
                    <a href="/storage/uploads/contact_opportunity/{{$file->file_hash_name}}">{{$file->file_name}}</a><br>
                @endforeach

            </div>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="edit" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <form action="/opportunity/contact/edit" class="register-form" method="post">
                        @csrf

                        <input type="hidden" value="{{$opportunity->id}}" name="id">

                        <div class="form-group">
                            <label>Select Contact</label>
                            <select class="form-control" name="contact_id">
                                @foreach($contacts as $contact)
                                    @if($contact->id == $opportunity->account_id)
                                        <option value="{{$contact->id}}" selected="selected">{{$contact->name}}</option>
                                    @else
                                        <option value="{{$contact->id}}">{{$contact->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control"  name="name" value="{{$opportunity->name}}" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Online ?</label><br>
                                    @if($opportunity->online == 1)
                                        <label class="radio-inline">
                                            <input type="radio" name="online" value="1" checked>YES
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="online" value="0">NO
                                        </label>
                                    @elseif($opportunity->online == 0)
                                        <label class="radio-inline">
                                            <input type="radio" name="online" value="1">YES
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="online" value="0" checked>NO
                                        </label>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Live ?</label><br>
                                    @if($opportunity->live == 1)
                                        <label class="radio-inline">
                                            <input type="radio" name="live" value="1" checked>YES
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="live" value="0">NO
                                        </label>
                                    @elseif($opportunity->live == 0)
                                        <label class="radio-inline">
                                            <input type="radio" name="live" value="1">YES
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="live" value="0" checked>NO
                                        </label>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Hybrid ?</label><br>
                                    @if($opportunity->hybrid == 1)
                                        <label class="radio-inline">
                                            <input type="radio" name="hybrid" value="1" checked>YES
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="hybrid" value="0">NO
                                        </label>
                                    @elseif($opportunity->hybrid == 0)
                                        <label class="radio-inline">
                                            <input type="radio" name="hybrid" value="1">YES
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="hybrid" value="0" checked>NO
                                        </label>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Group ?</label><br>
                                    @if($opportunity->group == 1)
                                        <label class="radio-inline">
                                            <input type="radio" name="group" value="1" checked>YES
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="group" value="0">NO
                                        </label>
                                    @elseif($opportunity->group == 0)
                                        <label class="radio-inline">
                                            <input type="radio" name="group" value="1">YES
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="group" value="0" checked>NO
                                        </label>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Course Name</label>
                                    <input type="text" class="form-control" value="{{$opportunity->course_name}}"  name="course_name" required>
                                </div>
                            </div>

                            {{--<div class="col-md-3">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label>Amount</label>--}}
                                    {{--<input type="text" class="form-control" value="{{$opportunity->amount}}"  name="amount" required>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Number Of Learners</label>
                                    <input type="number" min="0" class="form-control" value="{{$opportunity->number_of_learners}}"  name="number_of_learners" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Proposal Amount</label>
                                    <input type="number" min="0" class="form-control" value="{{$opportunity->proposal_amount}}"  name="proposal_amount" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Delivery Data</label>
                                    <input type="date" class="form-control" value="{{$opportunity->delivery_data}}"  name="delivery_data" required>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Payment Method</label>
                                    <input type="text" class="form-control"  name="payment_method" value="{{$opportunity->payment_method}}" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Estimated Closing Date</label>
                                    <input type="date" class="form-control"  name="estimated_closing_date" value="{{$opportunity->estimated_closing_date}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Add To Forecast ?</label><br>
                                    @if($opportunity->add_to_forecast == 1)
                                        <label class="radio-inline">
                                            <input type="radio" name="add_to_forecast" value="1" checked>YES
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="add_to_forecast" value="0">NO
                                        </label>
                                    @else
                                        <label class="radio-inline">
                                            <input type="radio" name="add_to_forecast" value="1">YES
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="add_to_forecast" value="0" checked>NO
                                        </label>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>TDR</label>
                                    <select name="TDR">
                                        @if($opportunity->TDR == "yes")
                                            <option value="yes" selected>YES</option>
                                            <option value="no">NO</option>
                                            <option value="pending">PENDING</option>
                                        @elseif($opportunity->TDR == "no")
                                            <option value="yes">YES</option>
                                            <option value="no" selected>NO</option>
                                            <option value="pending">PENDING</option>
                                        @else
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                            <option value="pending" selected>PENDING</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>National Account Manager</label>
                                    <input type="text" class="form-control"  name="national_account_manager" value="{{$opportunity->national_account_manager}}" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ISDR</label>
                                    <input type="text" class="form-control" value="{{$opportunity->ISDR}}" name="ISDR" >
                                </div>
                            </div>
                        </div>

                        {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label>Notes And Comments</label>--}}
                                    {{--<textarea type="text" class="form-control" name="notes_and_comments" >{{$opportunity->notes_and_comments}}</textarea>--}}
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
                    <form action="/opportunity/contact/add-notes" class="register-form" method="post">
                        @csrf

                        <input type="hidden" value="{{$opportunity->id}}" name="id">
                        <input type="hidden" value="contact-opportunity" name="type">

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

    <div class="modal fade" id="add-file" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">

                    <form action="/opportunity/contact/add-file" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{$opportunity->id}}">
                        <input type="file" name="file" accept=".csv, .doc, .docx, .pdf, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                        <input type="hidden" name="_token" value="{{csrf_token()}}"><br>
                        <button class="btn btn-success" type="submit">Upload</button>
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
                $.ajax({url: "/opportunity/contact/delete/{{$opportunity->id}}", success: function(result){
                    window.location.replace("/opportunity");
                }});
            } else {
                // Do nothing!
            }
        }

        $('#opportunity-won').on('change', function() {
            $.ajax({
                url: "/contact/update-opportunity",
                type: 'post',
                data: {'id': '{{$opportunity->id}}', 'value': this.value, _token: '{{csrf_token()}}'},
                success: function(result){

                }});
        });
    </script>

@endsection