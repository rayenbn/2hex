<?php $__env->startSection('content'); ?>
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
			
			<?php if(session()->has('success')): ?>
				<div 
					class="alert alert-brand m-alert m-alert--icon m-alert--air m-alert--square m--margin-bottom-30" 
					role="alert"
					style="background-color: #008000;"
				>
	                <div class="m-alert__icon">
	                    <i class="flaticon-exclamation-1"></i>
	                </div>
	                <div class="m-alert__text">
	                    <?php echo e(session()->get('success')); ?>

	                </div>
	            </div>		
			<?php endif; ?>
            
			<div class="m-portlet">
				<div class="m-portlet__head" style="flex-wrap: wrap;height: auto;float: right;">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
						</div>
					</div>
					<div class="m-portlet__head-tools" style="flex-wrap:wrap;">
						<?php if(Session::get('viewonly') == null): ?>
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
                        <?php endif; ?>
                        
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
                                <?php if(Session::get('viewonly') == null): ?>
                                <th>Edit</th>
                                <th>Remove</th>
                                <?php endif; ?>
							</tr>
						</thead>
                        
						<tbody>
							<?php 
								setlocale(LC_MONETARY, 'en_US');
							?>

							<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e(++$batch); ?></td>
								<td><?php echo e($order->quantity); ?></td>
								<td><?php echo e($order->size); ?>

                                </td>
								<td><?php echo e($order->concave); ?></td>
								<td><?php echo e($order->wood); ?></td>
								<td><?php echo e($order->glue); ?></td>

                                <td>
                                    <b>Bottom</b><br>
                                    <?php echo e($order->bottomprint?$order->bottomprint:'None'); ?><br>
									<hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                                    <b>Top</b><br>
                                    <?php echo e($order->topprint?$order->topprint:'None'); ?>

                                </td>

                                <td><?php echo e($order->engravery?$order->engravery:'None'); ?></td>
								<td>
                                    <ol style="padding-left:0; list-style-position:inside;">
                                    	
                                    
                                    	<?php $__currentLoopData = json_decode($order->veneer); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $veneer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($veneer); ?></li>
                                       	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

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
                                	<?php $__currentLoopData = json_decode($order->extra); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                	 	<?php if($extra->state == true): ?>
                                	 		<?php if($count != 0): ?>
                                     		<hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px">
                                     		<?php endif; ?>
                                     		<?php echo e($extraTitle[$key]); ?>

                                     		<?php echo e(isset($extra->color) 
                                     				? " :" . preg_replace( '/[^0-9a-zA-Z]/', '', $extra->color) 
                                     				: ' : Yes'); ?> 
                                     		<br>
                                     		<?php $count ++ ?>
                                     	<?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px">
                                    Shrink Wrap: Yes
                                </td>
								<td><?php echo e($order->cardboard ? $order->cardboard : 'None'); ?></td>
								<td><?php echo e($order->carton ? $order->carton : 'None'); ?></td>
								<td><?php echo e(auth()->check() ? money_format('%.2n', $order->perdeck) : '$?.??'); ?></td>
								<td><?php echo e(auth()->check() ? money_format('%.2n', $order->total) : '$?.??'); ?></td>
								
								<?php if(Session::get('viewonly') == null): ?>
									<td><a href="skateboard-deck-configurator/<?php echo e($order->id); ?>" class="btn btn-success">Edit</a></td>
									<td><a href="skateboard-remove/<?php echo e($order->id); ?>" class="btn btn-danger">Remove</a></td>
								<?php endif; ?>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                          
                            
                            <thead style="background-color: #52a3f0; color: white;">
								<tr>
									<td colspan="3">Fixed Cost</td>
									<td colspan="3">Batches</td>
									<td colspan="9">Filename</td>
									<td>Fixed&nbspTotal</td>
								</tr>
						   	</thead>

                            <?php $__currentLoopData = $fees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            	<?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            		<tr>
										<td colspan="3"><?php echo e($value['type']); ?></td>
										<td colspan="3"><?php echo e($value['batches']); ?></td>
										<td colspan="9"><?php echo e($value['image']); ?></td>
										<td><?php echo e(auth()->check() ? money_format('%.2n', $value['price']) : '$?.??'); ?></td>
									</tr>
                            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

							<tr>
								<td colspan="14"></td>
							</tr>
						</tbody>
					</table>
					<div class="m-portlet__head" style="padding-left:0;flex-wrap: wrap;">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title" style="padding-left: 20px;">
								<h3 class="m-portlet__head-text">
									ORDER TOTAL: <?php echo e(auth()->check() ? money_format('%.2n', $orders->sum('total') + $sum_fees) : '$?.??'); ?>

								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
							<?php if(Session::get('viewonly') != null): ?>
							
							<?php else: ?>
							<ul class="m-portlet__nav">
								
								<!-- <li class="m-portlet__nav-item">
									<a href="<?php echo e(route('export.invoice')); ?>" class="btn btn-secondary m-btn m-btn--custom m-btn--icon" >
										<span>
											<i class="la la-save"></i>
											<span>ExportInvoice</span>
										</span>
									</a>
								</li> -->

								<li class="m-portlet__nav-item">
									<a href="/save_order" class="btn btn-secondary m-btn m-btn--custom m-btn--icon">
										<span>
											<i class="la la-save"></i>
											<span>save for later</span>
										</span>
									</a>
								</li>
								
								
								<li class="m-portlet__nav-item">
									<?php $auth = auth()->user(); ?>

									<?php if($auth && strlen($auth->company_name) && strlen($auth->position) && strlen($auth->phone_num)): ?>
									<a href="<?php echo e(route('orders.submit')); ?>" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
										<span>
											<i class="la la-rocket"></i>
											<span>SUBMIT</span>
										</span>
									</a>
									<?php else: ?>
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
									<?php endif; ?>
								</li>
							</ul>
							<?php endif; ?>
						</div>
					</div>
				</div>
            </div>

            <!-- TOTAL ORDERS QUANTITY LESS 40 -->
            <?php if($orders->count() && $orders->sum('quantity') <= 40): ?>
				<?php echo $__env->make('partials.warning-quantity-less', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php endif; ?>

			<!-- VENDOR CODE -->
			<?php if(!$orders->every->submit && !session()->get('viewonly')): ?>
				<?php echo $__env->make('partials.vendor-code', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php endif; ?>
            
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>