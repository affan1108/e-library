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
                        <a href="/">Master</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>User Right</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <br>
            <!-- END PAGE HEADER-->
            @if (session('message'))
                <div class="alert alert-dismissable {{ session('alert-class') }}">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true"></button>
                    <p> {{ session('message') }} </p>
                </div>
            @endif
            <!-- Begin: Demo Datatable 1 -->
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-user font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">User Right </span>
                        <a href="{{ route('userRight.create') }}" class="btn btn-xs btn-outline blue"><i class="fa fa-plus"></i> Tambah</a>
                    </div>
                    <div class="actions">

                    </div>
                </div>
                <div class="portlet-body">
                    <!-- <br><br><br> -->
                    <table class="table table-striped table-hover table-checkable dt-responsive" width="100%" id="example">
                        <thead>
                            <tr role="row" class="heading">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Aplikasi</th>
                                <th>Aksi</th>
                            </tr>
                            <tr role="row" class="filter">
                                <td></td>
                                <td><input type="text" class="form-control form-filter input-sm" name="user_name"></td>
                                <td><input type="text" class="form-control form-filter input-sm" name="app_name"></td>
                                <td>
                                    <div class="margin-bottom-5">
                                        <button class="btn btn-sm green btn-outline filter-submit margin-bottom">
                                            <i class="fa fa-search"></i> Search
                                        </button>
                                    </div>
                                    <button class="btn btn-sm red btn-outline filter-cancel">
                                        <i class="fa fa-times"></i> Reset
                                    </button>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- End: Demo Datatable 1 -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection

@section('scripts')
<script>
var TableDatatablesAjax = function () {
    var grid = new Datatable();
    grid.init({
        src: $("#example"),
        processing: true,
        dataTable: {
            "ajax": {
                "url": "{{ route('userRight.ajaxList') }}", // ajax source
                "type": "POST",
                data: function (d) {
                    d._token        = "{{ csrf_token() }}";
                    d.user_name          = $('.filter').find('[name=user_name]').val();
                    d.app_name           = $('.filter').find('[name=app_name]').val();
                }
            },
            columns: [
                { data: 'rownum', name: 'rownum' },
                { data: 'user_name', name: 'users.name' },
                { data: 'app_name', name: 'apps.name' },
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false}
            ],
            "order": [
                [1, "asc"]
            ]// set first column as a default sort by asc
        }
    });
}
jQuery(document).ready(function() {
    TableDatatablesAjax();
});

function btn_delete(id) {
    var url = "{{ route('userRight.destroy', ':id') }}";
    url = url.replace(':id', id);
    swal({
		title: "Apakah Anda yakin?",
		text: "User Right ini akan dihapus!",
		type: "warning",
		showCancelButton: true,
		cancelButtonClass: "btn-default",
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Ya!",
		closeOnConfirm: true
	},
	function(){
        $.ajax({
            url: url,
            type: 'delete',
            data: {_token: '{{ csrf_token() }}'}
        })
        .done(function(res) {
            console.log(res);
            if (res.success) {
                $('.filter-cancel').trigger('click');
    			swal({
    				title: res.message,
    				text: res.message,
    				type: "success",
    				confirmButtonClass: "btn-success",
                    closeOnConfirm: true
    			});
            } else {
                toastr.error(res.message);
            }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
	});
}

</script>
@endsection
