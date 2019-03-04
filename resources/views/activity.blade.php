@extends('layouts.layout')

@section('title', 'Activity')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card" style="margin: 30px 0">
                    <div class="card-header">Pending Activity</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <th>Id</th>
                            <th>Activity Name</th>
                            <th>Nation Account Manager</th>
                            <th>Activity Account</th>
                            <th>Activity Contact</th>
                            <th>Follow Up Date</th>
                            <th>Action</th>
                            </thead>

                            <tbody>
                            @foreach($pending_activities as $pending_activity)
                                <tr>
                                    <td>{{$pending_activity->id}}</td>
                                    <td>{{$pending_activity->activity}}</td>

                                    @if($pending_activity->type == 'account')

                                        <td><a href="/viewprofile/{{$pending_activity->user->id}}">{{$pending_activity->user->name}}</a></td>
                                        <td> <a href="/account/details/{{$pending_activity->account[0]->id}}">{{$pending_activity->account[0]->name}}</a> </td>
                                        <td></td>
                                    @endif

                                    @if($pending_activity->type == 'contact')
                                        <td><a href="/viewprofile/{{$pending_activity->user->id}}">{{$pending_activity->user->name}}</a></td>
                                        <td></td>
                                        <td> <a href="/contact/details/{{$pending_activity->contact[0]->id}}">{{$pending_activity->contact[0]->name}}</a> </td>

                                    @endif



                                    <td>{{$pending_activity->followup_date}}</td>
                                    <td> <button class="btn btn-success" onclick="update_status({{$pending_activity->id}})">completed</button> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>

        <div class="col-md-6">
            <div class="card" style="margin: 30px 0">
                    <div class="card-header">Completed Activity</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <th>Id</th>
                            <th>Activity Name</th>
                            <th>Nation Account Manager</th>
                            <th>Activity Account</th>
                            <th>Activity Contact</th>
                            <th>Follow Up Date</th>
                            </thead>

                            <tbody>
                            @foreach($complete_activities as $complete_activity)
                                <tr>
                                    <td>{{$complete_activity->id}}</td>
                                    <td>{{$complete_activity->activity}}</td>

                                    @if($complete_activity->type == 'account')

                                        <td><a href="/viewprofile/{{$complete_activity->user->id}}">{{$complete_activity->user->name}}</a></td>
                                        <td> <a href="/account/details/{{$complete_activity->account[0]->id}}">{{$complete_activity->account[0]->name}}</a> </td>
                                        <td></td>
                                    @endif

                                    @if($complete_activity->type == 'contact')

                                        <td><a href="/viewprofile/{{$complete_activity->user->id}}">{{$complete_activity->user->name}}</a></td>
                                        <td></td>
                                        <td> <a href="/contact/details/{{$complete_activity->contact[0]->id}}">{{$complete_activity->contact[0]->name}}</a> </td>

                                    @endif



                                    <td>{{$complete_activity->followup_date}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>


    <script>
        function update_status(id) {
            $.ajax({
                url: "/activity/update-status",
                type: 'post',
                data: {'id' : id, _token: '{{csrf_token()}}'},
                success: function(result){
                    location.reload();
            }});
        }
    </script>

@endsection