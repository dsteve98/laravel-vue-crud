<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="container">
    <h1>Todo List</h1>
	<table class="table table-bordered">
		<thead>
			<th>Nomor</th>
			<th>Deksripsi</th>
			<th>Status</th>
		</thead>
		<tbody>
            <?php $i = 0 ?>
			@foreach ($taskList as $task)
			<tr>
				<td>{{ ++$i}}</td>
				<td>{{ $task->description }}</td>
				<td>{{ $task->checked ? "selesai" : "belum selesai" }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</body>
</html>