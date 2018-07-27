<?php

namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;
use App\Http\Requests\Web\BrandRequest;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\User;
use DataTables;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
        
        $this->data = config('web.brand');
    }   

    public function index()
    {
        return view($this->data['view'].'index', $this->data);
    }


    public function dtList(Request $request)
    {
        $brands = $this->brand->dtData();
        return Datatables::of($brands)
            ->addColumn('action', function($brand){
                    return '<a href="'.route('brand.edit',$brand->id).'" class="btn btn-xs btn-primary edit" id="'.$brand->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="#" class="btn btn-xs btn-danger delete" id="'.$brand->id.'"><i class="glyphicon glyphicon-remove"></i>Delete</a>';
            })
            ->make(true);
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          return self::index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
         if ($data = $this->brand->saveData($request)) {
            
            return redirect()->route('brand.index')
                             ->with(['message' => 'Successfully Created.', 'status' => 'success']);//
        }
        return redirect()->route('brand.create')
                                   ->withInput()
                                   ->with(['message' => 'Failed', 'status' => 'danger']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         return self::index()->with(['data'=>$this->brand->getById($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       if ($data = $this->brand->saveData($request, $id)) {
            
            return redirect()->route('brand.index')
                             ->with(['message' => 'Successfully Updated.', 'status' => 'success']);//
        }
        return redirect()->route('brand.create')
                                   ->withInput()
                                   ->with(['message' => 'Failed', 'status' => 'danger']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $this->brand->deleteData($request->input('id'));
    
    }
}
