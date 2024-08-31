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
                        <a href="javascript:;">DMS Setting</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>User DC</span>
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
                        <span class="caption-subject font-dark sbold uppercase">User DC</span>
                        {{-- <a href="{{ route('user_dc.create') }}" class="btn btn-xs btn-outline blue"><i class="fa fa-plus"></i> Tambah</a> --}}
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
                                <th>Email</th>
                                <th>Department</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                            <tr role="row" class="filter">
                                <td></td>
                                <td><input type="text" class="form-control form-filter input-sm" name="name"></td>
                                <td><input type="text" class="form-control form-filter input-sm" name="email"></td>
                                <td>
                                    <select class="form-control form-filter" name="department_id" style="padding:0px;width:100%">
                                        <option value="">All</option>
                                        @foreach (\App\M_department::all() as $r)
                                            <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control form-filter" name="jabatan_id" style="padding:0px;width:100%">
                                        <option value="">All</option>
                                        @foreach (\App\M_jabatan::all() as $r)
                                            <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                        @endforeach
                                    </select>
                                </td>
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
                "url": "{{ route('user_dc.ajax_list') }}", // ajax source
                "type": "POST",
                data: function (d) {
                    d._token        = "{{ csrf_token() }}";
                    d.name          = $('.filter').find('[name=name]').val();
                    d.email         = $('.filter').find('[name=email]').val();
                    d.department_id = $('.filter').find('[name=department_id]').val();
                    d.jabatan_id    = $('.filter').find('[name=jabatan_id]').val();
                }
            },
            columns: [
                { data: 'rownum', name: 'rownum' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'department_nama', name: 'm_departments.nama' },
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
    var url = "{{ route('user_dc.destroy', ':id') }}";
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
            if (res.success) {
                $('.filter-cancel').trigger('click');
    			swal({
    				title: "Berhasil dihapus!",
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
