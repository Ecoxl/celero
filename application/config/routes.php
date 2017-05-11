<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

// Language
$route['language/switch/(:any)'] = "langswitch/switchLanguage/$1";

// ADMIN
$route['admin/newFlow'] = "admin/newFlow";
$route['admin/newProcess'] = "admin/newProcess";
$route['admin/newEquipment'] = "admin/newEquipment";
$route['admin/reports'] = "admin/reports";
 
//Report
$route['report/(:any)'] = "reporting/show_single/$1";
$route['allreports'] = "reporting/show_all";
$route['admin/report'] = "admin/report";

$route['admin/rpEmployeesList'] = "admin/rpEmployeesList";
$route['admin/rpCompaniesList'] = "admin/rpCompaniesList";
$route['admin/rpCompaniesInfoList'] = "admin/rpCompaniesInfoList";
$route['admin/rpCompaniesProjectsList'] = "admin/rpCompaniesProjectsList";
$route['admin/rpCompaniesProjectDetailsList'] = "admin/rpCompaniesProjectDetailsList";
$route['admin/rpCompaniesNotInClustersList'] = "admin/rpCompaniesNotInClustersList";
$route['admin/rpCompaniesWasteEmissionList'] = "admin/rpCompaniesWasteEmissionList";
$route['admin/rpCompaniesProductionList'] = "admin/rpCompaniesProductionList";
$route['admin/rpCompaniesProcessesList'] = "admin/rpCompaniesProcessesList";
$route['admin/rpConsultantsList'] = "admin/rpConsultantsList";
$route['admin/rpCompaniesInClustersList'] = "admin/rpCompaniesInClustersList";
$route['admin/rpEquipmentList'] = "admin/rpEquipmentList";




$route['admin/reportTest'] = "admin/reportTest";
$route['admin/reportTest'] = "admin/reportTest";
$route['admin/clusters'] = "admin/clusters";
$route['admin/industrialZones'] = "admin/industrialZones";
$route['admin/consultants'] = "admin/consultants";
$route['admin/employees'] = "admin/employees";
$route['admin/zoneEmployees'] = "admin/zoneEmployees";
$route['admin/zoneCompanies'] = "admin/zoneCompanies";
$route['createreport'] = "reporting/create"; 

//IS scoping
$route['isscoping'] = "isscoping/index";
$route['isscopingauto'] = "isscoping/auto";
$route['isScopingAutoPrjBase'] = "isscoping/autoprjbase";
$route['isScopingAutoPrjBaseMDF'] = "isscoping/autoprjbaseMDF";
$route['isScopingAutoPrjBaseMDFTest'] = "isscoping/autoprjbaseMDFTest";
$route['isScopingPrjBase'] = "isscoping/prjbase";
$route['isScopingPrjBaseMDF'] = "isscoping/prjbaseMDF";
$route['isscopingtooltip'] = "isscoping/tooltip";
$route['isscopingtooltipscenarios'] = "isscoping/tooltipscenarios";
$route['isscenarios'] = "isscoping/isscenarios";
$route['isscenariosCns'] = "isscoping/isscenariosCns";

//map
$route['map'] = "map/index";
$route['mapHeader'] = "map/mapHeader";


//Ecotracking
$route['ecotracking/(:any)/(:any)/(:any)/(:any)/(:any)'] = "ecotracking/save/$1/$2/$3/$4/$5";
$route['ecotracking/json/(:any)/(:any)'] = "ecotracking/json/$1/$2";
$route['ecotracking/(:any)/(:any)'] = "ecotracking/show/$1/$2";
$route['ecotracking'] = "ecotracking/index";

//Cost Benefit
$route['cost_benefit/(:any)/(:any)'] = "cost_benefit/new_cost_benefit/$1/$2";
$route['cost_benefit'] = "cost_benefit/index";
$route['cba/save/(:any)/(:any)/(:any)/(:any)'] = "cost_benefit/save/$1/$2/$3/$4";

//Html Parse
$route['euro_dolar'] = "cpscoping/dolar_euro_parse";

//Easy UI Denemeleri
$route['cp_allocation/deneme'] = "cpscoping/deneme";
$route['cp_allocation/deneme_json'] = "cpscoping/deneme_json";

//KPI
$route['kpi_json/(:any)/(:any)'] = "cpscoping/kpi_json/$1/$2";
$route['kpi_calculation_chart/(:any)/(:any)'] = "cpscoping/kpi_calculation_chart/$1/$2";
$route['kpi_insert/(:any)/(:any)/(:any)/(:any)/(:any)'] = "cpscoping/kpi_insert/$1/$2/$3/$4/$5";
$route['kpi_calculation/(:any)/(:any)'] = "cpscoping/kpi_calculation/$1/$2";
$route['search_result/(:any)/(:any)'] = "cpscoping/search_result/$1/$2";

//CP
$route['cpscoping/full_get/(:any)/(:any)/(:any)/(:any)'] = "cpscoping/get_only_given_full/$1/$2/$3/$4";
$route['cpscoping/deneme'] = "cpscoping/deneme";
$route['cpscoping/comment_save/(:any)/(:any)'] = "cpscoping/comment_save/$1/$2";
$route['cpscoping/allocated_table/(:any)/(:any)/(:any)/(:any)/(:any)'] = "cpscoping/get_already_allocated_allocation_except_given/$1/$2/$3/$4/$5";
$route['cpscoping/edit_allocation/(:any)'] = "cpscoping/edit_allocation/$1";
$route['cpscoping/file_upload/(:any)/(:any)'] = "cpscoping/cp_scoping_file_upload/$1/$2";
$route['cpscoping/file_delete/(:any)/(:any)'] = "cpscoping/file_delete/$1/$2";
$route['cpscoping/is_candidate_insert/(:any)/(:any)'] = "cpscoping/cp_is_candidate_insert/$1/$2";
$route['cpscoping/is_candidate_control/(:any)'] = "cpscoping/cp_is_candidate_control/$1";
$route['cpscoping/cost_ep/(:any)/(:any)/(:any)'] = "cpscoping/cost_ep_value/$1/$2/$3";
$route['cpscoping/get_allo/(:any)/(:any)/(:any)/(:any)/(:any)'] = "cpscoping/get_allo_from_fname_pname/$1/$2/$3/$4/$5";
$route['cpscoping/(:any)/(:any)/show'] = "cpscoping/cp_show_allocation/$1/$2";
$route['cpscoping/delete/(:any)/(:any)/(:any)'] = "cpscoping/delete_allocation/$1/$2/$3";
$route['cp_allocation_array/(:any)'] = "cpscoping/cp_allocation_array/$1";
$route['cpscoping/(:any)/(:any)/allocation'] = "cpscoping/cp_allocation/$1/$2";
$route['cpscoping/pro/(:any)'] = "cpscoping/p_companies/$1";
$route['cpscoping'] = "cpscoping/index";

//Password routes
$route['send_email_for_change_pass'] = "password/send_email_for_change_pass";
$route['change_pass/(:any)'] = "password/change_pass/$1";
$route['new_password_email'] = "password/new_password_email";
$route['new_password/(:any)'] = "password/new_password/$1";

$route['cluster'] = "cluster/cluster_to_match_company";

$route['become_consultant'] = "user/become_consultant";
$route['profile_update'] = "user/user_profile_update";
$route['user/(:any)'] = "user/user_profile/$1";
$route['users'] = "user/show_all_users";
$route['register'] = "user/user_register";
$route['login'] = "user/user_login";
$route['logout'] = "user/user_logout";

//OPen project
$route['closeproject'] = "project/close_project";
$route['openproject'] = "project/open_project";
$route['update_project/(:any)'] = "project/update_project/$1";
$route['newproject'] = "project/new_project";
$route['projects'] = "project/show_all_project";
$route['myprojects'] = "project/show_my_project";
$route['contactperson']="project/contact_person";
$route['project/(:any)'] = "project/view_project/$1";

$route['tuna_json/(:any)']="company/get_company_info/$1";
$route['companySearch']="company/company_search";
$route['update_company/(:any)'] = "company/update_company/$1";
$route['newcompany'] = "company/new_company";
$route['companies'] = "company/show_all_companies";
$route['tuna/(:any)'] = "company/show_tuna/$1";
$route['tuna'] = "company/show_tuna";
$route['mycompanies'] = "company/show_my_companies";
$route['projectcompanies'] = "company/show_project_companies";
$route['company/(:any)'] = "company/companies/$1";
$route['addUsertoCompany/(:any)'] = "company/addUsertoCompany/$1";

$route['search'] = "search/search_pro";
$route['search/(:any)'] = "search/search_pro/$1";

// Dataset
$route['flow_and_component'] = "dataset/flow_and_component";
$route['allocationlist/(:any)/(:any)'] = "cpscoping/allocationlist/$1/$2";
$route['new_flow/(:any)'] = "dataset/new_flow/$1";
$route['edit_flow/(:any)/(:any)/(:any)'] = "dataset/edit_flow/$1/$2/$3";
$route['edit_component/(:any)/(:any)'] = "dataset/edit_component/$1/$2";
$route['new_component/(:any)'] = "dataset/new_component/$1";
$route['delete_flow/(:any)/(:any)'] = "dataset/delete_flow/$1/$2";
$route['delete_component/(:any)/(:any)'] = "dataset/delete_component/$1/$2";

$route['new_product/(:any)'] = "dataset/new_product/$1";
$route['edit_product/(:any)/(:any)'] = "dataset/edit_product/$1/$2";
$route['product'] = "dataset/product";
$route['delete_product/(:any)/(:any)'] = "dataset/delete_product/$1/$2";

$route['edit_process/(:any)/(:any)'] = "dataset/edit_process/$1/$2";
$route['new_process/(:any)'] = "dataset/new_process/$1";
$route['delete_process/(:any)/(:any)/(:any)'] = "dataset/delete_process/$1/$2/$3";
$route['get_sub_process'] = "dataset/get_sub_process";

$route['new_equipment/(:any)'] = "dataset/new_equipment/$1";
$route['get_equipment_type'] = "dataset/get_equipment_type";
$route['get_equipment_attribute'] = "dataset/get_equipment_attribute";
$route['delete_equipment/(:any)/(:any)'] = "dataset/delete_equipment/$1/$2";

$route['default_controller'] = "homepage";
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
