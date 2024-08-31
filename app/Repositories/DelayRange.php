<?php

namespace App\Repositories;

use Illuminate\Validation\ValidationException;
use Validator;
use Yajra\Datatables\Datatables;
use DB;

class DelayRange
{
    const ADMIN_JABATAN_ID = 1;
    
	private $delay_range;

	public function __construct(\App\Models\DelayRange $delay_range)
	{
		$this->delay_range = $delay_range;
	}

    public static function getAll()
    {
        return \App\Models\DelayRange::all();
    }

    public static function tableDelayRange($request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $delay_ranges = \App\Models\DelayRange::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'm_delay_range.id',
            'm_delay_range.min',
            'm_delay_range.max',
        ])
        ;

        if ($request->min!='') {
            $delay_ranges = $delay_ranges->where('m_delay_range.min', 'like', '%'.$request->min.'%');
        }
        if ($request->max!='') {
            $delay_ranges = $delay_ranges->where('m_delay_range.max', 'like', '%'.$request->max.'%');
        }

        $datatables = Datatables::of($delay_ranges)
            ->addColumn('aksi', function ($r) {
                $aksi_edit = '';
                $aksi_delete = '';
                $aksi_edit = '<a href="'.route('delay_range.edit', $r->id).'" title="edit" style="color: #000;"><i class="fa fa-pencil"></i></a>';

                return $aksi_edit;
            })
            ->escapeColumns([])
        ;

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
    }

	/**
     * save new delay_range
     * @param  String 
     * @param  String
     * @return Model
     */
    public function store($min, $max)
    {
    	$fields = array(
            'min' => $min,
            'max' => $max,
        );
        $rules = array(
            'min' => 'required',
            'max' => 'required',
        );
        $messages = array(
            'min.required' => 'Min tidak boleh kosong',
            'max.required' => 'Max tidak boleh kosong',
        );
        $validator = Validator::make($fields, $rules, $messages);
        // Validate the input and return correct response
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $this->delay_range->min = $min;
        $this->delay_range->max = $max;
        $this->delay_range->save();

        
        return $this->delay_range;
    }

    /**
     * store new or update delay_range into other database
     * @param  \App\Models\DelayRange
     */ 
}