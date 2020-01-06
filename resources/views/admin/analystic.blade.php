@extends('admin.layouts.app')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper row admin-content">
        <div class="col-lg-12 filter_content">
			<div class="col-lg-6">
				<form method="POST" action="" id="filter_form">
                    {{ csrf_field() }}
                    
                </form>
            </div> 
        </div>
        <div class="col-lg-12">
            <div class="col-lg-6">
                <div class="user_info data_items">
                    <p class="userdata_title">User Info</p>
                    <div class="data_item">
                        <span class="data_description">Total Signups</span>
                        <span class="data_info">{{$user_count}}</span>
                    </div>
                    <div class="data_item">
                        <span class="data_description">Total Time Spent on 2HEX</span>
                        <span class="data_info"></span>
                    </div>
                    <div class="data_item">
                        <span class="data_description">Total Uploaded File</span>
                        <span class="data_info"></span>
                    </div>
                    <div class="data_item">
                        <span class="data_description">Total Orders Saved</span>
                        <span class="data_info">{{$order_count}}</span>
                        
                    </div>
                </div>
                <div class="user_session data_items">
                    <p class="userdata_title"></p>
                    
                </div>
            </div>
        </div>
        
    </div>
@endsection
