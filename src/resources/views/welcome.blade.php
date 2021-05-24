<!DOCTYPE html>
<html lang="en">
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
</head>
<body>

  <div class="container">
    <h2><p class="text-center">新規変数</p></h2>
    <!-- Button trigger modal -->
    <table id="myTable" class="display">
      <thead>
          <tr>
              <th>名前</th>
              <th>記号</th>
              <th>時間</th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td>テスト</td>
              <td>テスト</td>
              <td>30分</td>
          </tr>
          <tr>
              <td>テスト</td>
              <td>テスト</td>
              <td>60分</td>
          </tr>
      </tbody>
    </table>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      新規追加
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            <form>
            <div class="form-group">
              <label for="exampleFormControlInput1">名前</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="トヨタ">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">記号</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="トヨタ">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">時間</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="トヨタ">
            </div>
            </form>
            <!--form end-->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">新規追加</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
          </div>
        </div>
      </div>
    </div>
    <!--modal end -->
  </div>
</body>
</html>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
