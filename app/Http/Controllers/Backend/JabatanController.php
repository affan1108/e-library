<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

use Illuminate\Database\QueryException;
use Illuminate\Http\Response;

// Repositories
use App\Repositories\JsonResponse;
use App\Repositories\Jabatan;

class JabatanController extends Controller
{
    private $jabatan;

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index()
    {
        return view('backend.jabatan.index');
    }

    public function ajax_list(Request $request)
    {
        return Jabatan::tableJabatan($request);
    }

    public function create()
    {
        $data['mode'] = 'create';
        $data['method'] = 'POST';
        $data['action'] = route('jabatan.store');
        return view('backend.jabatan.form', $data);
    }

    public function handleRequest($request)
    {
        $result['success'] = true;
        $rules = array(
            'nama' => 'required',
        );
        $messages = array(
            'nama.required' => 'Nama tidak boleh kosong',
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
        $jsonResponse = new JsonResponse();
        try {
            $this->jabatan = new Jabatan(new \App\M_jabatan);
            $jabatan = $this->jabatan->store($request->nama, $request->ket);

            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('Jabatan berhasil ditambahkan.');
            $jsonResponse->setNextUrl(route('jabatan.index'));
            return response()->json($jsonResponse->getResponse());
        } catch(ValidationException $e) {
            $errors = $e->validator->getMessageBag()->toArray();
            $jsonResponse->setErrors($errors);
            $jsonResponse->setMessage('Terjadi kesalahan.');
            return response()->json($jsonResponse->getResponse(), 400);
        }

        $validate = $this->handleRequest($request);
        if (!$validate['success']) {
            return response()->json(array(
                'success' => false,
                'errors' => $validate['errors'],
            ), 400); // 400 being the HTTP code for an invalid request.
        }
        return response()->json($result);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['mode'] = 'edit';
        $data['method'] = 'PUT';
        $data['action'] = route('jabatan.update', $id);
        $dt = \App\M_jabatan::find($id);
        if (!$dt )
        {
            return redirect('/jabatan')
                   ->with('alert-class', 'alert-danger')
                   ->with('message', 'Data tidak ditemukan.');
        }
        $data['dt'] = $dt;
        return view('backend.jabatan.form', $data);
    }

    public function update(Request $request, $id)
    {
        $dt = \App\M_jabatan::find($id);
        if (!$dt) {
            return redirect(route('department.index'))
                   ->with('alert-class', 'alert-danger')
                   ->with('message', 'Data tidak ditemukan.');
        }

        $jsonResponse = new JsonResponse();
        try {
            $this->jabatan = new Jabatan($dt);
            $jabatan = $this->jabatan->store($request->nama, $request->ket);
            
            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('Jabatan berhasil diperbarui.');
            $jsonResponse->setNextUrl(route('jabatan.index'));
            return response()->json($jsonResponse->getResponse());
        } catch(ValidationException $e) {
            $errors = $e->validator->getMessageBag()->toArray();
            $jsonResponse->setErrors($errors);
            $jsonResponse->setMessage('Terjadi kesalahan.');
            return response()->json($jsonResponse->getResponse(), 400);
        }
    }

    public function destroy($id)
    {
        try {
            $data = array('active'=>0);
            $jabatan = M_jabatan::findorfail($id);
            $dms_jabatan = \App\Models\dms\Dms_m_jabatan::find($id);
            $library_jabatan = \App\Models\library\Library_m_jabatan::find($id);

            if ($jabatan->users()->where('active', 1)->get()->count() > 0) {
                $result['stat'] = false;
                $result['message'] = 'Jabatan tersebut berkaitan dengan data user.';
            } else {
                $jabatan->update($data);
                if ($dms_jabatan) {
                    $dms_jabatan->update($data);
                }
                if ($library_jabatan) {
                    $library_jabatan->update($data);
                }
                $result['stat'] = true;
                $result['message'] = 'Jabatan berhasil dihapus.';
            }
        } catch (QueryException $e) {
            dd($e);
            $result['stat'] = false;
            $result['message'] = 'Tidak bisa.';
        }
        return response()->json($result);
    }
}
