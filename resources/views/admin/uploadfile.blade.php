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
                                    <td colspan="1">Select</td>
                                    <td colspan="1">No</td>
									<td colspan="3">Print File</td>
                                    <td colspan="6">Product</td>
                                    <td colspan="3">Color</td>
                                    <td colspan="3">Color Codes</td>
                                    <td colspan="10">Step</td>
                                    <td colspan="6">Date</td>
                                    <td colspan="6">Time</td>
                                    <td colspan="6">Size</td>
								</tr>
						   	</thead>

                            @foreach($fees as $key => $group)
                                <tr class="@if(isset($group['paid_date']) && $group['paid_date']) paid @endif">
                                    <td colspan="1">
                                        <input type="checkbox" class="form-control fileCheckbox" name="uploadUpdate[]" value="{{$group['image']}}" link="{{$group['path']}}" imagename="{{$group['image']}}" created="{{$group['created_by']}}">
                                    </td>
                                    <td colspan="1">{{$key + 1}}</td>
                                    <td colspan="3">{{ $group['image'] }} <br/> @if(isset($group['paid_date']) && $group['paid_date']) Paid on {{$group['paid_date']}} @endif </td>
                                    <td colspan="6">{{ $group['product'] }}</td>
                                    <td colspan="3">{{ isset($group['color_qty'])?$group['color_qty']?$group['color_qty']:0:0 }}</td>
                                    <td colspan="3">{{ isset($group['color_code'])?$group['color_code']?$group['color_code']:0:0 }}</td>
                                    <td colspan="10">{{ $group['type'] }}</td>                                    
                                    <td colspan="6">{{ substr($group['date'],0,10) }}</td>
                                    <td colspan="6">{{ substr($group['date'],10) }}</td>
                                    <td colspan="6">{{ $group['size'] }}</td>
                                </tr>
							@endforeach
                            <tr>
                                <td colspan="39" class="text-center">Total storage size of users’ files</td>
                                <td colspan="6">{{ $totalsize }}</td>
                            </tr>
                    </table>
                    <div class="action-buttons">
                        <button class="btn btn-primary download_all">Download Files</button>
                        <button class="btn btn-primary" id="delete-file">Delete Files</button>
                        <button class="btn btn-primary" id="delete-date">Delete Date</button>
                        <button class="btn btn-primary" id="delete-code">Delete Color Codes</button> 
                    </div>
                    <div class="action-buttons">
                        <input type="text" class="form-control col-4" placeholder="Add Color Codes sperated by demical points">
                        <button class="btn btn-primary" id="add-color-code">Add</button>
                    </div>
                    <div class="action-buttons">
                        <input type="text" class="form-control col-3" id="add_date" placeholder="Select Date">
                        <button class="btn btn-primary" id="add-color-date">Add</button><br/>
                    </div>
                    <div class="action-buttons">
                        <input type="text" class="form-control col-3" placeholder="Add Color Quantity">
                        <button class="btn btn-primary" id="add-color-qty">Add</button><br/>
                    </div>
					</div>
				</div>
            </div>

        </div>
        
    </div>
@endsection
