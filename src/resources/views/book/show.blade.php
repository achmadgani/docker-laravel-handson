<head>
	<meta charset="UTF-8">
	<!-- Scripts -->
	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

    <script>
		 $(document).ready( function () {
			$('#foo-table').DataTable();
		} );
    </script>
   
    <!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<head>

<div class="container" align="center">
	<h1>詳細画面</h1>
	<p><a href="{{ route('book.index')}}">一覧画面</a></p>
</div>
<div class="container-fluid"> 
	<table id="foo-table" class="table table-bordered" border="1">
		<tr>
			<th>id</th>
			<th>title</th>
			<th>author</th>
			<th>created_at</th>
			<th>updated_at</th>
		</tr>
		<tr>
			<td>{{ $book->id }}</td>
			<td>{{ $book->title }}</td>
			<td>{{ $book->author }}</td>
			<td>{{ $book->created_at }}</td>
			<td>{{ $book->updated_at }}</td>
		</tr>
	</table>
</div>

