@extends('layouts.main')
@section('css')
<link href="{{ asset('assets/global/plugins/bootstrap-summernote/summernote.css') }}" rel="stylesheet" type="text/css" />
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
                        <a href="#">Setting Library</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="{{ route('reminder_email_template.index') }}"></a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <br>
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-pencil font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase"> Edit Reminder Email Template</span>
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
                                <label class="col-md-2 control-label">Template</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="summernote_1" name="value" rows="3">{{ @$dt->value }}</textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-9">
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
<script src="{{ asset('assets/global/plugins/bootstrap-summernote/summernote.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
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
