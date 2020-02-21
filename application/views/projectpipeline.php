
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
                    <a class="nav-link waves-effect" href="#" target="">Project Pipeline</a>
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
                   <a class="dropdown-item" href="<?php echo base_url(); ?>/controller/championprofile">My Account</a>
                   <a class="dropdown-item" href="<?php echo base_url(); ?>/controller/logout">Logout</a>
                   </div>
                  
               </li>
                 
               </ul>

        </div>

    </div>
</nav>
</section>

<section class="mt-5">
    <div class="container">
        <div class="setup1 p-2 mtop">
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

            <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
            <head>
            <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
            <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
            <meta content="width=device-width" name="viewport"/>
            <!--[if !mso]><!-->
            <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
            <!--<![endif]-->
            <title></title>
            <!--[if !mso]><!-->
            <!--<![endif]-->
            <style type="text/css">
                    body {
                        margin: 0;
                        padding: 0;
                    }

                    table,
                    td,
                    tr {
                        vertical-align: top;
                        border-collapse: collapse;
                    }

                    * {
                        line-height: inherit;
                    }

                    a[x-apple-data-detectors=true] {
                        color: inherit !important;
                        text-decoration: none !important;
                    }
                </style>
            <style id="media-query" type="text/css">
                    @media (max-width: 620px) {

                        .block-grid,
                        .col {
                            min-width: 320px !important;
                            max-width: 100% !important;
                            display: block !important;
                        }

                        .block-grid {
                            width: 100% !important;
                        }

                        .col {
                            width: 100% !important;
                        }

                        .col>div {
                            margin: 0 auto;
                        }

                        img.fullwidth,
                        img.fullwidthOnMobile {
                            max-width: 100% !important;
                        }

                        .no-stack .col {
                            min-width: 0 !important;
                            display: table-cell !important;
                        }

                        .no-stack.two-up .col {
                            width: 50% !important;
                        }

                        .no-stack .col.num4 {
                            width: 33% !important;
                        }

                        .no-stack .col.num8 {
                            width: 66% !important;
                        }

                        .no-stack .col.num4 {
                            width: 33% !important;
                        }

                        .no-stack .col.num3 {
                            width: 25% !important;
                        }

                        .no-stack .col.num6 {
                            width: 50% !important;
                        }

                        .no-stack .col.num9 {
                            width: 75% !important;
                        }

                        .video-block {
                            max-width: none !important;
                        }

                        .mobile_hide {
                            min-height: 0px;
                            max-height: 0px;
                            max-width: 0px;
                            display: none;
                            overflow: hidden;
                            font-size: 0px;
                        }

                        .desktop_hide {
                            display: block !important;
                            max-height: none !important;
                        }
                    }
                </style>
            </head>
            <body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color:transparent;">
            <!--[if IE]><div class="ie-browser"><![endif]-->
            <table bgcolor="#283C4B" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color:transparent; width: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td style="word-break: break-word; vertical-align: top;" valign="top">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#283C4B"><![endif]-->
            <div style="background-color:transparent;">
            <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color:transparent;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px"><tr class="layout-full-width" style="background-color:#283C4B"><![endif]-->
            <!--[if (mso)|(IE)]><td align="center" width="600" style="background-color:transparent;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
            <div class="col num12" style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
            <div style="width:100% !important;">
            <!--[if (!mso)&(!IE)]><!-->
            <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
            <!--<![endif]-->
            <div align="center" class="img-container center autowidth" style="padding-right: 25px;padding-left: 25px;">
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 25px;padding-left: 25px;" align="center"><![endif]-->
            <div style="font-size:1px;line-height:25px"> </div><img align="center" alt="Image" border="0" class="center autowidth" src="<?php echo base_url(); ?>/images/u1.png" style="background:white; text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 100px; display: block;" title="Image" width="100"/>
            <div style="font-size:1px;line-height:25px"> </div>
            <!--[if mso]></td></tr></table><![endif]-->
            </div>
            <!--[if (!mso)&(!IE)]><!-->
            </div>
            <!--<![endif]-->
            </div>
            </div>
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
            </div>
            </div>
            </div>
            <div style="background-color:transparent;">
            <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #3AAEE0;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#3AAEE0;">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px"><tr class="layout-full-width" style="background-color:#3AAEE0"><![endif]-->
            <!--[if (mso)|(IE)]><td align="center" width="600" style="background-color:#3AAEE0;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
            <div class="col num12" style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
            <div style="width:100% !important;">
            <!--[if (!mso)&(!IE)]><!-->
            <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
            <!--<![endif]-->
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 20px; padding-left: 20px; padding-top: 30px; padding-bottom: 20px; font-family: Arial, sans-serif"><![endif]-->
            <div style="color:#FFFFFF;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:120%;padding-top:30px;padding-right:20px;padding-bottom:20px;padding-left:20px;">
            <div style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #FFFFFF;">
            <p style="font-size: 18px; line-height: 28px; text-align: center; margin: 0;"><span style="font-family: 'lucida sans unicode', 'lucida grande', sans-serif; font-size: 24px;">Project Request From InternMasters! </span><br/></p>
            </div>
            </div>
            <!--[if mso]></td></tr></table><![endif]-->
            <div align="center" class="img-container center autowidth fullwidth" style="padding-right: 0px;padding-left: 0px;">
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]-->
            <!--[if mso]></td></tr></table><![endif]-->
            </div>
            <!--[if (!mso)&(!IE)]><!-->
            </div>
            <!--<![endif]-->
            </div>
            </div>
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
            </div>
            </div>
            </div>
            <div style="background-color:transparent;">
            <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px"><tr class="layout-full-width" style="background-color:#FFFFFF"><![endif]-->
            <!--[if (mso)|(IE)]><td align="center" width="600" style="background-color:#FFFFFF;width:600px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:10px;"><![endif]-->
            <div class="col num12" style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
            <div style="width:100% !important;">
            <!--[if (!mso)&(!IE)]><!-->
            <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:10px; padding-right: 0px; padding-left: 0px;">
            <!--<![endif]-->
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 30px; padding-left: 30px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
            <div style="color:#283C4B;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:150%;padding-top:10px;padding-right:30px;padding-bottom:10px;padding-left:5px;">
            <div style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 12px; line-height: 18px; color: #283C4B;">

            <p style="font-size: 12px; line-height: 24px; margin: 0;"><span style="font-size: 16px;"><strong><span style="font-family: 'lucida sans unicode', 'lucida grande', sans-serif; line-height: 24px; font-size: 16px;"> <textarea style="width:100%" id="email_req" name="" id="" cols="30" rows="6"> I am (Your name) and I am a student of (Subject name, e.g., philosophy) at your respectable university. With due respect, I have to inform you that I, along with my team, have been working on a project that will allow access to free fresh water without any variable cost. (Describe in your own words). To experiment with this project, we require some fund as well as your approval. (Explain the actual cause and situation).
Kindly allow us to work on something that could influence lives in a better way. (Cordially Describe your requirements). Thank you for your consideration.
Yours sincerely, </textarea> </span></strong></span></p>
            </div>
            </div>
            
           
            <!--[if (!mso)&(!IE)]><!-->
            <div class="setup1 p-2 text-right">
            <button class="waves-effect text-left" data-toggle="modal" data-target="#basicExampleModal_e">Request a Project</button>
            </div>
            </body>
            </html>
        </div>
    </div>
</section>




<!-- Modal -->
<div class="modal fade" id="basicExampleModal_e" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select sponsors</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <!-- Table  -->
            <table class="table table-bordered">
            <!-- Table head -->
            <thead>
                <tr>
                <th>
                   Sponsor Name
                </th>
                <th>Sponsor Email</th>
              
                </tr>
            </thead>
            <!-- Table head -->

            <!-- Table body -->
            <tbody>
            <?php        
            foreach($sponsoremail->result() as $row)
            {
            ?>
                <tr>
                <th scope="row">
                    <!-- Default unchecked -->
                    <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input email_s" id="tableDefaultCheck2_<?php echo $row->sponsor_id ?>" value="<?php echo $row->s_email ?>">
                    <label class="custom-control-label" for="tableDefaultCheck2_<?php echo $row->sponsor_id ?>"><?php echo $row->s_firstname; ?> <?php echo $row->s_lastname; ?></label>
                    </div>
                    
                </th>

                <td><?php echo $row->s_email; ?></td>
                </tr>
            <?php
                }
            ?>
             
            </tbody>
            <!-- Table body -->
            </table>
            <!-- Table  -->
      </div>
      <div class="modal-footer">
      <button class="waves-effect text-left reqprj">Send Request</button>
      </div>
    </div>
  </div>
</div>


<section>
<div class="owl-carousel owl-theme img_slider">
    <div class="item">

    </div>
</div>

</section>



<script src="<?php echo base_url(); ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url(); ?>/js/mdb.js"></script>
<script src="<?php echo base_url(); ?>/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>/js/jquery.richtext.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"> </script>
<script src="<?php echo base_url(); ?>/js/script.js"></script>
<script src="<?php echo base_url(); ?>/js/custom.js"></script>
<script>
     $(document).ready(function() {
            $('#email_req').richText();
        });
        $('.toast').toast('show');

</script>


</body>

</html>