@extends('layouts.master')


@section('bread')


 <section class="content-header">
      <h1>
            <a href="{{route('areas.index')}}">
                    Area
            </a>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Area</li>
      </ol>
    </section>


@stop

@section('content')


<div class="row">
	

	<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New Area</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">

            
        <form action="{{route('areas.store')}}" method="POST">
            {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="indentity_number">Area Name</label>
                            <input type="text" class="form-control" name="name" id="indentity_number" style="width: 100%;">
                            @if ($errors->has('name'))
                                <span>
                                    <strong>{{ $errors->first('name')}}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <!-- /col 6 -->
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('type') ? 'has-error' : '' }}">
                            <label for="type">Area Type</label>
                            <select class="form-control select2" name="type" id="type" style="width: 100%;">
                                <option>Country</option>
                                <option>Region</option>
                                <option>Constituency</option>
                                <option>Wards</option>
                            </select>
                            @if ($errors->has('type'))
                            <span>
                                <strong>{{ $errors->first('type')}}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <!-- /.col-6-->
                </div>
                <!-- /row -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <a href="{{route('areas.index')}}" class="btn btn-danger">Cancel</a>
                  </div>
            </form>
            <!-- /form -->
        </div>
        <!-- /box-body -->
            
          </div>
          <!-- /.box -->

         


    </div>




</div>
@stop