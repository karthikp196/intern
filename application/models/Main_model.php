<?php

    Class Main_model extends CI_model
    {
       
        public function login($data)
        {
           
            $message = array();
            $l_email = $data['email'];
            $l_passwordn = $data['password'];
            $l_password = md5($l_passwordn);
            $this->load->database();
            $result= $this->db->query("SELECT * FROM champion_details WHERE c_email= '$l_email' AND password= '$l_password'");
            $data_r['result'] =  $result;
            $data_r['rows']   = $result->num_rows();
            return $data_r;
        }

        public function championprofile()
        {
            $this->load->database();
            $id = $this->session->userdata('user_id');
            $query = $this->db->get("champion_details WHERE id = '$id'");
            return $query;
        }

        public function championfuncexp()
        {
            $this->load->database();
            $id = $this->session->userdata('user_id');
            $query = $this->db->get("champion_functionexp WHERE champion_details= '$id'");
            return $query;
        }
        
        public function championeducation()
        {
            $this->load->database();
            $id = $this->session->userdata('user_id');
            $query = $this->db->get("champion_education WHERE champion_details= '$id'");
            return $query;
        }

        public function championperprof()
        {
            $this->load->database();
            $id = $this->session->userdata('user_id');
            $query = $this->db->get("champion_personalityprofile WHERE champion_details= '$id'");
            return $query;
        }

        public function internactivity()
        {
            $this->load->database();
            $id = $this->session->userdata('user_id');
            $query = "SELECT * FROM intern_details,intern_activityfield WHERE intern_activityfield.champion_details='$id' AND intern_details.id=intern_activityfield.intern_details ORDER BY intact_id DESC LIMIT 10";
            $result = $this->db->query($query);
            return $result;
            
        }


        public function champion_youtubeblog()
        {
            $this->load->database();
            $id = $this->session->userdata('user_id');
            $query = $this->db->get("champion_youtubeblogs WHERE champion_details = '$id'");
            return $query;
        }

        public function abtchmpupd($data)
        {
            $abtchmpid = $data['chmpabtid'];
            $abtcont = $data['abtcont'];
            $sql2 = "UPDATE champion_details SET c_about='$abtcont' WHERE champion_details.id='$abtchmpid'";
            $this->load->database();
            $result1 = $this->db->query($sql2);  
            if($result1 == TRUE)
            {
                echo '1';
            } 
            else
            {
                echo '0';
            }

        }

        public function uploadchampy($data)
        {
            $user_id = $data['user_id'];
            $video_id = $data['video_id'];
            $vid_src = $data['vid_src'];
            $sql3 = "UPDATE champion_youtubeblogs SET youtube_src='$vid_src' WHERE id='$video_id' AND champion_details='$user_id'";
            $this->load->database();
            $result3 = $this->db->query($sql3);
            if($result3 == TRUE)
            {
                echo '1';
            }
            else
            {
                echo '0';
            }
        }

        public function dltchmpy($data)
        {
            $user = $data['user'];
            $video_id = $data['video_id'];
            $sql4 = "DELETE FROM champion_youtubeblogs WHERE id='$video_id' AND champion_details='$user'";
            $this->load->database();
            $result4 = $this->db->query($sql4);
            if($result4 == TRUE)
            {
                echo '1';
            }
            else
            {
                echo '2';
            }
        }

        public function addchmpy($data)
        {
            $id = $data['id'];
            $video = $data['video'];
            $sql5 = "INSERT INTO champion_youtubeblogs (champion_details , youtube_src) VALUES ('$id', '$video')";
            $this->load->database();
            $result5 = $this->db->query($sql5);
            if($result5 == TRUE)
            {
                echo '1';
            }
            else{
                echo '0';
            }
        }

        public function updatechampprof($data,$id)
        {
           
            $this->db->where('id', $id);
            $result = $this->db->update('champion_details', $data);
            return true;
        }


        public function champion_socialmedia()
        {
            $this->load->database();
            $id = $this->session->userdata('user_id');
            $query = $this->db->get("champion_socialmedia WHERE champion_details = '$id'");
            return $query;
        }

        public function internprofile()
        {
            $this->load->database();
            $id =$this->session->userdata('intern_id');
            $query = $this->db->get("intern_details WHERE id = '$id'");
            return $query;  
        }

        public function internvideoblog()
        {
            $this->load->database();
            $id = $this->session->userdata('intern_id');
            $query = $this->db->get("intern_videoblog WHERE intern_detail = '$id'");
            return $query;  
        }
        
        public function internsocialmedia()
        {
            $this->load->database();
            $id = $this->session->userdata('intern_id');
            $query = $this->db->get("intern_socialmedia WHERE intern_detail = '$id'");
            return $query;  
        }

        public function inviteintern($data)
        {
            $champion = $this->session->userdata('user_id');
            $intern_name = $data['intern_name'];
            $intern_email = $data['intern_email'];
            $phone = $data['company_email'];
            $token = $data['token'];
            $sql = "SELECT * FROM intern_details WHERE email='$intern_email'";
            $res = $this->db->query($sql);

            if($res->num_rows() >= 1 )
            {
                return FALSE;
            }
            else
            {
                $sql7 = "INSERT INTO intern_details (firstname, email, champion, phone, token) VALUES ('$intern_name' , '$intern_email','$champion','$phone','$token')";
                $this->load->database();
                $result7 = $this->db->query($sql7);
                return TRUE;
            }
        }

        public function insertintern($path,$post)
        {
            $npassword = $post['password'];
            $password = md5($npassword);
            $token_key = $post['token_key'];
            $path_parts = pathinfo($path);
            $profile_pic = $path_parts['filename'].".".$path_parts['extension'];
            $this->load->database();
            $sql = "SELECT * FROM intern_details WHERE token = '$token_key' AND token_validity = 0";
            $res = $this->db->query($sql);
            $num = $res->num_rows();
            if($num == 1)
            {
                $sql8 = $this->db->query("UPDATE intern_details SET password='$password', profile_picture='$profile_pic' WHERE token = '$token_key' AND token_validity = 0");
              
                return TRUE;
            }
           
            else
            {
              
                // redirect('http://internmastershosting.com/   ');  
                return FALSE;
            }
        }

        public function championintern()
        {
            $this->load->database();
            $id = $this->session->userdata('user_id');
            $query = $this->db->get("intern_details WHERE champion = '$id' AND token_validity='1' ");
            return $query;  
        }

        public function internsignin($data)
        {
            $intern_mail = $data['intern_mail'];
            $intern_passn = $data['intern_pass'];
            $intern_pass = md5($intern_passn);
            $this->load->database();
            $sql9 = $this->db->get("intern_details WHERE email = '$intern_mail' AND password ='$intern_pass' AND token_validity= '1'");
            if($sql9->num_rows() == 1)
            {
                 foreach($sql9->result() as $row){
                     $this->load->library('session');
                     $intern_id= $this->session->set_userdata("intern_id", $row->id);   
                 }
                 echo "1";
            }
 
            else
            {
                echo "0";
            }

        }

        public function intern_inactive($intern_id,$date)
        {
            $array = array('login_status'=>0,'last_modified'=>$date);
            $this->db->set('login_status', 0); 
            $this->db->where('id', $intern_id);
            $result = $this->db->update('intern_details'); 
        }

        public function updateintern($data)
        {
            $db = get_instance()->db->conn_id;
            $intern_id = $data['intern_id'];
            $intern_name = $data['intern_name'];
            $intern_lname = $data['intern_lname'];
            $intern_mobile = $data['intern_mobile'];
            $intern_college = $data['intern_college'];
            $intern_address = $data['intern_address'];
            $intern_about = $data['intern_about'];
            $intern_about = mysqli_real_escape_string($db,$intern_about);
            $this->load->database();
            $sql10 = $this->db->query("UPDATE intern_details SET firstname='$intern_name', lastname='$intern_lname', phone='$intern_mobile', address='$intern_address', college_name='$intern_college', about='$intern_about' WHERE id = '$intern_id'");
            return $sql10;
            
        }

        public function internaddvideo($data)
        {
            $intern = $data['intern_id'];
            $video_src = $data['video_src'];
            $this->load->database();
            $sql11 = $this->db->query("INSERT INTO intern_videoblog (intern_detail,video_src) VALUES ('$intern','$video_src')");
            if($sql11 == TRUE)
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }

        public function internaddmedia($data)
        {
            $intern = $data['intern_id'];
            $media_src = $data['media_src'];
            $this->load->database();
            $sql12 = $this->db->query("INSERT INTO intern_socialmedia (intern_detail,src_link) VALUES ('$intern','$media_src')");
            if($sql12 == TRUE)
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }

       public function interndltvideo($data)
       {
            $intern = $data['intern_id'];
            $video_id = $data['video_id'];
            $this->load->database();
            $sql13 = $this->db->query("DELETE FROM intern_videoblog WHERE id='$video_id' AND intern_detail='$intern'");
            if($sql13 == TRUE)
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
       }

       public function internedtvideo($data)
       {
           $intern = $data['intern'];
           $video_id = $data['video_id'];
           $video_src = $data['video_src'];
           $this->load->database();
           $sql14 = $this->db->query("UPDATE intern_videoblog SET video_src='$video_src' WHERE id='$video_id' AND intern_detail='$intern'");
           if($sql14 == TRUE)
           {
               echo "1";
           }
           else
           {
               echo "0";
           }
           
       }

       public function interndltmedia($data)
       {
        $intern = $data['intern_id'];
        $media_id = $data['media_id'];
        $this->load->database();
        $sql15 = $this->db->query("DELETE FROM intern_socialmedia WHERE id='$media_id' AND intern_detail='$intern'");
        if($sql15 == TRUE)
        {
            echo "1";
        }
        else
        {
            echo "0";
        }
       }

       public function internedtmeida($data)
       {
        $intern = $data['intern'];
        $media_id = $data['media_id'];
        $media_src = $data['media_src'];
        $this->load->database();
        $sql16 = $this->db->query("UPDATE intern_socialmedia SET src_link='$media_src' WHERE id='$media_id' AND intern_detail='$intern'");    
       }

       public function internsearch($data)
       {
          $search_input = $data['search_inp'];
          $this->load->database();
          $sql = $this->db->query("SELECT * FROM intern_details WHERE firstname like '%$search_input%'");
          return $sql;
       }

       public function surveyresults()
       {
           $id = $this->session->userdata('user_id');
           $this->load->database();
           $sql20 = "SELECT * FROM intern_details ,intern_survey WHERE intern_details.id=intern_survey.intern_details AND intern_survey.champion_details='$id'";
           $result = $this->db->query($sql20);
           return $result;
       }

       public function getsurvey($data)
       {
           $surv_id = $data['survey_id'];
           $token_id = $data['token'];
           $user = $data['user'];
           $this->load->database();
           $sql = "SELECT * FROM intern_details,intern_survey WHERE intern_details.id='$user' AND intern_survey.survey_id='$surv_id' AND intern_survey.token='$token_id'";
           $result = $this->db->query($sql);
           return $result;      
       }

       public function updatesurvey($data)
       {
          $message = array();
          $area_interest = $data['areaof_interest'];
          $area_id = $data['areainterest_id'];
          $wt_learn = $data['wt_learn'];
          $wt_procurement = $data['wt_procurement'];
          $wt_purchasing = $data['wt_purchasing'];
          $wt_sourcing = $data['wt_sourcing'];
          $wt_procurepay = $data['wt_procurepay'];
          $wt_difst = $data['wt_difst'];
          $wt_stakehold = $data['wt_stakehold'];
          $wt_directmaterial = $data['wt_directmaterial'];
          $wt_indsourcing = $data['wt_indsourcing'];
          $wt_quest = $data['wt_quest'];
          $token = $data['token'];
          $ge = $data['growth_exp'];
          $ge_id = $data['ge_id'];
          $this->load->database();
          $sql = "SELECT * FROM intern_details WHERE token='$token'";
          $res = $this->db->query($sql);
         
          if($res->num_rows() == 1)
          {
              
            foreach($res->result() as $row){
               $intern = $row->id;
               $champion = $row->champion;
               $intername = $row->firstname;
               $intern_profile = $row->profile_picture;
               $sqlcheck = "SELECT * FROM intern_survey WHERE intern_details='$intern'";
               $rescheck = $this->db->query($sqlcheck);
               
               if($rescheck->num_rows() < 1)
               {
                       
                    $datainput = array(
                        'champion_details'=>$champion,
                        'intern_details'=>$intern,
                        'what_learn_summer'=>$wt_learn,
                        'what_Procurement'=>$wt_procurement,
                        'what_purchasing'=>$wt_purchasing,
                        'what_Sourcing'=>$wt_sourcing,
                        'familiar_with_procure'=>$wt_procurepay,
                        'difference_between_strategic'=>$wt_difst,
                        'what_stakeholder'=>$wt_stakehold,
                        'what_dms'=>$wt_directmaterial,
                        'what_idms'=>$wt_indsourcing,
                        'areaof_interest'=>$area_interest,
                        'areainterest_id'=>$area_id,
                        'growth_experience'=>$ge,
                        'growthexp_id'=>$ge_id,
                        'what_questions'=>$wt_quest,
                        'token'=>$token
                    );
                    $res1 = $this->db->insert('intern_survey',$datainput);
                    $activity_msg = $intername." has submited survey for review "; 
                    $sql2 = "INSERT INTO intern_activityfield (intern_details,champion_details,activity_message) VALUES ('$intern','$champion','$activity_msg')";
                    $res2 = $this->db->query($sql2);
                    $sql3 = "UPDATE intern_details SET token_validity = '1' WHERE id='$intern'";
                    $res3 = $this->db->query($sql3);
                    // $this->db->select("*");
                    // $this->db->from("intern_details");
                    // $this->db->where("id",$intern);
                    // $this->db->join("champion_details","intern_details.champion = champion_details.id");
                    // $result = $this->db->get();
                    // return $result;
                    echo "1";
               }
               else
               {
                   echo "0";
               }
               
            }
          }


          else
          {
              echo "Sorry Unable to find the Profile";
          }

       }

       public function importsurvey($data)
       {   
           $intern = $data['intern'];
           $areaof_interest = $data['areaof_interest'];
           $sql = "UPDATE intern_details SET intern_area = '$areaof_interest' WHERE id='$intern'";
           $result = $this->db->query($sql);
           $this->db->select("*");
           $this->db->from("intern_details");
           $this->db->where("intern_details.id",$intern);
           $this->db->join("champion_details","intern_details.champion = champion_details.id");
           $query = $this->db->get();
           return $query;
       }

       public function sponsorprofile()
       {
        $sponsor_id = $this->session->userdata('sponsor_id');
        $this->load->database();
        $this->db->where("sponsor_id",$sponsor_id);
        $query = $this->db->get('sponsor_details');
        return $query;
       }

       public function sponsorpersonality()
       {
        $this->load->database();
        $sponsor_id = $this->session->userdata('sponsor_id');
        $this->db->where("sponsor_details",$sponsor_id);
        $query = $this->db->get('sponsor_personalityprofile');
        return $query;
       }

       public function sponsorfunctexp()
       {
        $this->load->database();
        $sponsor_id = $this->session->userdata('sponsor_id');
        $this->db->where("sponsor_details",$sponsor_id);
        $query = $this->db->get('sponsor_functionalexp');
        return $query;
        
       }

       public function assignnetwork($data)
       {
           $area_expertice = $data['area_expertice'];
           $this->load->database();
           $sql = $this->db->query("SELECT * FROM networking_interview WHERE areaof_expertice like '%$area_expertice%'");
           return $sql;
        }

        public function addnetworkintern($data)
        {
           $user = $data['user'];
           $champion = $data['champion_id'];
           $network_id = $data['network_id'];
           $data1 = explode(",",$network_id);   
          
           foreach($data1 as $network)
           {
               $query = "SELECT * FROM networkassigned_details WHERE net_id='$network' AND intern_id='$user'";
               $res = $this->db->query($query);
               if($res->num_rows() < 1)
               {    
                    $sql = "INSERT INTO networkassigned_details (net_id,intern_id,champion_id) VALUES ('$network','$user','$champion')";
                    $this->db->query($sql);
                    $error = "0";
                    return $error;
               }
               else
               {
                    $error = "1";
                    return $error;  
               }
               
           }
        }

        public function intern_champion($user)
        {
            $this->db->select("*");
            $this->db->from("intern_details");
            $this->db->where("intern_details.id",$user);
            $this->db->join("champion_details","intern_details.champion = champion_details.id");
            $result = $this->db->get();
            return $result;
        }


        public function internnetworkinterview()
        {
            $intern = $this->session->userdata('intern_id');
            $this->db->select("*");
            $this->db->from("intern_details");
            $array = array('intern_details.id' => $intern,'completed_status' => '0');
            $this->db->where($array);
            $this->db->join("networkassigned_details","intern_details.id = networkassigned_details.intern_id");
            $this->db->join("networking_interview","networkassigned_details.net_id = networking_interview.network_id");
            $result = $this->db->get();
            return $result;
        }

        public function interviewunassigned($intern_id)
        {
            $this->db->where("intern_id",$intern_id);
            $result = $this->db->get('networkassigned_details');
            $rows = $result->num_rows();
            return $rows;
        }
        public function networkcount()
        {
            $intern = $this->session->userdata('intern_id');
            $sql = "SELECT * FROM networkassigned_details WHERE intern_id='$intern' AND shedule_status = '1' AND completed_status='1'";
            $result = $this->db->query($sql);
            $completed = $result->num_rows();
            return $completed;
        }

        public function shedulednetwork()
        {
            $intern = $this->session->userdata('intern_id');
            $sql = "SELECT * FROM networkassigned_details WHERE intern_id='$intern'";
            $result = $this->db->query($sql);
            $assigned = $result->num_rows();
            return $assigned;
        }

        public function networkstatus_sheduled($data)
        {
           $user = $data['user'];
           $assign_id = $data['assign_id'];
           $status = $data['status'];
           $champion = $data['champion'];
           $user_name = $data['user_name'];
           $function_assign = $data['funct_assign'];
           $query = "SELECT * FROM networkassigned_details WHERE shedule_status='1' AND assign_id='$assign_id' AND intern_id='$user'";
           $res = $this->db->query($query);
           $numrow = $res->num_rows();
           if($numrow == 0)
           {
            $sql = "UPDATE networkassigned_details SET shedule_status='1' WHERE assign_id='$assign_id' AND intern_id='$user'";
            $result = $this->db->query($sql);
            $message = $user_name." has been Sheduled the network interview for ".$function_assign;
            $sql1 = "INSERT INTO intern_activityfield (intern_details, champion_details, activity_message) VALUES ('$user', '$champion', '$message')";
            $result1 = $this->db->query($sql1);
            echo "nss";
           }

           else
           {
            echo "nsf";
           }
        }

     
        public function networkstatus_completed($data)
        {
            $user = $data['user'];
            $assign_id = $data['assign_id'];
            $status = $data['status'];
            $champion = $data['champion'];
            $user_name = $data['user_name'];
            $function_assign = $data['funct_assign'];
            $query = "SELECT * FROM networkassigned_details WHERE completed_status='1' AND assign_id='$assign_id' AND intern_id='$user'";
            $res = $this->db->query($query);
            $numrow = $res->num_rows();
            if($numrow == 0)
            {
                $sql = "UPDATE networkassigned_details SET completed_status='1' WHERE assign_id='$assign_id' AND intern_id='$user'";
                $result = $this->db->query($sql);
                $message = $user_name." has been Marked As Completed the network interview for ".$function_assign;
                $sql1 = "INSERT INTO intern_activityfield (intern_details, champion_details, activity_message) VALUES ('$user', '$champion', '$message')";
                $result1 = $this->db->query($sql1);

                $this->db->select("*");
                $this->db->from("networkassigned_details");
                $array = array('shedule_status'=>1,"completed_status"=>1,'intern_id'=>$user);
                $this->db->where($array);
                $networkcount = $this->db->get();
                $network_count = $networkcount->num_rows();
                $this->db->set("networkcompleted_count",$network_count);
                $this->db->where("id",$user);
                $this->db->update("intern_details");
                echo "ncs";
            }
            else
            {
                echo "ncf";
            }
          
        }

        //getting intern feed backs

        public function intern_feedback()
        {
            $champion =  $id = $this->session->userdata('user_id');
            $this->db->select("*");
            $this->db->from("intern_details");
            $this->db->where("intern_details.champion",$champion);
            $this->db->join("intern_feedback","intern_details.id = intern_feedback.intern_details");
            $result = $this->db->get();
            return $result;
        }

        public function updatechampic($path,$champion_id)
        {
            $champion_id = $champion_id;
            $path_parts = pathinfo($path);
            $profile_pic = $path_parts['filename'].".".$path_parts['extension'];
            $sql = "UPDATE champion_details SET c_profile_picture = '$profile_pic' WHERE id='$champion_id'";
            $result = $this->db->query($sql);
            if($result == TRUE)
            {
                $this->load->helper('url');
                redirect(base_url().'/championprofile');  
            }
        }

        public function updatechambanner($path,$champion_id)
        {
            $champion_id = $champion_id;
            $path_parts = pathinfo($path);
            $banner_pic = $path_parts['filename'].".".$path_parts['extension'];
         
            $sql = "UPDATE champion_details SET c_banner = '$banner_pic' WHERE id='$champion_id'";
            $result = $this->db->query($sql);
            if($result == TRUE)
            {
                $this->load->helper('url');
                redirect(base_url().'/championprofile');  
            }
        }

        public function updateintpic($path,$intern_id)
        {
            $intern_id = $intern_id;
            $path_parts = pathinfo($path);
            $profile_pic = $path_parts['filename'].".".$path_parts['extension'];
            $sql = "UPDATE intern_details SET profile_picture = '$profile_pic' WHERE id='$intern_id'";
            $result = $this->db->query($sql);
            if($result == TRUE)
            {
                $this->load->helper('url');
                redirect(base_url().'/internprofile');  
            }
        }
        

        public function internaddfeedback($data)
        {
            $intern_id = $data['intern_details'];
            $this->db->insert('intern_feedback',$data);
            $this->db->select("*");
            $this->db->from("intern_feedback");
            $this->db->where("intern_details",$data['intern_details']);
            $result = $this->db->get();
            $review_count = $result->num_rows();
            $this->db->set("reviews_count",$review_count);
            $this->db->where("id",$intern_id);
            $this->db->update("intern_details");
            
        }

        public function addpersonp($data)
        {
            $this->db->insert('champion_personalityprofile',$data);
        }

        public function add_education($data)
        {
            $this->db->insert('champion_education',$data);
        }

        public function add_functional($data)
        {
            $this->db->insert('champion_functionexp',$data);
        }

        public function dlt_personality($data)
        {
            $this->db->where($data);
            $this->db->delete('champion_personalityprofile');
        }

        public function dlt_education($data)
        {
            $this->db->where($data);
            $this->db->delete('champion_education');  
        }

        public function dlt_funcexp($data)
        {
            $this->db->where($data);
            $this->db->delete('champion_functionexp'); 
        }

        public function ch_updp($data)
        {
            $champion = $data['champion'];
            $cp_id = $data['cp_id'];
            $p_title = $data['p_title'];
            $p_brief = $data['p_brief'];
            $sql = "UPDATE champion_personalityprofile SET personality_title='$p_title', personality_exp='$p_brief' WHERE cp_id='$cp_id' AND champion_details='$champion'";
            $result = $this->db->query($sql);
            return TRUE;
        }

        public function edit_cedu($data)
        {
            $champion = $data['champion'];
            $edu_id = $data['edu_id'];
            $upd_course = $data['upd_course'];
            $upd_univ = $data['upd_univ'];
            $sql = "UPDATE champion_education SET course='$upd_course', university='$upd_univ' WHERE cedu_id='$edu_id' AND champion_details='$champion'";
            $result = $this->db->query($sql);
            return TRUE;
        }

        public function editfuncexp($data)
        {
            $champion = $data['champion'];
            $func_id = $data['func_id'];
            $f_title = $data['f_title'];
            $fexp = $data['fexp'];
            $sql = "UPDATE champion_functionexp SET functional_title='$f_title', functional_exp='$fexp' WHERE cfunction_id='$func_id' AND champion_details='$champion'";
            $result = $this->db->query($sql);
            return TRUE;
        }

        public function addnetwork_emp($data)
        {
            $this->db->insert('networking_interview',$data);
            echo "success";
        }

        public function cresetpassword($data)
        {
           $r_email = $data['r_email'];
           $this->db->select('*');
           $this->db->from('champion_details');
           $this->db-> where('c_email', $r_email);
           $result = $this->db->get();
           $data_r['result'] =  $result;
           $data_r['rows']   = $result->num_rows();
           return $data_r;

        }

        public function c_updatepassword($data)
        {
            $res_password = $data['res_password'];
            $r_token = $data['res_token'];
            $r_pass = md5($res_password);
            $sql = "UPDATE champion_details SET password='$r_pass' WHERE c_token='$r_token'";
            $result = $this->db->query($sql);
            return TRUE;
        } 
        
        public function growthexp()
        {
           $result = $this->db->get("growth_experienceprograms");
           return $result;
        }

        public function growthexp_assign($data)
        {
            $intern = $data['intern'];
            $champion = $data['champion'];
            $growth_id = $data['growth_id'];
            $data_g = explode(",",$growth_id);   
            foreach($data_g as $growth)
            {
               
               $query = "SELECT * FROM assigned_ge WHERE intern_id='$intern' AND exp_id='$growth'";
               $res = $this->db->query($query);
               if($res->num_rows() < 1)
               {
                $sql = "INSERT INTO  assigned_ge (exp_id , intern_id, champion_id) VALUES ('$growth','$intern','$champion')";
                $this->db->query($sql); 
                $error = "0";
                return $error;
               }
               else
               {
                $error = "1";
                return $error;
               }
              
            }     
        }

        public function growthnotification($intern)
        {
            $this->db->select("*");
            $this->db->from("intern_details");
            $this->db->where("intern_details.id",$intern);
            $this->db->join("champion_details","intern_details.champion = champion_details.id");
            $result = $this->db->get();
            return $result;
        }

        public function assigned_ge($data)
        {
            $intern = $data['user'];
            $this->db->select('*');
            $this->db->from('assigned_ge');
            $this->db->where('intern_id',$intern);
            $this->db->join("growth_experienceprograms","assigned_ge.exp_id = growth_experienceprograms.ge_id");
            $ge_result = $this->db->get();
            return $ge_result;
        }

        public function ge_intern()
        {
            $intern = $this->session->userdata('intern_id');
            $this->db->select('*');
            $this->db->from('assigned_ge');
            $this->db->where('intern_id',$intern);
            $this->db->join("intern_details","intern_details.id = '$intern'");
            $this->db->join("growth_experienceprograms","assigned_ge.exp_id = growth_experienceprograms.ge_id");
            $ge_result = $this->db->get();
            return $ge_result;
        }
        
        public function growth_progress($data)
        {
           $g_id = $data['growth_id'];
           $growth_status = $data['growth_status'];
           $intern = $data['intern'];
           $intern_name = $data['intern_name'];
           $champion = $data['champion'];
           $query = "SELECT * FROM assigned_ge WHERE ge_progress =1 AND exp_id='$g_id' AND intern_id='$intern'";
           $result = $this->db->query($query);
           $numrows = $result->num_rows();
           if($numrows == 0)
           {
                $sql = "UPDATE assigned_ge SET ge_progress =1 WHERE exp_id='$g_id' AND intern_id='$intern'";
                $result = $this->db->query($sql);
                $this->db->select("*");
                $this->db->where("ge_id",$g_id);
                $res = $this->db->get("growth_experienceprograms");
                foreach($res->result() as $row)
                {
                    $ge_name = $row->ge_name;
                    $notification = $intern_name." has updated growth experience ".$ge_name." as Inprogress ";
                    $data1 = array(
                        'intern_details'=>$intern,
                        'champion_details'=>$champion,
                        'activity_message'=>$notification
                    );
                    $res1 = $this->db->insert("intern_activityfield",$data1);
                    echo "0";
                } 
           }

           else
           {
               echo "1";
           }
        
        }

        public function growth_completed($data)
        {
            $ge_id = $data['growth_id'];
            $growth_status = $data['growth_status'];
            $intern = $data['intern'];
            $intern_name = $data['intern_name'];
            $champion = $data['champion'];
            echo $growth_status;
        }

        public function networkinginterview()
        {
            $result = $this->db->get("networking_interview");
            return $result;
        }

        public function intadnetwork($data)
        {
            $user = $data['user'];
            $champion = $data['champion_id'];
            $network_id = $data['network_id'];
            $query = "SELECT * FROM networkassigned_details WHERE net_id='$network_id' AND intern_id='$user'";
            $res = $this->db->query($query);
            if($res->num_rows() < 1)
            {    
                $sql = "INSERT INTO networkassigned_details (net_id,intern_id,champion_id) VALUES ('$network_id','$user','$champion')";
                $this->db->query($sql);
                $error = "0";        
            }
            else
            {
                $error = "1";
            }

            return $error;
        }

        public function iresetpass($data)
        {
           $int_email =$data['int_email'];
           $this->db->select('*');
           $this->db->from('intern_details');
           $this->db-> where('email', $int_email);
           $result = $this->db->get();
           $data_r['result'] =  $result;
           $data_r['rows']   = $result->num_rows();
           return $data_r; 
        }

        public function int_updpass($data)
        {
            $password = $data['intupass'];
            $token = $data['token'];
            $r_pass = md5($password);
            $sql = "UPDATE intern_details SET password='$r_pass' WHERE token='$token'";
            $result = $this->db->query($sql);
            if($result == TRUE)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }

        public function statusgrowth_c($path,$data)
        {
            $g_id = $data['g_id'];
            $intern_id = $data['user_id'];
            $intern_name = $data['username'];
            $champion = $data['champion'];
            $path_parts = pathinfo($path);
            $evidence = $path_parts['filename'].".".$path_parts['extension'];
            $query = "SELECT * FROM assigned_ge WHERE ge_completed=1 AND exp_id='$g_id' AND intern_id='$intern_id'";
            $result_n = $this->db->query($query);
            $numrows = $result_n->num_rows();
            if($numrows == 0)
            {
                $sql = "UPDATE assigned_ge SET ge_completed =1, proofof_ge='$evidence'  WHERE exp_id='$g_id' AND intern_id='$intern_id'";
                $result = $this->db->query($sql);
                $this->db->select("*");
                $this->db->where("ge_id",$g_id);
                $res = $this->db->get("growth_experienceprograms");

               
                foreach($res->result() as $row)
                {
                    $ge_name = $row->ge_name;
                    $notification = $intern_name." has updated growth experience ".$ge_name." as Completed ";
                    $data1 = array(
                        'intern_details'=>$intern_id,
                        'champion_details'=>$champion,
                        'activity_message'=>$notification
                    );
                    $res1 = $this->db->insert("intern_activityfield",$data1);
                    echo "1";
                }
            }
            else
            {
                echo "0";
            }
            
        }

        public function growthexp_approval()
        {
            $champion =  $this->session->userdata('user_id');
            $this->db->select('*');
            $this->db->from('assigned_ge');
            $array = array('champion_id' => $champion,'ge_progress' => '1','ge_completed'=>'1','champion_geapprove'=>'0');
            $this->db->where($array);
            $this->db->join("intern_details","assigned_ge.intern_id = intern_details.id");
            $this->db->join("growth_experienceprograms","assigned_ge.exp_id = growth_experienceprograms.ge_id");
            $result =  $this->db->get();
            return $result;
        }

        public function growthpercentage()
        {
            $intern = $this->session->userdata('intern_id');
            $this->db->where("intern_id",$intern);
            $result = $this->db->get("assigned_ge");
            $num_rowsg = $result->num_rows();
            return $num_rowsg;
        }

        public function growthpercentage_comp()
        {
            $intern = $this->session->userdata('intern_id');
            $this->db->select("*");
            $this->db->from("assigned_ge");
            $this->db->where("intern_id",$intern);
            $result = $this->db->get();
            $num_rowsg = $result->num_rows();
            return $num_rowsg;
        }
   
        public function approve_ge($data)
        {
            $g_id = $data['g_id'];
            $champion = $data['champion_id'];
            $sql = "UPDATE assigned_ge SET champion_geapprove = '1' WHERE assign_geid = '$g_id' AND champion_id='$champion'";
            $result = $this->db->query($sql);
            
            $this->db->select("*");
            $this->db->from("assigned_ge");
            $array = array('assign_geid'=>$g_id);
            $this->db->where($array);
            $res = $this->db->get();
            foreach($res->result() as $row)
            {
                $intern_id = $row->intern_id;
                $this->db->select("*");
                $this->db->from("assigned_ge");
                $array = array('ge_completed'=>1,"champion_geapprove"=>1,'intern_id'=>$intern_id);
                $res = $this->db->where($array);
                $gecount = $this->db->get();
                $ge_count = $gecount->num_rows();
                $this->db->set("growthexperience_count",$ge_count);
                $this->db->where("id",$intern_id);
                $this->db->update("intern_details");
            }
           
            echo "success";
        }

        public function internbatch()
        {
            $intern = $this->session->userdata('intern_id');
            $this->db->select("*");
            $this->db->from('assigned_ge');
            $array = array('intern_id'=>$intern,'ge_progress'=>'1','ge_completed'=>'1','champion_geapprove'=>'1');
            $this->db->where($array);
            $result = $this->db->get();
            $rowcount = $result->num_rows();
            return $rowcount;
        }

        public function sponsoremail()
        {
            $result = $this->db->get("sponsor_details");
            return $result;
        }

        public function sponsorlogin($data)
        {
            $email = $data['s_email'];
            $password = $data['s_pass'];
            $sql = "SELECT * FROM sponsor_details WHERE s_email = '$email' AND password='$password'";
            $result = $this->db->query($sql);
            $data_r['result'] =  $result;
            $data_r['rows']   = $result->num_rows();
            return $data_r;
        }

        public function getintern()
        {
            $result = $this->db->get("intern_details");
            return $result;
        }

        public function getinternrecord($intern_id)
        {
            $intern_id = $intern_id;
            $this->db->where("id",$intern_id);
            $result = $this->db->get("intern_details");
            $sql = "SELECT * FROM networkassigned_details WHERE intern_id='$intern_id' AND shedule_status = '1' AND completed_status='1'";
            $count = $this->db->query($sql);
            $networkcompleted = $count->num_rows();
            $this->db->select("*");
            $this->db->from("assigned_ge");
            $array = array('intern_id' => $intern_id,'champion_geapprove' => '1');
            $this->db->where($array);
            $resultg = $this->db->get();
            $num_rowsg = $resultg->num_rows();

            $data_r['result'] = $result;
            $data_r['networkcount'] = $networkcompleted;
            $data_r['growthcompleted'] = $num_rowsg;
            return $data_r;
        }

        public function submitproject($data)
        {
           $query = $this->db->insert("project_details",$data);
           $result = $this->db->get("champion_details");
           return $result;
        }

        public function project_details()
        {
            $this->db->select("*");
            $this->db->from("project_details");
            $array = array('project_approval_status'=>0,'project_rejection_status'=>0);
            $this->db->where($array);
            $this->db->join("intern_details","project_details.preferred_intern = intern_details.id");
            $this->db->join("sponsor_details","project_details.sponsor_details = sponsor_details.sponsor_id");
            $result = $this->db->get();
            return $result;
        }

        public function opentoall_projects()
        {
            $this->db->select("*");
            $this->db->from("project_details");
            $array = array('project_approval_status'=>0,'project_rejection_status'=>0,'opento_all'=>'Yes','preferred_intern'=>0);
            $this->db->where($array);
            $this->db->join("sponsor_details","project_details.sponsor_details = sponsor_details.sponsor_id");
            $result = $this->db->get();
            return $result;
        }

        public function get_projectdetails($project_id)
        {
            $this->db->select("*");
            $this->db->from("project_details");
            $this->db->where("project_id",$project_id);
            $this->db->join("intern_details","project_details.preferred_intern = intern_details.id");
            $this->db->join("sponsor_details","project_details.sponsor_details = sponsor_details.sponsor_id");
            $result = $this->db->get();
            return $result;
        }

        public function get_projectdetails_common($project_id)
        {
            $this->db->select("*");
            $this->db->from("project_details");
            $this->db->where("project_id",$project_id);
            $this->db->join("sponsor_details","project_details.sponsor_details = sponsor_details.sponsor_id");
            $result = $this->db->get();
            return $result;
        }

        public function apicall($data)
        {
            $query = $data['query'];
            $result = $this->db->query($query);
            return $result;
        }

        public function approve_project($data)
        {
           
            $project_id = $data['assigned_project_id'];
            $this->db->select("*");
            $this->db->from('assigned_projects');
            $this->db->where('assigned_project_id',$project_id);
            $result = $this->db->get();
            $numrows = $result->num_rows();
            if($numrows < 1)
            {
                $this->db->insert('assigned_projects',$data);
                $query = "UPDATE project_details SET project_approval_status = 1 WHERE project_id = '$project_id'";
                $result2 = $this->db->query($query);
                $this->db->select("*");
                $this->db->from("assigned_projects");
                $array = array('assigned_project_id'=>$data['assigned_project_id'],'intern_details'=>$data['intern_details']);
                $this->db->where($array);
                $this->db->join("intern_details","assigned_projects.intern_details = intern_details.id");
                $this->db->join("project_details","assigned_projects.assigned_project_id = project_details.project_id");
                $this->db->join("sponsor_details","assigned_projects.sponsor_details = sponsor_details.sponsor_id");
                $result2 = $this->db->get();
                return $result2;
            }
            else
            {
                echo "already there";
            }
        }

        public function approve_projectall($data)
        {
            $project_id = $data['project_id'];
            $this->db->set('project_approval_status', 1); 
            $this->db->where('project_id', $project_id);
            $this->db->update('project_details'); 
            $this->db->select("*");
            $this->db->from('project_details');
            $this->db->where('project_id',$project_id);
            $this->db->join("sponsor_details","project_details.sponsor_details = sponsor_details.sponsor_id");
            $result = $this->db->get();
            return $result;
        }


       
        public function assigned_projectdtls($intern_id)
        {
            $this->db->select("*");
            $this->db->from("assigned_projects");
            $array = array('intern_details'=>$intern_id,'internapprove_status'=>0);
            $this->db->where($array);
            $this->db->join("project_details","assigned_projects.assigned_project_id = project_details.project_id");
            $this->db->join("intern_details","assigned_projects.intern_details = intern_details.id");
            $this->db->join("sponsor_details","assigned_projects.sponsor_details = sponsor_details.sponsor_id");
            $result = $this->db->get();
            return $result;
        }

        public function assigned_projectdtlsc($intern_id)
        {
            $this->db->select("*");
            $this->db->from("assigned_projects");
            $array = array('intern_details'=>$intern_id,'internapprove_status'=>1);
            $this->db->where($array);
            $this->db->join("project_details","assigned_projects.assigned_project_id = project_details.project_id");
            $this->db->join("intern_details","assigned_projects.intern_details = intern_details.id");
            $this->db->join("sponsor_details","assigned_projects.sponsor_details = sponsor_details.sponsor_id");
            $result = $this->db->get();
            return $result;
        }

        public function addgrowhexperience()
        {
            $result = $this->db->get("growth_experienceprograms");
            return $result;
        }

        public function intaddge($ge_id,$intern_id)
        {
            $this->db->where('id',$intern_id);
            $query = $this->db->get('intern_details');
            $row = $query->row();
            $champion = $row->champion;
            $data1 = explode(",",$ge_id);   
            foreach($data1 as $ge)
            {
                $query = "SELECT * FROM assigned_ge WHERE exp_id='$ge' AND intern_id='$intern_id'";
                $res = $this->db->query($query);
                $numrows = $res->num_rows();
                $data_insert = array('exp_id'=>$ge,'intern_id'=>$intern_id,'champion_id'=>$champion);
                if($numrows != 1)
                {
                   $this->db->insert('assigned_ge',$data_insert);
                   echo "1";
                }
               else
                {
                  echo "0";
                }
            }
        }

        public function interviewproject($assigned_project,$inten_id,$token)
        {
            $this->db->select("*");
            $this->db->from("assigned_projects");
            $this->db->where("assign_prid",$assigned_project);
            $this->db->join("project_details","assigned_projects.assigned_project_id = project_details.project_id");
            $this->db->join("intern_details","assigned_projects.intern_details = intern_details.id");
            $this->db->join("sponsor_details","assigned_projects.sponsor_details = sponsor_details.sponsor_id");
            $result = $this->db->get();
            return $result;
        }
        public function check_assigned_projects($intern_id,$assigned_project)
        {
            $this->db->where('intern_details',$intern_id);
            $this->db->where("assign_prid",$assigned_project);
            $query = $this->db->get("assigned_projects");
            $num = $query->num_rows();
            return $num;
        }

        public function confirm_projectint($assign_id)
        {
            $this->db->set('internapprove_status', 1); 
            $this->db->where('assign_prid', $assign_id);
            $result = $this->db->update('assigned_projects'); 
            return TRUE;
        }

        public function search_geinput($gesearch)
        {
            $result = $this->db->query("SELECT * FROM growth_experienceprograms WHERE ge_name like '%$gesearch%'");
            return $result;
        }

        public function hello($id)
        {
            $query = "SELECT * FROM intern_details WHERE id='$id'";
            $results = $this->db->query($query);
            return $results;
        }

        public function addprojectupdate($data)
        {
            $this->db->insert('project_updates',$data);
        }

        public function projectupdates($assigned_project)
        {
            $this->db->where("project_assign_id",$assigned_project);
            $result = $this->db->get('project_updates');
            return $result;
        }

        public function dltprojectupd($dltupd_id)
        {  
            $query = $this->db->query("DELETE FROM project_updates WHERE p_update_id = '$dltupd_id' ");
            if($query)
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }

        public function dltprojectsk($dlttsk_id)
        {  
            $query = $this->db->query("DELETE FROM task_details WHERE task_id = '$dlttsk_id' ");
            return $query;
        }

        public function updatetask($data)
        {
            $this->db->insert("task_details",$data);
            echo "success";
        }

        public function projecttasks($projecttask_id)
        {

            $this->db->select("*");
            $this->db->from("task_details");
            $this->db->where("project_upd_id",$projecttask_id);
            $this->db->join("project_updates","task_details.project_upd_id = project_updates.p_update_id");
            $result = $this->db->get();
            return $result;
        }

        public function prupd($projecttask_id)
        {
            $this->db->where("p_update_id",$projecttask_id);
            $result = $this->db->get('project_updates');
            return $result;
        }

        public function markproject($data)
        {
            $intern_id = $data['intern_id'];
            $assign_id = $data['assign_id'];
            $query = "UPDATE assigned_projects SET project_status='1' WHERE assign_prid = '$assign_id' AND intern_details = '$intern_id'";
            $this->db->query($query);
            echo "success";
        }

        public function projectprogress($sponsor_id)
        {
            $this->db->select("*");
            $this->db->from("assigned_projects");
            $array = array('assigned_projects.sponsor_details'=>$sponsor_id,'assigned_projects.internapprove_status'=>1);
            $this->db->where($array);
            $this->db->join("project_details","assigned_projects.assigned_project_id = project_details.project_id");
            $this->db->join("intern_details","assigned_projects.intern_details = intern_details.id");
            $result = $this->db->get();
            return $result;
        }

        public function projectsubmitted($sponsor_id)
        {
            $this->db->select("*");
            $this->db->from("assigned_projects");
            $array = array('assigned_projects.sponsor_details'=>$sponsor_id,'assigned_projects.internapprove_status'=>0);
            $this->db->where($array);
            $this->db->join("project_details","assigned_projects.assigned_project_id = project_details.project_id");
            $this->db->join("intern_details","assigned_projects.intern_details = intern_details.id");
            $result = $this->db->get();
            return $result;
        }

        public function newprojectassigned($sponsor_id)
        {
            $this->db->select("*");
            $this->db->from("project_details");
            $array = array('sponsor_details'=>$sponsor_id,'project_approval_status'=>0);
            $this->db->where($array);
            $this->db->join("intern_details","project_details.preferred_intern=intern_details.id");
            $result = $this->db->get();
            return $result;
        }
       
        public function reject_project($data)
        {
            $this->db->where('project_id', $data['project_id']);
            $this->db->update('project_details', $data);

            $this->db->select("*");
            $this->db->from("project_details");
            $this->db->where("project_id",$data['project_id']);
            $this->db->join("sponsor_details","project_details.sponsor_details=sponsor_details.sponsor_id");
            $result = $this->db->get();
            return $result;
        }

        public function rejectedprojects($sponsor_id)
        {
            $this->db->select("*");
            $this->db->from("project_details");
            $array = array('sponsor_details'=>$sponsor_id,'project_rejection_status'=>1);
            $this->db->where($array);
            $result = $this->db->get();
            return $result;
        }

        public function areaexp()
        {
            $result = $this->db->get("area_of_interest");
            return $result;
        }

        public function filterarea($area)
        {
           $this->db->select("*");
           $this->db->from("networking_interview");
           $this->db->like('areaof_expertice', $area);
           $query = $this->db->get();
           return $query;
        } 

        public function commonprojects()
        {
            $this->db->select("*");
            $this->db->from("project_details");
            $array = array('opento_all'=>'Yes','preferred_intern'=>0,'project_approval_status'=>1);
            $this->db->where($array);
            $this->db->join("sponsor_details","project_details.sponsor_details=sponsor_details.sponsor_id");
            $result = $this->db->get();
            return $result;
        }
        
}