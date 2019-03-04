@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')

    <style>
        .table thead th{
            vertical-align: middle;
            padding: 10px;
            font-size: 14px;
        }

        tr{
            font-size: 14px;
        }

        .wrimagecard{
            margin-top: 0;
            margin-bottom: 1.5rem;
            text-align: left;
            position: relative;
            background: #fff;
            box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        .wrimagecard .fa{
            position: relative;
            font-size: 70px;
        }
        .wrimagecard-topimage_header{
            padding: 20px;
        }
        a.wrimagecard:hover, .wrimagecard-topimage:hover {
            box-shadow: 2px 4px 8px 0px rgba(46,61,73,0.2);
        }
        .wrimagecard-topimage a {
            width: 100%;
            height: 100%;
            display: block;
        }
        .wrimagecard-topimage_title {
            padding: 20px 24px;
            height: 80px;
            padding-bottom: 0.75rem;
            position: relative;
        }
        .wrimagecard-topimage a {
            border-bottom: none;
            text-decoration: none;
            color: #525c65;
            transition: color 0.3s ease;
        }

        .card>.card-header {
            background-color: #AEB6BF;
            color: black;
        }
    </style>

<div class="" style="margin: 10px 50px">



    <div class="container">
        <div class="row">

            <div class="col-sm">
                <label>Search In</label>
                <select id="search-in" class="form-control">
                    <option>Account</option>
                    <option>Contact</option>
                    <option>Account Opportunity</option>
                    <option>Contact Opportunity</option>
                    <option>Activity</option>
                </select>
            </div>

            <div class="col-sm">
                <label>Search By</label>
                <select id="search-by" class="form-control">
                    <option>Name</option>
                    <option>Phone</option>
                    <option>Email</option>
                </select>
            </div>

            <div style="margin-top: 4px" class="col-sm">
                <label></label>
                <div class="form-group">
                    <div class="input-group input-group-alternative mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                        </div>
                        <input id="search-data" class="form-control form-control-alternative" placeholder="Search" type="text">
                    </div>
                </div>
                {{--<input id="search-data" class="form-control" type="text" placeholder="Search Here...">--}}
            </div>

            <div style="margin-top: 4px" class="col-sm">
                <label></label>
                <button id="search" onclick="search()" style="background-color: #641E16; border-color: #641E16" type="button" class="btn btn-success form-control" >Search</button>
            </div>

        </div>
    </div>


    <br>

    <div class="container-fluid" style="margin-bottom: 50px;">
        <h2>Sales Team</h2>
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="/account">
                        <div class="wrimagecard-topimage_header" style="background-color:#641E16 ">
                            <center><i class="fa fa-building" style="color: white"></i></center>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Accounts</h4>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="activity">
                        <div class="wrimagecard-topimage_header" style="background-color: #641E16">
                            <center><i class = "fa fa-chart-line" style="color: white"></i></center>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Activities
                                <div class="pull-right badge" id="WrControls"></div></h4>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="/contact">
                        <div class="wrimagecard-topimage_header" style="background-color:  #641E16">
                            <center><i class="fa fa-user" style="color: white"> </i></center>
                        </div>
                        <div class="wrimagecard-topimage_title" >
                            <h4>Contacts
                                <div class="pull-right badge" id="WrForms"></div>
                            </h4>
                        </div>

                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="/opportunity">
                        <div class="wrimagecard-topimage_header" style="background-color:  #641E16">
                            <center><i class="fa fa-lightbulb" style="color: white"> </i></center>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Opportunities
                                <div class="pull-right badge" id="WrGridSystem"></div></h4>
                        </div>

                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="margin-bottom: 50px;">
        <h2>Operating Team</h2>
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        <div class="wrimagecard-topimage_header" style="background-color:#AEB6BF ">
                            <center><i class="fa fa-file" style="color: white"></i></center>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Enrollment Report</h4>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        <div class="wrimagecard-topimage_header" style="background-color: #AEB6BF">
                            <center><i class = "fa fa-bell" style="color: white"></i></center>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Enrollment Request
                                <div class="pull-right badge" id="WrControls"></div></h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="margin-bottom: 50px;">
        <h2>Accounting Team</h2>
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        <div class="wrimagecard-topimage_header" style="background-color:#641E16 ">
                            <center><i class="fa fa-dollar-sign" style="color: white"></i></center>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Account Revenue</h4>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        <div class="wrimagecard-topimage_header" style="background-color: #641E16">
                            <center><i class = "fa fa-file-invoice" style="color: white"></i></center>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Invoice
                                <div class="pull-right badge" id="WrControls"></div></h4>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        <div class="wrimagecard-topimage_header" style="background-color: #641E16">
                            <center><i class = "fa fa-quote-right" style="color: white"></i></center>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Quote
                                <div class="pull-right badge" id="WrControls"></div></h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="margin-bottom: 50px;">
        <h2>Marketing Team</h2>
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        <div class="wrimagecard-topimage_header" style="background-color:#AEB6BF ">
                            <center><i class="fa fa-bullhorn" style="color: white"></i></center>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Webinar</h4>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        <div class="wrimagecard-topimage_header" style="background-color: #AEB6BF">
                            <center><i class = "fa fa-angle-double-up" style="color: white"></i></center>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Promotion
                                <div class="pull-right badge" id="WrControls"></div></h4>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        <div class="wrimagecard-topimage_header" style="background-color: #AEB6BF">
                            <center><i class = "fa fa-envelope" style="color: white"></i></center>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            <h4>Email Campaign
                                <div class="pull-right badge" id="WrControls"></div></h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="card" >
        <div class="card-header">Dashboard</div>
        <div class="card-body">
            <div id="accordion">
                @foreach($users as $user)
                    @if(Session::get('user.type') === "admin")
                        <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapse{{ $user->id }}" style="color: black;">
                                {{$user->name}}
                            </a>
                        </div>
                        <div id="collapse{{ $user->id }}" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>NAME</th>
                                        <th>PRD</th>
                                        <th>Type</th>
                                        <th>Jan</th>
                                        <th>Feb</th>
                                        <th>Mar</th>
                                        <th>Apr</th>
                                        <th>May</th>
                                        <th>Jun</th>
                                        <th>Jul</th>
                                        <th>Aug</th>
                                        <th>Sep</th>
                                        <th>Oct</th>
                                        <th>Nov</th>
                                        <th>Dec</th>
                                        <th>YTD TOTAL</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <tr class="info">
                                        <td> <a href="viewprofile/{{$user->id}}">{{$user->name}}</a> </td>
                                        <td>Sales Target</td>
                                        <td></td>
                                        @if($user->id === 3)
                                            <td>40,000</td>
                                            <td>40,000</td>
                                            <td>40,000</td>
                                            <td>40,000</td>
                                            <td>40,000</td>
                                            <td>40,000</td>
                                            <td>40,000</td>
                                            <td>40,000</td>
                                            <td>40,000</td>
                                            <td>40,000</td>
                                            <td>40,000</td>
                                            <td>40,000</td>
                                            <td>40,000</td>
                                        @elseif($user->id === 4)
                                            <td>30,000</td>
                                            <td>30,000</td>
                                            <td>30,000</td>
                                            <td>30,000</td>
                                            <td>30,000</td>
                                            <td>30,000</td>
                                            <td>30,000</td>
                                            <td>30,000</td>
                                            <td>30,000</td>
                                            <td>30,000</td>
                                            <td>30,000</td>
                                            <td>30,000</td>
                                            <td>30,000</td>
                                        @else
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif


                                    </tr>
                                    <tr class="success">
                                        <td></td>
                                        <td>Sales Attainment</td>
                                        <td>Account Opportunity</td>
                                        <td> <a id="January-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="February-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="March-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="April-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="May-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="June-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="July-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="August-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="September-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="October-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="November-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="December-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td id="ytd_total-sa-a-{{$user->id}}"></td>
                                    </tr>

                                    <tr class="success">
                                        <td></td>
                                        <td></td>
                                        <td>Contact Opportunity</td>
                                        <td> <a id="January-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="February-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="March-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="April-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="May-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="June-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="July-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="August-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="September-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="October-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="November-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="December-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td id="ytd_total-sa-c-{{$user->id}}" ></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><b>Total :</b></td>
                                        <td> <b id="total-jan-sa-{{$user->id}}"></b> </td>
                                        <td> <b id="total-feb-sa-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-mar-sa-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-apr-sa-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-may-sa-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-jun-sa-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-jul-sa-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-aug-sa-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-sep-sa-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-oct-sa-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-nov-sa-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-dec-sa-{{$user->id}}" ></b> </td>
                                        <td style="font-weight: 600" id="sub_total_sa-{{$user->id}}"></td>
                                    </tr>

                                    <tr style="background-color: #AEB6BF">
                                        <td></td>
                                        <td>Pipeline</td>
                                        <td>Account Opportunity</td>
                                        <td> <a id="January-pl-a-{{$user->id}}"  onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="February-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="March-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="April-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="May-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="June-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="July-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="August-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="September-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="October-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="November-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="December-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td id="ytd_total-pl-a-{{$user->id}}" ></td>
                                    </tr>

                                    <tr style="background-color: #AEB6BF">
                                        <td></td>
                                        <td></td>
                                        <td>Contact Opportunity</td>
                                        <td> <a id="January-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="February-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="March-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="April-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="May-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="June-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="July-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="August-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="September-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="October-pl-c-{{$user->id}}"  onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="November-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td> <a id="December-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                        <td id="ytd_total-pl-c-{{$user->id}}" ></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><b>Total :</b></td>
                                        <td> <b id="total-jan-pl-{{$user->id}}"></b> </td>
                                        <td> <b id="total-feb-pl-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-mar-pl-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-apr-pl-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-may-pl-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-jun-pl-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-jul-pl-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-aug-pl-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-sep-pl-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-oct-pl-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-nov-pl-{{$user->id}}" ></b> </td>
                                        <td> <b id="total-dec-pl-{{$user->id}}" ></b> </td>
                                        <td style="font-weight: 600" id="sub_total_pl-{{$user->id}}"></td>
                                    </tr>

                                    <script type="text/javascript">



                                        var account_opportunity = null;
                                        var contact_opportunity = null;

                                        var sub_total_sa = null;
                                        var sub_total = 0;


                                        //sales Attainment
                                        $.ajax({
                                            url: "/opportunity/account/get_won_opportunity/{{$user->name}}",
                                            type: "get",
                                            cache: false,
                                            success: function(data){
                                                account_opportunity = data;
                                                var total_account_proposal = null;

                                                $.each(data, function(index, element) {
                                                    total_account_proposal += +(element.proposal_amount);
                                                    var val = +($('#'+element.estimated_closing_month+'-sa-a-{{$user->id}}').text());
                                                    val += +(element.proposal_amount);
                                                    $('#'+element.estimated_closing_month+'-sa-a-{{$user->id}}').text(val);
                                                });
                                                $('#ytd_total-sa-a-{{$user->id}}').text(total_account_proposal);
                                                sub_total_sa += total_account_proposal;
                                            }
                                        });

                                        $.ajax({
                                            url: "/opportunity/contact/get_won_opportunity/{{$user->name}}",
                                            type: "get",
                                            cache: false,
                                            success: function(data){
                                                contact_opportunity = data;
                                                var total_contact_proposal = null;

                                                $.each(data, function(index, element) {
                                                    total_contact_proposal += +(element.proposal_amount);
                                                    var val = +($('#'+element.estimated_closing_month+'-sa-c-{{$user->id}}').text());
                                                    val += +(element.proposal_amount);
                                                    $('#'+element.estimated_closing_month+'-sa-c-{{$user->id}}').text(val);
                                                });
                                                $('#ytd_total-sa-c-{{$user->id}}').text(total_contact_proposal);
                                                sub_total_sa += total_contact_proposal;

                                                $('#sub_total_sa-{{$user->id}}').text(sub_total_sa);

                                                sub_total += sub_total_sa;

                                                sub_total_sa = null;

                                                var jan = +($('#January-sa-a-{{$user->id}}').text()) + +($('#January-sa-c-{{$user->id}}').text());
                                                var feb = +($('#February-sa-a-{{$user->id}}').text()) + +($('#February-sa-c-{{$user->id}}').text());
                                                var mar = +($('#March-sa-a-{{$user->id}}').text()) + +($('#March-sa-c-{{$user->id}}').text());
                                                var apr = +($('#April-sa-a-{{$user->id}}').text()) + +($('#April-sa-c-{{$user->id}}').text());
                                                var may = +($('#May-sa-a-{{$user->id}}').text()) + +($('#May-sa-c-{{$user->id}}').text());
                                                var jun = +($('#June-sa-a-{{$user->id}}').text()) + +($('#June-sa-c-{{$user->id}}').text());
                                                var jul = +($('#July-sa-a-{{$user->id}}').text()) + +($('#July-sa-c-{{$user->id}}').text());
                                                var aug = +($('#August-sa-a-{{$user->id}}').text()) + +($('#August-sa-c-{{$user->id}}').text());
                                                var sep = +($('#September-sa-a-{{$user->id}}').text()) + +($('#September-sa-c-{{$user->id}}').text());
                                                var oct = +($('#October-sa-a-{{$user->id}}').text()) + +($('#October-sa-c-{{$user->id}}').text());
                                                var nov = +($('#November-sa-a-{{$user->id}}').text()) + +($('#November-sa-c-{{$user->id}}').text());
                                                var dec = +($('#December-sa-a-{{$user->id}}').text()) + +($('#December-sa-c-{{$user->id}}').text());

                                                $('#total-jan-sa-{{$user->id}}').text(jan);
                                                $('#total-feb-sa-{{$user->id}}').text(feb);
                                                $('#total-mar-sa-{{$user->id}}').text(mar);
                                                $('#total-apr-sa-{{$user->id}}').text(apr);
                                                $('#total-may-sa-{{$user->id}}').text(may);
                                                $('#total-jun-sa-{{$user->id}}').text(jun);
                                                $('#total-jul-sa-{{$user->id}}').text(jul);
                                                $('#total-aug-sa-{{$user->id}}').text(aug);
                                                $('#total-sep-sa-{{$user->id}}').text(sep);
                                                $('#total-oct-sa-{{$user->id}}').text(oct);
                                                $('#total-nov-sa-{{$user->id}}').text(nov);
                                                $('#total-dec-sa-{{$user->id}}').text(dec);
                                            }
                                        });


                                        //Pipeline
                                        $.ajax({
                                            url: "/opportunity/account/get_pipeline/{{$user->name}}",
                                            type: "get",
                                            cache: false,
                                            success: function(data){
                                                account_opportunity = data;
                                                var total_account_proposal = null;

                                                $.each(data, function(index, element) {
                                                    total_account_proposal += +(element.proposal_amount);
                                                    var val = +($('#'+element.estimated_closing_month+'-pl-a-{{$user->id}}').text());
                                                    val += +(element.proposal_amount);
                                                    $('#'+element.estimated_closing_month+'-pl-a-{{$user->id}}').text(val);
                                                });
                                                $('#ytd_total-pl-a-{{$user->id}}').text(total_account_proposal);
                                                sub_total_sa += total_account_proposal;

                                            }
                                        });

                                        $.ajax({
                                            url: "/opportunity/contact/get_pipeline/{{$user->name}}",
                                            type: "get",
                                            cache: false,
                                            success: function(data){
                                                contact_opportunity = data;
                                                var total_contact_proposal = null;

                                                $.each(data, function(index, element) {
                                                    total_contact_proposal += +(element.proposal_amount);
                                                    var val = +($('#'+element.estimated_closing_month+'-pl-c-{{$user->id}}').text());
                                                    val += +(element.proposal_amount);
                                                    $('#'+element.estimated_closing_month+'-pl-c-{{$user->id}}').text(val);
                                                });
                                                $('#ytd_total-pl-c-{{$user->id}}').text(total_contact_proposal);
                                                sub_total_sa += total_contact_proposal;
                                                $('#sub_total_pl-{{$user->id}}').text(sub_total_sa);

                                                sub_total += sub_total_sa;
                                                console.log(sub_total);
                                                $('#sub_total-{{$user->id}}').text(sub_total);
                                                sub_total = 0;
                                                sub_total_sa = null;



                                                var jan = +($('#January-pl-a-{{$user->id}}').text()) + +($('#January-pl-c-{{$user->id}}').text());
                                                var feb = +($('#February-pl-a-{{$user->id}}').text()) + +($('#February-pl-c-{{$user->id}}').text());
                                                var mar = +($('#March-pl-a-{{$user->id}}').text()) + +($('#March-pl-c-{{$user->id}}').text());
                                                var apr = +($('#April-pl-a-{{$user->id}}').text()) + +($('#April-pl-c-{{$user->id}}').text());
                                                var may = +($('#May-pl-a-{{$user->id}}').text()) + +($('#May-pl-c-{{$user->id}}').text());
                                                var jun = +($('#June-pl-a-{{$user->id}}').text()) + +($('#June-pl-c-{{$user->id}}').text());
                                                var jul = +($('#July-pl-a-{{$user->id}}').text()) + +($('#July-pl-c-{{$user->id}}').text());
                                                var aug = +($('#August-pl-a-{{$user->id}}').text()) + +($('#August-pl-c-{{$user->id}}').text());
                                                var sep = +($('#September-pl-a-{{$user->id}}').text()) + +($('#September-pl-c-{{$user->id}}').text());
                                                var oct = +($('#October-pl-a-{{$user->id}}').text()) + +($('#October-pl-c-{{$user->id}}').text());
                                                var nov = +($('#November-pl-a-{{$user->id}}').text()) + +($('#November-pl-c-{{$user->id}}').text());
                                                var dec = +($('#December-pl-a-{{$user->id}}').text()) + +($('#December-pl-c-{{$user->id}}').text());

                                                $('#total-jan-pl-{{$user->id}}').text(jan);
                                                $('#total-feb-pl-{{$user->id}}').text(feb);
                                                $('#total-mar-pl-{{$user->id}}').text(mar);
                                                $('#total-apr-pl-{{$user->id}}').text(apr);
                                                $('#total-may-pl-{{$user->id}}').text(may);
                                                $('#total-jun-pl-{{$user->id}}').text(jun);
                                                $('#total-jul-pl-{{$user->id}}').text(jul);
                                                $('#total-aug-pl-{{$user->id}}').text(aug);
                                                $('#total-sep-pl-{{$user->id}}').text(sep);
                                                $('#total-oct-pl-{{$user->id}}').text(oct);
                                                $('#total-nov-pl-{{$user->id}}').text(nov);
                                                $('#total-dec-pl-{{$user->id}}').text(dec);

                                            }
                                        });

                                        //                console.log(sub_total);

                                        //sub_total = 0;


                                        function viewDetails(id){
                                            var array = id.split("-");
                                            var month = array[0];
                                            var PRD = array[1];
                                            var type = array[2];
                                            var user_id = array[3];

                                            $.ajax({
                                                url: "/dashboard/get-opportunity-data",
                                                type: "get",
                                                data: {
                                                    "month": month,
                                                    "PRD": PRD,
                                                    "type": type,
                                                    "user_id": user_id
                                                },
                                                cache: false,
                                                success: function(data){
                                                    console.log(data);
                                                    $('#modal-body').html('<table id="show-opportunity" class="table table-bordered">\n' +
                                                        '                        <tr>\n' +
                                                        '                            <th>Name</th>\n' +
                                                        '                            <th>Amount</th>\n' +
                                                        '                            <th>Estimated Closing Date</th>\n' +
                                                        '                            <th>Created At</th>\n' +
                                                        '                        </tr>\n' +
                                                        '                    </table>');
                                                    $.each(data, function(idx, obj) {
                                                        $('#show-opportunity').append('<tr> <td> <a target="_blank" href="opportunity/account/details/'+obj.id+'">'+obj.name+'</a> </td> <td>'+obj.proposal_amount+'</td> <td>'+obj.estimated_closing_date+'</td> <td>'+obj.created_at+'</td> </tr>')
                                                    });


                                                    $('#myModal').modal('toggle');
                                                }
                                            });


                                        }

                                        $('#myModal').on('hidden', function () {
                                            $('#show-opportunity').html('');
                                        })



                                    </script>




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @elseif(Session::get('user.id') === $user->id && Session::get('user.type') !== "admin")
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapse{{ $user->id }}" style="color: black;">
                                    {{$user->name}}
                                </a>
                            </div>
                            <div id="collapse{{ $user->id }}" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>PRD</th>
                                            <th>Type</th>
                                            <th>Jan</th>
                                            <th>Feb</th>
                                            <th>Mar</th>
                                            <th>Apr</th>
                                            <th>May</th>
                                            <th>Jun</th>
                                            <th>Jul</th>
                                            <th>Aug</th>
                                            <th>Sep</th>
                                            <th>Oct</th>
                                            <th>Nov</th>
                                            <th>Dec</th>
                                            <th>YTD TOTAL</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <tr class="info">
                                            <td> <a href="viewprofile/{{$user->id}}">{{$user->name}}</a> </td>
                                            <td>Sales Target</td>
                                            <td></td>
                                            @if($user->id === 3)
                                                <td>40,000</td>
                                                <td>40,000</td>
                                                <td>40,000</td>
                                                <td>40,000</td>
                                                <td>40,000</td>
                                                <td>40,000</td>
                                                <td>40,000</td>
                                                <td>40,000</td>
                                                <td>40,000</td>
                                                <td>40,000</td>
                                                <td>40,000</td>
                                                <td>40,000</td>
                                                <td>40,000</td>
                                            @elseif($user->id === 4)
                                                <td>30,000</td>
                                                <td>30,000</td>
                                                <td>30,000</td>
                                                <td>30,000</td>
                                                <td>30,000</td>
                                                <td>30,000</td>
                                                <td>30,000</td>
                                                <td>30,000</td>
                                                <td>30,000</td>
                                                <td>30,000</td>
                                                <td>30,000</td>
                                                <td>30,000</td>
                                                <td>30,000</td>
                                            @else
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                            @endif


                                        </tr>
                                        <tr class="success">
                                            <td></td>
                                            <td>Sales Attainment</td>
                                            <td>Account Opportunity</td>
                                            <td> <a id="January-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="February-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="March-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="April-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="May-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="June-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="July-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="August-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="September-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="October-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="November-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="December-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td id="ytd_total-sa-a-{{$user->id}}"></td>
                                        </tr>

                                        <tr class="success">
                                            <td></td>
                                            <td></td>
                                            <td>Contact Opportunity</td>
                                            <td> <a id="January-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="February-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="March-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="April-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="May-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="June-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="July-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="August-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="September-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="October-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="November-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="December-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td id="ytd_total-sa-c-{{$user->id}}" ></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><b>Total :</b></td>
                                            <td> <b id="total-jan-sa-{{$user->id}}"></b> </td>
                                            <td> <b id="total-feb-sa-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-mar-sa-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-apr-sa-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-may-sa-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-jun-sa-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-jul-sa-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-aug-sa-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-sep-sa-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-oct-sa-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-nov-sa-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-dec-sa-{{$user->id}}" ></b> </td>
                                            <td style="font-weight: 600" id="sub_total_sa-{{$user->id}}"></td>
                                        </tr>

                                        <tr style="background-color: #AEB6BF">
                                            <td></td>
                                            <td>Pipeline</td>
                                            <td>Account Opportunity</td>
                                            <td> <a id="January-pl-a-{{$user->id}}"  onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="February-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="March-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="April-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="May-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="June-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="July-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="August-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="September-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="October-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="November-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="December-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td id="ytd_total-pl-a-{{$user->id}}" ></td>
                                        </tr>

                                        <tr style="background-color: #AEB6BF">
                                            <td></td>
                                            <td></td>
                                            <td>Contact Opportunity</td>
                                            <td> <a id="January-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="February-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="March-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="April-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="May-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="June-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="July-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="August-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="September-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="October-pl-c-{{$user->id}}"  onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="November-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td> <a id="December-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>
                                            <td id="ytd_total-pl-c-{{$user->id}}" ></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><b>Total :</b></td>
                                            <td> <b id="total-jan-pl-{{$user->id}}"></b> </td>
                                            <td> <b id="total-feb-pl-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-mar-pl-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-apr-pl-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-may-pl-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-jun-pl-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-jul-pl-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-aug-pl-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-sep-pl-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-oct-pl-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-nov-pl-{{$user->id}}" ></b> </td>
                                            <td> <b id="total-dec-pl-{{$user->id}}" ></b> </td>
                                            <td style="font-weight: 600" id="sub_total_pl-{{$user->id}}"></td>
                                        </tr>

                                        <script type="text/javascript">



                                            var account_opportunity = null;
                                            var contact_opportunity = null;

                                            var sub_total_sa = null;
                                            var sub_total = 0;


                                            //sales Attainment
                                            $.ajax({
                                                url: "/opportunity/account/get_won_opportunity/{{$user->name}}",
                                                type: "get",
                                                cache: false,
                                                success: function(data){
                                                    account_opportunity = data;
                                                    var total_account_proposal = null;

                                                    $.each(data, function(index, element) {
                                                        total_account_proposal += +(element.proposal_amount);
                                                        var val = +($('#'+element.estimated_closing_month+'-sa-a-{{$user->id}}').text());
                                                        val += +(element.proposal_amount);
                                                        $('#'+element.estimated_closing_month+'-sa-a-{{$user->id}}').text(val);
                                                    });
                                                    $('#ytd_total-sa-a-{{$user->id}}').text(total_account_proposal);
                                                    sub_total_sa += total_account_proposal;
                                                }
                                            });

                                            $.ajax({
                                                url: "/opportunity/contact/get_won_opportunity/{{$user->name}}",
                                                type: "get",
                                                cache: false,
                                                success: function(data){
                                                    contact_opportunity = data;
                                                    var total_contact_proposal = null;

                                                    $.each(data, function(index, element) {
                                                        total_contact_proposal += +(element.proposal_amount);
                                                        var val = +($('#'+element.estimated_closing_month+'-sa-c-{{$user->id}}').text());
                                                        val += +(element.proposal_amount);
                                                        $('#'+element.estimated_closing_month+'-sa-c-{{$user->id}}').text(val);
                                                    });
                                                    $('#ytd_total-sa-c-{{$user->id}}').text(total_contact_proposal);
                                                    sub_total_sa += total_contact_proposal;

                                                    $('#sub_total_sa-{{$user->id}}').text(sub_total_sa);

                                                    sub_total += sub_total_sa;

                                                    sub_total_sa = null;

                                                    var jan = +($('#January-sa-a-{{$user->id}}').text()) + +($('#January-sa-c-{{$user->id}}').text());
                                                    var feb = +($('#February-sa-a-{{$user->id}}').text()) + +($('#February-sa-c-{{$user->id}}').text());
                                                    var mar = +($('#March-sa-a-{{$user->id}}').text()) + +($('#March-sa-c-{{$user->id}}').text());
                                                    var apr = +($('#April-sa-a-{{$user->id}}').text()) + +($('#April-sa-c-{{$user->id}}').text());
                                                    var may = +($('#May-sa-a-{{$user->id}}').text()) + +($('#May-sa-c-{{$user->id}}').text());
                                                    var jun = +($('#June-sa-a-{{$user->id}}').text()) + +($('#June-sa-c-{{$user->id}}').text());
                                                    var jul = +($('#July-sa-a-{{$user->id}}').text()) + +($('#July-sa-c-{{$user->id}}').text());
                                                    var aug = +($('#August-sa-a-{{$user->id}}').text()) + +($('#August-sa-c-{{$user->id}}').text());
                                                    var sep = +($('#September-sa-a-{{$user->id}}').text()) + +($('#September-sa-c-{{$user->id}}').text());
                                                    var oct = +($('#October-sa-a-{{$user->id}}').text()) + +($('#October-sa-c-{{$user->id}}').text());
                                                    var nov = +($('#November-sa-a-{{$user->id}}').text()) + +($('#November-sa-c-{{$user->id}}').text());
                                                    var dec = +($('#December-sa-a-{{$user->id}}').text()) + +($('#December-sa-c-{{$user->id}}').text());

                                                    $('#total-jan-sa-{{$user->id}}').text(jan);
                                                    $('#total-feb-sa-{{$user->id}}').text(feb);
                                                    $('#total-mar-sa-{{$user->id}}').text(mar);
                                                    $('#total-apr-sa-{{$user->id}}').text(apr);
                                                    $('#total-may-sa-{{$user->id}}').text(may);
                                                    $('#total-jun-sa-{{$user->id}}').text(jun);
                                                    $('#total-jul-sa-{{$user->id}}').text(jul);
                                                    $('#total-aug-sa-{{$user->id}}').text(aug);
                                                    $('#total-sep-sa-{{$user->id}}').text(sep);
                                                    $('#total-oct-sa-{{$user->id}}').text(oct);
                                                    $('#total-nov-sa-{{$user->id}}').text(nov);
                                                    $('#total-dec-sa-{{$user->id}}').text(dec);
                                                }
                                            });


                                            //Pipeline
                                            $.ajax({
                                                url: "/opportunity/account/get_pipeline/{{$user->name}}",
                                                type: "get",
                                                cache: false,
                                                success: function(data){
                                                    account_opportunity = data;
                                                    var total_account_proposal = null;

                                                    $.each(data, function(index, element) {
                                                        total_account_proposal += +(element.proposal_amount);
                                                        var val = +($('#'+element.estimated_closing_month+'-pl-a-{{$user->id}}').text());
                                                        val += +(element.proposal_amount);
                                                        $('#'+element.estimated_closing_month+'-pl-a-{{$user->id}}').text(val);
                                                    });
                                                    $('#ytd_total-pl-a-{{$user->id}}').text(total_account_proposal);
                                                    sub_total_sa += total_account_proposal;

                                                }
                                            });

                                            $.ajax({
                                                url: "/opportunity/contact/get_pipeline/{{$user->name}}",
                                                type: "get",
                                                cache: false,
                                                success: function(data){
                                                    contact_opportunity = data;
                                                    var total_contact_proposal = null;

                                                    $.each(data, function(index, element) {
                                                        total_contact_proposal += +(element.proposal_amount);
                                                        var val = +($('#'+element.estimated_closing_month+'-pl-c-{{$user->id}}').text());
                                                        val += +(element.proposal_amount);
                                                        $('#'+element.estimated_closing_month+'-pl-c-{{$user->id}}').text(val);
                                                    });
                                                    $('#ytd_total-pl-c-{{$user->id}}').text(total_contact_proposal);
                                                    sub_total_sa += total_contact_proposal;
                                                    $('#sub_total_pl-{{$user->id}}').text(sub_total_sa);

                                                    sub_total += sub_total_sa;
                                                    console.log(sub_total);
                                                    $('#sub_total-{{$user->id}}').text(sub_total);
                                                    sub_total = 0;
                                                    sub_total_sa = null;



                                                    var jan = +($('#January-pl-a-{{$user->id}}').text()) + +($('#January-pl-c-{{$user->id}}').text());
                                                    var feb = +($('#February-pl-a-{{$user->id}}').text()) + +($('#February-pl-c-{{$user->id}}').text());
                                                    var mar = +($('#March-pl-a-{{$user->id}}').text()) + +($('#March-pl-c-{{$user->id}}').text());
                                                    var apr = +($('#April-pl-a-{{$user->id}}').text()) + +($('#April-pl-c-{{$user->id}}').text());
                                                    var may = +($('#May-pl-a-{{$user->id}}').text()) + +($('#May-pl-c-{{$user->id}}').text());
                                                    var jun = +($('#June-pl-a-{{$user->id}}').text()) + +($('#June-pl-c-{{$user->id}}').text());
                                                    var jul = +($('#July-pl-a-{{$user->id}}').text()) + +($('#July-pl-c-{{$user->id}}').text());
                                                    var aug = +($('#August-pl-a-{{$user->id}}').text()) + +($('#August-pl-c-{{$user->id}}').text());
                                                    var sep = +($('#September-pl-a-{{$user->id}}').text()) + +($('#September-pl-c-{{$user->id}}').text());
                                                    var oct = +($('#October-pl-a-{{$user->id}}').text()) + +($('#October-pl-c-{{$user->id}}').text());
                                                    var nov = +($('#November-pl-a-{{$user->id}}').text()) + +($('#November-pl-c-{{$user->id}}').text());
                                                    var dec = +($('#December-pl-a-{{$user->id}}').text()) + +($('#December-pl-c-{{$user->id}}').text());

                                                    $('#total-jan-pl-{{$user->id}}').text(jan);
                                                    $('#total-feb-pl-{{$user->id}}').text(feb);
                                                    $('#total-mar-pl-{{$user->id}}').text(mar);
                                                    $('#total-apr-pl-{{$user->id}}').text(apr);
                                                    $('#total-may-pl-{{$user->id}}').text(may);
                                                    $('#total-jun-pl-{{$user->id}}').text(jun);
                                                    $('#total-jul-pl-{{$user->id}}').text(jul);
                                                    $('#total-aug-pl-{{$user->id}}').text(aug);
                                                    $('#total-sep-pl-{{$user->id}}').text(sep);
                                                    $('#total-oct-pl-{{$user->id}}').text(oct);
                                                    $('#total-nov-pl-{{$user->id}}').text(nov);
                                                    $('#total-dec-pl-{{$user->id}}').text(dec);

                                                }
                                            });

                                            //                console.log(sub_total);

                                            //sub_total = 0;


                                            function viewDetails(id){
                                                var array = id.split("-");
                                                var month = array[0];
                                                var PRD = array[1];
                                                var type = array[2];
                                                var user_id = array[3];

                                                $.ajax({
                                                    url: "/dashboard/get-opportunity-data",
                                                    type: "get",
                                                    data: {
                                                        "month": month,
                                                        "PRD": PRD,
                                                        "type": type,
                                                        "user_id": user_id
                                                    },
                                                    cache: false,
                                                    success: function(data){
                                                        console.log(data);
                                                        $('#modal-body').html('<table id="show-opportunity" class="table table-bordered">\n' +
                                                            '                        <tr>\n' +
                                                            '                            <th>Name</th>\n' +
                                                            '                            <th>Amount</th>\n' +
                                                            '                            <th>Estimated Closing Date</th>\n' +
                                                            '                            <th>Created At</th>\n' +
                                                            '                        </tr>\n' +
                                                            '                    </table>');
                                                        $.each(data, function(idx, obj) {
                                                            $('#show-opportunity').append('<tr> <td> <a target="_blank" href="opportunity/account/details/'+obj.id+'">'+obj.name+'</a> </td> <td>'+obj.proposal_amount+'</td> <td>'+obj.estimated_closing_date+'</td> <td>'+obj.created_at+'</td> </tr>')
                                                        });


                                                        $('#myModal').modal('toggle');
                                                    }
                                                });


                                            }

                                            $('#myModal').on('hidden', function () {
                                                $('#show-opportunity').html('');
                                            })



                                        </script>




                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>




    {{--<div class="card">--}}
        {{--<div class="card-header">Dashboard</div>--}}
        {{--<div class="card-body">--}}
            {{--<div style="height: 700px; overflow: auto">--}}
                {{--@foreach($users as $user)--}}
                    {{--<table class="table table-bordered">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>NAME</th>--}}
                            {{--<th>PRD</th>--}}
                            {{--<th>Type</th>--}}
                            {{--<th>Jan</th>--}}
                            {{--<th>Feb</th>--}}
                            {{--<th>Mar</th>--}}
                            {{--<th>Apr</th>--}}
                            {{--<th>May</th>--}}
                            {{--<th>Jun</th>--}}
                            {{--<th>Jul</th>--}}
                            {{--<th>Aug</th>--}}
                            {{--<th>Sep</th>--}}
                            {{--<th>Oct</th>--}}
                            {{--<th>Nov</th>--}}
                            {{--<th>Dec</th>--}}
                            {{--<th>YTD TOTAL</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}

                        {{--<tbody>--}}

                        {{--<tr class="info">--}}
                            {{--<td> <a href="viewprofile/{{$user->id}}">{{$user->name}}</a> </td>--}}
                            {{--<td>Sales Target</td>--}}
                            {{--<td></td>--}}
                            {{--@if($user->id === 3)--}}
                                {{--<td>40,000</td>--}}
                                {{--<td>40,000</td>--}}
                                {{--<td>40,000</td>--}}
                                {{--<td>40,000</td>--}}
                                {{--<td>40,000</td>--}}
                                {{--<td>40,000</td>--}}
                                {{--<td>40,000</td>--}}
                                {{--<td>40,000</td>--}}
                                {{--<td>40,000</td>--}}
                                {{--<td>40,000</td>--}}
                                {{--<td>40,000</td>--}}
                                {{--<td>40,000</td>--}}
                                {{--<td>40,000</td>--}}
                            {{--@elseif($user->id === 4)--}}
                                {{--<td>30,000</td>--}}
                                {{--<td>30,000</td>--}}
                                {{--<td>30,000</td>--}}
                                {{--<td>30,000</td>--}}
                                {{--<td>30,000</td>--}}
                                {{--<td>30,000</td>--}}
                                {{--<td>30,000</td>--}}
                                {{--<td>30,000</td>--}}
                                {{--<td>30,000</td>--}}
                                {{--<td>30,000</td>--}}
                                {{--<td>30,000</td>--}}
                                {{--<td>30,000</td>--}}
                                {{--<td>30,000</td>--}}
                            {{--@else--}}
                                {{--<td>0</td>--}}
                                {{--<td>0</td>--}}
                                {{--<td>0</td>--}}
                                {{--<td>0</td>--}}
                                {{--<td>0</td>--}}
                                {{--<td>0</td>--}}
                                {{--<td>0</td>--}}
                                {{--<td>0</td>--}}
                                {{--<td>0</td>--}}
                                {{--<td>0</td>--}}
                                {{--<td>0</td>--}}
                                {{--<td>0</td>--}}
                                {{--<td>0</td>--}}
                            {{--@endif--}}


                        {{--</tr>--}}
                        {{--<tr class="success">--}}
                            {{--<td></td>--}}
                            {{--<td>Sales Attainment</td>--}}
                            {{--<td>Account Opportunity</td>--}}
                            {{--<td> <a id="January-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="February-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="March-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="April-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="May-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="June-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="July-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="August-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="September-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="October-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="November-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="December-sa-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td id="ytd_total-sa-a-{{$user->id}}"></td>--}}
                        {{--</tr>--}}

                        {{--<tr class="success">--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td>Contact Opportunity</td>--}}
                            {{--<td> <a id="January-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="February-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="March-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="April-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="May-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="June-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="July-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="August-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="September-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="October-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="November-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="December-sa-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td id="ytd_total-sa-c-{{$user->id}}" ></td>--}}
                        {{--</tr>--}}

                        {{--<tr>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td><b>Total :</b></td>--}}
                            {{--<td> <b id="total-jan-sa-{{$user->id}}"></b> </td>--}}
                            {{--<td> <b id="total-feb-sa-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-mar-sa-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-apr-sa-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-may-sa-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-jun-sa-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-jul-sa-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-aug-sa-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-sep-sa-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-oct-sa-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-nov-sa-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-dec-sa-{{$user->id}}" ></b> </td>--}}
                            {{--<td style="font-weight: 600" id="sub_total_sa-{{$user->id}}"></td>--}}
                        {{--</tr>--}}

                        {{--<tr style="background-color: #AEB6BF">--}}
                            {{--<td></td>--}}
                            {{--<td>Pipeline</td>--}}
                            {{--<td>Account Opportunity</td>--}}
                            {{--<td> <a id="January-pl-a-{{$user->id}}"  onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="February-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="March-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="April-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="May-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="June-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="July-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="August-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="September-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="October-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="November-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="December-pl-a-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td id="ytd_total-pl-a-{{$user->id}}" ></td>--}}
                        {{--</tr>--}}

                        {{--<tr style="background-color: #AEB6BF">--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td>Contact Opportunity</td>--}}
                            {{--<td> <a id="January-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="February-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="March-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="April-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="May-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="June-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="July-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="August-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="September-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="October-pl-c-{{$user->id}}"  onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="November-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td> <a id="December-pl-c-{{$user->id}}" onclick="viewDetails(this.id)" style="cursor: pointer"></a> </td>--}}
                            {{--<td id="ytd_total-pl-c-{{$user->id}}" ></td>--}}
                        {{--</tr>--}}

                        {{--<tr>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td><b>Total :</b></td>--}}
                            {{--<td> <b id="total-jan-pl-{{$user->id}}"></b> </td>--}}
                            {{--<td> <b id="total-feb-pl-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-mar-pl-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-apr-pl-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-may-pl-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-jun-pl-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-jul-pl-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-aug-pl-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-sep-pl-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-oct-pl-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-nov-pl-{{$user->id}}" ></b> </td>--}}
                            {{--<td> <b id="total-dec-pl-{{$user->id}}" ></b> </td>--}}
                            {{--<td style="font-weight: 600" id="sub_total_pl-{{$user->id}}"></td>--}}
                        {{--</tr>--}}

                        {{--<script type="text/javascript">--}}



                            {{--var account_opportunity = null;--}}
                            {{--var contact_opportunity = null;--}}

                            {{--var sub_total_sa = null;--}}
                            {{--var sub_total = 0;--}}


                            {{--//sales Attainment--}}
                            {{--$.ajax({--}}
                                {{--url: "/opportunity/account/get_won_opportunity/{{$user->name}}",--}}
                                {{--type: "get",--}}
                                {{--cache: false,--}}
                                {{--success: function(data){--}}
                                    {{--account_opportunity = data;--}}
                                    {{--var total_account_proposal = null;--}}

                                    {{--$.each(data, function(index, element) {--}}
                                        {{--total_account_proposal += +(element.proposal_amount);--}}
                                        {{--var val = +($('#'+element.estimated_closing_month+'-sa-a-{{$user->id}}').text());--}}
                                        {{--val += +(element.proposal_amount);--}}
                                        {{--$('#'+element.estimated_closing_month+'-sa-a-{{$user->id}}').text(val);--}}
                                    {{--});--}}
                                    {{--$('#ytd_total-sa-a-{{$user->id}}').text(total_account_proposal);--}}
                                    {{--sub_total_sa += total_account_proposal;--}}
                                {{--}--}}
                            {{--});--}}

                            {{--$.ajax({--}}
                                {{--url: "/opportunity/contact/get_won_opportunity/{{$user->name}}",--}}
                                {{--type: "get",--}}
                                {{--cache: false,--}}
                                {{--success: function(data){--}}
                                    {{--contact_opportunity = data;--}}
                                    {{--var total_contact_proposal = null;--}}

                                    {{--$.each(data, function(index, element) {--}}
                                        {{--total_contact_proposal += +(element.proposal_amount);--}}
                                        {{--var val = +($('#'+element.estimated_closing_month+'-sa-c-{{$user->id}}').text());--}}
                                        {{--val += +(element.proposal_amount);--}}
                                        {{--$('#'+element.estimated_closing_month+'-sa-c-{{$user->id}}').text(val);--}}
                                    {{--});--}}
                                    {{--$('#ytd_total-sa-c-{{$user->id}}').text(total_contact_proposal);--}}
                                    {{--sub_total_sa += total_contact_proposal;--}}

                                    {{--$('#sub_total_sa-{{$user->id}}').text(sub_total_sa);--}}

                                    {{--sub_total += sub_total_sa;--}}

                                    {{--sub_total_sa = null;--}}

                                    {{--var jan = +($('#January-sa-a-{{$user->id}}').text()) + +($('#January-sa-c-{{$user->id}}').text());--}}
                                    {{--var feb = +($('#February-sa-a-{{$user->id}}').text()) + +($('#February-sa-c-{{$user->id}}').text());--}}
                                    {{--var mar = +($('#March-sa-a-{{$user->id}}').text()) + +($('#March-sa-c-{{$user->id}}').text());--}}
                                    {{--var apr = +($('#April-sa-a-{{$user->id}}').text()) + +($('#April-sa-c-{{$user->id}}').text());--}}
                                    {{--var may = +($('#May-sa-a-{{$user->id}}').text()) + +($('#May-sa-c-{{$user->id}}').text());--}}
                                    {{--var jun = +($('#June-sa-a-{{$user->id}}').text()) + +($('#June-sa-c-{{$user->id}}').text());--}}
                                    {{--var jul = +($('#July-sa-a-{{$user->id}}').text()) + +($('#July-sa-c-{{$user->id}}').text());--}}
                                    {{--var aug = +($('#August-sa-a-{{$user->id}}').text()) + +($('#August-sa-c-{{$user->id}}').text());--}}
                                    {{--var sep = +($('#September-sa-a-{{$user->id}}').text()) + +($('#September-sa-c-{{$user->id}}').text());--}}
                                    {{--var oct = +($('#October-sa-a-{{$user->id}}').text()) + +($('#October-sa-c-{{$user->id}}').text());--}}
                                    {{--var nov = +($('#November-sa-a-{{$user->id}}').text()) + +($('#November-sa-c-{{$user->id}}').text());--}}
                                    {{--var dec = +($('#December-sa-a-{{$user->id}}').text()) + +($('#December-sa-c-{{$user->id}}').text());--}}

                                    {{--$('#total-jan-sa-{{$user->id}}').text(jan);--}}
                                    {{--$('#total-feb-sa-{{$user->id}}').text(feb);--}}
                                    {{--$('#total-mar-sa-{{$user->id}}').text(mar);--}}
                                    {{--$('#total-apr-sa-{{$user->id}}').text(apr);--}}
                                    {{--$('#total-may-sa-{{$user->id}}').text(may);--}}
                                    {{--$('#total-jun-sa-{{$user->id}}').text(jun);--}}
                                    {{--$('#total-jul-sa-{{$user->id}}').text(jul);--}}
                                    {{--$('#total-aug-sa-{{$user->id}}').text(aug);--}}
                                    {{--$('#total-sep-sa-{{$user->id}}').text(sep);--}}
                                    {{--$('#total-oct-sa-{{$user->id}}').text(oct);--}}
                                    {{--$('#total-nov-sa-{{$user->id}}').text(nov);--}}
                                    {{--$('#total-dec-sa-{{$user->id}}').text(dec);--}}
                                {{--}--}}
                            {{--});--}}


                            {{--//Pipeline--}}
                            {{--$.ajax({--}}
                                {{--url: "/opportunity/account/get_pipeline/{{$user->name}}",--}}
                                {{--type: "get",--}}
                                {{--cache: false,--}}
                                {{--success: function(data){--}}
                                    {{--account_opportunity = data;--}}
                                    {{--var total_account_proposal = null;--}}

                                    {{--$.each(data, function(index, element) {--}}
                                        {{--total_account_proposal += +(element.proposal_amount);--}}
                                        {{--var val = +($('#'+element.estimated_closing_month+'-pl-a-{{$user->id}}').text());--}}
                                        {{--val += +(element.proposal_amount);--}}
                                        {{--$('#'+element.estimated_closing_month+'-pl-a-{{$user->id}}').text(val);--}}
                                    {{--});--}}
                                    {{--$('#ytd_total-pl-a-{{$user->id}}').text(total_account_proposal);--}}
                                    {{--sub_total_sa += total_account_proposal;--}}

                                {{--}--}}
                            {{--});--}}

                            {{--$.ajax({--}}
                                {{--url: "/opportunity/contact/get_pipeline/{{$user->name}}",--}}
                                {{--type: "get",--}}
                                {{--cache: false,--}}
                                {{--success: function(data){--}}
                                    {{--contact_opportunity = data;--}}
                                    {{--var total_contact_proposal = null;--}}

                                    {{--$.each(data, function(index, element) {--}}
                                        {{--total_contact_proposal += +(element.proposal_amount);--}}
                                        {{--var val = +($('#'+element.estimated_closing_month+'-pl-c-{{$user->id}}').text());--}}
                                        {{--val += +(element.proposal_amount);--}}
                                        {{--$('#'+element.estimated_closing_month+'-pl-c-{{$user->id}}').text(val);--}}
                                    {{--});--}}
                                    {{--$('#ytd_total-pl-c-{{$user->id}}').text(total_contact_proposal);--}}
                                    {{--sub_total_sa += total_contact_proposal;--}}
                                    {{--$('#sub_total_pl-{{$user->id}}').text(sub_total_sa);--}}

                                    {{--sub_total += sub_total_sa;--}}
                                    {{--console.log(sub_total);--}}
                                    {{--$('#sub_total-{{$user->id}}').text(sub_total);--}}
                                    {{--sub_total = 0;--}}
                                    {{--sub_total_sa = null;--}}



                                    {{--var jan = +($('#January-pl-a-{{$user->id}}').text()) + +($('#January-pl-c-{{$user->id}}').text());--}}
                                    {{--var feb = +($('#February-pl-a-{{$user->id}}').text()) + +($('#February-pl-c-{{$user->id}}').text());--}}
                                    {{--var mar = +($('#March-pl-a-{{$user->id}}').text()) + +($('#March-pl-c-{{$user->id}}').text());--}}
                                    {{--var apr = +($('#April-pl-a-{{$user->id}}').text()) + +($('#April-pl-c-{{$user->id}}').text());--}}
                                    {{--var may = +($('#May-pl-a-{{$user->id}}').text()) + +($('#May-pl-c-{{$user->id}}').text());--}}
                                    {{--var jun = +($('#June-pl-a-{{$user->id}}').text()) + +($('#June-pl-c-{{$user->id}}').text());--}}
                                    {{--var jul = +($('#July-pl-a-{{$user->id}}').text()) + +($('#July-pl-c-{{$user->id}}').text());--}}
                                    {{--var aug = +($('#August-pl-a-{{$user->id}}').text()) + +($('#August-pl-c-{{$user->id}}').text());--}}
                                    {{--var sep = +($('#September-pl-a-{{$user->id}}').text()) + +($('#September-pl-c-{{$user->id}}').text());--}}
                                    {{--var oct = +($('#October-pl-a-{{$user->id}}').text()) + +($('#October-pl-c-{{$user->id}}').text());--}}
                                    {{--var nov = +($('#November-pl-a-{{$user->id}}').text()) + +($('#November-pl-c-{{$user->id}}').text());--}}
                                    {{--var dec = +($('#December-pl-a-{{$user->id}}').text()) + +($('#December-pl-c-{{$user->id}}').text());--}}

                                    {{--$('#total-jan-pl-{{$user->id}}').text(jan);--}}
                                    {{--$('#total-feb-pl-{{$user->id}}').text(feb);--}}
                                    {{--$('#total-mar-pl-{{$user->id}}').text(mar);--}}
                                    {{--$('#total-apr-pl-{{$user->id}}').text(apr);--}}
                                    {{--$('#total-may-pl-{{$user->id}}').text(may);--}}
                                    {{--$('#total-jun-pl-{{$user->id}}').text(jun);--}}
                                    {{--$('#total-jul-pl-{{$user->id}}').text(jul);--}}
                                    {{--$('#total-aug-pl-{{$user->id}}').text(aug);--}}
                                    {{--$('#total-sep-pl-{{$user->id}}').text(sep);--}}
                                    {{--$('#total-oct-pl-{{$user->id}}').text(oct);--}}
                                    {{--$('#total-nov-pl-{{$user->id}}').text(nov);--}}
                                    {{--$('#total-dec-pl-{{$user->id}}').text(dec);--}}

                                {{--}--}}
                            {{--});--}}

                            {{--//                console.log(sub_total);--}}

                            {{--//sub_total = 0;--}}


                            {{--function viewDetails(id){--}}
                                {{--var array = id.split("-");--}}
                                {{--var month = array[0];--}}
                                {{--var PRD = array[1];--}}
                                {{--var type = array[2];--}}
                                {{--var user_id = array[3];--}}

                                {{--$.ajax({--}}
                                    {{--url: "/dashboard/get-opportunity-data",--}}
                                    {{--type: "get",--}}
                                    {{--data: {--}}
                                        {{--"month": month,--}}
                                        {{--"PRD": PRD,--}}
                                        {{--"type": type,--}}
                                        {{--"user_id": user_id--}}
                                    {{--},--}}
                                    {{--cache: false,--}}
                                    {{--success: function(data){--}}
                                        {{--console.log(data);--}}
                                        {{--$('#modal-body').html('<table id="show-opportunity" class="table table-bordered">\n' +--}}
                                            {{--'                        <tr>\n' +--}}
                                            {{--'                            <th>Name</th>\n' +--}}
                                            {{--'                            <th>Amount</th>\n' +--}}
                                            {{--'                            <th>Estimated Closing Date</th>\n' +--}}
                                            {{--'                            <th>Created At</th>\n' +--}}
                                            {{--'                        </tr>\n' +--}}
                                            {{--'                    </table>');--}}
                                        {{--$.each(data, function(idx, obj) {--}}
                                            {{--$('#show-opportunity').append('<tr> <td> <a target="_blank" href="opportunity/account/details/'+obj.id+'">'+obj.name+'</a> </td> <td>'+obj.proposal_amount+'</td> <td>'+obj.estimated_closing_date+'</td> <td>'+obj.created_at+'</td> </tr>')--}}
                                        {{--});--}}


                                        {{--$('#myModal').modal('toggle');--}}
                                    {{--}--}}
                                {{--});--}}


                            {{--}--}}

                            {{--$('#myModal').on('hidden', function () {--}}
                                {{--$('#show-opportunity').html('');--}}
                            {{--})--}}



                        {{--</script>--}}




                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--@endforeach--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="modal-body" class="modal-body">

                    {{--<table id="show-opportunity" class="table table-bordered">--}}
                        {{--<tr>--}}
                            {{--<th>Name</th>--}}
                            {{--<th>Amount</th>--}}
                            {{--<th>Estimated Closing Date</th>--}}
                            {{--<th>Created At</th>--}}
                        {{--</tr>--}}
                    {{--</table>--}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div id="searchModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="search-modal-body" class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>


    <script>
        function search() {

            search_in = $('#search-in').val();
            search_by = $('#search-by').val();
            search_data = $('#search-data').val();

            if(search_data !== ''){
                $.ajax({
                    url: "/dashboard/search",
                    method: 'post',
                    data: {
                        search_in: search_in,
                        search_by: search_by,
                        search_data: search_data,
                        '_token': '{{csrf_token()}}'
                    },
                    success: function(result){

                        $('#search-modal-body').html('<table id="search-result" class="table table-bordered">\n' +
                            '                        <tr>\n' +
                            '                            <th>Name</th>\n' +
                            '                        </tr>\n' +
                            '                    </table>');
                        $.each(result, function(idx, obj) {

                            if(search_in === 'Account'){
                                $('#search-result').append('<tr> <td> <a target="_blank" href="account/details/'+obj.id+'">'+obj.name+'</a> </td> </tr>')
                            }else if(search_in === 'Contact'){
                                $('#search-result').append('<tr> <td> <a target="_blank" href="contact/details/'+obj.id+'">'+obj.name+'</a> </td> </tr>')
                            }else if(search_in === 'Activity'){
                                $('#search-result').append('<tr> <td> <a target="_blank" href="activity/details/'+obj.id+'">'+obj.activity+'</a> </td> </tr>')
                            }else if(search_in === 'Account Opportunity'){
                                $('#search-result').append('<tr> <td> <a target="_blank" href="opportunity/account/details/'+obj.id+'">'+obj.name+'</a> </td> </tr>')
                            }else if(search_in === 'Contact Opportunity'){
                                $('#search-result').append('<tr> <td> <a target="_blank" href="opportunity/contact/details/'+obj.id+'">'+obj.name+'</a> </td> </tr>')
                            }

                        });

                        $('#searchModal').modal('toggle');


                        $('#search-data').val('');
                    console.log(result);
                }});
            }else{
                alert('Write something in search box');
            }
        }


        $('#search-in').on('change', function() {
            if(this.value === 'Account Opportunity' || this.value === 'Contact Opportunity' || this.value === 'Activity'){
                $('#search-by').html('<option>Name</option>');
            }else{
                $('#search-by').html('<option>Name</option> <option>Phone</option> <option>Email</option>');
            }
        });

    </script>


@endsection