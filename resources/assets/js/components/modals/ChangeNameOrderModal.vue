<template>
    <form action="/save_order" method="GET">
        <modal v-if="show" @close="close">
            <div slot="header">
                <h2 class="m-0">Save this order for later</h2>
                <p class="text-muted m-0" style="font-size: 11px;">
                    Your order will be saved to: 
                    <a href="/profile" target="_blank">my profile</a>
                    <i class="fas fa-arrow-right fa-xs"></i>
                    <a href="/profile#saved_orders" target="_blank">my orders</a>
                </p>
            </div>
            <div slot="body">
                <ul v-if="errors" class="alert alert-danger">
                    <li v-for="(e, key, index) in errors" v-text="errors[key][index]"></li>
                </ul>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control" 
                    v-model="name" 
                    placeholder="Enter a reminder to yourself"
                /> 
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
                    type="submit"
                    class="btn btn-primary"
                    @click.prevent="save"
                >
                    Save
                </button>
            </div>
        </modal>
    </form>
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
                name: '',
                errors: null
            };
        },
        computed: {
            show() {
                return this.$store.getters.getIsLater;
            }
        },
        methods: {
            save(event) {
                axios.post('/save_order', {name: this.name})
                    .then((response) => {
                        this.close();
                        this.errors = null;
                        setTimeout(() => {
                            window.location.href = response.request.responseURL || "/summary";
                        }, 1000);
                    })
                    .catch((error) => {
                        this.errors = error.response.data && error.response.data.errors;
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