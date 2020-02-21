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
    <title>Sponsor Community</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/mdb.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
    
</head>
<body>
<section>
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand pt-0 waves-effect im_logo" href="<?php echo base_url() ?>championdashboard">
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
                    <a class="nav-link waves-effect" href="<?php echo base_url() ?>projectpipeline" target="">Project Requests</a>
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
                   <a class="dropdown-item" href="<?php echo base_url(); ?>/controller/championdashboard">Dashboard</a>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>/controller/logout">Logout</a>
                   </div>
                  
               </li>
              
            </ul>

        </div>

    </div>
</nav>
</section>

<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 mt-5 p-2 z-depth-3 mycls">
                <h4 class="text-center">
                    Survey Results
                </h4>
                <?php
                    foreach($surveyresult->result() as $row1)
                    {
                    
                ?>
                <div class="row">
                    <div class="col-lg-12">
                       <div class="col-lg-2 m-auto p-1">
                       <img class="responsive" src="<?php echo base_url(); ?>/images/uploads/intern/<?php echo $row1->profile_picture ?>" alt="intern">
                       </div>
                    </div>
                    <div class="col-lg-12">
                     <p class="m-0 text-center name_t">             
                         <b><?php echo $row1->firstname; ?>  <?php echo $row1->lastname; ?></b> 
                        </p> 
                    </div>
                
                    <div class="col-lg-12">
                            <table class="table table-hover table-sm table">
                                    <!-- Table head -->
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Survey Name</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>
                                    <!-- Table head -->
                        
                                    <!-- Table body -->
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                        <code>Area Of Interest</code>
                                        </td>  
                                        <td class="area_i w-50">    
                                            <?php
                                                $area = $row1->areaof_interest;
                                                $array =  explode(',', $area);
                                                $i = 1;
                                                $k =1;
                                                foreach ($array as $item) 
                                            {
                                            ?> 
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <p>
                                                        <span class="<?php echo $item ?>" id="area_int_<?php echo $k++ ?>">
                                                        <?php echo $item ?>
                                                        </span> 
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <button id="<?php echo $i++ ?>" class="btn btn-mycs btn-sm my-0 waves-effect waves-light  imp_a">
                                                            import
                                                        </button>
                                                    </div>
                                                </div>
                                           
                                            <?php
                                                }
                                            ?>  
                                            <input type="text" class="us_id" value ="<?php echo $row1->id ?>" hidden>
                                        </td>                                       
                                   
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                        <code>Potential Growth Experience</code>
                                        </td>
                                        <td>
                                             <?php
                                              $area1 = $row1->growth_experience;
                                              $ge_id = $row1->growthexp_id;
                                              $array1 =  explode(',', $area1);
                                              $array2 = explode(',',$ge_id);
                                              $i = 1;
                                              $k = 1;
                                              foreach (array_combine($array1, $array2) as $array1 => $array2) {
                                                {
                                                   
                                              ?>
                                              
                                                <div class="form-check form-check">
                                                        <input type="checkbox" class="form-check-input growth_exp" name="<?php echo $array2 ?>" id="ge_<?php echo $array2 ?>" value="<?php echo $array1; ?>">
                                                        <label class="form-check-label" for="ge_<?php echo $array2 ?>"><?php echo $array1 ?></label>
                                                        
                                                </div>
                                                <?php
                                                    
                                                    }
                                                ?>

                                                <?php
                                                    
                                                       
                                                      }
                                                ?>
                                             <input type="text" value="<?php echo $row1->champion ?>" class="champ_id" hidden>
                                             <button id="<?php echo $row1->id; ?>" class="btn btn-mycs btn-sm my-0 waves-effect waves-light imp_ge">
                                                            import
                                            </button>
                                            
                                         </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">3</th>
                                        <td>
                                        <code>What do you want to learn this summer?  What experiences would be the most meaningful for you? </code>
                                        </td>
                                        <td><?php echo $row1->what_learn_summer ?></td>   
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>
                                        <code>What does “Procurement” mean to you?</code>
                                        </td>
                                        <td><?php echo $row1->what_Procurement ?></td>   
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>
                                        <code>What does “Purchasing” mean to you?</code>
                                        </td>
                                        <td><?php echo $row1->what_Purchasing ?></td>   
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>
                                        <code>What is Sourcing?  What are the primary goals of a Sourcing Manager? What is a Situation-Target-Proposal? What are an RFI, and RFP, and an RFQ?</code>
                                        </td>
                                        <td><?php echo $row1->what_Sourcing ?></td>   
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>
                                        <code>Are you familiar with the terms Procure to Pay, Source to Pay, and Contract to Pay?  What do those terms mean to you?</code>
                                        </td>
                                        <td><?php echo $row1->familiar_with_procure ?></td>   
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>
                                        <code>What is the difference between strategic and tactical?</code>
                                        </td>
                                        <td><?php echo $row1->difference_between_strategic ?></td>   
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td>
                                        <code>What is a stakeholder?  What are some techniques you would consider using to win over a difficult stakeholder?</code>
                                        </td>
                                        <td><?php echo $row1->what_stakeholder ?></td>   
                                    </tr>
                                    <tr>
                                        <th scope="row">10</th>
                                        <td>
                                        <code>What is Direct Materials Sourcing?</code>
                                        </td>
                                        <td><?php echo $row1->what_dms ?></td>   
                                    </tr>

                                    <tr>
                                        <th scope="row">11</th>
                                        <td>
                                        <code>What is Indirect Sourcing?</code>
                                        </td>
                                        <td><?php echo $row1->what_idms ?></td>   
                                    </tr>

                                    <tr>
                                        <th scope="row">12</th>
                                        <td>
                                        <code>What questions will you ask them during that meeting?</code>
                                        </td>
                                        <td><?php echo $row1->what_questions ?></td>   
                                    </tr>
                                
                                    </tbody>
                                    <!-- Table body -->
                                </table>
                    </div>
                        
                    <?php
                        }
                    ?>
                </div>
            </div>

            <div class="col-lg-5 mt-5 p-2 z-depth-2 int_pr">
                <h4 class="text-center">
                    Intern Profile
                </h4>
                <?php
                    foreach($surveyresult->result() as $row1)
                    {
                    
                ?>
                <div class="row">
                    <div class="col-lg-4">
                       <div class="col-lg-8 m-auto p-1">
                       <img class="responsive" src="<?php echo base_url(); ?>/images/uploads/intern/<?php echo $row1->profile_picture ?>" alt="intern">
                       </div>
                    </div>
                    <div class="col-lg-6">
                     <p class="m-0  name_t">             
                         <b><?php echo $row1->firstname; ?>  <?php echo $row1->lastname; ?></b> 
                     </p> 
                     <p class="m-0 p-1 txt_ie">
                         <i class="fas fa-envelope"></i> <?php echo $row1->email ?>
                     </p>
                    </div>
                    <div class="col-lg-12">
                        <table class="table">
                        <thead class="black white-text">
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">Assign Tasks</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td>Area Of Interest</td>
                                <td></td>
                                <td >
                                <p id="<?php echo $row1->intern_area?>" class="area_cls m-0" data-toggle="modal" data-target="#modalPush">
                                <?php echo $row1->intern_area ?>
                                </p>
                                
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>Growth Experience</td>
                                <td></td>
                                <td >
                                    <?php
                                        foreach($ge_result->result() as $row)
                                        {
                                    ?>
                                           <p>
                                            <span style="color:green"><i class="fas fa-check"></i></span> <?php echo $row->ge_name; ?>
                                           </p>
                                    <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                        </table>

                    </div>
                 
                       <!--Modal: modalPush-->
                        <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-notify modal-info modal-lg" role="document">
                                            <!--Content-->
                                            <div class="modal-content text-center">
                                            <!--Header-->
                                            <div class="d-flex justify-content-center">
                                                <p class="heading text-body">Assign Network Interview</p>
                                            </div>

                                            <!--Body-->
                                            <div class="modal-body">
                                                <div id="my_netinterview">
                                                        <!-- Table  -->
                                                        <table class="table table-bordered">
                                                        <!-- Table head -->
                                                        <thead>
                                                            <tr>
                                                            <th>
                                                            Name
                                                            </th>
                                                            <th>Area of Expertice</th>
                                                            <th>Email</th>
                                                            <th>Address</th>
                                                            </tr>
                                                        </thead>
                                                        <!-- Table head -->
                                                        <!-- Table body -->
                                                    
                                                            <tbody class="net_intable">
                                                                <tr>
                                                                <th scope="row">
                                                                    <!-- Default unchecked -->
                                                                    <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="tableDefaultCheck2" checked>
                                                                    <label class="custom-control-label" for="tableDefaultCheck2">Recruiter 1</label>
                                                                    </div>
                                                                </th>
                                                                <td>Marketing</td>
                                                                <td>recruiter1@gmail.com</td>
                                                                <td>California</td>
                                                                </tr>
                                                            </tbody>

                                                    
                                                    
                                                        <!-- Table body -->
                                                        </table>
                                                        <!-- Table  -->
                                                </div>
                                            </div>

                                            <!--Footer-->
                                            <div class="modal-footer flex-center">
                                            <button type="button" id="<?php echo $row1->id ?>" class="ms-inter-btn ms-pt-5 ms-pb-5 waves-effect assign_netwrk">Assign Interview</button>
                                            </div>
                                            </div>
                                            <!--/.Content-->
                                        </div>
                        </div>
                    <!-- end of modal push -->

                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

       
<section>
    <div class="sucx z-depth-1">
    <i class="fas fa-bell mdb-gallery-view-icon"></i> <span class="sucx_span">Success</span>
    </div>
</section>
 



<script src="<?php echo base_url(); ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url(); ?>/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>/js/mdb.js"></script>
<script src="<?php echo base_url(); ?>/js/script.js"></script>
<script src="<?php echo base_url(); ?>/js/e-search.js"></script>


</body>
</html>