
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Networking Blue Print</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/mdb.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
    
</head>
<body>
<section>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container-fluid">

            <!-- Brand -->
            <a class="navbar-brand pt-0 waves-effect im_logo" href="<?php echo base_url() ?>internprofile">
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
                        <a class="nav-link waves-effect" href="<?php echo base_url(); ?>addgrowthexperience" target="">Growth Experiences</a>
                    </li>
                    <li class="nav-item pr-1">
                        <a class="nav-link waves-effect" href="<?php echo base_url() ?>commonprojects" target="">Project Pipeline</a>
                    </li>
                    <li class="nav-item pr-1">
                        <a class="nav-link waves-effect" href="<?php echo base_url() ?>/controller/networkingblueprint" target="">Networking BluePrint</a>
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
                    <a class="dropdown-item" href="<?php echo base_url(); ?>/controller/internlogout">Logout</a>
                
                    </div>
                
                </li>
                
                </ul>

            </div>

        </div>
    </nav>
</section>


<section>
    <div class="fix_f z-depth-1-half waves-effect">
        <div class="succsf">
           <span><i class="fas fa-check"></i></span><span class="succsf_t"><span>
        </div>
    </div>
</section>


<section class="mt_t section_arb">



</section>

<section>
<div class="container pcontainer">
    <div class="titnet">
        <p class="m-1">
            Network interviews
        </p>
        <div class="datepic">
            
        </div>
    </div>
        <div class="navproj">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mr-auto">
                        <span> <i class="fas fa-th-large"></i> All</span>
                    </div>  
                </div>
                <div class="col-lg-3">      
                    <div class="ml-auto">
                        <select class="filter_proj" id="fltrarea">
                            <option value="">- Interview Category -</option>
                            <option value="All">All</option>
                            <?php foreach($networkfilter->result() as $row )
                            { 
                            ?>
                            <option value="<?php echo $row->Procurement_areas ?>"><?php echo $row->Procurement_areas ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>  
                </div>
            </div>  
        </div>
        <div class="row">
            <?php 
            foreach($networkinginterview->result() as $row)
            {
            ?>
            <div class="col-lg-3">
                <div class="crd_project">
                    <div class="pro_tit">
                        <p class="m-1"> <?php echo $row->functional_assignments ?></p>
                        <p class="m-1"><span> <?php echo $row->areaof_expertice ?></span></p>
                    </div>
                    <div class="pro_descrp">
                        <p class="m-1">
                        <?php echo $row->employer_name ?>
                        </p>
                    </div>
                    <div class="proapply">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="imgsponsor brdsponsor">
                                <img src="<?php echo base_url() ?>/images/icons/interview.png" alt="" class="responsive">
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="req_proj">
                                    <button id="<?php echo $row->network_id ?>" class="waves-effect addintb spinet_<?php echo $row->network_id ?>"> <i class="fas fa-plus-circle"></i> Add interview</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>

<section>
    <?php
        foreach($intern_details->result() as $row1)
        {
            $intern_id = $row1->id;
            $champion_id = $row1->champion;
    ?>
    <input type="text" id="chmp_dtl" value="<?php echo $champion_id ?>" hidden>
    <input type="text" id="intrn_id" value="<?php echo $intern_id ?>" hidden>
    <?php
        }
    ?>
</section>
  

<script src="<?php echo base_url(); ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url(); ?>/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>/js/mdb.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"> </script>
<script src="<?php echo base_url(); ?>/js/script.js"></script>
<script>
  $('.toast').toast('show');
  
  $('#date-picker-example').pickadate({
        selectMonths: true, 
        selectYears: 20 
      });
      
    $('select').material_select();
</script>
</body>
</html>