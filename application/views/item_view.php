<div id="item-div">
    <h4>Items</h4>
    <table class="table table-hover table-condensed table-bordered">
        <thead>
        <th>Item Code</th>
        <th>Item Type</th>
        <th>Bar Code</th>
        <th>Quantity</th>
        <th>Unit</th>
        <th>Unit Price</th>
        <th>Remarks</th>
        <th>Actions</th>
        </thead>
        <tbody>
            <?php
            $all_items = $this->item_model->get_all_items();
            foreach ($all_items as $item):
                ?>
                <tr>
                    <td><?php echo $item->item_code; ?></td>
                    <td><?php echo $item->type; ?></td>
                    <td><?php echo $item->bar_code; ?></td>
                    <td><?php echo $item->quantity; ?></td>
                    <td><?php echo $item->unit; ?></td>
                    <td><?php echo $item->unit_price; ?></td>
                    <td><?php echo $item->remarks; ?></td>
                    <td>
                        <a class="btn btn-warning btn-xs" role="button"
                           href="<?php echo base_url(); ?>item/update/<?php echo urlencode(base64_encode($item->id)); ?>">Update</a>
                        <a class="btn btn-danger btn-xs" role="button"
                           href="<?php echo base_url(); ?>item/delete/<?php echo urlencode(base64_encode($item->id)); ?>">Delete</a>
                    </td>
                </tr>
                <?php
            endforeach;
            ?>
        </tbody>
    </table>
    <br/>
    <a class="btn btn-primary" href="<?php echo base_url(); ?>item/add" role="button">Add New Item</a>
    <br/>
</div>