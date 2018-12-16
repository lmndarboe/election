@extends('layouts.master')


@section('bread')

 <section class="content-header">
      <h1>
      <a href="{{route('candidates.index')}}">
        Candidates
        </a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Settings</a></li>
        <li class="active">Candidates</li>
      </ol>
    </section>


@stop



@section('content')


{!! csrf_field() !!}

    <div class="row">
    	
    	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Candidates</h3>

            <a class="btn btn-success pull-right" href="{{route('candidates.create')}}">New Candidate</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            	

              <table class="table table-striped">
                <tr>
                  <th>Full Name</th>
                  <th>Party</th>
                  <th>Address</th>
                  <th align="right" class="text-right">Actions</th>
                </tr>

                @foreach($candidates as $candidate)
                <tr>
                <td>{{ $candidate->full_name}}</td>
                <td>{{ $candidate->party->name }}</td>
                <td>{{ $candidate->address }}</td>
                  <td class="text-right" align="right">
                  
                  	<div class="btn-group">
                        <a href="/candidates/{{$candidate->id }}" class="btn btn-danger delete-record"><i class="fa fa-trash"></i></a>
                         <a href="/candidates/{{$candidate->id }}/edit" class="btn btn-default"><i class="fa fa-edit"></i></a>
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