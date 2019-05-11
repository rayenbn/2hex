<template>
	<form class="m-form m-form--fit m-form--label-align-right" action="/detail_save" method="POST" id="detailForm">
        <div class="m-portlet__body">
            <div class="form-group m-form__group m--margin-top-10 m--hide">
            </div>
            <div class="form-group m-form__group row">
                <div class="col-10 ml-auto">
                    <h3 class="m-form__section">My Details</h3>
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
                <div class="col-7">
                    <input 
                    	class="form-control m-input" 
                    	name="name" 
                    	type="text" 
                    	v-model="userProfile.name"
                    	placeholder="Enter your full name"
                	>
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">Position in company</label>
                <div class="col-7">
                    <input 
                    	class="form-control m-input" 
                    	type="text" 
                    	v-model="userProfile.position"  
                    	placeholder="Enter your position" 
                    	name="position"
                	>
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">Company Name</label>
                <div class="col-7">
                    <input 
                    	class="form-control m-input" 
                    	type="text" 
                    	v-model="userProfile.company_name" 
                    	placeholder="Enter your company name" 
                    	name="company_name"
                	>
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">Phone No.</label>
                <div class="col-7">
                    <input 
                    	class="form-control m-input" 
                    	type="number" 
                    	v-model="userProfile.phone_num" 
                    	placeholder="Enter your phone number" 
                    	name="phone_num"
                	>
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">Email Address.</label>
                <div class="col-7">
                    <input 
                    	class="form-control m-input" 
                    	type="text" 
                    	v-model="userProfile.email" 
                    	name="email" 
                    	placeholder="Enter your email" 
                	>
                </div>
            </div>
        </div>

        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions">
                <div class="row">
                    <div class="col-md-7 offset-md-2">
                        <button
                        	v-if="user" 
                        	type="submit" 
                        	class="btn btn-accent m-btn m-btn--air m-btn--custom" 
                        	id="save_details"
                        	@click.prevent="save"
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

    </form>
</template>

<script>
	export default {
		name: 'form-user-details',
		props: {
			user: {
                type: Object,
                default: null
            },
		},
		data() {
			return {
				userProfile: {
					name: "",
					position: "",
					company_name: "",
					phone_num: "",
					email: ""
				}
			}
		},
		methods: {
			setUser() {
				if (this.user) {
					this.userProfile.name         = this.user.name;
					this.userProfile.position     = this.user.position;
					this.userProfile.company_name = this.user.company_name;
					this.userProfile.phone_num    = this.user.phone_num;
					this.userProfile.email        = this.user.email;

					return true;
				}

				return false;
			},
			reset() {
				if (!this.setUser()) {
					this.userProfile.name         = "";
					this.userProfile.position     = "";
					this.userProfile.company_name = "";
					this.userProfile.phone_num    = "";
					this.userProfile.email        = "";
				}
			},
			save() {
				axios.post('/detail_save', this.userProfile)
                    .then((response) => {
                    	setTimeout(() => {
                           	window.location.href = response.request.responseURL;
                        }, 1000);
                    })
                    .catch((error) => {
                        console.error(error);
                    });  
			}
		},
		created() {
			this.setUser();
		}
	}
</script>