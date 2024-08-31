@extends('layouts.main')

@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:;">Signature Setting</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="/admin_department">Admin Department</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Edit</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <br>
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-pencil font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase"> Edit Admin Department</span>
                    </div>
                    <div class="actions">

                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal form_ajax" action="{{ $action }}" method="{{ $method }}">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button> You have some form errors. Please check below.
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Department</label>
                                <div class="col-md-5">
                                    <span class='form-control-static'>{{ @$dt->nama }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Admin Department *</label>
                                <div class="col-md-5">
                                    <select class="form-control select2" name="admin_user_id">
                                        <option></option>
                                        @foreach (\App\Models\dw\Dw_user::where('department_id', $dt->id)->where('jabatan_id','!=',1)->where('active',1)->get() as $r)
                                            <option value="{{ $r->id }}" {{ $r->id==@$dt->admin_user_id ? 'selected' : '' }}>{{ $r->name.' - '.$r->jabatan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-9">
                                    <a href="{{ route('signature_admin_department.index') }}" class="btn dark btn-outline">Batal</a>
                                    <button type="submit" class="btn green"><i class="fa fa-check"></i> Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <div id="modal_form" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false"></div>
@endsection

@section('scripts')
<script src="{{ asset('assets/custom/scripts/j_generalForm.js') }}" type="text/javascript"></script>
<script type="text/javascript">
var mode = '{{ $mode }}';
</script>
@endsection
