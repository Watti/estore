<div id="bill-div">
    <h4>Items</h4>
    <table class="table table-hover table-condensed table-bordered">
        <thead>
        <th>Bill No.</th>
        <th># of Items</th>
        <th>Amount</th>
        <th>Billed by</th>
        <th>Actions</th>
        </thead>
        <tbody>
            <?php
            $allbills = $this->bill_model->get_all_bills();
            if ($allbills):
                $bill_no = 0;
                foreach ($allbills as $bill):
                    $user = $this->user_model->get_user_by_id($bill->user_id);
                    $bill_items = $this->sale_model->get_billitems_for_bill_id($bill->bill_id);
                    $item_count = 0;
                    $total_amount = 0;
                    foreach ($bill_items as $bill_item) {
                        $item_count += $bill_item->quantity;
                        $total_amount += $bill_item->total;
                    }
                    ?>
                    <tr>
                        <td><?php echo ++$bill_no; ?></td>
                        <td><?php echo $item_count; ?></td>
                        <td><?php echo $total_amount; ?></td>
                        <td><?php echo $user->display_name; ?></td>
                        <td>
                            <?php if ($bill->status == 1): ?>
                                <a class="btn btn-success btn-xs" role="button" href="#">Committed</a>
                               <?php elseif ($bill->status == 2): ?>
                                <a class="btn btn-warning btn-xs" role="button"
                                   href="<?php echo base_url(); ?>bill/update_bill/<?php echo urlencode(base64_encode($bill->bill_id)); ?>">Pending</a>
                               <?php elseif ($bill->status == 3): ?>
                                <a class="btn btn-danger btn-xs" role="button" href="#">Canceled</a>
                               <?php else: ?>
                                An Error Occurred
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
</div>