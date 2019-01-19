@extends('layouts.master')


@section('bread')


 <section class="content-header">
      <h1>
            <a href="{{route('parties.index')}}">
                    Party
            </a>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Party</li>
      </ol>
    </section>


@stop

@section('content')


<div class="row">
	

	<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Party</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">

            
        <form action="{{route('parties.update',$party)}}" method="POST">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="indentity_number">Party Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $party->name}}" style="width: 100%;">
                            @if ($errors->has('name'))
                                <span>
                                    <strong>{{ $errors->first('name')}}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <!-- /col 6 -->
                    <div class="col-md-6">
                            <div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address" value="{{ $party->address}}" style="width: 100%;">
                                @if ($errors->has('address'))
                                    <span>
                                        <strong>{{ $errors->first('address')}}</strong>
                                    </span>
                                @endif 
                            </div>
                        </div>
                        <!-- /col 6 -->
                </div>
                <!-- /row -->
                <div class="row">
                        <div class="col-md-6">
                                <div class="form-group{{ $errors->has('flag_bearer') ? 'has-error' : '' }}">
                                    <label for="flag_bearer">Flag Bearer</label>
                                    <input type="text" class="form-control" name="flag_bearer" value="{{ $party->flag_bearer}}" id="flag_bearer" style="width: 100%;">
                                    @if ($errors->has('flag_bearer'))
                                        <span>
                                            <strong>{{ $errors->first('flag_bearer')}}</strong>
                                        </span>
                                    @endif 
                                </div>
                            </div>
                            <!-- /col 6 -->

                            <div class="col-md-6"> 
                                    <div class="form-group{{ $errors->has('flag_color') ? 'has-error' : '' }}">
                                        <label for="type">Party Color</label>
                                        <input class="form-control" name="flag_color" id="flag_color" style="width: 100%;"     value="{{$party->flag_color}}" />
                                            
                                        @if ($errors->has('flag_color'))
                                        <span>
                                            <strong>{{ $errors->first('flag_color')}}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.col-6-->
                </div>
                <!-- /row -->
                
                <div class="row">
                        
                        <div class="col-md-12">

                                
                                        <div class="form-group{{ $errors->has('flag_bearer') ? 'has-error' : '' }}">
                                                <label for="">Upload Picture</label>
                                                <input class="form-control date" name="file" type="file" id="file" value="{{ old('file') }}">
                                                @if ($errors->has('file'))
                                                    <strong class="text-danger">{{ $errors->first('file') }}</strong>
                                                @endif
                                        </div>
                                    

                        </div>
                                <!-- /row -->
                </div>
                <!-- /row -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                    <a href="{{route('parties.index')}}" class="btn btn-danger">Cancel</a>
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