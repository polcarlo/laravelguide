@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-md-12">
        <div class="tabbable-line">        
            <ul class="nav nav-tabs">
                <li class="{{classActive($prefix.'.create')}}">
                    <a href="{{route($prefix.'.create')}}"><i class="fa fa-plus"></i> Add</a>
                </li>                    
                <li class="{{classActive($prefix.'.index')}}">
                    <a href="#tab_report" data-toggle="tab" id="brand"><i class="fa fa-table"></i> Brand</a>
                </li>
                <li>
                    <a href="#" id="refresh"><i class="fa fa-refresh"></i> Refresh</a>
                </li>
            </ul>
            <div class="tab-content">   
            
                    <div class="tab-pane {{classActive($prefix.'.create')}}" id="tab_create">   
                        @includeWhen(classActive($prefix.'.create'), $view.'.create')
                    </div>                     
                    <div class="tab-pane {{classActive($prefix.'.index')}}" id="tab_report">   
                     @include('partials._alert')
                     @include('partials._datatable', [
                                    'id' => $prefix.'-dt',
                                    'header' => array_values($dt_header)
                                    ])     
                    </div>
                    <div class="tab-pane {{classActive($prefix.'.update')}}" id="tab_update">  
                    @includeWhen(classActive($prefix.'.edit'), $view.'.edit')
                    </div>  
            
                         
            </div>            
        </div>                     
    </div>
</div>

@endsection()

@section('script')  
@include($view.'._script')
@endsection