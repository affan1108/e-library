<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\T_pengumuman;

class PengumumanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index()
    {
        return view('backend.pengumuman.index');
    }

    public function ajax_list(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $pengumumans = T_pengumuman::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            't_pengumumans.id',
            't_pengumumans.judul',
            't_pengumumans.body',
            't_pengumumans.featured_img',
            't_pengumumans.published_at',
        ])
        ;

        if ($request->judul!='') {
            $pengumumans = $pengumumans->where('t_pengumumans.judul', 'like', '%'.$request->judul.'%');
        }
        if ($request->body!='') {
            $pengumumans = $pengumumans->where('t_pengumumans.body', 'like', '%'.$request->body.'%');
        }
        if(!empty($request->published_at_start) && !empty($request->published_at_end)){
            $date_from_arr = explode('/', $request->published_at_start);
            $date_from     = date('Y-m-d', strtotime($date_from_arr[2].$date_from_arr[1].$date_from_arr[0]));
            $date_to_arr   = explode('/', $request->published_at_end);
            $date_to       = date('Y-m-d', strtotime($date_to_arr[2].$date_to_arr[1].$date_to_arr[0]));
            $pengumumans = $pengumumans->whereBetween('t_pengumumans.published_at', [$date_from, $date_to]);
        }

        $datatables = Datatables::of($pengumumans)
            ->editColumn('published_at', function($r) {
                return date('d/m/Y', strtotime($r->published_at));
            })
            ->addColumn('aksi', function ($r) {
                $aksi_edit = '';
                $aksi_delete = '';
                $aksi_edit = '<a href="'.route('pengumuman.edit', $r->id).'" title="edit" style="color: #000;"><i class="fa fa-pencil"></i></a>';
                $aksi_delete = '<a href="#" title="delete" onclick="event.preventDefault(); btn_delete('.$r->id.')" style="color: #000;"><i class="fa fa-times"></i></a>';

                return $aksi_edit.' '.$aksi_delete;
            })
            ->escapeColumns([])
        ;

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
    }

    public function create()
    {
        $mode = 'create';
        $method = 'POST';
        $action = route('pengumuman.store');
        return view('backend.pengumuman.form', compact('mode','method','action'));
    }

    public function handleRequest($request, $id=null)
    {
        $result['success'] = true;
        $rules = array(
            'judul' => 'required',
            'body' => 'required',
            'published_at' => 'required',
        );
        if ($id == null) {
            $rules['featured_img'] ='required|mimes:jpg,jpeg,png,bmp';
        }
        $messages = array(
            'judul.required' => 'Judul tidak boleh kosong',
            'body.required' => 'Body tidak boleh kosong',
            'featured_img.required' => 'Cover tidak boleh kosong',
            'featured_img.mimes' => 'Format Cover yang diijinkan: jpg,jpeg,png,bmp',
            'published_at.required' => 'Tanggal Publish tidak boleh kosong',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        // Validate the input and return correct response
        if ($validator->fails()) {
            $result['success'] = false;
            $result['errors'] = $validator->getMessageBag()->toArray();
            return $result;

        }
        return $result;
    }

    public function store(Request $request)
    {
        $validate = $this->handleRequest($request);
        if (!$validate['success']) {
            return response()->json(array(
                'success' => false,
                'errors' => $validate['errors'],
            ), 400); // 400 being the HTTP code for an invalid request.
        }

        try {
            $data = $request->all();
            $dir = 'pengumuman/';
            $exists = Storage::disk('public')->exists($dir);
            if (!$exists) {
                Storage::disk('public')->makeDirectory($dir);
            }

            if ($request->hasFile('featured_img')) {
                $file = $request->file('featured_img');
                $extension = $file->getClientOriginalExtension();
                Storage::disk('public')->put($dir.$file->getFilename().'.'.$extension,  File::get($file));
                $data['featured_img'] = $file->getFilename().'.'.$extension;
            } else {
                unset($data['featured_img']);
            }

            $data['published_at'] = date('Y-m-d', strtotime($request->published_at));
            $pengumuman = T_pengumuman::create($data);

            $result['success'] = true;
            $result['url'] = '/pengumuman';
            $result['message'] = 'Pengumuman berhasil ditambahkan!';
        } catch (QueryException $e) {
            dd($e);
            $result['success'] = false;
            $result['message'] = 'Gagal disimpan.';
        }
        return response()->json($result);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $mode = 'edit';
        $method = 'POST';
        $action = route('pengumuman.update_pengumuman', $id);
        $dt = T_pengumuman::find($id);
        if (!$dt )
        {
            return redirect('/pengumuman')
                   ->with('alert-class', 'alert-danger')
                   ->with('message', 'Data tidak ditemukan.');
        }
        return view('backend.pengumuman.form', compact('mode','method','action','dt'));
    }

    public function update_pengumuman(Request $request, $id)
    {
        $validate = $this->handleRequest($request, $id);
        if (!$validate['success']) {
            return response()->json(array(
                'success' => false,
                'errors' => $validate['errors'],
            ), 400); // 400 being the HTTP code for an invalid request.
        }

        try {
            $pengumuman = T_pengumuman::findorfail($id);

            $data = $request->all();
            $dir = 'pengumuman/';
            $exists = Storage::disk('public')->exists($dir);
            if (!$exists) {
                Storage::disk('public')->makeDirectory($dir);
            }

            if ($request->hasFile('featured_img')) {
                $file = $request->file('featured_img');
                $extension = $file->getClientOriginalExtension();
                Storage::disk('public')->put($dir.$file->getFilename().'.'.$extension,  File::get($file));
                $data['featured_img'] = $file->getFilename().'.'.$extension;
                if ($pengumuman->featured_img && Storage::disk('public')->exists($dir.$pengumuman->featured_img)) {
                    Storage::disk('public')->delete( $dir.$pengumuman->featured_img );
                }
            } else {
                unset($data['featured_img']);
            }

            $data['published_at'] = date('Y-m-d', strtotime($request->published_at));
            $pengumuman->update($data);
            $result['success'] = true;
            $result['url'] = '/pengumuman';
            $result['message'] = 'Pengumuman berhasil diperbarui!';
        } catch (QueryException $e) {
            dd($e);
            $result['success'] = false;
            $result['message'] = 'Gagal disimpan.';
        }
        return response()->json($result);
    }

    public function destroy($id)
    {
        try {
            $dir = 'pengumuman/';
            $pengumuman = T_pengumuman::findorfail($id);
            if ($pengumuman->featured_img && Storage::disk('public')->exists($dir.$pengumuman->featured_img)) {
                Storage::disk('public')->delete( $dir.$pengumuman->featured_img );
            }
            if ($pengumuman->delete()) {
                $result['stat'] = true;
                $result['message'] = 'Pengumuman berhasil dihapus.';
            }
        } catch (QueryException $e) {
            $result['stat'] = false;
            $result['message'] = 'Tidak bisa.';
        }
        return response()->json($result);
    }
}
