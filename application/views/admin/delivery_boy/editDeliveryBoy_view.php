<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
		      <h1>
		        <?= $this->lang->line('site_common/edit')." ".$this->lang->line('sidebar_admin/delivery_boy');?>
		        <!-- <small>Preview</small> -->
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> <?=$this->lang->line('sidebar_admin/dashboard');?></a></li>
		        <li><a href="<?=site_url('admin/delivery_boy');?>"><i class="fa fa-gift"></i> <?=$this->lang->line('sidebar_admin/delivery_boy');?></a></li>
		        <li class="active"><?=$this->lang->line('site_common/edit')." ".$this->lang->line('sidebar_admin/delivery_boy');?></li>
		      </ol>
		    </section>
		    <!-- Main content -->
			<section class="content">
		      <div class="row">
		        <!-- right column -->
		        <div class="col-md-8">
		          
		          <!-- general form elements disabled -->
		          <div class="box box-warning">
		          	<form role="form" action="<?= site_url('admin/delivery_boy/edit_delivery_boy'); ?>" method="post">
		            <div class="box-header with-border">
		              <h3 class="box-title"><?=$this->lang->line('sidebar_admin/delivery_boy')."&nbsp;".$this->lang->line('site_common/edit');?></h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		              	<div class="form-group <?= form_error('VendorID') ? 'has-error' : '' ?>">
			                <label for="vendor_id"><?=$this->lang->line('site_common/select')." ".$this->lang->line('sidebar_admin/vendor');?></label>
			                <select class="form-control select2" name="VendorID" id="vendor_id">
			                  	<!-- <option selected="selected">Alabama</option> -->
			                  	<option value=""><?=$this->lang->line('site_common/select')." ".$this->lang->line('sidebar_admin/vendor');?></option>
			                  	<option>Grocery</option>
			                  	<option>Mahaveer General Store</option>
			                  	<option>Anil Trading Company</option>
			                  	<option>Mehta Broders</option>
			                  	<option>Nalwaya & Sons</option>
			                </select>
			                <span class="help-block"><?= form_error('VendorID');?></span>
		              	</div>
	                	<div class="form-group <?= form_error('FirstName') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="first_name"><?=$this->lang->line('delivery_boy_admin/first_name');?></label>
		                  <input type="text" class="form-control" name="FirstName" id="first_name" placeholder="<?=$this->lang->line('delivery_boy_admin/first_name_placeholder');?>" value="<?php echo set_value('FirstName'); ?>">
		                  <span class="help-block"><?= form_error('FirstName');?></span>
		                </div>

	                	<div class="form-group <?= form_error('LastName') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="last_name"><?=$this->lang->line('delivery_boy_admin/last_name');?></label>
		                  <input type="text" class="form-control" name="LastName" id="last_name" placeholder="<?=$this->lang->line('delivery_boy_admin/last_name_placeholder');?>" value="<?php echo set_value('LastName'); ?>">
		                  <span class="help-block"><?= form_error('LastName');?></span>
		                </div>
	                	

	                	<div class="form-group <?= form_error('DOB') ? 'has-error' : '' ?>">
			                <label for="dob"><?=$this->lang->line('delivery_boy_admin/dob');?></label>
			                <div class="input-group date">
			                  <div class="input-group-addon">
			                    <i class="fa fa-calendar"></i>
			                  </div>
			                  <input type="text" class="form-control pull-right" name="DOB" id="dob" placeholder="<?=$this->lang->line('delivery_boy_admin/date_label');?>">
			                </div>
			                <span class="help-block"><?= form_error('DOB'); ?></span>
			                <!-- /.input group -->
		              	</div>

		              	<div class="form-group <?= form_error('Gender') ? 'has-error' : '' ?>">
		                	  <label class="control-label" for="Gender"><?=$this->lang->line('delivery_boy_admin/gender');?></label>
			                  <div class="radio">
			                    <label>
			                      <input type="radio" name="Gender" id="male" value="1" >
			                      <?=$this->lang->line('delivery_boy_admin/male');?>
			                    </label>
			                    <label>
			                      <input type="radio" name="Gender" id="female" value="0">
			                      <?=$this->lang->line('delivery_boy_admin/female');?>
			                    </label>
			                  </div>
			                  <span class="help-block"><?= form_error('Gender'); ?></span>
		                </div>
		                <!-- text input -->
		                
	                	<div class="form-group <?= form_error('Email') ? 'has-error' : '' ?>">
			                  <label class="control-label" for="email"><?=$this->lang->line('delivery_boy_admin/email');?></label>
			                  <input type="text" class="form-control" name="Email" id="email" placeholder="<?=$this->lang->line('delivery_boy_admin/email_placeholder');?>" value="<?php echo set_value('Email'); ?>">
			                  <span class="help-block"><?= form_error('Email');?></span>
		                </div>
	                
	                	<div class="form-group <?= form_error('Mobile') ? 'has-error' : '' ?>">
			                  <label class="control-label" for="mobile_no"><?=$this->lang->line('delivery_boy_admin/mobile_no');?></label>
			                  <input type="text" class="form-control" name="Mobile" id="mobile_no" placeholder="<?=$this->lang->line('delivery_boy_admin/mobile_no_placeholder');?>" value="<?php echo set_value('Mobile'); ?>">
			                  <span class="help-block"><?= form_error('Mobile'); ?></span>
		                </div>
			            
	            		<div class="form-group <?= form_error('Password') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="password"><?=$this->lang->line('delivery_boy_admin/password');?></label>
		                  <input type="password" class="form-control" name="Password" id="password" placeholder="<?=$this->lang->line('delivery_boy_admin/password_placeholder');?>" value="<?php echo set_value('Password'); ?>">
		                  <span class="help-block"><?= form_error('Password');?></span>
		                </div>	
	            	
	            		<div class="form-group <?= form_error('ConfirmPass') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="confirm_pass"><?=$this->lang->line('delivery_boy_admin/confirm_password');?></label>
		                  <input type="password" class="form-control" name="ConfirmPass" id="confirm_pass" placeholder="<?=$this->lang->line('delivery_boy_admin/confirm_password_placeholder');?>" value="<?php echo set_value('ConfirmPass'); ?>">
		                  <span class="help-block"><?= form_error('ConfirmPass');?></span>
		                </div>	
			              
						<!-- textarea -->
		                
                		<div class="form-group <?= form_error('Address') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="address"><?=$this->lang->line('delivery_boy_admin/address');?></label>
		                  <textarea class="form-control" rows="3" name="Address" id="address" placeholder="<?=$this->lang->line('delivery_boy_admin/address_placeholder');?>" ><?php echo set_value('Address'); ?></textarea>
		                  <span class="help-block"><?= form_error('Address'); ?></span>
		                </div>
		                	
                		<div class="form-group <?= form_error('LadmarkAdd') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="landmark_add"><?=$this->lang->line('delivery_boy_admin/landmark_address');?></label>
		                  <input type="text" class="form-control" name="LadmarkAdd" id="landmark_add" placeholder="<?=$this->lang->line('delivery_boy_admin/landmark_address_placeholder');?>" value="<?php echo set_value('LadmarkAdd'); ?>">
		                  <span class="help-block"><?= form_error('LadmarkAdd');?></span>
		                </div>
		                	
                		<div class="form-group <?= form_error('Country') ? 'has-error' : '' ?>">
                			<label class="control-label" for="country_name"><?=$this->lang->line('delivery_boy_admin/country');?></label>
                			<input type="text" class="form-control" name="Country" id="country_name" placeholder="<?=$this->lang->line('delivery_boy_admin/country_placeholder');?>" value="<?php echo set_value('Country');?>">
                			<span class="help-block"><?= form_error('Country');?></span>
                		</div>
                
                		<div class="form-group <?= form_error('State') ? 'has-error' : '' ?>">
                			<label class="control-label" for="state_name"><?=$this->lang->line('delivery_boy_admin/state');?></label>
                			<input type="text" class="form-control" name="State" id="state_name" placeholder="<?=$this->lang->line('delivery_boy_admin/state_placeholder');?>" value="<?php echo set_value('State');?>">
                			<span class="help-block"><?= form_error('State');?></span>
                		</div>
		                
                		<div class="form-group <?= form_error('City') ? 'has-error' : '' ?>">
                			<label class="control-label" for="city_name"><?=$this->lang->line('delivery_boy_admin/city');?></label>
                			<input type="text" class="form-control" name="City" id="city_name" placeholder="<?=$this->lang->line('delivery_boy_admin/city_placeholder');?>" value="<?php echo set_value('City');?>">
                			<span class="help-block"><?= form_error('City');?></span>
                		</div>
                
                		<div class="form-group <?= form_error('pincode') ? 'has-error' : '' ?>">
                			<label class="control-label" for="pincode"><?=$this->lang->line('delivery_boy_admin/pincode');?></label>
                			<input type="text" class="form-control" name="pincode" id="pincode" placeholder="<?=$this->lang->line('delivery_boy_admin/pincode_placeholder');?>" value="<?php echo set_value('pincode');?>">
                			<span class="help-block"><?= form_error('pincode');?></span>
                		</div>
		                
		                <div class="row">
		                	<div class="col-md-6">
				                <div class="form-group <?= form_error('ProfilePic') ? 'has-error' : '' ?>">
				                  	<label for="profile_pic"><?=$this->lang->line('delivery_boy_admin/profile_pic_label');?></label>
				                 	<input type="file" name="ProfilePic" id="profile_pic">

				                  	<span class="help-block"><?= form_error('ProfilePic')?></span>
				                </div>
				            </div>
		            	</div>

		            	<div class="form-group <?= form_error('IdNumber') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="id_number"><?=$this->lang->line('delivery_boy_admin/id_card_no_label');?></label>
		                  <input type="text" class="form-control" name="IdNumber" id="id_number" placeholder="<?=$this->lang->line('delivery_boy_admin/id_card_no_placeholder');?>" value="<?php echo set_value('IdNumber'); ?>">
		                  <span class="help-block"><?= form_error('IdNumber');?></span>
		                </div>

		            	<div class="row">
		                	<div class="col-md-6">
				                <div class="form-group <?= form_error('IDProofImg') ? 'has-error' : '' ?>">
				                  	<label for="id_proof_img"><?=$this->lang->line('site_common/upload')." ".$this->lang->line('delivery_boy_admin/id_proof_img_label');?></label>
				                 	<input type="file" name="IDProofImg" id="id_proof_img">

				                  	<span class="help-block"><?= form_error('IDProofImg')?></span>
				                </div>
				            </div>
		            	</div>


		            	<div class="form-group <?= form_error('DrivingLicNo') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="driving_lic_no"><?=$this->lang->line('delivery_boy_admin/driving_licence_no_label');?></label>
		                  <input type="text" class="form-control" name="DrivingLicNo" id="driving_lic_no" placeholder="<?=$this->lang->line('delivery_boy_admin/driving_licence_no_placeholder');?>" value="<?php echo set_value('DrivingLicNo'); ?>">
		                  <span class="help-block"><?= form_error('DrivingLicNo');?></span>
		                </div>

		                <div class="form-group <?= form_error('DrivingLicExpDate') ? 'has-error' : '' ?>">
			                <label for="driving_lic_exp_date"><?=$this->lang->line('delivery_boy_admin/licence_exp_date_label');?></label>
			                <div class="input-group date">
			                  <div class="input-group-addon">
			                    <i class="fa fa-calendar"></i>
			                  </div>
			                  <input type="text" class="form-control pull-right" name="DrivingLicExpDate" id="driving_lic_exp_date" placeholder="<?=$this->lang->line('delivery_boy_admin/date_label');?>">
			                </div>
			                <span class="help-block"><?= form_error('DrivingLicExpDate'); ?></span>
			                <!-- /.input group -->
		              	</div>

		            	<!-- radio -->
		                <div class="form-group <?= form_error('Status') ? 'has-error' : '' ?>">
		                	  <label class="control-label" for="delivery_boy_status"><?=$this->lang->line('sidebar_admin/delivery_boy')."&nbsp".$this->lang->line('site_common/status');?></label>
			                  <div class="input-group">
			                  		<label class="switch">
										<input type="checkbox" name="Status" id="delivery_boy_status">
										<div class="slider round">
											<span class="on">ON</span><span class="off">OFF</span>
										</div>
									</label>
			                  </div>
			                  <span class="help-block"><?= form_error('Status'); ?></span>
		                </div>

		            </div>
		            <!-- /.box-body -->
					<div class="box-footer">
						<button type="reset" class="btn btn-default"><?=$this->lang->line('site_common/reset');?></button>
						<button type="submit" class="btn btn-info pull-right"><?=$this->lang->line('site_common/update');?></button>
					</div>
					<!-- /.box-footer -->
					</form>
		          </div>
		          <!-- /.box -->
		        </div>
		        <!--/.col (right) -->
		      </div>
		      <!-- /.row -->
		    </section>
		</div>
	</div>	
</body>
</html>