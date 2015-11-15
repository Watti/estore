<div id="additemprice-form" class="panel panel-default">
    <div class="panel-heading" class="panel-heading">
        <h4>Add Item Price</h4>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url(); ?>itemprice/add_db">
            <div class="form-group">
                <label for="itemprice_code">Item Price Code</label>
                <input class="form-control" type="text" name="itemprice_code" />
            </div>
            <div class="form-group">
                <label for="unit_price">Unit Price</label>
                <input class="form-control" type="text" name="unit_price" />
            </div>
            <div class="form-group">
                <label for="discount_type">Discount Type</label>
                <input class="form-control" type="text" name="discount_type" />
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-primary"/>
            </div>
        </form>        
    </div>
</div>