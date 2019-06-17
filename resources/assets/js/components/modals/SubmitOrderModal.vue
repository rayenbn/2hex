<template>
    <modal v-if="show" @close="close">
        <div slot="header">
            <h2 class="m-0">SUCCESS!</h2>
        </div>
        <div slot="body">
            <p>
                Your order has been sent successfully! We are sending you an order confirmation and invoice by email right now. Please check your inbox and spam folder.
            </p>
        </div>
        <div slot="footer">
            <a
                href="/profile#submitted_orders"
                class="btn btn-primary"
            >
                Okay
            </a>
        </div>
    </modal>
</template>

<script>
    import Modal from '@/components/modals/Modal';

    export default {
        name: 'submit-order-modal',
        components: {
            Modal
        },
        data() {
            return {
                show: true
            };
        },
        methods: {
            close() {
                this.show = false;
                this.$emit('close', this.show);
            }
        }
    };
</script>