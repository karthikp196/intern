
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Process</title>
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
                <h2>Welcome Back</h2>
            </div>
            <form action="" method="POST">
                <div><input type="text" class="l_email" name="email" placeholder="Email" />
                </div>
                <div class="password"><input type="password" id="pass_w" class="l_pass" name="password" placeholder="Password" />
                <input type="checkbox" class="class_checkbox">
                <img class="pass_v" src="<?php echo base_url(); ?>/images/u6.svg">
                </div>
                <div class="succ_t z-depth-1">
               
                <p class="succ_p">
                   
                </p>
              
                </div>
              
                <div class="err_f z-depth-1">
                    <p class="err_t">
                       
                    </p>
                </div>
                <div><input type="submit" name="sign-in" id="log_in" value="Sign In" />
                </div>
            </form>
            <div>
                <a href="<?php echo base_url(); ?>/controller/cforgotpassword">Forgot password?</a>
            </div>
        </div>
    </section>
</body>


    <script src="<?php echo base_url(); ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>/js/mdb.js"></script>
    <script src="<?php echo base_url(); ?>/js/script.js"></script>
</body>
</html>