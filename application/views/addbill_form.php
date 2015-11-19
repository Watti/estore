<?php
//    if (isset($bill_id))
//    {
//        $current_bill_id = urlencode(base64_encode($bill_id));
//    }
?>
<div id="addbill-form" class="panel panel-default">
    <div class="panel-heading container-fluid">
        <!--<h4 align="left">Billing Form</h4>-->
        <div class="row">
            <div class="col-md-4">
                <h5><strong><em>Bill ID : <?php echo $this->session->billingdata('current_bill_id'); ?></em></strong></h5>
            </div>
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">
                <h5><strong><em>Date/Time : <?php
                            date_default_timezone_set('Asia/Colombo');
                            echo date('m/d/Y h:i:s a', time());
                            ?></em></strong></h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h5><strong><em>Branch : Nugegoda</em></strong></h5>
            </div>
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">
                <h5><strong><em>Billed By : <?php echo $this->session->userdata('display_name'); ?></em></strong></h5>
            </div>
        </div>
    </div>
    <div class="panel-body container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-condensed table-bordered">
                    <thead>
                    <th>#</th>
                    <th>Code</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Discount %</th>
                    <th>Amount</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($bill_id)):
                            $line = 0;
                            $bill_items = $this->sale_model->get_billitems_for_bill_id($bill_id);
                            if ($bill_items):
                                foreach ($bill_items as $bill_item):
                                    $stock_item = $this->stock_model->get_stockitem_by_id($bill_item->stock_id);
                                    $item = $this->item_model->get_item_by_id($stock_item->item_id);
                                    $itemprice = $this->itemprice_model->get_item_price_by_id($stock_item->itemprice_id);
                                    ?>
                                    <tr>
                                        <td><?php echo ++$line; ?></td>
                                        <td><?php echo $item->item_code; ?></td>
                                        <td><?php echo $item->item_name; ?></td>
                                        <td><?php echo $itemprice->unit_price; ?></td>
                                        <td><?php echo $bill_item->quantity; ?></td>
                                        <td><?php echo $itemprice->discount_type; ?></td>
                                        <td><?php echo $bill_item->total; ?></td>
                                        <td>Actions</td>
                                    </tr>
                                    <?php
                                endforeach;
                            else:
                                echo '<tr><td colspan="8">No Entries</td></tr>';
                            endif;
                        else :
                            echo '<tr><td colspan="8">No Entries</td></tr>';
                        endif;
                        ?>
                        <tr>
                            <td colspan="7">&nbsp;</td>
                            <td>
                                <a class="btn btn-primary" href="<?php echo base_url() . 'bill/add_billitem/' . urlencode(base64_encode($bill_id)); ?>" 
                                   role="button">Add Item</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
<!--        <form method="post" action="<php echo base_url(); ?>bill/add_db">
            <div class="form-group">
                <label for="item_code">Item Code</label>
                <input class="form-control" type="text" name="item_id" />
            </div>
            <div class="form-group">
                <label for="itemcategory_name">Item Type</label>
                <input class="form-control" type="text" name="itemtype" />
            </div>
            <div class="form-group">
                <label for="item_price">Unit Price</label>
                <input class="form-control" name="total"></input>
            </div>
            <div class="form-group">
                <label for="discount">Discount</label>
                <input class="form-control" name="discount"></input>
            </div>
            <div class="form-group">
                <label for="qty">Qty</label>
                <input class="form-control" name="quantity"></input>
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-primary"/>
            </div>
        </form>        -->
    </div>
    <div class="panel-footer container-fluid">
        <div class="row">
            <div class="col-md-8">
                <input class="btn btn-lg btn-success" type="submit" value="Commit">
                <input class="btn btn-lg btn-warning" type="submit" value="Suspend">
                <input class="btn btn-lg btn-danger" type="submit" value="Cancel">
            </div>
            <div class="col-md-4">
                <h4><strong><em>Gross Amount : 2,420.50</em></strong></h4>
                <h4><strong><em>Net Amount : 2,420.50</em></strong></h4>
            </div>
        </div>
    </div>
</div>
