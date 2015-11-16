<?php
    $stockitem = $this->stock_model->get_stockitem_by_item_id($item_id);
    $itemprices = $this->itemprice_model->get_all_item_prices();
?>
<div id="editstockitem-form" class="panel panel-default">
    <div class="panel-heading" class="panel-heading">
        <h4>Edit Stock Item</h4>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url(); ?>stock/update_db">
            <input type="hidden" name="stock_id" value="<?php echo $stockitem->stock_id; ?>" />
            <input type="hidden" name="item_id" value="<?php echo $item_id; ?>" />
            <div class="form-group">
                <label for="item_idx">Item ID</label>
                <input name="item_idx" class="form-control" type="text" readonly
                       value="<?php echo $item_id; ?>"/>
            </div>
            <div class="form-group">
                <label for="itemprice_id">Item Price</label>
                <select class="form-control" name="itemprice_id">
                    <?php
                    foreach ($itemprices as $price) {
                        if($stockitem->itemprice_id == $price->itemprice_id) {
                            echo '<option value="'.$price->itemprice_id.'" selected>'.$price->itemprice_code.'</option>';
                        } else {
                            echo '<option value="'.$price->itemprice_id.'">'.$price->itemprice_code.'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="qty">Qty</label>
                <input class="form-control" type="text" name="qty"
                       value="<?php echo $stockitem->qty; ?>" />
            </div>
            <div class="form-group">
                <label for="min_qty">Min. Qty</label>
                <input class="form-control" type="text" name="min_qty" 
                       value="<?php echo $stockitem->min_qty; ?>" />
            </div>
            <div class="form-group">
                <label for="deleted">Deleted ?</label>
                <?php if($stockitem->deleted) : ?>
                <input type="checkbox" name="deleted" value="1" checked />
                <?php else: ?>
                <input type="checkbox" name="deleted" value="1" />
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary"/>
            </div>
        </form>        
    </div>
</div>