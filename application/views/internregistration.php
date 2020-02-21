<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intern Registration</title>
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
                <h2>Welcome</h2>
            </div>
            <form id="intern_registration" action="<?php echo base_url() ?>controller/insertintern" method="POST" enctype="multipart/form-data">
                <div>
                </div>
                <div class="password"><input type="password" id="pass_intern" class="" name="password" placeholder="Choose a password" />
             
                </div>
                <div class="password"><input type="password" id="cpass_intern" class="" name="cpassword" placeholder="Confirm password" />
               
                </div>
                <p class="m-0">
                    Choose a Profile Picture
                </p>
                <input type="text" value ="<?php echo $token = $_GET['token'];?>" name="token_key" id="token_intern" hidden>
                <div>
                    <input  type="file" name="profilepic_intern" id="profilepic_intern">
                </div>
                <div class="succ_t z-depth-1">
               
                <p class="succ_p">
                   
                </p>
              
                </div>
              
                <div class="err_f z-depth-1">
                    <p class="err_t">
                       
                    </p>
                </div>
                <div><input type="submit" name="sign-in" id="reg_intern" value="Sign Up" />
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