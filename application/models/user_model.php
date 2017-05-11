<?php
class User_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  public function create_user($data){
    $this->db->insert('t_user', $data);
    return $this->db->insert_id();
  }

  public function get_userinfo_by_username($username){
    $this->db->select('*');
    $this->db->from('t_user');
    $this->db->where('user_name',$username);
    return $this->db->get()->row_array();
  }

  public function check_user($username,$password){
  	$this->db->from('t_user');
  	$this->db->where('user_name',$username);
  	$this->db->where('psswrd',$password);
        
  	$query = $this->db->get();
        //print_r($this->db->last_query());
        //$this->db->get_compiled_select();
  	if($query -> num_rows() == 1)
  	{
  		return $query->row_array();
  	}
  	else
  	{
  		return false;
  	}
  }

  /**
   * [get_consultants description]
   * @return all consultant information in the system ordered by name
   */
  public function get_consultants(){
    $this->db->select('t_user.id as id,t_user.user_name as user_name,t_user.name as name,t_user.surname as surname,t_user.description as description');
    $this->db->from('t_user');
    $this->db->join('t_role', 't_role.id = t_user.role_id');
    $this->db->where('t_role.short_code', 'CNS');
    $this->db->order_by("name", "asc");
    $query = $this->db->get();
    return $query->result_array();

  }

  public function get_company_users($cmpny_id){
    $this->db->select('t_user.name as name,t_user.surname as surname,t_user.id as id,t_cmpny.name as cmpny_name');
    $this->db->from('t_cmpny_prsnl');
    $this->db->join('t_cmpny', 't_cmpny.id = t_cmpny_prsnl.cmpny_id');
    $this->db->join('t_user', 't_user.id = t_cmpny_prsnl.user_id');
    $this->db->where('t_cmpny_prsnl.cmpny_id', $cmpny_id);
    $query = $this->db->get();
    if($query->num_rows() > 0)
    {
      return $query->result_array();
    }
    else
    {
      return false;
    }
  }

  // Session dan acik olan kisinin username bilgisi aliniyor ve bu username e sahip
  // kisinin butun bilgileri controller a return ediliyor.
  public function get_session_user(){
    if ($this->session->userdata('user_in') !== FALSE){
      $tmp = $this->session->userdata('user_in');

      $this->db->from('t_user');
      $this->db->where('id',$tmp['id']);
      $query = $this->db->get();

      if($query -> num_rows() == 1)
      {
        return $query->row_array();
      }
      else
      {
        return false;
      }
    }
  }

  public function get_user($id){
    $this->db->select('*');
    $this->db->from('t_user');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_all_users(){
    $this->db->select('*');
    $this->db->from('t_user');
    $this->db->order_by("name", "asc");
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_worker_projects_from_userid($id){
      $this->db->select('t_prj.name,t_prj.id as proje_id');
      $this->db->from('t_prj');
      $this->db->join('t_prj_cntct_prsnl', 't_prj_cntct_prsnl.prj_id = t_prj.id');
      $this->db->join('t_user', 't_user.id = t_prj_cntct_prsnl.usr_id');
      $this->db->where('t_user.id', $id);
      $query = $this->db->get();
      return $query->result_array();
  }

  public function deneme_json($id){
      $this->db->select('t_prj.name as text,t_prj.id as id');
      $this->db->from('t_prj');
      $this->db->join('t_prj_cnsltnt', 't_prj_cnsltnt.prj_id = t_prj.id');
      $this->db->join('t_user', 't_user.id = t_prj_cnsltnt.cnsltnt_id');
      $this->db->where('t_user.id', $id);
      $query = $this->db->get();
      return $query->result_array();
  }

  public function get_consultant_projects_from_userid($id){
      $this->db->select('t_prj.name,t_prj.id as proje_id');
      $this->db->from('t_prj');
      $this->db->join('t_prj_cnsltnt', 't_prj_cnsltnt.prj_id = t_prj.id');
      $this->db->join('t_user', 't_user.id = t_prj_cnsltnt.cnsltnt_id');
      $this->db->where('t_user.id', $id);
      $this->db->order_by("t_prj.name", "asc");
      $query = $this->db->get();
      return $query->result_array();
  }

  public function update_user($update){
    if ($this->session->userdata('user_in') !== FALSE){
      $tmp = $this->session->userdata('user_in');
      $this->db->where('id', $tmp['id']);
      $this->db->update('t_user', $update);
    }
  }

  public function make_user_consultant($id,$username=FALSE){
    if(empty($username)){
      $username = "Username";
    }

    // T_cnsltnt'a ekleme
    $data = array(
      'user_id' => $id,
      'description' => $username,
      'active' => '1'
    );
    $this->db->insert('t_cnsltnt', $data);

    //T_USER'ı güncelleme
    $data = array(
      'role_id' => '1'
    );
    $this->db->where('id', $id);
    $this->db->update('t_user', $data);
  }

  public function is_user_consultant($id){
    //kullanıcı consultant ise true değilse false döndürür
    $this->db->select('*');
    $this->db->from('t_user');
    $this->db->where('id', $id);
    $query = $this->db->get()->row_array();
    if($query['role_id']=="1"){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }

  public function check_user_email($email){
    $this->db->from('t_user');
    $this->db->where('email',$email);
    $query = $this->db->get();

    if($query -> num_rows() == 1)
      return true;
    else
      return false;
  }

  public function check_username($username){
    $this->db->from('t_user');
    $this->db->where('user_name',$username);
    $query = $this->db->get();

    if($query -> num_rows() == 1)
      return true;
    else
      return false;
  }

  public function set_user_image($userId,$photo){
    $this->db->where('id', $userId);
    $this->db->update('t_user', $photo);
  }

  public function users_without_company(){
    $this->db->select('*')->from('t_user');
    $this->db->where('`id` NOT IN (SELECT `user_id` FROM `t_cmpny_prsnl`)', NULL, FALSE);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function do_consultant($id){
    $this->db->select('t_role.short_code');
    $this->db->from('t_role');
    $this->db->join('t_user','t_user.role_id = t_role.id');
    $this->db->where('t_user.id',$id);
    $query = $this->db->get();
    return $query->row_array();
  }

  //Bir danışmanın danışman olduğu şirketleri listeler
  public function do_edit_company_consultant($user_id){
    $this->db->select('t_prj_cmpny.cmpny_id as cmpnyID');
    $this->db->from('t_prj_cnsltnt');
    $this->db->join('t_prj_cmpny', 't_prj_cmpny.prj_id = t_prj_cnsltnt.prj_id');
    $this->db->where('t_prj_cnsltnt.cnsltnt_id',$user_id);
    $query = $this->db->get()->result_array();
    return $query;
  }

  //Bir kullanıcı bir şirketin danışmanı mıdır?
  public function is_consultant_of_company_by_user_id($user_id,$company_id){
    $this->db->select('t_prj_cmpny.cmpny_id as cmpnyID');
    $this->db->from('t_prj_cnsltnt');
    $this->db->join('t_prj_cmpny', 't_prj_cmpny.prj_id = t_prj_cnsltnt.prj_id');
    $this->db->where('t_prj_cnsltnt.cnsltnt_id',$user_id);
    $this->db->where('t_prj_cmpny.cmpny_id',$company_id);
    $query = $this->db->get()->result_array();
    if(empty($query)){
      return FALSE;
    }else{
      return TRUE;
    }
  }

  public function is_consultant_of_project_by_user_id($user_id,$prj_id){
    $this->db->select('*');
    $this->db->from('t_prj_cnsltnt');
    $this->db->where('t_prj_cnsltnt.cnsltnt_id',$user_id);
    $this->db->where('t_prj_cnsltnt.prj_id',$prj_id);
    $query = $this->db->get()->result_array();
    if(empty($query)){
      return FALSE;
    }else{
      return TRUE;
    }
  }

  public function is_contactperson_of_project_by_user_id($user_id,$prj_id){
    $this->db->select('*');
    $this->db->from('t_prj_cntct_prsnl');
    $this->db->where('t_prj_cntct_prsnl.usr_id',$user_id);
    $this->db->where('t_prj_cntct_prsnl.prj_id',$prj_id);
    $query = $this->db->get()->result_array();
    if(empty($query)){
      return FALSE;
    }else{
      return TRUE;
    }
  }

  public function cmpny_prsnl($user_id){
    $this->db->select('cmpny_id');
    $this->db->from('t_cmpny_prsnl');
    $this->db->where('user_id',$user_id);
    $query = $this->db->get();
    return $query->row_array();
  }

  //Firmanın contact person'ı mı?
  public function is_contact_by_userid($user_id,$company_id){
    $this->db->select('*');
    $this->db->from('t_cmpny_prsnl');
    $this->db->where('user_id',$user_id);
    $this->db->where('cmpny_id', $company_id);
    $this->db->where('is_contact', '1');
    $query = $this->db->get()->row_array();
    if(empty($query))
      return FALSE;
    else
      return TRUE;
  }

  //verilen user'ın verilen şirketi edit edip edemeyeceğine dair bilgiyi verir
  public function can_edit_company($user_id,$company_id){
    $consultant = $this->is_consultant_of_company_by_user_id($user_id,$company_id);
    $contact = $this->is_contact_by_userid($user_id,$company_id);
    return $consultant || $contact;
  }

}
?>
