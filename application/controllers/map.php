<?php
class Map extends CI_Controller {

	function __construct(){
		parent::__construct();
                $this->load->model('project_model');
	}

	public function index(){  
            //print_r($this->session->userdata['site_lang']);
            //print_r($this->session->userdata['user_in']);
            if(isset($this->session->userdata['user_in'])) {
               if(empty($this->session->userdata['user_in'])){
			redirect(base_url('login'),'refresh');
		} 
            } else {
                redirect(base_url('login'),'refresh');
            }
            
            if(isset($this->session->userdata['project_id'])) {
                if($this->session->userdata['project_id']==null || $this->session->userdata['project_id']==''){
                    redirect(base_url('projects'), 'refresh');
                }
            } else {
                redirect(base_url('projects'), 'refresh');
            }
            
            if(isset($this->session->userdata['site_lang'])) {
               if(empty($this->session->userdata['site_lang'])==null){
			$data['site_lang'] = 'english';
		} else {
                    if($this->session->userdata['site_lang']=='english')  $data['site_lang'] = 'english';
                    if($this->session->userdata['site_lang']=='turkish')  $data['site_lang'] = 'turkish';
                } 
            } else {
                $data['site_lang'] = 'english';
            }  
             $data['project_id'] = $this->session->userdata['project_id'];
             $data['projects'] = $this->project_model->get_project($this->session->userdata['project_id']);
             $data['language'] = $this->session->userdata('site_lang');
             //print_r($data['projects']);
            /*if(isset($this->session->userdata['project_id'])) {
                if($this->session->userdata['project_id']==null || $this->session->userdata['project_id']==''){
                    redirect(base_url('projects'), 'refresh');
                }
            } else {
                redirect(base_url('projects'), 'refresh');
            }*/
            
            /*if(isset($this->session->userdata['user_in']['role_id'])) {
                if(($this->session->userdata['user_in']['role_id']==null || $this->session->userdata['user_in']['role_id']=='')
                         || $this->session->userdata['user_in']['role_id']!=1){
                       redirect(base_url('company'), 'refresh');
		}
            } else {
                //redirect(base_url('company'), 'refresh');
            }*/

            $this->load->view('template/header_map');
            $this->load->view('map/index',$data);
            $this->load->view('template/footer_map');
	}
        
        public function mapHeader(){   
            //print_r($this->session->userdata['user_in']);
            if(isset($this->session->userdata['user_in'])) {
               if(empty($this->session->userdata['user_in'])){
			redirect(base_url('login'),'refresh');
				} 
            } else {
                redirect(base_url('login'),'refresh');
            }
                
            /*if(isset($this->session->userdata['project_id'])) {
                if($this->session->userdata['project_id']==null || $this->session->userdata['project_id']==''){
                    redirect(base_url('projects'), 'refresh');
                }
            } else {
                redirect(base_url('projects'), 'refresh');
            }*/
            
            /*if(isset($this->session->userdata['user_in']['role_id'])) {
                if(($this->session->userdata['user_in']['role_id']==null || $this->session->userdata['user_in']['role_id']=='')
                         || $this->session->userdata['user_in']['role_id']!=1){
                       redirect(base_url('company'), 'refresh');
				}
            } else {
                //redirect(base_url('company'), 'refresh');
            }*/

            $this->load->view('map/mapHeader');
           
	}

	
        
      
}