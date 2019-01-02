@extends('layouts.master')

@section('content')

    

    <h3>Results:</h3>

      <div class="row">

      	@foreach($candidates as $candidate)
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header " style=" background-color: {{$candidate->candidate->party->flag_color}} !important;color: white;">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $candidate->candidate->full_name }}</h3>
              <h5 class="widget-user-desc"> {{ $candidate->candidate->party->name }}</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Area<span class="pull-right badge bg-blue">{{$candidate->area->name}} </span></a></li>
                <li><a href="#">Election <span class="pull-right badge bg-aqua">{{$candidate->election->year}} {{$candidate->election->election_type->name}}</span></a></li>
                <li><a href="#">Votes <span class="pull-right badge bg-green">{{ $candidate->candidate->votings()->count() }}</span></a></li>
               
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>

        @endforeach


        </div>




@stop