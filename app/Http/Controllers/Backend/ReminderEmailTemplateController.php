<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Http\Response;
use Validator;

use App\Models\library\Library_m_config;

class ReminderEmailTemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index()
    {
        $kode = "reminder_email_template";
        $method = "put";
        $action = route('reminder_email_template.update', $kode);

        $dt = Library_m_config::where('kode', $kode)->first();
        return view('backend.reminder_email_template.index', compact('method', 'action', 'dt'));
    }

    public function handleRequest($request)
    {
        $result['success'] = true;
        $rules = array(
            'value' => 'required',
        );
        $messages = array(
            'value.required' => 'Template tidak boleh kosong',
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

    public function update(Request $request, $kode)
    {
        $validate = $this->handleRequest($request);
        if (!$validate['success']) {
            return response()->json(array(
                'success' => false,
                'errors' => $validate['errors'],
            ), 400); // 400 being the HTTP code for an invalid request.
        }

        try {
            $config = Library_m_config::where('kode', $kode);

            $data = $request->except(['_token']);
            $config->update($data);
            $result['success'] = true;
            $result['url'] = route('reminder_email_template.index');
            $result['message'] = 'Reminder Email Template berhasil diperbarui!';
        } catch (QueryException $e) {
            dd($e);
            $result['success'] = false;
            $result['message'] = 'Gagal disimpan.';
        }
        return response()->json($result);
    }
}
