<div id="addbill-form" class="panel panel-default">
    <div class="panel-heading" class="panel-heading">
        <h4 align="left">Billing Form</h4>
         <h4 align="center">Total : </h4>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url(); ?>addbill/add_db">
            <div class="form-group">
                <label for="item_code">Item Code</label>
                <input class="form-control" type="text" name="item_id" />
            </div>
            <div class="form-group">
                <label for="itemcategory_name">Item Type</label>
                <input class="form-control" type="text" name="itemtype" />
            </div>
            <div class="form-group">
                <label for="item_price">Unit Price</label>
                <input class="form-control" name="total"></input>
            </div>
             <div class="form-group">
                <label for="discount">Discount</label>
                <input class="form-control" name="discount"></input>
            </div>
             <div class="form-group">
                <label for="qty">QTY</label>
                <input class="form-control" name="quantity"></input>
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-primary"/>
            </div>
        </form>        
    </div>
</div>