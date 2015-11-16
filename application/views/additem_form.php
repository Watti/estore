<?php
    $itemcategories = $this->itemcategory_model->get_all_item_categories();
    if ($itemcategories):
?>
<div id="additem-form" class="panel panel-default">
    <div class="panel-heading" class="panel-heading">
        <h4>Add Item</h4>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url(); ?>item/add_db">
            <div class="form-group">
                <label for="item_code">Item Code</label>
                <input class="form-control" type="text" name="item_code" />
            </div>
            <div class="form-group">
                <label for="itemcategory_id">Item Category</label>
                <select class="form-control" name="itemcategory_id">
                    <?php
                    foreach ($itemcategories as $category)
                    {
                        echo '<option value="'.$category->itemcategory_id.'">'.$category->itemcategory_name.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="item_name">Item Name</label>
                <input class="form-control" type="text" name="item_name" />
            </div>
            <div class="form-group">
                <label for="bar_code">Bar Code</label>
                <input class="form-control" type="text" name="bar_code" />
            </div>
            <div class="form-group">
                <label for="unit">Unit</label>
                <input class="form-control" type="text" name="unit" />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="3" name="description"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-primary"/>
            </div>
        </form>        
    </div>
</div>

<?php else: ?>
<div>
    Item Categories are empty. Please go <a href="<?php echo base_url(); ?>itemcategory">here</a> to add some categories.
</div>
<?php endif; 
