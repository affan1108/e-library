@extends('layouts.main')

@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" ng-controller="DwAdminDepartmentController as adminDepartment">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="/home">DW Setting</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Admin Department</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="portlet light portlet-fit portlet-datatable bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-plus font-dark"></i>
                                <span class="caption-subject font-dark sbold uppercase">Tambah Admin Department </span>
                            </div>
                            <div class="actions">

                            </div>
                        </div>
                        <div class="portlet-body">
                            <form class="horizontal-form form_ajax" action="{{ $action }}" method="{{ $method }}">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below.
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Department *</label>
                                        <select name="department_id" class="form-control select2" ng-model="adminDepartment.department_id" ng-change="adminDepartment.getListUser()">
                                            <option></option>
                                            @foreach ($departments as $r)
                                                <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">User Admin *</label>
                                        <select name="user_id" class="form-control select2" ng-select2>
                                            <option></option>
                                            <option ng-repeat="x in adminDepartment.listUsers" value="@{{ x.id }}">@{{ x.name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <a href="{{ route('dw_admin_department') }}" class="btn dark btn-outline">Batal</a>
                                            <button type="submit" class="btn green"><i class="fa fa-check"></i> Simpan </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="portlet light portlet-fit portlet-datatable bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-map-signs font-dark"></i>
                                <span class="caption-subject font-dark sbold uppercase"> Penjelasan Form</span>
                            </div>
                            <div class="actions">

                            </div>
                        </div>
                        <div class="portlet-body">
                            <dl>
                                <dt>Department</dt>
                                <dd>Pilih Department</dd>
                                
                                <br>

                                <dt>User Admin</dt>
                                <dd>Pilih User Admin</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
                    
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <div id="modal_form" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false"></div>
@endsection

@section('scripts')
<script src="{{ asset('assets/custom/scripts/j_generalForm.js') }}" type="text/javascript"></script>
@endsection
