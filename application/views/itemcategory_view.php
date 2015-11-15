<div id="itemcategory-div">
    <h4>Item Categories</h4>
    <table class="table table-hover table-condensed table-bordered">
        <thead>
        <th>Item Category Code</th>
        <th>Item Category Name</th>
        <th>Description</th>
        <th>Actions</th>
        </thead>
        <tbody>
            <?php
            $all_itemcategories = $this->itemcategory_model->get_all_item_categories();
            if ($all_itemcategories) :
                foreach ($all_itemcategories as $itemcategory):
                    ?>
                    <tr>
                        <td><?php echo $itemcategory->itemcategory_code; ?></td>
                        <td><?php echo $itemcategory->itemcategory_name; ?></td>
                        <td><?php echo $itemcategory->description; ?></td>
                        <td>
                            <a class="btn btn-warning btn-xs" role="button"
                               href="<?php echo base_url(); ?>itemcategory/update/<?php echo urlencode(base64_encode($itemcategory->itemcategory_id)); ?>">Update</a>
                            <a class="btn btn-danger btn-xs" role="button"
                               href="<?php echo base_url(); ?>itemcategory/delete/<?php echo urlencode(base64_encode($itemcategory->itemcategory_id)); ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                endforeach;
            else:
                ?>
                <tr>
                    <td colspan="4">No Entries</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <br/>
    <a class="btn btn-primary" href="<?php echo base_url(); ?>itemcategory/add" role="button">Add New Item Category</a>
    <br/>
</div>