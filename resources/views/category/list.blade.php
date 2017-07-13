<table border="1px">
	<tr>
		<td>NO.</td> 
		<td>Title</td>
		<td>Status</td> 
	</tr>
	@foreach ($categories as $item)
		<tr>
			<td>{{ $item->id }}</td> 
			<td>{{ $item->title }}</td> 
			<td>{{ $item->status }}</td> 
		</tr>
	@endforeach
</table>