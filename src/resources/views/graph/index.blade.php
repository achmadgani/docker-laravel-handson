<html>

<head>
	<meta charset="UTF-8">
	<!-- Scripts -->
	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

    <!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

	<!-- Datepicker -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js" charset="UTF-8">></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.ja.min.js"></script>
<head>

<body>

<div class="card">
	<div class = "card-header">
	</div>

	<div class= "card-body">
		</h5>
        <h3 class="mb-0" align="center">Prediction Value</h5>
		<div class = "row">
			<div class="col-xs-12 col-md-12 text-left">
			 <!-- chart start -->
			 <div class="container" style="width:80%">
				<form action="{{url('/graphtest')}}" method="post">
                    @csrf
					<div class="form-group">
						<label>ようこそ</label>
						<input autocomplete="off" id="datepick" class="date form-control" style="width:10%" type="text" placeholder="日付を選択" name="selectdate">
					</div>
                    <button type="submit" class="btn btn-primary" name="submit">送信</button>
                </form>
			 </div>
             <!-- chart end -->
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

    $('.date').datepicker({
        format: "yyyy-mm",
		startView: "months",
		minViewMode: "months",
		language:'ja'
     });

     function TestDate(){
         date=$('#datepick').val();
     }
</script>
</body>
</html>

