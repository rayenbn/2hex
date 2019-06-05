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
						
						<div class="dropdown">
						  	<button 
						  		class="btn btn-secondary dropdown-toggle" 
						  		type="button" 
						  		data-toggle="dropdown" 
						  		aria-haspopup="true" 
						  		aria-expanded="false"
						  		id="actions"
					  		>
						    	Add batch
						  	</button>

						  	
						  	<div class="dropdown-menu" aria-labelledby="actions">
						  		@if(auth()->check() && auth()->user()->isAdmin())  
						  		<a class="dropdown-item" href="{{ route('griptape.index') }}">
						  			Add grip tapes
						  		</a>
						  		@endif
						  		<a class="dropdown-item" href="{{ route('get.skateboard.configurator') }}">
						  			Add decks
						  		</a>
						  	</div>

						</div>
                        
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
							@php 
								setlocale(LC_MONETARY, 'en_US');
							@endphp

							@foreach($orders as $batch => $order)
							<tr>
								<td>{{++$batch}}</td>
								<td>{{$order->quantity}}</td>
								<td>{{$order->size}}
                                </td>
								<td>{{$order->concave}}</td>
								<td>{{$order->wood}}</td>
								<td>{{$order->glue}}</td>

								<td>
									<div>
										<span style="margin-top: 15px; display: block;">
											<b>Bottom</b><br>
		                                    {{$order->bottomprint ? $order->bottomprint : 'None'}}<br>
											<hr style="border-color: #f4f5f8; margin: 0 -5px 0 -3px">
										</span>
										<span>
											colors: {{$order->bottomprint_color ?? ''}}
	                                    	<hr style="border-color: #f4f5f8; margin: 0 -5px 0 -3px">
										</span>
									</div>
									<div>
										<span style="margin-top: 15px; display: block;">
											<b>Top</b><br>
		                                    {{$order->topprint ? $order->topprint : 'None'}}<br>
											<hr style="border-color: #f4f5f8; margin: 0 -5px 0 -3px">
										</span>
										<span>
											colors: {{$order->topprint_color ?? ''}}
										</span>
									</div>
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
                                	<?php 
                                		$count = 0;
                                		$extraTitle = [
                                			'fulldip' => 'Fulldip',
                                			'transparent' => 'Transp. F.dip',
                                			'metallic' => 'Metallic dip',
                                			'blacktop' => 'Top Fiberglass',
                                			'blackmidlayer' => 'Mid Fiberglass',
                                			'pattern' => 'Pattern Press',
                                		];
                            		?>
                                	@foreach(json_decode($order->extra) as $key => $extra)
                                	 	@if($extra->state == true)
                                	 		@if($count != 0)
                                     		<hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px">
                                     		@endif
                                     		{{ $extraTitle[$key] }}
                                     		{{ isset($extra->color) 
                                     				? " :" . preg_replace( '/[^0-9a-zA-Z]/', '', $extra->color) 
                                     				: ' : Yes' 
                                     		}} 
                                     		<br>
                                     		<?php $count ++ ?>
                                     	@endif
                                    @endforeach
                                    <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px">
                                    Shrink Wrap: Yes
                                </td>
								<td>{{$order->cardboard ? $order->cardboard : 'None'}}</td>
								<td>
									<div>
										<p style="margin: 30px 0px;">
											{{$order->carton ? $order->carton : 'None'}}
											<hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
										</p>
										<p>colors: {{$order->carton_color ?? ''}}</p>
									</div>
                                </td>

								<td>{{ auth()->check() ? money_format('%.2n', $order->perdeck) : '$?.??' }}</td>
								<td>{{ auth()->check() ? money_format('%.2n', $order->total) : '$?.??' }}</td>
								
								@if(Session::get('viewonly') == null)
									<td><a href="skateboard-deck-configurator/{{$order->id}}" class="btn btn-success">Edit</a></td>
									<td><a href="skateboard-remove/{{$order->id}}" class="btn btn-danger">Remove</a></td>
								@endif
							</tr>
							
							@endforeach  

							@if(auth()->check() && auth()->user()->isAdmin())   

                            <thead style="background-color: #52a3f0; color: white;">
								<tr>
	                                <th>Batch</th>
									<th>Pcs</th>
									<th>Size</th>
									<th>Grip Color</th>
									<th>Grit</th>
									<th>Perforation</th>
									<th>Die Cut</th>
									<th>Top Print</th>
									<th>Backpaper</th>
									<th>Backpaper Print</th>
									<th>Carton Print</th>
	                                <th></th>
	                                <th>Grip Price</th>
	                                <th>Batch&nbspTotal</th>
	                                @if(Session::get('viewonly') == null)
	                                <th>Edit</th>
	                                <th>Remove</th>
	                                @endif
								</tr>
							</thead>
							@foreach($grips as $batch => $grip)
							<tr>
								<td>{{++$batch}}</td>
								<td>{{$grip->quantity}}</td>
								<td>{{$grip->size}}</td>
								<td>{{$grip->color}}</td>
								<td>{{$grip->grit}}</td>
								<td>{{$grip->perforation ? 'Yes' : 'None'}}</td>
								<td>{{$grip->die_cut}}</td>
								<td>
                                    {{$grip->top_print ?? ''}}<br>
									<hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                                    <br>
                                    {{$grip->top_print_color ?? ''}}
                                </td>
                                <td>{{$grip->backpaper}}</td>
								<td>
                                    {{$grip->backpaper_print ?? ''}}<br>
									<hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                                    <br>
                                    {{$grip->backpaper_print_color ?? ''}}
                                </td>
                                <td>
                                    {{$grip->carton_print ?? ''}}<br>
									<hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                                    <br>
                                    {{$grip->carton_print_color ?? ''}}
                                </td>
                                <td></td>
                                <td>{{ auth()->check() ? money_format('%.2n', $grip->price) : '$?.??' }}</td>
                                <td>{{ auth()->check() ? money_format('%.2n', $grip->total) : '$?.??' }}</td>

                      			@if(Session::get('viewonly') == null)
								<td>
									<a href="{{route('griptape.show', $grip->id)}}" class="btn btn-success">Edit</a></td>
								<td>
									<a href="{{route('griptape.destroy', $grip->id)}}" class="btn btn-danger">Remove</a>
								</td>
								@endif
								
							</tr>
							@endforeach

							@endif

                            <thead style="background-color: #52a3f0; color: white;">
								<tr>
									<td colspan="3">Fixed Cost</td>
									<td colspan="3">Batches</td>
									<td colspan="1">Colors</td>
									<td colspan="8">Filename</td>
									<td>Fixed&nbspTotal</td>
								</tr>
						   	</thead>

                            @foreach($fees as $key => $group)
                            	@foreach($group as $k => $value)
                            		<tr>
										<td colspan="3">{{ $value['type'] }}</td>
										<td colspan="3">{{ $value['batches'] }}</td>
										<td colspan="1">{{ array_key_exists('color', $value) ? $value['color'] : '' }}</td>
										<td colspan="8">{{ $value['image'] }}</td>
										<td>{{ auth()->check() ? money_format('%.2n', $value['price']) : '$?.??' }}</td>
									</tr>
                            	@endforeach
							@endforeach

							@if(! empty($orders->first()->promocode))
								@php 
									$promocode = json_decode($orders->first()->promocode); 
								@endphp
								<tr>
									<td colspan="3">Discount</td>
									<td colspan="3"></td>
									<td colspan="1"></td>

									<td colspan="8">{{ $promocode->code }}</td>
									<td>{{ $promocode->type == 'fixed' 
										? money_format('-%.2n', $promocode->reward)
										: ($promocode->reward . '%')}}</td>
								</tr>		
							@endif

							<tr>
								<td colspan="16"></td>
							</tr>
						</tbody>
					</table>
					<div class="m-portlet__head" style="padding-left:0;flex-wrap: wrap;">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title" style="padding-left: 20px;">
								<h3 class="m-portlet__head-text">
									ORDER TOTAL: {{ auth()->check() ? money_format('%.2n', $totalOrders) : '$?.??' }}
								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
							@if(Session::get('viewonly') != null)
							
							@else
							<ul class="m-portlet__nav">
								
								<!-- <li class="m-portlet__nav-item">
									<a href="{{ route('export.invoice') }}" class="btn btn-secondary m-btn m-btn--custom m-btn--icon" >
										<span>
											<i class="la la-save"></i>
											<span>ExportInvoice</span>
										</span>
									</a>
								</li> -->

								<li class="m-portlet__nav-item">
									<btn-order-later/>
								</li>
								
								
								<li class="m-portlet__nav-item">
									@php $auth = auth()->user(); @endphp
									
									@if (
										$auth 
										&& strlen($auth->company_name) 
										&& strlen($auth->position) 
										&& strlen($auth->phone_num)
									)
										@if($grips->sum('quantity') > 0 && $totalOrders > 1170)
											<a href="{{ route('orders.submit') }}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
												<span>
													<i class="la la-rocket"></i>
													<span>SUBMIT</span>
												</span>
											</a>
										@else
											<a 
											href="javascript:void(0);" 
											class="btn btn-secondary m-btn m-btn--custom m-btn--icon"
											onclick="alert('Your order is too small to add custom grip tapes. Please order at least a total of 400 grip tapes or 50 decks to enable grip tapes.')"
										>
											<span>
												<i class="la la-rocket"></i>
												<span>SUBMIT</span>
											</span>
										</a>
										@endif
									@else
									<a 
										href="javascript:void(0);" 
										class="btn btn-secondary m-btn m-btn--custom m-btn--icon"
										onclick="alert('Please fill in your complete profile before submitting an order')"
									>
										<span>
											<i class="la la-rocket"></i>
											<span>SUBMIT</span>
										</span>
									</a>
									@endif
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
			@if(!$orders->every->submit && !session()->get('viewonly'))
				@include('partials.vendor-code')
				<!-- <vendor-code /> -->
			@endif
            
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
	<change-name-order-modal/>
@endsection