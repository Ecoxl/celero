<?php
class Dataset extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('user_model');
		$this->load->model('company_model');
		$this->load->model('flow_model');
		$this->load->model('process_model');
		$this->load->model('equipment_model');
		$this->load->model('component_model');
		$this->load->library('form_validation');

		$this->config->set_item('language', $this->session->userdata('site_lang'));

		$kullanici = $this->session->userdata('user_in');
		if($this->user_model->can_edit_company($kullanici['id'],$this->uri->segment(2)) == FALSE && $this->uri->segment(1) != "get_equipment_type" && $this->uri->segment(1) != "get_equipment_attribute"&& $this->uri->segment(1) != "get_sub_process"){
			redirect(base_url(''), 'refresh');
		}
	}

	function sifirla($data){
		if(empty($data)) return 0;
		else return $data;
	}

	public function new_product($companyID)
	{
		$this->form_validation->set_rules('product', 'Product Field', 'trim|required|xss_clean');
		$this->form_validation->set_rules('quantities', 'Product Quantity', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('ucost', 'Unit Cost', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('ucostu', 'Unit Cost Unit', 'trim|xss_clean');
		$this->form_validation->set_rules('qunit', 'Quantity Unit', 'trim|xss_clean');
		$this->form_validation->set_rules('tper', 'Time Period', 'trim|xss_clean');

		if($this->form_validation->run() !== FALSE) {
			$productArray = array(
					'cmpny_id' => $companyID,
					'name' => $this->input->post('product'),
					'quantities' => $this->sifirla($this->input->post('quantities')),
					'ucost' => $this->sifirla($this->input->post('ucost')),
					'ucostu' => $this->input->post('ucostu'),
					'qunit' => $this->input->post('qunit'),
					'tper' => $this->input->post('tper'),
				);
			$this->product_model->set_product($productArray);
		}

		$data['product'] = $this->product_model->get_product_list($companyID);
		$data['companyID'] = $companyID;
		$data['company_info'] = $this->company_model->get_company($companyID);
		$data['units'] = $this->flow_model->get_unit_list();

		$this->load->view('template/header');
		$this->load->view('dataset/dataSetLeftSide',$data);
		$this->load->view('dataset/new_product',$data);
		$this->load->view('template/footer');
	}

	public function edit_product($companyID,$product_id)
	{
		$this->form_validation->set_rules('product', 'Product Field', 'trim|required|xss_clean');
		$this->form_validation->set_rules('quantities', 'Product Quantity', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('ucost', 'Unit Cost', 'trim|numeric|xss_clean');
		$this->form_validation->set_rules('ucostu', 'Unit Cost Unit', 'trim|xss_clean');
		$this->form_validation->set_rules('qunit', 'Quantity Unit', 'trim|xss_clean');
		$this->form_validation->set_rules('tper', 'Time Period', 'trim|xss_clean');

		if($this->form_validation->run() !== FALSE) {
			$productArray = array(
					'cmpny_id' => $companyID,
					'name' => $this->input->post('product'),
					'quantities' => $this->sifirla($this->input->post('quantities')),
					'ucost' => $this->sifirla($this->input->post('ucost')),
					'ucostu' => $this->input->post('ucostu'),
					'qunit' => $this->input->post('qunit'),
					'tper' => $this->input->post('tper'),
				);
			$this->product_model->update_product($companyID,$product_id,$productArray);
			redirect(base_url('new_product/'.$companyID), 'refresh'); // tablo olusurken ajax kullanýlabilir.

		}

		$data['product'] = $this->product_model->get_product_by_cid_pid($companyID,$product_id);
		$data['companyID'] = $companyID;
		$data['company_info'] = $this->company_model->get_company($companyID);
		$data['units'] = $this->flow_model->get_unit_list();

		$this->load->view('template/header');
		$this->load->view('dataset/edit_product',$data);
		$this->load->view('template/footer');
	}

	public function new_flow($companyID)
	{
	
		$this->form_validation->set_rules('flowname', 'Flow Name', 'trim|required|xss_clean|strip_tags|callback__alpha_dash_space');
		$this->form_validation->set_rules('flowtype', 'Flow Type', 'trim|required|xss_clean|strip_tags|callback_flow_varmi');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|xss_clean|strip_tags|numeric|max_length[14]');
		$this->form_validation->set_rules('quantityUnit', 'Quantity Unit', 'trim|required|xss_clean|strip_tags');
		$this->form_validation->set_rules('cost', 'Cost', 'trim|required|xss_clean|strip_tags|numeric|max_length[14]');
		$this->form_validation->set_rules('costUnit', 'Cost Unit', 'trim|required|xss_clean|strip_tags');
		$this->form_validation->set_rules('ep', 'EP', 'trim|xss_clean|strip_tags|numeric|max_length[25]');
		$this->form_validation->set_rules('epUnit', 'EP Unit', 'trim|xss_clean|strip_tags');

		$this->form_validation->set_rules('charactertype', 'Flow Character Type', 'trim|xss_clean|strip_tags|max_length[50]');
		$this->form_validation->set_rules('availability', 'Availability', 'trim|xss_clean');
		$this->form_validation->set_rules('cf', 'Chemical Formula', 'trim|xss_clean|max_length[30]');
		$this->form_validation->set_rules('conc', 'Concentration', 'trim|xss_clean|strip_tags|numeric');
		$this->form_validation->set_rules('concunit', 'Concentration Unti', 'trim|xss_clean');
		$this->form_validation->set_rules('pres', 'Pressure', 'trim|xss_clean|strip_tags|numeric|max_length[14]');
		$this->form_validation->set_rules('presunit', 'Pressure Unit', 'trim|xss_clean');
		$this->form_validation->set_rules('ph', 'PH', 'trim|xss_clean|strip_tags|numeric|max_length[14]');
		$this->form_validation->set_rules('state', 'State', 'trim|xss_clean');
		$this->form_validation->set_rules('quality', 'Quality', 'trim|xss_clean|max_length[150]');
		$this->form_validation->set_rules('oloc', 'Output Location', 'trim|xss_clean');
		$this->form_validation->set_rules('spot', 'Substitution Potential', 'trim|xss_clean');
		$this->form_validation->set_rules('desc', 'Description', 'trim|xss_clean|max_length[500]');
		$this->form_validation->set_rules('comment', 'Comment', 'trim|xss_clean');

		if($this->form_validation->run() !== FALSE) {

			$flowID = $this->input->post('flowname');
			$charactertype = $this->input->post('charactertype');
			$flowtypeID = $this->input->post('flowtype');
			$flowfamilyID = $this->input->post('flowfamily');
			$ep = $this->input->post('ep');
			$epUnit = $this->input->post('epUnit');
			$cost = $this->input->post('cost');
			$costUnit = $this->input->post('costUnit');
			$quantity = $this->input->post('quantity');
			$quantityUnit = $this->input->post('quantityUnit');

			$cf = $this->input->post('cf');
			$availability = $this->input->post('availability');
			$conc = $this->input->post('conc');
			$concunit = $this->input->post('concunit');
			$pres = $this->input->post('pres');
			$presunit = $this->input->post('presunit');
			$ph = $this->input->post('ph');
			$state = $this->input->post('state');
			$quality = $this->input->post('quality');
			$oloc = $this->input->post('oloc');
			//$odis = $this->input->post('odis');
			//$otrasmean = $this->input->post('otrasmean');
			//$sdis = $this->input->post('sdis');
			//$strasmean = $this->input->post('strasmean');
			//$rtech = $this->input->post('rtech');
			$desc = $this->input->post('desc');
			$spot = $this->input->post('spot');
			$comment = $this->input->post('comment');
			//echo "d";

			//CHECK IF FLOW IS NEW?
			$flowID = $this->process_model->is_new_flow($flowID,$flowfamilyID);
			//echo $flowID;
//exit;
			$flow = array(
				'cmpny_id'=>$companyID,
				'flow_id'=>$flowID,
				'character_type'=>$charactertype,
				'qntty'=>$this->sifirla($quantity),
				'qntty_unit_id'=>$this->sifirla($quantityUnit),
				'cost' =>$this->sifirla($cost),
				'cost_unit_id' =>$costUnit,
				'ep' => $this->sifirla($ep),
				'ep_unit_id' => $epUnit,
				'flow_type_id'=> $this->sifirla($flowtypeID),
				'chemical_formula' => $cf,
				'availability' => $availability,
				'state_id' => $state,
				'quality' => $quality,
				'output_location' => $oloc,
				'substitute_potential' => $spot,
				'description' => $desc,
				'comment' => $comment
			);
			if(!empty($conc)){
				$flow['concentration'] = $conc;
				$flow['concunit'] = $concunit;
			}
			if(!empty($pres)){
				$flow['pression'] = $pres;
				$flow['presunit'] = $presunit;
			}
			if(!empty($ph)){
				$flow['ph'] = $ph;
			}

			$this->flow_model->register_flow_to_company($flow);
			redirect(current_url());
			//redirect(base_url('new_flow/'.$data['companyID']), 'refresh'); // tablo olusurken ajax kullanýlabilir.
			//þuan sayfa yenileniyor her seferinde database'den satýrlar ekleniyor.

		}

		$data['flownames'] = $this->flow_model->get_flowname_list();
		$data['flowtypes'] = $this->flow_model->get_flowtype_list();
		$data['flowfamilys'] = $this->flow_model->get_flowfamily_list();

		$data['company_flows']=$this->flow_model->get_company_flow_list($companyID);
		$data['companyID'] = $companyID;
		$data['company_info'] = $this->company_model->get_company($companyID);
		$data['units'] = $this->flow_model->get_unit_list();

		$this->load->view('template/header');
		$this->load->view('dataset/dataSetLeftSide',$data);
		$this->load->view('dataset/new_flow',$data);
		$this->load->view('template/footer');

	}

	public function edit_flow($companyID,$flow_id,$flow_type_id)
	{
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|xss_clean|strip_tags|numeric');
		$this->form_validation->set_rules('quantityUnit', 'Quantity Unit', 'trim|required|xss_clean|strip_tags');
		$this->form_validation->set_rules('cost', 'Cost', 'trim|required|xss_clean|strip_tags|numeric');
		$this->form_validation->set_rules('costUnit', 'Cost Unit', 'trim|required|xss_clean|strip_tags');
		$this->form_validation->set_rules('ep', 'EP', 'trim|xss_clean|strip_tags|numeric');
		$this->form_validation->set_rules('epUnit', 'EP Unit', 'trim|xss_clean|strip_tags');

		$this->form_validation->set_rules('charactertype', 'Flow Character Type', 'trim|xss_clean|strip_tags|max_length[50]');
		$this->form_validation->set_rules('availability', 'Availability', 'trim|xss_clean');
		$this->form_validation->set_rules('cf', 'Chemical Formula', 'trim|xss_clean|max_length[100]');
		$this->form_validation->set_rules('conc', 'Concentration', 'trim|xss_clean|strip_tags|numeric');
		$this->form_validation->set_rules('concunit', 'Concentration Unti', 'trim|xss_clean');
		$this->form_validation->set_rules('pres', 'Pressure', 'trim|xss_clean|strip_tags|numeric|max_length[14]');
		$this->form_validation->set_rules('presunit', 'Pressure Unit', 'trim|xss_clean');
		$this->form_validation->set_rules('ph', 'PH', 'trim|xss_clean|strip_tags|numeric|max_length[14]');
		$this->form_validation->set_rules('state', 'State', 'trim|xss_clean');
		$this->form_validation->set_rules('quality', 'Quality', 'trim|xss_clean|max_length[150]');
		$this->form_validation->set_rules('oloc', 'Output Location', 'trim|xss_clean');
		$this->form_validation->set_rules('spot', 'Substitution Potential', 'trim|xss_clean');
		$this->form_validation->set_rules('desc', 'Description', 'trim|xss_clean|max_length[500]');
		$this->form_validation->set_rules('comment', 'Comment', 'trim|xss_clean');

		if($this->form_validation->run() !== FALSE) {

			$charactertype = $this->input->post('charactertype');
			$ep = $this->input->post('ep');
			$epUnit = $this->input->post('epUnit');
			$cost = $this->input->post('cost');
			$costUnit = $this->input->post('costUnit');
			$quantity = $this->input->post('quantity');
			$quantityUnit = $this->input->post('quantityUnit');

			$cf = $this->input->post('cf');
			$availability = $this->input->post('availability');
			$conc = $this->input->post('conc');
			$concunit = $this->input->post('concunit');
			$pres = $this->input->post('pres');
			$presunit = $this->input->post('presunit');
			$ph = $this->input->post('ph');
			$state = $this->input->post('state');
			$quality = $this->input->post('quality');
			$oloc = $this->input->post('oloc');
			//$odis = $this->input->post('odis');
			//$otrasmean = $this->input->post('otrasmean');
			//$sdis = $this->input->post('sdis');
			//$strasmean = $this->input->post('strasmean');
			//$rtech = $this->input->post('rtech');
			$desc = $this->input->post('desc');
			$spot = $this->input->post('spot');
			$comment = $this->input->post('comment');

			$flow = array(
				'character_type'=>$charactertype,
				'qntty'=>$this->sifirla($quantity),
				'qntty_unit_id'=>$this->sifirla($quantityUnit),
				'cost' =>$this->sifirla($cost),
				'cost_unit_id' =>$costUnit,
				'ep' => $this->sifirla($ep),
				'ep_unit_id' => $epUnit,
				'chemical_formula' => $cf,
				'availability' => $availability,
				'state_id' => $state,
				'quality' => $quality,
				'output_location' => $oloc,
				'substitute_potential' => $spot,
				'description' => $desc,
				'comment' => $comment
			);
			if(!empty($conc)){
				$flow['concentration'] = $conc;
				$flow['concunit'] = $concunit;
			}
			if(!empty($pres)){
				$flow['pression'] = $pres;
				$flow['presunit'] = $presunit;
			}
			if(!empty($ph)){
				$flow['ph'] = $ph;
			}

			$this->flow_model->update_flow_info($companyID,$flow_id,$flow_type_id,$flow);

			redirect(base_url('new_flow/'.$companyID), 'refresh'); // tablo olusurken ajax kullanýlabilir.
			//þuan sayfa yenileniyor her seferinde database'den satýrlar ekleniyor.

		}

		$data['flow']=$this->flow_model->get_company_flow($companyID,$flow_id,$flow_type_id);
		if(empty($data['flow'])){
			redirect(base_url(), 'refresh'); // tablo olusurken ajax kullanýlabilir.
		}
		$data['companyID'] = $companyID;
		$data['company_info'] = $this->company_model->get_company($companyID);
		$data['units'] = $this->flow_model->get_unit_list();

		$this->load->view('template/header');
		$this->load->view('dataset/edit_flow',$data);
		$this->load->view('template/footer');

	}

	function flow_varmi()
	{
		$flowID = $this->input->post('flowname');
		$flowtypeID = $this->input->post('flowtype');
		$companyID = $this->uri->segment(2);
		//print_r($companyID);
		if(is_numeric($flowID)){
			if(!$this->flow_model->has_same_flow($flowID,$flowtypeID,$companyID)){
				$this->form_validation->set_message('flow_varmi', 'Flow name already exists, please choose another name or edit existing flow.');
	      return false;
	      //echo "1";
			}
			else{
				//echo "s";
				return true;
			}
		}
		//echo "s";
		//return false;
	}

	function alpha_dash_space($str)
	{
	  return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
	}

	public function new_component($companyID){

		$this->form_validation->set_rules('component_name', 'Component Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('flowtype', 'Flow Type', 'trim|xss_clean');

		if($this->form_validation->run() !== FALSE) {
			$component_array = array(
				'cmpny_id' => $companyID,
				'name' => $this->input->post('component_name'),
				'name_tr' => $this->input->post('component_name'),
				'active' => '1'
			);
			$component_id = $this->component_model->set_cmpnnt($component_array);

			$cmpny_flow_cmpnnt = array(
				'cmpny_flow_id' => $this->input->post('flowtype'),
				'description' => $this->input->post('description'),
				'qntty' => $this->sifirla($this->input->post('quantity')),
				'qntty_unit_id' => $this->sifirla($this->input->post('quantityUnit')),
				'supply_cost' => $this->sifirla($this->input->post('cost')),
				'supply_cost_unit' => $this->input->post('costUnit'),
				'output_cost' => $this->sifirla($this->input->post('ocost')),
				'output_cost_unit' => $this->input->post('ocostunit'),
				'data_quality' => $this->input->post('quality'),
				'substitute_potential' => $this->input->post('spot'),
				'comment' => $this->input->post('comment'),
				'cmpnt_type_id' =>$this->sifirla($this->input->post('component_type')),
				'cmpnnt_id' => $component_id
			);
			$this->component_model->set_cmpny_flow_cmpnnt($cmpny_flow_cmpnnt);
		}

		$data['units'] = $this->flow_model->get_unit_list();
		$data['component_name'] = $this->component_model->get_cmpnnt($companyID);
		$data['ctypes'] = $this->component_model->get_cmpnnt_type();
		$data['companyID'] = $companyID;
		$data['company_info'] = $this->company_model->get_company($companyID);
		$data['flow_and_flow_type'] = $this->component_model->get_cmpny_flow_and_flow_type($companyID);

		$this->load->view('template/header');
		$this->load->view('dataset/dataSetLeftSide',$data);
		$this->load->view('dataset/new_component',$data);
		$this->load->view('template/footer');
	}

	public function edit_component($companyID,$id){

		$this->form_validation->set_rules('component_name', 'Component Name', 'trim|required|xss_clean');

		if($this->form_validation->run() !== FALSE) {
			$component_array = array(
				'name' => $this->input->post('component_name'),
				'name_tr' => $this->input->post('component_name'),
			);
			$component_id = $this->component_model->update_cmpnnt($component_array,$id,$companyID);

			$cmpny_flow_cmpnnt = array(
				'description' => $this->input->post('description'),
				'qntty' => $this->sifirla($this->input->post('quantity')),
				'qntty_unit_id' => $this->sifirla($this->input->post('quantityUnit')),
				'supply_cost' => $this->sifirla($this->input->post('cost')),
				'supply_cost_unit' => $this->input->post('costUnit'),
				'output_cost' => $this->sifirla($this->input->post('ocost')),
				'output_cost_unit' => $this->input->post('ocostunit'),
				'data_quality' => $this->input->post('quality'),
				'substitute_potential' => $this->input->post('spot'),
				'comment' => $this->input->post('comment'),
				'cmpnt_type_id' =>$this->sifirla($this->input->post('component_type')),
			);
			$this->component_model->update_cmpny_flow_cmpnnt($cmpny_flow_cmpnnt,$id);
			redirect('new_component/'.$companyID, 'refresh');
		}

		$data['component'] = $this->component_model->get_cmpnnt_info($companyID,$id);
		$data['units'] = $this->flow_model->get_unit_list();
		$data['ctypes'] = $this->component_model->get_cmpnnt_type();
		$data['companyID'] = $companyID;
		$data['company_info'] = $this->company_model->get_company($companyID);

		$this->load->view('template/header');
		$this->load->view('dataset/edit_component',$data);
		$this->load->view('template/footer');
	}

	public function new_process($companyID){

		$this->form_validation->set_rules('process','Process','required');
		$this->form_validation->set_rules('usedFlows','Used Flows','required');
		// $this->form_validation->set_rules('min_rate_util','Minimum rate of utilization','trim|numeric|xss_clean');
		// $this->form_validation->set_rules('typ_rate_util','Typical rate of utilization','trim|numeric|xss_clean');
		// $this->form_validation->set_rules('max_rate_util','Maximum rate of utilization','trim|numeric|xss_clean');
		$this->form_validation->set_rules('comment','Comment','trim|xss_clean');


		if ($this->form_validation->run() !== FALSE)
		{
			$used_flows = $this->input->post('usedFlows');
			$process_id = $this->input->post('process');
			$processfamilyID = $this->input->post('processfamily');

			//CHECK IF PROCESS IS NEW?
			$process_id = $this->process_model->is_new_process($process_id,$processfamilyID);

			$cmpny_prcss_id = $this->process_model->can_write_cmpny_prcss($companyID,$process_id);

			if($cmpny_prcss_id == false){
				$cmpny_prcss = array(
					'cmpny_id' => $companyID,
					// 'min_rate_util' => $this->sifirla($this->input->post('min_rate_util')),
					// 'min_rate_util_unit' => $this->sifirla($this->input->post('min_rate_util_unit')),
					// 'typ_rate_util' => $this->sifirla($this->input->post('typ_rate_util')),
					// 'typ_rate_util_unit' => $this->sifirla($this->input->post('typ_rate_util_unit')),
					// 'max_rate_util' => $this->sifirla($this->input->post('max_rate_util')),
					// 'max_rate_util_unit' => $this->sifirla($this->input->post('max_rate_util_unit')),
					'comment' => $this->input->post('comment'),
					'prcss_id' => $process_id
				);
				$cmpny_prcss_id['id'] = $this->process_model->cmpny_prcss($cmpny_prcss);
			}

			foreach($used_flows as $flow) {
				if($this->process_model->can_write_cmpny_flow_prcss($flow,$cmpny_prcss_id['id']) == true){
					$cmpny_flow_prcss = array(
						'cmpny_flow_id' => $flow,
						'cmpny_prcss_id' => $cmpny_prcss_id['id']
					);
					$this->process_model->cmpny_flow_prcss($cmpny_flow_prcss);
				}
			}
		}

		$data['process'] = $this->process_model->get_main_process();
		$data['company_flows']=$this->flow_model->get_company_flow_list($companyID);
		$data['cmpny_flow_prcss'] = $this->process_model->get_cmpny_flow_prcss($companyID);
		$data['cmpny_flow_prcss_count'] = array_count_values(array_column($data['cmpny_flow_prcss'], 'prcessname'));


		$data['companyID'] = $companyID;
		$data['company_info'] = $this->company_model->get_company($companyID);
		$data['processfamilys'] = $this->process_model->get_processfamily_list();
		$data['units'] = $this->flow_model->get_unit_list();

		$this->load->view('template/header');
		$this->load->view('dataset/dataSetLeftSide',$data);
		$this->load->view('dataset/new_process',$data);
		$this->load->view('template/footer');
	}

	public function edit_process($companyID,$process_id){

		// $this->form_validation->set_rules('min_rate_util','Minimum rate of utilization','trim|numeric|xss_clean');
		// $this->form_validation->set_rules('typ_rate_util','Typical rate of utilization','trim|numeric|xss_clean');
		// $this->form_validation->set_rules('max_rate_util','Maximum rate of utilization','trim|numeric|xss_clean');
		$this->form_validation->set_rules('comment','Comment','trim|xss_clean');

		if ($this->form_validation->run() !== FALSE)
		{
			//cant change flow and process since they affect other tables on database and also need lots of control for now.
			$cmpny_prcss = array(
				// 'min_rate_util' => $this->sifirla($this->input->post('min_rate_util')),
				// 'min_rate_util_unit' => $this->sifirla($this->input->post('min_rate_util_unit')),
				// 'typ_rate_util' => $this->sifirla($this->input->post('typ_rate_util')),
				// 'typ_rate_util_unit' => $this->sifirla($this->input->post('typ_rate_util_unit')),
				// 'max_rate_util' => $this->sifirla($this->input->post('max_rate_util')),
				// 'max_rate_util_unit' => $this->sifirla($this->input->post('max_rate_util_unit')),
				'comment' => $this->input->post('comment'),
			);
			$this->process_model->update_cmpny_flow_prcss($companyID,$process_id,$cmpny_prcss);
			redirect(base_url('new_process/'.$companyID), 'refresh');
		}

		$data['process'] = $this->process_model->get_cmpny_prcss_from_rid($companyID,$process_id);
		$data['companyID'] = $companyID;
		$data['company_info'] = $this->company_model->get_company($companyID);
		$data['units'] = $this->flow_model->get_unit_list();

		$this->load->view('template/header');
		$this->load->view('dataset/edit_process',$data);
		$this->load->view('template/footer');
	}

	public function new_equipment($companyID){

		$this->form_validation->set_rules('usedprocess','Used Process','required');
		$this->form_validation->set_rules('equipment','Equipment Name','required');
		$this->form_validation->set_rules('equipmentTypeName','Equipment Type Name','required');
		$this->form_validation->set_rules('equipmentAttributeName','Equipment Attribute Name','required');
		$this->form_validation->set_rules('eqpmnt_attrbt_val','Equipment Attribute Value','trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('eqpmnt_attrbt_unit','Equipment Attribute Unit','required|numeric');

		if ($this->form_validation->run() !== FALSE)
		{
			$prcss_id = $this->input->post('usedprocess');
			$equipment_id = $this->input->post('equipment');
			$equipment_type_id = $this->input->post('equipmentTypeName');
			$equipment_type_attribute_id = $this->input->post('equipmentAttributeName');
			$eqpmnt_attrbt_val = $this->input->post('eqpmnt_attrbt_val');
			$eqpmnt_attrbt_unit = $this->input->post('eqpmnt_attrbt_unit');

			$cmpny_eqpmnt_type_attrbt = array(
					'cmpny_id' => $companyID,
					'eqpmnt_id' => $equipment_id,
					'eqpmnt_type_id' => $equipment_type_id,
					'eqpmnt_type_attrbt_id' => $equipment_type_attribute_id,
					'eqpmnt_attrbt_val' => $eqpmnt_attrbt_val,
					'eqpmnt_attrbt_unit' => $eqpmnt_attrbt_unit
				);
			$last_index = $this->equipment_model->set_info($cmpny_eqpmnt_type_attrbt);

			$cmpny_prcss_id = $this->equipment_model->get_cmpny_prcss_id($companyID,$prcss_id);

			$cmpny_prcss = array(
					'cmpny_eqpmnt_type_id' => $last_index,
					'cmpny_prcss_id' => $cmpny_prcss_id['id']
				);
			$this->equipment_model->set_cmpny_prcss($cmpny_prcss);
		}

		$data['companyID'] = $companyID;
		$data['equipmentName'] = $this->equipment_model->get_equipment_name();
		$data['process'] = $this->equipment_model->cmpny_prcss($companyID);
		$data['informations'] = $this->equipment_model->all_information_of_equipment($companyID);
		$data['company_info'] = $this->company_model->get_company($companyID);
		$data['units'] = $this->flow_model->get_unit_list();

		$this->load->view('template/header');
		$this->load->view('dataset/dataSetLeftSide',$data);
		$this->load->view('dataset/new_equipment',$data);
		$this->load->view('template/footer');
	}

	public function delete_product($companyID,$id){
		$this->product_model->delete_product($id);
		redirect('new_product/'.$companyID, 'refresh');
	}
	public function delete_flow($companyID,$id){
		$cmpny_flow_prcss_id_list = $this->process_model->cmpny_flow_prcss_id_list($id);
		$this->process_model->delete_cmpny_flow_process($id);

		foreach ($cmpny_flow_prcss_id_list as $cmpny_flow_prcss_id) {
			if(!$this->process_model->still_exist_this_cmpny_prcss($cmpny_flow_prcss_id['cmpny_prcss_id'])){
				$this->equipment_model->delete_cmpny_equipment($cmpny_flow_prcss_id['cmpny_prcss_id']);
				$this->process_model->delete_cmpny_process($cmpny_flow_prcss_id['cmpny_prcss_id']);
			}
		}

		$this->component_model->delete_flow_cmpnnt_by_flowID($id);
		$this->flow_model->delete_flow($id);
		redirect('new_flow/'.$companyID, 'refresh');
	}

	public function delete_component($companyID,$id){
		$this->component_model->delete_flow_cmpnnt_by_cmpnntID($id);
		$this->component_model->delete_cmpnnt($companyID,$id);
		redirect('new_component/'.$companyID, 'refresh');
	}

	public function get_equipment_type(){
		$equipment_id = $this->input->post('equipment_id');
		$type_list = $this->equipment_model->get_equipment_type_list($equipment_id);
		echo json_encode($type_list);
	}

	public function get_equipment_attribute(){
		$equipment_type_id = $this->input->post('equipment_type_id');
		$attribute_list = $this->equipment_model->get_equipment_attribute_list($equipment_type_id);
		echo json_encode($attribute_list);
	}

	public function get_sub_process(){
		$processID = $this->input->post('processID');
		$process_list = $this->process_model->get_process_from_motherID($processID);
		echo json_encode($process_list);
	}

	public function delete_process($companyID,$company_process_id,$company_flow_id){

		$this->process_model->delete_company_flow_prcss($company_process_id,$company_flow_id);

		if(!$this->process_model->still_exist_this_cmpny_prcss($company_process_id))
		{
			$this->equipment_model->delete_cmpny_equipment($company_process_id);
			$this->process_model->delete_cmpny_process($company_process_id);
		}
		/*
			$this->process_model->delete_cmpny_prcss_eqpmnt_type($id['id']);
		$this->process_model->delete_cmpny_prcss($companyID);
		$this->process_model->delete_cmpny_eqpmnt($companyID)*/
		redirect('new_process/'.$companyID);
	}

	public function delete_equipment($cmpny_id,$cmpny_eqpmnt_id){

		$this->equipment_model->delete_cmpny_prcss_eqpmnt_type($cmpny_eqpmnt_id);
		$this->equipment_model->delete_cmpny_eqpmnt($cmpny_eqpmnt_id);
		redirect('new_equipment/'.$cmpny_id,'refresh');
	}


}
