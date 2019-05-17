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
		        <?= $this->lang->line('sidebar_admin/delivery_boy')." ".$this->lang->line('site_common/list');?>
		        <!-- <small>Preview</small> -->
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> <?=$this->lang->line('sidebar_admin/dashboard');?></a></li>
		        <li class="active"><i class="fa fa-gift"></i> <?=$this->lang->line('sidebar_admin/delivery_boy');?></li>
		      </ol>
		    </section>

			<!-- Main content -->
		    <section class="content">
		        <div class="row">
		        	<div class="col-xs-12">
		        		<div class="box">
				            <div class="box-header">
				              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
				              <a class="btn btn-success" href="<?=site_url('admin/delivery_boy/create');?>"><i class="fa fa-plus"></i> <?=$this->lang->line('site_common/add')." ".$this->lang->line('sidebar_admin/delivery_boy');?></a>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				              	<table id="deliveryBoyListTable" class="table table-bordered table-striped align-middle">
					                <thead>
						                <tr>
											<th><?="#".$this->lang->line('site_common/id');?></th>
											<th><?=$this->lang->line('sidebar_admin/delivery')." ".$this->lang->line('site_common/image');?></th>
											<th><?=$this->lang->line('site_common/name');?></th>
											<th><?=$this->lang->line('sidebar_admin/vendor')." ".$this->lang->line('site_common/name');?></th>
											<th><?=$this->lang->line('site_common/email');?></th>
											<th><?=$this->lang->line('delivery_boy_admin/mobile_no');?></th>
											<th><?=$this->lang->line('site_common/kyc_status');?></th>
											<th><?=$this->lang->line('site_common/status');?></th>
											<th><?=$this->lang->line('site_common/action');?></th>
						                </tr>
					                </thead>
					                <tbody>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/vendors/img_avatar.png');?>"></td>
						                  <td>Ramesh Lalwani</td>
						                  <td>Grocery</td>
						                  <td>demo@gmail.com</td>
						                  <td>9898989898</td>
						                  <td>
						                  		<span class="label label-success"><?=$this->lang->line('site_common/complete');?></span>
						                  </td>
						                  <td>
												<label class="switch">
													<input type="checkbox" id="togBtn">
													<div class="slider round">
														<span class="on"><?=$this->lang->line('site_common/on')?></span>
														<span class="off"><?=$this->lang->line('site_common/off')?></span>
													</div>
												</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app act-btn" href="<?=site_url('admin/delivery_boy/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app act-btn"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/vendors/img_avatar.png');?>"></td>
						                  <td>Tej Bahadur Singh</td>
						                  <td>Mahaveer Kirana Store</td>
						                  <td>demo@gmail.com</td>
						                  <td>9898989898</td>
						                  <td>
						                  		<span class="label label-success"><?=$this->lang->line('site_common/complete');?></span>
						                  </td>
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app act-btn" href="<?=site_url('admin/delivery_boy/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app act-btn"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/vendors/img_avatar.png');?>"></td>
						                  <td>Rajesh Mali</td>
						                  <td>Market Hub</td>
						                  <td>demo@gmail.com</td>
						                  <td>9898989898</td>
						                  <td>
						                  		<span class="label label-warning"><?=$this->lang->line('site_common/pending');?></span>
						                  </td>
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app act-btn" href="<?=site_url('admin/delivery_boy/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app act-btn"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/vendors/img_avatar.png');?>"></td>
						                  <td>Abhishek Chawala</td>
						                  <td>Grocery</td>
						                  <td>demo@gmail.com</td>
						                  <td>9898989898</td>
						                  <td>
						                  		<span class="label label-success"><?=$this->lang->line('site_common/complete');?></span>
						                  </td>
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app act-btn" href="<?=site_url('admin/delivery_boy/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app act-btn"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/vendors/img_avatar.png');?>"></td>
						                  <td>Punit Agrawal</td>
						                  <td>Anil Traders</td>
						                  <td>demo@gmail.com</td>
						                  <td>9898989898</td>
						                  <td>
						                  		<span class="label label-warning"><?=$this->lang->line('site_common/pending');?></span>
						                  </td>
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app act-btn" href="<?=site_url('admin/delivery_boy/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app act-btn"><i class="fa fa-trash"></i> Delete</a>
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