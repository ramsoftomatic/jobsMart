<div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th style="width: 80px;">Error</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th style="width: 250px;">Error Detail</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($records as $rec)
                  <tr>
                    <td>{{ $rec->error_id }}<input type="hidden" name="myid" class="myid" value="{{ $rec->error_id }}"></td>
                    <td>@if($rec->duplicate_error=='true') Duplication Error @endif @if($rec->validate_error=='true') Validation Error @endif</td>
                    <td>{{ $rec->name }}</td>
                    <td>{{ $rec->email }}</td>
                    <td>{{ $rec->mobile }}</td>
                    <td>{!! $rec->error_detail !!}</td>
                    <td>
                      
                      <a href="rectify-error-{{$rec->error_id}}" name="rectify" class="btn btn-primary rectify">View / Rectify</a>
                     
                      <a href="" name="delete" class="btn btn-danger delete">Delete</a>
                     
                      <!-- <a href="edit-job-{{$rec->error_id}}" name="editjob" class="btn btn-primary edit">Edit</a> -->
                     <!--  <button name="deletejob" class="btn btn-danger delete">Delete</button> -->
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

      </div>
</section>

<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<style type="text/css">
  .btn
  {
    margin:5px;
  }
</style>
<script type="text/javascript">

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $(document).ready(function(){
          $('#example1').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            'responsive'  : true
          });

        // $('#example1').on('click','.rectify',function(e){

        //     e.preventDefault();

        //     var rectify = $(this).closest('tr').find('.myrectify').val();
        //     var id = $(this).closest('tr').find('.myid').val();

        //     $.ajax({
        //     type:'POST',
        //     url:'rectify-error',
        //     data:{id:id, rectify:rectify},

        //     success:function(data){
        //       refreshTable();
        //     }
        //     });

        //   });

        $('#example1').on("click",".delete",function(e){
          e.preventDefault();
          if(confirm("Are you sure you want to delete this news!")==true)
          {
            var id = $(this).closest('tr').find('.myid').val();
            $.ajax({
            type:'POST',
            url:'delete-error',
            data:{id:id},
            success:function(data){
              refreshTable();
            }
            });
          }
        });
          function refreshTable() {
          //$('#errorlisttable').fadeOut();
          $('#errorlisttable').load('errorlisttable', function() {
          //$('#errorlisttable').fadeIn();
  });
}

        });
        </script>