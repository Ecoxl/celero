<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CELERO</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- Loading Bootstrap -->
  <link href="<?php echo asset_url('bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">

  <!-- Loading Flat UI -->
  <link href="<?php echo asset_url('css/flat-ui.css'); ?>" rel="stylesheet">
  <link href="<?php echo asset_url('css/custom.css'); ?>" rel="stylesheet">
  <link href="<?php echo asset_url('css/selectize.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo asset_url('css/font-awesome.min.css'); ?>">
    <!--<link href="<?php // echo asset_url('css/jquery-ui-1.10.4.custom.css'); ?>" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <![endif]-->

      <script src="<?php echo asset_url('js/jquery-1.10.2.min.js'); ?>"></script>
      <script src="<?php echo asset_url('js/bootstrap.min.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo asset_url('is/jquery.easyui.min.js'); ?>"></script>
      <?php   if($this->session->userdata['site_lang']==null || $this->session->userdata['site_lang']=='') { ?>
        <script type="text/javascript" src="<?php echo asset_url('is/locale/easyui-lang-en.js'); ?>"></script>
      <?php  }else if($this->session->userdata['site_lang']=='turkish'){ ?>
            <script type="text/javascript" src="<?php echo asset_url('is/locale/easyui-lang-tr.js'); ?>"></script>
      <?php  }else { ?>
            <script type="text/javascript" src="<?php echo asset_url('is/locale/easyui-lang-en.js'); ?>"></script>
      <?php  } ?>
      <!--[if lt IE 9]><script src="http://cdnjs.cloudflare.com/ajax/libs/es5-shim/2.0.8/es5-shim.min.js"></script><![endif]-->
      <?php if($this->uri->segment(1)!="isscoping" and $this->uri->segment(1)!="isscopingauto"
        and $this->uri->segment(1)!="isScopingAutoPrjBase"
        and $this->uri->segment(1)!="isScopingAutoPrjBaseMDF"
        and $this->uri->segment(1)!="isScopingPrjBaseMDF"
        and $this->uri->segment(1)!="isScopingPrjBase"
        and $this->uri->segment(1)!="scenarios"
        and $this->uri->segment(1)!="cost_benefit"
        and $this->uri->segment(1)!="kpi_calculation"): ?>
        <script src="<?php echo asset_url('js/selectize.min.js'); ?>"></script>
        <script type="text/javascript">
          $(function() {
            $('#selectize').selectize({
              create: true,
              sortField: 'text'
            });
          //$( "select" ).selectize();
        });
      </script>
    <?php endif ?>
  </head>
  <body <?php /*if($this->uri->segment(1)=="isscoping" or $this->uri->segment(1)=="isscopingauto"){echo 'class="easyui-layout"';}*/ ?>>

    <nav class="navbar navbar-default navbar-lg" style="margin-bottom:0px;">
      <a class="navbar-brand" href="<?php echo base_url(); ?>" style="color:white;">Celero</a>
      <?php echo lang("msg_first_name"); ?>

      <form class="navbar-form navbar-right" action="<?php echo base_url('search'); ?>" method="post" role="search" style="display: table;">
        <div class="form-group">
          <div class="input-group" style="display:block;">
            <input name="term" class="form-control" id="navbarInput-01" type="search" placeholder="<?php echo lang("search"); ?>">
            
              <button type="submit" class="btn"><span style="color:black;" class="fui-search"></span></button>
            
          </div>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href='<?php echo base_url('language/switch/turkish'); ?>' style="padding-right: 0px; padding-bottom:25px; "><img src="<?php echo asset_url('images/Turkey.png'); ?>"></a></li>
        <li><a href='<?php echo base_url('language/switch/english'); ?>' style="padding-bottom: 25px;"><img src="<?php echo asset_url('images/United-States.png'); ?>"></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-left ust-nav">
        <li class="navtus" data-rel="profiles"><a id="l1" href="#" ><i class="fa fa-group"></i> <?php echo lang("profiles"); ?></a></li>
        <li class="navtus" data-rel="companies"><a id="l2" href="#" ><i class="fa fa-building-o"></i> <?php echo lang("companies"); ?></a></li>
        <li class="navtus" data-rel="projects"><a id="l3" href="#" ><i class="fa fa-globe"></i> <?php echo lang("projects"); ?></a></li>
        <li class="navtus" data-rel="analysis"><a id="l4" href="#" ><i class="fa fa-recycle"></i> <?php echo lang("analysis"); ?></a></li>
        <li class="navtus" data-rel="reporting"><a id="l5" href="#" style="color:white;"><i class="fa fa-pie-chart"></i> <?php echo lang("reporting"); ?></a></li>
      </ul>
    </nav>

    <div class="content-container" style="margin-bottom: 20px;display: block;height: 52px;">

      <ul id="homies" class="nav navbar-nav alt-nav" style="display:none;">
        <li><a href="#" class="nav-info"></a></li>
        <li><a href="<?php echo base_url('contactus'); ?>"><i class="fa fa-envelope"></i> <?php echo lang("whoarewe"); ?></a></li>
        <li><a href="<?php echo base_url('whatwedo'); ?>"><i class="fa fa-question-circle"></i> <?php echo lang("whatwedo"); ?></a></li>
        <li><a href="<?php echo base_url('functionalities'); ?>"><i class="fa fa-dashboard"></i> <?php echo lang("functionalities"); ?></a></li>
      </ul>

      <ul id="profiles" class="nav navbar-nav alt-nav" style="display:none;">
         <li><a href="#" class="nav-info"></a></li>
        <li><a href="<?php echo base_url('users'); ?>"><i class="fa fa-group"></i> <?php echo lang("consultants"); ?></a></li>
        <?php
              //print_r($this->session->userdata('user_in'));
        if ($this->session->userdata('user_in') !== FALSE):
          $tmp = $this->session->userdata('user_in');
        ?>
        <li class="head-li"><a href="<?php echo base_url('user/'.$tmp['username']); ?>" style="text-transform: capitalize;"><i class="fa fa-user"></i> <?php echo $tmp['username']; ?></a></li>
        <li class="head-li"><a href="<?php echo base_url('profile_update'); ?>" ><i class="fa fa-pencil-square-o"></i> <?php echo lang("updateprofile"); ?></a></li>
        <li class="head-li"><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out"></i> <?php echo lang("logout"); ?></a></li>
      <?php else: ?>
        <li class="head-li"><a href="<?php echo base_url('login'); ?>"><i class="fa fa-sign-in"></i> <?php echo lang("login"); ?></a></li>
        <li class="head-li"><a href="<?php echo base_url('register'); ?>"><i class="fa fa-plus"></i> <?php echo lang("register"); ?></a></li>
      <?php endif ?>
    </ul>

    <ul id="companies" class="nav navbar-nav alt-nav" style="display:none;">
         <li><a href="#" class="nav-info"></a></li>
      <?php if ($this->session->userdata('user_in') !== FALSE): ?>
        <li><a href="<?php echo base_url('mycompanies'); ?>"><i class="fa fa-building-o"></i> <?php echo lang("mycompanies"); ?></a></li>
        <?php if($this->session->userdata('project_id') !== FALSE): ?>
          <li><a href="<?php echo base_url('projectcompanies'); ?>"><i class="fa fa-building-o"></i> <?php echo lang("projectcompanies"); ?></a></li>
        <?php endif ?>
      <?php endif ?>
        <li><a href="<?php echo base_url('companies'); ?>"><i class="fa fa-building-o"></i> <?php echo lang("allcompanies"); ?></a></li>
      <?php if ($this->session->userdata('user_in') !== FALSE): ?>
        <li class="head-li"><a href="<?php echo base_url('newcompany'); ?>"><i class="fa fa-plus-square"></i> <?php echo lang("createcompany"); ?></a></li>
      <?php endif ?>
    </ul>

    <ul id="projects" class="nav navbar-nav alt-nav" style="display:none;">
         <li><a href="#" class="nav-info"></a></li>
      <?php if ($this->session->userdata('user_in') !== FALSE): ?>
        <li><a href="<?php echo base_url('myprojects'); ?>"><i class="fa fa-globe"></i> <?php echo lang("myprojects"); ?></a></li>
      <?php endif ?>
      <li><a href="<?php echo base_url('projects'); ?>"><i class="fa fa-globe"></i> <?php echo lang("allprojects"); ?></a></li>
      <?php if ($this->session->userdata('user_in') !== FALSE): ?>
        <li><a href="<?php echo base_url('newproject'); ?>"><i class="fa fa-plus-circle"></i> <?php echo lang("createproject"); ?></a></li>
      <?php endif ?>
      <?php if($this->session->userdata('project_id') !== FALSE): ?>
        <li class="pull-right"><a href="<?php echo base_url('closeproject'); ?>"><i class="fa fa-times-circle"></i> <?php echo lang("closeproject"); ?></a></li>
        <li class="pull-right"><a href="<?php echo base_url('project/'.$this->session->userdata('project_id')); ?>"><?php echo $this->session->userdata('project_name'); ?></a></li>
      <?php endif ?>
    </ul>

    <ul id="analysis" class="nav navbar-nav alt-nav" style="display:none;">
         <li><a href="#" class="nav-info"></a></li>
      <?php if ($this->session->userdata('user_in') !== FALSE): ?>
        <?php if($this->session->userdata('project_id') !== FALSE): ?>
          <li><a href="<?php echo base_url('cpscoping'); ?>"><i class="fa fa-recycle"></i> <?php echo lang("cpidentification"); ?></a></li>
          <li>
            <div class="dropdown">
              <button class="btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true" style="padding: 12px 0px; color:white;">
                <i class="fa fa-exchange"></i> <?php echo lang("isidentification"); ?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-inverse" role="menu" aria-labelledby="dropdownMenu1">
                <!--<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('isScopingPrjBase'); ?>">Manual IS</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('isScopingAutoPrjBase'); ?>">Automated IS</a></li>-->
                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('isScopingPrjBaseMDF'); ?>">Manual IS</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('isScopingAutoPrjBaseMDF'); ?>">Automated IS</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('isscenarios'); ?>">IS Scenarios(Supervisors)</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('isscenariosCns'); ?>">IS Scenarios(Consultants)</a></li>
              </ul>
            </div>
          </li>
          <li><a href="<?php echo base_url('map'); ?>"><i class="fa fa-globe"></i> <?php echo lang("gis"); ?></a></li>
          <li><a href="<?php echo base_url('cost_benefit'); ?>"><i class="fa fa-eur"></i> <?php echo lang("costbenefitanalysis"); ?></a></li>
          <li><a href="<?php echo base_url('ecotracking'); ?>"><i class="fa fa-area-chart"></i> <?php echo lang("ecotracking"); ?></a></li>
        <?php else: ?>
          <li><a href="#"><?php echo lang("analysisinfo"); ?></a></li>
          <!--<ul class="list-inline" style="margin:0px;">
            <li class="head-li"><a href="<?php echo base_url('openproject'); ?>"><i class="fa fa-plus-square-o"></i> Open Project</a></li>
          </ul> -->
        <?php endif ?>
      <?php else: ?>
      <li><a href="#"><?php echo lang("analysisinfo2"); ?></a></li>
      <?php endif ?>
    </ul>

    <ul id="reporting" class="nav navbar-nav alt-nav" style="display:none;">
      <li><a href="#" class="nav-info"></a></li>
      <?php if ($this->session->userdata('user_in') !== FALSE): ?>
      <li><a href="<?php echo base_url('createreport'); ?>"><i class="fa fa-globe"></i> <?php echo lang("createreport"); ?></a></li>
      <?php endif ?>
      <li><a href="<?php echo base_url('allreports'); ?>"><i class="fa fa-globe"></i> <?php echo lang("allreports"); ?></a></li>
    </ul>


  </div>
  <div class="clearfix" style="margin-bottom: 10px;"></div>
  <!-- <p style="font-size:14px; margin:0px;">
    To use the extended features of this web site, please register.
  </p> -->
  <script type="text/javascript">

  var project_durum = <?php if($this->session->userdata('project_id')){echo "true";}else{ echo "false";} ?>

    $( document ).ready(function() {
      var pathname = window.location.pathname;
      console.log(pathname);
      //alert(pathname);
      if ((pathname.toLowerCase().indexOf("user") >= 0) || (pathname.toLowerCase().indexOf("profile") >= 0) || (pathname.toLowerCase().indexOf("login") >= 0) || (pathname.toLowerCase().indexOf("register") >= 0)){
        $('#l1').css('background-color', '#C85A1F');
        $('.content-container ul.nav').hide();
        $('#profiles').fadeIn('slow');
      }
      else if ((pathname.toLowerCase().indexOf("company") >= 0) || (pathname.toLowerCase().indexOf("companies") >= 0) || (pathname.toLowerCase().indexOf("product") >= 0) || (pathname.toLowerCase().indexOf("flow") >= 0) || (pathname.toLowerCase().indexOf("component") >= 0) || (pathname.toLowerCase().indexOf("process") >= 0) || (pathname.toLowerCase().indexOf("equipment") >= 0)){
        $('#l2').css('background-color', '#901F0F');
        $('.content-container ul.nav').hide();
        $('#companies').fadeIn('slow');
      }
      else if ((pathname.toLowerCase().indexOf("project") >= 0) && (project_durum==false)){
        $('#l3').css('background-color', '#15474A');
        $('.content-container ul.nav').hide();
        $('#projects').fadeIn('slow');
      }
      else if ((pathname.toLowerCase().indexOf("myproject") >= 0) || (pathname.toLowerCase().indexOf("newproject") >= 0)|| (pathname.toLowerCase().indexOf("projects") >= 0)){
        $('#l3').css('background-color', '#15474A');
        $('.content-container ul.nav').hide();
        $('#projects').fadeIn('slow');
      }
            else if ((pathname.toLowerCase().indexOf("report") >= 0) || (pathname.toLowerCase().indexOf("allreports") >= 0) ){
        $('#l5').css('background-color', '#AE573E');
        $('.content-container ul.nav').hide();
        $('#reporting').fadeIn('slow');
      }
      else if ((pathname.toLowerCase().indexOf("cpscoping") >= 0) || (pathname.toLowerCase().indexOf("isscoping") >= 0) || (pathname.toLowerCase().indexOf("cost_benefit") >= 0) || (pathname.toLowerCase().indexOf("kpi_calculation") >= 0) || (pathname.toLowerCase().indexOf("ecotracking") >= 0) || (project_durum==true)){
        $('#l4').css('background-color', '#84BFC3');
        $('.content-container ul.nav').hide();
        $('#analysis').fadeIn('slow');
      }
      else {
        $('.content-container ul.nav').hide();
        $('#homies').fadeIn('slow');
      }
    });

    $(".navtus").click(function(e) {
      e.preventDefault();
      $('.content-container ul.nav').hide();
      $('#' + $(this).data('rel')).fadeIn('slow');
      if($(this).data('rel') == "profiles"){
        $('#l1').css('background-color', '#C85A1F');
      }
      else if($(this).data('rel') == "companies"){
        $('#l2').css('background-color', '#901F0F');
      }
      else if($(this).data('rel') == "projects"){
        $('#l3').css('background-color', '#15474A');
      }
      else if($(this).data('rel') == "analysis"){
        $('#l4').css('background-color', '#84BFC3');
      }
      else if($(this).data('rel') == "reporting"){
        $('#l5').css('background-color', '#AE573E');
      }
      $(this).siblings().find("a").css( "background-color", "#2D8B42" );
    });
  </script>