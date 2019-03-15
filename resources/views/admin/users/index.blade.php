@extends('admin.layouts.app')

@section('title', __('views.admin.users.index.title'))

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__body">
                    <div class="m-grid__item m-grid__item--fluid">
                        <table class="m-datatable m-datatable--scroll" width="100%">
                            <thead>
                            <tr>
                                <th>@sortablelink('email', __('views.admin.users.index.table_header_0'),['page' => $users->currentPage()])</th>
                                <th>@sortablelink('name',  __('views.admin.users.index.table_header_1'),['page' => $users->currentPage()])</th>
                                <th>{{ __('views.admin.users.index.table_header_2') }}</th>
                                <th>@sortablelink('active', __('views.admin.users.index.table_header_3'),['page' => $users->currentPage()])</th>
                                <th>@sortablelink('confirmed', __('views.admin.users.index.table_header_4'),['page' => $users->currentPage()])</th>
                                <th>@sortablelink('created_at', __('views.admin.users.index.table_header_5'),['page' => $users->currentPage()])</th>
                                <th>@sortablelink('updated_at', __('views.admin.users.index.table_header_6'),['page' => $users->currentPage()])</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td><span>{{ $user->email }}</span></td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @foreach($user->roles->pluck('name') as $role)
                                            <span style="padding: 3px;">
                                                <span class="m-badge m-badge--primary m-badge--wide">{{ $role }}</span>
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($user->active)
                                            <span>
                                                <span class="m-badge  m-badge--info m-badge--wide">{{ __('views.admin.users.index.active') }}</span>
                                            </span>
                                        @else
                                            <span>
                                                <span class="m-badge  m-badge--danger m-badge--wide">{{ __('views.admin.users.index.inactive') }}</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->confirmed)
                                            <span>
                                                <span class="m-badge  m-badge--success m-badge--wide">{{ __('views.admin.users.index.confirmed') }}</span>
                                            </span>
                                        @else
                                            <span>
                                                <span class="m-badge  m-badge--warning m-badge--wide">{{ __('views.admin.users.index.not_confirmed') }}</span>
                                            </span>
                                        @endif</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td>
                                        <!-- <a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" href="{{ route('admin.users.show', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.show') }}">
                                            <i class="la la-eye"></i>
                                        </a> -->
                                        <a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details" href="{{ route('admin.users.edit', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.edit') }}">
                                            <i class="la la-edit"></i>
                                        </a>
                                        @if(!$user->hasRole('administrator'))
                                            <button type="button" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill btn-user-delete" data-toggle="modal" data-whatever="{{ route('admin.users.delete', [$user->id]) }}" data-target="#deleteModal">
                                                <i class="la la-trash"></i>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!--begin::Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">
                        Delete User
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-remove"></span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <form class="m-form m-form--fit m-form--label-align-right user" id="deleteProducts" name="deleteProducts">
                        <div class="form-group m-form__group row">
                            <h4>Are you sure you want to delete this user?</h4>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary m-btn" data-dismiss="modal">
                        Close
                    </button>
                    <a href="" type="button" class="btn btn-brand m-btn" id="btn-delete">
                        Delete
                    </a>
                    <input type="hidden" id="product_id" name="product_id" value="0">
                </div>

            </div>
        </div>
    </div>
    <!--end::Modal-->
    <script src="../../../asset/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready( function() {
            $('.btn-user-delete').on('click', function (event) {
                var button = $(this) 
                var recipient = button.data('whatever') 
                $('#btn-delete').attr('href', recipient)
            })
        })
        
    </script>
@endsection


