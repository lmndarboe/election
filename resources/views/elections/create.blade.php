@extends('layouts.master')


@section('bread')


 <section class="content-header">
      <h1>
            <a href="{{route('elections.index')}}">
                    Election
            </a>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Election</li>
      </ol>
    </section>


@stop

@section('content')


<div class="row">
	

	<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New Election</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">

            
        <form action="{{route('elections.store')}}" method="POST">
            {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('election_type_id') ? 'has-error' : '' }}">
                            <label>Election Type</label>
                            <select class="form-control select2" name="election_type_id" style="width: 100%;">
                                @foreach($elections_types as $elections_type)
                                     <option value="{{$elections_type->id}}">{{ $elections_type->name}}</option>
                              @endforeach
                            </select>
                            @if ($errors->has('election_type_id'))
                                <span>
                                    <strong>{{ $errors->first('election_type_id')}}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <!-- /col 6 -->
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('year') ? 'has-error' : '' }}">
                            <label for="year">Year</label>
                            <input type="text" class="form-control" name="year" id="year" style="width: 100%;">
                            @if ($errors->has('year'))
                                <span>
                                    <strong>{{ $errors->first('year')}}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <!-- /col 6 -->
                </div>
                <!-- /row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Date:</label>
            
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right datepicker" name="date" id="datepicker">
                            </div>
                            <!-- /.input group -->
                          </div>
                          <!-- /.form group -->
                    </div>
                    <!-- /col 6 -->
                </div>
                <!-- /row -->

                <div class="row">
                    <div class="col-md-6">
                            <div class="bootstrap-timepicker">
                        <div class="form-group{{ $errors->has('start_time') ? 'has-error' : '' }}">
                            <label for="year">Start Time</label>
                            <input type="text" class="form-control timepicker" name="start_time" id="start_time" style="width: 100%;">
                            @if ($errors->has('start_time'))
                                <span>
                                    <strong>{{ $errors->first('start_time')}}</strong>
                                </span>
                            @endif 
                        </div>
                            </div>
                    </div>
                    <!-- /col 6 -->
                    <div class="col-md-6">
                            <div class="bootstrap-timepicker">
                        <div class="form-group{{ $errors->has('end_time') ? 'has-error' : '' }}">
                            <label for="year">End Time</label>
                            <input type="text" class="form-control timepicker1" name="end_time" id="end_time" style="width: 100%;">
                            @if ($errors->has('end_time'))
                                <span>
                                    <strong>{{ $errors->first('end_time')}}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>

                    
                    </div>
                    <!-- /col 6 -->
                </div>
                <!-- /row -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                <a href="{{route('elections.index')}}" class="btn btn-danger">Cancel</a>
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
            //Timepicker
            $('.timepicker').timepicker({
                timeFormat: 'HH:mm:ss',
                showInputs: true
            })

            //Timepicker
            $('.timepicker1').timepicker({
                timeFormat: 'HH:mm:ss',
                showInputs: true
            })
        })
      </script>

@stop