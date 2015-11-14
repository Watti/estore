<div id="item-div">
    <table class="table table-hover">
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
                        <button type="button" class="btn btn-warning btn-xs">Update</button>
                        <button type="button" class="btn btn-danger btn-xs">Delete</button>
                    </td>
                </tr>
                <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>