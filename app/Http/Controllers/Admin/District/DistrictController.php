<?php

namespace App\Http\Controllers\Admin\District;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\District\District;
use App\Models\Admin\Province\Province;
use Illuminate\Support\Facades\Validator;

class DistrictController extends Controller
{

    protected $data;
    protected $model;
    protected $folderName='backend.admin.district.';
    function __construct(District $model)
    {
        $this->model =$model;
        $this->data['n']=1;
        $this->data['page']='district';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,  $id='')
    {
        //
        $this->data['activePage'] = 'district_list';
        if($id!==''){
            $province = Province::findOrFail($id);
            $this->data['districts']=$province->districts;
        }else{
            $this->data['districts']=District::all();
        }

        if($request->user()->can('view-districts')){
            return view($this->folderName.'index', $this->data);
        }else{
            return view('backend.permission.permission');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $this->data['activePage']='district_create';
        if($request->user()->can('create-district')){
            return view($this->folderName.'form', $this->data);
        }else{
            return view('backend.permission.permission');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->user()->can('create-district')){
            $input = $request->all();
            $validator = Validator::make($input, $this->model->getRules());
            if($validator->fails()){
                return back()->withErrors($validator->errors());
            }
            $input['created_by']=\Auth::id();
            $input['province_id']=$request->province;
            $this->model->create($input);
            
        }else{
            return view('backend.permission.permission');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\District\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\District\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\District\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\District\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        //
    }
}
