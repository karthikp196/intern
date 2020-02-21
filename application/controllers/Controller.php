<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
        parent::__construct();
        $this->load->library('session');
		$this->load->helper('form');
		$this->load->library('email');
		$this->load->helper('url');		
	}

	public function index()
	{	
		
        $this->load->helper('url');
        $this->load->model('main_model'); 
        $this->load->view('index');      
	
	}
	
	public function logindata()
	{
		$email = $this->input->post("l_email");
		$password = $this->input->post("l_pass");
		$data = array('email'=>$email,'password'=>$password);
		$this->load->model('main_model');
		$res = $this->main_model->login($data);
		$rows = $res['rows'];
		$results = $res['result'];
		if($rows == 1)
		{
			foreach($results->result() as $row)
			{
				$this->load->library('session');
				$this->session->set_userdata("user_id", $row->id);
				$message['username'] = $row->c_firstname;
				$message['success'] = "successfully logged in";
				$message['error'] = "0";

			}	
		}
		else
		{
			$message['username'] = "no username";
			$message['success'] = "no user found";
			$message['error'] = "1";
		}
		
		echo json_encode($message);
	}
	public function login()
	{
		
		$this->load->helper('url');
		$this->load->view('login');	
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		
		$this->load->helper('url');
		redirect( base_url() );  
	}
	

	public function s_logout()
	{
		$this->session->unset_userdata('sponsor_id');
		$this->load->helper('url');
		redirect( base_url()."sponsorlogin" );
	}
    
    public function dashboard()
    {
		$this->load->library('session');
		$this->load->helper('url');
        $this->load->view('dashboard');
	}
	
	public function championdashboard()
	{
		$this->load->model('main_model');
		$this->main_model->championprofile();
		$data['championprofile'] = $this->main_model->championprofile();
		$data['championintern'] = $this->main_model->championintern();
		$data['surveyresults'] = $this->main_model->surveyresults();
		$data['internactivity'] = $this->main_model->internactivity();
		$data['growthexp_approval'] = $this->main_model->growthexp_approval();
		$data['project_details'] = $this->main_model->project_details();
		$data['opentoall_projects'] = $this->main_model->opentoall_projects();
		$data['area_interest'] = $this->main_model->areaexp();
		$this->load->helper('url');
		$this->load->view('championmanagment',$data);
	}

	public function championprofile()
	{
		$this->load->model('main_model');
		$this->main_model->championprofile();
		$data['championprofile'] = $this->main_model->championprofile();
		$data['championintern'] = $this->main_model->championintern();
		$data['champion_youtubeblog'] = $this->main_model->champion_youtubeblog();
		$data['champion_socialmedia'] = $this->main_model->champion_socialmedia();
		$data['championfuncexp'] = $this->main_model->championfuncexp();
		$data['championeducation'] = $this->main_model->championeducation();
		$data['championperprof'] = $this->main_model->championperprof();
		$data['intern_feedback'] = $this->main_model->intern_feedback();
		$this->load->helper('url');
        $this->load->view('championprofile',$data); 
	}

	public function internprofile()
	{
		$this->load->model('main_model');
		$this->main_model->internprofile();
		$intern_id = $this->session->userdata('intern_id');
		$data['internprofile'] = $this->main_model->internprofile();
		$data['internvideoblog'] = $this->main_model->internvideoblog();
		$data['internsocialmedia'] = $this->main_model->internsocialmedia();
		$data['internnetworkinterview'] = $this->main_model->internnetworkinterview();
		$data['interviewunassigned'] = $this->main_model->interviewunassigned($intern_id);
		$data['networkcompleted'] = $this->main_model->networkcount();
		$data['shedulednetwork'] = $this->main_model->shedulednetwork();
		$data['ge_intern'] = $this->main_model->ge_intern();
		$data['internbatch'] = $this->main_model->internbatch();
		$data['growth_assigncount'] = $this->main_model->growthpercentage();
		$data['assigned_projectdtls'] = $this->main_model->assigned_projectdtls($intern_id);
		$data['assigned_projectdtlsc'] = $this->main_model->assigned_projectdtlsc($intern_id);
		$this->load->helper('url');
		$this->load->view('internprofile',$data);
	}



	public function abtchmp()
	{
		$chmpabtid = $this->input->post('about_chmpid');
		$abtcont = $this->input->post('abt_cont');
		$data = array('chmpabtid'=>$chmpabtid,'abtcont'=>$abtcont);
		$this->load->model('main_model');
		$this->main_model->abtchmpupd($data);

	}

	public function uploadchampy()
	{
		$user_id = $this->input->post('user_id');
		$video_id = $this->input->post('video_id');
		$vid_src = $this->input->post('vid_src');
		$data = array('user_id'=>$user_id,'video_id'=>$video_id,'vid_src'=>$vid_src);
		$this->load->model('main_model');
		$this->main_model->uploadchampy($data);
	}

	public function deletechampy()
	{
		$user = $this->input->post('user');
		$video_id = $this->input->post('vid_id');
		$data = array('user'=>$user,'video_id'=>$video_id);
		$this->load->model('main_model');
		$this->main_model->dltchmpy($data);
	}

	public function addchampy()
	{
		$id = $this->input->post('id');
		$video = $this->input->post('video');
		$data = array('id'=>$id,'video'=>$video);
		$this->load->model('main_model');
		$this->main_model->addchmpy($data);
	}

	public function updatechampprof()
	{
		$chmp_id = $this->input->post('c_id');
		$firstname = $this->input->post('c_firstname');
		$lastname = $this->input->post('c_lname');
		$phone = $this->input->post('c_phone');
		$address = $this->input->post('c_address');
		$about = $this->input->post('c_abt');
		$position = $this->input->post('c_position');
		$data = array('c_firstname'=>$firstname,'c_lastname'=>$lastname,'c_phone'=>$phone,'c_position'=>$position,'c_address'=>$address,'c_about'=>$about);
		$id = $chmp_id;
		$this->load->model('main_model');
		$result = $this->main_model->updatechampprof($data,$id);
		if($result == TRUE)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	
	}

	public function mail1()
	{
		$this->load->view('emails/testemail.php');
	}

	public function inviteintern()
	{
		$champion = $this->input->post('champion');
		$intern_name = $this->input->post('inv_name');
		$intern_email = $this->input->post('inv_email');
		$company_email = $this->input->post('comp_email'); 
		$message = $this->input->post('message');
		$token = $this->input->post('token'); 
		$data = array('champion'=>$champion,'intern_name'=>$intern_name,'intern_email'=>$intern_email,'company_email'=>$company_email,'token'=>$token);
		$this->load->model('main_model');
		$result7 = $this->main_model->inviteintern($data);
			if($result7 == TRUE)
				{
					$url = "http://internmastershosting.com/controller/internregistration?token=".$token;
					$email = $intern_email;
					$data = array(
						'url'=> $url,
						'userName'=>$intern_name,
						'message' =>$message
						);
					$msg = $this->load->view('emails/testemail.php',$data,TRUE);  
					$this->load->library('phpmailer_library');
					$subject = "Invitation For join as intern";
					$mail = $this->phpmailer_library->load();
					$mail->IsSMTP();
					$mail->SMTPDebug = 0;
					$mail->SMTPAuth = true;
					
					//$mail->SMTPSecure = "tls";
					$mail->Port = 587;
					$mail->Username = SMTP_USERNAME;
					$mail->Password = SMTP_PASSWORD;
					$mail->Host = SMTP_HOST;
					$mail->Mailer   = "smtp";
					$mail->SetFrom(SMTP_USERNAME, "InternMasters");
					$mail->isHTML(true); 
					$mail->AddAddress($email);
					$mail->Subject = $subject;
					$mail->MsgHTML($msg);
					
					$mail->SMTPOptions = array(
						'ssl' => array(
							'verify_peer' => false,
							'verify_peer_name' => false,
							'allow_self_signed' => true
						)
					);
					//echo $email;
					if(!$mail->send())
					{
						echo 'Message could not be sent.';
						echo 'Mailer Error: ' . $mail->ErrorInfo;
					}
					else
					{
						echo '1';
					}
				// 	$url = "http://internmastershosting.com/controller/internregistration?token=".$token;
				// $config = Array(
				// 	'protocol' => 'smtp',
				// 	'smtp_host' => 'smtp.gmail.com',
				// 	'smtp_port' => 465,
				// 	'smtp_user' => 'internmasters.wattabyte@gmail.com', // change it to yours
				// 	'smtp_pass' => 'InternMasters@123', // change it to yours
				// 	'mailtype' => 'html',
				// 	'charset' => 'iso-8859-1',
				// 	'wordwrap' => TRUE
				// );
				// $link = $url;
				
				// $this->load->library('email', $config);
				// $this->email->set_mailtype("html");
				// $data = array(
				// 	'url'=> $link,
				// 	'userName'=>$intern_name,
				// 	'message' =>$message
				// 		);
				// $this->email->from($company_email, "Intern Masters");
				// $this->email->to($intern_email);		
				// $this->email->subject("Invitation For join as intern");
				// $body = $this->load->view('emails/testemail.php',$data,TRUE);
				// $this->email->message($body);  
				// $data['message'] = "Sorry Unable to send email...";
				// if ($this->email->send()) {
				// 	$data['message'] = "Mail sent...";
				// }
				// 	echo "1";
			}
			else
			{
				echo "0";
			}

	}

	public function internregistration()
	{ 
		if(isset($_GET['token']))
		{
			$this->load->view('internregistration');
		}
		else
		{
			$this->load->view('404');
		}	
	}

	public function insertintern()
	{
		$password = $this->input->post('password');
		$cpassword = $this->input->post('cpassword');
		$token = $this->input->post('token_key');
		$config['upload_path'] = 'images/uploads/intern/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
		$this->load->library('upload', $config);
		  if (!$this->upload->do_upload('profilepic_intern')){
			  // If the upload fails
			  echo $this->upload->display_errors('<p>', '</p>');
		  }
		  else
		  {
			  // Pass the full path and post data to the set_newstudent model
			  $this->load->model('main_model');
			 $result = $this->main_model->insertintern($this->upload->data('full_path'),$this->input->post());
			 if($result == TRUE)
			 {
				$this->load->helper('url');
                redirect(base_url().'/controller/internsurvey?token='.$token);  
			 }
			 else
			 {
				  echo "Without invitation you cannot login / you may already signed up";
			 }
		  
		  }
	}

	public function internlogin()
	{
		$this->load->view('internlogin');
	}

	public function internsignin()
	{
		$intern_mail = $this->input->post('intern_email');
		$intern_pass = $this->input->post('intern_password');
		$data = array('intern_mail'=>$intern_mail,'intern_pass'=>$intern_pass);
		$this->load->model('main_model');
		$this->main_model->internsignin($data);
	}

	public function sponsorcommunity()
	{
		$this->load->view('sponsorcommunity');
	}

	public function sponsordata()
	{
		$this->load->view('email');
		$this->load-model('main_model');
		$data = array('u_name'=>$user,'u_pass'=>$password);
		$this->main_model->login($data);
	}

	public function updateintern()
	{
		$intern_id = $this->input->post('intern_id');
		$intern_name = $this->input->post('intern_name');
		$intern_lname = $this->input->post('intern_lname');
		$intern_mobile = $this->input->post('intern_mobile');
		$intern_college = $this->input->post('intern_college');
		$intern_address = $this->input->post('intern_address');
		$intern_about = $this->input->post('intern_about');
		$data = array('intern_id'=>$intern_id,'intern_name'=>$intern_name,'intern_lname'=>$intern_lname,'intern_mobile'=>$intern_mobile,'intern_college'=>$intern_college,'intern_address'=>$intern_address,'intern_about'=>$intern_about);
		$this->load->model('main_model');
		$this->main_model->updateintern($data);

		echo 1;
	}

	public function updateinernpic()
	{
		$intern_id = $this->session->userdata('intern_id');
		$config['upload_path'] = 'images/uploads/intern/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
		$config['max_width']  = '1000';
        $config['max_height']  = '1000';
		$this->load->library('upload', $config);
		  if (!$this->upload->do_upload('profile_internpic'))
		  {
			  echo $this->upload->display_errors('<p>', '</p>');
		  }
		  else
		  {
			  echo "success";
			  $this->load->model('main_model');
			  $this->main_model->updateintpic($this->upload->data('full_path'),$intern_id);
			  
		  }
	}


	public function internlogout()
	{
		$intern_id = $this->session->userdata('intern_id');
		$date = date('d-m-Y H:i:s');
		$this->load->model("main_model");
		$this->main_model->intern_inactive($intern_id,$date);
		$this->session->unset_userdata('intern_id');
		$this->load->helper('url');
		redirect( base_url()."internlogin" );  
	}

	public function internaddvideo()
	{
		$intern_id = $this->input->post('user_id');
		$video_src = $this->input->post('video_src');
		$data = array('intern_id'=>$intern_id,'video_src'=>$video_src);
		$this->load->model('main_model');
		$this->main_model->internaddvideo($data);
	}

	public function internaddmedia()
	{
		$intern_id = $this->input->post('user_id');
		$media_src = $this->input->post('media_src');
		$data = array('intern_id'=>$intern_id,'media_src'=>$media_src);
		$this->load->model('main_model');
		$this->main_model->internaddmedia($data);
	}

	public function interndltvideo()
	{
		$intern_id = $this->input->post('user');
		$video_id = $this->input->post('video_id');
		$data = array('intern_id'=>$intern_id,'video_id'=>$video_id);
		$this->load->model('main_model');
		$this->main_model->interndltvideo($data);
	}

	public function internedtvideo()
	{
		$intern = $this->input->post('user_id');
		$video_id = $this->input->post('v_id');
		$video_src = $this->input->post('v_src');
		$data = array('intern'=>$intern,'video_id'=>$video_id,'video_src'=>$video_src);
		$this->load->model('main_model');
		$this->main_model->internedtvideo($data);
	}

	public function interndltmedia()
	{
		$intern_id = $this->input->post('user');
		$media_id = $this->input->post('media_id');
		$data = array('intern_id'=>$intern_id,'media_id'=>$media_id);
		$this->load->model('main_model');
		$this->main_model->interndltmedia($data);
	}

	public function internedtmedia()
	{
		$intern = $this->input->post('user_id');
		$media_id = $this->input->post('m_id');
		$media_src = $this->input->post('m_src');
		$data = array('intern'=>$intern,'media_id'=>$media_id,'media_src'=>$media_src);
		$this->load->model('main_model');
		$this->main_model->internedtmeida($data);
		echo "1";
	}

	public function internsearch()
	{
		$search_inp = $this->input->post('search_inp');
		$data = array('search_inp'=>$search_inp);
		$this->load->model('main_model');
		$this->main_model->internsearch($data);
	}

	public function surveyresults()
	{
		if(isset($_GET['survey'])&& $_GET['token'] && $_GET['user'])
		{
			$survey = $_GET['survey'];
			$token = $_GET['token'];
			$user = $_GET['user'];
			$data = array('survey_id'=>$survey,'token'=>$token,'user'=>$user);
			$this->load->model('main_model');
			$this->main_model->getsurvey($data);
			$result['surveyresult'] = $this->main_model->getsurvey($data);
			$result['ge_result'] = $this->main_model->assigned_ge($data);
			$this->load->view('surveyresult',$result);

		}
		else
		{
			$this->load->view('404');
		}
		

	}

	public function internsurvey()
	{
		if(isset($_GET['token']))
		{
			$this->load->model('main_model');
			$data['ge_name'] = $this->main_model->growthexp();
			$data['area'] = $this->main_model->areaexp();
			$this->load->view('internsurvey',$data);
		}
		else
		{
			$this->load->view('404');
		}
		
		
	}

	public function updatesurvey()
	{
		$wt_learn = $this->input->post('wt_learn');
		$wt_procurement = $this->input->post('wt_procurement');
		$wt_purchasing = $this->input->post('wt_purchasing');
		$wt_sourcing = $this->input->post('wt_sourcing');
		$wt_procurepay = $this->input->post('wt_procurepay');
		$wt_difst = $this->input->post('wt_difst');
		$wt_stakehold = $this->input->post('wt_stakehold');
		$wt_directmaterial = $this->input->post('wt_directmaterial');
		$wt_indsourcing = $this->input->post('wt_indsourcing');
		$wt_quest = $this->input->post('wt_quest');
		$areaof_interest = $this->input->post('areaof_interest');
		$area_id = $this->input->post('area_id');
		$growth_exp = $this->input->post('growth_exp');
		$ge_id = $this->input->post('ge_id');
		$token = $this->input->post('token');
		$data = array('wt_learn'=>$wt_learn,'wt_procurement'=>$wt_procurement,'wt_purchasing'=>$wt_purchasing,'wt_sourcing'=>$wt_sourcing,
		'wt_procurepay'=>$wt_procurepay,'wt_difst'=>$wt_difst,'wt_stakehold'=>$wt_stakehold,'wt_directmaterial'=>$wt_directmaterial,
		'wt_indsourcing'=>$wt_indsourcing,'wt_quest'=>$wt_quest,'areaof_interest'=>$areaof_interest,'areainterest_id'=>$area_id,'growth_exp'=>$growth_exp,'ge_id'=>$ge_id,'token'=>$token
	);
		$this->load->model('main_model');
		$this->main_model->updatesurvey($data);
		// foreach($res->result() as $row)
		// {
		// 	$champion_email = $row->c_email;
		// 	$champion_name = $row->c_firstname;
		// 	$intern = $row->firstname;
		// 	$email = $champion_email;
		// 	$url = base_url();
		// 	$data = array(
		// 		'url'=> $url,
		// 		'champion'=>$champion_name,
		// 		'intern'=>$intern,
		// 		);
		// 	$msg = $this->load->view('emails/project_rejection.php',$data,TRUE);
		// 	$this->load->library('phpmailer_library');
		// 	$subject = "Internmasters - new survey submitted";
		// 	$mail = $this->phpmailer_library->load();
		// 	$mail->IsSMTP();
		// 	$mail->SMTPDebug = 0;
		// 	$mail->SMTPAuth = true;
			
		// 	//$mail->SMTPSecure = "tls";
		// 	$mail->Port = 587;
		// 	$mail->Username = "hraju465@gmail.com";
		// 	$mail->Password = "blackbery";
		// 	$mail->Host = "smtp.gmail.com";
		// 	$mail->Mailer   = "smtp";
		// 	$mail->SetFrom("hraju465@gmail.com", "InternMasters");
		// 	$mail->isHTML(true); 
		// 	$mail->AddAddress($email);
		// 	$mail->Subject = $subject;
		// 	$mail->MsgHTML($msg);
			
		// 	$mail->SMTPOptions = array(
		// 		'ssl' => array(
		// 			'verify_peer' => false,
		// 			'verify_peer_name' => false,
		// 			'allow_self_signed' => true
		// 		)
		// 	);
		// 	//echo $email;
		// 	if(!$mail->send())
		// 	{
		// 		echo 'Message could not be sent.';
		// 		echo 'Mailer Error: ' . $mail->ErrorInfo;
		// 	}
		// 	else
		// 	{
		// 		echo '1';
		// 	}
		// }
	}

	public function sponsorprofile()
	{
		$sponsor_id = $this->session->userdata('sponsor_id');
		$this->load->model('main_model');
		$this->main_model->sponsorprofile();
		$this->main_model->sponsorpersonality();
		$this->main_model->sponsorfunctexp();
		$data['sponsorprofile'] = $this->main_model->sponsorprofile();
		$data['sponsorpersonality'] = $this->main_model->sponsorpersonality();
		$data['sponsorfunctexp'] = $this->main_model->sponsorfunctexp();
		$data['getintern'] = $this->main_model->getintern();
		$data['projectprogress'] = $this->main_model->projectprogress($sponsor_id);
		$data['projectsubmitted'] = $this->main_model->projectsubmitted($sponsor_id);
		$data['newprojectassigned'] = $this->main_model->newprojectassigned($sponsor_id);
		$data['rejectedprojects'] = $this->main_model->rejectedprojects($sponsor_id);
		$this->load->view('sponsorprofile',$data);
	}
	
	//importing area of interest to intern profile
	public function importsurvey()
	{
		$intern = $this->input->post('user');
		$areaof_interest = $this->input->post('area');
		$data = array('areaof_interest'=>$areaof_interest,'intern'=>$intern);
		$this->load->model('main_model');
		$import = $this->main_model->importsurvey($data);

		foreach($import->result() as $row)
		{
			$champion_email = $row->c_email;
			$intern_email = $row->email;
			$intern_area = $row->intern_area;
			$champion_name = $row->c_firstname;
			$intern_name = $row->firstname;
			$message = $champion_name." Has added your area of interest as ".  $intern_area." Please Check your profile ";
			$success ="Successfully area of interest Imported";
			echo $success;
			
			//    // Email configuration
			// 	   $config = Array(
			// 	    'protocol' => 'smtp',
			// 	    'smtp_host' => 'mail..co',
			// 	    'smtp_port' => 465,
			// 	    'smtp_user' => 'admin@.co', // change it to yours
			// 	    'smtp_pass' => 'admin@123#', // change it to yours
			// 	    'mailtype' => 'html',
			// 	    'charset' => 'iso-8859-1',
			// 	    'wordwrap' => TRUE
			// 	);
			
			// 	$this->load->library('email', $config);
			// 	 $this->email->set_mailtype("html");
			// 	$data = array(
					
			// 		'userName'=>$intern_name
			// 			);
			// 	$this->email->from($champion_email, $champion_name."From Internmasters");
			// 	$this->email->to($intern_email);		
			// 	$this->email->subject("Notification For survey results");
			// 	$body = $this->load->view('emails/testemail.php',$data,TRUE);
			// 	$this->email->message($body);  
			// 	$data['message'] = "Sorry Unable to send email...";
			// 	if ($this->email->send()) {
			// 	    $data['message'] = "Mail sent...";
			// 	}
			
		}
		
	}

	//fetching networkinterview
	public function assignnetwork()
	{
		$area_expertice = $this->input->post('area_expertice');
		$data=array('area_expertice'=>$area_expertice);
		$this->load->model('main_model');
		$this->main_model->assignnetwork($data);
		$data1 = $this->main_model->assignnetwork($data);
		$message = array();
		$i = 0;
		foreach($data1->result() as $row)
		{
			if($data1->num_rows() >= 1)
			{
				$message['msg'] = 1;
				$message['result'][$i]['id'] = $row->network_id;
				$message['result'][$i]['name'] = $row->employer_name;
				$message['result'][$i]['email'] = $row->emp_email;
				$message['result'][$i]['area'] = $row->areaof_expertice;
				$message['result'][$i]['location'] = $row->emp_location;
				$i++;
			}
			else
			{
				$message['msg'] = 0;
			}
		
			
		}
		echo json_encode($message);
	}

	//adding ntework interview to intern from champion
	public function addnetworkintern()
	{
		$user = $this->input->post('user');
		$net_id = $this->input->post('net_id');
		$champion_id = $this->session->userdata('user_id');
		$data = array('user'=>$user,'network_id'=>$net_id,'champion_id'=>$champion_id);
		$this->load->model('main_model');
		$result = $this->main_model->addnetworkintern($data);

		if($result == 0)
		{
			$this->load->model('main_model');
			$res = $this->main_model->intern_champion($user);
			foreach($res->result() as $row)
			{
					$champion_name = $row->c_firstname;
					$champion_email = $row->c_email;
					$intern_email = $row->email;
					$intern_name = $row->firstname;
					$link = "http://internmastershosting.com/controller/internlogin";	

					$email = $intern_email;
					$data = array(
					'url'=> $link,
					'userName'=>$intern_name,
					'champion_name'=>$champion_name
						);
					$msg = $this->load->view('emails/networkinterviewadd.php',$data,TRUE);  
					$this->load->library('phpmailer_library');
					$subject = "Internmasters - New Network interview Assigned";
					$mail = $this->phpmailer_library->load();
					$mail->IsSMTP();
					$mail->SMTPDebug = 0;
					$mail->SMTPAuth = true;
					
					//$mail->SMTPSecure = "tls";
					$mail->Port = 587;
					$mail->Username = SMTP_USERNAME;
					$mail->Password = SMTP_PASSWORD;
					$mail->Host = SMTP_HOST;
					$mail->Mailer   = "smtp";
					$mail->SetFrom(SMTP_USERNAME, "InternMasters");
					$mail->isHTML(true); 
					$mail->AddAddress($email);
					$mail->Subject = $subject;
					$mail->MsgHTML($msg);
					
					$mail->SMTPOptions = array(
						'ssl' => array(
							'verify_peer' => false,
							'verify_peer_name' => false,
							'allow_self_signed' => true
						)
					);
					//echo $email;
					if(!$mail->send())
					{
						echo 'Message could not be sent.';
						echo 'Mailer Error: ' . $mail->ErrorInfo;
					}
					else
					{
						echo 'Suggessfully assigned';
					}

				// $champion_name = $row->c_firstname;
				// $champion_email = $row->c_email;
				// $intern_email = $row->email;
				// $intern_name = $row->firstname;
				// $url = "http://internmastershosting.com/controller/internlogin";
				// $config = Array(
				// 'protocol' => 'smtp',
				// 'smtp_host' => 'mail.internmastershosting.com',
				// 'smtp_port' => 465,
				// 'smtp_user' => 'test@internmastershosting.com', // change it to yours
				// 'smtp_pass' => 'test@internmasters', // change it to yours
				// 'mailtype' => 'html',
				// 'charset' => 'iso-8859-1',
				// 'wordwrap' => TRUE
				// );
				// $link = $url;
				
				// $this->load->library('email', $config);
				// $this->email->set_mailtype("html");
				// $data = array(
				// 	'url'=> $link,
				// 	'userName'=>$intern_name,
				// 	'champion_name'=>$champion_name
				// 		);
				// $this->email->from($champion_email, "Intern Masters");
				// $this->email->to($intern_email);		
				// $this->email->subject("Notification For Network Interview");
				// 	$body = $this->load->view('emails/networkinterviewadd.php',$data,TRUE);
				// $this->email->message($body);  
				// $data['message'] = "Sorry Unable to send email...";
				// if ($this->email->send()) {
				// 	echo "successfully assigned network interview";
				// }

			}
			
		} 

		else
		{
			echo "intern already assigned";
		}
	}
	//sponsor login page
	public function sponsorlogin()
	{
		$champion = $this->uri->segment(3);
		$data['champion'] = $champion;
		if($champion)
		{
			$this->load->view('sponsorlogin',$data);
		}
		else
		{
			$this->load->view('sponsorlogin');
		}
		
	}

	//intern network status
	public function networkstatus()
	{
		$user = $this->input->post('user');
		$champion = $this->input->post('champion');
		$username = $this->input->post('u_name');
		$func_ass = $this->input->post('funct_ass');
		$assign_id = $this->input->post('assign_id');
		$status = $this->input->post('status');
		if($status == "scheduled")
		{
	
			$data = array('user'=>$user,'champion'=>$champion,'user_name'=>$username,'funct_assign'=>$func_ass,'assign_id'=>$assign_id,'status'=>$status);
			$this->load->model('main_model');
			$result = $this->main_model->networkstatus_sheduled($data);	
			// if($result == TRUE)
			// {
			// 	echo "Network interview Has been sheduled";
			// }
		}
		else if($status == "complete")
		{
			$data = array('user'=>$user,'champion'=>$champion,'user_name'=>$username,'funct_assign'=>$func_ass,'assign_id'=>$assign_id,'status'=>$status);
			$this->load->model('main_model');
			$result = $this->main_model->networkstatus_completed($data);
			if($result == TRUE)
			{
				echo "Network interview Has been Marked As completed";
			}
		}
		
	}


	//intern sending feedback 
	public function internaddfeedback()
	{
		$user = $this->input->post('user');
		$champion = $this->input->post('champion');
		$feedback = $this->input->post('feedback');
		$data = array('intern_details'=>$user,'champion_details'=>$champion,'intern_feedback'=>$feedback);
		$this->load->model('main_model');
		$this->main_model->internaddfeedback($data);
		echo "feedback added successfully";
	}

	//champion updating profile picture
	public function updatechampic()
	{
		$champion_id =$this->session->userdata('user_id');
		$config['upload_path'] = 'images/uploads/champion/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
		$this->load->library('upload', $config);
		  if (!$this->upload->do_upload('profile_chmp'))
		  {
			  // If the upload fails
			  echo $this->upload->display_errors('<p>', '</p>');
		  }
		  else
		  {
			  // Pass the full path and post data to the set_newstudent model
			  $this->load->model('main_model');
			  $this->main_model->updatechampic($this->upload->data('full_path'),$champion_id);
			  
		  }
	}

	//champion adding personality profile
	public function add_personp()
	{
		$personality_t = $this->input->post('p_title');
		$personality_exp = $this->input->post('p_exp');
		$champion = $this->session->userdata('user_id');
		$data = array('personality_title'=>$personality_t,'personality_exp'=>$personality_exp,'champion_details'=>$champion);
		$this->load->model('main_model');
		$this->main_model->addpersonp($data);
		echo "Personality profile added successfully";
	}

	//champion adding education details
	public function add_education()
	{
		$course = $this->input->post('course');
		$college = $this->input->post('college');
		$champion = $this->session->userdata('user_id');
		$data = array('course'=>$course,'university'=>$college,'champion_details'=>$champion);
		$this->load->model('main_model');
		$this->main_model->add_education($data);
		echo "education details added";
	}

	//champion adding functional experiences
	public function add_functional()
	{
		$func_title = $this->input->post('func_title');
		$func_exp = $this->input->post('func_exp');
		$champion = $this->session->userdata('user_id');
		$data = array('functional_title'=>$func_title,'functional_exp'=>$func_exp,'champion_details'=>$champion);
		$this->load->model('main_model');
		$this->main_model->add_functional($data);
		echo "Functional details added";
	}

	//champion deleting personality profile
	public function dlt_personality()
	{
		$p_id = $this->input->post('p_id');
		$data = array('cp_id'=>$p_id);
		$this->load->model('main_model');
		$this->main_model->dlt_personality($data);
		echo "successfully deleted";
	}

	//champion deleting education details
	public function dlt_education()
	{
		$edu_id = $this->input->post('edu_id');
		$data = array('cedu_id'=>$edu_id);
		$this->load->model('main_model');
		$this->main_model->dlt_education($data);
		echo "successfully deleted";
	}

	//champion deleting functional experiences
	public function dlt_funcexp()
	{
		$dltf_id = $this->input->post('func_id');
		$data = array('cfunction_id'=>$dltf_id);
		$this->load->model('main_model');
		$this->main_model->dlt_funcexp($data);
		echo "successfully deleted";
	}

	//champion updating personality profile
	public function ch_updp()
	{
		$cp_id = $this->input->post('cp_id');
		$p_title = $this->input->post('p_title');
		$p_brief = $this->input->post('p_brief');
		$champion = $this->session->userdata('user_id');
		$data = array('champion'=>$champion, 'cp_id'=>$cp_id, 'p_title'=>$p_title, 'p_brief'=>$p_brief);
		$this->load->model('main_model');
		$result = $this->main_model->ch_updp($data);
		if($result == TRUE)
		{
			echo "successfully updated";
		}
	}

	//champion editing education details
	public function edit_cedu()
	{
		$edu_id = $this->input->post('edu_id');
		$upd_course = $this->input->post('upd_course');
		$upd_univ = $this->input->post('upd_univ');
		$champion = $this->session->userdata('user_id');
		$data = array('champion'=>$champion, 'edu_id'=>$edu_id, 'upd_course'=>$upd_course, 'upd_univ'=>$upd_univ);
		$this->load->model('main_model');
		$result = $this->main_model->edit_cedu($data);
		if($result == TRUE)
		{
			echo "successfully updated";
		}
	}

	//champion editing functional experience
	public function editfuncexp()
	{
		$func_id = $this->input->post('func_id');
		$f_title = $this->input->post('f_title');
		$fexp = $this->input->post('fexp');
		$champion = $this->session->userdata('user_id');
		$data = array('champion'=>$champion, 'func_id'=>$func_id, 'f_title'=>$f_title, 'fexp'=>$fexp);
		$this->load->model('main_model');
		$result = $this->main_model->editfuncexp($data);
		// if($result == TRUE)
		// {
		// 	echo "successfully updated";
		// }
	}

	//champion adding network internview employers
	public function addnetwork_emp()
	{
		$emp_name = $this->input->post('emp_name');
		$emp_email = $this->input->post('emp_email');
		$emp_area = $this->input->post('emp_area');
		$emp_func = $this->input->post('emp_func');
		$emp_loc = $this->input->post('emp_loc');
		$data = array('employer_name'=>$emp_name,'emp_email'=>$emp_email,'areaof_expertice'=>$emp_area,'functional_assignments'=>$emp_func,'emp_location'=>$emp_loc);
		$this->load->model('main_model');
		$this->main_model->addnetwork_emp($data);
	}

	//champion forgot password page
	public function cforgotpassword()
	{
		$this->load->view('champ_forgetpassword');
	}

	// champion reset password mail funtion
	public function cresetpassword()
	{
		$r_email = $this->input->post('r_email');
		$data = array('r_email'=>$r_email);
		$this->load->model('main_model');
		$res = $this->main_model->cresetpassword($data);	
		$num_rows = $res['rows'];
		$result = $res['result'];
		if($num_rows == 1)
		{
			foreach($result->result() as $row)
			{
				$champion_name = $row->c_firstname;
				$champion_email = $row->c_email;
				$token = $row->c_token;
				$url = "http://internmastershosting.com/controller/c_reset?token=".$token;
				$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'mail.internmastershosting.com.com',
				'smtp_port' => 465,
				'smtp_user' => 'test@internmastershosting.com', // change it to yours
				'smtp_pass' => 'test@internmasters', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
				);
				$link = $url;
				
				$this->load->library('email', $config);
				$this->email->set_mailtype("html");
				$data = array(
					'url'=> $link,
					'userName'=>$champion_name,
					'champion_name'=>$champion_name
						);
				$this->email->from('test@internmastershosting.com', "Intern Masters");
				$this->email->to($champion_email);		
				$this->email->subject("Password Reset Link");
				$body = $this->load->view('emails/creset.php',$data,TRUE);
				$this->email->message($body);  
				$data['message'] = "Sorry Unable to send email...";
				if ($this->email->send()) {
					echo "1";
				}

			}
		}
		else
		{
			echo "0";
		}
		
	
	}

	//champion resett password link
	public function c_reset()
	{
		if(isset($_GET['token']))
		{
			$this->load->view('champ_resetpassword');
		}
		else
		{
			$this->load->view('404');
		}
		
	}

	// champion updating resetted password
	public function c_updatepassword()
	{
		$res_password = $this->input->post('r_pass');
		$res_token = $this->input->post('r_token');
		$data = array('res_password'=>$res_password,'res_token'=>$res_token);
		$this->load->model('main_model');
		$result = $this->main_model->c_updatepassword($data);
		if($result == TRUE)
		{
			echo "password updated successfully";
		}
		else
		{
			echo "unable to update password";
		}
	}
	

	//champion assigning growth experience
	public function growthexp_assign()
	{
		$intern = $this->input->post('intern');
		$champion = $this->input->post('champion');
		$growth_exp = $this->input->post('growth_exp');
		$data = array('intern'=>$intern,'champion'=>$champion,'growth_id'=>$growth_exp);
		$this->load->model('main_model');
		$result = $this->main_model->growthexp_assign($data);
		if($result == 0)
		{
			$res = $this->main_model->growthnotification($intern);
			foreach($res->result() as $row)
			{
				$champion_name = $row->c_firstname;
				$champion_email = $row->c_email;
				$intern_email = $row->email;
				$intern_name = $row->firstname;
				$link = "http://internmastershosting.com/controller/internlogin";
				$data = array(
					'url'=> $link,
					'userName'=>$intern_name,
					'champion_name'=>$champion_name
						);
					$msg = $this->load->view('emails/geadd.php',$data,TRUE);
					$this->load->library('phpmailer_library');
					$subject = "Internmasters - new Growth Expereince Assigned";
					$mail = $this->phpmailer_library->load();
					$mail->IsSMTP();
					$mail->SMTPDebug = 0;
					$mail->SMTPAuth = true;
					
					//$mail->SMTPSecure = "tls";
					$mail->Port = 587;
					$mail->Username = SMTP_USERNAME;
					$mail->Password = SMTP_PASSWORD;
					$mail->Host = SMTP_HOST;
					$mail->Mailer   = "smtp";
					$mail->SetFrom(SMTP_USERNAME, "InternMasters");
					$mail->isHTML(true); 
					$mail->AddAddress($intern_email);
					$mail->Subject = $subject;
					$mail->MsgHTML($msg);
					
					$mail->SMTPOptions = array(
						'ssl' => array(
							'verify_peer' => false,
							'verify_peer_name' => false,
							'allow_self_signed' => true
						)
					);
					//echo $email;
					if(!$mail->send())
					{
						echo 'Message could not be sent.';
						echo 'Mailer Error: ' . $mail->ErrorInfo;
					}
					else
					{
						echo 'Growth Experience assigned successfully';
					}
				}
						
			}
			
		
		else
		{
			echo "GE already Exists";
		}
	}

	//intern growth experience status in progress
	public function statusgrowth()
	{
		$growth_id = $this->input->post('g_id');
		$growth_status = $this->input->post('g_status');
		$intern = $this->input->post('intern');
		$intern_name = $this->input->post('intern_name');
		$champion = $this->input->post('champion');
		$data = array('growth_id'=>$growth_id,'growth_status'=>$growth_status,'intern'=>$intern,'intern_name'=>$intern_name,'champion'=>$champion);
		$this->load->model('main_model');
		$result = $this->main_model->growth_progress($data);
	}


	//intern growth experience status completed
	public function statusgrowth_c()
	{
		$g_id = ($_POST['g_id']);
		$userid = ($_POST['user_info']);
		$username = ($_POST['user_name']);
		$champion = ($_POST['champion']);
		$data = array('g_id'=>$g_id,'user_id'=>$userid,'username'=>$username,'champion'=>$champion);

		if(isset($_FILES["file"]["name"]))  
		{  
			 $config['upload_path'] = 'images/uploads/growth/';  
			 $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx';  
			 $this->load->library('upload', $config);  
			 if(!$this->upload->do_upload('file'))  
			 {  
				 $error =  $this->upload->display_errors(); 
				 $message = $this->upload->display_errors();;
				 echo "<script type='text/javascript'>alert('$message');</script>";
			 }  
			 else 
			 {  
				$this->load->model('main_model');
					$this->main_model->statusgrowth_c($this->upload->data('full_path'),$data);
			 }  
 			
		}  
	
	}

	//networking blueprint page
	public function networkingblueprint()
	{
		if(!($this->session->userdata('intern_id')))
		{
			$this->load->view('internlogin');
		}
		else
		{
				$this->load->model('main_model');
				$data['intern_details'] = $this->main_model->internprofile();
				$data['networkinginterview'] = $this->main_model->networkinginterview();
				$data['networkfilter'] = $this->main_model->areaexp();
				$this->load->view('internetworking',$data);

		}	
	}



	//intern adds network interview from networking blueprint
	public function intadnetwork()
	{
		$net_id = $this->input->post('network_id');
		$intern = $this->input->post('intern');
		$champion = $this->input->post('champion');
		$data = array('user'=>$intern,'champion_id'=>$champion,'network_id'=>$net_id);
		$this->load->model('main_model');
		$result = $this->main_model->intadnetwork($data);
		if($result == 0)
		{
			
			$res = $this->main_model->growthnotification($intern);
			foreach($res->result() as $row)
			{
				$champion_name = $row->c_firstname;
				$champion_email = $row->c_email;
				$intern_email = $row->email;
				$intern_name = $row->firstname;
			}

		
			$this->networkinterviewmail($champion_name,$champion_email,$intern_name,$intern_email);
		}
		else
		{
			echo "0";
		}
	}

	public function networkinterviewmail($champion_name,$champion_email,$intern_name,$intern_email)
	{
		
		$link = "http://internmastershosting.com/controller/championlogin";	
	
		$email = $champion_email;
		$data = array(
		'url'=> $link,
		'userName'=>$champion_name,
		'champion_name'=>$intern_name
			);
		$msg = $this->load->view('emails/networkaddnotification.php',$data,TRUE);
		$this->load->library('phpmailer_library');
		$subject = "Internmasters - New Network interview Added by";
		$mail = $this->phpmailer_library->load();
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		
		//$mail->SMTPSecure = "tls";
		$mail->Port = 587;
		$mail->Username = SMTP_USERNAME;
		$mail->Password = SMTP_PASSWORD;
		$mail->Host = SMTP_HOST;
		$mail->Mailer   = "smtp";
		$mail->SetFrom(SMTP_USERNAME, "InternMasters");
		$mail->isHTML(true); 
		$mail->AddAddress($champion_email);
		$mail->Subject = $subject;
		$mail->MsgHTML($msg);
		
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		
		if(!$mail->send())
		{
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
		else
		{
			echo '1';
		}

	}

	public function internrforgotpassword()
	{
		$this->load->view('intern_forgetpassword');
	}

	//intern reset password mail sending function
	public function iresetpass()
	{
		$int_email = $this->input->post('int_email');
		
		$data = array('int_email'=>$int_email);
		$this->load->model('main_model');
		$res = $this->main_model->iresetpass($data);
		$num_rows = $res['rows'];
		$result = $res['result'];
		if($num_rows == 1)
		{
			foreach($result->result() as $row)
			{
				$intern_name = $row->firstname;
				$intern_email = $row->email;
				$token = $row->token;
				$url = "http://internmastershosting.com/controller/i_reset?token=".$token;
				$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'mail.internmastershosting.com.com',
				'smtp_port' => 465,
				'smtp_user' => 'test@internmastershosting.com', // change it to yours
				'smtp_pass' => 'test@internmasters', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
				);
				$link = $url;
				
				$this->load->library('email', $config);
				$this->email->set_mailtype("html");
				$data = array(
					'url'=> $link,
					'userName'=>$intern_name,
					'champion_name'=>$intern_name
						);
				$this->email->from('test@internmastershosting.com', "Intern Masters");
				$this->email->to($intern_email);		
				$this->email->subject("Password Reset Link");
				$body = $this->load->view('emails/creset.php',$data,TRUE);
				$this->email->message($body);  
				$data['message'] = "Sorry Unable to send email...";
				if ($this->email->send()) {
					echo "1";
				}
			}
		}
		else
		{
			echo "0";
		}
	}


	//intern  reset password link
	public function i_reset()
	{
		if(isset($_GET['token']))
		{
			$this->load->view('intern_resetpassword');
		}
		else
		{
			$this->load->view('404');
		}	
	}

	//intern updating a new password
	public function int_updpass()
	{
		$intr_pass = $this->input->post('password');
		$int_token = $this->input->post('token');
		$data = array('intupass'=>$intr_pass,'token'=>$int_token);
		$this->load->model('main_model');
		$result = $this->main_model->int_updpass($data);
		if($result == TRUE)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}

	//growth experience approval from champion to intern
	public function approve_ge()
	{
		$g_id = $this->input->post('g_id');
		$champion_id = $this->session->userdata('user_id');
		$data = array('g_id'=>$g_id,'champion_id'=>$champion_id);
		$this->load->model('main_model');
		$this->main_model->approve_ge($data);
	}

	public function projectpipeline()
	{
		$this->load->model("main_model");
		$data['sponsoremail'] = $this->main_model->sponsoremail();
		$this->load->view('projectpipeline',$data);
	}

	public function requestprojects()
	{
		$message = $this->input->post('message');
		$email = $this->input->post('email');
		$email_array = explode(",",$email);
		$champion = $this->session->userdata('user_id');
		$url = base_url()."/controller/sponsorscommunity/".$champion;

		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'internmasters.wattabyte.gmail.com', // change it to yours
		'smtp_pass' => 'InternMasters@123', // change it to yours
		'mailtype' => 'html',
		'charset' => 'iso-8859-1',
		'wordwrap' => TRUE
		);
		$link = $url;
		
		$this->load->library('email', $config);
		$this->email->set_mailtype("html");
		$data = array(
			'url'=> $link,
			'message'=>$message,
				);
		$this->email->from('internmasters.wattabyte.gmail.com', "Intern Masters");
		$this->email->to($email_array);		
		$this->email->subject("Password Reset Link");
		$body = $this->load->view('emails/requestproject.php',$data,TRUE);
		$this->email->message($body);  
		$data['message'] = "Sorry Unable to send email...";
		if ($this->email->send()) {
			echo "1";
		}
	}

	public function sponsorscommunity()
	{
		$champion = $this->uri->segment(3);
		$data['champion'] = $champion;
		$this->load->view('sponsorscommunity',$data);
	}

	public function sponsorlog()
	{
		$message = array();
		$email = $this->input->post('s_email');
		$password = $this->input->post('s_pass');
		$data = array('s_email'=>$email,'s_pass'=>$password);
		$this->load->model('main_model');
		$res = $this->main_model->sponsorlogin($data);
		$rows = $res['rows'];
		$results = $res['result'];
		if($rows == 1)
		{
			foreach($results->result() as $row)
			{
				$this->load->library('session');
				$this->session->set_userdata("sponsor_id", $row->sponsor_id);
				$message['success'] = $row->sponsor_id;
				$message['error'] = "0";
			}	
		}
		else
		{
			$message['success'] = "no user found";
			$message['error'] = "1";
		}
		
		echo json_encode($message);
	}

	public function getinternrecord()
	{
		$message = array();
		$intern_id = $this->input->post('intern');
		$this->load->model('main_model');
		$res = $this->main_model->getinternrecord($intern_id);
		$results = $res['result'] ;
		foreach ($results->result() as $row)
		{
			$message['email'] = $row->email;
			$message['name'] = $row->firstname;
			$message['picture'] = $row->profile_picture;
		}
		$message['network_count'] = $res['networkcount'];
		$message['ge_completed'] = $res['growthcompleted'];
		echo json_encode($message);
	}

	public function submitproject()
	{
		$function = $this->input->post('functional_area');
		$intern_select = $this->input->post('open_to_intern');
		$intern_details = $this->input->post('intern');
		$project_duration = $this->input->post('project_duration');
		$percentage_time = $this->input->post('percentage_time');
		$project_location = $this->input->post('project_location');
		$open_to_intern = $this->input->post('open_to_intern');
		$project_title = $this->input->post('project_title');
		$project_description = $this->input->post('project_description');
		$project_goals = $this->input->post('project_goals');
		$sponsor_details = $this->session->userdata('sponsor_id');
		$managment_expectations = $this->input->post('managment_expectations');

		$config['upload_path'] = 'images/uploads/project/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|svg|pdf|docx|xlsx';
		$this->load->library('upload', $config);
		  if (!$this->upload->do_upload('project_attachment')){
			  echo $this->upload->display_errors('<p>', '</p>');
		  }
		  else
		  {
			$filename = $this->upload->data('file_name');
			$data = array(
				'project_title'=>$project_title,
				'project_function'=>$function,
				'preferred_intern'=>$intern_details,
				'project_duration'=>$project_duration,
				'project_time_allocated'=>$percentage_time,
				'project_location'=>$project_location,
				'opento_all'=>$open_to_intern,
				'project_description'=>$project_description,
				'project_goals'=>$project_goals,
				'project_performance_expectation'=>$managment_expectations,
				'sponsor_details'=>$sponsor_details,
				'project_attachments' => $filename
			);
	
			 $this->load->model('main_model');
			 $res = $this->main_model->submitproject($data);
			
			 foreach($res->result() as $row)
			 {
				 $email = $row->c_email;
				 $champion_name = $row->c_firstname;
				 $this->project_notitfications($email,$champion_name,$project_title);
			 }
			 $this->load->helper('url');
			 redirect( base_url()."sponsorprofile" );
		  }
	}



	public function project_notitfications($email,$champion_name,$project_title)
	{
		$url = "http://internmastershosting.com/championdashboard";
		$data = array(
			'url'=> $url,
			'username' =>$champion_name,
			"project_title" => $project_title
			);
		print_r($data);
		$msg = $this->load->view('emails/projectsubmission.php',$data,TRUE);  
		$this->load->library('phpmailer_library');
		$subject = "New project submission";
		$mail = $this->phpmailer_library->load();
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;

		//$mail->SMTPSecure = "tls";
		$mail->Port = 587;
		$mail->Username = SMTP_USERNAME;
		$mail->Password = SMTP_PASSWORD;
		$mail->Host = SMTP_HOST;
		$mail->Mailer   = "smtp";
		$mail->SetFrom(SMTP_USERNAME, "InternMasters");
		$mail->isHTML(true); 
		$mail->AddAddress($email);
		$mail->Subject = $subject;
		$mail->MsgHTML($msg);

		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		//echo $email;
		if(!$mail->send())
		{
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
		else
		{
			echo '1';
		}
	}

	public function projectdetails()
	{
		$this->load->helper('url');
		$project_id = $this->uri->segment(3);
		$this->load->model("main_model");
		$data['project_details'] = $this->main_model->get_projectdetails($project_id);
		$this->load->view('projectdetails',$data);
	}

	public function projectdetails_common()
	{
		$this->load->helper('url');
		$project_id = $this->uri->segment(3);
		$this->load->model("main_model");
		$data['projectdetails_common'] = $this->main_model->get_projectdetails_common($project_id);
		$this->load->view('projectdetails_common',$data);
	}

	public function api()
	{
		$query = $this->input->post('query');
		$data = array('query'=>$query);
		$this->load->model("main_model");
		$resutl = $this->main_model->apicall($data);
		foreach($resutl->result() as $row)
		{
			print_r($row);
		}
	}

	public function approve_project()
	{
		$project_id = $this->input->post('project_id');
		$sponsor_id = $this->input->post('sponsor_id');
		$intern_id = $this->input->post('intern_id');
		$data = array('assigned_project_id'=>$project_id,'intern_details'=>$intern_id,'sponsor_details'=>$sponsor_id);
		$this->load->model('main_model');
		$value = $this->main_model->approve_project($data);
		$this->intern_mail($value);
		$this->sponsor_mail($value);	
	}

	
	public function approve_projectall()
	{
		$project_id = $this->input->post('project_id');
		$sponsor_id = $this->input->post('sponsor_id');
		$data = array('project_id'=>$project_id,'sponsor_details'=>$sponsor_id);
		$this->load->model('main_model');
		$value = $this->main_model->approve_projectall($data);
		$this->sponsor_mail($value);	
	}


	public function intern_mail($value)
	{
		foreach ($value->result() as $row)
		{
			$internmail = $row->email;
			$intern_name = $row->firstname;
			$email = $internmail;
			$project_name = $row->project_title;
			$project_function = $row->project_function;
			$url = base_url()."/internprofile";
			$data = array(
				'url'=> $url,
				'userName'=>$intern_name,
				'project_name'=>$project_name,
				'project_function'=>$project_function,
				);
			$msg = $this->load->view('emails/projectnotification_intern.php',$data,TRUE);
			$this->load->library('phpmailer_library');
			$subject = "Internmasters new project Assignment";
			$mail = $this->phpmailer_library->load();
			$mail->IsSMTP();
			$mail->SMTPDebug = 0;
			$mail->SMTPAuth = true;
			
			//$mail->SMTPSecure = "tls";
			$mail->Port = 587;
			$mail->Username = SMTP_USERNAME;
			$mail->Password = SMTP_PASSWORD;
			$mail->Host = SMTP_HOST;
			$mail->Mailer   = "smtp";
			$mail->SetFrom(SMTP_USERNAME, "InternMasters");
			$mail->isHTML(true); 
			$mail->AddAddress($email);
			$mail->Subject = $subject;
			$mail->MsgHTML($msg);
			
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);
			//echo $email;
			if(!$mail->send())
			{
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			}
			else
			{
				echo '1';
			}
		}
	}

	public function sponsor_mail($value)
	{
		foreach ($value->result() as $row)
		{
			$sponsor_email = $row->s_email;
			$sponsor_name = $row->s_firstname;
			$email = $sponsor_email;
			$project_name = $row->project_title;
			$project_function = $row->project_function;
			$url = base_url()."/sponsorprofile";
			$data = array(
				'url'=> $url,
				'userName'=>$sponsor_name,
				'project_name'=>$project_name,
				'project_function'=>$project_function,
				);
			$msg = $this->load->view('emails/projectnotification_sponsor.php',$data,TRUE);
			$this->load->library('phpmailer_library');
			$subject = "Internmasters new project Assignment";
			$mail = $this->phpmailer_library->load();
			$mail->IsSMTP();
			$mail->SMTPDebug = 0;
			$mail->SMTPAuth = true;
			
			//$mail->SMTPSecure = "tls";
			$mail->Port = 587;
			$mail->Username = SMTP_USERNAME;
			$mail->Password = SMTP_PASSWORD;
			$mail->Host = SMTP_HOST;
			$mail->Mailer   = "smtp";
			$mail->SetFrom(SMTP_USERNAME, "InternMasters");
			$mail->isHTML(true); 
			$mail->AddAddress($email);
			$mail->Subject = $subject;
			$mail->MsgHTML($msg);
			
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);
			//echo $email;
			if(!$mail->send())
			{
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			}
			else
			{
				echo '1';
			}
		}
	}

	public function addgrowthexperience()
	{
		$this->load->model('main_model');
		$data['growthexpall'] = $this->main_model->addgrowhexperience();
		$this->load->view('growthexperiences',$data);
	}

	public function intaddge()
	{
		$ge_id = $this->input->post('ge_id');
		$intern_id = $this->session->userdata('intern_id');
		$data = array('ge_id'=>$ge_id,'intern_id'=>$intern_id);
		$this->load->model('main_model');
		$result = $this->main_model->intaddge($ge_id,$intern_id);
		// if($result > 0)
		// {
		// 	echo "1";
		// }
		// else
		// {
		// 	echo "0";
		// }
	}

	public function internviewproject()
	{
		$assigned_project = $this->uri->segment(3);
		$token = $this->uri->segment(4);
		$intern_id = $this->session->userdata('intern_id');
		$this->load->model('main_model');
		$data['internprofile'] = $this->main_model->internprofile();
		$data['project_detail'] = $this->main_model->interviewproject($assigned_project,$intern_id,$token);
		$check = $this->main_model->check_assigned_projects($intern_id,$assigned_project);
		if($check == 1)
		{
			$this->load->view('internviewproject',$data);
		}
		else
		{
			$this->load->view("404");
		}
		
	}

	public function confirm_projectint()
	{
		$assign_id = $this->input->post('assign_id');
		$this->load->model("main_model");
		$result = $this->main_model->confirm_projectint($assign_id);
		if($result == TRUE)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}


	public function search_geinput()
	{
		$gesearch = $this->input->post('ge_program');
		$this->load->model("main_model");
		$resultsearch = $this->main_model->search_geinput($gesearch);

		foreach($resultsearch->result() as $row)
		{
			echo "<p class='srch_txt m-1 p-1'> ".$row->ge_name."</p>";
		}
	}

	public function query()
	{
		$this->load->view('logic');
	}

	public function hello()
	{
		$id = "4";
		$this->load->model('main_model');
		$result = $this->main_model->hello($id);
		foreach($result->result() as $row)
		{
			$picture = $row->profile_picture;
		
		}
	}

	public function internprojectdetails()
	{
		$this->load->model('main_model');
		$intern_id = $this->session->userdata('intern_id');
		$assigned_project = $this->uri->segment(3);
		$token = $this->uri->segment(4);
		$data['project_detail'] = $this->main_model->interviewproject($assigned_project,$intern_id,$token);
		$data['internprofile'] = $this->main_model->internprofile();
		$data['project_updates'] = $this->main_model->projectupdates($assigned_project);
		$check = $this->main_model->check_assigned_projects($intern_id,$assigned_project);
		if($check == 1)
		{
			$this->load->view('internprojectdetails',$data);
		}
		else
		{
			$this->load->view("404");
		}	
	}

	public function projecttasks()
	{
		$this->load->model('main_model');
		$intern_id = $this->session->userdata('intern_id');
		$assigned_project = $this->uri->segment(3);
		$token = "";
		$projecttask_id = $this->uri->segment(4);
		$data['project_detail'] = $this->main_model->interviewproject($assigned_project,$intern_id,$token);
		$data['internprofile'] = $this->main_model->internprofile();
		$data['project_updates'] = $this->main_model->projectupdates($assigned_project);
		$data['projecttask'] = $this->main_model->projecttasks($projecttask_id);
		$data['prupd'] = $this->main_model->prupd($projecttask_id);
		$check = $this->main_model->check_assigned_projects($intern_id,$assigned_project);
		if($check == 1)
		{
			$this->load->view('project_tasks',$data);
		}
		else
		{
			$this->load->view("404");
		}	
	}

	public function addprojectupdate()
	{
		$project_update = $this->input->post('project_udpates');
		$intern = $this->input->post('intern');
		$sponsor = $this->input->post('sponsor');
		$project_id = $this->input->post('project');
		$assign_id = $this->input->post('assign_id');
		$data = array(
			'project_id'=>$project_id,
			'project_assign_id'=>$assign_id,
			'task_name' => $project_update,
			'intern_details' => $intern,
			'sponsor_details'=> $sponsor
		);
		$this->load->model('main_model');
		$this->main_model->addprojectupdate($data);
	}

	public function dltprojectupd()
	{
		$dltupd_id = $this->input->post('dlt_upd');
		$data = array(
			'p_update_id'=>$dltupd_id
		);
		$this->load->model('main_model');
		$this->main_model->dltprojectupd($dltupd_id);
	}

	public function updatetask()
	{
		$project_updid = $this->input->post('p_updid');
		$task_updates = $this->input->post('task_updates');
		$data = array(
			'project_upd_id'=>$project_updid,
			'task_updates'=>$task_updates
		);
		$this->load->model('main_model');
		$this->main_model->updatetask($data);
	}

	public function dltprojectsk()
	{
		$dlttsk_id = $this->input->post('id');
		$data = array(
			'task_id'=>$dlttsk_id
		);
		$this->load->model('main_model');
		$this->main_model->dltprojectsk($dlttsk_id);
	}
	public function markproject()
	{
		$assign_id = $this->input->post('assign_id');
		$intern_id = $this->session->userdata('intern_id');
		$data = array('assign_id'=>$assign_id,'intern_id'=>$intern_id);
		$this->load->model('main_model');
		$this->main_model->markproject($data);
	}

	public function reject_project()
	{
		$project_id = $this->input->post("project_id");
		$reason = $this->input->post("reason");
		$data = array('project_rejection_status'=>1,'reason_of_rejection'=>$reason,'project_id'=>$project_id);
		$this->load->model("main_model");
		$res = $this->main_model->reject_project($data);
		foreach($res->result() as $row)
		{
			$sponsor = $row->s_email;
			$sponsor_name = $row->s_firstname;
			$email = $sponsor;
			$project_name = $row->project_title;
			$project_function = $row->project_function;
			$reason = $row->reason_of_rejection;
			$url = base_url()."/sponsorprofile";
			$data = array(
				'url'=> $url,
				'sponsor'=>$sponsor_name,
				'project_name'=>$project_name,
				'project_function'=>$project_function,
				'reason'=>$reason,
				);
			$msg = $this->load->view('emails/project_rejection.php',$data,TRUE);
			$this->load->library('phpmailer_library');
			$subject = "Internmasters - Project Rejection Notification";
			$mail = $this->phpmailer_library->load();
			$mail->IsSMTP();
			$mail->SMTPDebug = 0;
			$mail->SMTPAuth = true;
			
			//$mail->SMTPSecure = "tls";
			$mail->Port = 587;
			$mail->Username = SMTP_USERNAME;
			$mail->Password = SMTP_PASSWORD;
			$mail->Host = SMTP_HOST;
			$mail->Mailer   = "smtp";
			$mail->SetFrom(SMTP_USERNAME, "InternMasters");
			$mail->isHTML(true); 
			$mail->AddAddress($email);
			$mail->Subject = $subject;
			$mail->MsgHTML($msg);
			
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);
			//echo $email;
			if(!$mail->send())
			{
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			}
			else
			{
				echo '1';
			}
		}
	}

	public function networkinterviewfilter()
	{
		$area1 = $this->uri->segment(3);
		$area = urldecode($area1);
		$this->load->model('main_model');
		$data1['intern_details'] = $this->main_model->internprofile();
		$data1['networkinginterviewfilter'] = $this->main_model->filterarea($area);
		$data1['networkfilter'] = $this->main_model->areaexp();
		$this->load->view('internetworkingfilter',$data1);
	}

	public function commonprojects()
	{
		$this->load->model("main_model");
		$data['project_all'] = $this->main_model->commonprojects();
		$this->load->view('commonprojects',$data);
	}

	public function updatechambanner()
	{
		$champion_id =$this->session->userdata('user_id');
		$config['upload_path'] = 'images/uploads/banner/champion';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
		$this->load->library('upload', $config);
		  if (!$this->upload->do_upload('banner_champ'))
		  {
			  // If the upload fails
			  echo $this->upload->display_errors('<p>', '</p>');
		  }
		  else
		  {
			  // Pass the full path and post data to the set_newstudent model
			  $this->load->model('main_model');
			  $this->main_model->updatechambanner($this->upload->data('full_path'),$champion_id);
			  
		  }
	}
	public function Test_Email()
    {
        $email = "internmasters.wattabyte@gmail.com";
        $msg = "Test Message";
        $this->load->library('phpmailer_library');
        $subject = "21st Century - Test Email";
        $mail = $this->phpmailer_library->load();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        
        //$mail->SMTPSecure = "tls";
        $mail->Port = 587;
		$mail->Username = SMTP_USERNAME;
		$mail->Password = SMTP_PASSWORD;
		$mail->Host = SMTP_HOST;
		$mail->Mailer   = "smtp";
		$mail->SetFrom(SMTP_USERNAME, "InternMasters");
        $mail->isHTML(true); 
        $mail->AddAddress($email);
        $mail->Subject = $subject;
        $mail->MsgHTML($msg);
        
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //echo $email;
        if(!$mail->send())
        {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
        else
        {
            echo 'Message has been sent';
        }
	}


	
}
