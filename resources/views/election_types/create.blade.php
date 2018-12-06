@extends('layouts.master')


@section('bread')


 <section class="content-header">
      <h1>
        Election Type
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Election Type</li>
      </ol>
    </section>


@stop

@section('content')


<div class="row">
	

	<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New Election Type</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['url' => '/election_types/','class' => '','method' => 'POST','files' => true])  !!} 
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Election Type Name</label>

                  {!! Form::text('name',null,['class' => 'form-control','required']) !!}


                </div>
                
               
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add Election Type</button>
              </div>
            {!! Form::close() !!}
          </div>
          <!-- /.box -->

         


    </div>




</div>
@stop