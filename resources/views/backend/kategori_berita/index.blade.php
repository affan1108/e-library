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
                        <a href="javascript:;">Portal Setting</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Kategori Berita</span>
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
                        <span class="caption-subject font-dark sbold uppercase">Kategori Berita </span>
                        <a href="{{ route('kategori_berita.create') }}" class="btn btn-xs btn-outline blue"><i class="fa fa-plus"></i> Tambah</a>
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
                                <th>Ket</th>
                                <th>Aksi</th>
                            </tr>
                            <tr role="row" class="filter">
                                <td></td>
                                <td><input type="text" class="form-control form-filter input-sm" name="nama"></td>
                                <td><input type="text" class="form-control form-filter input-sm" name="ket"></td>
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
                "url": "{{ route('kategori_berita.ajax_list') }}", // ajax source
                "type": "POST",
                data: function (d) {
                    d._token        = "{{ csrf_token() }}";
                    d.nama          = $('.filter').find('[name=nama]').val();
                    d.ket           = $('.filter').find('[name=ket]').val();
                }
            },
            columns: [
                { data: 'rownum', name: 'rownum' },
                { data: 'nama', name: 'nama' },
                { data: 'ket', name: 'ket' },
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
    var url = "{{ route('kategori_berita.destroy', ':id') }}";
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
    			swal({
    				title: "Berhasil dihapus!",
    				text: res.message,
    				type: "success",
    				confirmButtonClass: "btn-success",
                    closeOnConfirm: true
    			});
                console.log(res.message);
                $('.filter-cancel').trigger('click');
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
