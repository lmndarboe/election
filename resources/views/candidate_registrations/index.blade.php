@extends('layouts.master')


@section('bread')

 <section class="content-header">
      <h1>
      <a href="{{route('elections.index')}}">
        Elections
        </a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Registrations</a></li>
        <li class="active">Candidate Registrations</li>
      </ol>
    </section>


@stop



@section('content')


{!! csrf_field() !!}

    <div class="row">
    	
    	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Candidate Registrations</h3>

            <a class="btn btn-success pull-right" href="{{route('candidate_registrations.create')}}">New Candidate Registration</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            	

              <table class="table table-striped">
                <tr>
                  <th>#</th>
                  <th>Candidate</th>
                  <th>Election</th>
                  <th>Area</th>
                  <th align="right" class="text-right">Actions</th>
                </tr>

                @foreach($candidate_registrations as $candidate_registration)
                <tr>
                <td>1</td>
                <td>{{ $candidate_registration->candidate->full_name }}</td>
                <td>{{ $candidate_registration->election->year }} 
                {{ $candidate_registration->election->election_type->name }}</td>
                <td>{{ $candidate_registration->area->name}}</td>
               
                  <td class="text-right" align="right">
                  
                  	<div class="btn-group">
                        <a href="/candidate_registrations/{{$candidate_registration->id }}" class="btn btn-danger delete-record"><i class="fa fa-trash"></i></a>
                         <a href="/candidate_registrations/{{$candidate_registration->id }}/edit" class="btn btn-default"><i class="fa fa-edit"></i></a>
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