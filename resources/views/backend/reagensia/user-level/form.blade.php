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
                        <span>Reagensia Setting</span>
                    </li>
                    <li>
                        <a href="{{ route('reagensia.userLevel') }}">User Level</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Tambah</span>
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
                                <span class="caption-subject font-dark sbold uppercase"> Tambah User Level</span>
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
                                    @if ($mode=='create')
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">User *</label>
                                            <div class="col-md-8">
                                                <select name="user_id" class="form-control select2">
                                                    <option></option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @elseif ($mode=='edit')
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">User *</label>
                                            <div class="col-md-8">
                                                <span class="form-control-static">{{ $user->name }} - {{ $user->email }}</span>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Level *</label>
                                        <div class="col-md-8">
                                            <select name="level_id" class="form-control select2">
                                                <option></option>
                                                @foreach ($levels as $level)
                                                    <option value="{{ $level->id }}" {{ $level->id==@$user->level_id ? 'selected' : '' }}>{{ $level->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <a href="{{ route('reagensia.userLevel') }}" class="btn dark btn-outline">Kembali</a>
                                            <button type="submit" class="btn green"><i class="fa fa-check"></i> Simpan</button>
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
                                <dt>User</dt>
                                <dd>Pilih User yang akan diberikan akses level</dd>

                                <dt>Level</dt>
                                <dd>Pilih Level yang akan diberikan</dd>
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
<script>
$.fn.select2.defaults.set( "theme", "bootstrap" );
$('.select2').select2({
    placeholder: 'Silahkan Pilih',
});
</script>
@endsection
