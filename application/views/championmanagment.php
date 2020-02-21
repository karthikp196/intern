
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
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
</head>

<body class="container">
<section>
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand pt-0 waves-effect im_logo" href="<?php echo base_url() ?>championdashboard">
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
        foreach($championprofile->result() as $row)
        {
            $banner_image = $row->c_banner;
            if(strlen($banner_image) == 0)
            {
                $banner_image = "default.png";
            }  
    
    ?>
    <section class="top-layout-wrapper">
        <div class="banner-img">
            <img src="<?php echo base_url(); ?>/images/uploads/banner/champion/<?php echo $banner_image ?>" alt="banner">
        </div>
        <div class="profile-img">
           
            <img src="<?php echo base_url(); ?>/images/uploads/champion/<?php echo $row->c_profile_picture ?>" alt="profile">
          
        </div>
        <div class="profile-info">
            <div class="empty-div"></div>
            <div class="first-div">
                <p class="profile-name"><?php echo $row->c_firstname ?> <?php echo $row->c_lastname ?> </p>
                <p class="profile-desig"><?php echo $row->c_position ?></p>
            </div>
            <div class="second-div">
                <img src="<?php echo base_url(); ?>/images/gold-star.svg" alt="star"><span class="gold-text">Program Champion</span>
            </div>
            <div class="third-div">
                <button class="ms-inter-btn ms-pt-5 ms-pb-5"  data-toggle="modal" data-target="#basicExampleModal">Invite Intern</button>
            </div>
            <div class="fourth_div">
                <div class="btn-group dropup">
                        
                        <button type="button" class="btn btn px-3 btn-sm" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalPush_addemp">Add Employers</a>
                            <a class="dropdown-item" href="<?php echo base_url() ?>projectpipeline">Invite Sponsors</a>
                        </div>
                </div>
            </div>
        </div>
    </section>

    <?php
        }
    ?>
<!-- Button trigger modal -->


<!-- Modal invite intern -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <div class="w-25 mr-5">
          <img class="responsive" src="<?php echo base_url(); ?>/images/u1.png" alt="intern masters">
          </div>
        <h5 class="modal-title" id="exampleModalLabel">Invite Interns</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form_in">
                <div class="inp">
                    <input class="inv_name" type="text" placeholder="Name">
                </div>
                <div class="inp"> 
                    <input class="inv_email" type="email" placeholder="Email">
                </div>
                <div class="inp">
                    <input class="comp_email" type="number" placeholder="Phone number">
                </div>
                <div class="inp">
                    <textarea name="" id="" class="inv_msg" placeholder="Message" cols="30" rows="4"></textarea>
                </div>
                <input class="champ_id" value=<?php echo $this->session->userdata('user_id') ?> type="text" hidden>
          </div>
      </div>
      <div class="alert alert-success inv_in" role="alert">
        
     </div>
     <div class="alert alert-danger inv_infail" role="alert">
        
    </div>
    
      <div class="modal-footer">
        <div class="img_loader">
            <img class="responsive" src="<?Php echo base_url() ?>/images/loader.gif" alt="">
        </div>
        <button type="button" class="ms-inter-btn ms-pt-5 ms-pb-5 invite_int">Send invitation Link</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal add employers -->
<!--Modal: modalPush For add intern Feed back-->
<div class="modal fade" id="modalPush_addemp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">Add Employers to the system</p>
      </div>

      <!--Body-->
      <div class="modal-body">

         <div class="md-form">
            <input type="text" id="form1" class="form-control emp_name">
            <label for="form1">Employer Name</label>
        </div>
        <div class="md-form">
            <input type="text" id="form2" class="form-control emp_email">
            <label for="form2">Email</label>
        </div>

        <div class="md-form">
           
            <select class="emp_area myslcarea">
            <option value="">choose area </option>
            <?php
                foreach($area_interest->result() as $row)
                {
            ?>
                
                <option value="<?php echo $row->Procurement_areas ?>"><?php echo $row->Procurement_areas ?></option>
            <?php
                }
            ?>
            </select>
           
        </div>
        <div class="md-form">
            <input type="text" id="form4" class="form-control emp_func">
            <label for="form4">Functional Assignments</label>
        </div>
        <div class="md-form">
            <input type="text" id="form5" class="form-control emp_loc">
            <label for="form5">Location</label>
        </div>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <button class="btn btn-info add_emplyr"> Add Employers </button>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalPush-->

<section>

    <div class="container">
    <!-- Table with panel -->
    <div class="card card-cascade narrower mb-4">

    <div
        style="background: #33cccc;" class="view view-cascade gradient-card-header narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

        <p class="white-text mx-3 m-0">Ready for Review</p>

    </div>
    <div class="px-4">
        <div class="table-wrapper">
        <!--Table-->
        <table class="table table-hover mb-0">
            <!--Table head-->
            <thead>
            <tr>
            
                <th class="th-lg">
                <a>First Name
                    <i class="fas fa-sort ml-1"></i>
                </a>
                </th>
                <th class="th-lg">
                <a href="">Last Name
                    <i class="fas fa-sort ml-1"></i>
                </a>
                </th>
                <th class="th-lg">
                <a href="">Intern
                    <i class="fas fa-sort ml-1"></i>
                </a>
                </th>
            
                <th class="th-lg">
                <a href="">Survey Results
                    <i class="fas fa-sort ml-1"></i>
                </a>
                </th>        
            </tr>
            </thead>
            <!--Table head-->
            <?php
                foreach($surveyresults->result() as $row1)
                {
                
            ?>
        
            <!--Table body-->
            <tbody>
            <tr>   
                <td><?php echo $row1->firstname ?></td>
                <td><?php echo $row1->lastname ?></td>
                <td class="w-50">
                    <div class="col-lg-2">
                    <img class="responsive round_c" src="<?php echo base_url(); ?>/images/uploads/intern/<?php echo $row1->profile_picture ?>" alt="intern">
                    </div>
                </td>  
                <td>
                <a href="<?php echo base_url() ?>controller/surveyresults?survey=<?php echo $row1->survey_id; ?>&token=<?php echo $row1->token ?>&user=<?php echo $row1->id; ?>">
                <button id="<?php echo $row1->survey_id ?>" class="ms-inter-btn ms-pt-1 ms-pb-1 pt-1 pb-1 pl-2 pr-2 waves-effect" >Open Results</button>
                </a>
                </td>     
            </tr> 
            </tbody>
            <!--Table body-->
            <?php
                }
            ?>
        </table>
        <!--Table-->
        </div>

    </div>

    </div>
    <!-- Table with panel -->
    </div>

</section>

<section class="dash-content container section_proj">

        <!--new table -->
            <!-- Table with panel -->
                <div class="card card-cascade narrower">

                <div
                style="background: #33cccc;" class="view view-cascade gradient-card-header narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                <p class="white-text mx-3 m-0">New project Submissions</p>

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
                            <a href="">Status
                            <i class="fas fa-sort ml-1"></i>
                            </a>
                        </th>
                      
                        <th class="th-lg">
                            <a href="">Intern
                            <i class="fas fa-sort ml-1"></i>
                            </a>
                        </th>       
                        <th class="th-lg">
                            <a href="">Sponsor
                            <i class="fas fa-sort ml-1"></i>
                            </a>
                        </th>   
                        <th class="th-lg">
                            <a href="">View Details
                            <i class="fas fa-sort ml-1"></i>
                            </a>
                        </th>     
                        </tr>
                    </thead>
                    <!--Table head-->
            
                    <!--Table body-->
                    <tbody>
                    <?php
                        foreach($project_details->result() as $row)
                        {
                    ?>
                        <tr>     
                            <td> <i class="fas fa-project-diagram"></i> <?php echo $row->project_title ?>  </td>
                            <td>Proposed</td> 
                            <td>
                            <span class=""><img class="responsive round_c" src="<?php echo base_url(); ?>/images/uploads/intern/<?Php echo $row->profile_picture ?>" alt=""></span>
                            <span class="pl-2"><?php echo $row->firstname ?> <?php echo $row->lastname ?></span>
                            </td> 
                            <td>
                            <span class=""><img class="responsive round_c" src="<?php echo base_url(); ?>/images/uploads/sponsor/<?Php echo $row->s_profile_picture ?>" alt=""></span>
                            <span class="pl-2"><?php echo $row->s_firstname ?> <?php echo $row->s_lastname ?></span>
                            </td>  
                            <td>
                            <a href="<?php echo base_url() ?>/controller/projectdetails/<?php echo $row->project_id ?>">
                            <button id="" class="ms-inter-btn ms-pt-1 ms-pb-1 pt-1 pb-1 pl-2 pr-2 waves-effect" >View Details</button>
                            </a>
                            </td>  
                        </tr> 
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

        <!-- end of new -->
</section>


<section class="dash-content container section_proj">

        <!--new table -->
            <!-- Table with panel -->
                <div class="card card-cascade narrower">

                <div
                style="background: #33cccc;" class="view view-cascade gradient-card-header narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                <p class="white-text mx-3 m-0">Common project Submissions</p>

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
                            <a href="">Status
                            <i class="fas fa-sort ml-1"></i>
                            </a>
                        </th>
                      
                           
                        <th class="th-lg">
                            <a href="">Sponsor
                            <i class="fas fa-sort ml-1"></i>
                            </a>
                        </th>   
                        <th class="th-lg">
                            <a href="">View Details
                            <i class="fas fa-sort ml-1"></i>
                            </a>
                        </th>     
                        </tr>
                    </thead>
                    <!--Table head-->
            
                    <!--Table body-->
                    <tbody>
                    <?php
                        foreach($opentoall_projects->result() as $row)
                        {
                    ?>
                        <tr>     
                            <td> <i class="fas fa-project-diagram"></i> <?php echo $row->project_title ?>  </td>
                            <td>Proposed</td> 
                          
                            <td>
                            <div class="sub_sponsorimg "><img class="responsive round_c" src="<?php echo base_url(); ?>/images/uploads/sponsor/<?Php echo $row->s_profile_picture ?>" alt=""></div>
                            <p class="pl-2"><?php echo $row->s_firstname ?> <?php echo $row->s_lastname ?></p>
                            </td>  
                            <td>
                            <a href="<?php echo base_url() ?>/controller/projectdetails_common/<?php echo $row->project_id ?>">
                            <button id="" class="ms-inter-btn ms-pt-1 ms-pb-1 pt-1 pb-1 pl-2 pr-2 waves-effect" >View Details</button>
                            </a>
                            </td>  
                        </tr> 
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

        <!-- end of new -->
</section>

<!-- section ge -->
<div class="container">
<section>

 <div class="container">
    <div class="row">
        <div class="col-lg-12">
                   <!-- Table with panel -->
                    <div class="card card-cascade narrower mb-4">

                <div
                    style="background: #33cccc;" class="view view-cascade gradient-card-header narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                    <p class="white-text mx-3 m-0">Growth Experience Approval</p>

                </div>
                <div class="px-4">
                    <div class="table-wrapper">
                    <!--Table-->
                    <table class="table table-hover mb-0">
                        <!--Table head-->
                        <thead>
                        <tr>
                        
                            <th class="th-lg">
                            <a>Intern Name
                                <i class="fas fa-sort ml-1"></i>
                            </a>
                            </th>
                        
                            <th class="th-lg">
                            <a href="">Intern
                                <i class="fas fa-sort ml-1"></i>
                            </a>
                            </th>
                            <th class="th-lg">
                            <a href="">G.E Description
                                <i class="fas fa-sort ml-1"></i>
                            </a>
                            </th>
                        
                            <th class="th-lg">
                            <a href="">Growth Experience Completed Results
                                <i class="fas fa-sort ml-1"></i>
                            </a>
                            </th>        
                        </tr>
                        </thead>
                        <!--Table head-->
                        <?php
                            foreach($growthexp_approval->result() as $row1)
                            {
                            
                        ?>
                    
                        <!--Table body-->
                        <tbody>
                        <tr>   
                            <td><?php echo $row1->firstname ?></td>
                        
                            <td class="w-50">
                                <div class="col-lg-2">
                                <img class="responsive round_c" src="<?php echo base_url(); ?>/images/uploads/intern/<?php echo $row1->profile_picture ?>" alt="intern">
                                </div>
                            </td>  
                            <td><?php echo $row1->ge_name ?></td>
                            <td>
                           
                            <button id="" data-toggle="modal" data-target="#modalCart_<?php echo $row1->assign_geid; ?>" class="ms-inter-btn ms-pt-1 ms-pb-1 pt-1 pb-1 pl-2 pr-2 waves-effect" >Open G.E</button>
                          
                            </td>     
                        </tr> 
                        </tbody>
                        <!--Table body-->

                        

                        <?php
                            }
                        ?>
                    </table>
                    <!--Table-->
                    </div>

                </div>

                </div>
                <!-- Table with panel -->
        </div>
    </div>
 
 </div>

</section>
</div>

<?php
    foreach($growthexp_approval->result() as $row1)
    {                        
?>
<section>

<!-- Modal: modalCart -->
<div class="modal fade" id="modalCart_<?php echo $row1->assign_geid; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title text-center" id="myModalLabel">Evidence of completion </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
        <iframe width="100%" height="280px" src="https://docs.google.com/gview?url=<?php echo base_url() ?>/images/uploads/growth/<?php echo $row1->proofof_ge ?>&embedded=true"></iframe>
      </div>
      <!--Footer-->
      <div class="modal-footer">
      <button type="button" class="btn btn-danger btn-sm reject_ge">Reject</button>
        <button type="button" id="<?php echo $row1->assign_geid ?>" class="btn btn-primary btn-sm approve_ge">Approve</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal: modalCart -->
</section>

<?php
      }
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <button>Action 1</button>
            </div>
        </div>
    </div>
</section>

    <section class="interns-man container">
     <h3 class="text-center">Intern Reports </h3>
        <div class="row">
           

            <div class="col-lg-8">
                <p>&nbsp;</p>
                <div class="row">
        <?php      
            foreach($championintern->result() as $row)
            {
        ?>
                    <div class="col-lg-4 pb-4">
                        <div class="card">
                            <div class="card-img">
                                <img src="<?php echo base_url(); ?>/images/uploads/intern/<?php echo $row->profile_picture ?>" alt="intern">
                            </div>
                            <div class="card-desc">
                                <p class="name"><?php echo $row->firstname; ?></p>
                                <p class="desc"><?php echo $row->intern_area; ?> Intern</p>
                                <ul class="card-stats">
                                    <li><img src="<?php echo base_url(); ?>/images/cog-sm.svg" alt=""><span>3</span></li>
                                    <li><img src="<?php echo base_url(); ?>/images/users.svg" alt=""><span><?php echo $row->networkcompleted_count ?></span></li>
                                    <li><img src="<?php echo base_url(); ?>/images/star-sm.svg" alt=""><span><?php echo $row->growthexperience_count ?></span></li>
                                    <li><img src="<?php echo base_url(); ?>/images/message-sm.svg" alt=""><span><?php echo $row->reviews_count ?></span></li>
                                </ul>
                             
                            </div>
                        </div>
                    </div>
        <?php
            }
        ?>
                </div>
            </div>

            <div class="col-lg-4">
            <div class="relt">
            <p>Latest Interns Activity</p>
            <div class="absl">
                <span><i class="fas fa-minus-square minfier"></i></span>
            </div>
            </div>           
                <div class="row z-depth-1 p-2 brds">
                    <!--Latest Activity user actions-->
                    <?php      
            foreach($internactivity->result() as $row)
            {
        ?>
                    <div class="activity-holder d-flex">
                        <div class="col-lg-2">
                            <span class="action-img">
                                <img id="ac_profile" class="responsive round_c1" src="<?php echo base_url(); ?>/images/uploads/intern/<?php echo $row->profile_picture ?>" alt="">
                            </span>
                        </div>
                        <div class="col-lg-10">
                            <span id="ac_msgi" class="user-action"><?php echo $row->activity_message ?> at 
                            <?php 
                            $saved_date = $row->activity_date; 
                          
                            $current_time = date_default_timezone_set('Asia/Kolkata');
                          
                            $date = date("Y-m-d H:i:s");
                            
                           
                            $date1 = strtotime("$date");  
                            $date2 = strtotime("$saved_date");  
                            // Formulate the Difference between two dates 
                            $diff = abs($date2 - $date1);  
                            
                            
                            // To get the year divide the resultant date into 
                            // total seconds in a year (365*60*60*24) 
                            $years = floor($diff / (365*60*60*24));  
                            
                            
                            // To get the month, subtract it with years and 
                            // divide the resultant date into 
                            // total seconds in a month (30*60*60*24) 
                            $months = floor(($diff - $years * 365*60*60*24) 
                                                        / (30*60*60*24));  
                            
                            
                            // To get the day, subtract it with years and  
                            // months and divide the resultant date into 
                            // total seconds in a days (60*60*24) 
                            $days = floor(($diff - $years * 365*60*60*24 -  
                                        $months*30*60*60*24)/ (60*60*24)); 
                            
                            
                            // To get the hour, subtract it with years,  
                            // months & seconds and divide the resultant 
                            // date into total seconds in a hours (60*60) 
                            $hours = floor(($diff - $years * 365*60*60*24  
                                - $months*30*60*60*24 - $days*60*60*24) 
                                                            / (60*60));  
                            
                            
                            // To get the minutes, subtract it with years, 
                            // months, seconds and hours and divide the  
                            // resultant date into total seconds i.e. 60 
                            $minutes = floor(($diff - $years * 365*60*60*24  
                                    - $months*30*60*60*24 - $days*60*60*24  
                                                    - $hours*60*60)/ 60);  
                            
                            
                            // To get the minutes, subtract it with years, 
                            // months, seconds, hours and minutes  
                            $seconds = floor(($diff - $years * 365*60*60*24  
                                    - $months*30*60*60*24 - $days*60*60*24 
                                            - $hours*60*60 - $minutes*60));  
                            
                            // Print the result 
                            printf("%d days, %d hours "
                               ,$days, $hours);
                            ?>
                             ago
                            </span>
                        </div>
                    </div>
                
                    <?php
                     }
                    ?>

                </div>
                <p>Latest Sponsors Activity</p>
                <div class="row">
                    <!--Latest Activity user actions-->
                    <div class="activity-holder d-flex">
                        <div class="col-lg-2">
                            <span class="action-img">
                                <img id="ac_profile" src="<?php echo base_url(); ?>/images/David Yerow.svg" alt="">
                            </span>
                        </div>
                        <div class="col-lg-10">
                            <span id="ac_msg" class="user-action">David Yerow reviewed Kelsey's project 15 min ago.</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    
    

    <script src="<?php echo base_url(); ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/mdb.js"></script>
    <script src="<?php echo base_url(); ?>/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/bootstrap.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"> </script>
    <script src="<?php echo base_url(); ?>/js/script.js"></script>
    <script src="<?php echo base_url(); ?>/js/custom.js"></script>
    <script>
         $('.toast').toast('show');
         $(function () {
            $('[data-toggle="popover"]').popover(
                container: 'body'
            )
        });
    </script>
    
</body>

</html>