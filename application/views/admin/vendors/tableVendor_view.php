<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
		      <h1>
		        <?= $this->lang->line('sidebar_admin/vendors')." ".$this->lang->line('site_common/list');?>
		        <!-- <small>Preview</small> -->
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> <?=$this->lang->line('sidebar_admin/dashboard');?></a></li>
		        <li class="active"><i class="fa fa-gift"></i> <?=$this->lang->line('sidebar_admin/vendors');?></li>
		      </ol>
		    </section>

			<!-- Main content -->
		    <section class="content">
		        <div class="row">
		        	<div class="col-xs-12">
		        		<div class="box">
				            <div class="box-header">
				              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
				              <a class="btn btn-success" href="<?=site_url('admin/vendors/create');?>"><i class="fa fa-plus"></i> <?=$this->lang->line('site_common/add')." ".$this->lang->line('sidebar_admin/vendor');?></a>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				              	<table id="vendorListTable" class="table table-bordered table-striped">
					                <thead>
						                <tr>
											<th><?="#".$this->lang->line('site_common/id');?></th>
											<th><?=$this->lang->line('sidebar_admin/vendor')." ".$this->lang->line('site_common/image');?></th>
											<th><?=$this->lang->line('site_common/first_name');?></th>
											<th><?=$this->lang->line('site_common/last_name');?></th>
											<th><?=$this->lang->line('site_common/email');?></th>
											<th><?=$this->lang->line('site_common/status');?></th>
											<th><?=$this->lang->line('site_common/action');?></th>
						                </tr>
					                </thead>
					                <tbody>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/vendors/img_avatar.png');?>"></td>
						                  <td>Rice
						                  </td>
						                  <td>Win 95+</td>
						                  <td>demo@gmail.com</td>
						                  <td>
						                  	<!-- <label class="switch">
											  	<input type="checkbox">
											  	<span class="slider round"></span>
											</label> -->

												<label class="switch">
													<input type="checkbox" id="togBtn">
													<div class="slider round">
														<span class="on">ON</span><span class="off">OFF</span>
													</div>
												</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/vendors/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/vendors/img_avatar.png');?>"></td>
						                  <td>Internet
						                    Explorer 5.0
						                  </td>
						                  <td>Win 95+</td>
						                  <td>demo@gmail.com</td>
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/vendors/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/vendors/img_avatar.png');?>"></td>
						                  <td>Internet
						                    Explorer 5.5
						                  </td>
						                  <td>Win 95+</td>
						                  <td>demo@gmail.com</td>
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/vendors/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/vendors/img_avatar.png');?>"></td>
						                  <td>Internet
						                    Explorer 6
						                  </td>
						                  <td>Win 98+</td>
						                  <td>demo@gmail.com</td>
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/vendors/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/vendors/img_avatar.png');?>"></td>
						                  <td>Internet Explorer 7</td>
						                  <td>Win XP SP2+</td>
						                  <td>demo@gmail.com</td>
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/vendors/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
					                </tbody>
				              	</table>
				            </div>
				            <!-- /.box-body -->
				        </div>
		        	</div>
		        </div>
		    </section>
		</div>    
	</div>
</body>
</html>