<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/mdb.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
    
</head>
<body>
 
   <body>
    <section class="login-form">
        <div class="logo">
            <img src="<?php echo base_url(); ?>/images/u1.png" alt="intern-masters">
        </div>
        <div class="elem-container">
            <div>
                <h5> Choose a New Password</h5>
            </div>
            <form id="" action="" method="POST" enctype="multipart/form-data">
                <div>
                </div>
                <div class="email">
                <input type="password" id="res_p" class="" name="password" placeholder="Password" />
                <input type="text" id="res_token" value="<?php echo $_GET['token'] ?>" hidden>
                </div>
               
          
          
                <div class="succ_t z-depth-1">
               
                <p class="succ_p">
                   
                </p>
              
                </div>
              
                <div class="err_f z-depth-1">
                    <p class="err_t">
                       
                    </p>
                </div>
                <div><input type="submit" name="sign-in" id="upd_p" value="Update" />
                </div>
            </form>
           
        </div>
    </section>
</body>


    <script src="<?php echo base_url(); ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>/js/mdb.js"></script>
    <script src="<?php echo base_url(); ?>/js/script.js"></script>
</body>
</html>