@extends('admin.layouts.app')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper row admin-content">
        <div class="col-lg-12 filter_content">
			<div class="col-lg-6">
				<form method="POST" action="" id="filter_form">
                    {{ csrf_field() }}
                    <p>Select Timeframe</p>
                    <div class="row">
                        <div class='col-md-5'>
                            <div class="form-group">
                                <input type='text' class="form-control" name="startdate" id='startdate' value="{{$startdate}}"/>
                            </div>
                        </div>
                        <div class='col-md-5'>
                            <div class="form-group">
                                <input type='text' class="form-control" name="enddate" id='enddate' value="{{$enddate}}"/>
                            </div>
                        </div>
                    </div>
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
                        <span class="data_info">{{floor($total_time/3600)}}:{{floor(($total_time%3600)/60)}}:{{floor($total_time%60)}}</span>
                    </div>
                    <div class="data_item">
                        <span class="data_description">Total Uploaded File</span>
                        <span class="data_info">{{$filecount}}</span>
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
