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
		        <?= $this->lang->line('site_common/edit')." ".$this->lang->line('site_common/item');?>
		        <!-- <small>Preview</small> -->
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> <?=$this->lang->line('sidebar_vendor/dashboard');?></a></li>
		        <li><a href="#"><i class="fa fa-gift"></i> <?=$this->lang->line('sidebar_vendor/items');?></a></li>
		        <li class="active"><?=$this->lang->line('sidebar_vendor/item');?></li>
		      </ol>
		    </section>
		    <!-- Main content -->
			<section class="content">
		      <div class="row">
		        <!-- right column -->
		        <div class="col-md-8">
		          
		          <!-- general form elements disabled -->
		          <div class="box box-warning">
		          	<form role="form" action="<?= site_url('vendor/item/edit_item'); ?>" method="post">
		            <div class="box-header with-border">
		              <h3 class="box-title"><?=$this->lang->line('site_common/item')."&nbsp;".$this->lang->line('site_common/edit');?></h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		              
		              	<div class="form-group <?= form_error('itemCategoryID') ? 'has-error' : '' ?>">
		                  <label for="item_category_id"><?=$this->lang->line('site_common/category')."&nbsp;".$this->lang->line('site_common/id');?> </label>
		                  <select class="form-control" name="itemCategoryID" id="item_category_id">
		                  	<option value=""></option>
		                    <option>option 1</option>
		                    <option>option 2</option>
		                    <option>option 3</option>
		                    <option>option 4</option>
		                    <option>option 5</option>
		                  </select>
		                  <span class="help-block"><?= form_error('itemCategoryID');?></span>
		                </div>
		                <!-- text input -->
		                
		                <div class="form-group <?= form_error('itemPrice') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="item_price"><?=$this->lang->line('site_common/item')."&nbsp".$this->lang->line('site_common/price');?></label>
		                  <input type="text" class="form-control" name="itemPrice" id="item_price" placeholder="<?=$this->lang->line('itemcreate_vendor/item_price_placeholder');?>" value="<?php echo set_value('itemPrice'); ?>">
		                  <span class="help-block"><?= form_error('itemPrice');?></span>
		                </div>

		                <div class="form-group <?= form_error('itemQuantity') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="item_quantity"><?=$this->lang->line('site_common/quantity');?></label>
		                  <input type="text" class="form-control" name="itemQuantity" id="item_quantity" placeholder="<?=$this->lang->line('itemcreate_vendor/item_quantity_placeholder');?>" value="<?php echo set_value('itemQuantity'); ?>">
		                  <span class="help-block"><?= form_error('itemQuantity');?></span>
		                </div>

		                <div class="form-group <?= form_error('itemSize') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="item_size"><?=$this->lang->line('site_common/size');?></label>
		                  <input type="text" class="form-control" name="itemSize" id="item_size" placeholder="<?=$this->lang->line('itemcreate_vendor/item_size_placeholder');?>" value="<?php echo set_value('itemSize'); ?>">
		                  <span class="help-block"><?= form_error('itemSize');?></span>
		                </div>

		                <div class="form-group <?= form_error('itemUnitID') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="item_unit_id"><?=$this->lang->line('site_common/unit');?></label>
		                  <select class="form-control" name="itemUnitID" id="item_unit_id">
		                  	<option value=""></option>
		                    <option>option 1</option>
		                    <option>option 2</option>
		                    <option>option 3</option>
		                    <option>option 4</option>
		                    <option>option 5</option>
		                  </select>
		                  <span class="help-block"><?= form_error('itemUnitID');?></span>
		                </div>

		                <div class="form-group <?= form_error('itemBrandID') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="item_brand_id"><?=$this->lang->line('site_common/brand');?></label>
		                  <select class="form-control" name="itemBrandID" id="item_brand_id">
		                    <option value=""></option>
		                    <option>option 1</option>
		                    <option>option 2</option>
		                    <option>option 3</option>
		                    <option>option 4</option>
		                    <option>option 5</option>
		                  </select>
		                  <span class="help-block"><?= form_error('itemBrandID');?></span>
		                </div>

		                <div class="form-group <?= form_error('itemName') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="item_name"><?=$this->lang->line('site_common/item')."&nbsp".$this->lang->line('site_common/name');?></label>
		                  <input type="text" class="form-control" name="itemName" id="item_name" placeholder="<?=$this->lang->line('itemcreate_vendor/item_name_placeholder');?>" value="<?php echo set_value('itemName'); ?>">
		                  <span class="help-block"><?= form_error('itemName'); ?></span>
		                </div>

		                <!-- textarea -->
		                <div class="form-group <?= form_error('itemDescription') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="item_description_id"><?=$this->lang->line('site_common/description');?></label>
		                  <textarea class="form-control" rows="3" name="itemDescription" id="item_description_id" placeholder="<?=$this->lang->line('itemcreate_vendor/item_description_placeholder');?>" ><?php echo set_value('itemDescription'); ?></textarea>
		                  <span class="help-block"><?= form_error('itemDescription'); ?></span>
		                </div>
		                
		                <!-- radio -->
		                <div class="form-group <?= form_error('itemStatus') ? 'has-error' : '' ?>">
		                	  <label class="control-label" for="itemStatus"><?=$this->lang->line('site_common/item')."&nbsp".$this->lang->line('site_common/status');?></label>
			                  <div class="radio">
			                    <label>
			                      <input type="radio" name="itemStatus" id="item_active" value="1" >
			                      <?=$this->lang->line('site_common/active');?>
			                    </label>
			                    <label>
			                      <input type="radio" name="itemStatus" id="item_inactive" value="0">
			                      <?=$this->lang->line('site_common/inactive');?>
			                    </label>
			                  </div>
			                  <span class="help-block"><?= form_error('itemStatus'); ?></span>
		                </div>
		                <div class="form-group <?= form_error('itemOfferStatus') ? 'has-error' : '' ?>">
		                	<label class="control-label" for="itemOfferStatus"><?=$this->lang->line('itemcreate_vendor/is_offer');?></label>
		                	<div class="radio">
			                  	<label>
			                      <input type="radio" name="itemOfferStatus" id="optionsRadios1" value="1" >
			                      <?=$this->lang->line('site_common/on');?>
			                    </label>
			                    <label>
			                      <input type="radio" name="itemOfferStatus" id="optionsRadios2" value="2">
			                      <?=$this->lang->line('site_common/off');?>
			                    </label>
			                  </div>
			                  <span class="help-block"><?= form_error('itemOfferStatus'); ?></span>
		                </div>
		                <div class="form-group <?= form_error('itemImage') ? 'has-error' : '' ?>">
		                  	<label for="item_image"><?=$this->lang->line('site_common/item')." ".$this->lang->line('site_common/image');?></label>
		                 	<input type="file" name="itemImage" id="item_image">

		                  	<span class="help-block"><?= form_error('itemImage')?></span>
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