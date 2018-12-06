@extends('layouts.master')


@section('bread')

 <section class="content-header">
      <h1>
        Election Type
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Election Type</li>
      </ol>
    </section>


@stop



@section('content')


{!! csrf_field() !!}

    <div class="row">
    	
    	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Election Types</h3>

              <a class="btn btn-success pull-right" href="/election_types/create">New Election Type</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            	

              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Election Name</th>
                  
                  <th align="right" class="text-right">Actions</th>
                </tr>

                @foreach($election_types as $idx =>$election_type)
                <tr>
                  <td>{{$idx+1}}.</td>
                  <td>{{ $election_type->name}}</td>
                  
                  <td class="text-right" align="right">
                  
                  	<div class="btn-group">
                      <a href="/election_types/{{$election_type->id }}" class="btn btn-danger delete-record"><i class="fa fa-trash"></i></a>
                      <a href="/election_types/{{$election_type->id }}/edit" class="btn btn-default"><i class="fa fa-edit"></i></a>
                      
                    </div>
                  
                  	
                  </td>
                </tr>

                @endforeach
              
              </table>
            </div>
            <!-- /.box-body -->
         </div>
    </div>
@stop