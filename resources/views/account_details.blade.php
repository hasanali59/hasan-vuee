@extends('layouts.layout')

@section('title', 'Account Details')

@section('content')

    <div class="container">
        <div class="card" style="margin: 30px 0">
            <div class="card-header">
                {{$account->name}}
            </div>
            <div class="card-body">
                <a href="/account" class="btn btn-info">Back</a>

                @if($current_user_type == "admin")
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit">Edit</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-opportunity">Add Opportunity</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-contact">Add Contact</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-note">Add Note</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-activity">Add Activity</button>
                    <button onclick="confirmDelete()" class="btn btn-info" >Delete</button>
                @elseif($current_user_type == "user" and $current_user == $account->created_by)
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit">Edit</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-opportunity">Add Opportunity</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-contact">Add Contact</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-note">Add Note</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-activity">Add Activity</button>
                @endif
                <br>
                <label style="margin-top: 15px">Address:</label> {{$account->address}}<br>
                <label>Cty:</label> {{$account->city}}<br>
                <label>State:</label> {{$account->state}}<br>
                <label>Country:</label> {{$account->country}}<br>
                <label>Zip Code:</label> {{$account->zipcode}}<br>
                <label>Main Number:</label> {{$account->main_number}}<br>
                {{--<label>Company Email:</label> <a href="mailto:{{$account->company_email}}">{{$account->company_email}}</a> <br>--}}
                <label>Main Point Of Contact:</label> {{$account->main_point_of_contact}}<br>
                <label>Billing Address:</label> {{$account->billing_address}}<br>
                <label>Billing City:</label> {{$account->billing_city}}<br>
                <label>Billing State:</label> {{$account->billing_state}}<br>
                <label>Billing Country:</label> {{$account->billing_country}}<br>
                <label>Billing Email:</label> {{$account->billing_email}}<br>
                <label>Billing Phone:</label> {{$account->billing_phone}}<br>
                <label>Account Development Plan:</label> {{$account->account_development_plan}}<br>
                <label>National Account Manager:</label> <a href="/viewprofile/{{$account['user']->id}}">{{$account['user']->name}}</a><br>
                <label>ISDR:</label> {{$account->ISDR}}<br>
                <label>Notes And Comments:</label> @if(!empty($note->notes_and_comments)) {{$note->notes_and_comments}} @endif<br>
                <a href="#" data-toggle="modal" data-target="#view-note">View History</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Related Contacts
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Job Title</th>
                                <th>Contact Number</th>
                            </tr>

                            @foreach($contacts as $contact)
                                <tr>
                                    <td> <a href="/contact/details/{{$contact->id}}">{{$contact->name}}</a> </td>
                                    <td>{{$contact->company_email}}</td>
                                    <td>{{$contact->job_title}}</td>
                                    <td>{{$contact->cell_number}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>


            <div class="col">
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
                                    <td> <a href="/opportunity/account/details/{{$opportunity->id}}">{{$opportunity->name}}</a> </td>
                                    <td>{{$opportunity->proposal_amount}}</td>
                                    <td>{{$opportunity->estimated_closing_date}}</td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
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
                    <form action="/account/edit" class="register-form" method="post">
                        @csrf

                        <input type="hidden" value="{{$account->id}}" name="id">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$account->name}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea type="text" class="form-control" name="address" required>{{$account->address}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" value="{{$account->city}}" required>
                                </div>

                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control" name="state" value="{{$account->state}}" required>
                                </div>

                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" name="country" value="{{$account->country}}" required>
                                </div>

                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input type="text" class="form-control" name="zipcode" value="{{$account->zipcode}}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="text" class="form-control" name="website" value="{{$account->website}}" required>
                                </div>

                                <div class="form-group">
                                    <label>Main Number</label>
                                    <input type="text" class="form-control" name="main_number" value="{{$account->main_number}}" required>
                                </div>

                                {{--<div class="form-group">--}}
                                    {{--<label>Company Email</label>--}}
                                    {{--<input type="email" class="form-control" name="company_email" value="{{$account->company_email}}" required>--}}
                                {{--</div>--}}

                                <div class="form-group">
                                    <label>Main Point Of Contact</label>
                                    <input type="text" class="form-control" name="main_point_of_contact" value="{{$account->main_point_of_contact}}" required>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Billing Address</label>
                                    <input type="text" class="form-control" name="billing_address" value="{{$account->billing_address}}">
                                </div>

                                <div class="form-group">
                                    <label>Billing City</label>
                                    <input type="text" class="form-control" name="billing_city" value="{{$account->billing_city}}">
                                </div>

                                <div class="form-group">
                                    <label>Billing State</label>
                                    <input type="text" class="form-control" name="billing_state" value="{{$account->billing_state}}">
                                </div>

                                <div class="form-group">
                                    <label>Billing Country</label>
                                    <input type="text" class="form-control" name="billing_country" value="{{$account->billing_country}}">
                                </div>

                                <div class="form-group">
                                    <label>Billing Email</label>
                                    <input type="email" class="form-control" name="billing_email" value="{{$account->billing_email}}">
                                </div>

                                <div class="form-group">
                                    <label>Billing Phone</label>
                                    <input type="text" class="form-control" name="billing_phone" value="{{$account->billing_phone}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Account Development Plan</label>
                                    <textarea type="text" class="form-control" name="account_development_plan">{{$account->account_development_plan}}</textarea>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>National Account Manager</label>
                                    <input type="text" class="form-control" name="national_account_manager" value="{{$account->national_account_manager}}" required>
                                </div>

                                <div class="form-group">
                                    <label>ISDR</label>
                                    <input type="text" class="form-control" name="isdr" value="{{$account->ISDR}}">
                                </div>
                            </div>
                        </div>

                        {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label>Notes And Comments</label>--}}
                                    {{--<textarea type="text" class="form-control" name="notes_and_comments">{{$account->notes_and_comments}}</textarea>--}}
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
                    <h4 class="modal-title">Add Opportunity</h4>
                </div>
                <div class="modal-body">
                    <form action="/account/add-opportunity" class="register-form" method="post">
                        @csrf

                        <input type="hidden" value="{{$account->id}}" name="account_id">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Contact*</label>
                                    <select class="form-control form-control-alternative" name="contact_id">
                                        @foreach($contacts as $contact)
                                            <option value="{{$contact->id}}">{{$contact->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

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
                                <input type="number" min="0" class="form-control"  name="number_of_learners" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Proposal Amount*</label>
                                <input type="number" min="0" class="form-control"  name="proposal_amount" required>
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

    <div class="modal fade" id="add-contact" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <form action="/contact" class="register-form" method="post">
                        @csrf



                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Account*</label>
                                    <select class="form-control" name="account_id">
                                        <option value="{{$account->id}}">{{$account->name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea type="text" class="form-control" name="address"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>City*</label>
                                    <input type="text" class="form-control" name="city" required>
                                </div>

                                <div class="form-group">
                                    <label>State*</label>
                                    <input type="text" class="form-control" name="state" required>
                                </div>

                                <div class="form-group">
                                    <label>Country*</label>
                                    <select class="form-control" name="country">
                                        <option value="United States" selected>United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-leste">Timor-leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Zip Code*</label>
                                    <input type="text" class="form-control" name="zipcode" required>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cell Number*</label>
                                    <input type="text" class="form-control" name="cell_number" required>
                                </div>

                                <div class="form-group">
                                    <label>Main Number*</label>
                                    <input type="text" class="form-control" name="main_number" required>
                                </div>

                                <div class="form-group">
                                    <label>Company Email*</label>
                                    <input type="email" class="form-control" name="company_email" required>
                                </div>

                                <div class="form-group">
                                    <label>Job Title*</label>
                                    <input type="text" class="form-control" name="job_title" required>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Recent Enrollment</label>
                                    <textarea type="text" class="form-control" name="recent_enrollment" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Opportunity Details</label>
                                    <textarea type="text" class="form-control" name="opportunity_details" required></textarea>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>National Account Manager*</label>
                                    <input type="text" readonly class="form-control" name="national_account_manager" value="{{Session::get('user.name')}}" required>
                                </div>

                                <div class="form-group">
                                    <label>ISDR</label>
                                    <input type="text" class="form-control" name="isdr" >
                                </div>
                            </div>
                        </div>

                        <hr>

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
                    <form action="/account/add-notes" class="register-form" method="post">
                        @csrf

                        <input type="hidden" value="{{$account->id}}" name="id">
                        <input type="hidden" value="account" name="type">

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

                    @if(!empty($activity_histories[0]))
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

                    <form action="/account/add-activity" class="register-form" method="post">
                        @csrf

                        <input type="hidden" value="{{$account->id}}" name="id">
                        <input type="hidden" value="account" name="type">

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
                $.ajax({url: "/account/delete/{{$account->id}}", success: function(result){
                    window.location.replace("/account");
                }});
            } else {
                // Do nothing!
            }
        }
    </script>

@endsection