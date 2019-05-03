<script>

	$(document).ready(function(){
		// Get global var $orders via provider
		app.batchTotal=parseInt("<?php echo e($orders->sum('quantity')); ?>");

		<?php if(isset($saved_order)): ?>
			<?php $__currentLoopData = $saved_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				$('#saved_order_id').val(<?php echo e($order->id); ?>);

				app.quantity =decodeHTML("<?php echo e($order->quantity); ?>");
				app.pre_quantity = decodeHTML("<?php echo e($order->quantity); ?>");
				app.size = decodeHTML("<?php echo e($order->size); ?>");
				app.pre_size = decodeHTML("<?php echo e($order->size); ?>");
				app.concave =decodeHTML("<?php echo e($order->concave); ?>");
				if(app.concave == "Deep Concave")
					app.steps[1].state = true;
				else
					app.steps[1].state = false;

				app.wood = decodeHTML("<?php echo e($order->wood); ?>");
				if(app.wood == "European Maple Wood")
					app.steps[2].state = true;
				else
					app.steps[2].state = false;

				app.glue = decodeHTML("<?php echo e($order->glue); ?>");
				if(app.glue == "American Glue")
					app.steps[3].state = true;
				else
					app.steps[3].state = false;

				app.bottomprint = decodeHTML("<?php echo e($order->bottomprint); ?>");
				if(app.bottomprint != ""){
					app.steps[4].state = true;
					$('button',$('#m_wizard_form_step_5')).html(app.bottomprint);
					setTimeout(function(){
						$('button',$('#m_wizard_form_step_5')).removeClass('unchecked');
					}, 1000);
					
					$('input',$('#m_wizard_form_step_5')).attr('fileName',app.bottomprint);
				}
				else
					app.steps[4].state = false;

				app.topprint = decodeHTML("<?php echo e($order->topprint); ?>");
				if(app.topprint != ""){
					// debugger;
					$('button',$('#m_wizard_form_step_6')).html(app.topprint);
					setTimeout(function(){
						$('button',$('#m_wizard_form_step_6')).removeClass('unchecked');
					}, 1000);
					$('input',$('#m_wizard_form_step_6')).attr('fileName',app.topprint);
					app.steps[5].state = true;
				}
				else
					app.steps[5].state = false;

				app.engravery = decodeHTML("<?php echo e($order->engravery); ?>");
				if(app.engravery != ""){
					app.steps[6].state = true;
					$('button',$('#m_wizard_form_step_7')).html(app.engravery);
					setTimeout(function(){
						$('button',$('#m_wizard_form_step_7')).removeClass('unchecked');
					}, 1000);
					$('input',$('#m_wizard_form_step_7')).attr('fileName',app.engravery);
				}
				else
					app.steps[6].state = false;

				app.currentColors = JSON.parse(decodeHTML("<?php echo e($order->veneer); ?>"));
				if(app.currentColors.includes('random')) {
					app.steps[7].state = false;
				}

				app.steps[8] =JSON.parse(decodeHTML("<?php echo e($order->extra); ?>"));

				app.cardboard =decodeHTML("<?php echo e($order->cardboard); ?>");
				if(app.cardboard != ""){
					app.steps[9].state = true;
					$('button',$('#m_wizard_form_step_10')).html(app.cardboard);
					setTimeout(function(){
						$('button',$('#m_wizard_form_step_10')).removeClass('unchecked');
					}, 1000);
					$('input',$('#m_wizard_form_step_10')).attr('fileName',app.cardboard);
				}
				else
					app.steps[9].state = false;

				app.carton =decodeHTML("<?php echo e($order->carton); ?>");
				if(app.carton != ""){
					app.steps[9].state = true;
					$('button',$('#m_wizard_form_step_11')).html(app.carton);
					setTimeout(function(){
						$('button',$('#m_wizard_form_step_11')).removeClass('unchecked');
					}, 1000);
					$('input',$('#m_wizard_form_step_11')).attr('fileName',app.carton);
				}
				else
					app.steps[9].state = false;

				app.perdeck = +decodeHTML("<?php echo e($order->perdeck); ?>");
				app.total = +decodeHTML("<?php echo e($order->total); ?>");
				app.fixedprice = +decodeHTML("<?php echo e($order->fixedprice); ?>");
				// debugger;
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
		// debugger;
		var url = document.location.href;
		if(url.indexOf('#') != -1){
			sub = url.slice(url.indexOf('#'));
			if(sub == "#invoice_address"){
				$('#m_user_profile_tab_2').addClass('active');
				$('#m_user_profile_tab_1').removeClass('active');
				$('.m-tabs__link').eq(0).removeClass('active')
				$('.m-tabs__link').eq(1).addClass('active')
			}
			if(sub == "#my_detail"){
				$('#m_user_profile_tab_3').addClass('active');
				$('#m_user_profile_tab_1').removeClass('active');
				$('.m-tabs__link').eq(0).removeClass('active')
				$('.m-tabs__link').eq(2).addClass('active')
			}
		}
		

	});

	function decodeHTML(encodedStr){
		var parser = new DOMParser;
		var dom = parser.parseFromString(
		    '<!doctype html><body>' + encodedStr,
		    'text/html');
		var decodedString = dom.body.textContent;

		return decodedString;
	}
</script>