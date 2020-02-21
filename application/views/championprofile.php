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
    <title>Intern Masters | Champion Profile</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/mdb.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/richtext.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
    <script src="https://cdn.tiny.cloud/1/vfkm1817ctt8hvp2dlpn851yy6r7lx118hy4y4c6pgz06oya/tinymce/5/tinymce.min.js"></script>   
</head>

<body class="container">
   
<section>
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container-fluid">
        <a class="navbar-brand pt-0 waves-effect im_logo" href="<?php echo base_url() ?>championdashboard">
            <img src="http://localhost/internmasters//images/u1.png" alt="MDB logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

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
                   <a class="dropdown-item" href="<?php echo base_url(); ?>championdashboard">Dashboard</a>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>/controller/logout">Logout</a>
                   </div>
                  
               </li>
                 
               </ul>

        </div>

    </div>
</nav>
</section>

    <div class="fixd_f z-depth-2">
        <div class="success_f">
            <p class="sucs_t">
                hey there
            </p>
        </div>
    </div>

    <?php
   foreach($championprofile->result() as $row)
   {
        $banner_image = $row->c_banner;
        if(strlen($banner_image) == 0)
        {
            $banner_image = "default.png";
        }  

    ?>
    <!-- poster images and profile details -->
    <section class="top-layout-wrapper relative_po">
    
        <div class="banner-img">
            <img src="<?php echo base_url(); ?>/images/uploads/banner/champion/<?php echo $banner_image; ?>" alt="banner">
            <div class="editabl">
                <span><i class="fas fa-pencil-alt" data-toggle="modal" data-target="#modalbanner"></i></span>
            </div>
        </div>
        <div class="profile-img">
            <div class="upld_div">
            <a class="btn-floating btn-lg" data-toggle="modal" data-target="#modalRegisterForm"><i class="fas fa-cloud-upload-alt"></i></a> 
            </div>
            <img src="<?php echo base_url(); ?>/images/uploads/champion/<?php echo $row->c_profile_picture ?>" alt="profile">
          
        </div>


        <div class="banner-logo-img">
            <img src="<?php echo base_url(); ?>/images/intern-masters-01.png" alt="profile">
        </div>
       
        <div class="pro-profile-info">
        <div id="profile_ed" class="edit_but" data-toggle="modal" data-target="#basicExampleModal">
             <img src="<?php echo base_url(); ?>/images/editIcon.svg">
         </div>
            <div class="empty-div"></div>
            <div class="first-div">
                <p class="profile-name"><?Php echo $row->c_firstname; ?> <?Php echo $row->c_lastname; ?></p>
                <p class="profile-desig"><?Php echo $row->c_position; ?> </p>
                <div class="detail">
                    <span class="wrap"><span>Email: </span><span> <?Php echo $row->c_email; ?> </span></span>
                    <span class="wrap"><span>Phone: </span><span> <?Php echo $row->c_phone; ?> </span></span>
                    <span class="wrap"><span>Location: </span><span> <?Php echo $row->c_address; ?> </span></span>
                </div>
            </div>
            <div class="pro-second-div">
                <div><img src="<?php echo base_url(); ?>/images/gold-star.svg" alt="star"><span class="gold-text">Program Champion</span></div>
                <div><img src="<?php echo base_url(); ?>/images/green-tick.svg" alt="approved"><span class="">Mentorship Availability</span>
                </div>
            </div>
            <div class="pro-third-div">
                <div><img src="<?php echo base_url(); ?>/images/flag.svg" alt="completed"><span class="">Intern Contact Flag</span></div>
                <div><img src="<?php echo base_url(); ?>/images/calen.svg" alt="calendar"><span class="">Schedule Availability</span></div>
            </div>
        </div>
    </section>


<section>
<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Choose your profile</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form class="md-form" action="<?php echo base_url() ?>/controller/updatechampic" method="POST" enctype="multipart/form-data">
            <input type="file" id="profile_chmp" name ="profile_chmp">
            <input type="submit" class="btn btn-default btn-sm"  value="upload">
        </form>
    </div>
  </div>
</div>
</section>


<section>
<div class="modal fade" id="modalbanner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Choose your Banner Picture</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form class="md-form" action="<?php echo base_url() ?>/controller/updatechambanner" method="POST" enctype="multipart/form-data">
            <div class="col-lg-10">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="banner_champ" id="banner_champ"
                        aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="banner_champ">Choose file</label>
                    </div>
                </div>  
                <input type="submit" class="btn btn-primary btn-sm mt-4" value="upload"> 
                <p class="m-1" style="color:red;">Recommended size 1920*400</p>  
            </div>

        </form>
    </div>
  </div>
</div>
</section>





    <!-- About me section -->
    <section class="interns-man container">
        <div class="row">
            <div class="col-lg-12">

               <h4 class="p-1 m-1">About Me</h4>
                <div class="grey-background" id="abt_chmp">
                    <?Php echo $row->c_about;?>
                <div class="edit_chmpab">
                <button type="button" id="<?php echo $row->id; ?>" class="btn btn-primary btn-sm upd_abtchmp">Update</button>
                </div>
                </div>
               
                
            </div>
        </div>
    </section>
    <?php
   }
    ?>



<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit my Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <?php
                foreach($championprofile->result() as $row)
                {
            ?>
            <div class="form_int">
                 <form id="update_iu" method="POST" action="" enctype="multipart/form-data" >
                 <div class="row">
                    <div class="col-lg-6">
                        <div class="inp">
                            <p>
                                First Name
                            </p>
                            <p>
                                <input type="text" id="c_fname" value="<?php echo $row->c_firstname; ?>">
                                <input type="text" id="c_id" value="<?php echo $this->session->userdata('user_id') ?>" hidden>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inp">
                            <p>
                                Last Name
                            </p>
                            <p>
                                <input type="text" id="c_lname" value="<?php echo $row->c_lastname; ?>">
                            </p>
                        </div>
                    </div>
                   
                    <div class="col-lg-6">
                            <div class="inp">
                                <p>
                                    Phone
                                </p>
                                <p>
                                    <input type="text" id="c_phone" value="<?php echo $row->c_phone; ?>">
                                </p>
                            </div>
                            <div class="inp">
                            <p>
                                Address
                            </p>
                            <p>
                                <input type="text" id="c_address" value="<?php echo $row->c_address; ?>" >
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inp">
                            <p>
                                position
                            </p>
                            <p>
                                <input type="text" id="c_position" value="<?php echo $row->c_position; ?>">
                            </p>
                        </div>
                    </div>
                 
                 </div>  
                         
                 
               
                 </div>  
                        
                 </form>   
            </div>
            <h4 class="text-left">
                About Me
            </h4>
            <div class="txt_f">
            <textarea  rows="8" id="c_abt" cols="50"><?php echo $row->c_about ?></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="ms-inter-btn ms-pt-5 ms-pb-5 waves-effect c_profileupd">Save changes</button>
            </div>
            <?php
                }
            ?>
      </div>
    </div>
  </div>
</div>

<section class="interns-man container">
        <div class="row">
            <div class="col-lg-12">
                <p class="section-heading">Intern Direct Reports</p>
                <div class="row">
                    <?php      
                        foreach($championintern->result() as $row)
                        {
                    ?>
                    <div class="col-lg-3 pb-4">
                        <div class="card">
                            <div class="card-img">
                                <img src="<?php echo base_url(); ?>/images/uploads/intern/<?php echo $row->profile_picture ?>" alt="intern">
                            </div>
                            <div class="card-desc">
                                <p class="name"><?php echo $row->firstname ?> <?php echo $row->lastname ?></p>
                                <p class="desc"><?php echo $row->intern_area ?></p>
                                <ul class="card-stats">
                                    <li><img src="<?php echo base_url(); ?>/images/cog-sm.svg" alt=""><span>3</span></li>
                                    <li><img src="<?php echo base_url(); ?>/images/users.svg" alt=""><span>7</span></li>
                                    <li><img src="<?php echo base_url(); ?>/images/star-sm.svg" alt=""><span>4</span></li>
                                    <li><img src="<?php echo base_url(); ?>/images/message-sm.svg" alt=""><span>4</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
</section>


<section class="interns-man container">
        <div class="row">
            <div class="col-lg-12">
                <p class="section-heading">Intern Direct Report Feedback</p>
            </div>
            <div class="col-lg-12">
                <div class="slider-heigh-con">
                    <div class="testimonials-slider">
                        <?php
                             foreach($intern_feedback->result() as $row)
                             {
                        ?>
                        <div class="slider">
                            <div class="slider-img"><img class="responsive" src="<?php echo base_url(); ?>/images/uploads/intern/<?php echo $row->profile_picture ?>" alt=""></div>
                            <div class="comment">
                                <p><span><?php echo $row->firstname ?> <?php echo $row->lastname ?> (<?php echo $row->ifeed_date ?>)</span>: <?php echo $row->intern_feedback ?>
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
</section>

<section class="interns-man container">
        <div class="row">
            <div class="col-lg-12">
                <div class="edit_btn"  data-toggle="modal" data-target="#basicExampleModal1"><img src="<?php echo base_url(); ?>/images/editIcon.svg"></div>
                <p class="section-heading">Personality Profile</p>
            </div>
            <div class="container">
                <div class="row personal-profile">

            <?php
            foreach($championperprof->result() as $row)
            {
            ?>
                    <div class="col-lg-4">
                        <div class="three-card">
                            <span class="head"><?php echo $row->personality_title ?></span>
                            <span><?php echo $row->personality_exp ?></span>
                          
                        </div>
                    </div>
            <?php
            }
            ?>
                </div>
            </div>
        </div>
</section>


  
<section class="interns-man container">
    <div class="row">
        <div class="col-lg-12">
            
            <p class="section-heading">Education</p>
        </div>
        <div class="container">
            <div class="row personal-profile">

            <?php
            foreach($championeducation->result() as $row)
            {
                ?>
                <div class="col-lg-4">
                    <div class="three-card">
                        <span class="head"><?php echo $row->course ?></span>
                        <span><?Php echo $row->university ?> </span>
                        
                    </div>
                </div>

            <?php
            }
            ?>
            
            </div>
        </div>
    </div>
</section>
  


<section class="interns-man container">
    <div class="row">
        <div class="col-lg-12">
          
            <p class="section-heading">Functional Experience</p>
        </div>
        <div class="container">
            <div class="row personal-profile">

        <?php
                foreach($championfuncexp->result() as $row)
                {
        ?>
                <div class="col-lg-4">
                    <div class="three-card">
                        <span class="head"><?php echo $row->functional_title ?></span>
                        <span><?Php echo $row->functional_exp ?> </span>
                    </div>
                </div>
        <?php
                }
        ?>

            </div>
        </div>
    </div>
</section>



<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="basicExampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit personality profile Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span id="cls_upd" aria-hidden="true">&times;</span>
        </button>
        <div class="succfield">
        
            <div class="insucs">
           
            </div>
        </div>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="p-1">
                    Edit personality Profile
                    </h4>
                </div>
                <div class="col-lg-6">
                    <div class="absl_per waves-effect z-depth-1">
                    <a href=""  data-toggle="modal" data-target="#modalPersonality">
                    <p class="add_p">
                        <span><i class="fas fa-plus-circle"></i></span> Add a Personality Profile
                        </p>
                    </a>
                       
                    </div>
                </div>
            </div>
           
         
            <div class="row">

                <?php   
                    foreach($championperprof->result() as $row)
                    {
                ?>
                
                 <div class="col-lg-4">
                    <div class="inp">
                        <p class="m-0">
                            <p>Title</p> 
                             <input class="w-auto" id="p_title_<?php echo $row->cp_id; ?>"  type="text" value="<?php echo $row->personality_title; ?>">
                        </p>
                        <div class="txt_ar">
                            <p class="m-0">
                                Brief <textarea rows="3" id="p_exp_<?php echo $row->cp_id; ?>" cols="20"><?php echo $row->personality_exp; ?></textarea>
                            </p>
                        </div>
                        <button type="button" id="<?php echo $row->cp_id; ?>" class="btn btn-default btn-sm upd_prp">Update</button>
                        <button type="button" id="<?php echo $row->cp_id; ?>" class="btn btn-danger btn-sm dlt_prp">Delete</button>
                        
                    </div>
                 </div>
                 <?php
                    }
                 ?>
                  
            </div>
            <div class="modal-footer p-1 mt-2">
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="p-1">
                    Edit Education Profile
                    </h4>
                </div>
                <div class="col-lg-6">
                    <div class="absl_per waves-effect z-depth-1">
                    <a href=""  data-toggle="modal" data-target="#modaleducation">
                    <p class="add_p">
                        <span><i class="fas fa-plus-circle"></i></span> Add a Educational Profile
                        </p>
                    </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                 
                    foreach($championeducation->result() as $row)
                    {
                   
                ?>
                 <div class="col-lg-4">
                    <div class="inp">
                        <p class="m-0">
                            <p>Course</p> 
                             <input class="w-auto" type="text" id="upd_course_<?php echo $row->cedu_id ?>" value="<?php echo $row->course; ?>">
                        </p>
                        <div class="txt_ar">
                            <p class="m-0">
                                University <textarea rows="3" id="upd_univ_<?php echo $row->cedu_id  ?>" cols="20"><?php echo $row->university; ?></textarea>
                            </p>
                        </div>
                        <button type="button" id="<?php echo $row->cedu_id ?>" class="btn btn-default btn-sm edit_edu">Update</button>
                        <button type="button" id="<?php echo $row->cedu_id ?>" class="btn btn-danger btn-sm dlt_edu">Delete</button>
                        
                    </div>
                 </div>
                 <?php
                    }
                 ?>  
            </div>

            <div class="modal-footer p-1 mt-2">
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="p-1">
                    Edit Functional Experience Profile
                    </h4>
                </div>
                <div class="col-lg-6">
                    <div class="absl_per waves-effect z-depth-1">
                        <a href=""  data-toggle="modal" data-target="#modalfunctional">
                        <p class="add_p">
                            <span><i class="fas fa-plus-circle"></i></span> Add a Functional Profile
                            </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                 
                    foreach($championfuncexp->result() as $row)
                    {
                   
                ?>
                 <div class="col-lg-4">
                    <div class="inp">
                        <p class="m-0">
                            <p>Title</p> 
                             <input class="w-auto" type="text" id="ftitle_<?php echo $row->cfunction_id ?>" value="<?php echo $row->functional_title; ?>">
                        </p>
                        <div class="txt_ar">
                            <p class="m-0">
                                Experience <textarea rows="3" id="fexp_<?php echo $row->cfunction_id ?>" cols="20"><?php echo $row->functional_exp; ?></textarea>
                            </p>
                        </div>
                        <button type="button" id="<?php echo $row->cfunction_id ?>" class="btn btn-default btn-sm edit_fun">Update</button>
                        <button type="button" id="<?php echo $row->cfunction_id ?>" class="btn btn-danger btn-sm dlt_funcexp">Delete</button>
                        
                    </div>
                 </div>
                 <?php
                    }
                 ?>  
            </div>


           
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<section class="admdl">

    <!--Modal: modalPush For add personality profle-->
    <div class="modal fade" id="modalPersonality" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content text-center">
        <!--Header-->
        <div class="modal-header d-flex justify-content-center">
            <p class="heading">Add Personality Profile</p>
        </div>

        <!--Body-->
        <div class="modal-body">
            <div class="md-form">
                <input type="text"  id="form1" class="form-control per_expt">
                <label for="form1">Title</label>
            </div>
            <div class="form-group shadow-textarea">
                <label for="exampleFormControlTextarea6">Add a Experience</label>
                <textarea class="form-control z-depth-1 per_expe" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
            </div>
        

        </div>

        <!--Footer-->
        <div class="modal-footer flex-center">
            <button class="btn btn-info add_personality"> Add </button>
        </div>
        </div>
        <!--/.Content-->
    </div>
    </div>
    <!--Modal: modalPush-->
</section>

<section class="admd2">
    <!--Modal: modalPush For add educational profle-->
    <div class="modal fade" id="modaleducation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content text-center">
        <!--Header-->
        <div class="modal-header d-flex justify-content-center">
            <p class="heading">Add Educational Profile</p>
        </div>

        <!--Body-->
        <div class="modal-body">
            <div class="md-form">
                <input type="text"  id="form1" class="form-control edu_cource">
                <label for="form1">Course</label>
            </div>
            <div class="md-form">
                <textarea id="form7" class="md-textarea form-control edu_clg" rows="3"></textarea>
                <label for="form7">Add a college</label>
            </div>
        

        </div>

        <!--Footer-->
        <div class="modal-footer flex-center">
            <button class="btn btn-info add_education"> Add </button>
        </div>
        </div>
        <!--/.Content-->
    </div>
    </div>
    <!--Modal: modalPush-->
</section>

<section class="admd3">
      <!--Modal: modalPush For add Functional profle-->
      <div class="modal fade" id="modalfunctional" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content text-center">
        <!--Header-->
        <div class="modal-header d-flex justify-content-center">
            <p class="heading">Add Functional Profile</p>
        </div>

        <!--Body-->
        <div class="modal-body">
            <div class="md-form">
                <input type="text"  id="form1" class="form-control func_title">
                <label for="form1">Title</label>
            </div>
            <div class="md-form">
                <textarea id="form7" class="md-textarea form-control func_exp" rows="3"></textarea>
                <label for="form7">Functional Experience</label>
            </div>
        

        </div>

        <!--Footer-->
        <div class="modal-footer flex-center">
            <button class="btn btn-info add_func"> Add </button>
        </div>
        </div>
        <!--/.Content-->
    </div>
    </div>
    <!--Modal: modalPush-->
</section>


<section class="interns-man container">
    <div class="row">
        <div class="col-lg-12">
           
            <p class="section-heading">Media & Publications</p>
        </div>
        <div class="container">
            <div class="personal-profile">
                    
    <?php 
    foreach($champion_socialmedia->result() as $row)
    {
    ?>
            <div class="personal-profile1">
                    <div class="three-card-img-post">             
                        <?php
                            echo $row->media_src;
                        ?>
                    </div>
            </div>

    <?php
    }
    ?>      
            </div>
        </div>
    </div>
</section>
<section class="interns-man container youtube_blg">
    <div id="yuedit_but" class="edit_but">
    <img src="<?php echo base_url(); ?>/images/editIcon.svg">
    </div>
    <div class="row">
        <div class="container">
            <div class="row personal-profile">

            <?php
                    foreach($champion_youtubeblog->result() as $row)
                    {
            ?>
                <div class="col-lg-4 mt-2">
                    <div class="three-card-img video_div z-depth-1">
                    <iframe width="" height="190" src="<?php echo $row->youtube_src ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="edit_controlsy">
                            <button type="button" id="<?php echo $row->id ?>" class="btn btn-primary btn-sm edit_vidchmp" data-toggle="modal" data-target="#modalSocial_<?php echo $row->id ?>">Edit Video</button>
                            <button type="button" id="<?php echo $row->id ?>" class="btn btn-danger btn-sm dlt_chmpy">Delete Video</button>
                        </div>
                        
                    </div>
                </div>
<!-- Model popup Youtube video -->
    <!--Modal: modalSocial-->
    <div class="modal fade" id="modalSocial_<?php echo $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">

        <!--Content--> 
        <div class="modal-content">

        <!--Header-->
        <div class="modal-header light-blue darken-3 white-text">
            <h4 class="title"> Edit Video!</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        </div>

        <!--Body-->
        <div class="modal-body mb-0 text-center">


        <div class="md-form">
            <input type="text" value="<?php echo $row->youtube_src ?>" id="vid_src_<?php echo $row->id ?>" class="form-control">
            <label for="vid_src">Youtube Link</label>
        </div>
            <input type="text" class="usr_id" id="<?php echo $this->session->userdata('user_id'); ?>" hidden>
        <button id="<?php echo $row->id ?>" class="btn aqua-gradient upld_chmv">upload Video</button>
        </div>

        </div>
        <!--/.Content-->

    </div>
    </div>
    <!--Modal: modalSocial-->
<!--end of model -->
            <?php
                    }
            ?>
                <div class="edit_controlsy">
                <button type="button" id="<?php echo $row->id ?>" class="btn btn-primary btn-sm edit_vidchmp" data-toggle="modal" data-target="#modalSocial">Add Video</button>

                </div>

            </div>
        </div>
    </div>
</section>

<!--Modal: modalSocial-->
<div class="modal fade" id="modalSocial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">

    <!--Content--> 
    <div class="modal-content">

      <!--Header-->
      <div class="modal-header light-blue darken-3 white-text">
        <h4 class="title"> Add a New Video!</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>

      <!--Body-->
      <div class="modal-body mb-0 text-center">

      <input type="text" class="usr_id" id="<?php echo $this->session->userdata('user_id'); ?>" hidden>
      <div class="md-form">
        <input type="text" id="vid_srchmy" class="form-control">
        <label for="vid_srchmy">Youtube Link</label>
      </div>

      <button id="add_chmpy" class="btn aqua-gradient">upload Video</button>
      </div>

    </div>
    <!--/.Content-->

  </div>
</div>
<!--Modal: modalSocial-->




    <script src="<?php echo base_url(); ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>/js/mdb.js"></script>
    <script src="<?php echo base_url(); ?>/js/jquery.bxslider.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/jquery.richtext.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"> </script>
    <script src="<?php echo base_url(); ?>/js/script.js"></script>
    <script src="<?php echo base_url(); ?>/js/custom.js"></script>
  
    <script>
      $(document).ready(function() {
            $('#c_abt').richText();
        });
        $('.toast').toast('show');
        

    </script>
</body>


</html>