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
			    	return ['griptape', 'skateboard', 'wheel','bearing', 'transfer'].indexOf(value) !== -1;
			    }
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
				} else if (this.type === "wheel") {
					return [
						"Quantity & Types",
						"Shapes & Sizes",
						"Material & Hardness",
						"Print Front of Wheels",
						"Print Back of Wheels",
						"Wheels Placement",
						"Cardboard",
						"Carton Print",
					];
				} else if (this.type === "bearing") {
					return [
						"Quantity & Size",
						"Abec & Race",
						"Engraving & Retainers",
						"Shields",
						"Spacers",
						"Inner Packaging 1",
						"Inner Packaging 2",
						"Outer Packaging",
					];
				} else if (this.type === "transfer") {
					return [
						"Quantity & Size",
						"Artwork"
					];
				}

				return [
					"Quantity and Size",
					"Concave",
					"Wood",
					"Glue",
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
			},
			currentStep() {
				return this.$store.getters.getCurrentStep;
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
			    this.$store.commit('changeStep', step);
			    WizardDemo.gotoStep(step)
			}
		},
		mounted() {
			if (this.path === window.location.href || this.path.length === 0) {
				this.$store.commit('changeStep', 1);
			}
		}
	}
</script>