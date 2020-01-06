@extends('admin.layouts.app')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper row admin-content">
        <div class="col-lg-12 filter_content">
            <div class="col-lg-6">
                <form method="POST" action="" id="filter_form">
                    {{ csrf_field() }}
                    <p>Select User by Email</p>
                    <select
						class="form-control filter_email select2"
						id="filter_email"
						name="filter_email"
						style="width:100%;"
					>
						<option value="" disabled>SELECT</option>
                        @foreach($users as $userinfo)
                            <option @if(Auth::user()->email == $userinfo->email) {{"selected"}} @endif value="{{$userinfo->email}}">{{$userinfo->name}}  ({{$userinfo->email}})</option>    
                        @endforeach
    				</select>
                </form>
            </div> 
        </div>
        @if(isset($user) )
        <div class="col-lg-6">
            <div class="user_info data_items">
                <p class="userdata_title">User Info</p>
                <div class="data_item">
                    <span class="data_description">Signup Date</span>
                    <span class="data_info">{{$user->created_at}}</span>
                </div>
                <div class="data_item">
                    <span class="data_description">Last Login</span>
                    <span class="data_info"></span>
                </div>
                <div class="data_item">
                    <span class="data_description">Total Uploaded File</span>
                    <span class="data_info"></span>
                </div>
                <div class="data_item">
                    <span class="data_description">Size of Total Uploaded File</span>
                    <span class="data_info"></span>
                </div>
            </div>
            <div class="user_session data_items">
                <p class="userdata_title">Sessions</p>
                <div class="data_item">
                    <span class="data_description">Days within selected timeframe</span>
                    <span class="data_info"></span>
                </div>
                <div class="data_item">
                    <span class="data_description">Total time within selected timeframe</span>
                    <span class="data_info"></span>
                </div>
                <div class="data_item">
                    <span class="data_description">Click within selected timeframe</span>
                    <span class="data_info"></span>
                </div>
                <div class="data_item">
                    <span class="data_description">Uploaded files within selected timeframe</span>
                    <span class="data_info"></span>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            @if(isset($shipinfo))
            <div class="user_address data_items">
                <p class="userdata_title">My Address</p>
                <label class="items_label">Invoice Address</label>
                <div class="data_item">
                    <span class="data_description">Company Name</span>
                    <span class="data_info">{{$shipinfo->invoice_company}}</span>
                </div>
                <div class="data_item">
                    <span class="data_description">Full Name</span>
                    <span class="data_info">{{$shipinfo->invoice_name}}</span>
                </div>
                <div class="data_item">
                    <span class="data_description">Country </span>
                    <span class="data_info">{{$shipinfo->invoice_country}}</span>
                </div>
                <div class="data_item">
                    <span class="data_description">Tax ID</span>
                    <span class="data_info">{{$shipinfo->invoice_taxid}}</span>
                </div>
                <br/>
                <label class="items_label">Shipping Address</label>
                <div class="data_item">
                    <span class="data_description">Company Name</span>
                    <span class="data_info">{{$shipinfo->shipping_company}}</span>
                </div>
                <div class="data_item">
                    <span class="data_description">Address</span>
                    <span class="data_info">{{$shipinfo->shipping_address}}</span>
                </div>
                <div class="data_item">
                    <span class="data_description">City</span>
                    <span class="data_info">{{$shipinfo->shipping_city}}</span>
                </div>
                <div class="data_item">
                    <span class="data_description">State</span>
                    <span class="data_info">{{$shipinfo->shipping_state}}</span>
                </div>
                <div class="data_item">
                    <span class="data_description">Postcode</span>
                    <span class="data_info">{{$shipinfo->shipping_postcode}}</span>
                </div>
                <div class="data_item">
                    <span class="data_description">Country</span>
                    <span class="data_info">{{$shipinfo->shipping_country}}</span>
                </div>
                <div class="data_item">
                    <span class="data_description">Contact Person</span>
                    <span class="data_info">{{$shipinfo->shipping_contactperson}}</span>
                </div>
                <div class="data_item">
                    <span class="data_description">Phone No</span>
                    <span class="data_info">{{$shipinfo->shipping_phone}}</span>
                </div>
            </div>
            @endif
            <div class="user_detail data_items">
                <p class="userdata_title">My Details</p>
                <div class="data_item">
                    <span class="data_description">Full Name</span>
                    <span class="data_info">{{$user->name}}</span>
                </div>
                <div class="data_item">
                    <span class="data_description">Position in Company</span>
                    <span class="data_info">{{$user->position}}</span>
                </div>
                <div class="data_item">
                    <span class="data_description">Company Name</span>
                    <span class="data_info">{{$user->company_name}}</span>
                </div>
                <div class="data_item">
                    <span class="data_description">Phone No</span>
                    <span class="data_info">{{$user->phone_num}}</span>
                </div>
                <div class="data_item">
                    <span class="data_description">Email</span>
                    <span class="data_info">{{$user->email}}</span>
                </div>
            </div>
        </div>
        @else
        <div class="col-lg-12">
            <h2>No User Selected</h2>
        </div>
        @endif
    </div>
@endsection