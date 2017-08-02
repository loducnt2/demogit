@extends('layouts.admin')
@section('title') Create Image | PHP0317E @endsection
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="{{ url('admin/image') }}">Image</a></li>
                <li class="active">Create</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create New Image</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Item</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            {!! Form::open(['type' => 'POST', 'url' => 'admin/image','files' =>true, 'role' => 'form']) !!}

                            <div class="form-group">
                                <label>Product</label>
                                {{--{!! Form::select('product_id',$products , null, ['class' => 'form-control']) !!}--}}
                                <select name="product_id" class="form-control">
                                    @foreach($products as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>ImageName</label>
                                <input type="file" class="form-control" name="name">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div><!-- /.col-->
        </div>

    </div>
@endsection