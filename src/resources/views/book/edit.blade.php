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
	<h1>編集画面</h1>
	<p><a href="{{ route('book.index')}}">一覧画面</a></p>
</div> 

<div class="container-fluid">
	@if ($message = Session::get('success'))
	<p>{{ $message }}</p>
	@endif
	 
	@if ($errors->any())
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
	@endif

	<form action="{{ route('book.update',$book->id)}}" method="POST">
		@csrf
		@method('PUT')
		<p>タイトル：<input type="text" name="title" value="{{ $book->title }}"></p>
		<p>著者：<input type="text" name="author" value="{{ $book->author }}"></p>
		<input type="submit" value="編集する">
	</form>
</div>