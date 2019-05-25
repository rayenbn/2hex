<template>
    <div class="m-wizard__form-step" id="m_wizard_form_step_2">
        <div class="row">
            <div class="col-xl-6">

                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">OS780</h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li 
                                    class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" 
                                    m-dropdown-toggle="hover"
                                >
                                    <button
                                        @click.prevent="changePrice"    
                                        class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill"
                                        :class="[!status ? 'btn-success m-btn--custom' : 'btn-secondary btn-lg']"
                                    >
                                        <i class="fa" :class="[!status ? 'fa-check' : 'fa-times']"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget17">
                            <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                <div>
                                    <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                        <img 
                                            src="/skateboard-deck-production/european-maple-for-skateboard-deck-manufacturer-2hex.jpg" 
                                            alt=""  
                                            class="step1-img1"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>OS780</h3>
                                Aenean fringilla mi tristique imperdiet aliquam. Praesent a odio et nunc iaculis auctor id non justo. In hac habitasse platea dictumst. Phasellus dui ipsum, dapibus eget erat nec, auctor ultricies dolor. Nullam sit amet tempus elit, non semper nunc. Suspendisse vel tincidunt nisl, sit amet porta libero. Fusce scelerisque purus a leo maximus aliquam. Duis mauris sapien, vehicula quis leo suscipit, molestie viverra sapien. Vivamus vitae ipsum lacus. In hac habitasse platea dictumst.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">HS780</h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li     
                                    class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" 
                                    m-dropdown-toggle="hover"
                                >
                                    <button
                                        @click.prevent="changePrice"    
                                        class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill"
                                        :class="[status ? 'btn-success m-btn--custom' : 'btn-secondary btn-lg']"
                                    >
                                        <i class="fa" :class="[status ? 'fa-check' : 'fa-times']"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget17">
                            <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                <div >
                                    <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                        <img 
                                            src="/skateboard-deck-production/american-maple-for-skateboard-decks-factory-2hex.jpg" 
                                            alt="" 
                                            class="step1-img1"
                                        >
                                    </div>
                                </div>
                            </div>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>HS780</h3>
                                Proin ac erat et eros euismod hendrerit. Aliquam venenatis, quam in volutpat mollis, risus ipsum hendrerit felis, auctor lacinia nunc purus sagittis lacus. Pellentesque pharetra tristique sem ut feugiat. Donec cursus arcu non augue cursus imperdiet. Proin eu lorem tortor. Proin eu orci in lacus lobortis finibus et in ante.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {GRIP_GRIT_PRICE} from '@/constants';

    export default {
		name: 'skateboard-decks-step-2',
        props: {
            state: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                status: this.state
            }
        },
        watch: {
            status: _.debounce(function(val){
                this.$emit('stateChange', val);
            }, 300)
        },
        methods: {
            changePrice() {
                this.status = !this.status;
                this.$store.commit(
                    'griptapeConfigurator/changePrice', 
                    this.status ? GRIP_GRIT_PRICE : -GRIP_GRIT_PRICE
                );
            }
        }
    }
</script>