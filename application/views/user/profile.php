<div class="container">
	<div class="row">
		<div class="col-md-4">
			<?php if(file_exists("assets/user_pictures/".$userInfo['photo'])): ?>
					<img class="img-responsive thumbnail" style="width: 100%" src="<?php echo asset_url("user_pictures/".$userInfo['photo']); ?>">
				<?php else: ?>
					<img class="img-responsive thumbnail" style="width: 100%" src="<?php echo asset_url("user_pictures/default.jpg"); ?>">
			<?php endif ?>
			<div style="margin-top: 10px;">
				<?php  if($userInfo['id']==$this->session->userdata('user_in')['id']): ?>
		  	<a class="btn btn-inverse btn-block" style="margin-bottom: 10px;" href="<?php echo base_url("profile_update"); ?>"><?php echo lang("updateprofile"); ?></a>
		  	<a class="btn btn-inverse btn-block" style="margin-bottom: 10px;" href="<?php echo base_url('send_email_for_change_pass'); ?>" style="text-transform: capitalize;"><?php echo lang("changepassword"); ?></a>
		  	<?php endif ?>
		  	<?php if(($userInfo['role_id']=='2') && $this->session->userdata('user_in')['id'] == $userInfo['id']): ?>
		  	<a class="btn btn-success btn-block" href="<?php echo base_url("become_consultant"); ?>"><?php echo lang("becomeconsultant"); ?></a>
		  	<?php endif ?>
		  	<?php if($userInfo['role_id']=="1"): ?>
		  	<div class="btn btn-success btn-block" style="cursor: default;"><?php echo lang("thisisconsultant"); ?></div>
		  	<?php endif ?>
		  </div>
		</div>
		<div class="col-md-8">
			<div class="swissheader"><?php echo $userInfo["name"].' '.$userInfo["surname"]; ?></div>
			<table class="table table-striped table-bordered">
				<tr>
					<td style="width:120px;">
					<?php echo lang("description"); ?>
					</td>
					<td>
						<div><?php echo $userInfo['title']; ?></div>
						<div><?php echo $userInfo['description']; ?></div>
					</td>
				</tr>
				<tr>
					<td>
					<?php echo lang("email"); ?>
					</td>
					<td>
					<?php echo $userInfo['email']; ?>
					</td>
				</tr>
				<tr>
					<td>
					<?php echo lang("cellphone"); ?>
					</td>
					<td>
					<?php echo $userInfo['phone_num_1']; ?>
					</td>
				</tr>
				<tr>
					<td>
					<?php echo lang("workphone"); ?>
					</td>
					<td>
					<?php echo $userInfo['phone_num_2']; ?>
					</td>
				</tr>
				<tr>
					<td>
					<?php echo lang("faxnumber"); ?>
					</td>
					<td>
					<?php echo $userInfo['fax_num']; ?>
					</td>
				</tr>
			</table>
			<div class="row">
				<div class="col-md-6">
					<?php if($userInfo['role_id']==1): ?>
					<div class="swissheader" style="font-size:15px;"><?php echo lang("projectsasconsultant"); ?></div>
					<ul class="nav nav-list">
					<?php foreach ($projectsAsConsultant as $prj): ?>
							<li><a style="text-transform:capitalize;" href="<?php echo base_url('project/'.$prj["proje_id"]) ?>"><?php echo $prj["name"] ?></a></li>
					<?php endforeach ?>
					</ul>
					<?php endif ?>
				</div>
				<div class="col-md-6">
					<div class="swissheader" style="font-size:15px;"><?php echo lang("projectsasuser"); ?></div>
					<ul class="nav nav-list">
						<?php foreach ($projectsAsWorker as $prj): ?>
						<li><a style="text-transform:capitalize;" href="<?php echo base_url('project/'.$prj["proje_id"]) ?>"><?php echo $prj["name"] ?></a></li>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>
