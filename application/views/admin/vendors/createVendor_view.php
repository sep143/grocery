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
		        <?= $this->lang->line('site_common/create')." ".$this->lang->line('site_common/new')." ".$this->lang->line('sidebar_admin/vendor');?>
		        <!-- <small>Preview</small> -->
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> <?=$this->lang->line('sidebar_admin/dashboard');?></a></li>
		        <li><a href="<?=site_url('admin/vendors');?>"><i class="fa fa-gift"></i> <?=$this->lang->line('sidebar_admin/vendors');?></a></li>
		        <li class="active"><?=$this->lang->line('sidebar_admin/vendor');?></li>
		      </ol>
		    </section>
		    <!-- Main content -->
			<section class="content">
		      <div class="row">
		        <!-- right column -->
		        <div class="col-md-8">
		          
		          <!-- general form elements disabled -->
		          <div class="box box-warning">
		          	<form role="form" action="<?= site_url('admin/vendors/create_vendor'); ?>" method="post">
		            <div class="box-header with-border">
		              <h3 class="box-title"><?=$this->lang->line('sidebar_admin/vendor')."&nbsp;".$this->lang->line('site_common/create');?></h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		              	
	                	<div class="form-group <?= form_error('VendorName') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="vendor_name"><?=$this->lang->line('vendor_admin/vendor_name');?></label>
		                  <input type="text" class="form-control" name="VendorName" id="vendor_name" placeholder="<?=$this->lang->line('vendor_admin/vendor_name_placeholder');?>" value="<?php echo set_value('VendorName'); ?>">
		                  <span class="help-block"><?= form_error('VendorName');?></span>
		                </div>
	                
	                	<div class="form-group <?= form_error('OwnerName') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="owner_name"><?=$this->lang->line('vendor_admin/owner_name');?></label>
		                  <input type="text" class="form-control" name="OwnerName" id="owner_name" placeholder="<?=$this->lang->line('vendor_admin/owner_name_placeholder');?>" value="<?php echo set_value('OwnerName'); ?>">
		                  <span class="help-block"><?= form_error('OwnerName');?></span>
		                </div>

		                <!-- text input -->
		                
	                	<div class="form-group <?= form_error('vendorEmail') ? 'has-error' : '' ?>">
			                  <label class="control-label" for="vendor_email"><?=$this->lang->line('vendor_admin/email');?></label>
			                  <input type="text" class="form-control" name="vendorEmail" id="vendor_email" placeholder="<?=$this->lang->line('vendor_admin/email_placeholder');?>" value="<?php echo set_value('vendorEmail'); ?>">
			                  <span class="help-block"><?= form_error('vendorEmail');?></span>
		                </div>
	                
	                	<div class="form-group <?= form_error('vendorMobile') ? 'has-error' : '' ?>">
			                  <label class="control-label" for="vendor_mobile"><?=$this->lang->line('vendor_admin/mobile_no');?></label>
			                  <input type="text" class="form-control" name="vendorMobile" id="vendor_mobile" placeholder="<?=$this->lang->line('vendor_admin/mobile_no_placeholder');?>" value="<?php echo set_value('vendorMobile'); ?>">
			                  <span class="help-block"><?= form_error('vendorMobile'); ?></span>
		                </div>
			            
		                <div class="form-group <?= form_error('vendorLandlineNo') ? 'has-error' : '' ?>">
			                  <label class="control-label" for="vendor_landline_no"><?=$this->lang->line('vendor_admin/landline_no');?></label>
			                  <input type="text" class="form-control" name="vendorLandlineNo" id="vendor_landline_no" placeholder="<?=$this->lang->line('vendor_admin/landline_no_placeholder');?>" value="<?php echo set_value('vendorLandlineNo'); ?>">
			                  <span class="help-block"><?= form_error('vendorLandlineNo'); ?></span>
		                </div>
			            
	            		<div class="form-group <?= form_error('vendorPassword') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="password"><?=$this->lang->line('vendor_admin/password');?></label>
		                  <input type="password" class="form-control" name="vendorPassword" id="password" placeholder="<?=$this->lang->line('vendor_admin/password_placeholder');?>" value="<?php echo set_value('vendorPassword'); ?>">
		                  <span class="help-block"><?= form_error('vendorPassword');?></span>
		                </div>	
	            	
	            		<div class="form-group <?= form_error('vendorConfirmPass') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="confirm_pass"><?=$this->lang->line('vendor_admin/confirm_password');?></label>
		                  <input type="password" class="form-control" name="vendorConfirmPass" id="confirm_pass" placeholder="<?=$this->lang->line('vendor_admin/confirm_password_placeholder');?>" value="<?php echo set_value('vendorConfirmPass'); ?>">
		                  <span class="help-block"><?= form_error('vendorConfirmPass');?></span>
		                </div>	
			              
						<!-- textarea -->
		                
                		<div class="form-group <?= form_error('vendorAddress') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="vendor_address"><?=$this->lang->line('vendor_admin/address');?></label>
		                  <textarea class="form-control" rows="3" name="vendorAddress" id="vendor_address" placeholder="<?=$this->lang->line('vendor_admin/address_placeholder');?>" ><?php echo set_value('vendorAddress'); ?></textarea>
		                  <span class="help-block"><?= form_error('vendorAddress'); ?></span>
		                </div>
		                	
                		<div class="form-group <?= form_error('vendorLadmarkAdd') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="landmark_add"><?=$this->lang->line('vendor_admin/landmark_address');?></label>
		                  <input type="text" class="form-control" name="vendorLadmarkAdd" id="landmark_add" placeholder="<?=$this->lang->line('vendor_admin/landmark_address_placeholder');?>" value="<?php echo set_value('vendorLadmarkAdd'); ?>">
		                  <span class="help-block"><?= form_error('vendorLadmarkAdd');?></span>
		                </div>
		                	
                		<div class="form-group <?= form_error('country') ? 'has-error' : '' ?>">
                			<label class="control-label" for="country"><?=$this->lang->line('vendor_admin/country');?></label>
                			<input type="text" class="form-control" name="country" id="country" placeholder="<?=$this->lang->line('vendor_admin/country_placeholder');?>" value="<?php echo set_value('country');?>">
                			<span class="help-block"><?= form_error('country');?></span>
                		</div>
                
                		<div class="form-group <?= form_error('state') ? 'has-error' : '' ?>">
                			<label class="control-label" for="state"><?=$this->lang->line('vendor_admin/state');?></label>
                			<input type="text" class="form-control" name="state" id="state" placeholder="<?=$this->lang->line('vendor_admin/state_placeholder');?>" value="<?php echo set_value('state');?>">
                			<span class="help-block"><?= form_error('state');?></span>
                		</div>
		                
                		<div class="form-group <?= form_error('city') ? 'has-error' : '' ?>">
                			<label class="control-label" for="city"><?=$this->lang->line('vendor_admin/city');?></label>
                			<input type="text" class="form-control" name="city" id="city" placeholder="<?=$this->lang->line('vendor_admin/city_placeholder');?>" value="<?php echo set_value('city');?>">
                			<span class="help-block"><?= form_error('city');?></span>
                		</div>
                
                		<div class="form-group <?= form_error('pincode') ? 'has-error' : '' ?>">
                			<label class="control-label" for="pincode"><?=$this->lang->line('vendor_admin/pincode');?></label>
                			<input type="text" class="form-control" name="pincode" id="pincode" placeholder="<?=$this->lang->line('vendor_admin/pincode_placeholder');?>" value="<?php echo set_value('pincode');?>">
                			<span class="help-block"><?= form_error('pincode');?></span>
                		</div>
		                
		                <div class="row">
		                	<div class="col-md-6">
				                <div class="form-group <?= form_error('profilePic') ? 'has-error' : '' ?>">
				                  	<label for="profile_pic"><?=$this->lang->line('vendor_admin/profile_pic_label');?></label>
				                 	<input type="file" name="profilePic" id="profile_pic">

				                  	<span class="help-block"><?= form_error('profilePic')?></span>
				                </div>
				            </div>
				            <div class="col-md-6">
				                <div class="form-group <?= form_error('profileCoverPic') ? 'has-error' : '' ?>">
				                  	<label for="profile_cover_pic"><?=$this->lang->line('vendor_admin/profile_cover_pic_label');?></label>
				                 	<input type="file" name="profileCoverPic" id="profile_cover_pic">
				                  	<span class="help-block"><?= form_error('profileCoverPic')?></span>
				                </div>
				            </div>    
		            	</div>

		            	<!-- radio -->
		                <div class="form-group <?= form_error('vendorStatus') ? 'has-error' : '' ?>">
		                	  <label class="control-label" for="vendorStatus"><?=$this->lang->line('sidebar_admin/vendor')."&nbsp".$this->lang->line('site_common/status');?></label>
			                  <div class="input-group">
			                  		<label class="switch">
										<input type="checkbox" name="vendorStatus" id="togBtn">
										<div class="slider round">
											<span class="on">ON</span><span class="off">OFF</span>
										</div>
									</label>
			                  </div>
			                  <span class="help-block"><?= form_error('vendorStatus'); ?></span>
		                </div>

		            </div>
		            <!-- /.box-body -->
					<div class="box-footer">
						<button type="reset" class="btn btn-default"><?=$this->lang->line('site_common/reset');?></button>
						<button type="submit" class="btn btn-info pull-right"><?=$this->lang->line('site_common/create');?></button>
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