
<?php

if(!($this->session->userdata('user_id'))){
    $this->load->helper('url');
    redirect( base_url() );  
  }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="=UTF-8">
    <title>Intern Masters | Champion Management</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/mdb.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/richtext.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
</head>

<body>
<section>
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand pt-0 waves-effect im_logo" href="#">
            <img src="http://internmastershosting.com/images/u1.png" alt="MDB logo">
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left -->
            <ul class="navbar-nav m-auto">
                <li class="nav-item pr-1">
                    <a class="nav-link waves-effect" href="<?php echo base_url() ?>sponsorcommunity">Sponsor Community
                    </a>
                </li>
                <li class="nav-item dropdown pr-1">
                    <a class="nav-link waves-effect" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Best Practice </a>
                </li>
                <li class="nav-item pr-1">
                    <a class="nav-link waves-effect" href="#" target="">Mentors</a>
                </li>
                <li class="nav-item pr-1">
                    <a class="nav-link waves-effect" href="#" target="">Growth Experiences</a>
                </li>
                <li class="nav-item pr-1">
                    <a class="nav-link waves-effect" href="<?php echo base_url() ?>projectpipeline" target="">Project Pipeline</a>
                </li>
                <li class="nav-item pr-1">
                    <a class="nav-link waves-effect" href="#" target="">Networking BluePrint</a>
                </li>
            </ul>

            <ul class="navbar-nav nav-flex-icons">
               
               <li class="nav-item avatar dropdown">
                   <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                   <i class="fas fa-bars"></i>
                   </a>
                   <div class="dropdown-menu dropdown-menu-lg-right dropdown-primary"
                   aria-labelledby="navbarDropdownMenuLink-55">
                   <a class="dropdown-item" href="<?php echo base_url(); ?>championprofile">My Account</a>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>/controller/logout">Logout</a>
                   </div>
                  
               </li>
                 
               </ul>

        </div>

    </div>
</nav>
</section>
<?php
    foreach($project_details->result() as $row)
    {    
?>
<section class="mt-5">
  <div class="container">
      <div class="row margin_top5">
        <div class="col-lg-8">
            <div class="crd_inr z-depth-1 p-3">
                <div class="headr_prjct">
                    <h4><?php echo $row->project_title ?></h4>
                    <p><?php echo $row->project_description ?></p>
                </div>
                <div class="bdy_prjct">
                    <h5>Project Function</h5>
                    <p class="tag_fnc">
                        <?php echo $row->project_function ?>
                    </p>
                    <h5>Project Goals</h5>
                    <p>
                    <span><i class="fas fa-check-square"></i></span> <?php echo $row->project_goals ?>
                    </p>
                    <h5>Project Performance Management Expectations</h5>
                    <p>
                    <span><i class="fas fa-check-square"></i></span>  <?php echo $row->project_performance_expectation ?>
                    </p>
                    <h5>Project Location</h5>
                    <p>
                    <span><i class="fas fa-check-square"></i></span>
                    <?php echo $row->project_location ?>
                    </p>
                    <h5>Project Duration</h5>
                    <p>
                    <span><i class="fas fa-check-square"></i></span>
                    <?php echo $row->project_duration ?>
                    </p>
                    <h5>Percentage of time allocated</h5>
                    <p>
                    <span><i class="fas fa-check-square"></i></span>
                    <?php echo $row->project_time_allocated ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="spns_prjc z-depth-1 p-2">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="spnsr_img w-75">
                            <img class="responsive" src="<?php echo base_url() ?>/images/uploads/sponsor/<?php echo $row->s_profile_picture ?>" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="spnsr_dt">
                        <h5>Sponsor Details</h5>
                        <p> <?php echo $row->s_firstname ?>  <?php echo $row->s_lastname ?></p>
                        </div>
                 
                    </div>
                </div>
            </div>
            <div class="spns_prjc z-depth-1 p-2 mt-2">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="spnsr_img w-75">
                            <img class="responsive" src="<?php echo base_url() ?>/images/uploads/intern/<?php echo $row->profile_picture ?>" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="spnsr_dt">
                        <h5>Intern Details</h5>
                        <p> <?php echo $row->firstname ?> <?php echo $row->lastname ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="spns_prjc z-depth-1 p-2 mt-2">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="spnsr_dt text-center">
                        <h5>Download Project Attachment</h5>
                            <a class="prjct_atchm" href="<?php echo base_url() ?>/images/uploads/project/<?php echo $row->project_attachments ?>" download>Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </div>
</section>

<section>
    <div class="container apr m-auto text-center">
    <input type="text" id="sponsor_assgnpr"  value="<?php echo $row->sponsor_id ?>" hidden>
    <input type="text" id="intern_assgnpr" value="<?php echo $row->id ?>" hidden>
    <button id="<?php echo $row->project_id ?>" type="button" class="prjct_atchmnt appr_prj">Approve</button>
        <div class="spinner-border text-info ajaxcl" role="status">
        <span class="sr-only">Loading...</span>
        </div>
    <button type="button" class="btn btn-danger waves-light btn-sm" data-toggle="modal" data-target="#rejectionmodal">Reject</button>
    </div>
</section>

<div class="modal fade" id="rejectionmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reason for Rejection</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <textarea  rows="6" id="reason_rej" cols="50"></textarea>
      </div>
      <div class="modal-footer">
      <button type="button" id="<?php echo $row->project_id ?>" class="btn btn-danger waves-light btn-sm waves-effect waves-light reject_project">Reject</button>
      </div>
    </div>
  </div>
</div>

<?php
    }
?>


<script src="<?php echo base_url(); ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/mdb.js"></script>
    <script src="<?php echo base_url(); ?>/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>/js/jquery.richtext.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"> </script>
    <script src="<?php echo base_url(); ?>/js/script.js"></script>
    <script src="<?php echo base_url(); ?>/js/custom.js"></script>
    <script>
        $(document).ready(function() {
            $('#reason_rej').richText();
        });
         $('.toast').toast('show');
         
    </script>
    
</body>

</html>