<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!--datatables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

  <!--font awesome-->
  <script src="https://kit.fontawesome.com/574a316763.js" crossorigin="anonymous"></script>

  <style>
    td.details-control {
        background: url('../resources/details_open.png') no-repeat center center;
        cursor: pointer;
    }
    tr.shown td.details-control {
        background: url('../resources/details_close.png') no-repeat center center;
    }
  </style>
</head>
<body>

  <div class="container">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif
    <h2><p class="text-center">カレンダー</p></h2>
    <!-- Button trigger modal -->
    <div id='divTable'>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTypes"　onclick=addFunc()>
      新規追加
    </button>

    <!-- Modal-->
    <div class="modal fade" id="newTypes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title text-center" id="exampleModalLongTitle">新規追加</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
                <!--form start-->
                <form id="formId">
                    <div class="form-row col-md-12">
                        <div class="form-group">
                            <label for="inputEmail4">名前</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="ノビタ">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                          <label for="inputEmail4">タイプ値1</label>
                          <input type="email" class="form-control" id="inputEmail4" placeholder="トヨタ">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="inputPassword4">値</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="トヨタ">
                        </div>
                        <div class="form-group col-md-4 pull-right">
                          <button id="addButton" style="margin-top:25px;" type="button" class="btn btn-success"><i class="bi bi-plus"></i>追加</button>
                          <button id="removeButton" type="button" style="margin-top:25px;" class="btn btn-default btn-number" data-type="minus">
                            <span class="glyphicon glyphicon-minus"></span>
                          </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">新規追加</button>
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
            </div>
            <!--form end-->
        </div>
      </div>
    </div>
    <!--modal end -->
  </div>
</body>
</html>
<script>
/* Formatting function for row details - modify as you need */
var counter = 1;
var MAXCOL = 5;
var MINCOL = 1;
$(document).on('click', '#addButton', function() {
    if(counter < MAXCOL){
        counter++;
        $("#formId").append(addLine(counter));
    }
} );

$(document).on('click', '#removeButton', function() {
    if(counter > 1){
        console.log(counter);
        $("#newLine"+counter).remove();
        counter--;
    }
} );

function addLine(counter){
    return  "<div id='newLine"+counter+"' class='form-row'>"+
                "<div class='form-group col-md-5'>"+
                    "<label for='inputEmail4'>タイプ値"+counter+"</label>"+
                    "<input type='email' class='form-control' id='inputEmail4' placeholder='トヨタ'>"+
                "</div>"+
                "<div class='form-group col-md-3'>"+
                    "<label for='inputPassword4'>値</label>"+
                    "<input type='password' class='form-control' id='inputPassword4' placeholder='トヨタ'>"+
                "</div>"+
            "</div>";
}

/* Formatting function for row details - modify as you need */
function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Full name:</td>'+
            '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extension number:</td>'+
            '<td>'+d.extn+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extra info:</td>'+
            '<td>And any further details here (images etc)...</td>'+
        '</tr>'+
    '</table>';
}

$(document).ready(function() {
    var table = $('#example').DataTable( {
        "ajax": "../ajax/data/objects.txt",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "name" },
            { "data": "value1" },
            { "data": "value1_name" }
        ],
        "order": [[1, 'asc']]
    } );

    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );
</script>
