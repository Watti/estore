<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#additem_text").keyup(function() {
            var urlbase = "<?php echo base_url(); ?>stock/ajax_get_matching_items/";
            var arg1 = $("#billId").val();
            //alert(arg1);
            var arg2 = $("#additem_text").val();
            if (arg2) {
            } else {
                arg2 = -1;
            }

            var url = urlbase.concat(arg2);
            if (arg1)
                url = url.concat("/").concat(arg1);

            //alert(url);
            $("tbody").load(url, function(responseTxt, statusTxt, xhr) {
                if (statusTxt == "error") {
                    alert("Error: " + xhr.status + ": " + xhr.statusText);
                }
            });
        });
        $("#sh").click(function() {
            var v = $("tbody").html();
            alert(v);
        });
    });
</script>

<!--<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Add Bill Item</title>
        <link href="<php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" />
        <link href="<php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" />
    </head>
    <body>
        <a href="#" id="sh">click</a>-->
<div id="addbillitem-form-wrapper" class="container-fluid">
    <div class="row">
        <div id="addbillitem-form" class="panel panel-default">
            <div class="panel-heading" class="panel-heading">
                <h4>Add Bill Item</h4>
            </div>
            <div class="panel-body">
                <!--<form method="post" action="<php echo base_url(); ?>bill/add/<php echo urlencode(base64_encode($bill_id)); ?>">-->
                <div class="form-group">
                    <label for="item_code">Item Code </label> 
                    <input id="additem_text" class="form-control" type="text" name="itemprice_code" />           
                    <input id="billId" class="form-control" type="hidden" name="billid" value="<?php if (isset($bill_id)): echo urlencode(base64_encode($bill_id));
endif;
?>" />
                </div>
                <div class="form-group">
                    <table class="table table-hover table-condensed table-bordered">
                        <thead>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th>Category Code</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Unit Price</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="8">No Entries</td>
                            </tr> 
                        </tbody>
                    </table>
                    <!--                    <div class="form-group">
                                            <input type="submit" value="Add" class="btn btn-primary"/>
                                        </div>-->
                    <!--</form>-->        
                </div>
            </div>
        </div>
    </div>
</div>
<!--        <script src="<php echo base_url(); ?>assets/js/jquery.js" type="text/javascript"></script>
<script src="<php echo base_url(); ?>assets/js/jquery-ui.js" type="text/javascript"></script>
<script src="<php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<php echo base_url(); ?>assets/js/custom.js" type="text/javascript"></script>
</body>
</html>-->