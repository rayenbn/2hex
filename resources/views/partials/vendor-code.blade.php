<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
	<div class="m-alert__icon">
		<i class="flaticon-businesswoman m--font-brand"></i>
	</div>
	<div class="m-alert__text">
		<form 
			class="m-form m-form--fit m-form--label-align-right" 
			id="vendor-code-form" 
			action="{{ route('vendor.code.apply') }}"
			method="POST" 
		>
			<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
			<div class="m-portlet__body">
				<div class="row">
					<div class="col-3" style="min-width:150px;">
						<input class="form-control m-input" type="text" value="" placeholder="Vendor Code" name="promocode">
					</div>
					<button type="submit" class="btn btn-secondary m-btn m-btn--icon m-btn--air" id="vendor-code-btn">
						Add
					</button>
				</div>
			</div>
		</form>
	</div>
</div>