<div id="additemcategory-form" class="panel panel-default">
    <div class="panel-heading" class="panel-heading">
        <h4>Add Item Category</h4>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url(); ?>itemcategory/add_db">
            <div class="form-group">
                <label for="itemcategory_code">Item Category Code</label>
                <input class="form-control" type="text" name="itemcategory_code" />
            </div>
            <div class="form-group">
                <label for="itemcategory_name">Item Category Name</label>
                <input class="form-control" type="text" name="itemcategory_name" />
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