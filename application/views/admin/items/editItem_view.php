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
		        <li><a href="#"><i class="fa fa-dashboard"></i> <?=$this->lang->line('sidebar_admin/dashboard');?></a></li>
		        <li><a href="<?=site_url('admin/item');?>"><i class="fa fa-gift"></i> <?=$this->lang->line('sidebar_admin/items');?></a></li>
		        <li class="active"><?=$this->lang->line('sidebar_admin/item');?></li>
		      </ol>
		    </section>
		    <!-- Main content -->
			<section class="content">
		      <div class="row">
		        <!-- right column -->
		        <div class="col-md-8">
		          
		          <!-- general form elements disabled -->
		          <div class="box box-warning">
		          	<form role="form" action="<?= site_url('admin/item/edit_item'); ?>" method="post">
		            <div class="box-header with-border">
		              <h3 class="box-title"><?=$this->lang->line('site_common/item')."&nbsp;".$this->lang->line('site_common/edit');?></h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		              	<div class="form-group <?= form_error('vendorName') ? 'has-error' : '' ?>">
			                <label for="vendor_name"><?=$this->lang->line('site_common/select')." ".$this->lang->line('vendor_admin/vendor_name');;?></label>
			                <select class="form-control select2" name="vendorName" id="vendor_name">
			                  	<!-- <option selected="selected">Alabama</option> -->
			                  	<option value=""></option>
			                  	<option>Alaska</option>
			                  	<option>California</option>
			                  	<option>Delaware</option>
			                  	<option>Tennessee</option>
			                  	<option>Texas</option>
			                  	<option>Washington</option>
			                </select>
			                <span class="help-block"><?= form_error('vendorName');?></span>
		              	</div>
		              	
		              	<div class="form-group <?= form_error('itemCategory') ? 'has-error' : '' ?>">
		                  <label for="item_sub_category"><?=$this->lang->line('site_common/category');?> </label>
		                  <select class="form-control select2" name="itemCategory" id="item_category">
		                  	<option value=""></option>
		                    <option>option 1</option>
		                    <option>option 2</option>
		                    <option>option 3</option>
		                    <option>option 4</option>
		                    <option>option 5</option>
		                  </select>
		                  <span class="help-block"><?= form_error('itemCategory');?></span>
		                </div>

		                <div class="form-group <?= form_error('itemSubCategory') ? 'has-error' : '' ?>">
		                  <label for="item_sub_category"><?=$this->lang->line('sidebar_admin/sub_category');?> </label>
		                  <select class="form-control select2" name="itemSubCategory" id="item_sub_category">
		                  	<option value=""></option>
		                    <option>option 1</option>
		                    <option>option 2</option>
		                    <option>option 3</option>
		                    <option>option 4</option>
		                    <option>option 5</option>
		                  </select>
		                  <span class="help-block"><?= form_error('itemSubCategory');?></span>
		                </div>
		                <!-- text input -->
		                
		                <div class="form-group <?= form_error('itemPrice') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="item_price"><?=$this->lang->line('site_common/item')."&nbsp".$this->lang->line('site_common/price');?></label>
		                  <input type="text" class="form-control" name="itemPrice" id="item_price" placeholder="<?=$this->lang->line('itemcreate_admin/item_price_placeholder');?>" value="<?php echo set_value('itemPrice'); ?>">
		                  <span class="help-block"><?= form_error('itemPrice');?></span>
		                </div>

		                <div class="form-group <?= form_error('itemQuantity') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="item_quantity"><?=$this->lang->line('site_common/quantity');?></label>
		                  <input type="text" class="form-control" name="itemQuantity" id="item_quantity" placeholder="<?=$this->lang->line('itemcreate_admin/item_quantity_placeholder');?>" value="<?php echo set_value('itemQuantity'); ?>">
		                  <span class="help-block"><?= form_error('itemQuantity');?></span>
		                </div>

		                <div class="form-group <?= form_error('itemUnitID') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="item_unit_id"><?=$this->lang->line('site_common/unit');?></label>
		                  <select class="form-control select2" name="itemUnitID" id="item_unit_id">
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
		                  <select class="form-control select2" name="itemBrandID" id="item_brand_id">
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
		                  <input type="text" class="form-control" name="itemName" id="item_name" placeholder="<?=$this->lang->line('itemcreate_admin/item_name_placeholder');?>" value="<?php echo set_value('itemName'); ?>">
		                  <span class="help-block"><?= form_error('itemName'); ?></span>
		                </div>

		                <!-- textarea -->
		                <div class="form-group <?= form_error('itemDescription') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="item_description_id"><?=$this->lang->line('site_common/description');?></label>
		                  <textarea class="form-control" rows="3" name="itemDescription" id="item_description_id" placeholder="<?=$this->lang->line('itemcreate_admin/item_description_placeholder');?>" ><?php echo set_value('itemDescription'); ?></textarea>
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
		                	<label class="control-label" for="itemOfferStatus"><?=$this->lang->line('itemcreate_admin/is_offer');?></label>
		                	<div class="radio">
			                  	<label>
			                      <input type="radio" name="itemOfferStatus" id="options_radios1" value="1" >
			                      <?=$this->lang->line('site_common/on');?>
			                    </label>
			                    <label>
			                      <input type="radio" name="itemOfferStatus" id="options_radios2" value="2">
			                      <?=$this->lang->line('site_common/off');?>
			                    </label>
			                  </div>
			                  <span class="help-block"><?= form_error('itemOfferStatus'); ?></span>
		                </div>
		                <div class="form-group <?= form_error('itemOfferPrice') ? 'has-error' : '' ?>">
		                  <label class="control-label" for="item_offer_price"><?=$this->lang->line('itemcreate_admin/label_offer_price');?></label>
		                  <input type="text" class="form-control" name="itemOfferPrice" id="item_offer_price" placeholder="<?=$this->lang->line('itemcreate_admin/offer_price_placeholder');?>" value="<?php echo set_value('itemOfferPrice'); ?>">
		                  <span class="help-block"><?= form_error('itemOfferPrice'); ?></span>
		                </div>

		                <div class="form-group <?= form_error('itemOfferExpiryDate') ? 'has-error' : '' ?>">
			                <label><?=$this->lang->line('itemcreate_admin/label_offer_exp_date');?></label>
			                <div class="input-group date">
			                  <div class="input-group-addon">
			                    <i class="fa fa-calendar"></i>
			                  </div>
			                  <input type="text" class="form-control pull-right" name="itemOfferExpiryDate" id="datepicker">
			                </div>
			                <span class="help-block"><?= form_error('itemOfferExpiryDate'); ?></span>
			                <!-- /.input group -->
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