<div id="bill-div">
    <h4>Items</h4>
    <table class="table table-hover table-condensed table-bordered">
        <thead>
        <th>Bill No.</th>
        <th>Item Code</th>
        <th>Item Name</th>
        <th>Qty</th>
        <th>Discount</th>
        <th># of Items</th>
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
        </tbody>
    </table>
    <br/>
</div>