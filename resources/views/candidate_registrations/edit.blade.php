@extends('layouts.master')


@section('bread')


 <section class="content-header">
      <h1>
            <a href="{{route('candidate_registrations.index')}}">
                    Candidate Registrations
            </a>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Candidate Registration </li>
      </ol>
    </section>


@stop

@section('content')


<div class="row">
    

    <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New Candidate Registration</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">

            
       <!--  <form action="{{route('candidate_registrations.store')}}" method="POST"> -->

       

        {!! Form::model($candidate_registration,['url' => '/candidate_registrations/'.$candidate_registration->id,'class' => '','method' => 'PUT','files' => true])  !!} 

            {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('election_type_id') ? 'has-error' : '' }}">
                            <label>Candidate</label>

                           {!! Form::select('candidate_id',$candidates,null,['class' => 'form-control','required']) !!}

                            @if ($errors->has('candidate_id'))
                                <span>
                                    <strong>{{ $errors->first('candidate_id')}}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>


                     <div class="col-md-6">
                        <div class="form-group{{ $errors->has('election_type_id') ? 'has-error' : '' }}">
                            <label>Election</label>

                           {!! Form::select('election_id',$elections,null,['class' => 'form-control','required']) !!}

                            @if ($errors->has('election_id'))
                                <span>
                                    <strong>{{ $errors->first('election_id')}}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>


                 
                    <!-- /col 6 -->
                </div>
                <!-- /row -->


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('election_type_id') ? 'has-error' : '' }}">
                            <label>Area</label>

                           {!! Form::select('area_id',$areas,null,['class' => 'form-control','required']) !!}

                            @if ($errors->has('area_id'))
                                <span>
                                    <strong>{{ $errors->first('area_id')}}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>


                    


                 
                    <!-- /col 6 -->
                </div>




               
                <!-- /row -->

             
                <!-- /row -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                <a href="{{route('candidate_registrations.index')}}" class="btn btn-danger">Cancel</a>
                  </div>
            </form>
            <!-- /form -->
        </div>
        <!-- /box-body -->
            
          </div>
          <!-- /.box -->

         


    </div>

</div>



<!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>


@stop