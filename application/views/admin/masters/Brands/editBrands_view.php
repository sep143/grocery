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
		        <?= $this->lang->line('site_common/edit')." ".$this->lang->line('site_common/brand');?>
		        <!-- <small>Preview</small> -->
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> <?=$this->lang->line('sidebar_admin/dashboard');?></a></li>
		        <li><a href="<?=site_url('admin/brands');?>"><i class="fa fa-gift"></i> <?=$this->lang->line('sidebar_admin/brands');?></a></li>
		        <li class="active"><?=$this->lang->line('site_common/brand');?></li>
		      </ol>
		    </section>
		    <!-- Main content -->
			<section class="content">
		      <div class="row">
		        <!-- right column -->
		        <div class="col-md-8">
		          
		          <!-- general form elements disabled -->
		          <div class="box box-warning">
		          	<form role="form" action="<?= site_url('admin/brands/edit_brand'); ?>" method="post">
		            <div class="box-header with-border">
		              <h3 class="box-title"><?=$this->lang->line('site_common/brand')."&nbsp;".$this->lang->line('site_common/edit');?></h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		                <!-- text input -->
		                
		                <div class="form-group <?= form_error('brandName') ? 'has-error' : '' ?>">
							<label class="control-label" for="brand_name"><?=$this->lang->line('site_common/brand')."&nbsp".$this->lang->line('site_common/name');?></label>
							<input type="text" class="form-control" name="brandName" id="brand_name" placeholder="<?=$this->lang->line('masters_admin/brand_name_placeholder');?>" value="<?php echo set_value('brandName'); ?>">
							<span class="help-block"><?= form_error('brandName');?></span>
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