<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CPIS Tool</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Loading Bootstrap -->
    <link href="<?php echo asset_url('bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="<?php echo asset_url('mapHeader/flat-ui.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset_url('mapHeader/custom.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset_url('mapHeader/selectize.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo asset_url('mapHeader/font-awesome.min.css'); ?>">
    <!--<link href="<?php // echo asset_url('css/jquery-ui-1.10.4.custom.css'); ?>" rel="stylesheet"> 

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!--<script src="<?php echo asset_url('js/jquery-1.10.2.min.js'); ?>"></script>
    <script src="<?php echo asset_url('js/bootstrap.min.js'); ?>"></script>-->


    <!-- font -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,400italic,500italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  </head>
  <body <?php /*if($this->uri->segment(1)=="isscoping" or $this->uri->segment(1)=="isscopingauto"){echo 'class="easyui-layout"';}*/ ?>>

  <div style="background-image: linear-gradient(to top, #0F6E1E 0%, #1F9832 100%);
              text-align: center;
              color:#ffffff; ">CELERO
      <div style="float:right;height: 21px;margin-top: -15px;">
          <ul class="nav navbar-nav navbar-right">
                <li><a href='<?php echo base_url('language/switch/turkish'); ?>' style="padding-right: 0px; border-right: 0px;border-left: 0px; "><img src="<?php echo asset_url('images/Turkey.png'); ?>"></a></li>
                <li><a href='<?php echo base_url('language/switch/english'); ?>' style="border-right: 0px;border-left: 0px;"><img src="<?php echo asset_url('images/United-States.png'); ?>"></a></li>
            </ul>
          
      </div>
      <div class="clearfix"></div>
  </div>
    <div style="background-color: rgb(240, 240, 240); ">
      <!--<ul class="nav navbar-nav navbar-left">-->
      <ul class="list-inline pull-left">
             <li class="head-li">
                 <a href="<?php echo base_url('projects'); ?>"><i class="fa fa-globe"></i><?php echo lang("projects"); ?> </a>
             </li>
             <li class="head-li">
                 <a href="<?php echo base_url('cpscoping'); ?>"><i class="fa fa-bar-chart"></i><?php echo lang("cleanerproduction"); ?> </a>
             </li>
             <li class="head-li">
                 <a href="<?php echo base_url('isScopingPrjBaseMDF'); ?>"><i class="fa fa-sitemap"></i><?php echo lang("industrialsimbiosis"); ?></a>
             </li>
                <li class="head-li"><?php echo lang("workingon"); ?>: <a href="<?php echo base_url('project/'.$this->session->userdata('project_id')); ?>"><?php echo $this->session->userdata('project_name'); ?></a>
             </li>
            
      </ul>
      <ul class="list-inline pull-right">
        <li><a href="<?php echo base_url('whatwedo'); ?>"><i class="fa fa-question-circle"></i><?php echo lang("whatwedo"); ?> </a></li>
        <li><a href="<?php echo base_url('functionalities'); ?>"><i class="fa fa-dashboard"></i><?php echo lang("functionalities"); ?> </a></li>
        <li><a href="<?php echo base_url('contactus'); ?>"><i class="fa fa-envelope"></i><?php echo lang("contactus"); ?> </a></li>
        <?php
          //print_r($this->session->userdata('user_in'));
          if ($this->session->userdata('user_in') !== FALSE):
            $tmp = $this->session->userdata('user_in');
        ?>
          <li class="head-li"><a href="<?php echo base_url('user/'.$tmp['username']); ?>" style="text-transform: capitalize;"><i class="fa fa-user"></i>
 <?php echo $tmp['username']; ?></a></li>
          <li class="head-li"><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out"></i>
 <?php echo lang("logout"); ?></a></li>
        <?php else: ?>
          <li class="head-li"><a href="<?php echo base_url('login'); ?>"><i class="fa fa-sign-in"></i>
 Login</a></li>
          <li class="head-li"><a href="<?php echo base_url('register'); ?>">Register</a></li>
        <?php endif ?>
      </ul>
      <div class="clearfix"></div>
      </div>
      
   

  
  <!--<script src="<?php echo asset_url('js/flatui-fileinput.js'); ?>"></script>
    <script src="<?php echo asset_url('js/bootstrap-select.js'); ?>"></script>
    <script src="<?php echo asset_url('js/bootstrap-switch.js'); ?>"></script>
    <script src="<?php echo asset_url('js/flatui-checkbox.js'); ?>"></script>
    <script src="<?php echo asset_url('js/flatui-radio.js'); ?>"></script>
    <script src="<?php echo asset_url('js/jquery.tagsinput.js'); ?>"></script>
    <script src="<?php echo asset_url('js/jquery.placeholder.js'); ?>"></script>
    <script src="<?php echo asset_url('js/holder.js'); ?>"></script>
    <script src="<?php echo asset_url('js/application.js'); ?>"></script>-->
    

