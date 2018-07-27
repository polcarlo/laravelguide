<?php

namespace App\Models\Traits\Method;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\Web\BrandRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\Input;
use DB;
trait BrandMethod
{
    public function saveData($request, $id=false)
    {                    
        $data = new Brand;
        if ($id) $data = $this->find($id);
        $data->name = Input::get('name');
	    $data->description = Input::get('description');    
        if ($data->save()) {
            return $data;
        } 
        return false;
    }  
    public function deleteData($id)
    {
//        $brand = $this->brand::find($id);
        self::find($id)->delete();

           // return json_encode('Data Deleted');
        
    }

    public function dtData()
    {
    	return self::select(['id','name','description']);
    }

    public function getById($id)
    {
        return self::find($id);
    }
    public function getNameId()
    {
        return self::select('id', 'name')->pluck('name', 'id')->toArray();
    } 
}
