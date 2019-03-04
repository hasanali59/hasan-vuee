@extends('layouts.layout')

@section('title', 'Accounts')

@section('content')
    <div class="row">

        <div class="col-lg-6">
            <div class="card" style="margin: 30px 0">
                <div class="card-header">Account Opportunity List</div>
                <div class="card-body">
                    <div style="height: 500px; overflow: auto">
                        <table class="table table-bordered">

                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Opportunity Name</th>
                                <th>Account Name</th>
                                <th>Amount</th>
                                <th>Estimated Closing Date</th>
                                <th>Created Date</th>
                                <th>National Account Manager</th>
                            </tr>
                            </thead>
                            @foreach($account_opportunities as $opportunity)
                                <tr>
                                    <td> RA-O-{{ $opportunity->id }}</td>
                                    <td> <a href="/opportunity/account/details/{{$opportunity->id}}">{{ $opportunity->name }}</a></td>
                                    <td> <a href="/account/details/{{$opportunity['account']->id}}">{{ $opportunity['account']->name }}</a></td>
                                    <td> {{$opportunity->proposal_amount}} </td>
                                    <td> {{$opportunity->estimated_closing_date}} </td>
                                    <td> {{$opportunity->created_at}} </td>
                                    <td> <a href="/viewprofile/{{$opportunity['user']->id}}">{{$opportunity['user']->name}}</a> </td>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card" style="margin: 30px 0">
                <div class="card-header">Contact Opportunity List</div>
                <div class="card-body">
                    <div style="height: 500px; overflow: auto">
                        <table class="table table-bordered">

                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Opportunity Name</th>
                                <th>Contact Name</th>
                                <th>Amount</th>
                                <th>Estimated Closing Date</th>
                                <th>Created Date</th>
                                <th>National Account Manager</th>
                            </tr>
                            </thead>
                            @foreach($contact_opportunities as $opportunity)
                                <tr>
                                    <td> RA-O-{{ $opportunity->id }}</td>
                                    <td> <a href="/opportunity/contact/details/{{$opportunity->id}}">{{ $opportunity->name }}</a></td>
                                    <td> <a href="/contact/details/{{$opportunity['contact']->id}}">{{ $opportunity['contact']->name }}</a></td>
                                    <td> {{$opportunity->proposal_amount}} </td>
                                    <td> {{$opportunity->estimated_closing_date}} </td>
                                    <td> {{$opportunity->created_at}} </td>
                                    <td> <a href="/viewprofile/{{$opportunity['user']->id}}">{{$opportunity['user']->name}}</a> </td>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->



@endsection