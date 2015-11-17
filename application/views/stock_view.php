<div id="item-div">
    <h4>Stock Items</h4>
    <table class="table table-hover table-condensed table-bordered">
        <thead>
        <th>Item Code</th>
        <th>Item Name</th>
        <th>Category</th>
        <th>Qty</th>
        <th>Min. Qty</th>
        <th>Unit</th>
        <th>Unit Price</th>
        <th>Description</th>
        <th>Actions</th>
        </thead>
        <tbody>
            <?php
            $all_items = $this->item_model->get_all_items();
            if ($all_items):
                foreach ($all_items as $item):
                    $stock_item = $this->stock_model->get_stockitem_by_item_id($item->item_id);
                    if ($stock_item) {
                        $itemprice = $this->itemprice_model->get_item_price_by_id($stock_item->itemprice_id);
                    }
                    $itemcategory = $this->itemcategory_model->get_item_category_by_id($item->itemcategory_id);
                    ?>
                    <tr>
                        <td><?php echo $item->item_code; ?></td>
                        <td><?php echo $item->item_name; ?></td>
                        <td><?php echo $itemcategory->itemcategory_name; ?></td>

                        <?php if ($stock_item): ?>
                            <td><?php echo $stock_item->qty; ?></td>
                            <td><?php echo $stock_item->min_qty; ?></td>
                        <?php else: ?>
                            <td>Not in Stock</td>
                            <td>Not in Stock</td>
                        <?php endif; ?>

                        <td><?php echo $item->unit; ?></td>

                        <?php if ($stock_item && $itemprice): ?>
                            <td><?php echo $itemprice->unit_price; ?></td>
                        <?php else: ?>
                            <td>Not in Stock</td>
                        <?php endif; ?>

                        <td><?php echo $item->description; ?></td>
                        <td>
                            <?php if ($stock_item): ?>
                                <a class="btn btn-warning btn-xs" role="button"
                                   href="<?php echo base_url(); ?>stock/update/<?php echo urlencode(base64_encode($item->item_id)); ?>">Update</a>
                                <a class="btn btn-danger btn-xs" role="button"
                                   href="<?php echo base_url(); ?>stock/delete/<?php echo urlencode(base64_encode($stock_item->stock_id)); ?>">Remove</a>
                               <?php else: ?>
                                <a class="btn btn-success btn-xs" role="button"
                                   href="<?php echo base_url(); ?>stock/add/<?php echo urlencode(base64_encode($item->item_id)); ?>">Add To Stock</a>
                               <?php endif; ?>
                        </td>
                    </tr>
                    <?php
                endforeach;
            else:
                ?>
                <tr>
                    <td colspan="9">No Entries</td>
                </tr>
            <?php
            endif;
            ?>
        </tbody>
    </table>
    <br/>
<!--    <a class="btn btn-primary" href="<?php echo base_url(); ?>stock/add" role="button">Add New Item</a>-->
    <br/>
</div>