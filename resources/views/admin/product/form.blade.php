<div class="form-group">
    <label>Title</label>
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
    {{--<input type="text" class="form-control" name="title" placeholder="Title">--}}
</div>
<div class="form-group">
    <label>Category</label>
    {!! Form::select('category_id', $categories, null, ["class" => "form-control"]) !!}
    {{--<select name="category_id" class="form-control">
        @foreach($categories as $item)
            <option value="{{ $item->id }}">{{ $item->title }}</option>
        @endforeach
    </select>--}}
</div>
<div class="form-group">
    <label>Price</label>
    {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'price']) !!}
    {{--<input type="text" class="form-control" name="price" placeholder="price" value="0">--}}
</div>
<div class="form-group">
    <label>Thumbnail</label>
    {!! Form::file('thumbnail', null, ['class' => 'form-control']) !!}
    {{--<input type="file" class="form-control" name="thumbnail">--}}
</div>

<button type="submit" class="btn btn-primary">Save</button>