@extends('layouts.app')

@section('title', 'CONTACT YOUR SKATEBOARD MANUFACTURER')

@push('head.meta')
    <meta name="description" content="2HEX skateboard factory contact page.  Leave us a message to run your custom skateboard production with 2HEX, your oem skateboard manufacturer.">

    <meta name="keywords" content="2HEX contact, skateboard factory contact, skateboard manufacturer contact, skateboard manufacturer, skateboard supplier, skateboard factory">
@endpush

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-content">
            <div 
                class="alert alert-success alert-dismissible fade show m-alert m-alert--air" 
                role="alert"
                style="padding: 0.85rem 2.5rem;margin: 15px 0; display: none;"
            >
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <span>Successfully Deliverd</span>
            </div>
            <div 
                class="alert alert-danger alert-dismissible fade show m-alert m-alert--air" 
                role="alert"
                style="padding: 0.85rem 2.5rem;margin: 15px 0; display: none;"
            >
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <span>Please Accept Our Terms Policy</span>
            </div>
            <!--Begin::Main Portlet-->
            <div class="m-portlet m-portlet--full-height">

                <!--begin: Portlet Head-->
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Company Skateboard Production Inquiry
                            </h3>
                        </div>
                    </div>
                </div>

                <!--end: Portlet Head-->

                <!--begin: Portlet Body-->
                <div class="m-portlet__body m-portlet__body--no-padding">

                    <!--begin: Form Wizard-->
                    <div class="m-wizard m-wizard--4 m-wizard--brand" id="m_wizard">
                        <div class="row m-row--no-padding">
                            <div class="col-xl-3 col-lg-12 m--padding-top-20 m--padding-bottom-15">

                                <!--begin: Form Wizard Head -->
                                <div class="m-wizard__head">

                                    <!--begin: Form Wizard Nav -->
                                    <div class="m-wizard__nav">
                                        <div class="m-wizard__steps">
                                            <div class="m-wizard__step m-wizard__step--done" m-wizard-target="m_wizard_form_step_1">
                                                <div class="m-wizard__step-info">
                                                    <a href="#" class="m-wizard__step-number">
                                                        <span><span>1</span></span>
                                                    </a>
                                                    <div class="m-wizard__step-label">
                                                        Product
                                                    </div>
                                                    <div class="m-wizard__step-icon"><i class="la la-check"></i></div>
                                                </div>
                                            </div>
                                            <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_2">
                                                <div class="m-wizard__step-info">
                                                    <a href="#" class="m-wizard__step-number">
                                                        <span><span>2</span></span>
                                                    </a>
                                                    <div class="m-wizard__step-label">
                                                        Contact
                                                    </div>
                                                    <div class="m-wizard__step-icon"><i class="la la-check"></i></div>
                                                </div>
                                            </div>
                                            <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_3">
                                                <div class="m-wizard__step-info">
                                                    <a href="#" class="m-wizard__step-number">
                                                        <span><span>3</span></span>
                                                    </a>
                                                    <div class="m-wizard__step-label">
                                                        Company
                                                    </div>
                                                    <div class="m-wizard__step-icon"><i class="la la-check"></i></div>
                                                </div>
                                            </div>
                                            <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_4">
                                                <div class="m-wizard__step-info">
                                                    <a href="#" class="m-wizard__step-number">
                                                        <span><span>4</span></span>
                                                    </a>
                                                    <div class="m-wizard__step-label">
                                                        Confirmation
                                                    </div>
                                                    <div class="m-wizard__step-icon"><i class="la la-check"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end: Form Wizard Nav -->
                                </div>

                                <!--end: Form Wizard Head -->
                            </div>
                            <div class="col-xl-9 col-lg-12">

                                <!--begin: Form Wizard Form-->
                                <div class="m-wizard__form">`

                                    <!--
                1) Use m-form--label-align-left class to alight the form input lables to the right
                2) Use m-form--state class to highlight input control borders on form validation
            -->
                                    <form class="m-form m-form--label-align-left- m-form--state-" id="m_form">

                                        <!--begin: Form Body -->
                                        <input type="hidden" value="company" id="inq_type">
                                        <div class="m-portlet__body m-portlet__body--no-padding">

                                            <!--begin: Form Wizard Step 1-->
                                            <div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
                                                <div class="m-form__section m-form__section--first">
                                                    <div class="m-form__heading">
                                                        <h3 class="m-form__heading-title">Product</h3>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">* Product:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="product" id="product" required class="form-control m-input" placeholder="Custom shaped skateboard decks in various sizes." value="">
                                                            <span class="m-form__help">Please describe your required product(s)</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">* Product Quantity:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="quantity" id="quantities" required class="form-control m-input" placeholder="1000 decks per 3 months" value="">
                                                            <span class="m-form__help">Please enter your approximate order quantity</span>
                                                        </div>
                                                    </div>
                                                </div>







                                            </div>

                                            <!--end: Form Wizard Step 1-->

                                            <!--begin: Form Wizard Step 2-->
                                            <div class="m-wizard__form-step" id="m_wizard_form_step_2">
                                                <div class="m-form__section m-form__section--first">
                                                    <div class="m-form__heading">
                                                        <h3 class="m-form__heading-title">Contact</h3>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">* First and Last Name:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="name" id="name" required class="form-control m-input" placeholder="Ryan Miller" value="">
                                                            <span class="m-form__help">Please enter your first and last name</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Phone Number:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="phone" id="phone" required class="form-control m-input" placeholder="+1 685 1234 5665" value="">
                                                            <span class="m-form__help">Phone number (if you would like to discuss our cooperation by phone)</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">* Country:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <select name="country" id="country" required class="form-control m-input">
                                                                <option value="">Select</option>
                                                                <option value="AF">Afghanistan</option>
                                                                <option value="AX">Åland Islands</option>
                                                                <option value="AL">Albania</option>
                                                                <option value="DZ">Algeria</option>
                                                                <option value="AS">American Samoa</option>
                                                                <option value="AD">Andorra</option>
                                                                <option value="AO">Angola</option>
                                                                <option value="AI">Anguilla</option>
                                                                <option value="AQ">Antarctica</option>
                                                                <option value="AG">Antigua and Barbuda</option>
                                                                <option value="AR">Argentina</option>
                                                                <option value="AM">Armenia</option>
                                                                <option value="AW">Aruba</option>
                                                                <option value="AU">Australia</option>
                                                                <option value="AT">Austria</option>
                                                                <option value="AZ">Azerbaijan</option>
                                                                <option value="BS">Bahamas</option>
                                                                <option value="BH">Bahrain</option>
                                                                <option value="BD">Bangladesh</option>
                                                                <option value="BB">Barbados</option>
                                                                <option value="BY">Belarus</option>
                                                                <option value="BE">Belgium</option>
                                                                <option value="BZ">Belize</option>
                                                                <option value="BJ">Benin</option>
                                                                <option value="BM">Bermuda</option>
                                                                <option value="BT">Bhutan</option>
                                                                <option value="BO">Bolivia, Plurinational State of</option>
                                                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                                <option value="BA">Bosnia and Herzegovina</option>
                                                                <option value="BW">Botswana</option>
                                                                <option value="BV">Bouvet Island</option>
                                                                <option value="BR">Brazil</option>
                                                                <option value="IO">British Indian Ocean Territory</option>
                                                                <option value="BN">Brunei Darussalam</option>
                                                                <option value="BG">Bulgaria</option>
                                                                <option value="BF">Burkina Faso</option>
                                                                <option value="BI">Burundi</option>
                                                                <option value="KH">Cambodia</option>
                                                                <option value="CM">Cameroon</option>
                                                                <option value="CA">Canada</option>
                                                                <option value="CV">Cape Verde</option>
                                                                <option value="KY">Cayman Islands</option>
                                                                <option value="CF">Central African Republic</option>
                                                                <option value="TD">Chad</option>
                                                                <option value="CL">Chile</option>
                                                                <option value="CN">China</option>
                                                                <option value="CX">Christmas Island</option>
                                                                <option value="CC">Cocos (Keeling) Islands</option>
                                                                <option value="CO">Colombia</option>
                                                                <option value="KM">Comoros</option>
                                                                <option value="CG">Congo</option>
                                                                <option value="CD">Congo, the Democratic Republic of the</option>
                                                                <option value="CK">Cook Islands</option>
                                                                <option value="CR">Costa Rica</option>
                                                                <option value="CI">Côte d'Ivoire</option>
                                                                <option value="HR">Croatia</option>
                                                                <option value="CU">Cuba</option>
                                                                <option value="CW">Curaçao</option>
                                                                <option value="CY">Cyprus</option>
                                                                <option value="CZ">Czech Republic</option>
                                                                <option value="DK">Denmark</option>
                                                                <option value="DJ">Djibouti</option>
                                                                <option value="DM">Dominica</option>
                                                                <option value="DO">Dominican Republic</option>
                                                                <option value="EC">Ecuador</option>
                                                                <option value="EG">Egypt</option>
                                                                <option value="SV">El Salvador</option>
                                                                <option value="GQ">Equatorial Guinea</option>
                                                                <option value="ER">Eritrea</option>
                                                                <option value="EE">Estonia</option>
                                                                <option value="ET">Ethiopia</option>
                                                                <option value="FK">Falkland Islands (Malvinas)</option>
                                                                <option value="FO">Faroe Islands</option>
                                                                <option value="FJ">Fiji</option>
                                                                <option value="FI">Finland</option>
                                                                <option value="FR">France</option>
                                                                <option value="GF">French Guiana</option>
                                                                <option value="PF">French Polynesia</option>
                                                                <option value="TF">French Southern Territories</option>
                                                                <option value="GA">Gabon</option>
                                                                <option value="GM">Gambia</option>
                                                                <option value="GE">Georgia</option>
                                                                <option value="DE">Germany</option>
                                                                <option value="GH">Ghana</option>
                                                                <option value="GI">Gibraltar</option>
                                                                <option value="GR">Greece</option>
                                                                <option value="GL">Greenland</option>
                                                                <option value="GD">Grenada</option>
                                                                <option value="GP">Guadeloupe</option>
                                                                <option value="GU">Guam</option>
                                                                <option value="GT">Guatemala</option>
                                                                <option value="GG">Guernsey</option>
                                                                <option value="GN">Guinea</option>
                                                                <option value="GW">Guinea-Bissau</option>
                                                                <option value="GY">Guyana</option>
                                                                <option value="HT">Haiti</option>
                                                                <option value="HM">Heard Island and McDonald Islands</option>
                                                                <option value="VA">Holy See (Vatican City State)</option>
                                                                <option value="HN">Honduras</option>
                                                                <option value="HK">Hong Kong</option>
                                                                <option value="HU">Hungary</option>
                                                                <option value="IS">Iceland</option>
                                                                <option value="IN">India</option>
                                                                <option value="ID">Indonesia</option>
                                                                <option value="IR">Iran, Islamic Republic of</option>
                                                                <option value="IQ">Iraq</option>
                                                                <option value="IE">Ireland</option>
                                                                <option value="IM">Isle of Man</option>
                                                                <option value="IL">Israel</option>
                                                                <option value="IT">Italy</option>
                                                                <option value="JM">Jamaica</option>
                                                                <option value="JP">Japan</option>
                                                                <option value="JE">Jersey</option>
                                                                <option value="JO">Jordan</option>
                                                                <option value="KZ">Kazakhstan</option>
                                                                <option value="KE">Kenya</option>
                                                                <option value="KI">Kiribati</option>
                                                                <option value="KP">Korea, Democratic People's Republic of</option>
                                                                <option value="KR">Korea, Republic of</option>
                                                                <option value="KW">Kuwait</option>
                                                                <option value="KG">Kyrgyzstan</option>
                                                                <option value="LA">Lao People's Democratic Republic</option>
                                                                <option value="LV">Latvia</option>
                                                                <option value="LB">Lebanon</option>
                                                                <option value="LS">Lesotho</option>
                                                                <option value="LR">Liberia</option>
                                                                <option value="LY">Libya</option>
                                                                <option value="LI">Liechtenstein</option>
                                                                <option value="LT">Lithuania</option>
                                                                <option value="LU">Luxembourg</option>
                                                                <option value="MO">Macao</option>
                                                                <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                                                <option value="MG">Madagascar</option>
                                                                <option value="MW">Malawi</option>
                                                                <option value="MY">Malaysia</option>
                                                                <option value="MV">Maldives</option>
                                                                <option value="ML">Mali</option>
                                                                <option value="MT">Malta</option>
                                                                <option value="MH">Marshall Islands</option>
                                                                <option value="MQ">Martinique</option>
                                                                <option value="MR">Mauritania</option>
                                                                <option value="MU">Mauritius</option>
                                                                <option value="YT">Mayotte</option>
                                                                <option value="MX">Mexico</option>
                                                                <option value="FM">Micronesia, Federated States of</option>
                                                                <option value="MD">Moldova, Republic of</option>
                                                                <option value="MC">Monaco</option>
                                                                <option value="MN">Mongolia</option>
                                                                <option value="ME">Montenegro</option>
                                                                <option value="MS">Montserrat</option>
                                                                <option value="MA">Morocco</option>
                                                                <option value="MZ">Mozambique</option>
                                                                <option value="MM">Myanmar</option>
                                                                <option value="NA">Namibia</option>
                                                                <option value="NR">Nauru</option>
                                                                <option value="NP">Nepal</option>
                                                                <option value="NL">Netherlands</option>
                                                                <option value="NC">New Caledonia</option>
                                                                <option value="NZ">New Zealand</option>
                                                                <option value="NI">Nicaragua</option>
                                                                <option value="NE">Niger</option>
                                                                <option value="NG">Nigeria</option>
                                                                <option value="NU">Niue</option>
                                                                <option value="NF">Norfolk Island</option>
                                                                <option value="MP">Northern Mariana Islands</option>
                                                                <option value="NO">Norway</option>
                                                                <option value="OM">Oman</option>
                                                                <option value="PK">Pakistan</option>
                                                                <option value="PW">Palau</option>
                                                                <option value="PS">Palestinian Territory, Occupied</option>
                                                                <option value="PA">Panama</option>
                                                                <option value="PG">Papua New Guinea</option>
                                                                <option value="PY">Paraguay</option>
                                                                <option value="PE">Peru</option>
                                                                <option value="PH">Philippines</option>
                                                                <option value="PN">Pitcairn</option>
                                                                <option value="PL">Poland</option>
                                                                <option value="PT">Portugal</option>
                                                                <option value="PR">Puerto Rico</option>
                                                                <option value="QA">Qatar</option>
                                                                <option value="RE">Réunion</option>
                                                                <option value="RO">Romania</option>
                                                                <option value="RU">Russian Federation</option>
                                                                <option value="RW">Rwanda</option>
                                                                <option value="BL">Saint Barthélemy</option>
                                                                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                                                <option value="KN">Saint Kitts and Nevis</option>
                                                                <option value="LC">Saint Lucia</option>
                                                                <option value="MF">Saint Martin (French part)</option>
                                                                <option value="PM">Saint Pierre and Miquelon</option>
                                                                <option value="VC">Saint Vincent and the Grenadines</option>
                                                                <option value="WS">Samoa</option>
                                                                <option value="SM">San Marino</option>
                                                                <option value="ST">Sao Tome and Principe</option>
                                                                <option value="SA">Saudi Arabia</option>
                                                                <option value="SN">Senegal</option>
                                                                <option value="RS">Serbia</option>
                                                                <option value="SC">Seychelles</option>
                                                                <option value="SL">Sierra Leone</option>
                                                                <option value="SG">Singapore</option>
                                                                <option value="SX">Sint Maarten (Dutch part)</option>
                                                                <option value="SK">Slovakia</option>
                                                                <option value="SI">Slovenia</option>
                                                                <option value="SB">Solomon Islands</option>
                                                                <option value="SO">Somalia</option>
                                                                <option value="ZA">South Africa</option>
                                                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                                <option value="SS">South Sudan</option>
                                                                <option value="ES">Spain</option>
                                                                <option value="LK">Sri Lanka</option>
                                                                <option value="SD">Sudan</option>
                                                                <option value="SR">Suriname</option>
                                                                <option value="SJ">Svalbard and Jan Mayen</option>
                                                                <option value="SZ">Swaziland</option>
                                                                <option value="SE">Sweden</option>
                                                                <option value="CH">Switzerland</option>
                                                                <option value="SY">Syrian Arab Republic</option>
                                                                <option value="TW">Taiwan, Province of China</option>
                                                                <option value="TJ">Tajikistan</option>
                                                                <option value="TZ">Tanzania, United Republic of</option>
                                                                <option value="TH">Thailand</option>
                                                                <option value="TL">Timor-Leste</option>
                                                                <option value="TG">Togo</option>
                                                                <option value="TK">Tokelau</option>
                                                                <option value="TO">Tonga</option>
                                                                <option value="TT">Trinidad and Tobago</option>
                                                                <option value="TN">Tunisia</option>
                                                                <option value="TR">Turkey</option>
                                                                <option value="TM">Turkmenistan</option>
                                                                <option value="TC">Turks and Caicos Islands</option>
                                                                <option value="TV">Tuvalu</option>
                                                                <option value="UG">Uganda</option>
                                                                <option value="UA">Ukraine</option>
                                                                <option value="AE">United Arab Emirates</option>
                                                                <option value="GB">United Kingdom</option>
                                                                <option value="US" selected>United States</option>
                                                                <option value="UM">United States Minor Outlying Islands</option>
                                                                <option value="UY">Uruguay</option>
                                                                <option value="UZ">Uzbekistan</option>
                                                                <option value="VU">Vanuatu</option>
                                                                <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                                <option value="VN">Viet Nam</option>
                                                                <option value="VG">Virgin Islands, British</option>
                                                                <option value="VI">Virgin Islands, U.S.</option>
                                                                <option value="WF">Wallis and Futuna</option>
                                                                <option value="EH">Western Sahara</option>
                                                                <option value="YE">Yemen</option>
                                                                <option value="ZM">Zambia</option>
                                                                <option value="ZW">Zimbabwe</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--end: Form Wizard Step 2-->



                                            <!--begin: Form Wizard Step 3-->
                                            <div class="m-wizard__form-step" id="m_wizard_form_step_3">
                                                <div class="m-form__section m-form__section--first">
                                                    <div class="m-form__heading">
                                                        <h3 class="m-form__heading-title">About Your Company</h3>
                                                        <span>We are especially interested in a cooperation, if we see that your company is well established.</span>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">* Company Name:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="companyname" required id="companyname" class="form-control m-input" placeholder="Purple Skateboard Co" value="">
                                                            <span class="m-form__help">Please enter your company name</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">* Website:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="website" required id="website" class="form-control m-input" placeholder="www.yourskateboardco.com" value="">
                                                            <br>
                                                            <label class="switch mr-2 mb-0">
                                                                <input type="checkbox" name="checkbox" id="nowebsite">
                                                                <span class="slider round"></span>
                                                            </label>
                                                            <span>We do not yet have a website</span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">* Social Media:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="social" required id="social" class="form-control m-input" placeholder="@YourInstagram" value="">
                                                            <br>
                                                            <label class="switch mr-2 mb-0">
                                                                <input type="checkbox" name="checkbox" id="nosocial">
                                                                <span class="slider round"></span>
                                                            </label>
                                                            <span>We do not have a social media presence</span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">* Link to one of your products:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="product_link" required id="product_link" class="form-control m-input" placeholder="https://www.zumiez.com/skate/skateboard-decks.html?d=4294967250" value="">
                                                            <br>
                                                            <label class="switch mr-2 mb-0">
                                                                <input type="checkbox" name="checkbox" id="noproduct">
                                                                <span class="slider round"></span>
                                                            </label>
                                                            <span>We do not yet have custom products</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--end: Form Wizard Step 3-->

                                            <!--begin: Form Wizard Step 4-->
                                            <div class="m-wizard__form-step" id="m_wizard_form_step_4">

                                                <!--begin::Section-->
                                                <div class="m-accordion m-accordion--default" id="m_accordion_1" role="tablist">

                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">* Email:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="email" name="email" required id="email" class="form-control m-input" placeholder="ryan.miller@purpleskateco.com" value="">
                                                            <span class="m-form__help">We will send our answer to this email address.</span>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!--end::Section-->

                                                <!--end::Section-->
                                                <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                                <div class="form-group m-form__group m-form__group--sm row">


                                                    <div class="col-xl-12">
                                                        <div class="m-checkbox-inline">
                                                            <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                                                <input type="checkbox" name="accept" value="1" id="accept">
                                                                * I have read and I agree to 2HEX' <a href="/imprint#terms" class="m-nav__link">Terms and Conditions</a>.<br>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <!--end: Form Wizard Step 4-->
                                        </div>

                                        <!--end: Form Body -->

                                        <!--begin: Form Actions -->
                                        <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                                            <div class="m-form__actions">
                                                <div class="row">
                                                    <div class="col-lg-6 m--align-left">
                                                        <a href="#" class="btn btn-secondary m-btn m-btn--custom m-btn--icon" data-wizard-action="prev">
																		<span>
																			<i class="la la-arrow-left"></i>&nbsp;&nbsp;
																			<span>Back</span>
																		</span>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-6 m--align-right">
                                                        <button href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon" data-wizard-action="submit">
																		<span>
																			<i class="la la-check"></i>&nbsp;&nbsp;
																			<span>Submit</span>
																		</span>
                                                        </button>
                                                        <a href="#" class="btn btn-success m-btn m-btn--custom m-btn--icon" data-wizard-action="next">
																		<span>
																			<span>Save &amp; Continue</span>&nbsp;&nbsp;
																			<i class="la la-arrow-right"></i>
																		</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end: Form Actions -->
                                    </form>
                                </div>

                                <!--end: Form Wizard Form-->
                            </div>
                        </div>
                    </div>

                    <!--end: Form Wizard-->
                </div>

                <!--end: Portlet Body-->
            </div>

            <!--End::Main Portlet-->
        </div>


    </div>
@endsection