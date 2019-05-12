<template>
	<ul class="m-menu__subnav">

		<li 
			v-for="(step, index) in steps"
			class="m-menu__item" 
			:class="[currentStep == ++index ? 'm-menu__item--active' : '']" 
			aria-haspopup="true" 
			@click="goToStep(index, path)"
		>
			<a class="m-menu__link ">
				<i class="m-menu__link-bullet m-menu__link-bullet--dot">
					<span></span>
				</i>
				<span class="m-menu__link-text" >{{ index }}. {{ step }}</span></a>
		</li>
    </ul>
</template>

<script>
	export default {
		name: 'steps',
		props: {
			path: {
				type: String,
				default: ""
			}
		},
		data() {
			return {
				currentStep: 0,
				steps: [
					"Quantity and Size",
					"Wood",
					"Glue",
					"Concave",
					"Bottom Print",
					"Top Print",
					"Engravery",
					"Veneer Colors",
					"Specials",
					"Cardboard",
					"Box"
				]
			}
		},
		methods: {
			goToStep(step, orderPath) {
			    if (window.location.href != orderPath && orderPath != '') {
			        window.location.href = orderPath;
			        return;
			    }
			    this.currentStep = step;
			    WizardDemo.gotoStep(step)
			}
		},
		mounted() {
			if (this.path === window.location.href || this.path.length === 0) {
				this.currentStep = 1;
			}
		}
	}
</script>