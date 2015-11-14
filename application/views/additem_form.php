<div id="additem-form" class="panel panel-default">
    <div class="panel-heading" class="panel-heading">
        <h4>Add Item</h4>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url(); ?>item/add_item">
            <div class="form-group">
                <label for="item_code">Item Code</label>
                <input class="form-control" type="text" name="item_code" />
            </div>
            <div class="form-group">
                <label for="item_type">Item Type</label>
                <input class="form-control" type="text" name="item_type" />
            </div>
            <div class="form-group">
                <label for="bar_code">Bar Code</label>
                <input class="form-control" type="text" name="bar_code" />
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input class="form-control" type="text" name="quantity" />
            </div>
            <div class="form-group">
                <label for="minimum_quantity">Minimum Quantity</label>
                <input class="form-control" type="text" name="minimum_quantity" />
            </div>
            <div class="form-group">
                <label for="unit">Unit</label>
                <input class="form-control" type="text" name="unit" />
            </div>
            <div class="form-group">
                <label for="unit_price">Unit Price</label>
                <input class="form-control" type="text" name="unit_price" />
            </div>
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea class="form-control" rows="3" name="remarks"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-primary"/>
            </div>
        </form>        
    </div>
</div>