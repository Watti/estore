<?php
    $itemprice = $this->itemprice_model->get_item_price_by_id($itemprice_id);
?>
<div id="updateitemprice-form" class="panel panel-default">
    <div class="panel-heading" class="panel-heading">
        <h4>Update Item Price</h4>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url(); ?>itemprice/update_db">
            <input type="hidden" name="itemprice_id" value="<?php echo $itemprice->itemprice_id; ?>" />
            <div class="form-group">
                <label for="itemprice_code">Item Price Code</label>
                <input class="form-control" type="text" name="itemprice_code"
                       value="<?php echo $itemprice->itemprice_code; ?>" />
            </div>
            <div class="form-group">
                <label for="unit_price">Unit Price</label>
                <input class="form-control" type="text" name="unit_price"
                       value="<?php echo $itemprice->unit_price; ?>" />
            </div>
            <div class="form-group">
                <label for="discount_type">Discount Type</label>
                <input class="form-control" type="text" name="discount_type"
                       value="<?php echo $itemprice->discount_type; ?>" />
            </div>
            <div class="form-group">
                <label for="deleted">Deleted ?</label>
                <input type="checkbox" name="deleted" value="<?php echo $itemprice->deleted; ?>" />
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary"/>
            </div>
        </form>        
    </div>
</div>