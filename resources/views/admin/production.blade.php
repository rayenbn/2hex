@extends('admin.layouts.app')

@section('content')
    <form method="POST" action="" id="filter_form">
        <div class="m-grid__item m-grid__item--fluid m-wrapper row admin-content">
            <div class="col-lg-12 filter_content">
            <div class="col-lg-6">
                    
                        {{ csrf_field() }}
                        <p>Select User by Email</p>
                        <select
                            class="form-control filter_email select2 form_input"
                            id="filter_email"
                            name="filter_email"
                            style="width:100%;"
                        >
                            <option value="" disabled>SELECT</option>
                            @foreach($users as $userinfo)
                                <option @if($user->email == $userinfo->email) {{"selected"}} @endif value="{{$userinfo->email}}">{{$userinfo->name}}  ({{$userinfo->email}})</option>    
                            @endforeach
                        </select>
                        <input type="hidden" name="order_id" id="order_id">
                </div> 
            </div>
            <div class="col-lg-12">
                <div class="form-group m-form__group row">
                    <div class="col-12 ml-auto">
                        <h3 class="m-form__section">Productions</h3>
                    </div>
                    <!--Begin::Portlet-->
                    <div class="proccess_bar">
                        <div class="proccess_percent"></div>
                    </div>
                    <div class="production_body">
                        <div class="filter_body row">
                            <div class="col-lg-6">
                                <p>Productions</p>
                                <select
                                    class="form-control filter_email select2 form_input"
                                    id="select_order"
                                    name="select_order"
                                    style="width:100%;"
                                >
                                    <option value="" disabled>SELECT</option>
                                    @foreach($returnorder as $orderinfo)
                                        <option @if($selected_order == $orderinfo->invoice_number) selected @endif value="{{$orderinfo->invoice_number}}">Order #{{$orderinfo->invoice_number}}</option>
                                        @php
                                            if($selected_order == $orderinfo->invoice_number)
                                                $selected_invoice = $orderinfo->invoice_number;
                                        @endphp
                                    @endforeach
                                </select>
                                <input type="hidden" name="order_id" id="order_id" value={{$selected_invoice}}>
                            </div> 

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class='col-md-5'>
                                        <p>Start</p>
                                        <div class="form-group">
                                            <input type='text' class="form-control form_input" name="startdate" id='startdate' value='{{$startdate}}'/>
                                        </div>
                                    </div>
                                    <div class='col-md-5'>
                                        <p>Finish</p>
                                        <div class="form-group">
                                            <input type='text' class="form-control form_input" name="enddate" id='enddate'  value='{{$enddate}}'/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 production_body m-portlet  m-portlet--full-height">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <h3 class="m-portlet__head-text">
                                                Your Current Production #{{isset($selected_invoice)?$selected_invoice:''}}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                    <div class="m-scrollable" data-scrollable="true" data-height="380" data-mobile-height="300">

                                        <!--Begin::Timeline 2 -->
                                        <div class="m-timeline-2">
                                            <div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30">
                                                @foreach($comments as $key => $comment)
                                                    <div class="m-timeline-2__item @if($key != 0) m--margin-top-30 @endif">
                                                        <span class="m-timeline-2__item-time">{{$comment->date}}</span>
                                                        <div class="m-timeline-2__item-cricle">
                                                            <i class="fa fa-genderless m--font-brand"></i>
                                                        </div>
                                                        <div class="m-timeline-2__item-text  m--padding-top-5">
                                                            {{$comment->comment}}
                                                        </div>
                                                        <button class="btn btn-danger remove-comment" value="{{$comment->id}}">Remove</button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <!--End::Timeline 2 -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 input_body">
                                <p>Add Message</p>
                                <select
                                    class="form-control select2 col-6 "
                                    id="select_date"
                                    name="select_date"
                                    style="width:100%;"
                                >
                                    <option value="" disabled>Dates</option>
                                    @foreach($dates as $date)
                                        <option @if($date == $selected_date) selected @endif value="{{$date}}">{{$date}}</option>    
                                    @endforeach
                                </select>
                                <br>
                                <input type="text" name="content" class="form-control col-6">
                                <input type="hidden" name="remove_comment" class="remove_comment">
                                <button type="submit" class="btn btn-success production-submit" name="submit" value="add_production">Submit</button>
                            </div>
                        <div>
                    </div>
                    <!--End::Portlet-->
                </div>
            </div>
            
        </div>
    </form>
@endsection
