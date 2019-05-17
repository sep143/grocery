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
		        <?= $this->lang->line('site_common/edit')." ".$this->lang->line('site_common/new')." ".$this->lang->line('site_common/category');?>
		        <!-- <small>Preview</small> -->
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> <?=$this->lang->line('sidebar_admin/dashboard');?></a></li>
		        <li><a href="<?=site_url('admin/category');?>"><i class="fa fa-gift"></i> <?=$this->lang->line('sidebar_admin/category');?></a></li>
		        <li class="active"><?=$this->lang->line('site_common/category');?></li>
		      </ol>
		    </section>
		    <!-- Main content -->
			<section class="content">
		      <div class="row">
		        <!-- right column -->
		        <div class="col-md-8">
		          
		          <!-- general form elements disabled -->
		          <div class="box box-warning">
		          	<form role="form" action="<?= site_url('admin/category/edit_category'); ?>" method="post">
		            <div class="box-header with-border">
		              <h3 class="box-title"><?=$this->lang->line('site_common/category')."&nbsp;".$this->lang->line('site_common/edit');?></h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		                <!-- text input -->
		                
		                <div class="form-group <?= form_error('categoryName') ? 'has-error' : '' ?>">
							<label class="control-label" for="category_name"><?=$this->lang->line('site_common/category')."&nbsp".$this->lang->line('site_common/name');?></label>
							<input type="text" class="form-control" name="categoryName" id="category_name" placeholder="<?=$this->lang->line('masters_admin/category_name_placeholder');?>" value="<?php echo set_value('categoryName'); ?>">
							<span class="help-block"><?= form_error('categoryName');?></span>
		                </div>

		                <!-- textarea -->
		                <div class="form-group <?= form_error('categoryDescription') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="category_description_id"><?=$this->lang->line('site_common/description');?></label>
		                  <textarea class="form-control" rows="3" name="categoryDescription" id="category_description_id" placeholder="<?=$this->lang->line('masters_admin/category_description_placeholder');?>" ><?php echo set_value('categoryDescription'); ?></textarea>
		                  <span class="help-block"><?= form_error('categoryDescription'); ?></span>
		                </div>
		                <!-- Image Picker -->
		                <div class="form-group <?= form_error('categoryImage') ? 'has-error' : '' ?>">
		                  	<label for="category_image"><?=$this->lang->line('site_common/category')." ".$this->lang->line('site_common/image');?></label>
		                 	<input type="file" name="categoryImage" id="category_image">

		                  	<span class="help-block"><?= form_error('categoryImage')?></span>
		                </div>
		                <div class="form-group <?= form_error('categoryStatus');?>">
		                	<label for="category_status"><?=$this->lang->line('site_common/category')." ".$this->lang->line('site_common/status');?></label>
		                	<div class="input-group">
			                	<label class="switch">
									<input type="checkbox" name="categoryStatus" id="category_status">
									<div class="slider round">
										<span class="on">ON</span><span class="off">OFF</span>
									</div>
								</label>
							</div>	
							<span class="help-block"><?= form_error('categoryStatus')?></span>
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