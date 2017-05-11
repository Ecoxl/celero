<?php
class Company_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  public function insert_company($data){
    $this->db->insert('t_cmpny',$data);
    $this->db->select('id');
    $this->db->from('t_cmpny');
    $this->db->where('name',$data['name']);
    $query = $this->db->get()->row_array();
    return $query['id'];
  }

  /**
   * Saves company icon information
   * @param [compnay id]
   * @param [logo address]
   */
  public function set_company_image($last_id,$logo){
    $this->db->where('id', $last_id);
    $this->db->update('t_cmpny', $logo);
  }

  public function search_nace_code($code){
    $this->db->select('id');
    $this->db->from('t_nace_code');
    $this->db->where('code',$code);
    $query = $this->db->get()->row_array();
    return $query;
  }

  public function insert_cmpny_nace_code($data){
    $this->db->insert('t_cmpny_nace_code',$data);
  }

  public function get_companies(){
    $this->db->select('id,name,latitude,longitude,description');
    $this->db->from('t_cmpny');
    $this->db->order_by("name", "asc");
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_my_companies($user_id){
    $this->db->select('*');
    $this->db->from('t_cmpny');
    $this->db->join('t_cmpny_prsnl', 't_cmpny_prsnl.cmpny_id = t_cmpny.id');
    $this->db->where('t_cmpny_prsnl.user_id', $user_id);
    $this->db->order_by("name", "asc");
    $query = $this->db->get();
    return $query->result_array();
  }

  /**
   * returns all companies that user have permission on
   * @param  [type] $user_id [user id]
   * @return [type]          [companies information array]
   */
  public function get_all_companies_i_have_rights($user_id){
    $this->db->select('DISTINCT ON (t_cmpny.name) *',False);
    $this->db->from('t_cmpny');
    $this->db->join('t_cmpny_prsnl', 't_cmpny_prsnl.cmpny_id = t_cmpny.id');
   
    $this->db->join('t_prj_cmpny', 't_prj_cmpny.cmpny_id = t_cmpny.id');
    $this->db->join('t_prj_cnsltnt', 't_prj_cnsltnt.prj_id = t_prj_cmpny.prj_id');

    $this->db->where('t_cmpny_prsnl.user_id', $user_id);
    $this->db->or_where('t_prj_cnsltnt.cnsltnt_id', $user_id);

    $this->db->order_by("t_cmpny.name", "asc");

    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_project_companies($project_id){
    $this->db->select('*');
    $this->db->from('t_cmpny');
    $this->db->join('t_prj_cmpny', 't_prj_cmpny.cmpny_id = t_cmpny.id');
    $this->db->where('t_prj_cmpny.prj_id', $project_id);
    $this->db->order_by("name", "asc");
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_company($id){
    $this->db->select('*');
    $query = $this->db->get_where('t_cmpny', array('id' => $id));
    return $query->row_array();
  }

  public function get_nace_code($id){
    $this->db->select('t_nace_code.code');
    $this->db->from('t_nace_code');
    $this->db->join('t_cmpny_nace_code', 't_cmpny_nace_code.nace_code_id = t_nace_code.id', 'left');
    $this->db->join('t_cmpny', 't_cmpny.id = t_cmpny_nace_code.cmpny_id', 'left');
    $this->db->where('t_cmpny.id', $id);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function get_all_nace_codes(){
    $this->db->select('t_nace_code.code');
    $this->db->from('t_nace_code');
    $query = $this->db->get();
    return $query->result_array();
  }
  
  public function get_countries(){
    $this->db->select('gis_world.id,gis_world.country_name');
    $this->db->from('gis_world');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_company_proj($id){
    $this->db->select('t_prj.name,t_prj.id as proje_id');
    $this->db->from('t_prj');
    $this->db->join('t_prj_cmpny', 't_prj_cmpny.prj_id = t_prj.id');
    $this->db->join('t_cmpny', 't_cmpny.id = t_prj_cmpny.cmpny_id');
    $this->db->where('t_cmpny.id', $id);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_company_workers($id){
      $this->db->select('t_user.name,t_user.surname,t_user.id,t_user.user_name');
      $this->db->from('t_user');
      $this->db->join('t_cmpny_prsnl', 't_cmpny_prsnl.user_id = t_user.id');
      $this->db->join('t_cmpny', 't_cmpny.id = t_cmpny_prsnl.cmpny_id');
      $this->db->where('t_cmpny.id', $id);
      $query = $this->db->get();
      return $query->result_array();
  }

  public function company_search($q){
    $this->db->select('t_cmpny.name,t_cmpny.id');
    $this->db->from('t_cmpny');
    $this->db->like('name', $q);
    $query = $this->db->get();
     if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['name']));
        $new_row['value']=htmlentities(stripslashes($row['id']));
        $row_set[] = $new_row; //build an array
      }
      return json_encode($row_set); //format the array into json data
    }
  }

  public function update_company($data,$id){
    $this->db->where('id', $id);
    $this->db->update('t_cmpny', $data);
  }

  public function update_cmpny_data($data,$id){
    $this->db->where('cmpny_id', $id);
    $this->db->update('t_cmpny_data',$data);
  }

  public function update_cmpny_nace_code($data,$id){
    $this->db->where('cmpny_id', $id);
    $this->db->update('t_cmpny_nace_code',$data);
  }

  public function unique_control_email($email,$cmpny_id){
    $this->db->select('id');
    $this->db->from('t_cmpny');
    $this->db->where('email', $email);
    $query = $this->db->get()->result_array();
    if(empty($query)){
      return true;
    }
    else{
      foreach ($query as $variable) {
        if($variable['id'] != $cmpny_id)
          return false;
      }
      return true;
    }
  }

  public function insert_cmpny_prsnl($cmpny_id){
    $tmp = $this->session->userdata('user_in');
    $data = array(
      'user_id' => $tmp['id'],
      'cmpny_id' => $cmpny_id,
      'is_contact' => '1'
      );
    $this->db->insert('t_cmpny_prsnl',$data);
  }

  public function update_cmpny_prsnl($user_id,$cmpny_id,$data){
    $this->db->where('user_id', $user_id);
    $this->db->where('cmpny_id', $cmpny_id);
    $this->db->update('t_cmpny_prsnl', $data);
  }

  public function return_email($id){
    $this->db->select('email');
    $this->db->from('t_cmpny');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function count_company_table(){
    $count = $this->db->count_all('t_cmpny');
    return $count;
  }

  public function add_worker_to_company($user){
    $this->db->insert('t_cmpny_prsnl',$user);
  }

  public function is_in_nace($nace){
    $query = $this->db->get_where('t_nace_code', array('code' => $nace))->row_array();
    if(empty($query))
      return FALSE;
    else
      return TRUE;
  }

  public function get_clusters(){
    $this->db->select('*');
    $this->db->from('t_clstr');
    $query = $this->db->get()->result_array();
    return $query;
  }

  public function get_companies_with_cluster($cluster_id){
    $this->db->select('*');
    $this->db->from('t_cmpny');
    $this->db->join('t_cmpny_clstr','t_cmpny_clstr.cmpny_id = t_cmpny.id');
    $this->db->where('t_cmpny_clstr.clstr_id',$cluster_id);
    $query = $this->db->get()->result_array();
    return $query;
  }

  public function get_companies_from_flow($flow_id){
    $this->db->select('*,t_cmpny.id as id');
    $this->db->from('t_cmpny');
    $this->db->join('t_cmpny_flow','t_cmpny_flow.cmpny_id = t_cmpny.id');
    $this->db->where('t_cmpny_flow.flow_id',$flow_id);
    $query = $this->db->get()->result_array();
    return $query;
  }

  public function have_project_name($cmpny_id,$cmpny_name){
    $this->db->select('id');
    $this->db->from('t_cmpny');
    $this->db->where('name',$cmpny_name);
    $query = $this->db->get()->result_array();
    if(empty($query))
      return true;
    else{
        foreach ($query as $variable) {
          if($variable['id'] != $cmpny_id){
            return false;
          }
        }
        return true;
    }
  }
}
?>
