<template>
    <modal v-if="show" @close="close">
        <h3 slot="header">Enter the name</h3>
        <div slot="body">
            <input type="text" class="form-control" v-model="name" placeholder="Enter the name"> 
        </div>
        <div slot="footer">
            <button 
                type="button" 
                class="btn btn-secondary" 
                @click.prevent="close"
            >
                Cancell
            </button>
            <button
                :disabled="!name.length"
                type="button" 
                class="btn btn-primary"
                @click.prevent="save"
            >
                Save
            </button>
        </div>
    </modal>
</template>

<script>
    import Modal from '@/components/modals/Modal';

    export default {
        name: 'change-name-order-modal',
        components: {
            Modal
        },
        data() {
            return {
                name: ''
            };
        },
        computed: {
            show() {
                return this.$store.getters.getIsLater;
            }
        },
        methods: {
            save(event) {
                axios.post('/save_order/', {name: this.name})
                    .then((response) => {
                        this.close();
                        setTimeout(() => {
                            window.location.href = response.request.responseURL || "/summary";
                        }, 1000);
                    })
                    .catch((error) => {
                        console.error(error);
                    }); 
            },
            close() {
                this.name = '';
                this.$store.commit('changeIsLaterModal', false);
                this.$emit('close', this.show);
            }
        }
    };
</script>