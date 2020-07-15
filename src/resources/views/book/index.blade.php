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
	<h1>一覧画面</h1>
	<p><a href="{{ route('book.create') }}">新規追加</a></p>
	 
	@if ($message = Session::get('success'))
	<p>{{ $message }}</p>
	@endif
</div>
<div class="container-fluid">
	<table id="foo-table" class="table table-bordered" >
		<thead>
			<tr>
				<th>title</th>
				<th>詳細</th>
				<th>編集</th>
				<th>削除</th>
			</tr>
		</thead>
		@foreach ($books as $book)
		<tbody>
			<tr>
				<td>{{ $book->title }}</td>
				<th><a href="{{ route('book.show',$book->id)}}">詳細</a></th>
				<th><a href="{{ route('book.edit',$book->id)}}">編集</a></th>
				<th>
					<form action="{{ route('book.destroy', $book->id)}}" method="POST">
						@csrf
						@method('DELETE')
						<input type="submit" name="" value="削除">
					</form>
				</th>
			</tr>
		</tbody>
		@endforeach
	</table>
</div>

<div class="card">
	<div class = "card-header">
	</div>
	
	<div class= "card-body">
		<h3 class="mb-0" align="center">Graph Chart Example</h5>
		<div class = "row">
			<div class="col-xs-12 col-md-12 text-left">
			 <!-- chart start -->
			 <div class="container" style="width:80%">
			   <canvas id="myChart"></canvas>
			 </div>
			 <!-- chart end -->
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>