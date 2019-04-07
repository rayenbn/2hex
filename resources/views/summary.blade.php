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
							<a href="/" class="m-nav__link">
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
							<a href="/skateboard-deck-configurator" class="m-nav__link">
								<span class="m-nav__link-text">Online Order</span>
							</a>
						</li>
                        <li class="m-nav__separator">-</li>
						<li class="m-nav__item">
							<a href="/summary" class="m-nav__link">
								<span class="m-nav__link-text">Summary</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
        
        
		<!-- END: Subheader -->
		<div class="m-content">
			
			@if(session()->has('success'))
				<div 
					class="alert alert-brand m-alert m-alert--icon m-alert--air m-alert--square m--margin-bottom-30" 
					role="alert"
					style="background-color: #008000;"
				>
	                <div class="m-alert__icon">
	                    <i class="flaticon-exclamation-1"></i>
	                </div>
	                <div class="m-alert__text">
	                    {{session()->get('success')}}
	                </div>
	            </div>		
			@endif
            
			<div class="m-portlet">
				<div class="m-portlet__head" style="flex-wrap: wrap;height: auto;float: right;">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
						</div>
					</div>
					<div class="m-portlet__head-tools" style="flex-wrap:wrap;">
						@if(Session::get('viewonly') == null)
						<ul class="m-portlet__nav">
							<li class="m-portlet__nav-item">
								<a href="/skateboard-deck-configurator" class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--air">
									<span>
										<i class="la la-cart-plus"></i>
										<span>Add Batch</span>
									</span>
								</a>
							</li>
						</ul>
                        
                        <ul class="m-portlet__nav">
							<li class="m-portlet__nav-item">
								<a href="profile#m_user_profile_tab_2" class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--air">
									<span>
										<i class="la la-ship"></i>
										<span>Check Address</span>
									</span>
								</a>
							</li>
						</ul>
                        @endif
                        
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
                                @if(Session::get('viewonly') == null)
                                <th>Edit</th>
                                <th>Remove</th>
                                @endif
							</tr>
						</thead>
                        
						<tbody>
							<?php 
								$total_price = 0; 
								$total_qty = 0; 
								$batch = 0; 
								$filename = []; 
								$isfilehere = []; 
								$fixedprice = 0; 
								$type=[];
								setlocale(LC_MONETARY, 'en_US');
							?>
							@foreach($orders as $order)
							<?php $total_price += $order->total; $total_qty += $order->quantity;?>
							<tr>
								<td>{{++$batch}}</td>
								<td>{{$order->quantity}}</td>
								<td>{{$order->size}}
                                </td>
								<td>{{$order->concave}}</td>
								<td>{{$order->wood}}</td>
								<td>{{$order->glue}}</td>

                                <td>
                                    <b>Bottom</b><br>
                                    {{$order->bottomprint?$order->bottomprint:'None'}}<br>
									<hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                                    <b>Top</b><br>
                                    {{$order->topprint?$order->topprint:'None'}}
                                </td>

                                <td>{{$order->engravery?$order->engravery:'None'}}</td>
								<td>
                                    <ol style="padding-left:0; list-style-position:inside;">
                                    	
                                    
                                    	@foreach(json_decode($order->veneer) as $veneer)
                                        <li>{{$veneer}}</li>
                                       	@endforeach 

                                    </ol>
                                </td>
                                <td>
                                	<?php $count = 0 ?>
                                	@foreach(json_decode($order->extra) as $index => $extra)
                                	 @if($extra->state == true)
                                	 	@if($count != 0)
                                     		<hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px">
                                     	@endif
                                     	{{$index}}{{isset($extra->color)?' : '.$extra->color:''}}<br>
                                     	<?php $count ++ ?>
                                     @endif
                                    @endforeach
                                </td>
								<td>{{$order->cardboard?$order->cardboard:'None'}}</td>
								<td>{{$order->carton?$order->carton:'None'}}</td>
								<td>{{ auth()->check() ? money_format('$%.2n', $order->perdeck) : '$?.??' }}</td>
								<td>{{ auth()->check() ? money_format('$%.2n', $order->total) : '$?.??' }}</td>
								@if(Session::get('viewonly') == null)
								<td><a href="skateboard-deck-configurator/{{$order->id}}" class="btn btn-success">Edit</a></td>
								<td><a href="skateboard-remove/{{$order->id}}" class="btn btn-danger">Remove</a></td>
								@endif
								@php
									$here = 0;
                                  	if($order->bottomprint != ""){
                                  		$filename[] = $order->bottomprint;
                                  		$fixedprice += 120; 
                                  		$here = 1;
                                  	}
                                  	if($order->topprint != ""){
                                  		$filename[] = $order->topprint;
                                  		$fixedprice += 120;
                                  		$here = 1;
                                  	}
                                  	if($order->engravery != ""){
                                  		$filename[] = $order->engravery;
                                  		$fixedprice += 80;
                                  		$here = 1;
                                  	}
                                  	if($order->cardboard != ""){
                                  		$filename[] = $order->cardboard;
                                  		$fixedprice += 500;
                                  		$here = 1;
                                  	}
                                  	if($order->carton != ""){
                                  		$filename[] = $order->carton;
                                  		$fixedprice += 120;
                                  		$here = 1;
                                  	}
                                  	if($here == 1)
                                  		$isfilehere[] = $batch;
                                @endphp
							</tr>
							@endforeach                          

                            
                            
                            <thead style="background-color: #52a3f0; color: white;">
							<tr>
								<td colspan="3">Fixed Cost</td>
								<td colspan="3">Batches</td>
								<td colspan="9">Filename</td>
								<td>Fixed&nbspTotal</td>
							</tr>
						   </thead>
                            
                            <tr>
								<td colspan="3">Print</td>
								<td colspan="3">{{implode(',', $isfilehere)}}</td>
								<td colspan="9">{{implode(',', $filename)}}</td>
								<td>{{ auth()->check() ? money_format('$%.2n', $fixedprice) : '$?.??' }}</td>
							</tr>
                            <!-- <tr>
								<td colspan="3">Delivery</td>
								<td colspan="3">All</td>
								<td colspan="9">Global Delivery</td>
								<td>$800.00</td>
							</tr>
						<tr>
							<td colspan="6">Vendor Code</td>
                            <td colspan="9">VbnjjHhSk8cC</td>
							<td>- $50.00</td>
						</tr> -->
						<tr>
							<td colspan="14"></td>
						</tr>
						</tbody>
					</table>
					<div class="m-portlet__head" style="padding-left:0;flex-wrap: wrap;">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title" style="padding-left: 20px;">
								<h3 class="m-portlet__head-text">
									ORDER TOTAL: {{ auth()->check() ? money_format('$%.2n', $total_price) : '$?.??' }}
								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
							@if(Session::get('viewonly') != null)
							
							@else
							<ul class="m-portlet__nav">
								
								<li class="m-portlet__nav-item">
									<a href="/export_csv" class="btn btn-secondary m-btn m-btn--custom m-btn--icon" >
										<span>
											<i class="la la-save"></i>
											<span>ExportInvoice</span>
										</span>
									</a>
								</li>

								<li class="m-portlet__nav-item">
									<a href="/save_order" class="btn btn-secondary m-btn m-btn--custom m-btn--icon">
										<span>
											<i class="la la-save"></i>
											<span>save for later</span>
										</span>
									</a>
								</li>
								
								
								<li class="m-portlet__nav-item">
									<a href="/submit_order" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
										<span>
											<i class="la la-rocket"></i>
											<span>SUBMIT</span>
										</span>
									</a>
								</li>
							</ul>
							@endif
						</div>
					</div>
				</div>
            </div>

            <!-- TOTAL ORDERS QUANTITY LESS 40 -->
            @if($orders->count() && $orders->sum('quantity') <= 40)
				@include('partials.warning-quantity-less')
			@endif

			<!-- VENDOR CODE -->
			@if(!$orders->every->submit)
				@include('partials.vendor-code')
			@endif
            
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
@endsection