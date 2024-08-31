<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Http\Response;
use Validator;

use App\M_kategori_berita;

class KategoriBeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index()
    {
        return view('backend.kategori_berita.index');
    }

    public function ajax_list(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $kategori_beritas = M_kategori_berita::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'm_kategori_beritas.id',
            'm_kategori_beritas.nama',
            'm_kategori_beritas.ket',
        ])
        ;

        if ($request->nama!='') {
            $kategori_beritas = $kategori_beritas->where('m_kategori_beritas.nama', 'like', '%'.$request->nama.'%');
        }
        if ($request->ket!='') {
            $kategori_beritas = $kategori_beritas->where('m_kategori_beritas.ket', 'like', '%'.$request->ket.'%');
        }

        $datatables = Datatables::of($kategori_beritas)
            ->addColumn('aksi', function ($r) {
                $aksi_edit = '';
                $aksi_delete = '';
                $aksi_edit = '<a href="'.route('kategori_berita.edit', $r->id).'" title="edit" style="color: #000;"><i class="fa fa-pencil"></i></a>';
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
        $action = route('kategori_berita.store');
        return view('backend.kategori_berita.form', compact('mode','method','action'));
    }

    public function handleRequest($request)
    {
        $result['success'] = true;
        $rules = array(
            'nama' => 'required',
        );
        $messages = array(
            'nama.required' => 'Nama Kategori tidak boleh kosong',
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
            $kategori_berita = M_kategori_berita::create($request->all());

            $result['success'] = true;
            $result['url'] = '/kategori_berita';
            $result['message'] = 'Kategori Berita berhasil ditambahkan!';
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
        $method = 'PUT';
        $action = route('kategori_berita.update', $id);
        $dt = M_kategori_berita::find($id);
        if (!$dt )
        {
            return redirect('/kategori_berita')
                   ->with('alert-class', 'alert-danger')
                   ->with('message', 'Data tidak ditemukan.');
        }
        return view('backend.kategori_berita.form', compact('mode','method','action','dt'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validate = $this->handleRequest($request);
        if (!$validate['success']) {
            return response()->json(array(
                'success' => false,
                'errors' => $validate['errors'],
            ), 400); // 400 being the HTTP code for an invalid request.
        }

        try {
            $kategori_berita = M_kategori_berita::findorfail($id);
            $kategori_berita->update($request->all());
            $result['success'] = true;
            $result['url'] = '/kategori_berita';
            $result['message'] = 'Kategori Berita berhasil diperbarui!';
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
            $kategori_berita = M_kategori_berita::findorfail($id);
            if (count($kategori_berita->beritas) > 0) {
                return response()->json(array(
                    'success' => false,
                    'message' => 'Kategori ini memiliki berita terkait.',
                ), 400); // 400 being the HTTP code for an invalid request.
            }

            if ($kategori_berita->delete()) {
                $result['stat'] = true;
                $result['message'] = 'Kategori berhasil dihapus.';
            }
        } catch (QueryException $e) {
            $result['stat'] = false;
            $result['message'] = 'Tidak bisa.';
        }
        return response()->json($result);
    }
}
