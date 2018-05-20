<?php
class Cost_benefit extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('cost_benefit_model');
		$this->load->model('cpscoping_model');
		$this->load->model('user_model');
		$this->load->model('company_model');
		$this->load->model('project_model');
		$c_user = $this->user_model->get_session_user();
		if($this->cpscoping_model->can_consultant_prjct($c_user['id']) == false){
			redirect('','refresh');
		}
				$this->config->set_item('language', $this->session->userdata('site_lang'));

	}

	public function new_cost_benefit($prjct_id,$cmpny_id){
		// $data = array();
		// $allocation_ids = $this->cost_benefit_model->get_is_candidates();
		// print_r($allocation_ids);
		// foreach ($allocation_ids as $allo_id) {
		// 	if($this->cost_benefit_model->get_allocation_ids($allo_id['allocation_id'],$prjct_id,$cmpny_id) == true){
		// 		$data['cost_benefit'][] = $this->cpscoping_model->get_allocation_from_allocation_id($allo_id['allocation_id']);
		// 	}
		// }
        //print_r('test');
		$data['company']=$this->company_model->get_company($cmpny_id);
		$data['allocation']=$this->cpscoping_model->get_cost_benefit_info($cmpny_id,$prjct_id);
		$data['is']=$this->cpscoping_model->get_cost_benefit_info_is($cmpny_id,$prjct_id);
		//print_r($data['allocation']);
		$this->load->view('template/header');
		$this->load->view('cost_benefit/index',$data);
		$this->load->view('template/footer');
	}

	public function index(){
		$data['com_pro'] = $this->project_model->get_prj_companies($this->session->userdata('project_id'));

		$this->load->view('template/header');
		$this->load->view('cost_benefit/list',$data);
		$this->load->view('template/footer');
	}

	//cost-benefit analysis form saving
	public function save($prjct_id,$cmpny_id,$id,$cp_or_is){

		
			$capexold = $this->input->post('capexold');
			$flow_name_1 = $this->input->post('flow-name-1');
			$flow_value_1 = $this->input->post('flow-value-1');
			$flow_unit_1 = $this->input->post('flow-unit-1');
			$flow_specost_1 = $this->input->post('flow-specost-1');
			$flow_opex_1 = $this->input->post('flow-opex-1');
			$flow_eipunit_1 = $this->input->post('flow-eipunit-1');
			$floweip_1 = $this->input->post('flow-eip-1');
			$annual_cost_1 = $this->input->post('annual-cost-1');
			$ltold = $this->input->post('ltold');
			$investment = $this->input->post('investment');
			$disrate = $this->input->post('disrate');
			$capex_1 = $this->input->post('capex-1');
			$flow_name_2 = $this->input->post('flow-name-2');
			$flow_value_2 = $this->input->post('flow-value-2');
			$flow_unit_2 = $this->input->post('flow-unit-2');
			$flow_specost_2 = $this->input->post('flow-specost-2');
			$flow_opex_2 = $this->input->post('flow-opex-2');
			$flow_eipunit_2 = $this->input->post('flow-eipunit-2');
			$flow_eip_2 = $this->input->post('flow-eip-2');
			$annual_cost_2 = $this->input->post('annual-cost-2');
			$flow_name_3 = $this->input->post('flow-name-3');
			$flow_value_3 = $this->input->post('flow-value-3');
			$flow_unit_3 = $this->input->post('flow-unit-3');
			$flow_opex_3 = $this->input->post('flow-opex-3');
			$ecoben_1 = $this->input->post('ecoben-1');
			$ecoben_eip_1 = $this->input->post('ecoben-eip-1');
			$marcos_1 = $this->input->post('marcos-1');
			$payback_1 = $this->input->post('payback-1');
			$flow_name_1_2 = $this->input->post('flow-name-1-2');
			$flow_value_1_2 = $this->input->post('flow-value-1-2');
			$flow_unit_1_2 = $this->input->post('flow-unit-1-2');
			$flow_specost_1_2 = $this->input->post('flow-specost-1-2');
			$flow_opex_1_2 = $this->input->post('flow-opex-1-2');
			$flow_eipunit_1_2 = $this->input->post('flow-eipunit-1-2');
			$flow_eip_1_2 = $this->input->post('flow-eip-1-2');
			$flow_name_2_2 = $this->input->post('flow-name-2-2');
			$flow_value_2_2 = $this->input->post('flow-value-2-2');
			$flow_unit_2_2 = $this->input->post('flow-unit-2-2');
			$flow_specost_2_2 = $this->input->post('flow-specost-2-2');
			$flow_opex_2_2 = $this->input->post('flow-opex-2-2');
			$flow_eipunit_2_2 = $this->input->post('flow-eipunit-2-2');
			$flow_eip_2_2 = $this->input->post('flow-eip-2-2');
			$flow_name_3_2 = $this->input->post('flow-name-3-2');
			$flow_value_3_2 = $this->input->post('flow-value-3-2');
			$flow_unit_3_2 = $this->input->post('flow-unit-3-2');
			$flow_opex_3_2 = $this->input->post('flow-opex-3-2');
			$ecoben_eip_1_2 = $this->input->post('ecoben-eip-1-2');
			$flow_name_1_3 = $this->input->post('flow-name-1-3');
			$flow_value_1_3 = $this->input->post('flow-value-1-3');
			$flow_unit_1_3 = $this->input->post('flow-unit-1-3');
			$flow_specost_1_3 = $this->input->post('flow-specost-1-3');
			$flow_opex_1_3 = $this->input->post('flow-opex-1-3');
			$flow_eipunit_1_3 = $this->input->post('flow-eipunit-1-3');
			$flow_eip_1_3 = $this->input->post('flow-eip-1-3');
			$flow_name_2_3 = $this->input->post('flow-name-2-3');
			$flow_value_2_3 = $this->input->post('flow-value-2-3');
			$flow_unit_2_3 = $this->input->post('flow-unit-2-3');
			$flow_specost_2_3 = $this->input->post('flow-specost-2-3');
			$flow_opex_2_3 = $this->input->post('flow-opex-2-3');
			$flow_eipunit_2_3 = $this->input->post('flow-eipunit-2-3');
			$flow_eip_2_3 = $this->input->post('flow-eip-2-3');
			$flow_name_3_3 = $this->input->post('flow-name-3-3');
			$flow_value_3_3 = $this->input->post('flow-value-3-3');
			$flow_unit_3_3 = $this->input->post('flow-unit-3-3');
			$flow_opex_3_3 = $this->input->post('flow-opex-3-3');
			$ecoben_eip_1_3 = $this->input->post('ecoben-eip-1-3');
			$flow_name_1_4 = $this->input->post('flow-name-1-4');
			$flow_value_1_4 = $this->input->post('flow-value-1-4');
			$flow_unit_1_4 = $this->input->post('flow-unit-1-4');
			$flow_specost_1_4 = $this->input->post('flow-specost-1-4');
			$flow_opex_1_4 = $this->input->post('flow-opex-1-4');
			$flow_eipunit_1_4 = $this->input->post('flow-eipunit-1-4');
			$flow_eip_1_4 = $this->input->post('flow-eip-1-4');
			$flow_name_2_4 = $this->input->post('flow-name-2-4');
			$flow_value_2_4 = $this->input->post('flow-value-2-4');
			$flow_unit_2_4 = $this->input->post('flow-unit-2-4');
			$flow_specost_2_4 = $this->input->post('flow-specost-2-4');
			$flow_opex_2_4 = $this->input->post('flow-opex-2-4');
			$flow_eipunit_2_4 = $this->input->post('flow-eipunit-2-4');
			$flow_eip_2_4 = $this->input->post('flow-eip-2-4');
			$flow_name_3_4 = $this->input->post('flow-name-3-4');
			$flow_value_3_4 = $this->input->post('flow-value-3-4');
			$flow_unit_3_4 = $this->input->post('flow-unit-3-4');
			$flow_opex_3_4 = $this->input->post('flow-opex-3-4');
			$ecoben_eip_1_4 = $this->input->post('ecoben-eip-1-4');
			$flow_name_1_5 = $this->input->post('flow-name-1-5');
			$flow_value_1_5 = $this->input->post('flow-value-1-5');
			$flow_unit_1_5 = $this->input->post('flow-unit-1-5');
			$flow_specost_1_5 = $this->input->post('flow-specost-1-5');
			$flow_opex_1_5 = $this->input->post('flow-opex-1-5');
			$flow_eipunit_1_5 = $this->input->post('flow-eipunit-1-5');
			$flow_eip_1_5 = $this->input->post('flow-eip-1-5');
			$flow_name_2_5 = $this->input->post('flow-name-2-5');
			$flow_value_2_5 = $this->input->post('flow-value-2-5');
			$flow_unit_2_5 = $this->input->post('flow-unit-2-5');
			$flow_specost_2_5 = $this->input->post('flow-specost-2-5');
			$flow_opex_2_5 = $this->input->post('flow-opex-2-5');
			$flow_eipunit_2_5 = $this->input->post('flow-eipunit-2-5');
			$flow_eip_2_5 = $this->input->post('flow-eip-2-5');
			$flow_name_3_5 = $this->input->post('flow-name-3-5');
			$flow_value_3_5 = $this->input->post('flow-value-3-5');
			$flow_unit_3_5 = $this->input->post('flow-unit-3-5');
			$flow_opex_3_5 = $this->input->post('flow-opex-3-5');
			$ecoben_eip_1_5 = $this->input->post('ecoben-eip-1-5');
			$flow_name_1_6 = $this->input->post('flow-name-1-6');
			$flow_value_1_6 = $this->input->post('flow-value-1-6');
			$flow_unit_1_6 = $this->input->post('flow-unit-1-6');
			$flow_specost_1_6 = $this->input->post('flow-specost-1-6');
			$flow_opex_1_6 = $this->input->post('flow-opex-1-6');
			$flow_eipunit_1_6 = $this->input->post('flow-eipunit-1-6');
			$flow_eip_1_6 = $this->input->post('flow-eip-1-6');
			$flow_name_2_6 = $this->input->post('flow-name-2-6');
			$flow_value_2_6 = $this->input->post('flow-value-2-6');
			$flow_unit_2_6 = $this->input->post('flow-unit-2-6');
			$flow_specost_2_6 = $this->input->post('flow-specost-2-6');
			$flow_opex_2_6 = $this->input->post('flow-opex-2-6');
			$flow_eipunit_2_6 = $this->input->post('flow-eipunit-2-6');
			$flow_eip_2_6 = $this->input->post('flow-eip-2-6');
			$flow_name_3_6 = $this->input->post('flow-name-3-6');
			$flow_value_3_6 = $this->input->post('flow-value-3-6');
			$flow_unit_3_6 = $this->input->post('flow-unit-3-6');
			$flow_opex_3_6 = $this->input->post('flow-opex-3-6');
			$ecoben_eip_1_6 = $this->input->post('ecoben-eip-1-6');
			$maintan_1 = $this->input->post('maintan-1');
			$sum_1 = $this->input->post('sum-1');
			$sum_2 = $this->input->post('sum-2');
			$maintan_1_2 = $this->input->post('maintan-1-2');
			$sum_1_1 = $this->input->post('sum-1-1');
			$sum_2_1 = $this->input->post('sum-2-1');
			$sum_3_1 = $this->input->post('sum-3-1');
			$sum_3_2 = $this->input->post('sum-3-2');

			$this->cost_benefit_model->set_cba($id,$capexold,
$flow_name_1,
$flow_value_1,
$flow_unit_1,
$flow_specost_1,
$flow_opex_1,
$flow_eipunit_1,
$floweip_1,
$annual_cost_1,
$ltold,
$investment,
$disrate,
$capex_1,
$flow_name_2,
$flow_value_2,
$flow_unit_2,
$flow_specost_2,
$flow_opex_2,
$flow_eipunit_2,
$flow_eip_2,
$annual_cost_2,
$flow_name_3,
$flow_value_3,
$flow_unit_3,
$flow_opex_3,
$ecoben_1,
$ecoben_eip_1,
$marcos_1,
$payback_1,
$flow_name_1_2,
$flow_value_1_2,
$flow_unit_1_2,
$flow_specost_1_2,
$flow_opex_1_2,
$flow_eipunit_1_2,
$flow_eip_1_2,
$flow_name_2_2,
$flow_value_2_2,
$flow_unit_2_2,
$flow_specost_2_2,
$flow_opex_2_2,
$flow_eipunit_2_2,
$flow_eip_2_2,
$flow_name_3_2,
$flow_value_3_2,
$flow_unit_3_2,
$flow_opex_3_2,
$ecoben_eip_1_2,
$flow_name_1_3,
$flow_value_1_3,
$flow_unit_1_3,
$flow_specost_1_3,
$flow_opex_1_3,
$flow_eipunit_1_3,
$flow_eip_1_3,
$flow_name_2_3,
$flow_value_2_3,
$flow_unit_2_3,
$flow_specost_2_3,
$flow_opex_2_3,
$flow_eipunit_2_3,
$flow_eip_2_3,
$flow_name_3_3,
$flow_value_3_3,
$flow_unit_3_3,
$flow_opex_3_3,
$ecoben_eip_1_3,
$flow_name_1_4,
$flow_value_1_4,
$flow_unit_1_4,
$flow_specost_1_4,
$flow_opex_1_4,
$flow_eipunit_1_4,
$flow_eip_1_4,
$flow_name_2_4,
$flow_value_2_4,
$flow_unit_2_4,
$flow_specost_2_4,
$flow_opex_2_4,
$flow_eipunit_2_4,
$flow_eip_2_4,
$flow_name_3_4,
$flow_value_3_4,
$flow_unit_3_4,
$flow_opex_3_4,
$ecoben_eip_1_4,
$flow_name_1_5,
$flow_value_1_5,
$flow_unit_1_5,
$flow_specost_1_5,
$flow_opex_1_5,
$flow_eipunit_1_5,
$flow_eip_1_5,
$flow_name_2_5,
$flow_value_2_5,
$flow_unit_2_5,
$flow_specost_2_5,
$flow_opex_2_5,
$flow_eipunit_2_5,
$flow_eip_2_5,
$flow_name_3_5,
$flow_value_3_5,
$flow_unit_3_5,
$flow_opex_3_5,
$ecoben_eip_1_5,
$flow_name_1_6,
$flow_value_1_6,
$flow_unit_1_6,
$flow_specost_1_6,
$flow_opex_1_6,
$flow_eipunit_1_6,
$flow_eip_1_6,
$flow_name_2_6,
$flow_value_2_6,
$flow_unit_2_6,
$flow_specost_2_6,
$flow_opex_2_6,
$flow_eipunit_2_6,
$flow_eip_2_6,
$flow_name_3_6,
$flow_value_3_6,
$flow_unit_3_6,
$flow_opex_3_6,
$ecoben_eip_1_6,
$maintan_1,
$sum_1,
$sum_2,
$maintan_1_2,
$sum_1_1,
$sum_2_1,
$sum_3_1,
$sum_3_2);
		redirect('cost_benefit/'.$prjct_id.'/'.$cmpny_id);
	}

}
?>
