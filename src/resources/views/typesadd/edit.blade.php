<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!--datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <!--font awesome-->
    <script src="https://kit.fontawesome.com/574a316763.js" crossorigin="anonymous"></script>
  </head>
<body>
    <div class="container">
        <h4 class="modal-title text-center">編集</h4>
        <!--form start-->
        <form method="POST" action="{{config('app.url')}}:10080/typesadd/{{$editTypesadd->type_id}}/update">
            @csrf
            <div class="form-group">
            <label for="exampleFormControlInput1">名前</label>
            <input type="text" name="name" class="form-control" placeholder="トヨタ" value='{{$editTypesadd->name}}'>
            </div>
            <div class="form-group">
            <label for="exampleFormControlInput1">記号</label>
            <input type="text" name="value_unit" class="form-control" placeholder="トヨタ" value='{{$editTypesadd->value_unit}}'>
            </div>
            <div class="form-group">
            <label for="exampleFormControlInput1">時間</label>
            <input type="text" name="time_interval" class="form-control" placeholder="トヨタ" value='{{$editTypesadd->time_interval}}'>
            </div>
        <!--form end-->

            <div>
                <button type="submit" class="btn btn-primary">更新</button>
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
            </div>
    </div>
        </form>
    </div>
</div>
</div>
</body>
<!--modal end -->
