<?php
class Flow_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function register_flow_to_company($flow){
		$this->db->insert('t_cmpny_flow', $flow);
	}

	public function get_flow_from_flow_id($flow_id){
		$this->db->select("*");
		$this->db->from("t_flow");
		$this->db->where("id",$flow_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_flow_from_flow_name($flow_name){
		$this->db->select("*");
		$this->db->from("t_flow");
		$this->db->where("name",$flow_name);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_flowname_list(){
		$this->db->select("*");
		$this->db->from("t_flow");
		$this->db->where('active',1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_flowtype_list(){
		$this->db->select("*");
		$this->db->from("t_flow_type");
		$this->db->where('active',1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_flowfamily_list(){
		$this->db->select("*");
		$this->db->from("t_flow_family");
		$this->db->where('active',1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_company_flow_list($companyID){
		$this->db->select('*,t_flow_family.name as flowfamily,t_cmpny_flow.id as id,t_flow.name as flowname,t_flow_type.name  as flowtype,t_cmpny_flow.id as cmpny_flow_id,t_cmpny_flow.qntty as qntty,unit1.name as qntty_unit_name,t_cmpny_flow.cost as cost,t_cmpny_flow.ep as ep,t_cmpny_flow.ep_unit_id as ep_unit, t_cmpny_flow.cost_unit_id as cost_unit');
		$this->db->from("t_cmpny_flow");
		$this->db->join('t_flow','t_flow.id = t_cmpny_flow.flow_id');
		$this->db->join('t_flow_family','t_flow.flow_family_id = t_flow_family.id', 'left');
		$this->db->join('t_flow_type','t_flow_type.id = t_cmpny_flow.flow_type_id');
		$this->db->join('t_unit as unit1','unit1.id = t_cmpny_flow.qntty_unit_id');
		$this->db->where('cmpny_id',$companyID);
		$this->db->order_by("t_flow.name", "asc");
		$this->db->order_by("t_flow_type.name", "asc");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_company_flow($companyID,$flow_id,$flow_type_id){
		$this->db->select('*,t_flow_family.name as flowfamily,t_cmpny_flow.id as id,t_flow.name as flowname,t_flow_type.name  as flowtype,t_cmpny_flow.id as cmpny_flow_id,t_cmpny_flow.qntty as qntty,unit1.name as qntty_unit_name,t_cmpny_flow.cost as cost,t_cmpny_flow.ep as ep,t_cmpny_flow.ep_unit_id as ep_unit, t_cmpny_flow.cost_unit_id as cost_unit');
		$this->db->from("t_cmpny_flow");
		$this->db->join('t_flow','t_flow.id = t_cmpny_flow.flow_id');
		$this->db->join('t_flow_family','t_flow.flow_family_id = t_flow_family.id', 'left');
		$this->db->join('t_flow_type','t_flow_type.id = t_cmpny_flow.flow_type_id');
		$this->db->join('t_unit as unit1','unit1.id = t_cmpny_flow.qntty_unit_id');
		$this->db->where('cmpny_id',$companyID);
		$this->db->where('flow_id',$flow_id);
		$this->db->where('flow_type_id',$flow_type_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_unit_list(){
		$this->db->select("*");
		$this->db->from("t_unit");
		$this->db->where('active',1);
		$this->db->order_by("name", "asc");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function has_same_flow($flow_id,$flow_type_id,$companyID){
		$this->db->select("*");
		$this->db->from("t_cmpny_flow");
		$this->db->where('flow_id',$flow_id);
		$this->db->where('flow_type_id',$flow_type_id);
		$this->db->where('cmpny_id',$companyID);
		$query = $this->db->get()->result_array();
		if(!empty($query)){
			return false;
		}
		else{
			return true;
		}
	}

	public function delete_flow($id){
		$this->db->where('id', $id);
		$this->db->delete('t_cmpny_flow');
	}

	public function update_flow_info($companyID,$flow_id,$flow_type_id,$flow){
    $this->db->where('t_cmpny_flow.cmpny_id',$companyID);
    $this->db->where('t_cmpny_flow.flow_id',$flow_id);
    $this->db->where('t_cmpny_flow.flow_type_id',$flow_type_id);
    $this->db->update('t_cmpny_flow',$flow);
	}

}