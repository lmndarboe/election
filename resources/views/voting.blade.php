@extends('layouts.master')

@section('content')

   
@if(! is_null($election))

    <h1 class="page-header">{{ $election->year}}  {{ $election  ->election_type->name }}</h1>

    <h1 class="page-header">The Election starts: {{ $start_time->diffForHumans() }}, From: {{ $election->start_time }} To: {{ $election->end_time }} </h1>

    
          @if($today > $start_time and $today < $end_time)
    <h3>Please Vote for one of the candidates below:</h3>
 
      <div class="row">

      	@foreach($candidates as $candidate)

      	@if($candidate->area->canVoteHere(auth()->user()->voter_card))
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header " style=" background-color: {{$candidate->candidate->party->flag_color}} !important;color: black;">
              <div class="widget-user-image">
                <img class="img-circle" src="/{{ $candidate->candidate->getPic()}}" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"  style="font-weight:bold;">{{ $candidate->candidate->full_name }}</h3>
              <h5 class="widget-user-desc"  style="font-weight:bold;"> {{ $candidate->candidate->party->name }}</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Area<span class="pull-right badge bg-blue">{{$candidate->area->name}} </span></a></li>
                <li><a href="#">Election <span class="pull-right badge bg-aqua">{{$candidate->election->year}} {{$candidate->election->election_type->name}}</span></a></li>
                <!-- <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li> -->
                <li>

                @if(!auth()->user()->voter_card->hasVoted())
                <a style="color: white;" href="/vote-for/{{$candidate->id}}" class="btn btn-lg btn-success btn-block"> 
                <span class="fa fa-check"></span>	Vote
                </a>

                @else

                	<center>

                	@if(auth()->user()->voter_card->hasVotedFor($candidate->candidate_id))

                	<span style="color: green;" class="fa fa-check fa-2x"></span>

                	@else

                	<span style="color: red;" class="fa fa-times fa-2x"></span>

                	@endif
                		
                	</center>
                	
                


                @endif

                </li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>


        @endif

        @endforeach


        </div>

      @endif


@else

<h1>No Election at this time</h1>

@endif

@stop


