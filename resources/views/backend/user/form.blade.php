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
                        <a href="/home">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="/user">User</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>{{ $mode=='create' ? 'Tambah' : 'Edit' }}</span>
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
                                @if ($mode=='create')
                                    <i class="fa fa-plus font-dark"></i>
                                    <span class="caption-subject font-dark sbold uppercase"> Tambah User</span>
                                @elseif ($mode=='edit')
                                    <i class="fa fa-pencil font-dark"></i>
                                    <span class="caption-subject font-dark sbold uppercase"> Edit User</span>
                                @endif
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
                                        <select class="form-control select2" name="department_id" id="department_id">
                                            <option></option>
                                            @foreach ($departments as $r)
                                                <option value="{{ $r->id }}" {{ $r->id==@$dt->department_id ? 'selected' : '' }}>{{ $r->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Jabatan *</label>
                                        <select class="form-control select2" name="jabatan_id">
                                            <option></option>
                                            @foreach ($jabatans as $r)
                                                <option value="{{ $r->id }}" {{ $r->id==@$dt->jabatan_id ? 'selected' : '' }}>{{ $r->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Nama *</label>
                                        <input type="text" class="form-control" name="name" value="{{ @$dt->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Email *</label>
                                        <input type="text" class="form-control" name="email" value="{{ @$dt->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Password {{ $mode=='create' ? '*' : '' }}</label>
                                        <input type="password" class="form-control" name="password" >
                                            @if ($mode=='edit')
                                                <span class="help-block">Kosongkan jika tidak ingin diganti</span>
                                            @endif
                                    </div>
                                </div>
                                <br>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <input type="hidden" id="id" value="{{ $mode=='create' ? 0 : @$dt->id }}">
                                            <a href="{{ route('user.index') }}" class="btn dark btn-outline">Batal</a>
                                            <button type="submit" class="btn green"><i class="fa fa-check"></i> {{ $mode=='create' ? 'Simpan' : 'Update' }}</button>
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
                                
                                <dt>Jabatan</dt>
                                <dd>Pilih Jabatan</dd>

                                <br>

                                <dt>Nama</dt>
                                <dd>Masukkan Nama user</dd>

                                <br>

                                <dt>Email</dt>
                                <dd>Masukkan Email user. Isian ini bersifat unique dan tidak boleh sama dengan user lain</dd>

                                <br>

                                <dt>Password</dt>
                                <dd>Masukkan Password user. {{ $mode=='edit' ? 'Kosongkan jika tidak ingin diganti' : '' }}</dd>
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
<script type="text/javascript">
var mode = '{{ $mode }}';
$('#area_kerja_id').change(function(e) {
    e.preventDefault();
    var id = $('#id').val();
    var area_kerja_id = $(this).val();
    $('#form_department').load('/user/form_department/'+id+'/'+area_kerja_id, function() {

    });
});

if (mode=='edit') {
    $('#area_kerja_id').trigger('change');
}
</script>
@endsection
