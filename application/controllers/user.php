<?php
class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('company_model');
		$this->load->library('form_validation');
				$this->config->set_item('language', $this->session->userdata('site_lang'));

	}

	public function user_register(){

		$kullanici = $this->session->userdata('user_in');
		if(!empty($kullanici)){
			redirect('', 'refresh');
		}
		//form kontroller

		$this->load->library('recaptcha');

/*		$this->load->helper('captcha');
		$vals = array(
	    'img_path'	 => './assets/captcha/',
			'img_url'	 => asset_url('captcha').'/',
			'img_width'	 => '200',
			'img_height' => 42,
	    'expiration' => 1024
    	);
		if(strtolower($this->input->post('captcha')) == strtolower($this->session->userdata('word'))){
			$captcha_control = true;
		}
		else{
			$captcha_control = false;
		}

		$cap = create_captcha($vals);
		//print_r($cap);
		$data['image'] = $cap['image'];
		$this->session->set_userdata('word', $cap['word']);*/

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|mb_strtolower|alpha_numeric|min_length[5]|max_length[50]|is_unique[t_user.user_name]');
		$this->form_validation->set_rules('name','Name','required|trim|xss_clean|max_length[50]');
		$this->form_validation->set_rules('surname','Surname','required|trim|xss_clean|max_length[50]');
		$this->form_validation->set_rules('jobTitle','Job Title','required|trim|xss_clean|max_length[150]');
		$this->form_validation->set_rules('description','Description','trim|xss_clean|max_length[200]');
		$this->form_validation->set_rules('email', 'e-mail' ,'required|trim|xss_clean|valid_email|max_length[100]|mb_strtolower|is_unique[t_user.email]');
		$this->form_validation->set_rules('cellPhone', 'Cell Phone Number', 'trim|xss_clean|max_length[50]');
		$this->form_validation->set_rules('workPhone', 'Work Phone Number', 'trim|xss_clean|max_length[50]');
		$this->form_validation->set_rules('fax', 'Fax Number', 'trim|xss_clean|max_length[50]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean|max_length[40]');

		$this->recaptcha->recaptcha_check_answer();
		if ($this->form_validation->run() !== FALSE  && $this->recaptcha->getIsValid())
		{
			//inserting data to database
			$data2 = array(
				'name'=>$this->input->post('name'),
				'surname'=>$this->input->post('surname'),
				'title'=>$this->input->post('jobTitle'),
				'description'=>$this->input->post('description'),
				'email'=>$this->input->post('email'),
				'phone_num_1'=>$this->input->post('cellPhone'),
				'phone_num_2'=>$this->input->post('workPhone'),
				'fax_num'=>$this->input->post('fax'),
				'user_name'=>$this->input->post('username'),
				'psswrd'=>md5($this->input->post('password'))
				//'photo'=>$this->input->post('username').'.jpg'
			);
			$last_inserted_user_id = $this->user_model->create_user($data2);

			//file properties
			$config['upload_path'] = './assets/user_pictures/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '5000';
			$config['file_name']	= $last_inserted_user_id.'.jpg';
			$this->load->library('upload', $config);

			//Resmi servera yükleme
			if (!$this->upload->do_upload())
			{
				$photo = array(
					'photo'=>'default.jpg'
				);
				$this->user_model->set_user_image($last_inserted_user_id,$photo);
			}
			//Yüklenen resmi boyutlandırma ve çevirme
			else{
				$config['image_library'] = 'gd2';
				$config['source_image']	= './assets/user_pictures/'.$last_inserted_user_id.'.jpg';
				$config['maintain_ratio'] = TRUE;
				$config['width']	 = 200;
				$config['height']	 = 200;
				$this->load->library('image_lib', $config);

				$this->image_lib->resize();


				$photo = array(
					'photo'=>$last_inserted_user_id.'.jpg'
				);
				$this->user_model->set_user_image($last_inserted_user_id,$photo);
			}
			//process completed
			redirect('completed', 'refresh');
		}

		$data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();

		$this->load->view('template/header');
		$this->load->view('user/create_user',$data);
		$this->load->view('template/footer');
	}

	function string_control($str)
	{
	    return (!preg_match("/^([-a-üöçşığz A-ÜÖÇŞİĞZ_ ])+$/i", $str)) ? FALSE : TRUE;
	}
	//bu kod telefon numaralarına - boşluk ve _ koymaya yarar
	function alpha_dash_space($str_in = '')
	{
		if (! preg_match("/^([-a-z0-9_ ])+$/i", $str_in)){
			$this->form_validation->set_message('_alpha_dash_space', 'The %s field may only contain alpha-numeric characters, spaces, underscores, and dashes.');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	public function user_login(){
		$kullanici = $this->session->userdata('user_in');
		if(!empty($kullanici)){
			redirect('', 'refresh');
		}
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|trim|callback_check_user');


		if ($this->form_validation->run() !== FALSE)
		{
			$username= mb_strtolower($this->input->post('username'));
			$password=md5($this->input->post('password'));
			$userInfo = $this->user_model->check_user($username,$password);
                        //print_r($userInfo);
			//session ayaları ve atama
			$session_array= array(
				'id' => $userInfo['id'],
				'username' => mb_strtolower($userInfo['user_name']),
				'email' => $userInfo['email'],
                                'role_id' => $userInfo['role_id']
				);
			$this->session->set_userdata('user_in',$session_array);

			//Redirect after login
			redirect('user/'.$username, 'refresh');
		}

		$this->load->view('template/header');
		$this->load->view('user/login_user');
		$this->load->view('template/footer');
	}

	public function check_user(){
		$username= mb_strtolower($this->input->post('username'));
		$password=md5($this->input->post('password'));
		$userInfo=$this->user_model->check_user($username,$password);

		if($userInfo!== FALSE){
			return true;
		}else{
			$this->form_validation->set_message('check_user', 'Password or Username is incorrect.');
			return false;
		}
	}

	public function user_profile($username){
		$data['userInfo']=$this->user_model->get_userinfo_by_username($username);
		$data['projectsAsWorker'] = $this->user_model->get_worker_projects_from_userid($data['userInfo']['id']);
		$data['projectsAsConsultant'] = $this->user_model->get_consultant_projects_from_userid($data['userInfo']['id']);
		$this->load->view('template/header');
		$this->load->view('user/profile',$data);
		$this->load->view('template/footer');
	}

	public function user_logout(){
		$this->session->sess_destroy();
		redirect('', 'refresh');
	}

	// Database de kayıtlı olan user kullanıcısının bilgilerini view sayfasına gönderiliyor
	// User önceden hangi bilgileri girdigini unutmus ise hatırlatma amaclida kullanilir
	public function user_profile_update(){
		$data = $this->user_model->get_session_user();
		//$userbilgisi = $this->user_model->cmpny_prsnl($data['id']);
		//print_r($userbilgisi);
		//form kontroller

		//print_r($data);
		if($this->input->post('username') != $data['user_name']) {
		   $is_unique =  '|is_unique[t_user.user_name]';
		} else {
		   $is_unique =  '';
		}


		$this->form_validation->set_rules('name','Name','required|trim|xss_clean|max_length[50]');
		$this->form_validation->set_rules('surname','Surname','required|trim|xss_clean|max_length[50]');
		$this->form_validation->set_rules('jobTitle','Job Title','required|trim|xss_clean|max_length[150]');
		$this->form_validation->set_rules('description','Description','trim|xss_clean|max_length[200]');
		$this->form_validation->set_rules('cellPhone', 'Cell Phone Number', 'trim|xss_clean|max_length[50]');
		$this->form_validation->set_rules('workPhone', 'Work Phone Number', 'trim|xss_clean|max_length[50]');
		$this->form_validation->set_rules('fax', 'Fax Number', 'trim|xss_clean|max_length[50]');
		$this->form_validation->set_rules('email', 'e-mail' ,'trim|required|valid_email|mb_strtolower|xss_clean|callback_email_check');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]|xss_clean|mb_strtolower|alpha_numeric'.$is_unique);

		if ($this->form_validation->run() !== FALSE)
		{
			//file properties
			//@unlink('./assets/user_pictures/'.$data['photo']); //  silmeye gerek yok. overwrite true islemi bunu yapıyor zaten
			$config['upload_path'] = './assets/user_pictures/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '5000';
			$config['file_name']	= $data['id'].".jpg";
			$this->load->library('upload', $config);
			$this->upload->overwrite = true;
			//Resmi servera yükleme
			if (!$this->upload->do_upload())
			{
				//print_r($this->upload->display_errors());
				//hata vermeye gerek yok , resim secmeyebilir.
			}
			/*  upload'un ne yazdırğını kontrol için
			else{
				$photo_user = array('upload_data' => $this->upload->data());
			}*/
			//Yüklenen resmi boyutlandırma ve çevirme
			$config['image_library'] = 'gd2';
			$config['source_image']	= './assets/user_pictures/'.$data['photo'];
			$config['maintain_ratio'] = TRUE;
			$config['width']	 = 200;
			$config['height']	 = 200;
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$update = array(
				'name'=>$this->input->post('name'),
				'surname'=>$this->input->post('surname'),
				'title'=>$this->input->post('jobTitle'),
				'description'=>$this->input->post('description'),
				'email'=>$this->input->post('email'),
				'phone_num_1'=>$this->input->post('cellPhone'),
				'phone_num_2'=>$this->input->post('workPhone'),
				'fax_num'=>$this->input->post('fax'),
				'user_name'=>$this->input->post('username'),
				'psswrd'=>$data['psswrd'],
				'photo' =>$data['id'].".jpg"
			);

			$this->user_model->update_user($update);

			//session ayaları ve atama
			//username ve email degistigi icin session tekrar olusturuluyor.
			$session_array= array(
				'id' => $data['id'],
				'username' => $update['user_name'],
				'email' => $update['email']
				);
			$this->session->set_userdata('user_in',$session_array);

			$user_id = $this->session->userdata('user_in')['id'];
			//echo $userbilgisi['cmpny_id'];
			//echo $this->input->post('company');
			/*if($userbilgisi['cmpny_id']!==$this->input->post('company')){
				$cmpny_prsnl = array(
						'user_id' => $user_id,
						'cmpny_id' => $this->input->post('company'),
						'is_contact' => '0'
					);
				$this->company_model->update_cmpny_prsnl($user_id,$userbilgisi['cmpny_id'],$cmpny_prsnl);
			}*/

			redirect('user/'.$update['user_name'], 'refresh');
		}

		//$data['companies'] = $this->company_model->get_companies();

		$this->load->view('template/header');
		$this->load->view('user/profile_update',$data);
		$this->load->view('template/footer');
	}

	function email_check(){
		$emailForm = $this->input->post('email'); // formdan gelen yeni girilen email

		$tmp = $this->session->userdata('user_in');
		$emailSession = $tmp['email']; // session'da tutulan önceki email, şuan database'de de bu var.
		$check_user_email = $this->user_model->check_user_email($emailForm);  // email varsa true , yoksa false
		if(($emailForm == $emailSession) || !$check_user_email ){
			return true;
		}
		else{
			$this->form_validation->set_message('email_check', 'Please provide an acceptable email address.');
			return false;
		}

	}


	function username_check(){
		$usernameForm = $this->input->post('username'); // formdan gelen yeni girilen username

		$tmp = $this->session->userdata('user_in');
		$usernameSession = $tmp['username']; // session'da tutulan önceki username, şuan database'de de bu var.
		$check_username = $this->user_model->check_username($usernameForm);  // username varsa true , yoksa false
		if(($usernameForm == $usernameSession) || !$check_username ){
			return true;
		}
		else{
			$this->form_validation->set_message('username_check', 'Please provide an acceptable username.');
			return false;
		}
	}


	public function become_consultant(){
		$tmp = $this->session->userdata('user_in');
		if(empty($tmp) || $this->user_model->is_user_consultant($tmp['id'])){
			redirect('', 'refresh');
		}
		else{
			$this->user_model->make_user_consultant($tmp['id'],$tmp['username']);
			redirect('user/'.$tmp['username'], 'refresh');
		}
	}

	public function show_all_users(){
		$data['users']=$this->user_model->get_consultants();

		$this->load->view('template/header');
		$this->load->view('user/show_all_users',$data);
		$this->load->view('template/footer');
	}

}
//test
?>