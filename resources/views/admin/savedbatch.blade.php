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
                            <option @if($user->email == $userinfo->email) {{"selected"}} @endif value="{{$userinfo->email}}">{{$userinfo->name}}  ({{$userinfo->email}})</option>    
                        @endforeach
					</select>
					<input type="hidden" name="order_id" id="order_id">
                </form>
            </div> 
        </div>
        <div class="col-lg-12">
            <div class="form-group m-form__group row">
                <div class="col-12 ml-auto">
                    <h3 class="m-form__section">Saved Batches</h3>
                </div>

                <form action="/add_summary" method="post" class="m-form m-form--fit m-form--label-align-right post-forms">
                {{ csrf_field() }}
                <table class="table table-striped- table-bordered table-hover table-checkable table-responsive" id="summary-table">
                    @if(count($savedOrderBatches) > 0)
                        @include('partials.skateboards', ['skateboards' => $savedOrderBatches, 'batches' => 1, 'fees' => $fees])
                    @endif
                    @if(count($savedGripBatches) > 0)
                        @include('partials.grips', ['grips1' => $savedGripBatches, 'batches' => 1, 'fees' => $fees])
                    @endif

                    @if(count($savedWheelBatches) > 0)
                        @include('partials.wheels', ['wheels1' => $savedWheelBatches, 'batches' => 1, 'fees' => $fees])
                    @endif
                </table>
                    <button type="submit" name="submit" value="Add" class="btn btn-outline-info">Add to Summary</button>
                    &nbsp &nbsp
                    <button type="submit" name="submit" value="Delete" class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>
        
    </div>
@endsection
