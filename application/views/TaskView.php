
<style>
    .heading-background {
      background-color: #C1ECFA; 
      padding: 10px;
    }
    .custom-button {
      width: 100px; 
      height: 40px; 
      font-size: 18px;
      align : center; 
    }
    .button-container {
      display: flex;
      justify-content: center;
    }
    
  </style>
<div class="container-fluid">
  <div class="container"     style="padding-bottom: 30px;">
  <h5 class="display-7 heading-background">TASK MANAGER </h5>
  <div class="row mb-4">
            <div class="col-md-12 text-end">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TaskModal">
                    ADD TASK
                </button>
            </div>
        </div>
        <div class="row align-items-center mt-4">
            <div class="col-md-4">
                <label for="startDate" class="form-label">Start Date:</label>
                <input type="date" id="startDate" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="endDate" class="form-label">End Date:</label>
                <input type="date" id="endDate" class="form-control">
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-primary mt-4" onclick="filterByDate()">Filter</button>
            </div>
        </div>
    </div>
<div class="modal fade" id="TaskModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Task</h4>
                <button type="button" class="close" data-dismiss="modal" onclick="closeModal();">&times;</button>
            </div>

            <div class="modal-body">
            <form id="TaskForm">
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="TaskTitle"><b>Task Title</b></label>
                        <input type="text" id="TaskTitle" class="form-control" placeholder="Enter Task Title"/>
                        <input type="hidden"  id="text_id_pk" name="text_id_pk" > 
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email2"><b>Task Description</b></label>
                        <input type="text" id="TaskDescription" class="form-control" placeholder="Enter Task Description" />
                    </div>
                    </div>
                    </div>
                    
                <div class="row">
                <div class="col-md-6">
                <div class="form-outline mb-4">
                <label for="dob"><b>Due Date</b></label>
                <input type="text" id="TaskDueDate" name="TaskDueDate" class="form-control" placeholder="">
                </div>
                </div>
                
            </div>
          
        </form>
            </div>
         

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal" onclick="closeModal();">Close</button>
                <button type="button" class="btn btn-primary" id="submitButton" onclick="saveData();">Save</button>

            </div>

        </div>
    </div>
</div>
<div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-user" id="dataTable">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Task Title</th>
                        <th>Task Description</th>
                        <th>Task Due</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php 
                    $i=1;
                    foreach ($allTaskData as $row) {  ?>
                    <tr>
                        <td class="center"><?php echo $i++; ?></td>
                        <td class="center"><?php echo $row['tt_TaskTitle']; ?></td>
                        <td class="center"><?php echo $row['tt_TaskDescription'] ?></td>
                        <td class="center"><?php echo $row['tt_TaskDueDate'] ?></td>
                        <?php if ($row['tt_is_completed'] == 1): ?>
                            <td class="center" style="color: green;">
                                Completed
                            </td>
                        <?php else: ?>
                            <td class="center" style="color: red;">
                                Pending
                            </td>
                        <?php endif; ?>
                        <td class="center">
                            <input type="checkbox" class="completedCheckbox" style="transform: scale(1.5);" data-task-id="<?php echo $row['tt_id_pk']; ?>" <?php if($row['tt_is_completed'] == 1){ echo 'checked'; } ?> />
                            <span style="margin-right: 10px;"></span> 
                            <a class="btn btn-light btn-xs editButton" data-task-id='<?php echo $row['tt_id_pk'] ?>'><i class="fa fa-edit"></i></a> 
                            <span style="margin-right: 10px;"></span> 
                            <a class="btn btn-danger btn-xs deleteRow" data-task-id='<?php echo $row['tt_id_pk'] ?>' ><i class="fa fa-trash"></i></a> 
                        </td>

                    </tr>

                    <?php } ?>
                    
                    
                    </tbody>
                    </table>
                        </div>
  
  </div>
  <script>
   $(document).ready(function() {
    var currentYear = (new Date()).getFullYear();
    var yearRange = (currentYear - 1) + ':' + (currentYear + 2);

    $("#TaskDueDate").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: yearRange
    });
});

function saveData()
    {
        var TaskTitle        = $("#TaskTitle").val();
        var TaskDescription        = $("#TaskDescription").val();
        var TaskDueDate        = $("#TaskDueDate").val();
        var text_id_pk      = $("#text_id_pk").val();   

        $.ajax({
              url:'<?php echo base_url('Masters/InsertTask');?>',
              type:'POST',
              data:{
                TaskTitle                   : TaskTitle, 
                TaskDescription                      : TaskDescription,
                TaskDueDate              : TaskDueDate, 
                text_id_pk : text_id_pk
              },
              success:function(response){
                alert(response); 

                window.location.reload();              
              },
              error: function(error) {
                alert("Failed to add task.");
              }
                        
        });

    }
    $(document).ready(function(){
           $('.dataTables-user').DataTable({
                pageLength: 10,
                responsive: true,
                scrollCollapse: true,
                autoWidth:         true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                   { extend: 'copy'},
        {extend: 'csv'},
        {extend: 'excel', title: 'Task List'},
        {extend: 'pdf', title: 'Task List'},
        {extend: 'print',
         customize: function (win){
         $(win.document.body).addClass('white-bg');
         $(win.document.body).css('font-size', '10px');
         $(win.document.body).find('table')
            .addClass('compact')
            .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

function closeModal() {
    $("#TaskModal").modal("hide");
    $("#TaskForm")[0].reset();
}
$(document).ready(function() {
    $(".completedCheckbox").on("change", function() {
        var taskId = $(this).data("task-id");
        var isChecked = $(this).prop("checked") ? 1 : 0;

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Masters/updateTaskCompletion'); ?>",
            data: { taskId: taskId, isChecked: isChecked },
            dataType: "json",
            success: function(response) {
                console.log(response); 
                
                alert('Updated Successfully.');
                location.reload();
            },

            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
});

    $(document).ready(function() {
        $(".editButton").on("click", function() {
            var taskId = $(this).data("task-id");
            console.log("test==="+taskId);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Masters/getTaskDetails'); ?>",
                data: { taskId: taskId },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    var originalDate = response.tt_TaskDueDate;

                    var parts = originalDate.split('-');
                    var year = parts[0];
                    var month = parts[1];
                    var day = parts[2];

                    var newDate = month + '/' + day + '/' + year;

                    $("#TaskDueDate").val(newDate);
                    $("#text_id_pk").val(response.tt_id_pk);
                    $("#TaskTitle").val(response.tt_TaskTitle);
                    $("#TaskDescription").val(response.tt_TaskDescription);

                    saveOrUpdateEmployee(taskId);
                    $("#TaskModal").modal("show");
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
      
    });
    $(document).ready(function() {
        $(".deleteRow").on("click", function() {
            var taskId = $(this).data("task-id");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Masters/DeleteTaskDetails'); ?>",
                data: { taskId: taskId },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    alert(response);
                    location.reload();

                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
      
    });
    function saveOrUpdateEmployee(employeeId) {
    if (employeeId) {
        $("#submitButton").text("Update");
    } else {
    
    }
}
function filterByDate() {
    var startDate = new Date(document.getElementById('startDate').value);
    var endDate = new Date(document.getElementById('endDate').value);

    $(".table tbody tr").each(function() {
        var taskDueDate = new Date($(this).find('td:eq(3)').text().trim()); 

        if (taskDueDate >= startDate && taskDueDate <= endDate) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}


  
    </script>