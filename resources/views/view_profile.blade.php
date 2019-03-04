@extends('layouts.layout')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Profile Information</div>
        <div class="panel-body">
            <label>Name : </label> {{$user->name}}<br>
            <label>Email : </label> {{$user->email}}<br>
            <label>Phone : </label> {{$user->phone}}<br>
            <label>Title KPI : </label> {{$user->title_kpi}}<br>
        </div>
    </div>
</div>
@endsection