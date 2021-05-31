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
                  <th>Status</th>
                  <th>Job Title</th>
                  <th>Experience</th>
                  <th>Job Location</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($records as $rec)
                  <tr @if($rec->status=='active') style="background-color:#fffde6;" @else style="background-color:#ffffff;" @endif >
                    <td>{{ $rec->id }}<input type="hidden" name="myid" class="myid" value="{{ $rec->id }}"></td>
                    <td>@if($rec->status=='active') Active <input type="hidden" name="mystatus" class="mystatus" value="inactive"> @else Inactive <input type="hidden" name="mystatus" class="mystatus" value="active"> @endif</td>
                    <!-- <td>{{ $rec->industry }}</td> -->
                    <td>{{ $rec->job_title }}</td>
                    <td>{{ $rec->experience_from }}-{{ $rec->experience_to }} {{ $rec->experience_type}}</td>
                    <td>{{ $rec->city_name }} {{ $rec->name }}</td>
                    <td>
                      @if($rec->status=='active')
                      <a href="" name="inactive" class="btn btn-warning status">Deactivate</a>
                      @else
                      <a href="" name="active" class="btn btn-success status">Activate</a>
                      @endif
                      <a href="edit-job-{{$rec->id}}" name="editjob" class="btn btn-primary edit">Edit</a>
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

        $('#example1').on('click','.status',function(e){

            e.preventDefault();

            var status = $(this).closest('tr').find('.mystatus').val();
            var id = $(this).closest('tr').find('.myid').val();

            $.ajax({
            type:'POST',
            url:'update-job',
            data:{id:id, status:status},

            success:function(data){
              refreshTable();
            }
            });

          });

        $('#example1').on("click",".delete",function(e){
          e.preventDefault();
          if(confirm("Are you sure you want to delete this news!")==true)
          {
            var id = $(this).closest('tr').find('.myid').val();
            $.ajax({
            type:'POST',
            url:'delete-job',
            data:{id:id},
            success:function(data){
              refreshTable();
            }
            });
          }
        });
          function refreshTable() {
          // $('#joblisttable').fadeOut();
          $('#joblisttable').load('joblisttable', function() {
          // $('#joblisttable').fadeIn();
  });
}

        });
        </script>