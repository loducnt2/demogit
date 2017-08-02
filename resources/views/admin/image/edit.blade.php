@extends('layouts.admin')
@section('title') Edit "{{ $image->name }}" Image | PHP0317E @endsection
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="{{ url('admin/image') }}">Image</a></li>
                <li class="active">Edit</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit "{{ $image->name }}"</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit "{{ $image->name }}"</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            {!! Form::model($image, ['method' => 'PATCH', 'url' => ['admin/image', $image->id],'files' => true, 'role' => 'form']) !!}
                            <div class="form-group">

                                <div class="form-group">
                                    <label>Product</label>
                                    {!! Form::select('product_id', $product, null, ["class" => "form-control"]) !!}
                                    {{--<select name="category_id" class="form-control">
                                        @foreach($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>--}}
                                </div>

                                <label>Image</label>
                                {!! Form::file('name', null, ['class' => 'form-control']) !!}
                                {{--<input type="text" class="form-control" name="title" placeholder="Title">--}}
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