<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

use Illuminate\Database\QueryException;
use Illuminate\Http\Response;

// Repositories
use App\Repositories\JsonResponse;
use App\Repositories\DelayRange;


class DelayRangeController extends Controller
{
    //
	 private $delay_range;

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index()
    {
        return view('backend.delay_range.index');
    }

    public function ajax_list(Request $request)
    {
        return DelayRange::tableDelayRange($request);
    }

    public function create()
    {

    }

    public function handleRequest($request)
    {
        $result['success'] = true;
        $rules = array(
            'min' => 'required',
            'max' => 'required',
        );
        $messages = array(
            'min.required' => 'Min tidak boleh kosong',
            'max.required' => 'Max tidak boleh kosong',
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

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['mode'] = 'edit';
        $data['method'] = 'PUT';
        $data['action'] = route('delay_range.update', $id);
        $dt = \App\Models\DelayRange::find($id);
        if (!$dt )
        {
            return redirect('/delay_range')
                   ->with('alert-class', 'alert-danger')
                   ->with('message', 'Data tidak ditemukan.');
        }
        $data['dt'] = $dt;
        return view('backend.delay_range.form', $data);
    }

    public function update(Request $request, $id)
    {
        $dt = \App\Models\DelayRange::find($id);
        if (!$dt) {
            return redirect(route('delay_range.index'))
                   ->with('alert-class', 'alert-danger')
                   ->with('message', 'Data tidak ditemukan.');
        }
        $jsonResponse = new JsonResponse();
        if($request->min > $request->max){
            $jsonResponse->setMessage('Min harus lebih kecil dari Max!');
            return response()->json($jsonResponse->getResponse(), 400);

        }
        try {
            $this->delay_range = new DelayRange($dt);
            $delay_range = $this->delay_range->store($request->min, $request->max);
            
            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('DelayRange berhasil diperbarui.');
            $jsonResponse->setNextUrl(route('delay_range.index'));
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

    }
}
