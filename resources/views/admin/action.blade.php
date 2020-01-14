@extends('admin.layouts.app')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper row admin-content">
        <div class="col-lg-12 filter_content">
            <form method="POST" action="" id="filter_form">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6">
                        
                            
                            <p>Select User by Email</p>
                            <select
                                class="form-control filter_email select2"
                                id="filter_email"
                                name="filter_email"
                                style="width:100%;"
                            >
                                <option value="" disabled>SELECT</option>
                                @foreach($users as $userinfo)
                                    <option @if($user->email == $userinfo->email) {{"selected"}} @endif value="{{$userinfo->email}}">{{$userinfo->name}}  ({{$userinfo->email}})</option>    
                                @endforeach
                            </select>
                            <input type="hidden" name="order_id" id="order_id">
                            
                        </form>
                    </div> 

                    <div class="col-lg-6">
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
                    </div>
                </div>
            </form> 
        </div>
        <div class="col-lg-12">
            <div class="m-portlet">
				<div class="m-portlet__body">
					<div class="pane pane--table2">
					<table class="table table-striped- table-bordered table-hover table-checkable" id="summary-table">
							<thead style="background-color: #52a3f0; color: white;">
								<tr>
                                    <td colspan="3">Date</td>
									<td colspan="3">Time</td>
                                    <td colspan="6">User</td>
                                    <td colspan="10">Action</td>
								</tr>
						   	</thead>

                            @foreach($sessions as $key => $session)
                                <tr>
                                    <td colspan="3">{{ substr($session['created_at'],0,10) }}</td>
                                    <td colspan="3">{{ substr($session['created_at'],10) }}</td>
                                    <td colspan="6">{{ $session['email'] }}</td>
                                    <td colspan="10">{{ $session['action'] }}</td>
                                </tr>
							@endforeach

					</table>
					</div>
				</div>
            </div>
        </div>
        
    </div>
@endsection
