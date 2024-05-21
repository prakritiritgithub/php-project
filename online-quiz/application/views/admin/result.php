<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/include/header');
$this->load->view('admin/include/left-bar');
?>
<!-- header part -->

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2> Quiz Answer </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <!--  Quiz List -->
                            </h2>
                           
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                           
                                            <th>User Name</th>
                                            <th>Quiz Name</th>
                                            <th>Number of Question</th>
                                            <th>Number of Question Attempted</th>
                                            <th>Number of Correct Answer</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            
                                            <th>User Name</th>
                                            <th>Quiz Name</th>
                                            <th>Number of Question</th>
                                            <th>Number of Question Attempted</th>
                                            <th>Number of Correct Answer</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            if(count($res) > 0) {
                                                foreach ($res as $result) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo ucfirst($result->full_name); ?></td>
                                                        <td><?php echo $result->quiz_name; ?></td>
                                                        <td><?php echo $result->counter; ?></td>
                                                        <td><?php echo $result->question_id; ?></td>
                                                        <td><?php echo $result->is_correct; ?></td>
                                                       
                                                    </tr>
                                                <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
</section>

<!-- footer part -->
<?php $this->load->view('admin/include/footer'); ?>
<script>
    
    function delConfirm(curObj) {
        swal({
                title: "Are you sure to delete ?",
                text: "You will not be able to recover this question!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                var delID = $(curObj).attr('rel');
                var request = $.ajax({
                                      url: hostUrl + "admin/quest-del",
                                      type: "POST",
                                      data: {req_dept_id : delID}
                              });

                request.done(function(msg) {
                      //swal("Deleted!", "Department has been deleted.", "success");
                      swal({
                             title: "Deleted!",
                             text: "Question has been deleted.",
                             type: "success",
                             showCancelButton: false,
                             confirmButtonText: "OK",
                             closeOnConfirm: false
                          }, function () {
                                window.location = hostUrl + "admin/manage-quiz-question";
                      });
                });      

                request.fail(function(jqXHR, textStatus) {
                    alert( "Delete request failed." );
                });    
       });
    }
</script>