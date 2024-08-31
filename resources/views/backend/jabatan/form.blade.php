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
                        <a href="/jabatan">Jabatan</a>
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
                                    <span class="caption-subject font-dark sbold uppercase"> Tambah Jabatan</span>
                                @elseif ($mode=='edit')
                                    <i class="fa fa-pencil font-dark"></i>
                                    <span class="caption-subject font-dark sbold uppercase"> Edit Jabatan</span>
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
                                        <label class="control-label">Jabatan *</label>
                                        <input type="text" class="form-control" name="nama" value="{{ @$dt->nama }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Keterangan</label>
                                        <textarea class="form-control" name="ket" rows="3">{{ @$dt->ket }}</textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <a href="{{ route('jabatan.index') }}" class="btn dark btn-outline">Batal</a>
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
                                <dt>Jabatan</dt>
                                <dd>Masukkan Nama Jabatan</dd>
                                
                                <br>

                                <dt>Keterangan</dt>
                                <dd>Masukkan Keterangan</dd>
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
