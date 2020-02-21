<?php
if(!($this->session->userdata('intern_id'))){
    $this->load->helper('url');
    redirect( base_url()."internlogin" );  
 
  }

?>

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
                        <a class="nav-link waves-effect" href="<?php echo base_url() ?>addgrowhexperience" target="">Growth Experiences</a>
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


<section class="margin_top5">

<div class="container rltv">
    <div class="growthexpsearch m-auto text-center">
        <input type="text" id="search_ge"> <input type="submit" id="search_gesub" value="search">
    </div>
    <div class="growthexpsearch m-auto  z-depth-1 p-1 autocomplete_ge">
        <p id="fill_txt" class="m-1 compltxt">
            
        </p>  
    </div>
</div>
<div class="container">
    <div class="dynmc mt-3 z-depth-1 p-2">
        <div class="row text-center">
           
            <div class="col-lg-5">
                Title
            </div>
            <div class="col-lg-5">
                Description
            </div>
            <div class="col-lg-2">
                <button class="add_ge">Add</button>
            </div>
        </div>
        <div class="form-check">
        <?php
            foreach($growthexpall->result() as $row)
            {
        ?>
            <div id="rowof_<?php echo $row->ge_id ?>" class="row m-2 p-1 row_bg">
                <div class="col-lg-5 chckbox_ge">
                    <input type="checkbox" class="form-check-input growth_addval" id="<?php echo $row->ge_id ?>">
                    <label class="form-check-label" for="<?php  echo $row->ge_id ?>"><?php echo $row->ge_name ?></label>
                </div>
                <div class="col-lg-5">
                    <?php echo $row->ge_description ?>
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
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"> </script>
<script src="<?php echo base_url(); ?>/js/script.js"></script>
<script>
  $('.toast').toast('show');
</script>

</body>
</html>