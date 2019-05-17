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
		        <?= $this->lang->line('site_common/items')." ".$this->lang->line('site_common/list');?>
		        <!-- <small>Preview</small> -->
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> <?=$this->lang->line('sidebar_admin/dashboard');?></a></li>
		        <li class="active"><i class="fa fa-gift"></i> <?=$this->lang->line('sidebar_admin/items');?></li>
		      </ol>
		    </section>

			<!-- Main content -->
		    <section class="content">
		        <div class="row">
		        	<div class="col-xs-12">
		        		<div class="box">
				            <div class="box-header">
				              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
				              <a class="btn btn-success" href="<?=site_url('admin/item/create');?>"><i class="fa fa-plus"></i> <?=$this->lang->line('site_common/add')." ".$this->lang->line('site_common/item');?></a>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				              	<table id="itemListTable" class="table table-bordered table-striped">
					                <thead>
						                <tr>
											<th><?="#".$this->lang->line('site_common/id');?></th>
											<th><?=$this->lang->line('site_common/item')." ".$this->lang->line('site_common/image');?></th>
											<th><?=$this->lang->line('site_common/item')." ".$this->lang->line('site_common/name');?></th>
											<th><?=$this->lang->line('site_common/quantity');?></th>
											<th><?=$this->lang->line('site_common/price');?></th>
											<th><?=$this->lang->line('site_common/status');?></th>
											<th><?=$this->lang->line('site_common/action');?></th>
						                </tr>
					                </thead>
					                <tbody>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/item-img/abc.jpg');?>"></td>
						                  <td>Rice
						                  </td>
						                  <td>Win 95+</td>
						                  <td> 4</td>
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
						                  	<a class="btn btn-app" href="<?=site_url('admin/item/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/item-img/abc.jpg');?>"></td>
						                  <td>Internet
						                    Explorer 5.0
						                  </td>
						                  <td>Win 95+</td>
						                  <td>5</td>
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/item/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/item-img/abc.jpg');?>"></td>
						                  <td>Internet
						                    Explorer 5.5
						                  </td>
						                  <td>Win 95+</td>
						                  <td>5.5</td>
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/item/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/item-img/abc.jpg');?>"></td>
						                  <td>Internet
						                    Explorer 6
						                  </td>
						                  <td>Win 98+</td>
						                  <td>6</td>
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/item/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/item-img/abc.jpg');?>"></td>
						                  <td>Internet Explorer 7</td>
						                  <td>Win XP SP2+</td>
						                  <td>7</td>
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/item/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/item-img/abc.jpg');?>"></td>
						                  <td>AOL browser (AOL desktop)</td>
						                  <td>Win XP</td>
						                  <td>6</td>
						                  
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/item/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/item-img/abc.jpg');?>"></td>
						                  <td>Firefox 1.0</td>
						                  <td>Win 98+ / OSX.2+</td>
						                  <td>1.7</td>
						                  
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/item/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/item-img/abc.jpg');?>"></td>
						                  <td>Firefox 1.5</td>
						                  <td>Win 98+ / OSX.2+</td>
						                  <td>1.8</td>
						                  
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/item/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/item-img/abc.jpg');?>"></td>
						                  <td>Firefox 2.0</td>
						                  <td>Win 98+ / OSX.2+</td>
						                  <td>1.8</td>
						                  
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/item/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/item-img/abc.jpg');?>"></td>
						                  <td>Firefox 3.0</td>
						                  <td>Win 2k+ / OSX.3+</td>
						                  <td>1.9</td>
						                  
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/item/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/item-img/abc.jpg');?>"></td>
						                  <td>Camino 1.0</td>
						                  <td>OSX.2+</td>
						                  <td>1.8</td>
						                  
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/item/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/item-img/abc.jpg');?>"></td>
						                  <td>Camino 1.5</td>
						                  <td>OSX.3+</td>
						                  <td>1.8</td>
						                  
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/item/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/item-img/abc.jpg');?>"></td>
						                  <td>Netscape 7.2</td>
						                  <td>Win 95+ / Mac OS 8.6-9.2</td>
						                  <td>1.7</td>
						                  
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/item/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/item-img/abc.jpg');?>"></td>
						                  <td>Netscape Browser 8</td>
						                  <td>Win 98SE+</td>
						                  <td>1.7</td>
						                  
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/item/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/item-img/abc.jpg');?>"></td>
						                  <td>Netscape Navigator 9</td>
						                  <td>Win 98+ / OSX.2+</td>
						                  <td>1.8</td>
						                  
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/item/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/item-img/abc.jpg');?>"></td>
						                  <td>Mozilla 1.0</td>
						                  <td>Win 95+ / OSX.1+</td>
						                  <td>1</td>
						                  
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/item/edit');?>"><i class="fa fa-edit"></i> Edit</a>
						                  	<a class="btn btn-app"><i class="fa fa-trash"></i> Delete</a>
						                  </td>
						                </tr>
						                <tr>
						                	<td>1</td>
						                  <td><img class="img-circle img-bordered img-circle-70" src="<?=site_url('upload/item-img/abc.jpg');?>"></td>
						                  <td>Mozilla 1.1</td>
						                  <td>Win 95+ / OSX.1+</td>
						                  <td>1.1</td>
						                  
						                  <td> 
								      		<label class="switch">
												<input type="checkbox" id="togBtn">
												<div class="slider round">
													<span class="on">ON</span><span class="off">OFF</span>
												</div>
											</label>
						                  </td>
						                  <td>
						                  	<a class="btn btn-app" href="<?=site_url('admin/item/edit');?>"><i class="fa fa-edit"></i> Edit</a>
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