@extends('admin.layouts.app')

@section('title',__('views.admin.users.edit.title', ['name' => $user->name]) )

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                {{ Form::open(['route'=>['admin.users.update', $user->id],'method' => 'put','class'=>'form-horizontal form-label-left']) }}

                        <div class="m-portlet__body">
                            
                            <div class="form-group m-form__group row">
                                <label for="name" class="col-2 col-form-label">
                                    {{ __('views.admin.users.edit.name') }}
                                    <span class="required">*</span>
                                </label>
                                <div class="col-7">
                                    <input id="name" type="text" class="form-control form-block @if($errors->has('name')) parsley-error @endif"
                                   name="name" value="{{ $user->name }}" required>
                                    @if($errors->has('name'))
                                        <ul class="parsley-errors-list filled">
                                            @foreach($errors->get('name') as $error)
                                                    <li class="parsley-required">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="email" class="col-2 col-form-label">
                                    {{ __('views.admin.users.edit.email') }}
                                    <span class="required">*</span>
                                </label>
                                <div class="col-7">
                                    <input id="email" type="email" class="form-control form-block @if($errors->has('email')) parsley-error @endif"
                                   name="email" value="{{ $user->email }}" required>
                                    @if($errors->has('email'))
                                        <ul class="parsley-errors-list filled">
                                            @foreach($errors->get('email') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="password" class="col-2 col-form-label">
                                    {{ __('views.admin.users.edit.password') }}
                                </label>
                                <div class="col-7">
                                    <input id="password" type="password" class="form-control form-block @if($errors->has('password')) parsley-error @endif"
                                   name="password">
                                    @if($errors->has('password'))
                                        <ul class="parsley-errors-list filled">
                                            @foreach($errors->get('password') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="password_confirmation" class="col-2 col-form-label">
                                    {{ __('views.admin.users.edit.confirm_password') }}
                                </label>
                                <div class="col-7">
                                    <input id="password_confirmation" type="password" class="form-control form-block @if($errors->has('password_confirmation')) parsley-error @endif"
                                   name="password_confirmation">
                                    @if($errors->has('password_confirmation'))
                                        <ul class="parsley-errors-list filled">
                                            @foreach($errors->get('password_confirmation') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            @if(!$user->hasRole('administrator'))
                                <div class="form-group m-form__group row">
                                    <div class="col-4">
                                        <label class="m-checkbox m-checkbox--state-brand">
                                            <input type="checkbox" name="active" @if($user->active) checked="checked" @endif value="1">
                                            Active
                                            <span></span>
                                        </label>
                                    </div>
                                    
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-4">
                                        <label class="m-checkbox m-checkbox--state-brand">
                                            <input type="checkbox" name="confirmed" @if($user->confirmed) checked="checked" @endif value="1">
                                            Confirmed
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-md-2" for="roles">
                                    Roles
                                </label>
                                <div class="col-7">
                                    <select class="form-control m-select2" id="roles_select2" name="param" multiple="multiple">
                                        @foreach($roles as $role)
                                            <option @if($user->roles->find($role->id)) selected="selected" @endif value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-1x"></div>
                            <div class="m-portlet__foot m-portlet__foot--fit" style="padding-top: 20px;">
                                <div class="m-form__actions m-form__actions--right">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-7">
                                            <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                {{ __('views.admin.users.edit.save') }}
                                            </button>
                                            &nbsp;&nbsp;
                                            <a class="btn btn-secondary m-btn m-btn--air m-btn--custom" href="{{ URL::previous() }}">
                                                {{ __('views.admin.users.edit.cancel') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <script src="../../../asset/demo/default/custom/components/forms/widgets/select2.js" type="text/javascript"></script>
@endsection
