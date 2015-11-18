<script>
function openAddItemWindow()
{
    window.open("", "Add_Bill_Item", "modal");
}
</script>
<div id="addbill-form" class="panel panel-default">
    <div class="panel-heading container-fluid">
        <!--<h4 align="left">Billing Form</h4>-->
        <div class="row">
            <div class="col-md-4">
                <h5><strong><em>Bill ID : 0124403</em></strong></h5>
            </div>
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">
                <h5><strong><em>Date/Time : 2015/03/25 09:32</em></strong></h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h5><strong><em>Branch : Nugegoda</em></strong></h5>
            </div>
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">
                <h5><strong><em>Billed By : Kumudu</em></strong></h5>
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
                        $allbills = $this->bill_model->get_all_bills();
                        ?>
                        <tr>
                            <td colspan="8">No Entries</td>
                        </tr>
                        <tr>
                            <td colspan="7">&nbsp;</td>
                            <td>
                                <a class="btn btn-primary" href="#" onclick="openAddItemWindow()" role="button">Add Item</a>
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
                <h4><strong><em>Cash : 2,420.50</em></strong></h4>
                <hr/>
                <h4><strong><em>Change : 2,420.50</em></strong></h4>
            </div>
        </div>
    </div>
</div>