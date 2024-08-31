@extends('layouts.main')
@section('css')
<link href="{{ asset('assets/global/plugins/bootstrap-summernote/summernote.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:;">Portal Setting</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="/pengumuman">Pengumuman</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>{{ $mode=='create' ? 'Tambah' : 'Edit' }}</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <br>
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        @if ($mode=='create')
                            <i class="fa fa-plus font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase"> Tambah Pengumuman</span>
                        @elseif ($mode=='edit')
                            <i class="fa fa-pencil font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase"> Edit Pengumuman</span>
                        @endif
                    </div>
                    <div class="actions">

                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal form_ajax" action="{{ $action }}" method="{{ $method }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button> You have some form errors. Please check below.
                            </div>
                            <div class="form-group ">
                                <label class="col-md-3 control-label">Cover {{ $mode=='create' ? '*' : '' }}</label>
                                <div class="col-md-5">
                                    {{-- <span class="help-block">Best View 345 x 255 pixel</span> --}}
                                    @if ($mode=='edit')
                                        <img src="{{ asset('storage/pengumuman/'.@$dt->featured_img) }}" width="200px" alt="">
                                        <br>
                                    @endif
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 300px; height: 250px;">
                                        </div>
                                        <div>
                                            <span class="btn red btn-outline btn-file">
                                                <span class="fileinput-new"> Pilih Gambar </span>
                                                <span class="fileinput-exists"> Ganti </span>
                                                <input type="file" id="featured_img" name="featured_img"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Hapus </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Judul *</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="judul" value="{{ @$dt->judul }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Body *</label>
                                <div class="col-md-8">
                                    <textarea name="body" id="summernote_1" rows="8" class="form-control">{{ @$dt->body }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Publish *</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control datepicker" name="published_at" data-date-format="dd MM yyyy" value="{{ $mode=='create' ? date('d F Y') : date('d F Y', strtotime(@$dt->published_at)) }}" readonly>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <a href="{{ route('pengumuman.index') }}" class="btn dark btn-outline">Batal</a>
                                    <button type="submit" class="btn green"><i class="fa fa-check"></i> {{ $mode=='create' ? 'Simpan' : 'Update' }}</button>
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
<script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-summernote/summernote.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/custom/scripts/j_generalForm.js') }}" type="text/javascript"></script>
<script type="text/javascript">
$('.datepicker').datepicker({
    rtl: App.isRTL(),
    autoclose: true
});
$('#summernote_1').summernote({
    height: 300,
    toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ]
});
</script>
@endsection
