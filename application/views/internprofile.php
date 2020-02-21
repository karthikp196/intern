
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
<section>
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand pt-0 waves-effect im_logo" href="#">
            <img src="http://localhost/internmasters//images/u1.png" alt="MDB logo">
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
                    <a class="nav-link waves-effect" href="<?php echo base_url(); ?>/controller/sponsorcommunity">Sponsor Community
                    </a>
                </li>
                <li class="nav-item dropdown pr-1">
                    <a class="nav-link waves-effect" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Best Practice </a>
                </li>
                <li class="nav-item pr-1">
                    <a class="nav-link waves-effect" href="#" target="">Mentors</a>
                </li>
                <li class="nav-item pr-1">
                    <a class="nav-link waves-effect" href="<?php echo base_url() ?>addgrowthexperience" target="">Growth Experiences</a>
                </li>
                <li class="nav-item pr-1">
                    <a class="nav-link waves-effect" href="<?php echo base_url() ?>commonprojects" target="">Project Pipeline</a>
                </li>
                <li class="nav-item pr-1">
                    <a class="nav-link waves-effect" href="<?php echo base_url() ?>networkingblueprint" target="">Networking BluePrint</a>
                </li>
            </ul>

            <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item notify_li">
               <div class="img_notify">
                    <span><i class="fas fa-bell noticon"></i></span>
               </div>
                <section>
                    <div class="notification_push">
                        <div class="headnot">
                            <p class="m-1">Notifications</p>
                        </div>
                    </div>
                 </section>
            </li>
            <li class="nav-item avatar dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <?php
                    foreach($internprofile->result() as $row)
                    {
                ?>
                <img src="<?php echo base_url(); ?>/images/uploads/intern/<?php echo $row->profile_picture ?>" class="rounded-circle z-depth-0"
                    alt="avatar image">
                </a>
               
                <div class="dropdown-menu dropdown-menu-lg-right dropdown-primary"
                aria-labelledby="navbarDropdownMenuLink-55">
                <a class="dropdown-item" href="<?php echo base_url(); ?>/controller/internlogout">Logout (<?php echo $row->firstname; ?>)</a>
               
                </div>
                <?php
                    }
                ?>
            </li>
              
            </ul>

        </div>

    </div>
</nav>
</section>





<section>
    <div class="fix_f z-depth-1-half">
        <div class="succsf">
          <span class="succsf_t"><span>
        </div>
    </div>
</section>

    <?php
        foreach($internprofile->result() as $row)
        {
    ?>
    <!-- poster images and profile details -->
    <section class="top-layout-wrapper postn_r">
        <div id="edit_intern" class="edit_btn"  data-toggle="modal" data-target="#centralModalLg"><img src="<?php echo base_url(); ?>/images/editIcon.svg"></div>
        <div class="add_feedbck">
        <button class="ms-inter-btn ms-pt-5 ms-pb-5" data-toggle="modal" data-target="#modalPush">Add Feedback</button>
        </div>
        <div class="banner-img">
            <img src="<?php echo base_url(); ?>/images/Profile-banner.png" alt="banner">
        </div>
        <div class="profile-img"  data-toggle="modal" data-target="#profilepicm">
            <a class="btn-floating btn-primary prof_upld"><i class="fas fa-cloud-upload-alt"></i></a>
            <img class="prof_pc" src="<?php echo base_url(); ?>/images/uploads/intern/<?php echo $row->profile_picture ?>" alt="profile">
        </div>
        
        <div class="inval-profile-info">
            <div class="empty-div"></div>
            <div class="first-div">
                <p class="profile-name"><?php echo $row->firstname ?> <?php echo $row->lastname ?></p>
                <p class="profile-desig"><?php echo $row->intern_area ?></p>
                <div class="detail">
                    <span class="wrap"><span><img src="<?php echo base_url(); ?>/images/email-icon.svg" alt=""> </span><span>
                    <?php echo $row->email ?></span></span>
                    <span class="wrap"><span><img src="<?php echo base_url(); ?>/images/phone-icon.svg" alt=""> </span><span><?php echo $row->phone ?></span></span>
                    <span class="wrap"><span><img src="<?php echo base_url(); ?>/images/map-icon.svg" alt=""> </span><span><?php echo $row->address ?></span></span>
                </div>
            </div>
            <div class="inval-second-div">
                <div class="d-flex">
                    <div class="univ-icon"><img class="responsive" src="<?php echo base_url(); ?>/images/college-graduation.png"></div>
                    <span class="univer-text"><span><?php echo $row->college_name ?></span>
                </div>
            </div>
        </div>
    </section>  
    <!-- About me section -->
    <section class="interns-man container">
        <div class="row">
            <div class="col-lg-12">
               
                <h4>About Me</h4>
                <div class="grey-background">
                    <?php echo $row->about ?>
                </div>
            </div>
        </div>
    </section>

    <section>


<!-- Modal -->
<div class="modal fade" id="profilepicm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content trnsp">
    
      <div class="modal-body">
            <div class="bxrad">
                <img class="responsive" src="<?php echo base_url(); ?>/images/uploads/intern/<?php echo $row->profile_picture ?>" alt="">
            </div>
      </div>
    
    </div>
  </div>
</div>
    </section>

    <?php
        }
    ?>



<!-- Modal -->
<div class="modal fade" id="centralModalLg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog-scrollable modal-lg m-auto" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit About me</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="edit_div">
            
            <?php
                foreach($internprofile->result() as $row)
                {
             ?>
             
             <div class="form_int">
                 <form method="POST" action="<?php echo base_url() ?>/controller/updateinernpic" enctype="multipart/form-data">
                     <div class="p-1">
                         <h5>
                             Edit profile picture
                         </h5>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="w-50 m-1">
                                    <img src="<?php echo base_url() ?>/images/uploads/intern/<?php echo $row->profile_picture ?>" alt="" class="responsive">
                                </div>
                            </div>
                            <div class="col-lg-6">
                              
                                        <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="profile_internpic" id="profile_internpic"
                                        aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="profile_internpic">Choose file</label>
                                    </div>
                                    </div>  
                                    <input type="submit" class="btn btn-primary btn-sm" value="upload"> 
                                    <p class="m-1" style="color:red;">Max size 360*360</p>   
                               
                            </div>
                        </div>
                     </div>
                 </form>
                
                 <div class="row">
                    <div class="col-lg-6">
                        <div class="inp">
                            <p>
                                First Name
                            </p>
                            <p>
                                <input type="text" id="iu_fname" value="<?php echo $row->firstname; ?>">
                                <input type="text" id="iu_id" value="<?php echo $this->session->userdata('intern_id') ?>" hidden>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inp">
                            <p>
                                Last Name
                            </p>
                            <p>
                                <input type="text" id="iu_lname" value="<?php echo $row->lastname; ?>">
                            </p>
                        </div>
                    </div>
                  
                    <div class="col-lg-6">
                        <div class="inp">
                            <p>
                                Phone
                            </p>
                            <p>
                                <input type="text" id="iu_phone" value="<?php echo $row->phone; ?>">
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inp">
                                <p>
                                    College Name
                                </p>
                                <p>
                                    <input type="text" id="iu_college" value="<?php echo $row->college_name; ?>" >
                                </p>
                        </div>
                     </div>
                 </div>
             


                    <div class="inp">
                        <p>
                            Address
                        </p>
                        <p>
                            <input type="text" id="iu_address" value="<?php echo $row->address; ?>" >
                        </p>
                    </div>

                
             </div>

            <h4 class="text-left">
                Intern Masters Summary
            </h4>
            <div class="txt_f">
            <textarea rows="6" id="iu_abt" cols="50"><?php echo $row->about ?></textarea>
            </div>
            
            <?php 
                }
            ?>
        </div>
        <div class="modal-footer">
        <button type="button" class="ms-inter-btn ms-pt-5 ms-pb-5 waves-effect update_intern">Save changes</button>
      </div>
        <div class="blog_a">
            <h4>
                Articles And video blogs
            </h4>
            <p>
                Add or Link External/internal documents,photos,Videos
            </p>
            <div class="row">
                <div class="col-lg-6">
                  
                    <div class="m-auto p-2 text-center">
                    <button class="ms-inter-btn ms-pt-5 ms-pb-5" data-toggle="modal" data-target="#model_intyadd">Upload</button>
                    </div>
                   
                    <?php
                        foreach($internvideoblog->result() as $row)
                        {
                    ?>
                    <div class="col-lg-10 m-1 p-2 z-depth-1">
                       <iframe width="100%" height="190" src="<?php echo $row->video_src ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="row">
                            <div class="col-lg-6">
                            <input type="text" class="user_id" value="<?php echo $this->session->userdata('intern_id'); ?>" hidden>
                            <div class="icnl">
                                    <img id="<?php echo $row->id; ?>" class="responsive dlt_iv" src="<?php echo base_url(); ?>/images/rubbish-bin.png" alt="">
                            </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="icn">
                                    <img id="<?php echo $row->id; ?>" data-toggle="modal" data-target="#model_inty_<?php echo $row->id; ?>" class="responsive edt_iv" src="<?php echo base_url(); ?>/images/pencil-edit-button.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="model_inty_<?php echo $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header light-blue white-text">
                                <h5 class="tex-center m-auto"> Edit Video</h5>
                               
                            </div>
                            <div class="modal-body mb-0 text-center">

                            <input type="text" class="user_id" value="<?php echo $this->session->userdata('intern_id'); ?>" hidden>
                            <div class="md-form">
                                <input type="text" id="intern_evsrc_<?php echo $row->id; ?>" value="<?php echo $row->video_src; ?>" class="form-control">
                                <label for="intern_evsrc">Youtube Link</label>
                            </div>

                            <button id="<?php echo $row->id ?>" class="ms-inter-btn ms-pt-5 ms-pb-5 waves-effect edit_inty">Upload Video</button>
                            </div>

                            </div>
                        </div>
                        </div>
                    </div>
                    
                    <?php
                        }
                    ?>

<!--Modal: add video-->
<div class="modal fade" id="model_intyadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">

    <!--Content--> 
    <div class="modal-content">

      <!--Header-->
      <div class="modal-header light-blue white-text">
        <h5 class="text-center m-auto"> Add a New Video</h5>
        
      </div>

      <!--Body-->
      <div class="modal-body mb-0 text-center">

      <input type="text" class="user_id" value="<?php echo $this->session->userdata('intern_id'); ?>" hidden>
      <div class="md-form">
        <input type="text" id="intern_vsrc" class="form-control">
        <label for="intern_vsrc">Youtube Link</label>
      </div>

      <button id="add_inty" class="ms-inter-btn ms-pt-5 ms-pb-5 waves-effect">Upload Video</button>
      </div>

    </div>
    <!--/.Content-->

  </div>
</div>
<!--Modal: add video-->

                </div>
                <div class="col-lg-6">
                    <div class="m-auto p-2 text-center">
                    <button class="ms-inter-btn1 ms-pt-5 ms-pb-5" data-toggle="modal" data-target="#model_intm">Link</button>
                    </div>
                    <?php
                        foreach($internsocialmedia->result() as $row)
                        {
                    ?>
                    <div class="personal-profile1">
                        <div class="three-card-img-post p-1 z-depth-1 mt-1">
                        <iframe width="100%" frameborder="0" src="<?php echo $row->src_link; ?>" height="250"></iframe>
                            <div class="row">
                            <input type="text" class="user_id" value="<?php echo $this->session->userdata('intern_id'); ?>" hidden>
                                <div class="col-lg-6">
                                    <div class="icnl">
                                            <img id="<?php echo $row->id; ?>" class="responsive dlt_media" src="<?php echo base_url(); ?>/images/rubbish-bin.png" alt="">
                                    </div>
                                </div>  
                                <div class="col-lg-6">
                                    <div class="icn">
                                        <img id="<?php echo $row->id; ?>" class="responsive edt_media" data-toggle="modal" data-target="#model_intmedt_<?php echo $row->id;?>" src="<?php echo base_url(); ?>/images/pencil-edit-button.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
<!--Modal: edit media-->
<div class="modal fade" id="model_intmedt_<?php echo $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">

    <!--Content--> 
    <div class="modal-content">

      <!--Header-->
      <div class="modal-header light-blue white-text">
        <h5 class="text-center m-auto"> Edit Articles </h5>
       
      </div>

      <!--Body-->
      <div class="modal-body mb-0 text-center">

      <input type="text" class="user_id" value="<?php echo $this->session->userdata('intern_id'); ?>" hidden>
      <div class="md-form">
        <input type="text" id="intern_msrcedt_<?php echo $row->id; ?>" value="<?php echo $row->src_link ?>" class="form-control">
        <label for="intern_msrcedt">Articles Link</label>
      </div>

      <button id="<?php echo $row->id; ?>" class="ms-inter-btn ms-pt-5 ms-pb-5 waves-effect upd_media">Upload Article Link</button>
      </div>

    </div>
    <!--/.Content-->

  </div>
</div>
<!--Modal: add media-->
                    <?php
                        }
                    ?>

<!--Modal: add media-->
<div class="modal fade" id="model_intm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">

    <!--Content--> 
    <div class="modal-content">

      <!--Header-->
      <div class="modal-header light-blue white-text">
        <h5 class="text-center m-auto"> Add Article link</h5>
        
      </div>

      <!--Body-->
      <div class="modal-body mb-0 text-center">

      <input type="text" class="user_id" value="<?php echo $this->session->userdata('intern_id'); ?>" hidden>
      <div class="md-form">
        <input type="text" id="intern_msrc" class="form-control">
        <label for="intern_msrc">Articles Link</label>
      </div>

      <button id="add_intm" class="ms-inter-btn ms-pt-5 ms-pb-5 waves-effect">Upload Article Link</button>
      </div>

    </div>
    <!--/.Content-->

  </div>
</div>
<!--Modal: add media-->
                </div>
            </div>
        </div>
      </div>
      
    </div>
  </div>
</div>


    <section class="interns-man container">
        <div class="row">
            <div class="container">
                <div class="row personal-profile change-new-background-color">
                    <div class="col-lg-4 mt-2">
                        <div class="three-card">
                            <span class="head"><?php echo $networkcompleted; ?>/<?php echo $shedulednetwork; ?></span>
                            <span>Networking Interviews Completed</span>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="three-card">
                            <span class="head">7</span>
                            <span>Projects Assigned</span>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="three-card">
                            <span class="head">
                            <?php
                                echo $internbatch;
                            ?>
                            </span>
                            <span>Growth Experience Badges</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="interns-man container">
        <div class="row">
            <div class="container">
                <div class="row personal-profile change-new-background-color">
                    <div class="col-lg-4 mt-2">
                        <div class="three-card">
                            <span class="head">ENTJ</span>
                            <span>"The Commander"</span>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="three-card">
                            <span class="head">2-2-1-1</span>
                            <span>"Data / Processes"</span>
                            <span>HBDI</span>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="three-card">
                            <span class="head">STRENGTHS</span>
                            <span>Achiever - Strategic - Ideation - </span>
                            <span>Individualization - Communication</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="interns-man container">
        <div class="row">
            <div class="container">
                <div class="row personal-profile change-new-background-color">
                    <div class="col-lg-4 mt-2">
                        <div class="three-card">
                            <span class="head">Marketing</span>
                            <span>Host Function</span>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="three-card">
                            <span class="head">Procurement</span>
                            <span>Target Interest</span>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="three-card">
                            <span class="head">M&A</span>
                            <span>Target Interest</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="interns-man container">
        <div class="row">
            <div class="col-lg-12">
                <p class="section-heading">Articles & Video Blogs</p>
            </div>
            <div class="container">
                <div class="row personal-profile">
                    <?php
                        foreach($internsocialmedia->result() as $row)
                        {
                    ?>
                    <div class="col-lg-4 mt-2">
                        <div class="three-card-img-post">
                        <iframe width="100%" frameborder="0" src="<?php echo $row->src_link; ?>" height="400"></iframe>
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
        <div class="container">
            <div class="row personal-profile intvideo">
                <div class="row">
                    <?php
                        foreach($internvideoblog->result() as $row)
                        {
                    ?>
                    <div class="col-lg-4">
                       <iframe width="" height="190" src="<?php echo $row->video_src ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>



<section>
<div class="container">
<h4 class="mb-4">
Networking Blueprint
</h4>

<div class="col-lg-12">
                <?php if($interviewunassigned == 0)
                {
                ?>
                <div class="progress">
                   
                    <div class="progress-bar" style="width:<?php  echo "0" ?>%">
                        <span class="value"><?php  echo "0" ?>%</span>
                    </div>
                </div>  
                <?php
                } 
                else
                {
                ?>
                      <div class="progress">
                        <?php
                        $networkcompleted;
                        $shedulednetwork;
                        $networkmultiply = $networkcompleted/$shedulednetwork;
                        $percentage_n = $networkmultiply*100; 
                        ?>
                        <div class="progress-bar" style="width:<?php  echo round($percentage_n) ?>%">
                            <span class="value"><?php  echo round($percentage_n) ?>%</span>
                        </div>
                     </div>
                <?php
                }
                ?>
              
</div>
<table class="m-1 p-1 table table-borderless z-depth-1">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"><i class="fas fa-briefcase"></i>  Function</th>
      <th scope="col">Interviewer Name</th>
      <th scope="col">Intern</th>
      <th scope="col">Title </th>
      <th scope="col">progress </th>
      <th scope="col"><i class="fas fa-clock"></i> Status</th>
    </tr>
  </thead>
  <?php
        $i=1;
        foreach($internnetworkinterview->result() as $row)
        {        
  ?>

  <tbody>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td id="function_ass_<?php echo $row->assign_id ?>"><?php echo $row->functional_assignments; ?></td>
      <td><?php echo $row->employer_name ?></td>
      <td><?php echo $row->firstname ?></td>
      <td><?php echo $row->areaof_expertice ?></td>
      <td>
         <?php
           $sheduled = $row->shedule_status;
           if($sheduled == 1)
           {
               ?>
                 <div class="pndng z-depth-2">
                 <i class="fas fa-clipboard-list"></i> Sheduled
                </div>
                           
               <?php
           }
           else
           {
               ?>

            <p class="m-1">Open</p>
        <?php
           }
         ?>
      </td>

      <td class="slct_custom">
            <select id="shedule_net_<?php echo $row->assign_id ?>" name="status" class="networking-blueprint">
                <option value="open" selected>Open</option>
                <option value="scheduled">Scheduled</option>
                <option value="complete">Complete</option>
            </select>
      </td>
      <input class="user_info" type="text" value="<?php echo $row->id ?>" hidden>
      <input class="iuser_name" type="text" value="<?php echo $row->firstname ?>" hidden>
      <input class="champ_infor" type="text" value="<?php echo $row->champion ?>" hidden>
      <td>
      <button id="<?php echo $row->assign_id ?>" type="button" class="btn btn-default btn-sm status_network">Update   </button>
      </td>
    </tr>
  </tbody>
  <?php
        }
  ?>
</table>
</div>
</section>

<!-- current projects -->
<section class="interns-man container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="p-1 m-1">Ongoing Projects</h4>
            </div>
            <div class="col-lg-12">
                <div class="progress">
                    <div class="progress-bar1" style="width:30%">
                        <span class="value1"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <table class="six-rows">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">Function</th>
                            <th width="30%">Project Name</th>
                            <th width="15%">Sponsor</th>
                            <th width="15%">Date<img src="<?php echo base_url(); ?>/images/datePicker.svg"></th>
                            <th>Update</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $i=1;
                        foreach($assigned_projectdtlsc->result() as $row)
                        {       
                    ?>
                        <tr class="tblrow">
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $row->project_function ?></td>
                            <td><?php echo $row->project_title ?></td>
                            <td><?php echo $row->s_firstname ?> <?php echo $row->s_lastname ?></td>
                            <td><?php  echo DateTime::createFromFormat("Y-m-d H:i:s",$row->assigned_date_time)->format("d/m/Y"); ?></td>
                            <td>  <a class="" href="<?php echo base_url() ?>/controller/internprojectdetails/<?php echo $row->assign_prid ?>"> <button class="btn btn-default btn-sm  waves-effect waves-light">Update</button> </a></td>
                        </tr>
                
                    <?php    
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
</section>
<!-- current projects -->


<section class="interns-man container">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="p-1 m-1">New Project Assignments</h4>
        </div>
        <div class="col-lg-12">
            <div class="progress">
                <div class="progress-bar1" style="width:30%">
                    <span class="value1"></span>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <table class="six-rows">
                <thead>
                    <tr>
                        <th width="5%"></th>
                        <th width="15%">Function</th>
                        <th width="30%">Project Name</th>
                        <th width="15%">Sponsor</th>
                        <th width="15%">Date<img src="<?php echo base_url(); ?>/images/datePicker.svg"></th>
                        <th width="20%">View</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $i=1;
                    foreach($assigned_projectdtls->result() as $row)
                    {       
                ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row->project_function ?></td>
                        <td><?php echo $row->project_title ?></td>
                        <td><?php echo $row->s_firstname ?> <?php echo $row->s_lastname ?></td>
                        <td><?php echo $row->assigned_date_time ?></td>
                        <td>
                         <a href="<?php echo base_url() ?>controller/internviewproject/<?php echo $row->assign_prid ?>">  <button type="button" id="<?php echo $row->assign_prid ?>" class="btn btn-outline-primary waves-effect btn-sm">View project</button> </a> 
                        </td>
                    </tr>
                <?php    
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
    <!-- contents with process bar and table-->
    <section class="interns-man container">
        <div class="row">
            <div class="col-lg-12">
               
                <h4 class="mb-4">Growth Experiences</h4>
            </div>
            <div class="col-lg-12">
                <?php
                    if($growth_assigncount == 0)
                    {
                ?>
                    <div class="progress">
                        <div class="progress-bar2" style="width:<?php echo "0" ?>%">
                            <span class="value2"><?php echo "0" ?>%</span>
                        </div>
                 </div>
                <?php
                    }
                    else
                    {
                ?>
                     <div class="progress">
                        <?php
                            $growth_assigncount;
                            $internbatch;
                            $growth_multiply = $internbatch/$growth_assigncount;
                            $percentage = $growth_multiply*100;
                        ?>
                        <div class="progress-bar2" style="width:<?php echo round($percentage) ?>%">
                            <span class="value2"><?php echo round($percentage) ?>%</span>
                        </div>
                    </div>
                <?php
                    }
                ?>
               
            </div>
                
            <table class="m-1 p-1 table table-borderless z-depth-1">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col"><i class="fas fa-briefcase"></i>Growth Experience Selected</th>
                    <th scope="col"><i class="fas fa-clock"></i> Status    </th>   
                    <th scope="col">Evidence of completion</th>
                    <th scope="col"> Progress </th>
                    <th scope="col"><i class="fas fa-award"></i> Batches Earned</th>
                    </tr>
                </thead>
                <?php
                        $i=1;
                        foreach($ge_intern->result() as $row)
                        {
                ?>
                <tbody>
                    <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td class="w-25"><?php echo $row->ge_description ?></td>
                        
                    <td class="slct_custom">
                            <select id="shedule_growth_<?php echo $row->exp_id ?>" name="status" class="networking-blueprint">
                                <option value="open" selected>Open</option>
                                <option value="progress">In Progress</option>
                                <option value="complete">Complete</option>
                            </select>
                    </td>

                    <td>
                        <div class="inpf">
                            <div style="position:relative;">
                                <a class='btn btn_my' href='javascript:;'>
                                    Upload evidence
                                    <input type="file" id="evid_<?php echo $row->exp_id ?>" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:white;' name="file_source_<?php echo $row->exp_id ?>" size="40"  onchange='$("#upload-file-info_<?php echo $row->exp_id?>").html($(this).val());'>
                                </a>
                                &nbsp;
                                <span class='label label-info spanpath z-depth-1' id="upload-file-info_<?php echo $row->exp_id?>"></span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <?php
                            $progress = $row->ge_progress;
                            $completed = $row->ge_completed;
                            $approval = $row->champion_geapprove;
                            if($progress == 1 && $completed == 0 && $approval == 0)
                            {
                            ?>
                            <div class="prg z-depth-2">
                            <i class="fas fa-spinner"></i> In progress
                            </div>
                           
                            <?php
                            }
                            else if($progress == 1 && $completed == 1 && $approval == 0)
                            {
                            ?>
                            <div class="pndng z-depth-2" data-toggle="popover" data-trigger="focus" title="Your growth experience submission is under review" data-content="After the champion approval your badge will be automatically added to your profile">
                            <i class="fas fa-pause"></i> Pending
                            </div>
                            <?php
                            }
                            else if($progress == 1 && $completed == 1 && $approval == 1)
                            {
                            ?>
                               <div class="apprd z-depth-2">
                               <i class="fas fa-check"></i> Completed
                               </div>
                            <?php
                                }
                            else
                            {
                            ?>
                                 <div class="opn_p z-depth-2">
                               <i class="fas fa-lock-open"></i> Open
                               </div>
                            <?php
                            }
                            ?>
                    </td>
                    <td>
                    <?php
                            if($progress == 1 && $completed == 1 && $approval == 1)
                            {
                            ?>
                               <div class="apprd z-depth-2">
                               <i class="fas fa-trophy"></i> <?php echo $row->ge_batch ?>
                               </div>
                            <?php
                                }
                            else
                            {
                            ?>
                                <p>No batches Earned</p>
                            <?php
                            }
                            ?>
                    </td>
                    <input class="user_info" type="text" value="<?php echo $row->id ?>" hidden>
                    <input class="iuser_name" type="text" value="<?php echo $row->firstname ?>" hidden>
                    <input class="champ_infor" type="text" value="<?php echo $row->champion ?>" hidden>
                    <td>
                    <button id="<?php echo $row->exp_id ?>" type="button" class="btn btn-default btn-sm assign_growth">Update   </button>
                    </td>
                    </tr>
                </tbody>
                <?php
                        }
                ?>
            </table>
        </div>
    </section>

<section>
    <!--Modal: modalPush For add intern Feed back-->
<div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">Add Feed back about your champion</p>
      </div>

      <!--Body-->
      <div class="modal-body">

      <div class="form-group shadow-textarea">
        <label for="exampleFormControlTextarea6">Add a Feed back</label>
        <textarea class="form-control z-depth-1 feedback_int" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
     </div>
     <?php
        foreach($internprofile->result() as $row)
        {
    ?>

    <input type="text" class="id_user" value="<?php echo $row->id ?>" hidden>
    <input type="text" class="id_champ" value="<?php echo $row->champion ?>" hidden>
    <?php
        }
    ?>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <button class="btn btn-info add_feedback"> Publish </button>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalPush-->



</section>



<script src="<?php echo base_url(); ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url(); ?>/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>/js/mdb.js"></script>
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
            $('[data-toggle="popover"]').popover(
                container: 'body'
            )
        });


</script>


</body>
</html>