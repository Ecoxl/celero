<?php
class Project extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('project_model');
		$this->load->model('company_model');
		$this->load->model('user_model');		
				$this->config->set_item('language', $this->session->userdata('site_lang'));

	}

	public function open_project(){
		$kullanici = $this->session->userdata('user_in');
		$is_consultant = $this->user_model->is_user_consultant($kullanici['id']);
		if(!$is_consultant){
			$this->session->set_flashdata('project_error', '<i class="fa fa-exclamation-circle"></i> Sorry, you dont have permission to open this project.');
			redirect('project', 'refresh');
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('projectid', 'Project ID', 'trim|required|xss_clean');
		if ($this->form_validation->run() !== FALSE)
		{
			$this->session->unset_userdata('project_id');
			$id = $this->input->post('projectid');
			$this->session->set_userdata('project_id', $id);
			$prj = $this->project_model->get_project($id);
			$this->session->set_userdata('project_name', $prj['name']);
			redirect('project/'.$id, 'refresh');
		}
		$data['projects'] = $this->project_model->get_consultant_projects($kullanici['id']);
		$this->load->view('template/header');
		$this->load->view('project/open_project',$data);
		$this->load->view('template/footer');
	}

	public function close_project(){
		$this->session->unset_userdata('project_id');
		redirect('myprojects', 'refresh');
	}

	public function new_project(){
		$kullanici = $this->session->userdata('user_in');
		$is_consultant = $this->user_model->is_user_consultant($kullanici['id']);
		if(!$is_consultant){
			$this->session->set_flashdata('project_error', '<i class="fa fa-exclamation-circle"></i> Sorry, you need to be a consultant to create a new project.');
			redirect('projects', 'refresh');
		}

    $this->load->library('googlemaps');
		//alert("1:" + event.latLng.lat() + " 2:" + event.latLng.lng());
		$config['center'] = '47.3250690187567,18.52065861225128';
		$config['zoom'] = '15';
		$config['map_type'] = "HYBRID";
		$config['onclick'] = '$("#latId").val("Lat:" + event.latLng.lat()); $("#longId").val("Long:" + event.latLng.lng()); $("#lat").val(event.latLng.lat()); $("#long").val(event.latLng.lng());';
		$config['places'] = TRUE;
		$config['placesRadius'] = 20;
		$this->googlemaps->initialize($config);

		$data['map'] = $this->googlemaps->create_map();

		$data['companies']=$this->company_model->get_my_companies($kullanici['id']);
		$data['consultants']=$this->user_model->get_consultants();
		$data['project_status']=$this->project_model->get_active_project_status();

		$this->load->library('form_validation');

 		$this->form_validation->set_rules('lat', 'Coordinates Latitude', 'trim|xss_clean|required');
		$this->form_validation->set_rules('long', 'Coordinates Longitude', 'trim|xss_clean|required');
		$this->form_validation->set_rules('projectName', 'Project Name', 'trim|required|xss_clean|max_length[200]|mb_strtolower|is_unique[t_prj.name]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|max_length[200]|xss_clean');
		$this->form_validation->set_rules('assignCompany','Assign Company','required');
		$this->form_validation->set_rules('assignConsultant','Assign Consultant','required');
		$this->form_validation->set_rules('assignContactPerson','Assign Contact Person','required');
		$this->form_validation->set_rules('zoomlevel','Zoom Level','trim|xss_clean|max_length[2]|numeric');

		//$this->form_validation->set_rules('surname', 'Password', 'required');
		//$this->form_validation->set_rules('email', 'Email' ,'trim|required|valid_email');

		if ($this->form_validation->run() !== FALSE)
		{
			$project = array(
			'name'=>$this->input->post('projectName'),
			'description'=>$this->input->post('description'),
			'start_date'=>date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('datepicker')))), // mysql icin format�n� ayarlad�k
			'status_id'=>$this->input->post('status'),
			'active'=>1, //default active:1 olarak kaydediyoruz.
			'latitude'=>$this->input->post('lat'),
			'longitude'=>$this->input->post('long'),
			);
			if(!empty($this->input->post('zoomlevel'))){
				$project['zoomlevel'] = $this->input->post('zoomlevel');
			}
			$last_inserted_project_id = $this->project_model->create_project($project);


			$companies = array ($_POST['assignCompany']); // multiple select , secilen company'ler

			foreach ($companies[0] as $company) {
				$prj_cmpny=array(
					'prj_id' => $last_inserted_project_id,
					'cmpny_id' => $company
					);
				$this->project_model->insert_project_company($prj_cmpny);
			}

			$consultants = $_POST['assignConsultant']; // multiple select , secilen consultant'lar

			foreach ($consultants as $consultant) {
				$prj_cnsltnt=array(
					'prj_id' => $last_inserted_project_id,
					'cnsltnt_id' => $consultant,
					'active' => 1
					);
				$this->project_model->insert_project_consultant($prj_cnsltnt);
			}

			$contactuser= $this->input->post('assignContactPerson');
			$prj_cntct_prsnl=array(
				'prj_id' => $last_inserted_project_id,
				'usr_id' => $contactuser
			);

			$this->project_model->insert_project_contact_person($prj_cntct_prsnl);

			$this->session->unset_userdata('project_id');
			$id = $this->input->post('projectid');
			$this->session->set_userdata('project_id', $last_inserted_project_id);
			$prj = $this->project_model->get_project($last_inserted_project_id);
			$this->session->set_userdata('project_name', $prj['name']);
			redirect('project/'.$last_inserted_project_id, 'refresh');
		}

		$this->load->view('template/header');
		$this->load->view('project/create_project',$data);
		$this->load->view('template/footer');
	}

	public function contact_person(){
		$cmpny_id=$this->input->post('company_id'); // 1,2,3 �eklinde company id ler al�nd�
		$user = array();
		if($cmpny_id != 'null'){
			$cmpny_id_arr = explode(",", $cmpny_id); // explode ile parse edildi. array icinde company id'ler tutuluyor.

			foreach ($cmpny_id_arr as $cmpny_id) {
				$user[] = $this->user_model->get_company_users($cmpny_id);
			}
			//foreach dongusu icinde tek tek company id'ler gonderilip ilgili user'lar bulunacak.
			//suanda sadece ilk company id ' yi al�p user lar� donuyor.
		}
		echo json_encode($user);
	}

	public function show_all_project(){
		$data['projects'] = $this->project_model->get_projects();

		$kullanici = $this->session->userdata('user_in');
		if($kullanici['id']!=null){
			$data['is_consultant'] = $this->user_model->is_user_consultant($kullanici['id']);
			foreach ($data['projects'] as $key => $d) {
				$data['projects'][$key]['have_permission'] = $this->project_model->can_update_project_information($kullanici['id'],$d['id']);
			}
		}
		else{
			$data['is_consultant'] = false;
			foreach ($data['projects'] as $key => $d) {
				$data['projects'][$key]['have_permission'] = false;
			}
		}

    //var_dump($data['projects']);
		$this->load->view('template/header');
		$this->load->view('project/show_all_project',$data);
		$this->load->view('template/footer');
	}

	public function show_my_project(){
		$kullanici = $this->session->userdata('user_in');
		if($kullanici['id']!=null)
			$data['is_consultant'] = $this->user_model->is_user_consultant($kullanici['id']);
		else
			$data['is_consultant'] = false;

		$data['projects'] = $this->project_model->get_consultant_projects($kullanici['id']);
		$this->load->view('template/header');
		$this->load->view('project/show_my_project',$data);
		$this->load->view('template/footer');
	}

	public function view_project($prj_id){

		$kullanici = $this->session->userdata('user_in');
		$is_consultant_of_project = $this->user_model->is_consultant_of_project_by_user_id($kullanici['id'],$prj_id);
		$is_contactperson_of_project = $this->user_model->is_contactperson_of_project_by_user_id($kullanici['id'],$prj_id);

		if(!$is_consultant_of_project && !$is_contactperson_of_project){
			//Cillop gibi çalışan bir error kodu.
			//show_error('Sorry, you dont have permission to access this project information.');
			$this->session->set_flashdata('project_error', '<i class="fa fa-exclamation-circle"></i> Sorry, you dont have permission to access this project information.');
			redirect('projects','refresh');
		}

    $data['prj_id'] = $prj_id;
		$data['projects'] = $this->project_model->get_project($prj_id);
		$data['status'] = $this->project_model->get_status($prj_id);
		$data['constant'] = $this->project_model->get_prj_consaltnt($prj_id);
		$data['companies'] = $this->project_model->get_prj_companies($prj_id);
		$data['contact'] = $this->project_model->get_prj_cntct_prsnl($prj_id);

		$this->load->library('googlemaps');
		$marker = array();
		if($data['projects']['latitude']!=null && $data['projects']['longitude']!=null) {
			$config['center'] = $data['projects']['latitude'].','. $data['projects']['longitude'];
			$marker['position'] = $data['projects']['latitude'].','. $data['projects']['longitude'];
		} else if ($data['projects']['latitude']==null || $data['projects']['longitude']==null){
	    $config['center'] = '39.97399584999243,32.746843099594116';
	    $marker['position'] = '39.97399584999243,32.746843099594116';
		}

		if($data['projects']['zoomlevel']!=null && $data['projects']['zoomlevel']!=null) {
		  $config['zoom'] = $data['projects']['zoomlevel'];
		} else if ($data['projects']['latitude']==null || $data['projects']['longitude']==null){
		  $config['zoom'] = '15';
		}

		$config['places'] = TRUE;
		$config['placesRadius'] = 20;

		// $this->googlemaps->add_marker($marker);
		// $this->googlemaps->initialize($config);
  	// $data['map'] = $this->googlemaps->create_map();

		$kullanici = $this->session->userdata('user_in');
		$data['is_consultant_of_project'] = $is_consultant_of_project;
		$data['is_contactperson_of_project'] = $is_contactperson_of_project;

		$this->load->view('template/header');
		$this->load->view('project/project_show_detailed',$data);
		$this->load->view('template/footer');

	}


	public function update_project($prjct_id){
		$kullanici = $this->session->userdata('user_in');
		if(!$this->user_model->is_consultant_of_project_by_user_id($kullanici['id'],$prjct_id) and !$this->user_model->is_contactperson_of_project_by_user_id($kullanici['id'],$prjct_id)){
			redirect('','refresh');
		}
		$data['projects'] = $this->project_model->get_project($prjct_id);
		$data['companies']=$this->company_model->get_companies();
		$data['consultants']=$this->user_model->get_consultants();
		$data['project_status']=$this->project_model->get_active_project_status();
		$data['assignedCompanies'] = $this->project_model->get_prj_companies($prjct_id);
		$data['assignedConsultant'] = $this->project_model->get_prj_consaltnt($prjct_id);
		$data['assignedContactperson'] = $this->project_model->get_prj_cntct_prsnl($prjct_id);

		//print_r($data['projects']);

		$companyIDs=array();
		foreach ($data['assignedCompanies'] as $key) { // bu k�s�mda sadece id lerden olusan array i al�yorum
			$companyIDs[] = $key['id'];
		}
		$data['companyIDs']=$companyIDs;

		$consultantIDs = array();
		foreach ($data['assignedConsultant'] as $key) { // bu k�s�mda sadece id lerden olusan array i al�yorum
			$consultantIDs[] = $key['id'];
		}
		$data['consultantIDs']=$consultantIDs;

		$contactIDs = array();
		foreach ($data['assignedContactperson'] as $key) { // bu k�s�mda sadece id lerden olusan array i al�yorum
			$contactIDs[] = $key['id'];
		}
		$data['contactIDs']=$contactIDs;

		foreach ($companyIDs as $cmpny_id) {
			$contactusers[]= $this->user_model->get_company_users($cmpny_id);
		}

		$data['contactusers']= $contactusers;

		$this->load->library('form_validation');

		if($this->input->post('projectName') != $data['projects']['name']) {
		   $is_unique =  '|is_unique[t_prj.name]';
		} else {
		   $is_unique =  '';
		}

		$this->form_validation->set_rules('projectName', 'Project Name', 'trim|required|max_length[200]|mb_strtolower|xss_clean'.$is_unique); // buraya isunique kontrolü
		$this->form_validation->set_rules('description', 'Description', 'trim|required|max_length[200]|xss_clean');
		$this->form_validation->set_rules('assignCompany','Assign Company','required');
		$this->form_validation->set_rules('assignConsultant','Assign Consultant','required');
		$this->form_validation->set_rules('assignContactPerson','Assign Contact Person','required');

		//$this->form_validation->set_rules('surname', 'Password', 'required');
		//$this->form_validation->set_rules('email', 'Email' ,'trim|required|valid_email');
		if ($this->form_validation->run() !== FALSE)
		{

			date_default_timezone_set('UTC');

			$project = array(
			'name'=>$this->input->post('projectName'),
			'description'=>$this->input->post('description'),
			'start_date'=>date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('datepicker')))), // mysql icin formatını ayarladık
			'status_id'=>$this->input->post('status'),
			'active'=>1 //default active:1 olarak kaydediyoruz.
			);
			$this->project_model->update_project($project,$prjct_id);

			$companies = $_POST['assignCompany']; // multiple select , secilen company'ler

			$this->project_model->remove_company_from_project($prjct_id);	// once hepsini siliyoruz projeye ba�l� companylerin

			foreach ($companies as $company) {
				$prj_cmpny=array(
					'prj_id' => $prjct_id,
					'cmpny_id' => $company
					);
				$this->project_model->insert_project_company($prj_cmpny);
			}

			$consultants = $_POST['assignConsultant']; // multiple select , secilen consultant'lar

			$this->project_model->remove_consultant_from_project($prjct_id);

			foreach ($consultants as $consultant) {
				$prj_cnsltnt=array(
					'prj_id' => $prjct_id,
					'cnsltnt_id' => $consultant,
					'active' => 1
					);
				$this->project_model->insert_project_consultant($prj_cnsltnt);
			}

			$this->project_model->remove_contactuser_from_project($prjct_id);

			$contactuser= $this->input->post('assignContactPerson');
			$prj_cntct_prsnl=array(
				'prj_id' => $prjct_id,
				'usr_id' => $contactuser
			);

			$this->project_model->insert_project_contact_person($prj_cntct_prsnl);
			redirect('project/'.$prjct_id, 'refresh');
		}
		$this->load->view('template/header');
		$this->load->view('project/update_project',$data);
		$this->load->view('template/footer');
	}

	function name_control(){
		$project_id = $this->uri->segment(2);
		$project_name = $this->input->post('projectName');
		if($this->project_model->have_project_name($project_id,$project_name))
			return true;
		else{
			$this->form_validation->set_message('name_control','Project name is required');
			return false;
		}
	}

}
?>
