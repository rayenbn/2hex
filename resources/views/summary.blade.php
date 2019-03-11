@extends('layouts.app')

@section('content')
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
		<div class="m-subheader ">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="m-subheader__title m-subheader__title--separator">ORDER SUMMARY</h3>
					<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
						<li class="m-nav__item m-nav__item--home">
							<a href="#" class="m-nav__link m-nav__link--icon">
								<i class="m-nav__link-icon la la-home"></i>
							</a>
						</li>
						<li class="m-nav__separator">-</li>
						<li class="m-nav__item">
							<a href="index.html" class="m-nav__link">
								<span class="m-nav__link-text">Products</span>
							</a>
						</li>
						<li class="m-nav__separator">-</li>
						<li class="m-nav__item">
							<a href="skateboard-manufacturer/skateboard-deck-manufacturer.html" class="m-nav__link">
								<span class="m-nav__link-text">Skateboard Decks</span>
							</a>
						</li>
						<li class="m-nav__separator">-</li>
						<li class="m-nav__item">
							<a href="skateboard-manufacturer/skateboard-deck-configurator.html" class="m-nav__link">
								<span class="m-nav__link-text">Online Order</span>
							</a>
						</li>
                        <li class="m-nav__separator">-</li>
						<li class="m-nav__item">
							<a href="summary.html" class="m-nav__link">
								<span class="m-nav__link-text">Summary</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
        
        
		<!-- END: Subheader -->
		<div class="m-content">
			
            
			<div class="m-portlet">
				<div class="m-portlet__head" style="flex-wrap: wrap;height: auto;float: right;">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
						</div>
					</div>
					<div class="m-portlet__head-tools" style="flex-wrap:wrap;">
						<ul class="m-portlet__nav">
							<li class="m-portlet__nav-item">
								<a href="#" class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--air">
									<span>
										<i class="la la-cart-plus"></i>
										<span>Add Batch</span>
									</span>
								</a>
							</li>
						</ul>
                        
                        <ul class="m-portlet__nav">
							<li class="m-portlet__nav-item">
								<a href="profile.html#m_user_profile_tab_2" class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--air">
									<span>
										<i class="la la-ship"></i>
										<span>Check Address</span>
									</span>
								</a>
							</li>
						</ul>
                        
                        
					</div>
      
				</div>
				<div class="m-portlet__body">

					<!--begin: Datatable (color options: #4CAF50, #586ad5, #8933eb, #52a3f0 or #60bca4) -->
					<table class="table table-striped- table-bordered table-hover table-checkable table-responsive table-sm">
						<thead style="background-color: #52a3f0; color: white;">
							<tr>
                                
                                <th>Batch</th>
								<th>Pcs</th>
								<th>Size</th>
								<th>Concave</th>
								<th>Wood</th>
								<th>Glue</th>
								<th>Print</th>
								<th>Top Engravery</th>
								<th>Veneer&nbspColors</th>
								<th>Specials</th>
								<th>Cardboard Wrap</th>
                                <th>Carton Print</th>
                                <th>Deck&nbspPrice</th>
                                <th>Batch&nbspTotal</th>
							</tr>
						</thead>
                        
						<tbody>
							<tr>
								<td>1</td>
								<td>60</td>
								<td><b>8.0"&nbsp;x&nbsp;31.375"</b><br><br>
                                    Wheelbase:&nbsp;14.02"<br>
                                    Nose:&nbsp;N6.87"<br>
                                    Tail:&nbsp;6.32"<br>
                                    (Shape&nbsp;H2)
                                </td>
								<td>Medium Concave</td>
								<td>US Maple Wood</td>
								<td>Resin Glue</td>

                                <td>
                                    <b>Bottom</b><br>
                                    SupermanV2.ai<br>
									<hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                                    <b>Top</b><br>
                                    SupermanV2.ai
                                </td>

                                <td>None</td>
								<td>
                                    <ol style="padding-left:0; list-style-position:inside;">
                                        <li>Random</li>
                                        <li>Random</li>
                                        <li>Random</li>
                                        <li>Random</li>
                                        <li>Random</li>
                                        <li>Random</li>
                                        <li>Random</li>
                                    </ol>
								<td>None</td>
								<td>None</td>
								<td>CartonDesignV1.pdf</td>
								<td>$16.35</td>
								<td>$892.70</td>
							</tr>


                            
                            
                            
                            
                            
							<tr>
								<td>2</td>
								<td>60</td>
								<td><b>8.25"&nbsp;x&nbsp;31.75"</b><br>
                                <br>
                                Wheelbase:&nbsp;14.5"<br>
                                    Nose:&nbsp;N6.65"<br>
                                    Tail:&nbsp;6.42"<br>
                                    (Shape&nbsp;J1)
                                
                                </td>
								<td>Deep Concave</td>
								<td>EU Maple Wood</td>
								<td>Epoxy Glue</td>
                                
                                <td>
                                    <b>Bottom</b><br>
                                    CondorflightV1.ai<br>
                                    <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                                    <b>Top</b><br>
                                    CondorTop.ai
                                </td>
                                
								<td>None</td>
                                
								<td>
                                    <ol style="padding-left:0; list-style-position:inside; display:inline;">
                                        <li>Blue&nbsp;012</li>
                                        <li>Random</li>
                                        <li>Random</li>
                                        <li>Blue&nbsp;001</li>
                                        <li>Random</li>
                                        <li>Random</li>
                                        <li>Blue&nbsp;012</li>
                                    </ol>
                                </td>
                                
								<td>
                                     Fulldip:&nbsp;P254367<br>
									<hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                                     Top&nbsp;Fiberglas
									<hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                                    Mid&nbsp;Fiberglas
                                </td>
                                
								<td>None</td>
								<td>CartonDesignV1.pdf</td>
								<td>$21.20</td>
								<td>$1,392.40</td>
							</tr>
                            
                            

                            
                            
                            <thead style="background-color: #52a3f0; color: white;">
							<tr>
								<td colspan="3">Fixed Cost</td>
								<td colspan="3">Batches</td>
								<td colspan="7">Filename</td>
								<td>Fixed&nbspTotal</td>
							</tr>
						   </thead>
                            
                            <tr>
								<td colspan="3">Bottom Print</td>
								<td colspan="3">1, 2, 3</td>
								<td colspan="7">supermanV2.ai</td>
								<td>$120.00</td>
							</tr>
                            <tr>
								<td colspan="3">Delivery</td>
								<td colspan="3">All</td>
								<td colspan="7">Global Delivery</td>
								<td>$800.00</td>
							</tr>
						<tr>
							<td colspan="6">Vendor Code</td>
                            <td colspan="7">VbnjjHhSk8cC</td>
							<td>- $50.00</td>
						</tr>
						<tr>
							<td colspan="14"></td>
						</tr>

                            
                            
                            
                            
						</tbody>
					</table>
					<div class="m-portlet__head" style="padding-left:0;flex-wrap: wrap;">
					
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title" style="padding-left: 20px;">
									<h3 class="m-portlet__head-text">
										ORDER TOTAL: $3,155.10
									</h3>
								</div>
							</div>
								
							<div class="m-portlet__head-tools">
								<ul class="m-portlet__nav">
									
									<li class="m-portlet__nav-item">
										<a href="profile.html" class="btn btn-secondary m-btn m-btn--custom m-btn--icon">
											<span>
												<i class="la la-save"></i>
												<span>save for later</span>
											</span>
										</a>
									</li>
									
									
									<li class="m-portlet__nav-item">
										<a href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
											<span>
												<i class="la la-rocket"></i>
												<span>SUBMIT</span>
											</span>
										</a>
									</li>
									
								</ul>
							</div>
						
						
					</div>
                   
				</div>
            </div>

			<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
				<div class="m-alert__icon">
					<i class="flaticon-exclamation m--font-brand"></i>
				</div>
				<div class="m-alert__text">
                    <font style="color: red">WARNING: Your total order quantity is less than 50 Decks. Please add more decks to run a custom production. For orders of 40 Decks or less we use blank decks from our stock. This means that you can only choose the decks' width, concave and print. <b>(Note to Developer: This red warning should only be shown for orders of 40 decks or less.)</b></font><br>
					This is a summary of your complete order. Please make sure that everything including your address and contact information is correct before submitting.
				</div>
			</div>


			<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
				<div class="m-alert__icon">
					<i class="flaticon-businesswoman m--font-brand"></i>
				</div>
				<div class="m-alert__text">
					<form class="m-form m-form--fit m-form--label-align-right">
						<div class="m-portlet__body">
							<div class="row">

								<div class="col-3" style="min-width:150px;">
									<input class="form-control m-input" type="text" value="Vendor Code">
								</div>

									<a href="#" class="btn btn-secondary m-btn m-btn--icon m-btn--air">
									<span>
										<span>Add</span>
									</span>
									</a>

							</div>
						</div>
					</form>
				</div>
			</div>
            
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
@endsection