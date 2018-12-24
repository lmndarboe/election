@extends('layouts.master')


@section('bread')

 <section class="content-header">
      <h1>
      <a href="{{route('voter_cards.index')}}">
        Voter Cards
        </a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Registrations</a></li>
        <li class="active">Voter Cards</li>
      </ol>
    </section>


@stop



@section('content')


{!! csrf_field() !!}

    <div class="row">
    	
    	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Voter Cards</h3>

            <a class="btn btn-success pull-right" href="{{route('voter_cards.create')}}">New Voter Card</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            	

              <table class="table table-striped">
                <tr>
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Card #</th>
                  <th>Address</th>
                  <th>Area</th>
                  <th align="right" class="text-right">Actions</th>
                </tr>

                @foreach($voter_cards as $voter_card)
                <tr>
                <td>1</td>
                <td>{{ $voter_card->full_name }}</td>
                <td>{{ $voter_card->card_number }} </td>
                <td>{{ $voter_card->address }}</td>
                <td>{{ $voter_card->area->name}}</td>
               
                  <td class="text-right" align="right">
                  
                  	<div class="btn-group">
                        <a href="/voter_cards/{{$voter_card->id }}" class="btn btn-danger delete-record"><i class="fa fa-trash"></i></a>
                         <a href="/voter_cards/{{$voter_card->id }}/edit" class="btn btn-default"><i class="fa fa-edit"></i></a>
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