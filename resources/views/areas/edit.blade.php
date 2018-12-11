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

            
        <form action="{{route('areas.update',$area)}}" method="POST">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="indentity_number">Area Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$area->name}}" style="width: 100%;">
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
                            <option {{ $area->type == 'Country'? 'selected':''}}>Country</option>
                                <option {{ $area->type == 'Region'?'selected':''}}>Region</option>
                                <option {{ $area->type == 'Constituency' ? 'selected': ''}}>Constituency</option>
                                <option {{ $area->type == 'Ward' ? 'selected' :'' }}>Wards</option>
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
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
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