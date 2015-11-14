<?php
    $item = $this->item_model->get_item_by_id($item_id);
?>
<div id="additem-form" class="panel panel-default">
    <div class="panel-heading" class="panel-heading">
        <h4>Update Item</h4>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url(); ?>item/update_item">
            <input type="hidden" name="item_id" value="<?php echo $item->id; ?>" />
            <div class="form-group">
                <label for="item_code">Item Code</label>
                <input class="form-control" type="text" name="item_code" 
                       value="<?php echo $item->item_code; ?>" />
            </div>
            <div class="form-group">
                <label for="item_type">Item Type</label>
                <input class="form-control" type="text" name="item_type"
                       value="<?php echo $item->type; ?>" />
            </div>
            <div class="form-group">
                <label for="bar_code">Bar Code</label>
                <input class="form-control" type="text" name="bar_code"
                       value="<?php echo $item->bar_code; ?>" />
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input class="form-control" type="text" name="quantity"
                       value="<?php echo $item->quantity; ?>" />
            </div>
            <div class="form-group">
                <label for="minimum_quantity">Minimum Quantity</label>
                <input class="form-control" type="text" name="minimum_quantity"
                       value="<?php echo $item->minimum_quantity; ?>" />
            </div>
            <div class="form-group">
                <label for="unit">Unit</label>
                <input class="form-control" type="text" name="unit"
                       value="<?php echo $item->unit; ?>" />
            </div>
            <div class="form-group">
                <label for="unit_price">Unit Price</label>
                <input class="form-control" type="text" name="unit_price"
                       value="<?php echo $item->unit_price; ?>" />
            </div>
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea class="form-control" name="remarks"><?php echo $item->remarks; ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary"/>
            </div>
        </form>        
    </div>
</div>