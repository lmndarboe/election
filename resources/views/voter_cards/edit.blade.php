@extends('layouts.master')


@section('bread')


 <section class="content-header">
      <h1>
            <a href="{{route('voter_cards.index')}}">
                    Voter Cards
            </a>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Voter Cards </li>
      </ol>
    </section>


@stop

@section('content')


<div class="row">
    

    <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New Voter Cards</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">

            
       

       
        {!! Form::model($voter_card,['url' => '/voter_cards/'.$voter_card->id,'class' => '','method' => 'PUT','files' => true])  !!}  

            {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('full_name') ? 'has-error' : '' }}">
                            <label>Full Name</label>

                           {!! Form::text('full_name',null,['class' => 'form-control','required']) !!}

                            @if ($errors->has('full_name'))
                                <span>
                                    <strong>{{ $errors->first('full_name')}}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>


                     <div class="col-md-6">
                        <div class="form-group{{ $errors->has('card_number') ? 'has-error' : '' }}">
                            <label>Card Number</label>

                           {!! Form::text('card_number',null,['class' => 'form-control','required']) !!}

                            @if ($errors->has('card_number'))
                                <span>
                                    <strong>{{ $errors->first('card_number')}}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>


                 
                    <!-- /col 6 -->
                </div>



                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                            <label>Email</label>

                           {!! Form::text('email',null,['class' => 'form-control','required']) !!}

                            @if ($errors->has('email'))
                                <span>
                                    <strong>{{ $errors->first('email')}}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>


                     <div class="col-md-6">
                        <div class="form-group{{ $errors->has('dob') ? 'has-error' : '' }}">
                            <label>Date of Birth</label>

                           {!! Form::text('dob',null,['class' => 'form-control datepicker','required']) !!}

                            @if ($errors->has('dob'))
                                <span>
                                    <strong>{{ $errors->first('dob')}}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>


                 
                    <!-- /col 6 -->
                </div>



                <!-- /row -->


                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
                            <label>Address</label>

                           {!! Form::text('address',null,['class' => 'form-control','required']) !!}

                            @if ($errors->has('address'))
                                <span>
                                    <strong>{{ $errors->first('address')}}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>


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


<script>
        $(function () {
         //Date picker
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            })
           
        })
      </script>


@stop