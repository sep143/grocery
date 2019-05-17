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
		        <?= $this->lang->line('sidebar_admin/rating');?>
		        <!-- <small>Preview</small> -->
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> <?=$this->lang->line('sidebar_admin/dashboard');?></a></li>
		        <li><a href="#"><i class="fa fa-gift"></i> <?=$this->lang->line('sidebar_admin/items');?></a></li>
		        <li class="active"><?=$this->lang->line('sidebar_admin/item_rating');?></li>
		      </ol>
		    </section>

			<!-- Main content -->
		    <section class="content">
		        <div class="row">
		        	<div class="col-xs-12">
		        		<div class="box">
				            <div class="box-header">
				              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				              	<table id="itemListTable" class="table table-bordered table-striped">
					                <thead>
						                <tr>
											<th><?="#".$this->lang->line('site_common/id');?></th>
											<th><?=$this->lang->line('sidebar_admin/user')." ".$this->lang->line('site_common/name');?></th>
											<th><?=$this->lang->line('site_common/item')." ".$this->lang->line('site_common/name');?></th>
											<th><?=$this->lang->line('sidebar_admin/rating');?></th>
											<th><?=$this->lang->line('site_common/comment');?></th>
											<th><?=$this->lang->line('site_common/created_at');?></th>
											<th><?=$this->lang->line('site_common/status');?></th>
						                </tr>
					                </thead>
					                <tbody>
						                <tr>
						                  <td>01</td>
						                  <td>Rice
						                  </td>
						                  <td>Win 95+</td>
						                  <td> 4</td>
						                  <td>X</td>
						                  <td>
											 09/05/2019 04:01 PM	
						                  </td>
						                  <td>
							                   <div class="btn-group">
								                  <button type="button" class="btn btn-default">Action</button>
								                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								                    <span class="caret"></span>
								                    <span class="sr-only">Toggle Dropdown</span>
								                  </button>
								                  <ul class="dropdown-menu" role="menu">
								                    <li><a href="#">Approve</a></li>
								                    <li><a href="#">Pending</a></li>
								                    <li><a href="#">Rejected</a></li>
								                  </ul>
								                </div>	
						                  </td>
						                </tr>
						                <tr>
						                  <td>01</td>
						                  <td>Internet
						                    Explorer 5.0
						                  </td>
						                  <td>Win 95+</td>
						                  <td>5</td>
						                  <td>C</td>
						                  <td> 
								      		10/05/2019 04:05 PM
						                  </td>
						                  <td>
						                  		<div class="btn-group">
								                  <button type="button" class="btn btn-default">Action</button>
								                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								                    <span class="caret"></span>
								                    <span class="sr-only">Toggle Dropdown</span>
								                  </button>
								                  <ul class="dropdown-menu" role="menu">
								                    <li><a href="#">Approve</a></li>
								                    <li><a href="#">Pending</a></li>
								                    <li><a href="#">Rejected</a></li>
								                  </ul>
								                </div>	
						                  </td>
						                </tr>
						                <tr>
						                  <td>01</td>
						                  <td>Internet
						                    Explorer 5.5
						                  </td>
						                  <td>Win 95+</td>
						                  <td>5.5</td>
						                  <td>A</td>
						                  <td> 
								      		10/05/2019 04:05 PM
						                  </td>
						                  <td>
						                  		<div class="btn-group">
								                  <button type="button" class="btn btn-default">Action</button>
								                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								                    <span class="caret"></span>
								                    <span class="sr-only">Toggle Dropdown</span>
								                  </button>
								                  <ul class="dropdown-menu" role="menu">
								                    <li><a href="#">Approve</a></li>
								                    <li><a href="#">Pending</a></li>
								                    <li><a href="#">Rejected</a></li>
								                  </ul>
								                </div>	
						                  </td>
						                </tr>
						                <tr>
						                  <td>01</td>
						                  <td>Internet
						                    Explorer 6
						                  </td>
						                  <td>Win 98+</td>
						                  <td>6</td>
						                  <td>A</td>
						                  <td> 
								      		10/05/2019 04:05 PM
						                  </td>
						                  <td>
						                  		<div class="btn-group">
								                  <button type="button" class="btn btn-default">Action</button>
								                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								                    <span class="caret"></span>
								                    <span class="sr-only">Toggle Dropdown</span>
								                  </button>
								                  <ul class="dropdown-menu" role="menu">
								                    <li><a href="#">Approve</a></li>
								                    <li><a href="#">Pending</a></li>
								                    <li><a href="#">Rejected</a></li>
								                  </ul>
								                </div>	
						                  </td>
						                </tr>
						                <tr>
						                  <td>01</td>
						                  <td>Internet Explorer 7</td>
						                  <td>Win XP SP2+</td>
						                  <td>7</td>
						                  <td>A</td>
						                  <td> 
								      		10/05/2019 04:05 PM
						                  </td>
						                  <td>
						                  		<div class="btn-group">
								                  <button type="button" class="btn btn-default">Action</button>
								                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								                    <span class="caret"></span>
								                    <span class="sr-only">Toggle Dropdown</span>
								                  </button>
								                  <ul class="dropdown-menu" role="menu">
								                    <li><a href="#">Approve</a></li>
								                    <li><a href="#">Pending</a></li>
								                    <li><a href="#">Rejected</a></li>
								                  </ul>
								                </div>	
						                  </td>
						                </tr>
						                <tr>
						                  <td>01</td>
						                  <td>AOL browser (AOL desktop)</td>
						                  <td>Win XP</td>
						                  <td>6</td>
						                  <td>A</td>
						                  <td> 
								      		10/05/2019 04:05 PM
						                  </td>
						                  <td>
						                  		<div class="btn-group">
								                  <button type="button" class="btn btn-default">Action</button>
								                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								                    <span class="caret"></span>
								                    <span class="sr-only">Toggle Dropdown</span>
								                  </button>
								                  <ul class="dropdown-menu" role="menu">
								                    <li><a href="#">Approve</a></li>
								                    <li><a href="#">Pending</a></li>
								                    <li><a href="#">Rejected</a></li>
								                  </ul>
								                </div>	
						                  </td>
						                </tr>
						                <tr>
						                  <td>01</td>
						                  <td>Firefox 1.0</td>
						                  <td>Win 98+ / OSX.2+</td>
						                  <td>1.7</td>
						                  <td>A</td>
						                  <td> 
								      		10/05/2019 04:05 PM
						                  </td>
						                  <td>
						                  		<div class="btn-group">
								                  <button type="button" class="btn btn-default">Action</button>
								                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								                    <span class="caret"></span>
								                    <span class="sr-only">Toggle Dropdown</span>
								                  </button>
								                  <ul class="dropdown-menu" role="menu">
								                    <li><a href="#">Approve</a></li>
								                    <li><a href="#">Pending</a></li>
								                    <li><a href="#">Rejected</a></li>
								                  </ul>
								                </div>	
						                  </td>
						                </tr>
						                <tr>
						                  <td>01</td>
						                  <td>Firefox 1.5</td>
						                  <td>Win 98+ / OSX.2+</td>
						                  <td>1.8</td>
						                  <td>A</td>
						                  <td> 
								      		10/05/2019 04:05 PM
						                  </td>
						                  <td>
						                  		<div class="btn-group">
								                  <button type="button" class="btn btn-default">Action</button>
								                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								                    <span class="caret"></span>
								                    <span class="sr-only">Toggle Dropdown</span>
								                  </button>
								                  <ul class="dropdown-menu" role="menu">
								                    <li><a href="#">Approve</a></li>
								                    <li><a href="#">Pending</a></li>
								                    <li><a href="#">Rejected</a></li>
								                  </ul>
								                </div>	
						                  </td>
						                </tr>
						                <tr>
						                  <td>01</td>
						                  <td>Firefox 2.0</td>
						                  <td>Win 98+ / OSX.2+</td>
						                  <td>1.8</td>
						                  <td>A</td>
						                  <td> 
								      		10/05/2019 04:05 PM
						                  </td>
						                  <td>
						                  		<div class="btn-group">
								                  <button type="button" class="btn btn-default">Action</button>
								                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								                    <span class="caret"></span>
								                    <span class="sr-only">Toggle Dropdown</span>
								                  </button>
								                  <ul class="dropdown-menu" role="menu">
								                    <li><a href="#">Approve</a></li>
								                    <li><a href="#">Pending</a></li>
								                    <li><a href="#">Rejected</a></li>
								                  </ul>
								                </div>	
						                  </td>
						                </tr>
						                <tr>
						                  <td>01</td>
						                  <td>Firefox 3.0</td>
						                  <td>Win 2k+ / OSX.3+</td>
						                  <td>1.9</td>
						                  <td>A</td>
						                  <td> 
								      		10/05/2019 04:05 PM
						                  </td>
						                  <td>
						                  		<div class="btn-group">
								                  <button type="button" class="btn btn-default">Action</button>
								                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								                    <span class="caret"></span>
								                    <span class="sr-only">Toggle Dropdown</span>
								                  </button>
								                  <ul class="dropdown-menu" role="menu">
								                    <li><a href="#">Approve</a></li>
								                    <li><a href="#">Pending</a></li>
								                    <li><a href="#">Rejected</a></li>
								                  </ul>
								                </div>	
						                  </td>
						                </tr>
						                <tr>
						                  <td>01</td>
						                  <td>Camino 1.0</td>
						                  <td>OSX.2+</td>
						                  <td>1.8</td>
						                  <td>A</td>
						                  <td> 
								      		10/05/2019 04:05 PM
						                  </td>
						                  <td>
						                  		<div class="btn-group">
								                  <button type="button" class="btn btn-default">Action</button>
								                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								                    <span class="caret"></span>
								                    <span class="sr-only">Toggle Dropdown</span>
								                  </button>
								                  <ul class="dropdown-menu" role="menu">
								                    <li><a href="#">Approve</a></li>
								                    <li><a href="#">Pending</a></li>
								                    <li><a href="#">Rejected</a></li>
								                  </ul>
								                </div>	
						                  </td>
						                </tr>
						                <tr>
						                  <td>01</td>
						                  <td>Camino 1.5</td>
						                  <td>OSX.3+</td>
						                  <td>1.8</td>
						                  <td>A</td>
						                  <td> 
								      		10/05/2019 04:05 PM
						                  </td>
						                  <td>
						                  		<div class="btn-group">
								                  <button type="button" class="btn btn-default">Action</button>
								                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								                    <span class="caret"></span>
								                    <span class="sr-only">Toggle Dropdown</span>
								                  </button>
								                  <ul class="dropdown-menu" role="menu">
								                    <li><a href="#">Approve</a></li>
								                    <li><a href="#">Pending</a></li>
								                    <li><a href="#">Rejected</a></li>
								                  </ul>
								                </div>	
						                  </td>
						                </tr>
						                <tr>
						                  <td>01</td>
						                  <td>Netscape 7.2</td>
						                  <td>Win 95+ / Mac OS 8.6-9.2</td>
						                  <td>1.7</td>
						                  <td>A</td>
						                  <td> 
								      		10/05/2019 04:05 PM
						                  </td>
						                  <td>
						                  		<div class="btn-group">
								                  <button type="button" class="btn btn-default">Action</button>
								                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								                    <span class="caret"></span>
								                    <span class="sr-only">Toggle Dropdown</span>
								                  </button>
								                  <ul class="dropdown-menu" role="menu">
								                    <li><a href="#">Approve</a></li>
								                    <li><a href="#">Pending</a></li>
								                    <li><a href="#">Rejected</a></li>
								                  </ul>
								                </div>	
						                  </td>
						                </tr>
						                <tr>
						                  <td>01</td>
						                  <td>Netscape Browser 8</td>
						                  <td>Win 98SE+</td>
						                  <td>1.7</td>
						                  <td>A</td>
						                  <td> 
								      		10/05/2019 04:05 PM
						                  </td>
						                  <td>
						                  		<div class="btn-group">
								                  <button type="button" class="btn btn-default">Action</button>
								                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								                    <span class="caret"></span>
								                    <span class="sr-only">Toggle Dropdown</span>
								                  </button>
								                  <ul class="dropdown-menu" role="menu">
								                    <li><a href="#">Approve</a></li>
								                    <li><a href="#">Pending</a></li>
								                    <li><a href="#">Rejected</a></li>
								                  </ul>
								                </div>	
						                  </td>
						                </tr>
						                <tr>
						                  <td>01</td>
						                  <td>Netscape Navigator 9</td>
						                  <td>Win 98+ / OSX.2+</td>
						                  <td>1.8</td>
						                  <td>A</td>
						                  <td> 
								      		10/05/2019 04:05 PM
						                  </td>
						                  <td>
						                  		<div class="btn-group">
								                  <button type="button" class="btn btn-default">Action</button>
								                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								                    <span class="caret"></span>
								                    <span class="sr-only">Toggle Dropdown</span>
								                  </button>
								                  <ul class="dropdown-menu" role="menu">
								                    <li><a href="#">Approve</a></li>
								                    <li><a href="#">Pending</a></li>
								                    <li><a href="#">Rejected</a></li>
								                  </ul>
								                </div>	
						                  </td>
						                </tr>
						                <tr>
						                  <td>01</td>
						                  <td>Mozilla 1.0</td>
						                  <td>Win 95+ / OSX.1+</td>
						                  <td>1</td>
						                  <td>A</td>
						                  <td> 
								      		10/05/2019 04:05 PM
						                  </td>
						                  <td>
						                  		<div class="btn-group">
								                  <button type="button" class="btn btn-default">Action</button>
								                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								                    <span class="caret"></span>
								                    <span class="sr-only">Toggle Dropdown</span>
								                  </button>
								                  <ul class="dropdown-menu" role="menu">
								                    <li><a href="#">Approve</a></li>
								                    <li><a href="#">Pending</a></li>
								                    <li><a href="#">Rejected</a></li>
								                  </ul>
								                </div>	
						                  </td>
						                </tr>
						                <tr>
						                  <td>01</td>
						                  <td>Mozilla 1.1</td>
						                  <td>Win 95+ / OSX.1+</td>
						                  <td>1.1</td>
						                  <td>A</td>
						                  <td> 
								      		10/05/2019 04:05 PM
						                  </td>
						                  <td>
						                  		<div class="btn-group">
								                  <button type="button" class="btn btn-default">Action</button>
								                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								                    <span class="caret"></span>
								                    <span class="sr-only">Toggle Dropdown</span>
								                  </button>
								                  <ul class="dropdown-menu" role="menu">
								                    <li><a href="#">Approve</a></li>
								                    <li><a href="#">Pending</a></li>
								                    <li><a href="#">Rejected</a></li>
								                  </ul>
								                </div>	
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