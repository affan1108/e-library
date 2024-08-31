<div class="form-group">
    <label class="col-md-3 control-label">Department *</label>
    <div class="col-md-5">
        <select class="form-control select2" name="department_id">
            <option></option>
            @foreach (\App\M_department::where('area_kerja_id', $area_kerja_id)->where('active',1)->get() as $r)
                <option value="{{ $r->id }}" {{ $r->id==@$dt->department_id ? 'selected' : '' }}>{{ $r->nama }}</option>
            @endforeach
        </select>
    </div>
</div>
<script type="text/javascript">
$('.select2').select2({
    placeholder: 'Silahkan Pilih'
});
</script>
