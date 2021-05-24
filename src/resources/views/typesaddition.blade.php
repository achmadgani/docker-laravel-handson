<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif
    <h2><p class="text-center">新規変数</p></h2>
    <!-- Button trigger modal -->
    <div id='divTable'>
        <table id="listTable" class="display">
        <thead>
            <tr>
                <th>アクション</th>
                <th>名前</th>
                <th>記号</th>
                <th>時間</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allTypesadd as $types)
                <tr>
                    <td class="text-center">
                        <a onclick="editFunc({{$types->type_id}})" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href='{{config('app.url')}}:10080/typesadd/{{$types->type_id}}/delete/' class="btn btn-danger" onclick="return confirm('削除しますか？')"><i class="fas fa-trash"></i></button>
                        </td>
                    <td>{{ $types->name }}</td>
                    <td>{{ $types->value_unit }}</td>
                    <td>{{ $types->time_interval }}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTypes">
      新規追加
    </button>
        <!-- Modal New-->
        <div class="modal fade needs-validation" id="newTypes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" novalidate>
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title text-center" id="exampleModalLongTitle">新規追加</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!--form start-->
                  <form id='addnew'>
                      @csrf
                      <div class="form-group">
                      <label for="exampleFormControlInput1">名前</label>
                      <input type="text" name="name" class="form-control" id="formName" placeholder="トヨタ" maxlength="16" required>
                      </div>
                      <div class="form-group">
                      <label for="exampleFormControlInput1">記号</label>
                      <input type="text" name="value_unit" class="form-control" id="formSymbol" placeholder="トヨタ" maxlength="8" required>
                      </div>
                      <div class="form-group">
                      <label for="exampleFormControlInput1">時間</label>
                      <input type="text" name="time_interval" class="form-control" id="formTime" placeholder="トヨタ" maxlength="16" required>
                      </div>
                  <!--form end-->
                </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">新規追加</button>
                          <button type="submit" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                      </div>
                  </form>
              </div>
            </div>
        </div>

    <!-- Modal Edit-->
    <div class="modal fade" id="editTypes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title text-center" id="exampleModalLongTitle">編集</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!--form start-->
            <form id='editnew'>
                @csrf
                <div class="form-group">
                <label for="exampleFormControlInput1">名前</label>
                <input type="text" name="name" class="form-control" id="formeditName" placeholder="トヨタ" maxlength="16" required>
                </div>
                <div class="form-group">
                <label for="exampleFormControlInput1">記号</label>
                <input type="text" name="value_unit" class="form-control" id="formeditSymbol" placeholder="トヨタ" maxlength="8" required>
                </div>
                <div class="form-group">
                <label for="exampleFormControlInput1">時間</label>
                <input type="text" name="time_interval" class="form-control" id="formeditTime" placeholder="トヨタ" maxlength="16" required>
                </div>
            <!--form end-->
          </div>
                <div class="modal-footer">
                    <button type="submit" id='editSubmit' class="btn btn-primary" onclick=submitFunc()>更新</button>
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                </div>
            </form>
        </div>
      </div>
    </div>
    <!--modal end -->
  </div>
  <input type="hidden" id='ajaxvalue'></div>
</body>
</html>
<script>
$(document).ready( function () {
    $('#listTable').DataTable({
      "columnDefs": [
        { "width": "12%", "targets": 0 }
      ]
    });
} );
</script>
<script>
$(document).ready( function () {
    $('#addnew').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/typesadd/addnew',
            data: $('#addnew').serialize(),
            success: function(response) {
                //Ge t Datatable API
                console.log(response)
                $('#newTypes').modal('hide')
                //Row data array is in 'data' object
                //Add the data array 'data.data' and redraw the table
                alert('新しいデータが保存されました。')
                location.reload()
            },
            error: function(error){
                console.log(error)
                alert('データが保存エラー');
            }
        });
    });
});

function editFunc(id){
    $.ajax({
        type:"POST",
        url: '/typesadd/'+id+'/edit',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: { id: id },
        dataType: 'json',
        success: function(e){
            $('#editTypes').modal('show');
            $('#formeditName').val(e.name);
            $('#formeditSymbol').val(e.value_unit);
            $('#formeditTime').val(e.time_interval);
            $('#ajaxvalue').val(id);
            //$('#addnew').on('submit', submitFunc(id));
        }
    });
}

function submitFunc(){
    var id = document.getElementById("ajaxvalue").value;
        $.ajax({
            type: 'POST',
            url: '/typesadd/'+id+'/update',
            data: $('#editnew').serialize(),
            success: function(response) {
                //Get Datatable API
                alert(' データが保存されました。')
                //console.log(response)
                //$('#editTypes').modal('hide')
                //Row data array is in 'data' object
                //Add the data array 'data.data' and redraw the table
                location.reload()
            },
            error: function(error){
                console.log(error)
                alert('データが保存エラー');
            }
        });
}
</script>
