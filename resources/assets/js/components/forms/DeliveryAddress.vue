<template>
	<form class="m-form m-form--fit m-form--label-align-right">
        <div class="m-portlet__body">
            <div class="form-group m-form__group m--margin-top-10 m--hide">

            </div>
            <div class="form-group m-form__group row">
                <div class="col-10 ml-auto">
                    <h3 class="m-form__section">1. Invoice Address</h3>
                </div>
            </div>
            
            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">Company Name</label>
                <div class="col-7">
                    <input 
                        class="form-control m-input" 
                        id="invoice_company" 
                        type="text" 
                        v-model="info.invoice_company"
                    >
                </div>
            </div>
            
            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
                <div class="col-7">
                    <input 
                        class="form-control m-input" 
                        id="invoice_name" 
                        type="text" 
                        v-model="info.invoice_name"
                    >
                </div>
            </div>
            
            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">Country</label>
                <div class="col-7">
                    <input 
                        class="form-control m-input" 
                        id="invoice_country" 
                        type="text" 
                        v-model="info.invoice_country"
                    >
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">Tax ID</label>
                <div class="col-7">
                    <input 
                        class="form-control m-input" 
                        id="invoice_taxid" 
                        type="text" 
                        v-model="info.invoice_taxid"
                    >
                    <span class="m-form__help">
                        European companies must either provide their European Tax ID or pay 19% value addet tax.
                    </span>
                </div>
            </div>
            
            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
           
            <div class="form-group m-form__group row">
                <div class="col-10 ml-auto">
                    <h3 class="m-form__section">2. Shipping Address</h3>
                </div>
            </div>
            
            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">Company Name</label>
                <div class="col-7">
                    <input 
                        class="form-control m-input" 
                        id="shipping_company" 
                        type="text" 
                        v-model="info.shipping_company"
                    >
                    <span class="m-form__help">Private name if you do not have a company.</span>
                </div>
            </div>
            
            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">Address</label>
                <div class="col-7">
                    <input 
                        class="form-control m-input" 
                        id="shipping_address" 
                        type="text" 
                        v-model="info.shipping_address"
                    >
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">City</label>
                <div class="col-7">
                    <input 
                        class="form-control m-input" 
                        id="shipping_city" 
                        type="text" 
                        v-model="info.shipping_city"
                    >
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">State</label>
                <div class="col-7">
                    <input 
                        class="form-control m-input" 
                        type="text" 
                        id="shipping_state"
                        v-model="info.shipping_state"
                    >
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">Postcode</label>
                <div class="col-7">
                    <input 
                        class="form-control m-input" 
                        type="text" 
                        id="shipping_postcode"
                        v-model="info.shipping_postcode"
                    >
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">Country</label>
                <div class="col-7">
                    <input 
                        class="form-control m-input" 
                        type="text" 
                        id="shipping_country"
                        v-model="info.shipping_country"
                    >
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">Contact Person</label>
                <div class="col-7">
                    <input 
                        class="form-control m-input" 
                        type="text" 
                        id="shipping_contactperson"
                        v-model="info.shipping_contactperson"
                    >
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">Phone No.</label>
                <div class="col-7">
                    <input 
                    class="form-control m-input" 
                    type="text"
                    id="shipping_phone"
                    v-model="info.shipping_phone"
                >
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-7">
                        <button 
                            type="button" 
                            class="btn btn-accent m-btn m-btn--air m-btn--custom"  
                            @click.prevent="showModal = true"
                        >
                            Save changes
                        </button>
                        &nbsp;&nbsp;
                        <button 
                            @click.prevent="reset"
                            class="btn btn-secondary m-btn m-btn--air m-btn--custom"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal confirm save -->
        <modal v-if="showModal" @close="showModal = false">
            <h3 slot="header">Invoice & Delivery Address</h3>
            <div slot="body">Do you really want to save this?</div>
            <div slot="footer">
                <button 
                    type="button" 
                    class="btn btn-secondary" 
                    @click="showModal = false"
                >
                    Close
                </button>
                <button 
                    type="button" 
                    class="btn btn-primary"
                    @click="save"
                >
                    Save changes
                </button>
            </div>
        </modal>

    </form>
</template>

<script>
    import Modal from "@/components/modals/Modal.vue";

	export default {
		name: 'form-delivery-address',
		props: {
			shipinfo: {
                type: Object,
                default: null
            },
		},
        components: {
            Modal
        },
		data() {
			return {
                showModal: false,
				info: {
					invoice_company: "",
                    invoice_name: "",
                    invoice_country: "",
                    invoice_taxid: "",
                    shipping_company: "",
                    shipping_address: "",
                    shipping_city: "",
                    shipping_state: "",
                    shipping_postcode: "",
                    shipping_country: "",
                    shipping_contactperson: "",
                    shipping_phone: ""
				}
			}
		},
		methods: {
			setInfo() {
				if (this.shipinfo) {
					this.info.invoice_company  = this.shipinfo.invoice_company;
					this.info.invoice_name     = this.shipinfo.invoice_name;
					this.info.invoice_country  = this.shipinfo.invoice_country;
					this.info.invoice_taxid    = this.shipinfo.invoice_taxid;
                    this.info.shipping_company = this.shipinfo.shipping_company;

                    this.info.shipping_address       = this.shipinfo.shipping_address;
                    this.info.shipping_city          = this.shipinfo.shipping_city;
                    this.info.shipping_state         = this.shipinfo.shipping_state;
                    this.info.shipping_postcode      = this.shipinfo.shipping_postcode;
                    this.info.shipping_country       = this.shipinfo.shipping_country;
                    this.info.shipping_contactperson = this.shipinfo.shipping_contactperson;
					this.info.shipping_phone         = this.shipinfo.shipping_phone;

					return true;
				}

				return false;
			},
			reset() {
				if (!this.setInfo()) {
					this.info.invoice_company        = "";
                    this.info.invoice_name           = "";
                    this.info.invoice_country        = "";
                    this.info.invoice_taxid          = "";
                    this.info.shipping_company       = "";
                    this.info.shipping_address       = "";
                    this.info.shipping_city          = "";
                    this.info.shipping_state         = "";
                    this.info.shipping_postcode      = "";
                    this.info.shipping_country       = "";
                    this.info.shipping_contactperson = "";
                    this.info.shipping_phone         = "";
				}
			},
			save() {
				axios.post('/address_save', this.info)
                    .then((response) => {
                        this.showModal = false;
                        this.$notify({
                            group: 'main',
                            type: 'success',
                            title: 'Invoice & Delivery Address',
                            text: 'changes saved'
                        });
                    })
                    .catch((e) => {
                        this.$notify({
                            group: 'main',
                            type: 'error',
                            title: 'Invoice & Delivery Address',
                            text: e.message
                        });
                    });  
			}
		},
		created() {
			this.setInfo();
		}
	}
</script>