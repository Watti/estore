<?php
    $itemprices = $this->itemprice_model->get_all_item_prices();
    if ($itemprices):
?>
<div id="addstockitem-form" class="panel panel-default">
    <div class="panel-heading" class="panel-heading">
        <h4>Add Stock Item</h4>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url(); ?>stock/add_db">
            <input type="hidden" name="item_id" value="<?php echo $item_id; ?>" />
            <div class="form-group">
                <label for="item_idx">Item ID</label>
                <input name="item_idx" class="form-control" type="text" readonly
                        placeholder="<?php echo $item_id; ?>"/>
            </div>
            <div class="form-group">
                <label for="itemprice_id">Item Price</label>
                <select class="form-control" name="itemprice_id">
                    <?php
                    foreach ($itemprices as $price)
                    {
                        echo '<option value="'.$price->itemprice_id.'">'.$price->itemprice_code.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="qty">Qty</label>
                <input class="form-control" type="text" name="qty" />
            </div>
            <div class="form-group">
                <label for="min_qty">Min. Qty</label>
                <input class="form-control" type="text" name="min_qty" />
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-primary"/>
            </div>
        </form>        
    </div>
</div>

<?php else: ?>
<div>
    Item Prices are empty. Please go <a href="<?php echo base_url(); ?>itemprice">here</a> to add some prices.
</div>
<?php endif; 
