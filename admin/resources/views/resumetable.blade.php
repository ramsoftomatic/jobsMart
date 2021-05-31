              <div class="tbl-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-warning">
                  <th>#</th>
                  <th>Date Candidate added</th>
                  <th>Candidate Name </th>
                   <th>Email ID </th>
                  <th>Contact Number </th>
                  <th>Current Location </th>
                  <th>Gender</th> 
                  <th>Job Title</th>
                  <th>Apply Company Name</th>
                  <th>Current Job Title</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  @foreach($records as $rec)
                  <?php $date=strtotime($rec->created_at); 
                  $date=date('d-m-Y',$date);
                  ?>
                  <tr>
                    <td>{{$i++}}</td>
                    @if($rec->created_at!=NULL)
                    <td>{{ $date }}</td>
                    @else
                    <td>{{ $rec->created_at }}</td>
                   @endif
                    <td>{{ $rec->name }}</td>
                    <td>{{ $rec->email }}</td>
                    <td>{{ $rec->mobile }}</td>
                    <td>{{ $rec->cur_loc }}</td>
                    <td>{{ $rec->gender }}</td> 
                    <td>{{ $rec->job_title }}</td>
                    <td>{{ $rec->company }}</td>
                    <th>{{ $rec->cur_desig }}</th>
                    <td>
                      <span>
                        <a href="view-detail-{{$rec->resume_id}}" target="_blank" class="btn btn-primary" name="view">View / Edit</a>
                        <!-- <button class="btn btn-danger delete" name="view">Delete</button> -->
                        <input type="hidden" name="id" class="resume_id" value="{{ $rec->resume_id }}">
                      </span>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              </div>
              <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'responsive'  : true
    });


    $('#example1').on("click",".delete",function(e){
          e.preventDefault();
          if(confirm("Are you sure you want to delete this news!")==true)
          {
            var id = $(this).closest('tr').find('.resume_id').val();
            $.ajax({
            type:'POST',
            url:'delete-resume',
            data:{id:id},
            success:function(data){
              refreshTable();
            }
            });
          }

          function refreshTable()
          {
            //$('#joblisttable').fadeOut();
            $('#resumetable').load('resumetable', function() {
            //$('#joblisttable').fadeIn();
            });
          }
        });
  });
</script>