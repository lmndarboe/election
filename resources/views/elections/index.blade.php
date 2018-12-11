@extends('layouts.master')


@section('bread')

 <section class="content-header">
      <h1>
      <a href="{{route('elections.index')}}">
        Elections
        </a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Settings</a></li>
        <li class="active">Elections</li>
      </ol>
    </section>


@stop



@section('content')


{!! csrf_field() !!}

    <div class="row">
    	
    	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Elections</h3>

            <a class="btn btn-success pull-right" href="{{route('elections.create')}}">New Election</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            	

              <table class="table table-striped">
                <tr>
                  <th>Election Type</th>
                  <th>Year</th>
                  <th>Date</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th align="right" class="text-right">Actions</th>
                </tr>

                @foreach($elections as $election)
                <tr>
                <td>{{ $election->election_type->name}}</td>
                <td>{{ $election->year }}</td>
                <td>{{ $election->date }}</td>
                <td>{{ $election->start_time}}</td>
                <td>{{ $election->end_time }}</td>
                  <td class="text-right" align="right">
                  
                  	<div class="btn-group">
                        <a href="/elections/{{$election->id }}" class="btn btn-danger delete-record"><i class="fa fa-trash"></i></a>
                         <a href="/elections/{{$election->id }}/edit" class="btn btn-default"><i class="fa fa-edit"></i></a>
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