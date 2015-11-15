<?php
$item = $this->item_model->get_item_by_id($item_id);
$itemcategories = $this->itemcategory_model->get_all_item_categories();
?>
<div id="additem-form" class="panel panel-default">
    <div class="panel-heading" class="panel-heading">
        <h4>Update Item</h4>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url(); ?>item/update_db">
            <input type="hidden" name="item_id" value="<?php echo $item->item_id; ?>" />
            <div class="form-group">
                <label for="item_code">Item Code</label>
                <input class="form-control" type="text" name="item_code" 
                       value="<?php echo $item->item_code; ?>" />
            </div>
            <div class="form-group">
                <label for="itemcategory_id">Item Category</label>
                <select class="form-control" name="itemcategory_id">
                    <?php
                    foreach ($itemcategories as $category) {
                        if ($item->itemcategory_id == $category->itemcategory_id) {
                            echo '<option value="' . $category->itemcategory_id . '" selected>' . $category->itemcategory_name . '</option>';
                        } else {
                            echo '<option value="' . $category->itemcategory_id . '">' . $category->itemcategory_name . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="item_name">Item Name</label>
                <input class="form-control" type="text" name="item_name"
                       value="<?php echo $item->item_name; ?>" />
            </div>
            <div class="form-group">
                <label for="bar_code">Bar Code</label>
                <input class="form-control" type="text" name="bar_code"
                       value="<?php echo $item->bar_code; ?>" />
            </div>
            <div class="form-group">
                <label for="unit">Unit</label>
                <input class="form-control" type="text" name="unit"
                       value="<?php echo $item->unit; ?>" />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description"><?php echo $item->description; ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary"/>
            </div>
        </form>        
    </div>
</div>