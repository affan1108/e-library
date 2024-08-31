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
                        <span>Pengumuman</span>
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
                        <span class="caption-subject font-dark sbold uppercase">Pengumuman </span>
                        <a href="{{ route('pengumuman.create') }}" class="btn btn-xs btn-outline blue"><i class="fa fa-plus"></i> Tambah</a>
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
                                <th>Judul</th>
                                <th>Body</th>
                                <th>Publish</th>
                                <th>Aksi</th>
                            </tr>
                            <tr role="row" class="filter">
                                <td></td>
                                <td><input type="text" class="form-control form-filter input-sm" name="judul"></td>
                                <td><input type="text" class="form-control form-filter input-sm" name="body"></td>
                                <td>
                                    <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                        <input type="text" class="form-control form-filter input-sm" id="published_at_start" readonly="" name="published_at_start" placeholder="From">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm default" type="button">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                        <input type="text" class="form-control form-filter input-sm" id="published_at_end" readonly="" name="published_at_end" placeholder="To">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm default" type="button">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                    </div>
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
$('.date-picker').datepicker({
    rtl: App.isRTL(),
    autoclose: true
});

$('#published_at_start').change(function(e) {
    var published_at_start = $('#published_at_start').val();
    var from_arr = published_at_start.split("/");
    var from = new Date(from_arr[2], from_arr[1]-1, from_arr[0]);

    var published_at_end = $('#published_at_end').val();
    var to_arr = published_at_end.split("/");
    var to = new Date(to_arr[2], to_arr[1]-1, to_arr[0]);

    if (from > to) {
        $('#published_at_end').val(published_at_start);
    }
});
$('#published_at_end').change(function(e) {
    var published_at_start = $('#published_at_start').val();
    var from_arr = published_at_start.split("/");
    var from = new Date(from_arr[2], from_arr[1]-1, from_arr[0]);

    var published_at_end = $('#published_at_end').val();
    var to_arr = published_at_end.split("/");
    var to = new Date(to_arr[2], to_arr[1]-1, to_arr[0]);

    if (to < from) {
        $('#published_at_start').val(published_at_end);
    }
});

var TableDatatablesAjax = function () {
    var grid = new Datatable();
    grid.init({
        src: $("#example"),
        processing: true,
        dataTable: {
            "ajax": {
                "url": "{{ route('pengumuman.ajax_list') }}", // ajax source
                "type": "POST",
                data: function (d) {
                    d._token        = "{{ csrf_token() }}";
                    d.judul              = $('.filter').find('[name=judul]').val();
                    d.body            = $('.filter').find('[name=body]').val();
                    d.published_at_start     = $('[name=published_at_start]').val();
                    d.published_at_end       = $('[name=published_at_end]').val();
                }
            },
            columns: [
                { data: 'rownum', name: 'rownum' },
                { data: 'judul', name: 'judul' },
                { data: 'body', name: 'body' },
                { data: 'published_at', name: 'published_at' },
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
    var url = "{{ route('pengumuman.destroy', ':id') }}";
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
