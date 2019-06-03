<template>
	<button 
		class="btn btn-secondary m-btn m-btn--custom m-btn--icon"
		@click="openModal"
	>
		<span>
			<i class="la la-save"></i>
			<span>save for later</span>
		</span>
	</button>
</template>
<script>
    export default {
    	name: 'btn-order-later',
        methods: {
        	openModal() {
        		this.$store.commit('changeIsLaterModal', true);
        	}
        }
    };
</script>