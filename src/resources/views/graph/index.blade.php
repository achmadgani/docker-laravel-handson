<head>
	<meta charset="UTF-8">
	<!-- Scripts -->
	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
   
    <!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<head>

<div class="container" align="center">
	<h1>一覧画面</h1>
	
</div>
<div class="card">
	<div class = "card-header">
	</div>
	
	<div class= "card-body">
		<h3 class="mb-0" align="center">Prediction Value</h5>
		<div class = "row">
			<div class="col-xs-12 col-md-12 text-left">
			 <!-- chart start -->
			 <div class="container" style="width:80%">
			   <img src="{{ URL::to('/img/calendar.png') }}">
			 </div>
			 <!-- chart end -->
			</div>
		</div>
	</div>
</div>