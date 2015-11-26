<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
//    $(document).ready(function () {
//        $("#qty").keyup(function () {
//            var price = $("#unitprice").val();
//            var qty = $("#qty").val();
//            var amount = $("#amount").val();
//            var total = parseFloat(amount) + parseFloat(qty) * parseFloat(price);
//            //alert(total);
//            $("#amount").val((total).toFixed(2));
//        });
//    });
    function date_time(id)
    {
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        h = date.getHours();
        if (h < 10)
        {
            h = "0" + h;
        }
        m = date.getMinutes();
        if (m < 10)
        {
            m = "0" + m;
        }
        s = date.getSeconds();
        if (s < 10)
        {
            s = "0" + s;
        }
        result = '' + days[day] + ' ' + months[month] + ' ' + d + ' ' + year + ' ' + h + ':' + m + ':' + s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("' + id + '");', '1000');
        return true;
    }

    function onKeyUpFunction(idno) {
        var unitprice = $("#unitprice" + idno).val();
        var qty = $("#qty" + idno).val();
        var discount = $("#discount" + idno).val();
        if (!qty) {
            qty = 0;
        }
        //alart( discount);
        var total = parseFloat(qty) * ((100 - parseFloat(discount)) * 0.01 * parseFloat(unitprice));

        $("#amount" + idno).val((total).toFixed(2));

        var total_acc = 0;

        $('.amountclass').each(function() {
            total_acc += parseFloat($(this).val());
        });

        var gross_amount = total_acc;

        $("#gross_amount").html((gross_amount).toFixed(2));
        $("#net_amount").html((gross_amount).toFixed(2));
    }
</script>
<div id="addbill-form" class="panel panel-default">
    <div class="panel-heading container-fluid">
        <!--<h4 align="left">Billing Form</h4>-->
        <div class="row">
            <div class="col-md-4">
                <h5><strong><em>Bill ID : <?php if (isset($bill_id)): echo $bill_id;
endif; ?></em></strong></h5>
            </div>
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4"/>
            <b><span id="date_time" style="color:purple"></span></b>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
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
                                    <td class="col-normal"><input type="text" id="unitprice<?php echo $line; ?>" value="<?php echo $itemprice->unit_price; ?>" readonly /></td>
                                    <td class="col-mini"><input type="text" id="qty<?php echo $line; ?>" onkeyup="onKeyUpFunction(<?php echo $line; ?>);" value="<?php echo $bill_item->quantity; ?>" /></td>
                                    <td class="col-mini" ><input type="text" id="discount<?php echo $line; ?>" value="<?php echo $itemprice->discount_type; ?>" readonly /></td>
                                    <td class="col-normal"><input type="text" class="amountclass" id="amount<?php echo $line; ?>" value="<?php echo $bill_item->total; ?>" readonly /></td>
                                    <td><a class="btn btn-xs btn-danger" href="#" role="button">Remove</a></td>
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
                            <a class="btn btn-primary" href="<?php echo base_url() . 'bill/add_billitem/' . $bill_id; ?>" 
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
        <div class="col-md-7">
            <input class="btn btn-lg btn-success" type="submit" value="Commit">
            <input class="btn btn-lg btn-warning" type="submit" value="Suspend">
            <input class="btn btn-lg btn-danger" type="submit" value="Cancel">
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="row">
                    <!--<div class="col-md-4"><label class="control-label bigfont">Gross Amount : </label></div>-->
                    <div class="col-md-4"><p class="text-right bigfont">Gross Amount : </p></div>
                    <div class="col-md-8"><p id="gross_amount" class="bigfont">0.00</p></div>
                </div>                    
                <div class="row">
                    <div class="col-md-4"><p class="text-right bigfont">Net Amount : </p></div>
                    <div class="col-md-8"><p id="net_amount" class="bigfont">0.00</p></div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
