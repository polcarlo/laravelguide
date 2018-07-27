@if(isset($data))
   
<div class="row">
    <div class="col-md-12">    
                      <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">  <i class="fa fa-pencil"></i>Update Details  </h4>
                            </div>
                            <div class="card-block">
             {!! Form::model($data, ['route'=>[$prefix.'.update', $data->id], 'class'=>'form-horizontal', 'name'=>'frm-update', 'id'=>'frm-update', 'files' => true]) !!}  
                    @include($view.'._form')                    
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-success">Save Changes</button>
                                        <a href="#" onclick="tabReport(); return false;" class="btn default btn-cancel">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>









@endif