<?php $__env->startPush('head.scripts'); ?>
    <script>
        if (location.hash) {
            let target = location.hash;
            let el = document.querySelector(target);
            if (el) {
                window.scrollTop = el.offsetTop;
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
    
		<!-- BEGIN: Subheader -->
		<div class="m-subheader ">
            <?php if(session()->has('message')): ?>
                <div class="alert alert-success">
                <?php echo e(session()->get('message')); ?>

                </div>
            <?php endif; ?>
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="m-subheader__title ">2HEX Skateboard Factory</h3>
				</div>
			</div>
		</div>
		<!-- END: Subheader -->
                    
		<div class="m-content">
            <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
				<div class="m-alert__text">
                    <h4>2HEX gives everyone access to the best skateboard production!</h4>
                    2HEX shows all customization options and makes cost calculations transparent.
                    <a href="<?php echo e(route('register')); ?>">
                        <b>Sign Up</b>
                    </a>
                    and select the perfect

                    <a href="<?php echo e(route('skateboard.manufacturer')); ?>">
                        <b>deck set up </b>
                    </a>for your brand.
                    <img src="<?php echo e(asset('/skateboard-deck-production/top.jpg')); ?>" alt="" style="width: 100%;">
				</div>
			</div>


                        
			<!--Begin::Section-->
			<div class="row">

                <div class="col-xl-4">
                    <!--begin:: Widgets/Activity-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                </div>
                            </div>

                            <div class="m-portlet__head m-portlet__head--fit">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-action">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="m-widget17">
                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                                    <div>
                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides">
                                            <img src="/skateboard-deck-production/skateboard-production-factory-manufacturer-catalog.jpg" alt="" style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget17__stats">
                                    <div class="m-widget17__items m-widget17__items-col1">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-	flaticon-presentation-1 m--font-brand"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												Our Offer
											</span>
                                            <span class="m-widget17__desc">
												See our major products
											</span>
                                        </div>
                                    </div>
                                    <div class="m-widget17__items m-widget17__items-col2">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-graph m--font-success"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												Best
											</span>
                                            <span class="m-widget17__desc">
												See best sellers
											</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div style="text-align: justify; color: #9699a4;">
                                <h3>Catalog</h3>
                                Signup to our newsletter to download our complete catalog!<br>
                                <br>
                                Please note that we can currently only offer manual sales to existing companies.
                                Our minimum order quantity is 3000 USD for any production.
                            </div>
                            <br>
                            <div class="m-widget19__action">
                                <a href="newsletter" class="btn btn-sm btn-danger m-btn--pill  btn-brand">
                                    <span>
                                        <span>get our catalog</span>
                                        <i class="la la-arrow-right"></i>
                                    </span>
                                </a>
                            </div>

                        </div>
                    </div>
                    <!--end:: Widgets/Activity-->
                </div>

				<div class="col-xl-4">
					<!--begin:: Widgets/Activity-->
					<div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text m--font-dark">
										Skateboard Decks
									</h3>
								</div>
							</div>

							<div class="m-portlet__head m-portlet__head--fit">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-action">

									</div>
								</div>
							</div>
						</div>
						<div class="m-portlet__body">
							<div class="m-widget17">
								<div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
									<div>
										<div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides">
											<img src="/skateboard-deck-production/stacked-skateboard-decks-factory-2hex.jpg" alt="" style="width: 100%;">
										</div>
									</div>
								</div>
                                <div class="m-widget17__stats">
                                    <div class="m-widget17__items m-widget17__items-col1">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-	flaticon-presentation-1 m--font-brand"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												Shapes
											</span>
                                            <span class="m-widget17__desc">
												Check our big list of shapes
											</span>
                                        </div>
                                    </div>
                                    <div class="m-widget17__items m-widget17__items-col2">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-graph m--font-success"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												Sales
											</span>
                                            <span class="m-widget17__desc">
												Our bestseller!
											</span>
                                        </div>
                                    </div>
                                </div>
							</div>
							<div style="text-align: justify; color: #9699a4;">
								<h3>Skateboard Decks</h3>
								Skateboard decks are the most frequently replaced part of skateboards, which
								makes it a popular first product for skateboard companies. Skateboard decks
								offer a lot of customization options, enabling brands to differentiate from
								the current trend and create their own style.
							</div>
							<br>
							<div class="m-widget19__action">
								<a href="<?php echo e(route('skateboard.manufacturer')); ?>" class="btn btn-sm btn-danger m-btn--pill  btn-brand">
                                    <span>
                                        <span>add decks to order</span>
                                        <i class="la la-arrow-right"></i>
                                    </span>
								</a>
							</div>

						</div>
					</div>
					<!--end:: Widgets/Activity-->
				</div>



                <!-- MANUAL PRODUCTS -->

                <div class="col-xl-4">
                    <!--begin:: Widgets/Activity-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                        <div class="m-portlet__head"></div>
                        <div class="m-portlet__body">
                            <div class="m-widget17">
                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                                    <div>
                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides">
                                            <img src="/skateboard-deck-production/manual/bearings.png" alt="skateboard bearings manufacturer" style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget17__stats">
                                    <div class="m-widget17__items m-widget17__items-col1">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-	flaticon-presentation-1 m--font-brand"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												Fast & Strong
											</span>
                                            <span class="m-widget17__desc">
												We focus on the best quality
											</span>
                                        </div>
                                    </div>
                                    <div class="m-widget17__items m-widget17__items-col2">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-graph m--font-success"></i>
											</span>
                                            <span class="m-widget17__subtitle">
                                                Margin
											</span>
                                            <span class="m-widget17__desc">
												highest profit margin
											</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: justify; color: #9699a4;">
                                <h3>Skateboard Bearings</h3>
                                Professional Skateboard Bearings have a high MOQ but a low cost per set. This makes it the highest profit skateboard component.
                            </div>
                            <br>
                            <div class="m-widget19__action">
                                <a href="http://skateboard-factory.com/skateboard-bearings-factory.html" class="btn btn-sm btn-primary m-btn--pill  btn-brand">
                                        <span>
                                            <span>back to our old website</span>
                                            <i class="la la-arrow-right"></i>
                                        </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Activity-->
                </div>

                <div class="col-xl-4">
                    <!--begin:: Widgets/Activity-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                        <div class="m-portlet__head"></div>
                        <div class="m-portlet__body">
                            <div class="m-widget17">
                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                                    <div>
                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides">
                                            <img src="/skateboard-deck-production/manual/complete-skateboard-factory.jpg" alt="complete skateboards manufacturer" style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget17__stats">
                                    <div class="m-widget17__items m-widget17__items-col1">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-	flaticon-presentation-1 m--font-brand"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												Margin
											</span>
                                            <span class="m-widget17__desc">
												Good margins
											</span>
                                        </div>
                                    </div>
                                    <div class="m-widget17__items m-widget17__items-col2">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-graph m--font-success"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												Turnaround
											</span>
                                            <span class="m-widget17__desc">
												Sells fastest in skate shops!
											</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: justify; color: #9699a4;">
                                <h3>Complete Skateboards</h3>
                                Complete Skateboards are the most profitable product within the skateboard industry.
                                Once your build up your brand image with great decks, completes let you live from the skateboard business.
                            </div>
                            <br>
                            <div class="m-widget19__action">
                                <a href="http://skateboard-factory.com/skateboard-completes-factory.html" class="btn btn-sm btn-primary m-btn--pill  btn-brand">
                                    <span>
                                        <span>back to our old website</span>
                                        <i class="la la-arrow-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Activity-->
                </div>

                <div class="col-xl-4">
                    <!--begin:: Widgets/Activity-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                        <div class="m-portlet__head"></div>
                        <div class="m-portlet__body">
                            <div class="m-widget17">
                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                                    <div>
                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides">
                                            <img src="/skateboard-deck-production/manual/skateboard-wheels-factory.jpg" alt="skateboard wheels manufacturer" style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget17__stats">
                                    <div class="m-widget17__items m-widget17__items-col1">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-	flaticon-presentation-1 m--font-brand"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												Urethana
											</span>
                                            <span class="m-widget17__desc">
												differentiate by Urethane
											</span>
                                        </div>
                                    </div>
                                    <div class="m-widget17__items m-widget17__items-col2">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-graph m--font-success"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												Sells Well
											</span>
                                            <span class="m-widget17__desc">
                                                a repetitive seller
											</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: justify; color: #9699a4;">
                                <h3>Skateboard Wheels</h3>
                                Skateboard Wheels are a popular second product because of low total production costs.
                            </div>
                            <br>
                            <div class="m-widget19__action">
                                <a href="http://skateboard-factory.com/skateboard-wheels-factory.html" class="btn btn-sm btn-primary m-btn--pill  btn-brand">
                                    <span>
                                        <span>back to our old website</span>
                                        <i class="la la-arrow-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Activity-->
                </div>



                <div class="col-xl-4">
                    <!--begin:: Widgets/Activity-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                        <div class="m-portlet__head"></div>
                        <div class="m-portlet__body">
                            <div class="m-widget17">
                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                                    <div>
                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides">
                                            <img src="/skateboard-deck-production/manual/skateboard-truck-factory.jpg" alt="skateboard trucks manufacturer" style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget17__stats">
                                    <div class="m-widget17__items m-widget17__items-col1">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-	flaticon-presentation-1 m--font-brand"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												Control
											</span>
                                            <span class="m-widget17__desc">
												Perfect Turn Control
											</span>
                                        </div>
                                    </div>
                                    <div class="m-widget17__items m-widget17__items-col2">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-graph m--font-success"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												Image
											</span>
                                            <span class="m-widget17__desc">
												giving brands the core image
											</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: justify; color: #9699a4;">
                                <h3>Skateboard Trucks</h3>
                                Custom made professional Skateboard Trucks push any brands image! It is the product that lets you distinguish between big and small brands.
                            </div>
                            <br>
                            <div class="m-widget19__action">
                                <a href="http://skateboard-factory.com/skateboard-truck-factory.html" class="btn btn-sm btn-primary m-btn--pill  btn-brand">
                                        <span>
                                            <span>back to our old website</span>
                                            <i class="la la-arrow-right"></i>
                                        </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Activity-->
                </div>

			</div>
		</div>

        <!--
		<div class="m-subheader ">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="m-subheader__title ">2HEX' Blog</h3>
				</div>
			</div>
		</div>
        -->

		 <div class="m-content" id="blog">
         
			<div class="row">
				<div class="col-xl-12">
					<div class="m-portlet m-portlet--full-height ">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text">
                                        The Skateboard Company Founder's Blog
									</h3>
								</div>
							</div>
                            
                            <?php if($posts->count()): ?>
                                <div class="m-portlet__head-caption">
                                    <?php echo e($posts->fragment('blog')->links()); ?>

                                </div>
                            <?php endif; ?>

                            <?php if(auth()->check() && auth()->user()->isAdmin()): ?>
    							<div class="m-portlet__head-caption">
                                    <a href="<?php echo e(route('blog.create')); ?>" class="btn btn-outline-success">New Post</a>
                                </div>
                            <?php endif; ?>
						</div>
						<div class="m-portlet__body">

							<div class="tab-content">
								<div class="tab-pane active" id="m_widget5_tab1_content" aria-expanded="true">
                                    <div class="m-widget5">

                                        <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php echo $__env->make('blog.partials.article', ['article' => $article], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <p>We haven't published anything yet, but soon there will be something to read here.</p>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            
            <div class="alert alert-brand m-alert m-alert--icon m-alert--air m-alert--square m--margin-bottom-30" role="alert">
                <div class="m-alert__icon">
                    <i class="flaticon-exclamation-1"></i>
                </div>
                <div class="m-alert__text">
                    We are building up a new web presence. If you need more info, visit
                    <a href="http://skateboard-factory.com" class="m-link m-link--warning m--font-bold" target="_blank">
                        our old website.
                    </a>
                    or download our
                    <a href="newsletter" class="m-link m-link--warning m--font-bold" target="_blank">
                        catalog
                    </a>
                </div>
            </div>

        </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>