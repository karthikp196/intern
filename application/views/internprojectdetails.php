<?php

if(!($this->session->userdata('intern_id'))){
    $this->load->helper('url');
    redirect( base_url()."internlogin" );  
  }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="=UTF-8">
    <title>Intern Masters | Intern Profile | 
                 <?php
                    foreach($internprofile->result() as $row)
                    { echo $row->firstname; }
                ?>
                </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/mdb.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/richtext.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<section class="">
    <div class="container-fluid">
        <div class="row">
           <?php
              foreach ($project_detail->result() as $row)
              {
           ?>
            <div class="col-lg-1 p-0 bg_b">
                <div class="fxd_project">
                    <div class="icn_1 pop_funct" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">
                    <i class="fas fa-network-wired"></i>
                        <span>Funct</span>
                        <div class="func_popovr z-depth-1 area_func">
                            <div class="func_titp brdrbtm">
                            <h5 >Function</h5>
                            </div>
                            <div class="func_areap">
                                <p class="m-0">
                                <?php echo $row->project_function ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="icn_1 pop_desc">
                        <i class="fab fa-modx"></i>
                        <span>Descr</span>
                        <div class="func_popovr z-depth-1 desc_func">
                            <div class="func_titp brdrbtm">
                            <h5 >Description</h5>
                            </div>
                            <div class="func_areap">
                                <p class="m-0">
                                <?php echo $row->project_description ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="icn_1 pop_task">
                        <i class="fas fa-tasks"></i>
                        <span>Tasks</span>
                        <div class="func_popovr z-depth-1 pop_func">
                            <div class="func_titp brdrbtm">
                            <h5 >Managment Expectations</h5>
                            </div>
                            <div class="func_areap">
                                <p class="m-0">
                                <?php echo $row->project_performance_expectation ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="icn_1 pop_goal">
                         <i class="fab fa-centercode"></i>
                        <span>Goals</span>
                        <div class="func_popovr z-depth-1 goal_func">
                            <div class="func_titp brdrbtm">
                            <h5 >Project Goals</h5>
                            </div>
                            <div class="func_areap">
                                <p class="m-0">
                                <?php echo $row->project_goals ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="icn_1 pop_time">
                    <i class="fas fa-business-time"></i>
                        <span>Time</span>
                        <div class="func_popovr z-depth-1 time_func">
                            <div class="func_titp brdrbtm">
                            <h5 >Time Allocated</h5>
                            </div>
                            <div class="func_areap">
                                <p class="m-0">
                                <?php echo $row->project_time_allocated ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="icn_1 attach_p">
                    <a href="<?php echo base_url() ?>/images/uploads/project/<?Php echo $row->project_attachments ?>" download>
                         <i class="fas fa-paperclip"></i>
                        <span>Attach</span>
                    </a>
                    </div>
                </div>
            </div>


            <div class="col-lg-9 mycol">
                <div class="titl_int pt-2">
                <h3>Intern Masters</h3>
                </div>
                <div class="process_task pt-3">
                    <h5>
                       <?php echo $row->project_title ?>
                    </h5>
                  

                    <div class="row mt-5 brdrbtm">
                        <div class="col-lg-4">
                            <p>Tasks</p>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-right ml-auto">
                             <button class="add_task" data-toggle="modal" data-target="#fullHeightModalTop">New Task</button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-right ml-auto">
                            <?php 
                                if($row->project_status == 0)
                                {
                            ?>
                                     <button id=<?php echo $row->assign_prid ?> class="add_task markproject"> Mark This project As completed</button>
                            <?php
                                }
                                else
                                {
                                ?>
                                <div class="pndng z-depth-2">
                                        <i class="fas fa-pause"></i> Waiting for approval
                                </div>
                                    <?php
                                }
                            ?>

                            
                            </div>
                        </div>
                    <!-- Full Height Modal Right -->
                    <div class="modal fade top" id="fullHeightModalTop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">

                    <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
                    <div class="modal-dialog modal-full-height modal-top" role="document">


                        <div class="modal-content">
                        <div class="modal-header">
                            <h class="modal-title w-100" id="myModalLabel">Add a New Task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="md-form">
                                <input type="text" id="form1"  class="form-control update_name">
                                <label for="form1">Add a New Task</label>
                            </div>
                            <input type="text" class="prj_dtl" value="<?php echo $row->project_id ?>" hidden>
                            <input type="text" class="spn_dtl" value="<?php echo $row->sponsor_id ?>" hidden>
                            <input type="text" class="int_dtl" value="<?php echo $row->id ?>" hidden>
                            <input type="text" class="p_assign" value="<?php echo $row->assign_prid ?>" hidden>
                            <button type="button" class="btn btn-default btn-sm add_prupd">Add</button>
                        </div>
                        <div class="modal-footer justify-content-center">
                           
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- Full Height Modal Right -->
                    </div>
                    <?php
                      }
                     ?>
                    <div class="project">
                    <!-- Table with panel -->
                        <div class="card card-cascade narrower">
                        <div class="px-4">

                        <div class="table-wrapper">
                            <!--Table-->
                            <table class="table table mb-0">

                            <!--Table head-->
                            <thead>
                                <tr>
                                
                                <th class="th-lg">
                                    Task Name
                                 
                                </th>
                                <th class="th-lg">
                                   Status
                                   
                                </th>
                                <th class="th-lg">
                                <i class="fas fa-bell"></i>
                                 Date   
                                </th>
                                </tr>
                            </thead>
                            <!--Table head-->

                            <!--Table body-->
                            <tbody>
                                <?php 
                                    foreach($project_updates->result() as $row)
                                    {
                                ?>
                                <tr>
                                    
                                    <td>
                                    <div class="tsknm p-2" data-toggle="modal" data-target="#fullHeightModalRight_<?php echo $row->p_update_id; ?>">
                                    <?php echo $row->task_name ?>
                                    </div> 
                                    </td>
                                    <td>
                                        <div class="prjct_s pt-2">
                                            New
                                        </div>       
                                    </td>
                                    <td>
                                        <?php  echo DateTime::createFromFormat("Y-m-d H:i:s", $row->task_created_at)->format("d/m/Y"); ?>
                                    </td>   
                                    <td>
                                        <span id="<?php echo $row->p_update_id ?>" class="dlt dlt_ic"> <i class="fas fa-trash-alt"></i> </span> 
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url() ?>/controller/projecttasks/<?php echo $row->project_assign_id ?>/<?php  echo $row->p_update_id ?>"><span class="view_upd"><i class="fas fa-eye"></i></span></a>
                                    </td>
                                </tr>

                                        
                        <!-- Full Height Modal Right -->
                        <div class="modal fade right" id="fullHeightModalRight_<?php echo $row->p_update_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">

                        <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
                        <div class="modal-dialog modal-full-height modal-right" role="document">


                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title w-100" id="myModalLabel"><?php echo $row->task_name ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <div class="md-form">
                            <textarea id="task_update_<?Php echo $row->p_update_id; ?>" class="md-textarea form-control form-8" rows="3"></textarea>
                            <label for="form-8">Write an Update</label>
                           
                            </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                            <button type="button" id="<?php echo $row->p_update_id; ?>" class="btn btn-default btn-sm upd_task">Update</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- Full Height Modal Right -->

                                <?php
                                    }
                                ?>
                            </tbody>
                            <!--Table body-->
                            </table>
                            <!--Table-->
                        </div>

                        </div>

                        </div>
                        <!-- Table with panel -->
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="<?php echo base_url(); ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url(); ?>/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>/js/mdb.js"></script>
<script src="<?php echo base_url(); ?>/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>/js/jquery.richtext.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"> </script>
<script src="<?php echo base_url(); ?>/js/script.js"></script>
<script src="<?php echo base_url(); ?>/js/jquery.bxslider.min.js"></script>
<script>
     $(document).ready(function() {
            $('#iu_abt').richText();
        });

        $('.toast').toast('show');
        $(function () {
        $('.example-popover').popover({
        container: 'body'
        })
        });

</script>


</body>
</html>