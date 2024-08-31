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
                        <a href="javascript:;">Library Setting</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Admin Department</span>
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
                        <span class="caption-subject font-dark sbold uppercase">Admin Department </span>
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
                                <th>Area Kerja</th>
                                <th>Department</th>
                                <th>Admin Department</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                            <tr role="row" class="filter">
                                <td></td>
                                <td>
                                    <select class="form-control form-filter" name="area_kerja_id" style="padding:0px;width:100%">
                                        <option value="">All</option>
                                        @foreach (\App\M_area_kerja::all() as $r)
                                            <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" class="form-control form-filter input-sm" name="nama"></td>
                                <td><input type="text" class="form-control form-filter input-sm" name="admin_user_name"></td>
                                <td><input type="text" class="form-control form-filter input-sm" name="jabatan_nama"></td>
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
                "url": "{{ route('admin_department.ajax_list') }}", // ajax source
                "type": "POST",
                data: function (d) {
                    d._token          = "{{ csrf_token() }}";
                    d.area_kerja_id   = $('.filter').find('[name=area_kerja_id]').val();
                    d.nama            = $('.filter').find('[name=nama]').val();
                    d.admin_user_name = $('.filter').find('[name=admin_user_name]').val();
                    d.jabatan_nama    = $('.filter').find('[name=jabatan_nama]').val();
                }
            },
            columns: [
                { data: 'rownum', name: 'rownum' },
                { data: 'area_kerja_nama', name: 'm_area_kerjas.nama' },
                { data: 'nama', name: 'nama' },
                { data: 'admin_user_name', name: 'users.name' },
                { data: 'jabatan_nama', name: 'm_jabatans.nama' },
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
    var url = "{{ route('jabatan.destroy', ':id') }}";
    url = url.replace(':id', id);
    swal({
		title: "Apakah Anda yakin?",
		text: "Data anda akan dihapus!",
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
            if (res.stat) {
                table.ajax.reload();
    			swal({
    				title: "Berhasil dihapus!",
    				text: "Data Jabatan berhasil dihapus.",
    				type: "success",
    				confirmButtonClass: "btn-success",
                    closeOnConfirm: true
    			});
            } else {
                NotifikasiToast({
                    type : 'error', // success,warning,info,error
                    msg : res.pesan,
                    title : 'Error',
                });
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
