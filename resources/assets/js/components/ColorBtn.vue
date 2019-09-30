<template>
	<div class="dropdown">
        <slot name="btn">
		    <button>How many colors are in your design? </button>
		</slot>
        
        <div class="dropdown-menu" :aria-labelledby="labelledby">
            <button 
                v-for="(color, index) in colors"
                :key="index"
                class="dropdown-item file-dropdown" 
                @click="btnColor = color"
            >
                {{ color }}
            </button>
        </div>
    </div>
</template>
<script>
	export default {
		name: 'color-btn',
		props: {
			color: {
				type: String,
				default: null
			},
            labelledby: {
                type: String,
                default: 'dropdownMenuButton'
            }
		},
		data() {
			return {
				btnColor: this.color,
                colors: [
                    "1 color",
                    "2 color",
                    "3 color",
                    "CMYK",
                ]
			}
		},
		watch: {
            btnColor(val) {
                this.$emit('colorChange', val);
            }
        },
        created() {
            if (!this.color) {
                this.btnColor = this.colors[this.colors.length - 1];
            }
        }
	}
</script>