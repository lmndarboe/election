@extends('layouts.master')


@section('bread')

 <section class="content-header">
      <h1>
      <a href="{{route('areas.index')}}">
        Parties
        </a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Settings</a></li>
        <li class="active">Parties</li>
      </ol>
    </section>


@stop



@section('content')


{!! csrf_field() !!}

    <div class="row">
    	
    	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Paties</h3>

            <a class="btn btn-success pull-right" href="{{route('parties.create')}}">New Party</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            	

              <table class="table table-striped">
                <tr>
                  <th>Party Name</th>
                  <th>Party Address</th>
                  <th>Flag Bearer</th>
                  <th>Flag Color</th>
                  <th>Logo</th>
                  <th align="right" class="text-right">Actions</th>
                </tr>

                @foreach($parties as $party)
                <tr>
                <td>{{ $party->name }}</td>
                <td>{{ $party->address }}</td>
                <td>{{ $party->flag_bearer}}</td>
                <td>{{ $party->flag_color }}</td>
                <td>{{ $party->image() }}</td>
                  <td class="text-right" align="right">
                  
                  	<div class="btn-group">
                        {{-- <a href="/areas/{{$area->id }}" class="btn btn-danger delete-record"><i class="fa fa-trash"></i></a> --}}
                        {{-- <a href="/areas/{{$area->id }}/edit" class="btn btn-default"><i class="fa fa-edit"></i></a> --}}
                  	
                  </td>
                </tr>
                 @endforeach
                
              
              </table>
            </div>
            <!-- /.box-body -->
         </div>
    </div>
@stop