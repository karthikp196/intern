
<?php
if(!($this->session->userdata('sponsor_id'))){
    $this->load->helper('url');
    redirect( base_url()."sponsorlogin" );  
 
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
            <img src="http://internmastershosting.com//images/u1.png" alt="MDB logo">
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
                    <a class="nav-link waves-effect" href="#" target="">Project Requests</a>
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
                   <a class="dropdown-item" href="#">My Account</a>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>/controller/s_logout">Logout</a>
                   </div>
                  
               </li>
                 
               </ul>

        </div>

    </div>
</nav>
</section>

<!-- calling sponsor details from db -->
<?php
        foreach($sponsorprofile->result() as $row)
        {
?>
<section class="top-layout-wrapper relative_po">
    
    <div class="banner-img">
        <img src="<?php echo base_url(); ?>/images/u0.png" alt="banner">
    </div>
    <div class="profile-img">
      
        <img src="<?php echo base_url(); ?>/images/uploads/sponsor/<?php echo $row->s_profile_picture; ?>" alt="profile">
      
    </div>


    <div class="banner-logo-img">
        <img src="<?php echo base_url(); ?>/images/intern-masters-01.png" alt="profile">
    </div>
   
    <div class="pro-profile-info">
    <div id="profile_ed" class="edit_but">
         <img  src="<?php echo base_url(); ?>/images/editIcon.svg" data-toggle="modal" data-target="#basicExampleModalsprof">
     </div>
        <div class="empty-div"></div>
        <div class="first-div">
            <p class="profile-name"><?php echo $row->s_firstname; ?>  <?php echo $row->s_lastname; ?></p>
           
            <div class="detail">
                <span class="wrap"><span>Title: </span><span> <?php echo $row->title; ?> </span></span>
                <span class="wrap"><span>Email: </span><span> <?php echo $row->s_email; ?> </span></span>
                <span class="wrap"><span>Phone: </span><span> <?php echo $row->s_phone; ?></span></span>
                <span class="wrap"><span>Location: </span><span> <?php echo $row->s_address ?> </span></span>
            </div>
        </div>
        <div class="pro-second-div">
            <div><img src="<?php echo base_url(); ?>/images/gold-star.svg" alt="star"><span class="gold-text">Project Sponsor   </span></div>
            <div><img src="<?php echo base_url(); ?>/images/green-tick.svg" alt="approved"><span class="">Mentorship Availability</span>
            </div>
        </div>
        <div class="pro-third-div">
            <div><img src="<?php echo base_url(); ?>/images/flag.svg" alt="completed"><span class="">Intern Contact Flag</span></div>
            <div><img src="<?php echo base_url(); ?>/images/calen.svg" alt="calendar"><span class="">Schedule Availability</span></div>
        </div>
    </div>
</section>

<!-- About me section -->
<section class="interns-man container">
    <div class="row">
        <div class="col-lg-12">
           
            <p class="section-heading">About Me</p>
            <div class="grey-background" id="abt_chmp">
            <p id="abtchmp">
        
            <?php echo $row->about; ?>
            </p>

            </div>
            
            
        </div>
    </div>
</section>
<?php
        }
?>


<!-- Modal -->
<div class="modal fade" id="basicExampleModalsprof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                foreach($sponsorprofile->result() as $row)
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
                                <input type="text" id="s_fname" value="<?php echo $row->s_firstname; ?>">
                                <input type="text" id="s_id" value="<?php echo $this->session->userdata('sponsor_id') ?>" hidden>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inp">
                            <p>
                                Last Name
                            </p>
                            <p>
                                <input type="text" id="s_lname" value="<?php echo $row->s_lastname; ?>">
                            </p>
                        </div>
                    </div>
                   
                    <div class="col-lg-6">
                        <div class="inp">
                            <p>
                                Phone
                            </p>
                            <p>
                                <input type="text" id="s_phone" value="<?php echo $row->s_phone; ?>">
                            </p>
                        </div>
                    </div>
                    <div class="inp">
                        <p>
                            Address
                        </p>
                        <p>
                            <input type="text" id="s_address" value="<?php echo $row->s_address; ?>" >
                        </p>
                    </div>
                 </div>              
                 </form>   
            </div>
            <h4 class="text-left">
                About Me
            </h4>
            <div class="txt_f">
            <textarea  rows="8" id="s_abt" cols="50"><?php echo $row->about ?></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="ms-inter-btn ms-pt-5 ms-pb-5 waves-effect s_profileupd">Save changes</button>
            </div>
            <?php
                }
            ?>
      </div>
    </div>
  </div>
</div>

<!-- End of loop sponsor details -->
<section class="dash-content container section_proj">

        <!--new table -->
            <!-- Table with panel -->
                <div class="card card-cascade narrower">

                <div
                style="background: #33cccc;" class="view view-cascade gradient-card-header narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                <p class="white-text mx-3 m-0">Ready For Review</p>

                </div>
                <div class="px-4">
                <div class="table-wrapper">
                    <!--Table-->
                    <table class="table table-hover mb-0">
                    <!--Table head-->
                    <thead>
                        <tr>
                        <th class="th-lg">
                            <a>Project Name
                            <i class="fas fa-sort ml-1"></i>
                            </a>
                        </th>
                       
                        <th class="th-lg">
                            <a href="">View Details
                            <i class="fas fa-sort ml-1"></i>
                            </a>
                        </th>
                        <th class="th-lg">
                            <a href="">Intern
                            <i class="fas fa-sort ml-1"></i>
                            </a>
                        </th>        
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($projectprogress->result() as $row)
                        {
                    ?>
                        <tr>     
                            <td> <i class="fas fa-cogs"></i> <?php echo $row->project_title ?> </td>
                           
                            <td>
                            <a href="<?php echo base_url() ?>/controller/surveyresults">
                            <button id="" class="ms-inter-btn ms-pt-1 ms-pb-1 pt-1 pb-1 pl-2 pr-2 waves-effect" >View Details</button>
                            </a>
                            </td>  
                            <td>
                            <p class=""><img style="width:50px; height:50px; border-radius:50%;" src="<?php echo base_url(); ?>/images/uploads/intern/<?php echo $row->profile_picture ?>" alt=""><span class="pl-2"><?php echo $row->firstname ?></span></p>
                            </td>   
                        </tr> 
                    <?php
                        }
                    ?>
                    </tbody>                
                    </table>
                    <!--Table-->
                </div>

                </div>

                </div>
                <!-- Table with panel -->

        <!-- end of new -->
</section>

<section>
    <div class="container">
                <div class="setup1 p-2 text-center">
                     <button class="waves-effect" data-toggle="modal" data-target="#basicExampleModalsp">Submit a Project</button>
                </div>
    </div>
</section>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="basicExampleModalsp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Submit a Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <section class="top-layoutrapper relative_po">
                <div class="banner-img" style="opacity: 0.4;">
                    <img src="<?php echo base_url(); ?>/images/u0.png" alt="banner">
                </div>
                <?php
                   foreach($sponsorprofile->result() as $row)
                      {
                ?>
                <div class="profile-img" style="top:5px">
                
                    <img src="<?php echo base_url(); ?>/images/uploads/sponsor/<?php echo $row->s_profile_picture ?>" alt="profile">
                
                </div>
                <?php
                      }
                ?>


                <div class="banner-logo-img">
                    <img src="<?php echo base_url(); ?>/images/intern-masters-01.png" alt="profile">
                </div>
                <?php
                   foreach($sponsorprofile->result() as $row)
                      {
                ?>
                <div class="pro-profile-info" style="top:44px">
            
                    <div class="empty-div"></div>
                    <div class="first-div" style="left: 15px;position: relative; bottom: 28px;">
                        <p class="profile-name"><?php echo $row->s_firstname ?>  <?php echo $row->s_lastname ?> </p>
                    
                        <div class="detail">
                            <span class="wrap"><span>Title: </span><span> <?php echo $row->title ?>  </span></span>
                            <span class="wrap"><span>Email: </span><span><?php echo $row->s_email ?> </span></span>
                            <span class="wrap"><span>Phone: </span><span> <?php echo $row->s_phone ?> </span></span>
                            <span class="wrap"><span>Location: </span><span> <?php echo $row->s_address ?>  </span></span>
                        </div>
                    </div>
                
                </div>
                <?php
                      }
                ?>
        </section>




    <form action="<?php echo base_url() ?>/controller/submitproject" method="POST" enctype='multipart/form-data'>
        <section>
            <div class="container">
                <div class="row">            
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="m-2">
                                Function
                                </p>
                                <p class="m-2">
                                    Do You have a Preferred Intern?
                                </p>
                                <p class="m-2">
                                Preferred Intern
                                </p>
                                <p class="m-2">
                                    Estimated Duration of Project
                                </p>
                                <p class="m-2">
                                    Estimated % of Time Allocated
                                </p>
                                <p class="m-2">
                                    Location of Project
                                </p>
                                <p class="m-2">
                                    Open to All Interns?
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <select class="m-2" name="functional_area" id="" required>
                                <option value="">Choose...</option>
                                <option value="Quality">Quality</option>
                                <option value="Accounting">Accounting</option>
                                <option value="Controlling">Controlling</option>
                                <option value="Finance">Finance</option>
                                </select>
                                <select class="m-2" name="intern_option" id="pefr_is" required>
                                     <option value="">Choose...</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <div class="select_intab">
                                    <select class="m-2" name="intern" id="select_int">
                                        <option value="select">Select</option>
                                        <?php
                                            foreach($getintern->result() as $row)
                                            {
                                        ?>
                                        <option value="<?php echo $row->id ?>"><?php echo $row->firstname ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>   
                                </div>
                               
                                <select class="m-2" name="project_duration" id="" required>
                                     <option value="" >Choose...</option>
                                    <option value="4-6 weeks">4-6 Weeks</option>
                                    <option value="6-8 weeks">6-8 Weeks</option>
                                    <option value="8-10 weeks">8-10 Weeks</option>
                                    <option value="10+ weeks">10 + Weeks(Handover Required)</option>
                                </select>
                                <select class="m-2" name="percentage_time" id="" required>
                                    <option value="">Choose...</option>
                                    <option value="5-10%">5-10 %</option>
                                    <option value="10-20%">10-20 %</option>
                                    <option value="20-40%">20-40 %</option>
                                    <option value="40-50%">40-50 %</option>
                                    <option value="50-100%">50-100 %</option>
                                </select>
                                <select class="m-2" name="project_location" id="" required>
                                    <option value="" >Choose...</option>
                                    <option value="virtual">Virtual</option>
                                    <option value="sponsor location">Sponsor Location</option>
                                </select>
                                <select class="m-2" name="open_to_intern" id="" required>
                                     <option value="">Choose...</option>
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                            </div>
                            <div class="col-lg-12">
                            <p class="text-center m-1">
                                Project Title
                                </p>
                                <div class="desc_p">
                                    <!-- <p class="m-1 p-2">
                                    Elise will be responsible for developing our Supplier Quality Day and developing the criteria for which we will be monitoring supplier performance
                                    </p> -->
                                    <textarea name="project_title" id="" class="grey_ta" cols="30" rows="2" placeholder="project_title" required ></textarea>
                                </div>
                                <p class="text-center m-1">
                                Project Description
                                </p>
                                <div class="desc_p">
                                    <!-- <p class="m-1 p-2">
                                    Elise will be responsible for developing our Supplier Quality Day and developing the criteria for which we will be monitoring supplier performance
                                    </p> -->
                                    <textarea name="project_description" id="" class="grey_ta" cols="30" rows="6" required></textarea>
                                </div>
                                <p class="text-center m-1">
                                Project Goals And activities
                                </p>
                                <div class="desc_p">
                                <textarea name="project_goals" id="" class="grey_ta" cols="30" rows="6" required></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="row text-center dyn_sec">
                            <div class="col-lg-12">
                                <div class="text-center dyn_image m-auto">
                                    <img src="" alt="" class="responsive p-2 int_prp">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p class="m-1">
                                Current Projects 
                                </p>
                                <p class="m-1">
                                Time Currently Allocated
                                </p>
                                <p class="m-1">
                                Current Project Status
                                </p>
                                <p class="m-1">
                                Earliest Completion Date
                                </p>
                                <p class="m-1">
                                Feedback Received
                                </p>
                                <p class="m-1">
                                Growth Experiences Completed
                                </p>
                                <p class="m-1">
                                Networking Interview Status
                                </p>
                            </div>
                            <div class="col-lg-6">
                                 <p class="m-1">
                                 2
                                 </p>
                                 <p class="m-1">
                                 50%
                                 </p>
                                 <p class="m-1">
                                 In Progress
                                 </p>
                                 <p class="m-1">
                                 Est. 10/15/2019
                                 </p>
                                 <p class="m-1">
                                 2
                                 </p>
                                 <p class="m-1" id="growth_numrow">
                                 12
                                 </p>
                                 <p class="m-1" id="netstatus">
                                 10/40
                                 </p>
                            </div>
                        </div>
                    </div>

                </div>         
            </div>
        </section>

        <section>
            <div class="container">
                <p class="text-center m-1">
                Performance Management Expectations (How the intern's success will be determined)
                </p>
                <div class="desc_p">
                <textarea name="managment_expectations" class="grey_ta" id="" cols="30" rows="5" required></textarea>
                <!-- <p class="m-1 p-3">  
                </p> -->
                </div>
            </div>
        </section>

      </div>
      <div class="modal-footer">
             <div class="setup1 p-2 text-center">
             <span style="color:red;">Supported files Pdf,Docx,xlsx,png,jpg,jpeg</span>  <input name="project_attachment" id="project_attachment" type="file" required> <button class="waves-effect">Submit a Project</button>
                </div>
      </div>
    </form>
    </div>
  </div>
</div>


<section>
<div class="container">
<h4>
My Sponsored Projects
</h4>
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Function</th>
      <th scope="col">Project Name</th>
      <th scope="col">Intern</th>
      <th scope="col">Due <i class="fas fa-calendar-alt"></i></th>
      <th scope="col">Status    </th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i = 1;
    foreach ($projectsubmitted->result() as $row)
    {
        
  ?>
    <tr>
      <th scope="row"><?php echo $i++ ?></th>
      <td><?php  echo $row->project_function ?></td>
      <td><?php  echo $row->project_title ?></td>
      <td>
      <p class=""><img style="width:40px; height:40px; border-radius:50%;" src="<?php  echo base_url(); ?>/images/uploads/intern/<?php echo $row->profile_picture ?>" alt=""><span class="pl-2"><?php  echo $row->firstname ?></span></p>
      </td>
      <td>
      6/27/19   
      </td>
      <td class="slct_custom">
        <div class="pndng1 z-depth-2">
            <i class="fas fa-pause"></i> Waiting for intern confirmation
        </div>                 
      </td>
     
    </tr>
   <?php
        }
   ?>

  </tbody>
</table>
</div>
</section>


<section>
<div class="container">
<h4>
New project assigned
</h4>
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Function</th>
      <th scope="col">Project Name</th>
      <th scope="col">Intern</th>
      <th scope="col">Due <i class="fas fa-calendar-alt"></i></th>
      <th scope="col">Status    </th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i = 1;
    foreach ($newprojectassigned->result() as $row)
    {
  ?>
    <tr>
      <th scope="row"><?php echo $i++ ?></th>
      <td><?php echo $row->project_function ?></td>
      <td><?php echo $row->project_title ?></td>
      <td>
      <p class=""><img style="width:40px; height:40px; border-radius:50%;" src="<?php echo base_url(); ?>/images/uploads/intern/<?php echo $row->profile_picture ?>" alt=""><span class="pl-2"><?php echo $row->firstname ?></span></p>
      </td>
      <td>
      6/27/19   
      </td>
      <td class="slct_custom">
          <?php
          if($row->project_rejection_status == 0)
          {
              ?>
              <div class="pndng1 z-depth-2">
                <i class="fas fa-pause"></i> pending
            </div>   
         <?php
          }
          else
          {
          ?>
            <div class="rejct z-depth-2">
            <i class="fas fa-times"></i> Rejected
            </div>  
          <?php
          }
          ?>
      
      </td>
    
    </tr>
   <?php
        }
   ?>

  </tbody>
</table>
</div>
</section>


<section>
<div class="container">
<h4>
Rejected Projects
</h4>
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Function</th>
      <th scope="col">Project Name</th>
      <th scope="col">Reason For Rejection</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i = 1;
    foreach ($rejectedprojects->result() as $row)
    {
  ?>
    <tr>
      <th scope="row"><?php echo $i++ ?></th>
      <td><?php echo $row->project_function ?></td>
      <td><?php echo $row->project_title ?></td>
      <td>
      <div>
          <?php echo $row->reason_of_rejection ?>
      </div>
      </td>
      <td>
      <div class="setup1 p-2 text-center">
                     <button class="waves-effect" data-toggle="modal" data-target="#basicExampleModalsp">Submit again</button>
                </div>
      </td>
    
    </tr>
   <?php
        }
   ?>

  </tbody>
</table>
</div>
</section>


<section class="interns-man container">
    <div class="row">
        <div class="col-lg-12">
            
            <h2 >Personality Profile</h2>
        </div>
        <div class="container">
            <div class="row personal-profile">
    <!-- personality profile db -->
    <?php
            foreach($sponsorpersonality->result() as $row)
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
         
            <p class="section-heading">Functional Experience</p>
        </div>
        <div class="container">
            <div class="row personal-profile">
        <!-- personality profile db -->
        <?php
                foreach($sponsorfunctexp->result() as $row)
                {
        ?>
                <div class="col-lg-4">
                    <div class="three-card">
                        <span class="head"><?php echo $row->functional_title ?></span>
                        <span><?php echo $row->functional_exp ?></span>  
                    </div>
                </div>
        <?php
                }
        ?>
            </div>
        </div>
    </div>
</section>




    <script src="<?php echo base_url(); ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>/js/mdb.js"></script>
    <script src="<?php echo base_url(); ?>/js/jquery.richtext.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"> </script>
    <script src="<?php echo base_url(); ?>/js/script.js"></script>
    <script>
      $(document).ready(function() {
            $('#s_abt').richText();
        });
        $('.toast').toast('show');
        

    </script>

</body>

</html>
