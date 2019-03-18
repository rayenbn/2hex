@extends('layouts.app')

@section('content')
   <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->                   

                    <!-- END: Subheader -->                   
                    
        <div class="m-content">
            <div class="row">
                <div class="col-xl-9">

                    <!--Begin::Main Portlet-->
                    <div class="m-portlet">

                        <!--begin: Portlet Head-->
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Skateboard Deck Configurator
                                    </h3>
                                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline" id="breadcrumbs">
                                    
                                        <li class="m-nav__item">
                                            <a href="/" class="m-nav__link">
                                                <span class="m-nav__link-text">Home -</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="skateboard-deck-manufacturer" class="m-nav__link">
                                                <span class="m-nav__link-text">Configurator -</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="skateboard-deck-configurator" class="m-nav__link">
                                                <span class="m-nav__link-text">SB Deck</span>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>        
                            
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        
                                        <a   data-toggle="m-tooltip" class="m-portlet__nav-link m-portlet__nav-link--icon" data-direction="left" data-width="auto" title="Get help with filling up this form">
                                            <i class="flaticon-info m--icon-font-size-lg3"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>

                        <!--end: Portlet Head-->
                        
                                    
                        <!--begin: Form Wizard-->
                        <div class="m-wizard m-wizard--1 m-wizard--success" id="m_wizard">

                            <!--begin: Message container -->
                            <div class="m-portlet__padding-x">

                                <!-- Here you can put a message or alert -->
                            </div>

                            <!--end: Message container -->

                            <!--begin: Form Wizard Head -->

                                <!--begin: Form Wizard Progress -->
                                <div class="m-wizard__progress">
                                    <div class="progress" style="height: 2px;">
                                        <div class="progress-bar m--bg-info" role="progressbar" v-bind:style="progressWidth" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end: Form Wizard Progress -->

                                    <!--begin: Form Wizard Nav -->
                                    <div class="m-wizard__nav">
                                        <div class="m-wizard__steps">
                                            
                                            <div class="m-wizard__step m-wizard__step--current" m-wizard-target="m_wizard_form_step_1">
                                            </div>
                                            <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_2">
                                            </div>                  
                                            <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_3">
                                            </div>                                                      
                                            <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_4">
                                            </div>
                                            <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_5">
                                            </div>                  
                                            <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_6">
                                            </div>                                                      
                                            <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_7">
                                            </div>
                                            <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_8">
                                            </div>
                                            <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_9">
                                            </div>
                                            <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_10">
                                            </div>
                                            <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_11">
                                            </div>
                                            
                                        </div>
                                    </div>

                                <!--end: Form Wizard Nav -->
                                </div>

                            <!--end: Form Wizard Head -->

                            <!--begin: Form Wizard Form-->
                            <div class="m-wizard__form">

                                <!--
            1) Use m-form--label-align-left class to alight the form input lables to the right
            2) Use m-form--state class to highlight input control borders on form validation
        -->
                                <form class="m-form m-form--label-align-left- m-form--state-" id="m_form" method="POST" action="/skateboard-deck-configurator">
                                    <!--begin: Form Body -->
                                    <input type="hidden" id="saved_order_id">
                                    <div class="m-portlet__body">
                                        <!--begin: Form Wizard Step 1-->
                                        
                                        <!--end: Form Wizard Step 1-->
                                        <!--begin: Form Wizard Step 2-->
                                        <div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
                                            <div class="row">
                
                                                <div class="col-xl-6">
                                                    
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Batch Quantity
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div>
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/stacked-skateboard-decks-factory-2hex.jpg" alt=""  class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input id="quantity" v-model="quantity" type="text" class="form-control bootstrap-touchspin-vertical-btn" value="" name="quantity" placeholder="30" type="text" @change="quantityChange">

                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>Batch Quantity</h3>
                                                                    Select the required quantity of your first
                                                                    style of decks. Decks are packed and sold in
                                                                    cartons of ten pieces. The final deck price
                                                                    depends on your deck specifications as well as your
                                                                    total order quantity of all batches together.
                                                                    With every batch you add, your previous batched get cheaper as well.
                                                                    You can always go to the summary page to see the price of each batch.

                                                                </div>
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                
                                                
                                                <div class="col-xl-6">
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Size
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div>
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/width-skateboard-decks-manufacturer-2hex.jpg" alt="" class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>      
                                                                <select class="form-control" id="size" name="size" @change="sizeChange" style="width:100%;" v-model="size">
                                                                        <option value="">SELECT</option>
                                                                        <option value="7.0&quot; x 28&quot; (A1: WB 11.73&quot;, N 6.06&quot;, T 6.0&quot;)">7.0" x 28" (A1: WB 11.73", N 6.06", T 6.0")
                                                                        </option><option value="7.25&quot; x 29&quot; (B1: WB13.5&quot;: N5.87&quot;, T5.47&quot;)" selected="">7.25" x 29" (B1: WB13.5": N5.87", T5.47")
                                                                        </option><option value="7.375&quot; x 30&quot; (C1: WB12.81&quot; : N6.81&quot; , T6.18&quot; )">7.375" x 30" (C1: WB12.81" : N6.81" , T6.18" )
                                                                        </option><option value="7.5&quot; x 30.75&quot; (D1: WB14.02&quot;: N6.40&quot;, T6.16&quot;)">7.5" x 30.75" (D1: WB14.02": N6.40", T6.16")
                                                                        </option><option value="7.5&quot; x 31&quot; (D2: WB14.02&quot;: N6.59&quot;, T6.20&quot;)">7.5" x 31" (D2: WB14.02": N6.59", T6.20")
                                                                        </option><option value="7.5&quot; x 31.25&quot; (D3: WB14.02&quot;: N6.73&quot;, T6.34&quot;)">7.5" x 31.25" (D3: WB14.02": N6.73", T6.34")
                                                                        </option><option value="7.5&quot; x 31.5&quot; (D4: WB14.02&quot;: N6.77&quot;, T6.54&quot;)">7.5" x 31.5" (D4: WB14.02": N6.77", T6.54")
                                                                        </option><option value="7.625&quot; x 31.125&quot; (E1: WB14.02&quot;: N6.57&quot;, T6.38&quot;)">7.625" x 31.125" (E1: WB14.02": N6.57", T6.38")
                                                                        </option><option value="7.625&quot; x 31.25&quot; (E2: WB14.02&quot;: N6.73&quot;, T6.34&quot;)">7.625" x 31.25" (E2: WB14.02": N6.73", T6.34")
                                                                        </option><option value="7.625&quot; x 31.5&quot; (E3: WB14.02&quot;: N6.83&quot;, T6.44&quot;)">7.625" x 31.5" (E3: WB14.02": N6.83", T6.44")
                                                                        </option><option value="7.75&quot; x 31&quot; (F1: WB 14.02&quot;, N 6.60&quot;, T 6.20&quot;)">7.75" x 31" (F1: WB 14.02", N 6.60", T 6.20")
                                                                        </option><option value="7.75&quot; x 31.125&quot; (F2: WB14.02&quot;: N6.73&quot;, T6.22&quot;)">7.75" x 31.125" (F2: WB14.02": N6.73", T6.22")
                                                                        </option><option value="7.75&quot; x 31.5&quot; (F3: WB14.02&quot;: N6.85&quot;, T6.46&quot;)">7.75" x 31.5" (F3: WB14.02": N6.85", T6.46")
                                                                        </option><option value="7.75&quot; x 31.75&quot; (F4: WB14.02&quot;: N6.93&quot;, T6.65&quot;)">7.75" x 31.75" (F4: WB14.02": N6.93", T6.65")
                                                                        </option><option value="7.875&quot; x 31.1875&quot; (G1: WB14.02&quot;: N6.77&quot;, T6.22&quot;)">7.875" x 31.1875" (G1: WB14.02": N6.77", T6.22")
                                                                        </option><option value="7.875&quot; x 31.3&quot; (G2: WB14.02&quot;: N6.75&quot;, T6.36&quot;)">7.875" x 31.3" (G2: WB14.02": N6.75", T6.36")
                                                                        </option><option value="7.875&quot; x 31.625&quot; (G3: WB 14.25&quot;, N 6.79&quot;, T 6.40&quot;)">7.875" x 31.625" (G3: WB 14.25", N 6.79", T 6.40")
                                                                        </option><option value="7.875&quot; x 31.875&quot; (G4: WB14.25&quot;: N6.93&quot;, T6.54&quot;)">7.875" x 31.875" (G4: WB14.25": N6.93", T6.54")
                                                                        </option><option value="8.0&quot; x 31&quot; (H1: WB14.02&quot;: N6.59&quot;, T6.20&quot;)">8.0" x 31" (H1: WB14.02": N6.59", T6.20")
                                                                        </option><option value="8.0&quot; x 31.375&quot; (H2: WB14.02&quot;: N6.87&quot;, T6.32&quot;)">8.0" x 31.375" (H2: WB14.02": N6.87", T6.32")
                                                                        </option><option value="8.0&quot; x 31.5&quot; (H3: WB14.02&quot;: N6.93&quot;, T6.38&quot;)">8.0" x 31.5" (H3: WB14.02": N6.93", T6.38")
                                                                        </option><option value="8.0&quot; x 31.75&quot; (H4: WB14.25&quot;: N6.81&quot;, T6.50&quot;)">8.0" x 31.75" (H4: WB14.25": N6.81", T6.50")
                                                                        </option><option value="8.0&quot; x 31.75&quot; (H5: WB14.21&quot; : N6.87&quot;, T6.47&quot;)">8.0" x 31.75" (H5: WB14.21" : N6.87", T6.47")
                                                                        </option><option value="8.0&quot; x 31.875&quot; (H6: WB14.25&quot;: N6.85&quot;, T6.61&quot;)">8.0" x 31.875" (H6: WB14.25": N6.85", T6.61")
                                                                        </option><option value="8.0&quot; x 32&quot; (H7: WB14.02&quot;: N7.13&quot;, T6.65&quot;)">8.0" x 32" (H7: WB14.02": N7.13", T6.65")
                                                                        </option><option value="8.125&quot; x 31.5&quot; (I1: WB14.02&quot;: N6.75&quot; , T6.55&quot; )">8.125" x 31.5" (I1: WB14.02": N6.75" , T6.55" )
                                                                        </option><option value="8.125&quot; x 31.75&quot; (I2: WB14.02&quot;: N6.97&quot;, T6.57&quot;)">8.125" x 31.75" (I2: WB14.02": N6.97", T6.57")
                                                                        </option><option value="8.125&quot; x 31.875&quot; (I3: WB14.25&quot; : N6.8&quot; , T6.625&quot; )">8.125" x 31.875" (I3: WB14.25" : N6.8" , T6.625" )
                                                                        </option><option value="8.125&quot; x 31.875&quot; (I4: WB14.5&quot;: N6.85&quot;, T6.34&quot;)">8.125" x 31.875" (I4: WB14.5": N6.85", T6.34")
                                                                        </option><option value="8.125&quot; x 32&quot; (I5: WB14.25&quot; : N6.9375&quot; , T6.61&quot; )">8.125" x 32" (I5: WB14.25" : N6.9375" , T6.61" )
                                                                        </option><option value="8.25&quot; x 31.625&quot; (I6: WB14.25&quot; : N6.75&quot; , T6.425&quot; )">8.25" x 31.625" (I6: WB14.25" : N6.75" , T6.425" )
                                                                        </option><option value="8.25&quot; x 31.75&quot; (J1: WB14.5&quot;: N6.65&quot;, T6.42&quot;)">8.25" x 31.75" (J1: WB14.5": N6.65", T6.42")
                                                                        </option><option value="8.25&quot; x 32&quot; (J2: WB14.25&quot; : N7.0&quot; , T6.55&quot; )">8.25" x 32" (J2: WB14.25" : N7.0" , T6.55" )
                                                                        </option><option value="8.25&quot; x 32.56&quot; (J3: WB15&quot;: N6.89&quot;, T6.50&quot;)">8.25" x 32.56" (J3: WB15": N6.89", T6.50")
                                                                        </option><option value="8.375&quot; x 32.1875&quot;  (K1: WB14.5&quot;: N7.01&quot;, T6.54&quot;)">8.375" x 32.1875"  (K1: WB14.5": N7.01", T6.54")
                                                                        </option><option value="8.375&quot; x 32.125&quot; (K2: WB14.5&quot;: N6.89&quot;, T6.58&quot;)">8.375" x 32.125" (K2: WB14.5": N6.89", T6.58")
                                                                        </option><option value="8.5&quot; x 32&quot; (L1: WB14.37&quot;: N6.95&quot;, T6.52&quot;)">8.5" x 32" (L1: WB14.37": N6.95", T6.52")
                                                                        </option><option value="8.5&quot; x 32.125&quot; (L2: WB14.56&quot;: N6.81&quot;, T6.57&quot;)">8.5" x 32.125" (L2: WB14.56": N6.81", T6.57")
                                                                        </option><option value="8.5&quot; x 32.5&quot; (L3: WB15&quot;: N6.79&quot;, T6.44&quot;)">8.5" x 32.5" (L3: WB15": N6.79", T6.44")
                                                                        </option><option value="8.5&quot; x 32.875&quot; (L4: WB15.04&quot;: N6.97&quot;, T6.69&quot;)">8.5" x 32.875" (L4: WB15.04": N6.97", T6.69")
                                                                        </option><option value="8.75&quot; x 32.5&quot; (M1: WB14.625&quot; : N7.13&quot;, T6.55&quot; )">8.75" x 32.5" (M1: WB14.625" : N7.13", T6.55" )
                                                                        
                                                                        </option>
                                                                </select>
                        
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>Deck Size</h3>
                                                                    Select the deck shape of this batch.
                                                                    Shapes are shown by "Width x Length" as well
                                                                    as "Wheelbase", "Nose" and "Tail". All dimensions
                                                                    are given in inches.
                                                                </div>                                                                  
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_2">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                        <!--begin:: Widgets/Blog-->
                                                        <div class="m-portlet m-portlet--head-overlay m-portlet--full-height  m-portlet--rounded-force">
                                                            
                                                            <div class="m-portlet__body">
                                                                <div class="m-widget27 m-portlet-fit--sides">
                                                                    <div class="m-widget27__container">

                                                                        <!-- begin::Nav pills -->
                                                                        <ul class="m-widget27__nav-items nav nav-pills nav-fill" role="tablist">
                                                                            <li class="step2-tab-nav nav-item" >
                                                                                <a class="nav-link active" data-toggle="pill" href="#m_personal_income_quater_1">Deep Concave</a>
                                                                            </li>
                                                                            <li class="step2-tab-nav nav-item" >
                                                                                <a class="nav-link" data-toggle="pill" href="#m_personal_income_quater_2">Medium Concave</a>
                                                                            </li>
                                                                        </ul>

                                                                        <!-- end::Nav pills -->

                                                                        <!-- begin::Tab Content -->
                                                                        <div class="m-widget27__tab tab-content m-widget27--no-padding">
                                                                            <div id="m_personal_income_quater_1" class="tab-pane active">
                                                                                <div class="row  align-items-center">
                                                                                    <!-- insert iframe of deck here -->
                                                                                    <div class="col">
                                                                                        <div class="col-xl-12">

                                                                                            <!--begin:: Widgets/Activity-->
                                                                                            <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                                                                <div class="m-portlet__head">
                                                                                                    <div class="m-portlet__head-caption">
                                                                                                        <div class="m-portlet__head-title"></div>
                                                                                                    </div>
                                                                                                    <div class="m-portlet__head-tools">
                                                                                                        <ul class="m-portlet__nav">
                                                                                                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                                                                <a v-if=" steps[1].state" @click=" steps[1].state=! steps[1].state"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                                                                    <i class="fa fa-check"></i>
                                                                                                                </a>
                                                                                                                <a v-else @click=" steps[1].state=! steps[1].state"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                                                        <i class="fa fa-times"></i>
                                                                                                                </a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="m-portlet__body">
                                                                                                    <div class="m-widget17">
                                                                                                        <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                                                                                                            <div style="height:280px; background-color: white;">
                                                                                                            <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                                                            
                                                                                                                <iframe height="280" width="90%" style="margin-left:40px; margin-top:0px;" src="https://sketchfab.com/models/0f583557d87a461e8e920741ad39575c/embed" frameborder="0" allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                        
                                                                                                    </div>
                                                                                                    
                                                                                                    <div style="padding-top:60px; padding-bottom:20px;" class="m-widget17">
                                                                                                        <div class="m-widget17__stats">
                                                                                                            <div class="m-widget17__items m-widget17__items-col1">
                                                                                                                <div class="m-widget17__item">
                                                                                                                    <span class="m-widget17__icon">
                                                                                                                        <i class="flaticon-presentation-1 m--font-brand"></i>
                                                                                                                    </span>
                                                                                                                    <span class="m-widget17__subtitle">
                                                                                                                        Better Grip
                                                                                                                    </span>
                                                                                                                    <span class="m-widget17__desc">
                                                                                                                        Sticks better to feet. 
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="m-widget17__items m-widget17__items-col2">
                                                                                                                <div class="m-widget17__item">
                                                                                                                    <span class="m-widget17__icon">
                                                                                                                        <i class="flaticon-coins m--font-success"></i>
                                                                                                                    </span>
                                                                                                                    <span class="m-widget17__subtitle">
                                                                                                                        $ 0.00
                                                                                                                    </span>
                                                                                                                    <span class="m-widget17__desc">
                                                                                                                        No added cost
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    
                                                                                                    
                                                                                                    <div style="text-align: justify; color: #9699a4;">
                                                                                                        <h3>Deep Concave</h3>
                                                                                                        Deep concave decks are mostly used for vert skateboarding as well as large gaps, as the
                                                                                                        deep concave makes it easier to keep the deck close to your feet.
                                                                                                        Select your preferred concave by check marking the upper right corner.
                                                                                                        
                                                                                                    </div>
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                            <!--end:: Widgets/Activity-->
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div id="m_personal_income_quater_2" class="tab-pane fade">
                                                                                <div class="row  align-items-center">
                                                                                    <div class="col">
                                                                                        <div class="col-xl-12">
                                                                                            <!--begin:: Widgets/Activity-->
                                                                                            <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                                                                <div class="m-portlet__head">
                                                                                                    <div class="m-portlet__head-caption">
                                                                                                        <div class="m-portlet__head-title">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="m-portlet__head-tools">
                                                                                                        <ul class="m-portlet__nav">
                                                                                                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                                                                <a v-if="!steps[1].state" @click=" steps[1].state=! steps[1].state"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                                                                    <i class="fa fa-check"></i>
                                                                                                                </a>
                                                                                                                <a v-else @click=" steps[1].state=! steps[1].state"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                                                        <i class="fa fa-times"></i>
                                                                                                                </a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="m-portlet__body">
                                                                                                    <div class="m-widget17">
                                                                                                        <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                                                                                                            <div style="height:280px; background-color: white;">
                                                                                                            <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                                                                <iframe height="280" width="90%" style="margin-left:40px; margin-top:0px;" src="https://sketchfab.com/models/6998edf0f00e43f09bb6047ebc0a56e5/embed" frameborder="0" allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div style="padding-top:60px; padding-bottom:20px;" class="m-widget17">
                                                                                                        <div class="m-widget17__stats">
                                                                                                            <div class="m-widget17__items m-widget17__items-col1">
                                                                                                                <div class="m-widget17__item">
                                                                                                                    <span class="m-widget17__icon">
                                                                                                                        <i class="flaticon-presentation-1 m--font-brand"></i>
                                                                                                                    </span>
                                                                                                                    <span class="m-widget17__subtitle">
                                                                                                                        Flip Control
                                                                                                                    </span>
                                                                                                                    <span class="m-widget17__desc">
                                                                                                                        More precise control.
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="m-widget17__items m-widget17__items-col2">
                                                                                                                <div class="m-widget17__item">
                                                                                                                    <span class="m-widget17__icon">
                                                                                                                        <i class="flaticon-coins m--font-success"></i>
                                                                                                                    </span>
                                                                                                                    <span class="m-widget17__subtitle">
                                                                                                                        $ 0.00
                                                                                                                    </span>
                                                                                                                    <span class="m-widget17__desc">
                                                                                                                        No added cost
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    
                                                                                                    
                                                                                                    <div style="text-align: justify; color: #9699a4;">
                                                                                                        <h3>Medium Concave</h3>
                                                                                                        Medium concave decks are mostly used for street and park skateboarding.
                                                                                                        The medium concave makes it easier to accurately control the deck,
                                                                                                        which is essential for flip tricks.
                                                                                                        Select your preferred concave by check marking the upper right corner.
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!--end:: Widgets/Activity-->
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        
                                                                        </div>

                                                                        <!-- end::Tab Content -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end:: Widgets/Blog-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_3">
                                            <div class="row">
                
                                                <div class="col-xl-6">
                                                    
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        European Maple Wood
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if=" steps[2].state" @click=" steps[2].state=! steps[2].state, perdeck += 1"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[2].state=! steps[2].state, perdeck -= 1"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/european-maple-for-skateboard-deck-manufacturer-2hex.jpg" alt=""  class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>European Maple Wood</h3>
                                                                    European maple is cheaper and lighter, but
                                                                    slightly less durable than American maple.
                                                                    Our European maple wood is sustainably grown in areas
                                                                    of warm summers and ice cold winters - just like
                                                                    our American maple.
                                                                </div>
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                
                                                
                                                <div class="col-xl-6">
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        American Maple Wood
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="! steps[2].state" @click=" steps[2].state=! steps[2].state, perdeck -= 1"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[2].state=! steps[2].state, perdeck += 1"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/american-maple-for-skateboard-decks-factory-2hex.jpg" alt="" class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>      
                                                                                                    
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>American Maple Wood</h3>
                                                                    American maple wood is the standard in professional
                                                                    skateboarding. It is the most durable material and
                                                                    has been used since the beginning of modern skateboarding.

                                                                </div>                                                                  
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_4">
                                            <div class="row">
                
                                                <div class="col-xl-6">
                                                    
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        American Glue
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if=" steps[3].state" @click=" steps[3].state=! steps[3].state, perdeck +=0.9"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[3].state=! steps[3].state, perdeck -=0.9"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/american-glue-for-skateboard-decks-manufacturer-2hex.jpg" alt=""  class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>American Glue Formula</h3>
                                                                    This water based glue was invented in
                                                                    America for the purpose of being exclusively
                                                                    used for the production of skateboard decks.
                                                                </div>
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                
                                                
                                                <div class="col-xl-6">
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Epoxy Glue
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="! steps[3].state" @click=" steps[3].state=! steps[3].state, perdeck -=0.9"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[3].state=! steps[3].state, perdeck +=0.9"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/epoxy-glue-for-skateboard-decks-factory-2hex.jpg" alt="" class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>      
                                                                                                    
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>Epoxy Glue Formula</h3>
                                                                    Epoxy is a strong and hard glue, making
                                                                    skateboard decks more durable and stiff.
                                                                    This leads to more pop and improved deck control.
                                                                </div>                                                                  
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_5">
                                            <div class="row">
                
                                                <div class="col-xl-6">
                                                    
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Bottom Print
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if=" steps[4].state" @click=" steps[4].state=! steps[4].state, perdeck-=0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[4].state=! steps[4].state, perdeck+=0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/heat-transfer-print-skateboard-decks-manufacturer-2hex.jpg" alt=""  class="step1-img2">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group m-form__group">
                                                                    <div></div>
                                                                    <div class="custom-file">
                                                                        <input onclick="{{Auth::user()?'return ture':'return false'}}" type="file" class="custom-file-input" id="bottomPrintFile">
                                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                                    </div>
                                                                    
    
                                                                </div>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%;">
                                                                        Recent file
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item" href="#">Recent file</a>
                                                                        <a class="dropdown-item" href="#">Recent file</a>
                                                                        <a class="dropdown-item" href="#">Recent file</a>
                                                                    </div>
                                                                </div>
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>Custom Bottom Design</h3>
                                                                                Used for vert or gaps. y dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                                                                industry scrambled dummy text of the printing.

                                                                </div>
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                
                                                
                                                <div class="col-xl-6">
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Blank Bottom
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="! steps[4].state" @click=" steps[4].state=! steps[4].state, perdeck+=0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[4].state=! steps[4].state, perdeck-=0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/blank-skateboard-decks-manufacturer-2hex.jpg" alt="" class="step1-img2">
                                                                        </div>
                                                                    </div>
                                                                </div>      
                                                                                                    
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>Blank Bottom</h3>
                                                                                Used for vert or gaps. y dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                                                                industry scrambled dummy text of the printing.
                                                                        <br> <br>
                                                                        Make it full screen in the bottom right corner.                                                                                 
                                                                </div>                                                                  
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_6">
                                            <div class="row">
                
                                                <div class="col-xl-6">
                                                    
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Top Print Upload
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if=" steps[5].state" @click=" steps[5].state=! steps[5].state, perdeck-=0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[5].state=! steps[5].state, perdeck+=0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/skateboard-deck-top-print-factory-2hex.jpg" alt=""  class="step1-img2">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group m-form__group">
                                                                    <div></div>
                                                                    <div class="custom-file">
                                                                        <input onclick="{{Auth::user()?'return ture':'return false'}}" type="file" class="custom-file-input" id="topPrintFile">
                                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                                    </div>
                                                                </div>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%;">
                                                                        Recent file
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item" href="#">Recent file</a>
                                                                        <a class="dropdown-item" href="#">Recent file</a>
                                                                        <a class="dropdown-item" href="#">Recent file</a>
                                                                    </div>
                                                                </div>
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>Top Print</h3>
                                                                                Used for vert or gaps. y dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                                                                industry scrambled dummy text of the printing.

                                                                </div>
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                
                                                
                                                <div class="col-xl-6">
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        No Top Print
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="! steps[5].state" @click=" steps[5].state=! steps[5].state, perdeck+=0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[5].state=! steps[5].state, perdeck-=0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/blank-skateboard-deck-factory-2hex.jpg" alt="" class="step1-img2">
                                                                        </div>
                                                                    </div>
                                                                </div>      
                                                                                                    
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>Blank Top</h3>
                                                                                Used for vert or gaps. y dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                                                                industry scrambled dummy text of the printing.
                                                                        <br> <br>
                                                                        Make it full screen in the bottom right corner.                                                                                 
                                                                </div>                                                                  
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_7">
                                            <div class="row">
                
                                                <div class="col-xl-6">
                                                    
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Top Engravery
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if=" steps[6].state" @click=" steps[6].state=! steps[6].state, perdeck-=0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[6].state=! steps[6].state, perdeck+=0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/skateboard-decks-laser-engravery-manufacturer-2hex.jpg" alt=""  class="step1-img2">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group m-form__group">
                                                                    <div></div>
                                                                    <div class="custom-file">
                                                                        <input onclick="{{Auth::user()?'return ture':'return false'}}" type="file" class="custom-file-input" id="engraveryFile">
                                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                                    </div>
                                                                </div>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%;">
                                                                        Recent file
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item" href="#">Recent file</a>
                                                                        <a class="dropdown-item" href="#">Recent file</a>
                                                                        <a class="dropdown-item" href="#">Recent file</a>
                                                                    </div>
                                                                </div>
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>Top Engravery</h3>
                                                                                Used for vert or gaps. y dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                                                                industry scrambled dummy text of the printing.
                                                                        <br> <br>
                                                                        Make it full screen in the bottom right corner.                                                                                 
                                                                </div>
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                
                                                
                                                <div class="col-xl-6">
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Smooth Top
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="! steps[6].state" @click=" steps[6].state=! steps[6].state, perdeck-=0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[6].state=! steps[6].state, perdeck+=0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/blank-skateboard-deck-factory-2hex.jpg" alt="" class="step1-img2">
                                                                        </div>
                                                                    </div>
                                                                </div>      
                                                                                                    
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>Smooth Top</h3>
                                                                                Used for vert or gaps. y dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                                                                industry scrambled dummy text of the printing.
                                                                        <br> <br>
                                                                        Make it full screen in the bottom right corner.                                                                                 
                                                                </div>                                                                  
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_8">
                                            
                                            <!--Begin::Section-->
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="m-portlet m-portlet--bordered-semi configurator-color-panel ">
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget4">

                                                                <div v-for="partName in partNames"  class="dropdown">
                                                                    <div class="btn btn-secondary  dropdown-toggle skate-color-dropdown-menu"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <label>@{{partName + 1}}. @{{currentColor(partName)}}</label>
                                                                        <button class="btn m-btn btn-configurator-drop-btn" v-bind:style="{background: colorData[currentColors[partName]]}"></button>
                                                                    </div>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2" v-if="partName != 2 && partName != 4">
                                                                        <div v-for="(colorValue, colorName) in colorData" class="color-dropdown-item" @click="colorClicked" v-bind:data-part-id="partName" v-bind:data-color-name="colorName">
                                                                            <label>@{{colorName}}</label>
                                                                            <button class="btn m-btn btn-configurator-drop-btn" v-bind:style="{background: colorValue}"></button>
                                                                        </div>                                                                              
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-8">
                                                    <div class="m-portlet m-portlet--bordered-semi product-panel ">
                                                        <div class="m-portlet__head m-portlet__head--fit product-panel-header">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-action">
                                                                    <a v-if=" steps[7].state" @click=" steps[7].state=! steps[7].state"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                        <i class="fa fa-check"></i>
                                                                    </a>
                                                                    <a v-else @click=" steps[7].state=! steps[7].state"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget4">
                                                                    <div class="m-widget19__pic m-portlet-fit--sides">
                                                                        <img id="productCanvas">
                                                                        
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="m-portlet m-portlet--bordered-semi configurator-color-panel ">
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget4">
                                                                <div class="btn btn-secondary random-button "  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @click="randomClicked">
                                                                    <label>Random Colors</label>
                                                                    <img src="/skateboard-deck-production/random-icon.png">
                                                                </div>                                                                      
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-8">
                                                    <div class="m-portlet m-portlet--bordered-semi product-panel2 ">
                                                        <div class="m-portlet__head m-portlet__head--fit product-panel-header" style="position:absolute;">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-action">
                                                                    <a v-if="! steps[7].state" @click=" steps[7].state=! steps[7].state"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                        <i class="fa fa-check"></i>
                                                                    </a>
                                                                    <a v-else @click=" steps[7].state=! steps[7].state"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <img src="/skateboard-deck-production/colored-maple-veneers-for-skateboard-deck-factory-2hex.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>          
                                        </div>
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_9">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Fulldip
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="steps[8].fulldip.state" @click="steps[8].fulldip.state=!steps[8].fulldip.state, perdeck-=1.5"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click="steps[8].fulldip.state=!steps[8].fulldip.state, perdeck+=1.5"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/blue-full-dip-skateboard-deck-manufacturer-2hex.jpg" alt=""  class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input onclick="{{Auth::user()?'return ture':'return false'}}" v-if="steps[8].fulldip.state" v-model="steps[8].fulldip.color" class="form-control m-input" type="text" value="" id="example-text-input" placeholder="Enter Pantone Color" style="margin-top:20px;">
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>Deep Concave</h3>
                                                                                Used for vert or gaps. y dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                                                                industry scrambled dummy text of the printing.
                                                                        <br> <br>
                                                                        Make it full screen in the bottom right corner.                                                                                 
                                                                </div>
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Transparent Fulldip
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="steps[8].transparent.state" @click="steps[8].transparent.state=!steps[8].transparent.state, perdeck-=1.5"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click="steps[8].transparent.state=!steps[8].transparent.state, perdeck+=1.5"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/transparent-full-dip-skateboard-deck-manufacturer-2hex.jpg" alt="" class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>      
                                                                <input v-if="steps[8].transparent.state" v-model="steps[8].transparent.color" class="form-control m-input" type="text" value="" id="example-text-input" placeholder="Enter Pantone Color" style="margin-top:20px;">
                                                                                                    
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>Deep Concave</h3>
                                                                                Used for vert or gaps. y dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                                                                industry scrambled dummy text of the printing.
                                                                        <br> <br>
                                                                        Make it full screen in the bottom right corner.                                                                                 
                                                                </div>                                                                  
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Metallic Fulldip
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="steps[8].metallic.state" @click="steps[8].metallic.state=!steps[8].metallic.state, perdeck-=3.5"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click="steps[8].metallic.state=!steps[8].metallic.state, perdeck+=3.5"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/metallic-full-dip-skateboard-deck-manufacturer-2hex.jpg" alt=""  class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input v-if="steps[8].metallic.state" v-model="steps[8].metallic.color" class="form-control m-input" type="text" value="" id="example-text-input" placeholder="Enter Pantone Color" style="margin-top:20px;">
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>Deep Concave</h3>
                                                                                Used for vert or gaps. y dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                                                                industry scrambled dummy text of the printing.
                                                                        <br> <br>
                                                                        Make it full screen in the bottom right corner.                                                                                 
                                                                </div>
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Black Top Fiberglas
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="steps[8].blacktop.state" @click="steps[8].blacktop.state=!steps[8].blacktop.state, perdeck-=1.9"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click="steps[8].blacktop.state=!steps[8].blacktop.state, perdeck+=1.9"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/fiberglass-skateboard-deck-manufacturer-2hex.jpg" alt="" class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                                                    
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>Deep Concave</h3>
                                                                                Used for vert or gaps. y dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                                                                industry scrambled dummy text of the printing.
                                                                        <br> <br>
                                                                        Make it full screen in the bottom right corner.                                                                                 
                                                                </div>                                                                  
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Black Midlayer Fiberglas
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="steps[8].blackmidlayer.state" @click="steps[8].blackmidlayer.state=!steps[8].blackmidlayer.state, perdeck-=1.9"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click="steps[8].blackmidlayer.state=!steps[8].blackmidlayer.state, perdeck+=1.9"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/fiberglas-skateboard-decks-manufacturer-2hex.jpg" alt=""  class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>Deep Concave</h3>
                                                                                Used for vert or gaps. y dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                                                                industry scrambled dummy text of the printing.
                                                                        <br> <br>
                                                                        Make it full screen in the bottom right corner.                                                                                 
                                                                </div>
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                <div class="col-xl-6">
                                                    
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Pattern Pressed Bottom
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="steps[8].pattern.state" @click="steps[8].pattern.state=!steps[8].pattern.state"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click="steps[8].pattern.state=!steps[8].pattern.state"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/pattern-pressed-skateboard-decks-manufacturer-2hex.jpg" alt=""  class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>Deep Concave</h3>
                                                                                Used for vert or gaps. y dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                                                                industry scrambled dummy text of the printing.
                                                                        <br> <br>
                                                                        Make it full screen in the bottom right corner.                                                                                 
                                                                </div>
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>                                                          
                                            </div>
                                        </div>
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_10">
                                            <div class="row">
                
                                                <div class="col-xl-6">
                                                    
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Upload Cardboard Design
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if=" steps[9].state" @click=" steps[9].state=! steps[9].state"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[9].state=! steps[9].state"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/skateboard-deck-cardboards-factory-2hex.jpg" alt=""  class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group m-form__group">
                                                                    <div></div>
                                                                    <div class="custom-file">
                                                                        <input onclick="{{Auth::user()?'return ture':'return false'}}" type="file" class="custom-file-input" id="cardboardFile">
                                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                                    </div>
                                                                </div>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%;">
                                                                        Recent file
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item" href="#">Recent file</a>
                                                                        <a class="dropdown-item" href="#">Recent file</a>
                                                                        <a class="dropdown-item" href="#">Recent file</a>
                                                                    </div>
                                                                </div>
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>Deep Concave</h3>
                                                                                Used for vert or gaps. y dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                                                                industry scrambled dummy text of the printing.
                                                                        <br> <br>
                                                                        Make it full screen in the bottom right corner.                                                                                 
                                                                </div>
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                
                                                
                                                <div class="col-xl-6">
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        No Cardboard
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="! steps[9].state" @click=" steps[9].state=! steps[9].state"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[9].state=! steps[9].state"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/skateboard-decks-manufacturer-2hex.jpg" alt="" class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>      
                                                                                                    
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                        <h3>Deep Concave</h3>
                                                                                Used for vert or gaps. y dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                                                                industry scrambled dummy text of the printing.
                                                                        <br> <br>
                                                                        Make it full screen in the bottom right corner.                                                                                 
                                                                </div>                                                                  
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_11">
                                                <div class="row">
                    
                                                    <div class="col-xl-6">
                                                        
                                                        <!--begin:: Widgets/Activity-->
                                                        <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                            <div class="m-portlet__head">
                                                                <div class="m-portlet__head-caption">
                                                                    <div class="m-portlet__head-title">
                                                                        <h3 class="m-portlet__head-text">
                                                                            Upload artwork for outer box
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                                <div class="m-portlet__head-tools">
                                                                    <ul class="m-portlet__nav">
                                                                        <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                            <a v-if=" steps[10].state" @click=" steps[10].state=! steps[10].state, perdeck-=0.15"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                                <i class="fa fa-check"></i>
                                                                            </a>
                                                                            <a v-else @click=" steps[10].state=! steps[10].state, perdeck+=0.15"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                    <i class="fa fa-times"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__body">
                                                                <div class="m-widget17">
                                                                    <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                        <div >
                                                                            <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                                <img src="/skateboard-deck-production/skateboard-decks-carton-manufacturer-2hex.jpg" alt=""  class="step1-img1">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group m-form__group">
                                                                        <div></div>
                                                                        <div class="custom-file">
                                                                            <input onclick="{{Auth::user()?'return ture':'return false'}}" type="file" class="custom-file-input" id="cartonFile">
                                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%;">
                                                                            Recent file
                                                                        </button>
                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                            <a class="dropdown-item" href="#">Recent file</a>
                                                                            <a class="dropdown-item" href="#">Recent file</a>
                                                                            <a class="dropdown-item" href="#">Recent file</a>
                                                                        </div>
                                                                    </div>
                                                                    <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                            <h3>Deep Concave</h3>
                                                                                    Used for vert or gaps. y dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                                                                    industry scrambled dummy text of the printing.
                                                                            <br> <br>
                                                                            Make it full screen in the bottom right corner.                                                                                 
                                                                    </div>
                                                                </div>                                                                      
                                                            </div>
                                                        </div>
                                                        <!--end:: Widgets/Activity-->
                                                    </div>
                                                    
                                                    
                                                    <div class="col-xl-6">
                                                        <!--begin:: Widgets/Activity-->
                                                        <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                            <div class="m-portlet__head">
                                                                <div class="m-portlet__head-caption">
                                                                    <div class="m-portlet__head-title">
                                                                        <h3 class="m-portlet__head-text">
                                                                            No Print on Box
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                                <div class="m-portlet__head-tools">
                                                                    <ul class="m-portlet__nav">
                                                                        <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                            <a v-if="! steps[10].state" @click=" steps[10].state=! steps[10].state, perdeck+=0.15"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                                <i class="fa fa-check"></i>
                                                                            </a>
                                                                            <a v-else @click=" steps[10].state=! steps[10].state, perdeck-=0.15"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                                    <i class="fa fa-times"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__body">
                                                                <div class="m-widget17">
                                                                    <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                        <div >
                                                                            <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                                <img src="/skateboard-deck-production/skateboard-decks-carton-factory-2hex.jpg" alt="" class="step1-img1">
                                                                            </div>
                                                                        </div>
                                                                    </div>      
                                                                                                        
                                                                    <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                            <h3>Deep Concave</h3>
                                                                                    Used for vert or gaps. y dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                                                                    industry scrambled dummy text of the printing.
                                                                            <br> <br>
                                                                            Make it full screen in the bottom right corner.                                                                                 
                                                                    </div>                                                                  
                                                                </div>                                                                      
                                                            </div>
                                                        </div>
                                                        <!--end:: Widgets/Activity-->
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        
                                        
                                        <!--end: Form Wizard Step 2-->
                                    </div>
                                    <!--end: Form Body -->
                                    <!--begin: Form Actions -->
                                    <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                                        <div class="m-form__actions m-form__actions">
                                            <div class="row">
                                                                                                            
                                                <div class="col-lg-4 m--align-center">
                                                    <button class="btn btn-secondary m-btn m-btn--custom m-btn--icon" data-wizard-action="prev" @click="prevStep">
                                                        <span>
                                                            <i class="la la-arrow-left"></i>&nbsp;&nbsp;
                                                            <span>Back</span>
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="col-lg-4 m--align-center">
                                                    <button v-if="currentStep == 10" class="btn btn-secondary m-btn m-btn--custom m-btn--icon" data-wizard-action="summary">
                                                        <span>
                                                            <span>Add Batch</span>
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="col-lg-4 m--align-center">
                                                    <button class="btn btn-primary m-btn m-btn--custom m-btn--icon" data-wizard-action="submit">
                                                        <span>
                                                            <i class="la la-check"></i>&nbsp;&nbsp;
                                                            <span>Summary</span>
                                                        </span>
                                                    </button>
                                                    
                                                    <button class="btn btn-warning m-btn m-btn--custom m-btn--icon" data-wizard-action="next" @click="nextStep">
                                                        <span>
                                                            <span>Continue</span>&nbsp;&nbsp;
                                                            <i class="la la-arrow-right"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end: Form Actions -->
                                </form>
                            </div>
                            <!--end: Form Wizard Form-->
                        </div>
                        <!--end: Form Wizard-->
                    </div>
                    <!--End::Main Portlet-->
                </div>
                
                <div class="col-xl-3">
                    <div class="m-portlet">
                        <div class="m-portlet__body">
                            <div class="m-section">
                                <h2 class="m-section__heading">How to build the best skateboard deck?</h2>
                                <div class="m-section__content">
                                    <p>
                                        Know your target group! Do they skate vert or street? Are you users price sensitive
                                        or do they want the deck to be the most durable with the highest pop?
                                    </p>
                                    <p>
                                        Choose the specifications that best meet your target groups requirements. All of our decks
                                        have the highest quality within the selected specification's class.
                                        Follow the deck price calculation below, to make sure you find the sweet spot
                                        between the highest quality and the lowest price.
                                    </p>
                                </div>
                            </div>
                            <div class="m-separator m-separator--fit"></div>
                            <div class="m-widget1 m-widget1--paddingless">
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">Deck</h3>
                                            <span class="m-widget1__desc">Price per Deck</span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span class="m-widget1__number m--font-brand" v-if="quantity > 0 && size != ''"  id="perdeck">$ @{{perdeck.toFixed(2)}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">Order</h3>
                                            <span class="m-widget1__desc">Total of Order</span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span class="m-widget1__number m--font-danger" v-if="quantity > 0 && size != ''" id="total">$ @{{(perdeck*quantity+total).toFixed(2)}}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                
          <br>
                                <a href="javascript:void(0)" id="save_order"  class="btn btn-secondary m-btn m-btn--custom m-btn--icon col m--align-right">
                                    <span>
                                        <i class="la la-save"></i>
                                        <span> save for later</span>
                                    </span>
                                </a>
                                <!--end: Form Wizard Step 4-->
                            </div>
                            <!--end: Form Body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
@endsection