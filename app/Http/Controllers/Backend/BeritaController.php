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

use App\T_berita;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    
    public function index()
    {
        return view('backend.berita.index');
    }

    public function ajax_list(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $beritas = T_berita::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            't_beritas.id',
            't_beritas.kategori_berita_id',
            't_beritas.judul',
            't_beritas.excerpt',
            't_beritas.body',
            't_beritas.featured_img',
            't_beritas.published_at',
            'm_kategori_beritas.nama as kategori_berita_nama',
        ])
        ->leftJoin('m_kategori_beritas', 't_beritas.kategori_berita_id', '=', 'm_kategori_beritas.id')
        ;

        if ($request->kategori_berita_id!='') {
            $beritas = $beritas->where('t_beritas.kategori_berita_id', $request->kategori_berita_id);
        }
        if ($request->judul!='') {
            $beritas = $beritas->where('t_beritas.judul', 'like', '%'.$request->judul.'%');
        }
        if ($request->excerpt!='') {
            $beritas = $beritas->where('t_beritas.excerpt', 'like', '%'.$request->excerpt.'%');
        }
        if(!empty($request->published_at_start) && !empty($request->published_at_end)){
            $date_from_arr = explode('/', $request->published_at_start);
            $date_from     = date('Y-m-d', strtotime($date_from_arr[2].$date_from_arr[1].$date_from_arr[0]));
            $date_to_arr   = explode('/', $request->published_at_end);
            $date_to       = date('Y-m-d', strtotime($date_to_arr[2].$date_to_arr[1].$date_to_arr[0]));
            $beritas = $beritas->whereBetween('t_beritas.published_at', [$date_from, $date_to]);
        }

        $datatables = Datatables::of($beritas)
            ->editColumn('published_at', function($r) {
                return date('d/m/Y', strtotime($r->published_at));
            })
            ->addColumn('aksi', function ($r) {
                $aksi_edit = '';
                $aksi_delete = '';
                $aksi_edit = '<a href="'.route('berita.edit', $r->id).'" title="edit" style="color: #000;"><i class="fa fa-pencil"></i></a>';
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
        $action = route('berita.store');
        return view('backend.berita.form', compact('mode','method','action'));
    }

    public function handleRequest($request, $id=null)
    {
        $result['success'] = true;
        $rules = array(
            'kategori_berita_id' => 'required',
            'judul' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'published_at' => 'required',
        );
        if ($id == null) {
            $rules['featured_img'] ='required|mimes:jpg,jpeg,png,bmp';
        }
        $messages = array(
            'kategori_berita_id.required' => 'Kategori tidak boleh kosong',
            'judul.required' => 'Judul tidak boleh kosong',
            'excerpt.required' => 'Excerpt tidak boleh kosong',
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
            $dir = 'berita/';
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
            $berita = T_berita::create($data);

            $result['success'] = true;
            $result['url'] = '/berita';
            $result['message'] = 'Berita berhasil ditambahkan!';
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
        $action = route('berita.update_berita', $id);
        $dt = T_berita::find($id);
        if (!$dt )
        {
            return redirect('/berita')
                   ->with('alert-class', 'alert-danger')
                   ->with('message', 'Data tidak ditemukan.');
        }
        return view('backend.berita.form', compact('mode','method','action','dt'));
    }

    public function update_berita(Request $request, $id)
    {
        $validate = $this->handleRequest($request, $id);
        if (!$validate['success']) {
            return response()->json(array(
                'success' => false,
                'errors' => $validate['errors'],
            ), 400); // 400 being the HTTP code for an invalid request.
        }

        try {
            $berita = T_berita::findorfail($id);

            $data = $request->all();
            $dir = 'berita/';
            $exists = Storage::disk('public')->exists($dir);
            if (!$exists) {
                Storage::disk('public')->makeDirectory($dir);
            }

            if ($request->hasFile('featured_img')) {
                $file = $request->file('featured_img');
                $extension = $file->getClientOriginalExtension();
                Storage::disk('public')->put($dir.$file->getFilename().'.'.$extension,  File::get($file));
                $data['featured_img'] = $file->getFilename().'.'.$extension;
                if ($berita->featured_img && Storage::disk('public')->exists($dir.$berita->featured_img)) {
                    Storage::disk('public')->delete( $dir.$berita->featured_img );
                }
            } else {
                unset($data['featured_img']);
            }

            $data['published_at'] = date('Y-m-d', strtotime($request->published_at));
            $berita->update($data);
            $result['success'] = true;
            $result['url'] = '/berita';
            $result['message'] = 'Berita berhasil diperbarui!';
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
            $dir = 'berita/';
            $berita = T_berita::findorfail($id);
            if ($berita->featured_img && Storage::disk('public')->exists($dir.$berita->featured_img)) {
                Storage::disk('public')->delete( $dir.$berita->featured_img );
            }
            if ($berita->delete()) {
                $result['stat'] = true;
                $result['message'] = 'Berita berhasil dihapus.';
            }
        } catch (QueryException $e) {
            $result['stat'] = false;
            $result['message'] = 'Tidak bisa.';
        }
        return response()->json($result);
    }
}
