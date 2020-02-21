<?php

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="=UTF-8">
    <title>Survey</title>
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
                    <a class="nav-link waves-effect" href="#">Sponsor Community
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
                <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-bars"></i>
               </a>
            </li>
              
            </ul>

        </div>

    </div>
</nav>
</section>

<section class="sec_surv">

    <div class="container">
        <div class="form_survey m-auto p-1 w-75 z-depth-1">
            <div class="img_sur">
                <img src="<?php echo base_url() ?>/images/isurvey.jpg" alt="" class="responsive">
            </div>
            <p class="p-1 m-1">
                <i>
                This Survey is not a test.This document is to help you start to become familiar with the language we use within the Procurement organization, provide you with some information about our history, and help us gauge what areas you might be interested in within the function. We’ll use this to help further your education as well as find special projects for you to work on during your internship with us.
                </i>
            </p>
            <p class="p-1 m-1 font-weight-bold">
                Survey Questions
            </p>
            <form action="" method="">
                <div class="in_s">
                    <p class="m-1">
                    What do you want to learn this summer?  What experiences would be the most meaningful for you? <span class="erstr">*</span>
                    </p>
                    <p class="m-1">
                    <input type="text" id="wt_learn">
                    </p>
                </div>
                <div class="in_s">
                    <p class="m-1">
                    What does “Procurement” mean to you?<span class="erstr">*</span>
                    </p>
                    <p class="m-1">
                    <input type="text" id="wt_procurement">
                    </p>
                </div>
                <div class="in_s">
                    <p class="m-1">
                    What does “Purchasing” mean to you?<span class="erstr">*</span>
                    </p>
                    <p class="m-1">
                    <input type="text" id="wt_purchasing">
                    </p>
                </div>
                <div class="in_s">
                    <p class="m-1">
                    What is Sourcing?  What are the primary goals of a Sourcing Manager? What is a Situation-Target-Proposal? What are an RFI, and RFP, and an RFQ? <span class="erstr">*</span>
                    </p> 
                    <p class="m-1">
                    <input type="text" id="wt_sourcing">
                    </p>
                </div>
                <div class="in_s">
                    <p class="m-1">
                    Are you familiar with the terms Procure to Pay, Source to Pay, and Contract to Pay?  What do those terms mean to you?<span class="erstr">*</span>
                    </p>
                    <p class="m-1">
                    <input type="text" id="wt_procurepay">
                    </p>
                </div>
                <div class="in_s">
                    <p class="m-1">
                    What is the difference between strategic and tactical?<span class="erstr">*</span>
                    </p>
                    <p class="m-1">
                    <input type="text" id="wt_difst">
                    </p>
                </div>
                <div class="in_s">
                    <p class="m-1">
                    What is a stakeholder?  What are some techniques you would consider using to win over a difficult stakeholder?<span class="erstr">*</span>
                    </p>
                    <p class="m-1">
                    <input type="text" id="wt_stakehold">
                    </p>
                </div>
                <div class="in_s">
                    <p class="m-1">
                    What is Direct Materials Sourcing? <span class="erstr">*</span>
                    </p>
                    <p class="m-1">
                    <input type="text" id="wt_directmaterial">
                    </p>
                </div>
                <div class="in_s">
                    <p class="m-1">
                    What is Indirect Sourcing? <span class="erstr">*</span>
                    </p>
                    <p class="m-1">
                    <input type="text" id="wt_indsourcing">
                    </p>
                </div>
                <div class="in_s">
                    <p class="m-1 font-weight-bold">
                    The Different Procurement Areas <span class="erstr">*</span>
                    </p>
                    <?php
                        foreach($area->result() as $row)
                        {
                    ?>
                    <p class="m-1">
                        <div class="form-check form-check">
                            <input type="checkbox" class="form-check-input area_chck" value="<?php echo $row->Procurement_areas ?>" id="<?php echo $row->area_id ?>_area">
                            <label class="form-check-label" for="<?php echo $row->area_id ?>_area"><?php echo $row->Procurement_areas ?></label>
                        </div>
                    </p>
                    <?php
                        }
                    ?>

                </div>
                <div class="ins_s">
                     <p class="m-1 font-weight-bold">
                          The Different Growth Experiences <span class="erstr">*</span>
                     </p>
                     <?php
                         foreach($ge_name->result() as $row1)
                         {
                     ?>
                     <p class="m-1">
                        <div class="form-check form-check">
                            <input type="checkbox" class="form-check-input growth_chck" id="<?php echo $row1->ge_id ?>" value="<?php echo $row1->ge_name; ?>">
                            <label class="form-check-label" for="<?php echo $row1->ge_id ?>"><?php echo $row1->ge_name; ?></label>
                        </div>
                        </p>
                    <?php
                         }
                    ?>
                </div>
                <div class="ins_s">
                    <p class="m-1 p-1 font-weight-bold">
                    Preparation for Networking and Career Exploration Assignments
                    </p>
                    <p class="m-1 p-1">
                    In program management, Stakeholder Management is the most important thing we do.  This is how we manage our relationships within the function.  It’s important that we understand the needs of our colleagues so that we can offer value-add programming.  When you start your summer internship, your first task is going to be to meet with as many people within the procurement organization as possible.  Remember, you want to learn what’s important to them, but you also want to DEVELOP AS PROFESSIONALS during this period of time. <span class="text_bl"> Use them to learn the function, and learn how they got to this point in their career.  

Also keep in mind that this year, when you interview your colleagues, I want you to find out what projects they’re working on where they can use support or new ideas.  Then for the projects you’re interested in, I want you to put together a proposal which you will present to them on how you can provide a solution to their need and help them achieve their goals. </span> 

                    </p>
                </div>
                <div class="in_s">
                    <p class="m-1">
                    What questions will you ask them during that meeting? <span class="erstr">*</span>
                    </p>
                    <p class="m-1">
                    <input type="text" id="wt_quest">
                    </p>
                </div>

                <input type="text" value="<?php echo $_GET['token'] ?>" id="token_surv" hidden>
                <div class="pos">
                    <div class="ablt">
                        Please answer all starred fields *
                    </div>
                </div>
                <div class="ins_s">
                    <button class="ms-inter-btn ms-pt-5 ms-pb-5 survey_send">
                        Save
                    </button>
                </div>

            </form>
        </div>
    </div>

</section>

<script src="<?php echo base_url(); ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url(); ?>/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>/js/mdb.js"></script>
<script src="<?php echo base_url(); ?>/js/script.js"></script>
<script src="<?php echo base_url(); ?>/js/e-search.js"></script>

<script type="text/javascript">


</script>

</body>
</html>