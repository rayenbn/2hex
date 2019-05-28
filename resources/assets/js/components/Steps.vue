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
				<span class="m-menu__link-text" >{{ index }}. {{ step }}</span>
			</a>
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
			},
			type: {
				type: String,
				required: true,
				validator: function (value) {
			    	return ['griptape', 'skateboard'].indexOf(value) !== -1;
			    }
			}
		},
		data() {
			return {
				currentStep: 0
			}
		},
		computed: {
			steps() {
				if (this.type === "griptape") {
					return [
						"Quantity and Size",
						"Technology",
						"Perforated",
						"Top Print",
						"Die Cut",
						"Color",
						"Paper",
						"Paper Print",
						"Box"
					];
				}

				return [
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
				];
			},
			location() {
				return window.location.href.substring(window.location.protocol.length);
			}
		},
		methods: {
			goToStep(step, orderPath) {
				let url = 'http:' + this.location;

				if (window.location.protocol === 'https:') {
					url = 'https:' + this.location;
				}

			    if (url != orderPath && orderPath != '') {
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