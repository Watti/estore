<?php

if ($stockitems) {

    foreach ($stockitems as $item) {

        $itemcategory = $this->itemcategory_model->get_item_category_by_id($item->itemcategory_id);
        $itemprice = $this->itemprice_model->get_item_price_by_id($item->itemprice_id);

        echo '<tr>';
        echo '<td>' . $item->item_code . '</td>';
        echo '<td>' . $item->item_name . '</td>';
        echo '<td>' . $itemcategory->itemcategory_code . '</td>';
        echo '<td>' . $itemcategory->itemcategory_name . '</td>';
        echo '<td>' . $item->description . '</td>';
        echo '<td>' . $itemprice->unit_price . '</td>';
        echo '<td>';
        echo '<form action="' . base_url() . 'bill/add_billitem_db" method="POST">';
        if(isset($bill_id)):
        echo '<input type="hidden" name="bill_id" value="' . $bill_id. '" />';
        endif;
        echo '<input type="hidden" name="stock_id" value="' . $item->stock_id . '" />';
        echo '<input type="submit" class="btn btn-success btn-xs" value="Add" />';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="8">';
    echo 'No Data';
    echo '</td></tr>';
}
    
