<div id="itemprice-div">
    <h4>Item Prices</h4>
    <table class="table table-hover table-condensed table-bordered">
        <thead>
        <th>Item Price Code</th>
        <th>Unit Price</th>
        <th>Discount Type</th>
        <th>Actions</th>
        </thead>
        <tbody>
            <?php
            $all_itemprices = $this->itemprice_model->get_all_item_prices();
            if ($all_itemprices) :
                foreach ($all_itemprices as $itemprice):
                    ?>
                    <tr>
                        <td><?php echo $itemprice->itemprice_code; ?></td>
                        <td><?php echo $itemprice->unit_price; ?></td>
                        <td><?php echo $itemprice->discount_type; ?></td>
                        <td>
                            <a class="btn btn-warning btn-xs" role="button"
                               href="<?php echo base_url(); ?>itemprice/update/<?php echo urlencode(base64_encode($itemprice->itemprice_id)); ?>">Update</a>
                            <a class="btn btn-danger btn-xs" role="button"
                               href="<?php echo base_url(); ?>itemprice/delete/<?php echo urlencode(base64_encode($itemprice->itemprice_id)); ?>">Delete</a>
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
    <a class="btn btn-primary" href="<?php echo base_url(); ?>itemprice/add" role="button">Add New Item Price</a>
    <br/>
</div>