<?php
    $itemcategory = $this->itemcategory_model->get_item_category_by_id($itemcategory_id);
?>
<div id="updateitemcategory-form" class="panel panel-default">
    <div class="panel-heading" class="panel-heading">
        <h4>Update Item Category</h4>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url(); ?>itemcategory/update_db">
            <input type="hidden" name="itemcategory_id" value="<?php echo $itemcategory->itemcategory_id; ?>" />
            <div class="form-group">
                <label for="itemcategory_code">Item Category Code</label>
                <input class="form-control" type="text" name="itemcategory_code"
                       value="<?php echo $itemcategory->itemcategory_code; ?>" />
            </div>
            <div class="form-group">
                <label for="itemcategory_name">Item Category Name</label>
                <input class="form-control" type="text" name="itemcategory_name"
                       value="<?php echo $itemcategory->itemcategory_name; ?>" />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="3" name="description"><?php echo $itemcategory->description; ?></textarea>
            </div>
            <div class="form-group">
                <label for="deleted">Deleted ?</label>
                <input type="checkbox" name="deleted" value="<?php echo $itemcategory->deleted; ?>" />
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary"/>
            </div>
        </form>        
    </div>
</div>