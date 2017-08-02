@extends('layouts.admin')
@section('title') Edit "{{ $user->title }}" User | PHP0317E @endsection
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="{{ url('admin/user') }}">Category</a></li>
                <li class="active">Edit</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit "{{ $user->name }}" User</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit "{{ $user->name }}" User</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            {!! Form::model($user, ['method' => 'PATCH', 'url' => 'admin/user/' . $user->id, 'role' => 'form']) !!}
                            <div class="form-group">
                                <label>User name</label>
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                {{--<input type="text" class="form-control" name="name" value="{{ $user->name }}">--}}
                            </div>
                            <div class="form-group">
                                <label>Group</label>

                                {!! Form::select('group_id', $group, null, ['class' => 'form-control']) !!}
                                {{--<input type="text" class="form-control" name="group_id"  value="{{ $user->group_id }}">--}}
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Last name</label>
                                {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>First name</label>
                                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Phone number</label>
                                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                {!! Form::text('address', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                {!! Form::text('gender', null, ['class' => 'form-control']) !!}
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