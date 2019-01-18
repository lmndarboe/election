@extends('layouts.master')


@section('bread')


 <section class="content-header">
      <h1>
            <a href="{{route('candidates.index')}}">
                    Candidate
            </a>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Candidate</li>
      </ol>
    </section>


@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Candiate</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                  <form action="{{route('candidates.update',$candidate)}}" method="POST" enctype="multipart/form-data">
                         {{ csrf_field()}}
                         <input name="_method" type="hidden" value="PATCH">
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('full_name') ? 'has-error' : '' }}">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" class="form-control" name="full_name" value="{{$candidate->full_name}}" style="width: 100%;">
                                    @if ($errors->has('full_name'))
                                        <span>
                                            <strong>{{ $errors->first('full_name')}}</strong>
                                        </span>
                                    @endif 
                                </div>
                            </div>
                            <!-- /col 6 -->
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('party_id') ? 'has-error' : '' }}">
                                    <label>Party</label>
                                    <select class="form-control select2" name="party_id" style="width: 100%;">
                                        @foreach($parties as $party)
                                            <option value="{{$party->id}}" {{ $candidate->party_id == $party->id ? 'selected':''}}>
                                                {{ $party->name}}
                                            </option>
                                      @endforeach
                                    </select>
                                    @if ($errors->has('party_id'))
                                        <span>
                                            <strong>{{ $errors->first('party_id')}}</strong>
                                        </span>
                                    @endif 
                                </div>
                            </div>
                            <!-- /col 6 -->
                         </div>
                         <!-- /row -->
                         <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{$candidate->address}}" style="width: 100%;">
                                    @if ($errors->has('address'))
                                        <span>
                                            <strong>{{ $errors->first('address')}}</strong>
                                        </span>
                                    @endif 
                                </div>
                            </div>
                            <!-- /col 6 -->
                         </div>



                         <div class="row">

          <div class="col-md-12">


            <div class="form-group{{ $errors->has('file') ? 'has-error' : '' }}">
              <label for="">Upload Picture</label>
              <input class="form-control " name="file" type="file" id="file" value="{{ old('file') }}" required>
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
                        <a href="{{route('candidates.index')}}" class="btn btn-danger">Cancel</a>
                          </div>
                      </form>
                  </div>
            </div>
        </div>
        <!-- /col-md-12 -->
    </div>
    <!-- /row -->
@stop