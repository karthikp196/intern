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

<body class="projectbody">

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


            <div class="col-lg-11 mycol">
                <div class="titl_int pt-2">
                <h3>Intern Masters</h3>
                </div>
                <div class="process_task pt-3">
                    <h5>
                       <?php echo $row->project_title ?>
                    </h5>
                  

                    <div class="row mt-5 brdrbtm">
                     
                        
                    </div>
                    <?php
                      }
                     ?>

                      
                    <div class="project">
                      <?php
                            foreach($prupd->result() as $row2)
                            {
                        ?>
                          <h5> <?php  echo $row2->task_name; ?></h5> 

                       <?php
                            }
                        ?>

                       
                        <div class="row">
                        <?php
                            foreach($projecttask->result() as $row1)
                            {
                        ?>
                            <div class="col-lg-3">
                                <div class="p-1 task_show m-1">
                                    <div class="menu_abs p-1">
                                        <span id="<?php echo $row1->task_id ?>" class="dlt_upd"><i class="fas fa-ellipsis-h"></i></span>
                                    </div>
                                    <div id="menu_dlt_<?php echo $row1->task_id ?>" class="menud waves-effect">
                                            <p id="<?php echo $row1->task_id ?>" class="m-1 dltid ">Delete</p>
                                        </div>
                                    <p class="m-1 task_dt p-1">
                                         <?php echo $row1->task_updates ?>
                                    </p>
                                    <p class="m-1 date_ic">
                                    <i class="fas fa-calendar-alt"></i>  <?php echo DateTime::createFromFormat("Y-m-d H:i:s", $row1->taskupdate_created_at)->format("d/m/Y"); ?>
                                    </p>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
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