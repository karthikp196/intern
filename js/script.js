$(document).ready(function()
{
    var base_url = 'http://localhost/internmastersgit/';

  //Champion Login
  $("#log_in").click(function(e)
  {
    e.preventDefault();
    var email = $(".l_email").val();
    var password = $(".l_pass").val();
    var data = "l_email="+email+"&l_pass="+password;

    if(email.length <= 0)
    {
      $(".err_f").css('display','block');
      $(".err_t").html("Email Field cannot be empty");
      $(".err_f").fadeOut(4000);
    }
    
    else if(password.length <= 0 )
    {
      $(".err_f").css('display','block');
      $(".err_t").html("Password Field cannot be empty");
      $(".err_f").fadeOut(4000);
    }
    
    else
    {
      $.ajax(
        {
            url:base_url+"/controller/logindata",
            method:"POST",
            data:data,
            dataType:"JSON", 
            success:function(data)
            {
                if(data.error==0)
                {
                 
                  $(".succ_t").css('display','block');
                  $(".succ_p").html("Successfully Logged In");
                  window.location.href=base_url+'championdashboard';
                }

                else{
                  $(".err_f").css('display','block');
                  $(".err_t").html("Invalid Credentials");
                  $(".err_f").fadeOut(4000);
                }
            }
        }
      )
    }

  });

  //update about data of champion

  $(".upd_abtchmp").click(function()
  {
    var about_updid = $(this).attr('id');
    var abt_cont = $("#abtchmp").html();
    var data ="about_chmpid="+about_updid+"&abt_cont="+abt_cont;
    var success_url = base_url+"championprofile";
    $.ajax(
      {
        url:base_url+"/controller/abtchmp",
        method:"POST",
        data:data,
        dataType:"TEXT",
        success:function(data)
        {
          if(data==1)
          {
            $(".fixd_f").css('display','block');
            $(".sucs_t").html("About Information updated Successfully");
            $(".fixd_f").fadeOut(5000);
            function error_time(){
                window.location.href = success_url;
              }
              setTimeout(error_time, 1500);
          }
          else 
          {
            alert("unable to update the information");
          }
        }
      }
    );
  });

  //update video blogs on champion

 $(".upld_chmv").click(function()
 {
   var video_id = $(this).attr('id');
   var user_id = $(".usr_id").attr('id');
   var vid_src = $("#"+"vid_src_"+video_id).val();
   var data = "user_id="+user_id+"&video_id="+video_id+"&vid_src="+vid_src;
   var success_url = base_url+"championprofile";
   $.ajax(
     {
       url:base_url+"/controller/uploadchampy",
       method:"POST",
       data:data,
       dataType:"TEXT",
       success:function(data)
       {
        if(data==1)
        {
          $(".fixd_f").css('display','block');
          $(".sucs_t").html("video updated Successfully");
          $(".fixd_f").fadeOut(5000);
          function error_time(){
              window.location.href = success_url;
            }
            setTimeout(error_time, 1500);
        }
        else 
        {
          alert("unable to update the information");
        }
       }
     }
   )
 });

 //delete Champion video blogs
 $(".dlt_chmpy").click(function()
 {
   var vid_id = $(this).attr('id');
   var user_id = $(".usr_id").attr('id');
   var data = "user="+user_id+"&vid_id="+vid_id;
   var success_url = base_url+"championprofile";
   $.ajax(
    {
      url:base_url+"/controller/deletechampy",
      method:"POST",
      data:data,
      dataType:"TEXT",
      success:function(data)
      {
    
       if(data==1)
       {
         $(".fixd_f").css('display','block');
         $(".sucs_t").html("video Deleted Successfully");
         $(".fixd_f").fadeOut(5000);
         function error_time(){
             window.location.href = success_url;
           }
           setTimeout(error_time, 1500);
       }
       else 
       {
         alert("unable to update the information");
       }
      }
    }
  );

 });


 // Add a new champion video blog
 $("#add_chmpy").click(function()
 {
   var video = $("#vid_srchmy").val();
   var id = $(".usr_id").attr('id');
   var data = "id="+id+"&video="+video;
   var success_url = base_url+"championprofile";
   if(video.length == 0)
   {
     alert("please provide a video link");
   }
   else
   {
    $.ajax(
      {
        url:base_url+"/controller/addchampy",
        method:"POST",
        data:data,
        dataType:"TEXT",
        success:function(data)
        {   
         if(data==1)
         {
           $(".fixd_f").css('display','block');
           $(".sucs_t").html("video Added Successfully");
           $(".fixd_f").fadeOut(5000);
           function error_time(){
               window.location.href = success_url;
             }
             setTimeout(error_time, 1500);
         }
         else 
         {
           alert("unable to update the information");
         }
        }
      }
    );
   }

 });

 //invititation for intern from champion
 $(".invite_int").click(function()
 {
   var champion = $(".champ_id").val();
   var inv_name = $(".inv_name").val();
   var inv_email = $(".inv_email").val();
   var comp_email = $(".comp_email").val();
   var message = $(".inv_msg").val();
   var token = Math.random().toString(13).replace('0.', '') ;
   var data = "champion="+champion+"&inv_name="+inv_name+"&inv_email="+inv_email+"&comp_email="+comp_email+"&message="+message+"&token="+token;
   var success_url = base_url+"championdashboard";
   function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email );
    }

   if(inv_name.length == 0)
   {
    $(".inv_infail").css('display','block');
    $(".inv_infail").html("Name field Cannot be empty");
    $(".inv_infail").fadeOut(5000);
   }
   else if(inv_email.length == 0)
   {
    $(".inv_infail").css('display','block');
    $(".inv_infail").html("Email field Cannot be empty");
    $(".inv_infail").fadeOut(5000);
   }
   else if( !validateEmail(inv_email))
   {
    $(".inv_infail").css('display','block');
    $(".inv_infail").html("Please enter a valid Email");
    $(".inv_infail").fadeOut(5000);
   }
   else if(comp_email.length ==0)
   {
    $(".inv_infail").css('display','block');
    $(".inv_infail").html("Please enter a valid Mobile number");
    $(".inv_infail").fadeOut(5000);
   }
   
   else if(message.length == 0)
   {
    $(".inv_infail").css('display','block');
    $(".inv_infail").html("Please enter message to send");
    $(".inv_infail").fadeOut(5000);
   }

   else
   {
    $.ajax(
      {
        url:base_url+"/controller/inviteintern",
        method:"POST",
        data:data,
        dataType:"TEXT",
        beforeSend: function() { $('.invite_int').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Sending...').attr('disabled', true); },
        complete: function() { $('.invite_int').html("sent"); },
        success:function(data)
        {
        
           if(data == 1)
           {
               $(".inv_in").css('display','block');
               $(".inv_in").html("Invitation send successfully waiting for intern response");
               $(".inv_in").fadeOut(5000);
               function error_time(){
                 window.location.href = success_url;
               }
               setTimeout(error_time, 1500);
           }
           else
           {
             $(".inv_infail").css('display','block');
             $(".inv_infail").html("Intern Email already Registered");
             $(".inv_infail").fadeOut(5000);
           }
        }
      }
    )
   }

});


 //intern login

 $("#int_login").click(function(inl)
 {
   inl.preventDefault();
   var intern_email = $("#int_email").val();
   var intern_password = $("#int_pass").val();
   var data = "intern_email="+intern_email+"&intern_password="+intern_password;
   var success_url = base_url+"internprofile";
   if(intern_email.length <= 0 )
   {
    $(".err_f").css('display','block');
    $(".err_t").html("Email field cannot be empty");
    $(".err_f").fadeOut(4000);
   }
   else if(intern_password.length <= 0)
   {
    $(".err_f").css('display','block');
    $(".err_t").html("Password field cannot be empty");
    $(".err_f").fadeOut(4000);
    
   }
   else
   {
     $.ajax(
       {
         url:base_url+"/controller/internsignin",
         method:"POST",
         data:data,
         dataType:"TEXT",
         success:function(data)
         {
          if(data == 1)
          {
            
            $(".succ_t").css('display','block');
            $(".succ_p").html("Successfully Logged In");
            window.location.href=success_url;
          }

        else
        {
          $(".err_f").css('display','block');
          $(".err_t").html("Invalid Credentials");
          $(".err_f").fadeOut(4000);
        }
        
         }
       }
     )
   }

 });  

 //update intern profile informations 

 $(".update_intern").click(function()
 {
    var intern_id = $("#iu_id").val();
    var intern_name = $("#iu_fname").val();
    var intern_lname = $("#iu_lname").val(); 
    var intern_mobile = $("#iu_phone").val();
    var intern_college = $("#iu_college").val();
    var intern_address = $("#iu_address").val();
    var intern_about = $("#iu_abt").val();
    var data = {intern_id:intern_id,intern_name:intern_name,intern_lname:intern_lname,intern_mobile:intern_mobile,intern_college:intern_college,intern_address:intern_address,intern_about:intern_about};                                                                     
    //var data ="intern_id="+intern_id+"&intern_name="+intern_name+"&intern_lname="+intern_lname+"&intern_mobile="+intern_mobile+"&intern_college="+intern_college+"&intern_address="+intern_address+"&intern_about="+intern_about;
    var success_url = base_url+"internprofile";
    function validateEmail($fname) {
      var emailReg = /^[a-zA-Z\s]+$/;
      return emailReg.test( $fname );
      }

      function validatenumber($number) {
        var numbers = /^\d*$/;
        return numbers.test( $number );
        }
  

      

   if( !validateEmail(intern_name))
   {
    toastr.error("Please enter a valid Name");    
   }

   else if(intern_name.length == 0)
   {
     toastr.error("First Name cannot be empty");
   }
   else if(intern_address.length == 0)
   {
    toastr.error("Please enter a valid Address");  
   }
   else if( !validateEmail(intern_lname))
   {
    toastr.error("Please enter a valid Last Name");  
   }

   else if( !validatenumber(intern_mobile))
   {
    toastr.error("Please enter a valid Mobile Number");  
   }

   else if(intern_mobile.length < 8)
   {
    toastr.error("Please enter a valid length mobile number");  
   }

   else
   {
    $.ajax(
    {
        url:base_url+"/controller/updateintern",
        method:"POST",
        data:data,
        dataType:"TEXT",
        success:function(data)
        {
         
          if(data == 1)
          {
            toastr.success("Your Personal details has been updated successfully");  
          }
          else
          {
            alert("failed");
          }
        }
    }
    )
   }

   
 });

 
 $("#centralModalLg").on('hide.bs.modal', function(){
  location.reload(true);
 });

   //intern video upload

   $("#add_inty").click(function()
   {
     var video_src = $("#intern_vsrc").val();
     var user_id = $(".user_id").val();
     var data = "user_id="+user_id+"&video_src="+video_src;
     var success_url = base_url+"internprofile";
     url_validate = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
     if(!url_validate.test(video_src)){
        toastr.error('Please Enter a Valid Url');
     }
     else{
           $.ajax(
       {
         url:base_url+"/controller/internaddvideo",
         method:"POST",
         data:data,
         dataType:"TEXT",
         success:function(data)
         {
          if(data == 1)
          {

            toastr.success(" Video Blog Added Successfully");
            function error_time(){
              window.location.href = success_url;
            }
            setTimeout(error_time, 2000);
          }
          else
          {
            toastr.error("Failed"); 
          }
         }
       }
     )
     }
  
   });

   //intern video delete
   $(".dlt_iv").click(function()
   {
     var video_id = $(this).attr('id');
     var user = $(".user_id").val();
     var data = "user="+user+"&video_id="+video_id;
     var success_url = base_url+"internprofile";
     if (confirm('Are you sure ?')) {
      $.ajax(
        {
          url:base_url+"/controller/interndltvideo",
          method:"POST",
          data:data,
          dataType:"TEXT",
          success:function(data)
          {
            if(data == 1)
            {
              toastr.success("video blog Removed successfully");
              function error_time(){
                window.location.href = success_url;
              }
              setTimeout(error_time, 2000);
            }
            else
            {
              alert("failed");
            }
          }
        }
      )
     }
   
     
   });

   //intern video edit
   $(".edit_inty").click(function()
   {
     var v_id = $(this).attr('id');
     var v_src = $("#"+"intern_evsrc_"+v_id).val();
     var user_id = $(".user_id").val();
     var data = "v_id="+v_id+"&v_src="+v_src+"&user_id="+user_id;
     var success_url = base_url+"internprofile";
     
     $.ajax(
      {
        url:base_url+"/controller/internedtvideo",
        method:"POST",
        data:data,
        dataType:"TEXT",
        success:function(data)
        {
          if(data == 1)
          {
            $(".fix_f").css('display','block');
            $(".succsf_t").html(" Video Blog Edited Successfully");
            function error_time(){
              window.location.href = success_url;
            }
            setTimeout(error_time, 2000);
          }
          else
          {
            alert("failed");
          }
        }
      }
    )
   })

   //intern media upload
   $("#add_intm").click(function()
   {
     var media_src = $("#intern_msrc").val();
     var user_id = $(".user_id").val();
     var data = "user_id="+user_id+"&media_src="+media_src;
     var success_url = base_url+"internprofile";
     $.ajax(
       {
         url:base_url+"/controller/internaddmedia",
         method:"POST",
         data:data,
         dataType:"TEXT",
         success:function(data)
         {
          if(data == 1)
          {
            $(".fix_f").css('display','block');
            $(".succsf_t").html(" New article Added Successfully");
            function error_time(){
              window.location.href = success_url;
            }
            setTimeout(error_time, 2000);
          }
          else
          {
            alert("failed");
          }
         }
       }
     )
   });
   //intern media delete
   $(".dlt_media").click(function()
   {
    var media_id = $(this).attr('id');
    var user = $(".user_id").val();
    var data = "user="+user+"&media_id="+media_id;
    var success_url = base_url+"internprofile";
    if (confirm('Are you sure ?')) {
      $.ajax(
        {
          url:base_url+"/controller/interndltmedia",
          method:"POST",
          data:data,
          dataType:"TEXT",
          success:function(data)
          {
           if(data == 1)
           {
             toastr.success("article Removed successfully");
             function error_time(){
               window.location.href = success_url;
             }
             setTimeout(error_time, 2000);
           }
           else
           {
             alert("failed");
           }
          }
        }
      )
    }

   });

   //edit media
   $(".upd_media").click(function()
   {
    var m_id = $(this).attr('id');
    var m_src = $("#"+"intern_msrcedt_"+m_id).val();
    var user_id = $(".user_id").val();
    var data = "m_id="+m_id+"&m_src="+m_src+"&user_id="+user_id;
    var success_url = base_url+"internprofile";
    $.ajax(
     {
       url:base_url+"/controller/internedtmedia",
       method:"POST",
       data:data,
       dataType:"TEXT",
       success:function(data)
       {
        if(data == 1)
        {
          $(".fix_f").css('display','block');
          $(".succsf_t").html(" article Edited Successfully");
          function error_time(){
            window.location.href = success_url;
          }
          setTimeout(error_time, 2000);
        }
        else
        {
          alert("failed");
        }
       }
     }
   )
   })

 
//intern Registration
 $("#reg_intern").click(function(subt)
 {
  subt.preventDefault();
  var pass = $("#pass_intern").val();
  var cpass = $("#cpass_intern").val();
  var profile = $("#profilepic_intern").val();
  var token = $("#token_intern").val();
  
  if(pass.length <=0)
  {
    $(".err_f").css('display','block');
    $(".err_t").html("Password should be minimum 8 characters");
    $(".err_f").fadeOut(4000);
  }
  else if(cpass.length <=0)
  {
    $(".err_f").css('display','block');
    $(".err_t").html("Confirm Password should be minimum 8 characters");
    $(".err_f").fadeOut(4000);
  }
  

  else if(profile.length <=0)
  {
    $(".err_f").css('display','block');
    $(".err_t").html("Please select a profile picture");
    $(".err_f").fadeOut(4000);
    
  }
  else if(token.length <=0)
  {
    alert("token is empty");
  }

  else if(pass != cpass)
  {
    $(".err_f").css('display','block');
    $(".err_t").html("Password mismatch");
    $(".err_f").fadeOut(4000);
  }

  else
  {
    $("#intern_registration").submit();
  }

 });

 //intern profile picture

 $(".subprof_pic").click(function(pp)
 {
   pp.preventDefault();
   var file_data = $("#inputGroupFileAddon01").prop("files"); // Getting the properties of file from file field
   var form_data = new FormData(); // Creating object of FormData class
   form_data.append("file", file_data) // Appending parameter named file with properties of file_field to form_data

   $.ajax({
     url: base_url+"/controller/updateinernpic", // Upload Script
     dataType: 'script',
     cache: false,
     contentType: false,
     processData: false,
     data: form_data, // Setting the data attribute of ajax with file_data
     type: 'post',
     success: function(data) {
      alert(data);
     }
   });
 })
 

//import the survey results to the intern profile
 $(".imp_a").click(function()
 {
   var btn_id = $(this).attr('id');
   var user = $(".us_id").val();
   var area = $("#"+"area_int_"+btn_id).attr('class');
   var data = "user="+user+"&area="+area;
  
    $.ajax(
     {
       url:base_url+"/controller/importsurvey",
       method:"POST",
       data:data,
       dataType:"TEXT",
       success:function(data)
       {
       
        location.reload(true);
      
       }
     }
   )
  
 });

 //Adding growth experience to the intern profile
 $(".imp_ge").click(function()
 {
  var btn_id = $(this).attr('id');
  var growth_exp = $('.growth_exp:checked').map(function() {return this.name;}).get().join(',');
  var champion = $(".champ_id").val();
  var data = "intern="+btn_id+"&champion="+champion+"&growth_exp="+growth_exp;
  
  $.ajax(
    {
      url:base_url+"/controller/growthexp_assign",
      method:"POST",
      data:data,
      dataType:"TEXT",
      beforeSend: function() { 
        $('.imp_ge').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Assigning...').attr('disabled', true); 
    },
      complete: function() { 
        $('.imp_ge').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Assigned').attr('disabled', true); 
    },
      success:function(data)
      {
      
        $(".sucx").css('display','block');
        $(".sucx_span").html(data);
        function error_time(){
          location.reload(true);
        }
        setTimeout(error_time, 2000);
      }
    }
  )

 })


 //champion social media

 $("#media_edit").click(function()
 {
   alert("Social media links updated success");
 })

//Toggle function for the navbar
  $(".tgl_nav").click(function()
  {
    $(".profile_m").toggleClass("display_n");
  })

//Changing password type to text
  

$(".class_checkbox").click(function()
{
 
  if( $(".class_checkbox:checked").length > 0 ){
    $(".l_pass").attr('type', 'text');
  }
  else
  {
    $(".l_pass").attr('type', 'password');
  }
  

});

$(".class_checkbox1").click(function()
{
 
  if( $(".class_checkbox1:checked").length > 0 ){
    $("#int_pass").attr('type', 'text');
  }
  else
  {
    $("#int_pass").attr('type', 'password');
  }
  

});

$(".class_checkbox2").click(function()
{
 
  if( $(".class_checkbox2:checked").length > 0 ){
    $("#s_pass").attr('type', 'text');
  }
  else
  {
    $("#s_pass").attr('type', 'password');
  }
  

});

  //function for champion video edit option controls
  $(".edit_but").click(function()
  {
    $(".edit_controlsy").toggleClass("display_n");
  });

  $("#edit_ab_ch").click(function()
  {
    $(".edit_chmpab").toggleClass("display_n");
    $("#abtchmp").attr('contenteditable','true');
  });

  //changinf profile picture


  //champion profile hover function

  $(".upld_div").css('display','none');

  $(".profile-img").mouseover(function()
  {
    $(".upld_div").css('display','block');
  })

  $(".profile-img").mouseleave(function()
  {
    $(".upld_div").css('display','none');
  });


  //Search functions of intern

  $("#search_inb").click(function()
  {
    var search_inp = $("#search_in").val();
    var data = "search_inp="+search_inp;
    $.ajax(
      {
        url:base_url+"/controller/internsearch",
        method:"POST",
        data:data,
        dataType:"TEXT",
        success:function(data)
        {
          alert(data);
        }
      }

    )

  });

  //open intern survey
  $(".opn_survey").click(function()
  {
    var surv_id = $(this).attr('id');
    var data = "survey_id="+surv_id;
    
    $.ajax(
      {
        url:base_url+"/controller/surveyresults",
        method:"POST",
        data:data,
        dataType:"TEXT",
        success:function(data)
        {
          alert(data);
        }
      }
    )
  });

 

  //getting network interview Employer details

  $(".area_cls").click(function()
  {
    var area_expertice = $(this).attr('id');
    var data = "area_expertice="+area_expertice;
    var success_url = base_url+"/controller/";
     $.ajax(
      {
        url:base_url+"/controller/assignnetwork",
        method:"POST",
        data:data,
        dataType:"JSON",
        success:function(data)
        {
          if(data.msg == 1)
          {
            var thtml = "";
            for(var i = 0 ; i < data.result.length ; i++ )
            {
             
              thtml += "<tbody class='net_intable'><tr><th scope='row'><div class='custom-control custom-checkbox'><input id='network_"+data.result[i].id+"' type='checkbox' value='"+data.result[i].id+"' class='custom-control-input'><label class='custom-control-label' for='network_"+data.result[i].id+"'>"+data.result[i].name+"</label></div></th><td>"+data.result[i].area+"</td><td>"+data.result[i].email+"</td><td>"+data.result[i].location+"</td></tr></tbody>";
            }
            $(".net_intable").replaceWith(thtml);
            ajax();
          } 

          else
          {
            var thtml = "";
            thtml +="Sorry No interviewer found for your area of interest";
            $("#my_netinterview").replaceWith(thtml);
            $(".assign_netwrk").css('display','none');
            ajax();

          }
         

        }
      }
    )

  });

  //adding network interview for intern
  $(".assign_netwrk").click(function()
  {
    var user = $(this).attr('id');
    var item = $(':checkbox:checked').map(function() {return this.value;}).get().join(',');
    var data = "user="+user+"&net_id="+item;
   
    $.ajax(
      {
        url:base_url+"/controller/addnetworkintern",
        method:"POST",
        data:data,
        dataType:"TEXT",
        beforeSend: function() { 
          $('.assign_netwrk').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Assigning...').attr('disabled', true); 
      },
        complete: function() { 
          $('.assign_netwrk').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Redirecting...').attr('disabled', true); 
      },
        success:function(data)
        {
         
            $(".sucx").css('display','block');
            $(".sucx_span").html(data);
            function error_time(){
              location.reload(true);
            }
            setTimeout(error_time, 2000);
        }
      }
    )
  });



  //champion Profile Editable option
  $(".c_profileupd").click(function()
  {
    var c_id = $("#c_id").val();
    var c_firstname = $("#c_fname").val();
    var c_lname = $("#c_lname").val();
    var c_phone = $("#c_phone").val();
    var c_position = $("#c_position").val();
    var c_address = $("#c_address").val();
    var c_abt = $("#c_abt").val();
    var data = "c_id="+c_id+"&c_firstname="+c_firstname+"&c_lname="+c_lname+"&c_phone="+c_phone+"&c_position="+c_position+"&c_address="+c_address+"&c_abt="+c_abt;
    var success_url = base_url+"championprofile";

    function validateEmail($fname) {
      var emailReg = /^[a-zA-Z\s]+$/;
      return emailReg.test( $fname );
      }

    function validatenumber($number) {
      var numbers = /^\d*$/;
      return numbers.test( $number );
      }
  
    if( !validateEmail(c_firstname))
    {
      toastr.error("Please enter a valid name");
    }

    else if( !validateEmail(c_lname))
    {
      toastr.error("Please enter a valid last name");
    }
    
    else if( !validatenumber(c_phone))
    {
      toastr.error("Please enter a valid Mobile number");
    }

    else if(c_phone.length < 8)
    {
      toastr.error("Invalid Mobile number");
    }

    else if(c_address.length == 0)
    {
      toastr.error("Address field cannot be empty");
    }

    else if(c_lname.length == 0)
    {
      toastr.error("Last name field cannot be empty");
    }
    else if(c_position.length == 0)
    {
      toastr.error("Last name field cannot be empty");
    }
    else
    {
        
    $.ajax(
      {
        url:base_url+"/controller/updatechampprof",
        method:"POST",
        data:data,
        dataType:"TEXT",
        success:function(data)
        {
          if(data==1)
          {
            toastr.success("Your Profile Informations updated successfully Please close the editable view to see the changes");
          }
        }
      }
    )
    }

  });


  $("#basicExampleModal").on('hide.bs.modal', function(){
    location.reload(true);
  });

  //Changing network interview status from the intern end
  $(".status_network").click(function()
  {
    var assign_id = $(this).attr('id');
    var status = $("#"+"shedule_net_"+assign_id).val();
    var user_info = $(".user_info").val();
    var user_name = $(".iuser_name").val();
    var champion = $(".champ_infor").val();
    var function_ass = $("#"+"function_ass_"+assign_id).html();
    var data = "assign_id="+assign_id+"&status="+status+"&user="+user_info+"&champion="+champion+"&u_name="+user_name+"&funct_ass="+function_ass;
    if(status == "open")
    {
      toastr.error("Please choose a status to update");
    }
    else
    {
        $.ajax(
          {
            url:base_url+"/controller/networkstatus",
            method:"POST",
            data:data,
            dataType:"TEXT",
            success:function(data)
            {
            
              if(data == "nss")
              {
                
                location.reload(true);
                
              }
              else if(data == "nsf")
              {
                toastr.error("You have already Sheduled the Interview");
              }
              else if(data == "ncs")
              {
                toastr.success("Network interview hasbeen marked as completed");
                location.reload(true);
               
              }
              else
              {
                toastr.error("You have alreaded completed the Network interview");
              }
            }
          }
        )
    }

  });



  //SHeduling Status of growth experience
  $(".assign_growth").click(function()
  {
    var g_id = $(this).attr('id');
    var g_status = $("#"+"shedule_growth_"+g_id).val();
    var user_info = $(".user_info").val();
    var user_name = $(".iuser_name").val();
    var champion = $(".champ_infor").val();
    var evidence = $("#"+"evid_"+g_id).val();
   
    if(g_status == "complete")
    {
         
      if(evidence.length > 0)
      {
        var file_data = $("#"+"evid_"+g_id).prop("files")[0]; 
        var form_data = new FormData(); 
        form_data.append("file", file_data) 
        form_data.append("g_id", g_id)
        form_data.append("user_info", user_info)
        form_data.append("user_name", user_name)
        form_data.append("champion", champion) 
        $.ajax({
          url: base_url+"/controller/statusgrowth_c", 
          dataType: 'script',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function(data) {
            if(data == 1)
            {
              toastr.success("Growth experience status changed to Pending");
                location.reload(true);
              setTimeout(error_time, 2000);
            }
            else
            {
              toastr.warning("You have already Completed The growth experience please wait for champion approval");
            }
          }
        });
      }
      else
      {
        toastr.error("Please choose the evidence of completion");
      }

  
    }
    else if(g_status == "progress")
    {
      var data = "g_id="+g_id+"&g_status="+g_status+"&intern="+user_info+"&intern_name="+user_name+"&champion="+champion;
      $.ajax(
        {
          url:base_url+"/controller/statusgrowth",
          method:"POST",
          data:data,
          dataType:"TEXT",
          success:function(data)
          {
             if(data == 0)
             {
              toastr.success("Growth Experience status changed to progress");
              location.reload(true);
             }
             else
             {
               toastr.error("Growth Experience already in progress");
             }
            
          }
        }
      );
    }

    else
    {
      toastr.error("Please choose a status to update");
    }
   
  })


  //adding intern feedback

  $(".add_feedback").click(function()
  {
    var user = $(".id_user").val();
    var champion = $(".id_champ").val();
    var feedback = $(".feedback_int").val();
    var data = "user="+user+"&champion="+champion+"&feedback="+feedback;
    if(feedback.length == 0)
    {
      toastr.error("Feedback Field cannot be empty");
    }
    else{
      $.ajax(
        {
          url:base_url+"/controller/internaddfeedback",
          method:"POST",
          data:data,
          dataType:"TEXT",
          success:function(data)
          {
            toastr.success(data);
           
          }
        }
      )
    }


  });

  

  // adding champion personality profile
  $(".add_personality").click(function()
  {
    var p_title = $(".per_expt").val();
    var p_exp = $(".per_expe").val();
    var data ="p_title="+p_title+"&p_exp="+p_exp;
    if(p_title.length == 0)
    {
      toastr.error('title cannot be empty');
    }

    else if(p_exp.length == 0)
    {
      toastr.error('experience field cannot be empty');
    }

    else
    {
      $.ajax(
        {
          url:base_url+"/controller/add_personp",
          method:"POST",
          data:data,
          dataType:"TEXT",
          success:function(data)
          {
            toastr.success(' personality profile added successfully');
          }
        }
      )
    }
  });

  $("#cls_upd").click(function()
  {
    location.reload(true);
  })

   // adding champion educational profile
   $(".add_education").click(function()
   {
     var course = $(".edu_cource").val();
     var college = $(".edu_clg").val();
     var data ="course="+course+"&college="+college;
     
     if(course.length == 0)
     {
      toastr.error('Course Field cannot be empty');
     }

     else if (college.length == 0)
     {
      toastr.error('University Field cannot be empty');
     }

     else
     {
      $.ajax(
        {
          url:base_url+"/controller/add_education",
          method:"POST",
          data:data,
          dataType:"TEXT",
          success:function(data)
          {
            toastr.success(' Educational profile added successfully');
          }
        }
      )
     }
     
   });

 // adding champion functional profile for champion
    $(".add_func").click(function()
    {
      var func_title = $(".func_title").val();
      var func_exp = $(".func_exp").val();
      var data ="func_title="+func_title+"&func_exp="+func_exp;
      if(func_title.length == 0)
      {
        toastr.error('Title Field cannot be empty');
      }
      else if(func_exp.length == 0)
      {
        toastr.error('Experience Field cannot be empty');
      }
      else
      {
        $.ajax(
          {
            url:base_url+"/controller/add_functional",
            method:"POST",
            data:data,
            dataType:"TEXT",
            success:function(data)
            {
              toastr.success(' Functionality profile added'); 
            }
          }
        )
      }
     
    });

    $(".dlt_prp").click(function()
    {
      var per_id = $(this).attr('id');
      var data = "p_id="+per_id;
      $.ajax(
        {
          url:base_url+"/controller/dlt_personality",
          method:"POST",
          data:data,
          dataType:"TEXT",
          success:function(data)
          {
            toastr.success('Personality profile Deleted succesfully');
          }
        }
      )
    });

    
//Deleting educational details from champions profile
    $(".dlt_edu").click(function()
    {
      var edu_id = $(this).attr('id');
      var data = "edu_id="+edu_id;
      $.ajax(
        {
          url:base_url+"/controller/dlt_education",
          method:"POST",
          data:data,
          dataType:"TEXT",
          success:function(data)
          {
            toastr.success('Education profile Deleted succesfully');
          }
        }
      )
    });

    
//deleting functional experience from the champion profile
    $(".dlt_funcexp").click(function()
    {
      var func_id = $(this).attr('id');
      var data = "func_id="+func_id;
      $.ajax(
        {
          url:base_url+"/controller/dlt_funcexp",
          method:"POST",
          data:data,
          dataType:"TEXT",
          success:function(data)
          {
            toastr.success('Functionality profile Deleted succesfully');
          }
        }
      )
    });

    //update personality profile in champion

    $(".upd_prp").click(function()
    {
      var id = $(this).attr('id');
      var title = $("#"+"p_title_"+id).val();
      var brief = $("#"+"p_exp_"+id).val();
      var data = "cp_id="+id+"&p_title="+title+"&p_brief="+brief;
      if(title.length == 0)
      {
        toastr.error('Title cannot be empty');
      }
      else if(brief.length == 0)
      {
        toastr.error('Brief Field cannot be empty');
      }
      else
      {
        $.ajax(
          {
            url:base_url+"/controller/ch_updp",
            method:"POST",
            data:data,
            dataType:"TEXT",
            success:function(data)
            {
             toastr.success('Personality profile updated');
            }
          }
        );
      }

    });

    $(".edit_edu").click(function()
    {
      var edu_id = $(this).attr('id');
      var upd_course = $("#"+"upd_course_"+edu_id).val();
      var upd_univ = $("#"+"upd_univ_"+edu_id).val();
      var data = "edu_id="+edu_id+"&upd_course="+upd_course+"&upd_univ="+upd_univ;
      if(upd_course.length == 0)
      {
        toastr.error('Course Field cannot be empty'); 
      }
      else if(upd_univ.length == 0)
      {
        toastr.error('University Field cannot be empty');
      }

      else
      {
        $.ajax(
          {
            url:base_url+"/controller/edit_cedu",
            method:"POST",
            data:data,
            dataType:"TEXT",
            success:function(data)
            {
              toastr.success('Education profile updated');
            }
          }
        )
      }

    });

    //edit functionality profile 

    $(".edit_fun").click(function()
    {
      var func_id = $(this).attr('id');
      var upd_ftitle = $("#"+"ftitle_"+func_id).val();
      var upd_fexp = $("#"+"fexp_"+func_id).val();
      var data = "func_id="+func_id+"&f_title="+upd_ftitle+"&fexp="+upd_fexp;
      if(upd_ftitle.length == 0)
      {
        toastr.error('Title cannot be empty');
      }
      else if (upd_fexp.length == 0)
      {
        toastr.error('Experience field cannot be empty');
      }
      else
      {
        $.ajax(
          {
            url:base_url+"controller/editfuncexp",
            method:"POST",
            data:data,
            dataType:"TEXT",
            success:function(data)
            {
          
              toastr.success('Functionality profile updated');
            }
          }
        )
      }
    })

    //adding network employer interview from the champions end
    $(".add_emplyr").click(function()
    {
      var emp_name = $(".emp_name").val();
      var emp_email = $(".emp_email").val();
      var emp_area = $(".emp_area").val();
      var emp_func = $(".emp_func").val();
      var emp_loc = $(".emp_loc").val();
      var data = "emp_name="+emp_name+"&emp_email="+emp_email+"&emp_area="+emp_area+"&emp_func="+emp_func+"&emp_loc="+emp_loc;
      function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test( $email );
        }
    
      if(emp_name.length == 0)
      {
        toastr.error("Name field cannot be empty");
      }

      else if(emp_email.length == 0)
      {
        toastr.error("email field cannot be empty");
      }
      else if( !validateEmail(emp_email))
      {
        toastr.error("enter a valid email address");
      }
      else if(emp_area.length == 0)
      {
        toastr.error("area cannot be empty");
      }
      else if(emp_func.length == 0)
      {
        toastr.error("functional field cannot be empty");
      }
      else if(emp_loc.length == 0)
      {
        toastr.error("location cannot be empty");
      }
      else
      {
         
        $.ajax(
          {
            url:base_url+"/controller/addnetwork_emp",
            method:"POST",
            data:data,
            dataType:"TEXT",
            success:function(data)
            {
              toastr.success(data);
            }
          }
        )
      }
    });

    //champion reset password

    $("#reset_p").click(function(creset)
    {
      creset.preventDefault();
      var reset_email = $("#res_e").val();
      var data = "r_email="+reset_email;

      $.ajax(
        {
          url:base_url+"/controller/cresetpassword",
          method:"POST",
          data:data,
          dataType:"TEXT",
          success:function(data)
          {
            if(data == 1)
              {
                
                $(".succ_t").css('display','block');
                $(".succ_p").html("Password Reset Link successfully sent to your email");
              }
  
              else
              {
                $(".err_f").css('display','block');
                $(".err_t").html("Sorry No user found in our system");
                $(".err_f").fadeOut(4000);
              }
          }
        }
      )

    });

    //champion update new password

    $("#upd_p").click(function(cpupd)
    {
      cpupd.preventDefault();
      var r_pass = $("#res_p").val();
      var r_token = $("#res_token").val();
      var data = "r_pass="+r_pass+"&r_token="+r_token;
      var success_url ="http://internmastershosting.com/login";
     
      $.ajax(
        {
          url:base_url+"/controller/c_updatepassword",
          method:"POST",
          data:data,
          dataType:"TEXT",
          success:function(data)
          {
            alert(data);
            window.location.href=success_url;
          }
        }
      )
    });

    //intern submiting a review
    $(".survey_send").click(function(survey)
    {
      survey.preventDefault();
      var wt_learn = $("#wt_learn").val();
      var wt_procurement = $("#wt_procurement").val();
      var wt_purchasing = $("#wt_purchasing").val();
      var wt_sourcing = $("#wt_sourcing").val();
      var wt_procurepay = $("#wt_procurepay").val();
      var wt_difst = $("#wt_difst").val();
      var wt_stakehold = $("#wt_stakehold").val();
      var wt_directmaterial = $("#wt_directmaterial").val();
      var wt_indsourcing = $("#wt_indsourcing").val();
      var wt_quest = $("#wt_quest").val();
      var areaof_interest = $('.area_chck:checked').map(function() {return this.value;}).get().join(',');
      var area_id = $('.area_chck:checked').map(function() {return this.id;}).get().join(',');
      var growth_exp = $('.growth_chck:checked').map(function() {return this.value;}).get().join(',');
      var growth_exp_id = $('.growth_chck:checked').map(function() {return this.id;}).get().join(',');
      var token = $("#token_surv").val();
      var data = "wt_learn="+wt_learn+"&wt_procurement="+wt_procurement+"&wt_purchasing="+wt_purchasing+"&wt_sourcing="+wt_sourcing+"&wt_procurepay="+wt_procurepay+"&wt_difst="+wt_difst+"&wt_stakehold="+wt_stakehold+"&wt_directmaterial="+wt_directmaterial+"&wt_indsourcing="+wt_indsourcing+"&wt_quest="+wt_quest+"&areaof_interest="+areaof_interest+"&area_id="+area_id+"&growth_exp="+growth_exp+"&ge_id="+growth_exp_id+"&token="+token;
      
      if(wt_learn.length == 0)
      {
       $(".ablt").css('display','block');
       $(".ablt").fadeOut(4000);
      }
      else if(wt_purchasing.length == 0)
      {
        $(".ablt").css('display','block');
        $(".ablt").fadeOut(4000);
      }
      else if(wt_procurement.length == 0)
      {
        $(".ablt").css('display','block');
        $(".ablt").fadeOut(4000);
      }
      else if(wt_sourcing.length == 0)
      {
        $(".ablt").css('display','block');
        $(".ablt").fadeOut(4000);
      }
      else if(wt_procurepay.length == 0)
      {
        $(".ablt").css('display','block');
        $(".ablt").fadeOut(4000);
      }
      else if(wt_difst.length == 0)
      {
        $(".ablt").css('display','block');
        $(".ablt").fadeOut(4000);
      }
      else if(wt_stakehold.length == 0)
      {
        $(".ablt").css('display','block');
        $(".ablt").fadeOut(4000);
      }
      else if(wt_directmaterial.length == 0)
      {
        $(".ablt").css('display','block');
        $(".ablt").fadeOut(4000);
      }
      else if(wt_indsourcing.length == 0)
      {
        $(".ablt").css('display','block');
        $(".ablt").fadeOut(4000);
      }
      else if(wt_quest.length == 0)
      {
        $(".ablt").css('display','block');
        $(".ablt").fadeOut(4000);
      }
      else if(areaof_interest.length == 0)
      {
        $(".ablt").css('display','block');
        $(".ablt").fadeOut(4000);
      }
      else if(growth_exp.length == 0)
      {
        $(".ablt").css('display','block');
        $(".ablt").fadeOut(4000);
      }
      else
      {
        
        $.ajax(
          {
            url:base_url+"/controller/updatesurvey",
            method:"POST",
            data:data,
            dataType:"TEXT",
            beforeSend: function() { 
              $('.survey_send').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Updating survey...').attr('disabled', true); 
          },
            complete: function() { 
              $('.survey_send').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Redirecting...').attr('disabled', true); 
          },
            success:function(data)
            {
              
              if(data == 1)
              {
                alert("thank you for submiting the review please login to continue");
                window.location.href=base_url+"/internlogin";
              }
              else
              {
                alert("you have already submited a survey for review please login to continue");
                window.location.href=base_url+"/internlogin";
              }
            }
          }
        )
      }
    });
    

 //intern adds network interview

    $(".addintb").click(function()
    {
      var net_id = $(this).attr('id');
      var intern = $("#intrn_id").val();
      var champion = $("#chmp_dtl").val();
      var data = "network_id="+net_id+"&intern="+intern+"&champion="+champion;
      var btnid = $("."+"spinet_"+net_id);

      $.ajax(
        {
          url:base_url+"/controller/intadnetwork",
          method:"POST",
          data:data,
          dataType:"TEXT",
          beforeSend: function() { 
            btnid.html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Adding...').attr('disabled', false); 
          },
           
          success:function(data)
          {
            
            if(data == 1)
            {
              toastr.success("Network interview successfully added in your profile");
              btnid.html('<i class="far fa-check-circle"></i> Added').attr('disabled', false); 
            }
            else
            {
              toastr.error("You have already added this network interview");
              btnid.html('<i class="far fa-check-circle"></i>Already Exist').attr('disabled', false); 
            }
          }
        }
      )
    });

// sending password reset link to intern
    $(".intern_flink").click(function(forgot)
      {
        forgot.preventDefault();
        var email = $("#inte_r").val();
        var data = "int_email="+email;

        if(email.length == 0)
        {
          $(".err_f").css('display','block');
          $(".err_t").html("Email Field cannot be Empty");
          $(".err_f").fadeOut(4000);
        }
        else
        {
          $.ajax(
            {
              url:base_url+"/controller/iresetpass",
              method:"POST",
              data:data,
              dataType:"TEXT",
              success:function(data)
              {
                if(data == 1)
                {
                  
                  $(".succ_t").css('display','block');
                  $(".succ_p").html("Password Reset Link successfully sent to your email");
                }
    
                else
                {
                  $(".err_f").css('display','block');
                  $(".err_t").html("Sorry No user found in our system");
                  $(".err_f").fadeOut(4000);
                }
              }
            }
          );
        }
      
      }
    );

    //update intern password 
       $("#upd_intp").click(function(upi)
       {
         upi.preventDefault();
         var int_pass = $("#res_intp").val();
         var cint_pass = $("#cres_intp").val();
         var token = $("#int_token").val();
         
         if(int_pass.length < 8)
         {
           $(".err_f").css('display','block');
           $(".err_t").html("password should be minimum 8 characters");
          
         }
         else if(cint_pass < 8)
         {
           $(".err_f").css('display','block');
           $(".err_t").html("password should be minimum 8 characters");
        
         }
         else if(int_pass != cint_pass)
         {
           $(".err_f").css('display','block');
           $(".err_t").html("passwords not same");
         
         }
         else
         {
           var data = "password="+cint_pass+"&token="+token;
           var success_url = base_url+"internlogin";
           $.ajax(
             {
               url:base_url+"/controller/int_updpass",
               method:"POST",
               data:data,
               dataType:"TEXT",
               success:function(data)
               {
                 if(data == 1)
                 { 
                   $(".succ_t").css('display','block');
                   $(".succ_p").html("Successfully password resetted");
                   window.location.href=success_url;
                 }
     
                 else
                 {
                   $(".err_f").css('display','block');
                   $(".err_t").html("Unable to update password");
                   $(".err_f").fadeOut(4000);
                 }
               }
             }
           )
         }
       });

       //champion approves the growth Experience
       $(".approve_ge").click(function()
       {
         var gassign_id = $(this).attr('id');
         var data = "g_id="+gassign_id;
         $.ajax(
           {
             url:base_url+"/controller/approve_ge",
             method:"POST",
             data:data,
             dataType:"TEXT",
             success:function(data)
             {
               toastr.success("Growth experience has been successfully assigned");
               function error_time(){
                location.reload(true);
                }
                setTimeout(error_time, 2000);
             }
           }
         )
       });

       $(".reqprj").click(function()
       {
        
         var message = $("#email_req").val();
         var email = $('.email_s:checkbox:checked').map(function() {return this.value;}).get().join(',');
         var data = "message="+message+"&email="+email;
         if(message.length == 0)
         {
           toastr.error("Message Field Cannot be empty");
         }
         else if(email.length ==0)
         {
           toastr.error("Atleast Select one Email to send");
         }
         else
         {
          $.ajax(
            {
              url:base_url+"/controller/requestprojects",
              method:"POST",
              data:data,
              dataType:"TEXT",
              beforeSend: function() { 
                $('.reqprj').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Sending...').attr('disabled', true); 
            },
              complete: function() { 
                $('.reqprj').html('Request Sent').attr('disabled', false); 
            },
              success:function(data)
              {
               
                if(data == 1)
                {
                  toastr.success("Request Send successfully");
                }
                else
                {
                  toastr.error("unable to connect to host");
                }
              }
            } 
          )
         }
       });

      //sponsor login
      $("#s_login").click(function(slog)
      {
        slog.preventDefault();
        var s_email = $("#s_email").val();
        var s_pass = $("#s_pass").val();
        var data = "s_email="+s_email+"&s_pass="+s_pass;
        $.ajax(
          {
            url:base_url+"/controller/sponsorlog",
            method:"POST",
            data:data,
            dataType:"JSON",
            success:function(data)
            {
              if(data.error==0)
              {
                alert("Succesfully logged in");
                window.location = base_url+"sponsorprofile";
              }
              else
              {
                alert("Invalid credentials");
              }
            }
          }
        )
      });

      $('#select_int').on('change', function (e) {
        var optionSelected = $(this).find("option:selected");
        var valueSelected  = optionSelected.val();
        var data = "intern="+valueSelected;
        
        $.ajax(
          {
            url:base_url+"/controller/getinternrecord",
            method:"post",
            data:data,
            dataType:"JSON",
            success:function(data)
            {
              var thtml = "<img src='http://localhost/internmasters/images/uploads/intern/"+data.picture+"' class='responsive p-2 int_prp'>";
              $(".dyn_image").html(thtml);
              $("#netstatus").html(data.network_count);
              $("#growth_numrow").html(data.ge_completed);
              $(".dyn_sec").css('visibility','visible');
            }
          }
        )
    });

    $('#pefr_is').on('change', function (e) {
      var optionSelected = $(this).find("option:selected");
      var valueSelected  = optionSelected.val();
      if(valueSelected == "yes")
      {
        $(".select_intab").css('visibility','visible');
      }
      else
      {
        $(".select_intab").css('visibility','hidden');
      }
    });

      $("#basicExampleModal1").on('hide.bs.modal', function(){
        location.reload(true);
      });

      //champion profile editing options
      $(".s_profileupd").click(function()
      {
        var s_id = $("#s_id").val();
        var s_firstname = $("#s_fname").val();
        var s_lname = $("#s_lname").val();
        var s_phone = $("#s_phone").val();
        var s_address = $("#s_address").val();
        var s_abt = $("#s_abt").val();
        var data = "s_id="+s_id+"&s_firstname="+s_firstname+"&s_lname="+s_lname+"&s_phone="+s_phone+"&s_address="+s_address+"&s_abt="+s_abt;
        var success_url = base_url+"championprofile";

        function validateEmail($fname) {
          var emailReg = /^[a-zA-Z\s]+$/;
          return emailReg.test( $fname );
          }

        function validatenumber($number) {
          var numbers = /^\d*$/;
          return numbers.test( $number );
          }
      
        if( !validateEmail(s_firstname))
        {
          toastr.error("Please enter a valid name");
        }

        else if( !validateEmail(s_lname))
        {
          toastr.error("Please enter a valid last name");
        }
        
        else if( !validatenumber(s_phone))
        {
          toastr.error("Please enter a valid Mobile number");
        }

        else if(s_phone.length < 8)
        {
          toastr.error("Invalid Mobile number");
        }

        else if(s_address.length == 0)
        {
          toastr.error("Address field cannot be empty");
        }

        else if(s_lname.length == 0)
        {
          toastr.error("Last name field cannot be empty");
        }
        else
        {
          toastr.success("success response");
        }
    });

    $(".appr_prj").click(function()
    {
      var project_id = $(this).attr('id');
      var sponsor_id = $("#sponsor_assgnpr").val();
      var intern_id = $("#intern_assgnpr").val();
      var data = "project_id="+project_id+"&sponsor_id="+sponsor_id+"&intern_id="+intern_id;
     
      $.ajax(
        {
          url:base_url+"/controller/approve_project",
          method:"post",
          data:data,
          dataType:"TEXT",
          beforeSend: function() { 
            $('.appr_prj').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Approving...').attr('disabled', true); 
        },
          complete: function() { 
            $('.appr_prj').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Redirecting...').attr('disabled', true); 
        },
          success:function(data)
          {
            alert(data);
            // if(data == 1)
            // {
            //   toastr.success("Project assigned successfully");
            //   function error_time(){
            //     window.location = base_url+"championdashboard";
            //   }
            //   setTimeout(error_time, 1500);
            // }
            // else
            // {
            //   toastr.error("project already assigned");
            // }
          }
        }
      )
    });

    $(".chckbox_ge input[type='checkbox").change(function(){
      var id= $(this).attr('id');
      if($(this).is(":checked")){
        
         $("#"+"rowof_"+id).addClass("rowadd");

      }else{
        $("#"+"rowof_"+id).removeClass("rowadd");
      }
  });

  //funcion for intern adding growthe experience
  $(".add_ge").click(function()
  {
    var add_ge = $('.growth_addval:checked').map(function() {return this.id;}).get().join(',');
    var data = "ge_id="+add_ge;
    $.ajax(
      {
        url:base_url+"/controller/intaddge",
        method:"POST",
        data:data,
        dataType:"TEXT",
        success:function(data)
        {
          var regex =  /^[1]+$/;
          if(regex.test(data) == 1)
          {
            toastr.success("growth experience added successfully please check in your profile");
          }
          else
          {
            toastr.error("Selected growth expereience already in your profile");
          }
        }
      }
    )
  });

  //fucntion for intern confirm the project
  $(".cnfrm_intprjct").click(function()
  {
    var assignedp_id = $(this).attr('id');
    var data = "assign_id="+assignedp_id;

    $.ajax(
      {
        url:base_url+"controller/confirm_projectint",
        method:"POST",
        data:data,
        dataType:"TEXT",
        success:function(data)
        {
          if(data == 1)
          {
            toastr.success("Project assigned to you successfully");
            function error_time(){
              window.location = base_url+"internprofile";
            }
            setTimeout(error_time, 1500);
          }
        }
      }
    )
  });

  $("#search_gesub").click(function()
  {
    
  })

  //ajax live search function for growth experience
  $('#search_ge').on('input',function(e)
  {
       var input_ge = $("#search_ge").val();
       if(input_ge.length == 0)
       {
        $(".autocomplete_ge").css('display','block');
        $(".compltxt").html("no result found");
       }
       else
       {
        $(".autocomplete_ge").css('display','block');
        var data = "ge_program="+input_ge;
        $.ajax(
          {
            url:base_url+"controller/search_geinput",
            method:"POST",
            data:data,
            dataType:"TEXT",
            success:function(data)
            {
              $("#fill_txt").html(data);
              $(".srch_txt").mouseover(function()
              {
                $(this).css('background','#e3e3e3');
              });

              $(".srch_txt").mouseleave(function()
              {
                $(this).css('background','#fff');
              });

              $(".srch_txt").click(function()
              {
                var searchq = $(this).html();
                $("#search_ge").val(searchq);
                $(".autocomplete_ge").css('display','none');
              });
            }
          }
        )
       }

});


$(".pop_funct").click(function()
{
  $(".area_func").toggleClass('display_bl');
})

$(".pop_desc").click(function()
{
  $(".desc_func").toggleClass('display_bl');
})

$(".pop_task").click(function()
{
  $(".pop_func").toggleClass('display_bl');
})

$(".pop_goal").click(function()
{
  $(".goal_func").toggleClass('display_bl');
})

$(".pop_time").click(function()
{
  $(".time_func").toggleClass('display_bl');
});


$(".add_prupd").click(function()
{
  var intern_details = $(".int_dtl").val();
  var project_details = $(".prj_dtl").val();
  var sponsor_details = $(".spn_dtl").val();
  var project_udpates = $(".update_name").val();
  var assign_id = $(".p_assign").val();
  var data = "project_udpates="+project_udpates+"&intern="+intern_details+"&sponsor="+sponsor_details+"&project="+project_details+"&assign_id="+assign_id;
  if(project_udpates.length == 0)
  {
    toastr.error("Task field cannot be empty");
  }
  else
  {
      $.ajax(
        {
          url:base_url+"controller/addprojectupdate",
          method:"POST",
          data:data,
          dataType:"TEXT",
          success:function(data)
          {
            toastr.success("New Task Updated Successfully");
            location.reload(true);
          }
        }
      )
  }

});


$(".dlt_ic").click(function()
{
  var dlt_upd = $(this).attr('id');
  var data = {dlt_upd:dlt_upd};
  if (confirm('Are you sure ?')) {
    $.ajax(
      {
        url:base_url+"controller/dltprojectupd",
        method:"POST",
        data:data,
        dataType:"TEXT",
        success:function(data)
        {
          location.reload(true);
        },
        error: function(data){
            toastr.error("Please Delete your all task updates to delete Task");
        }
      }
    )
  }

});



$(".upd_task").click(function()
{
  var p_updid = $(this).attr('id');
  var task_updates = $("#"+"task_update_"+p_updid).val();
  var data = "p_updid="+p_updid+"&task_updates="+task_updates;
  if(task_updates.length == 0)
  {
    toastr.error("Task update Field cannot be Empty");
  }
  else
  {
    $.ajax(
      {
        url:base_url+"controller/updatetask",
        method:"POST",
        data:data,
        dataType:"TEXT",
        success:function(data)
        {
          toastr.success("Task has been added please click the eye icon to see all your task updates");
        }
      }
    )
  }

});


$(".dlt_upd").click(function()
{
  var id = $(this).attr('id');
  var selector = $("#"+"menu_dlt_"+id);
  selector.toggleClass('dblock');
});

$(".dltid").click(function()
{
  var id = $(this).attr('id');
  var data = 'id='+id;
  if (confirm('Are you sure ?')) {
    $.ajax(
      {
        url:base_url+"controller/dltprojectsk",
        method:"POST",
        data:data,
        dataType:"TEXT",
        success:function(data)
        {
          location.reload(true);
        }
      }
    )
  } 
});



$(".markproject").click(function()
{
   var assign_id = $(this).attr('id');
   var data = 'assign_id='+assign_id;
   $.ajax(
     {
       url:base_url+"controller/markproject",
       method:"POST",
       data:data,
       dataType:"TEXT",
       success:function(data)
       {
        location.reload(true);
       }
     }
   )
});



$("markdelete").click(function()
{
    var delete_id = $(this).attr('id');
    var intern = $("internid").val();

    var data = "delete_id="+delete_id+"&intern="+intern;
    
    if(delete_id.length == 0)
    {
      alert("field cannot be empty");
    }
    else if(intern.length == 0)
    {
      alert("field cannot be empty");
    }

    else
    {
      $.ajax(
        {
          url:base_url+"controller/markdelete",
          method:"POST",
          data:data,
          dataType:"JSON",
          success:function(data)
          {
            alert(data);
          }
        }
      )
    }
   
});

//function for minifying the toggler
$(".minfier").click(function()
{
  $(".brds").toggleClass("hieghtcls");
});



//rejecting a sponsor project

$(".reject_project").click(function()
{
  var project_id = $(this).attr('id');
  var reason = $("#reason_rej").val();
  var data = "project_id="+project_id+"&reason="+reason;
  $.ajax(
    { 
      url:base_url+"controller/reject_project",
      method:"POST",
      data:data,
      dataType:"TEXT",
      beforeSend: function() { $('.reject_project').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Rejecting...').attr('disabled', true); },
        complete: function() { $('.reject_project').html("redirecting...."); },
      
      success:function(data)
      {
        
        if(data == 1)
        {
          toastr.success("Project Rejection has beed added you will redirected soon....");
          function error_time(){
            window.location = base_url+"/championdashboard";
          }
          setTimeout(error_time, 1500);
        }
        else
        {
          toastr.error("failed");
        }
      }
    }
  )
});

$(".togglefilt").click(function()
{
  $(".filter_network").css({'width':'230px','background':'white','opacity':'1','padding':'5px','left':'0',' background-color':'rgb(255, 255, 255)','box-shadow':'rgba(9, 30, 66, 0.08) 0px 0px 0px 1px, rgba(9, 30, 66, 0.08) 0px 2px 1px, rgba(9, 30, 66, 0.31) 0px 0px 20px -6px','border-radius':'3px'});
  $(".filtrbar").css({'left':'230px'});
  $(".tabs_filter").css({'display':'block'}); 
  $(".togglefilt").css({'display':'none'});
  $(".togglecoll").css({'display':'block'});
});

//function for toggle
$(".togglecoll").click(function()
{
  $(".filter_network").css({'width':'32px','background':'linear-gradient(to left, rgba(0, 0, 0, 0.2) 0px, rgba(0, 0, 0, 0.2) 1px, rgba(0, 0, 0, 0.1) 1px, rgba(0, 0, 0, 0) 100%)','opacity':'0.5','padding':'5px','left':'25'});
  $(".filtrbar").css({'left':'11px'});
  $(".tabs_filter").css({'display':'none'}); 
  $(".togglefilt").css({'display':'block','position':'relative','top':'4px'});
  $(".togglecoll").css({'display':'none'});
});


//approving common project

$(".appr_prjall").click(function()
{
  var project_id = $(this).attr('id');
  var sponsor_id = $("#sponsor_assgnpr").val();
  var data ="project_id="+project_id+"sponsor_id="+sponsor_id;
  $.ajax(
    {
      url:base_url+"/controller/approve_projectall",
      method:"post",
      data:data,
      dataType:"TEXT",
      beforeSend: function() { 
        $('.appr_prjall').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Approving...').attr('disabled', true); 
    },
      complete: function() { 
        $('.appr_prjall').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Redirecting...').attr('disabled', true); 
    },
      success:function(data)
      {
           toastr.success("Project assigned successfully");
        
            window.location = base_url+"championdashboard";
  
        // if(data == 1)
        // {
        //   toastr.success("Project assigned successfully");
        //   function error_time(){
        //     window.location = base_url+"championdashboard";
        //   }
        //   setTimeout(error_time, 1500);
        // }
        // else
        // {
        //   toastr.error("project already assigned");
        // }
      }
    }
  )
})

$(".filter_area").click(function()
{
  var area = $(this).html();
  // area = area.replace(/\s/g, '');
  window.location.href = base_url+'/controller/networkinterviewfilter/'+area;
});

$("#fltrarea").change(function()
{
  var area = $(this).val();
  if(area == 'All')
  {
    window.location.href = base_url+'controller/networkingblueprint';
  }
  else
  {
    window.location.href = base_url+'/controller/networkinterviewfilter/'+area;
  }
 
})

$(".filter_areaall").click(function()
{
  window.location.href = base_url+'/controller/networkingblueprint';
});

$(".noticon").click(function()
{
  $(".notification_push").toggleClass('display_blc');
});





})
