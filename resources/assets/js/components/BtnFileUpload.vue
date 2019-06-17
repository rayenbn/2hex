<template>
	<div class="custom-file">
	    <input
	    	ref="file"
	        type="file"
	        :data-type-upload="dataTypeUpload"
	        :class="customClass"
	        :id="id"
	        @click="$emit('btnClick', $event)"
	        @change.prevent="$emit('btnChange', $event)"
	    >
	    <label 
	        class="custom-file-label" 
	        for="customFile"
	    >
	        {{labelText}}
	    </label>
	</div>
</template>

<script>
	export default {
		name: 'btn-file-upload',
		props: {
			customClass: {
				type: String,
				default: 'custom-file-input'
			},
			dataTypeUpload: {
				type: String,
				default: ''
			},
			id: {
				type: String,
				default: ''
			},
			labelText: {
				type: String,
				default: 'Choose file'
			},

		},
		data() {
			return {
				file: null,
				fileName: ''
			}
		}
	}
</script>