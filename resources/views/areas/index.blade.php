@extends('layouts.master')


@section('bread')

 <section class="content-header">
      <h1>
      <a href="{{route('areas.index')}}">
        Area
        </a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Settings</a></li>
        <li class="active">Area</li>
      </ol>
    </section>


@stop



@section('content')


{!! csrf_field() !!}

    <div class="row">
    	
    	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Areas</h3>

            <a class="btn btn-success pull-right" href="{{route('areas.create')}}">New Area</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            	

              <table class="table table-striped">
                <tr>
                  <th>Area Name</th>
                  <th>Area Type</th>
        
                  <th align="right" class="text-right">Actions</th>
                </tr>

               @foreach($areas as $area)
                <tr>
                <td>{{ $area->name }}</td>
                <td>{{ $area->type }}</td>
    
                  <td class="text-right" align="right">
                  
                  	<div class="btn-group">
                        <a href="/areas/{{$area->id }}" class="btn btn-danger delete-record"><i class="fa fa-trash"></i></a>
                        <a href="/areas/{{$area->id }}/edit" class="btn btn-default"><i class="fa fa-edit"></i></a>
                  	
                  </td>
                </tr>
                @endforeach
                
              
              </table>
            </div>
            <!-- /.box-body -->
         </div>
    </div>
@stop