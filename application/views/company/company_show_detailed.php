<?php echo $map['js']; ?>
<div class="container">
	<div class="row">
			<div class="col-md-4">
			<div style="margin-bottom:10px;">
				<?php if($companies['logo'] == null)
						$companies['logo'] = '.jpg';
					if(file_exists("assets/company_pictures/".$companies['logo'])): ?>
					<img style="width:100%;" class="thumbnail" src="<?php echo asset_url('company_pictures/'.$companies['logo']);?>" />
				<?php else: ?>
					<img style="width:100%;" class="thumbnail" src="<?php echo asset_url("company_pictures/default.jpg"); ?>">
				<?php endif ?>
			</div>

			<?php if($this->session->userdata('user_in')['id']): ?>
				<?php if($canEdit=='1'): ?>
					<a class="btn btn-inverse btn-block" style="margin-bottom: 10px;" href="<?php echo base_url("new_flow/".$companies['id']); ?>"><i class="fa fa-database"></i> <?php echo lang("editcompanydata"); ?></a>
					<a class="btn btn-inverse btn-block" style="margin-bottom: 10px;" href="<?php echo base_url("update_company/".$companies['id']); ?>"><i class="fa fa-pencil-square-o"></i> <?php echo lang("editcompanyinfo"); ?></a>
					<button class="btn btn-block btn-inverse" style="width:100%; margin-bottom: 10px;" onclick="$('#target').toggle();">Add New User</button>

					<div id="target" class="well" style="display: none">
						<p>
							Here you can give other Users access to your Company. Select users to add. Added users will have full access to this company.
						</p>
						<div class="content">
							<p>
								<?php echo form_open('addUsertoCompany/'.$companies['id']); ?>
									<select id="users" class="info select-block" name="users">
									<?php foreach ($users_without_company as $users): ?>
										<option value="<?php echo $users['id']; ?>"><?php echo $users['name'].' '.$users['surname']; ?></option>
										<?php endforeach ?>
									</select>
									<button type="submit" class="btn btn-primary">Add Users</button>
								</form>
							</p>
						</div>
					</div>
				<?php endif ?>
			<?php endif ?>
			<div class="form-group" style="margin-bottom:20px;">
				<div class="swissheader" style="font-size:15px;"><?php echo lang("companyprojects"); ?></div>
				<ul class="nav nav-list">
				<?php foreach ($prjname as $prj): ?>
					<li><a style="text-transform:capitalize;" href="<?php echo base_url('project/'.$prj['proje_id']); ?>"> <?php echo $prj["name"]; ?></a></li>
				<?php endforeach ?>
				</ul>
			</div>

			<div class="form-group">
				<div class="swissheader" style="font-size:15px;"><?php echo lang("companyusers"); ?></div>
				<ul class="nav nav-list">
				<?php foreach ($cmpnyperson as $cmpprsn): ?>
					<li><a style="text-transform:capitalize;" href="<?php echo base_url('user/'.$cmpprsn["user_name"]); ?>"> <?php echo $cmpprsn["name"].' '.$cmpprsn["surname"]; ?></a></li>
					<a href="<?php echo base_url("removeUserfromCompany/".$companies['id']."/".$cmpprsn['id']); ?>"><i class="fa fa-pencil-square-o"></i> remove</a>
				<?php endforeach ?>
				</ul>
			</div>
			<?php if($canDelete=='1'): ?>
				<a style="margin-top: 10px;" class="btn btn-danger btn-block" href="<?php echo base_url("deletecompany/".$companies['id']); ?>" onclick="return confirm('Are you sure you want to delete the company <?php echo $companies['name']; ?>? \r\n \r\nWarning: The company will be deleted permanently and cannot be restored!');"><i class="fa fa-trash" ></i> <?php echo lang("deletecompany"); ?></a>
			<?php endif ?>
		</div>
		<div class="col-md-8">
			<div class="swissheader"><?php echo $companies['name']; ?></div>

			<table class="table table-bordered">
				<tr>
					<td style="width:150px;">
					<?php echo lang("description"); ?>
					</td>
					<td>
					<?php echo $companies['description']; ?>
					</td>
				</tr>
				<tr>
					<td>
					<?php echo lang("email"); ?>
					</td>
					<td>
					<?php echo $companies['email']; ?>
					</td>
				</tr>
				<tr>
					<td>
					<?php echo lang("workphone"); ?>
					</td>
					<td>
					<?php echo $companies['phone_num_2']; ?>
					</td>
				</tr>
				<tr>
					<td>
					<?php echo lang("faxnumber"); ?>
					</td>
					<td>
					<?php echo $companies['fax_num']; ?>
					</td>
				</tr>
				<tr>
					<td>
					Nace Code
					</td>
					<td>
					<?php
							echo $nacecode['code'] . " - " . $nacecode['name'];
					?>
					</td>
				</tr>
				<tr>
					<td>
					<?php echo lang("address"); ?>
					</td>
					<td>
					<?php echo $companies['address']; ?>
					</td>
				</tr>
				<tr>
					<td>
					<?php echo lang("seeonmap"); ?>
					</td>
					<td>
					<?php echo $map['html']; ?>
					</td>
				</tr>
			</table>
			<?php if($have_permission): ?>
			<?php if($valid != 0): ?>

				<table class="table table-bordered">
					<tr class="success">
						<th colspan="7"><?php echo lang("companyflows"); ?></th>
					</tr>
					<tr>
						<th><?php echo lang("name"); ?></th>
						<th><?php echo lang("flowtype"); ?></th>
						<th colspan="2" style="text-align: center;"><?php echo lang("quantity"); ?></th>
						<th colspan="2" style="text-align: center;"><?php echo lang("cost"); ?></th>
						<th style="text-align: center;"><?php echo lang("ep"); ?></th>
					</tr>
					<?php foreach ($company_flows as $flows): ?>
						<tr>
							<td><?php echo $flows['flowname']; ?></td>
							<td><?php echo $flows['flowtype']; ?></td>
							<td class="table-numbers"><?php echo number_format($flows['qntty'], 0, ".", "'"); ?></td>
							<td class="table-units"><?php echo $flows['qntty_unit_name']; ?></td>
							<td class="table-numbers"><?php echo number_format($flows['cost'], 0, ".", "'"); ?></td>
							<td class="table-units"><?php echo $flows['cost_unit']; ?></td>
							<td style="text-align: right"><?php echo number_format($flows['ep'], 0, ".", "'"); ?></td>
						</tr>
					<?php endforeach ?>
				</table>

				<table class="table table-bordered">
					<tr class="success">
						<th colspan="3"><?php echo lang("companyprocess"); ?></th>
					</tr>
					<tr>
						<th><?php echo lang("name"); ?></th>
						<th><?php echo lang("flowname"); ?></th>
						<th><?php echo lang("flowtype"); ?></th>
					</tr>
					<?php foreach ($company_prcss as $prcss): ?>
						<tr>
							<td><?php echo $prcss['prcessname']; ?></td>
							<td><?php echo $prcss['flowname']; ?></td>
							<td><?php echo $prcss['flow_type_name']?></td>
						</tr>
					<?php endforeach ?>
				</table>

				<table class="table table-bordered">
					<tr class="success">
						<th colspan="2"><?php echo lang("companycomponents"); ?></th>
					</tr>
					<tr>
						<th><?php echo lang("flowname"); ?></th>
						<th><?php echo lang("name"); ?></th>
					</tr>
					<?php foreach ($company_component as $cmpnnt): ?>
						<tr>
							<td><?php echo $cmpnnt['flow_name']; ?></td>
							<td><?php echo $cmpnnt['component_name']; ?></td>
						</tr>
					<?php endforeach ?>
				</table>

				<table class="table table-bordered">
					<tr class="success">
						<th><?php echo lang("companyproducts"); ?></th>
					</tr>
					<tr>
						<th><?php echo lang("name"); ?></th>
					</tr>
					<?php foreach ($company_product as $prdct): ?>
						<tr>
							<td><?php echo $prdct['name']; ?></td>
						</tr>
					<?php endforeach ?>
				</table>
			<?php endif ?>
		<?php endif ?>
		</div>
	</div>
</div>
