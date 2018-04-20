<!DOCTYPE html>
<html>
    <?php require_once(APPPATH . 'views/table-css.php'); ?>
    <body class="with-side-menu-addl-full">

        <div class="container-fluid">
            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h2>Invoices</h2>
                        </div>
                    </div>
                </div>
            </header>
            <section class="card">
                <div class="card-block">
                    <table id="example" class="display table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>No</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Vendor</th>
                                <th>Customer</th> 
                                <th>Method</th>
                                <th>Total</th>
                                <th>Terms</th>                               
                                <th>Tax</th>
                                <th>Paid</th>
                                <th>Balance</th>
                                <th>Amount</th>
                                <th>Product Count</th>
                                <th>By</th>
                                <th>Sync</th>
                                <th class="hidden-phone">Created</th>
                                <th class="hidden-phone">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>No</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Vendor</th>
                                <th>Customer</th> 
                                <th>Method</th>
                                <th>Total</th>
                                <th>Terms</th>                               
                                <th>Tax</th>
                                <th>Paid</th>
                                <th>Balance</th>
                                <th>Amount</th>
                                <th>Product Count</th>
                                <th>By</th>
                                <th>Sync</th>
                                <th class="hidden-phone">Created</th>
                                <th class="hidden-phone">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if (is_array($c) && count($c)) {
                                foreach ($c as $l) {
                                    $id = $l->Id;
                                    ?>  
                                    <tr class="odd edit_tr" id="<?php echo $id; ?>">                                        
                                        <td id="date:<?php echo $id; ?>" contenteditable="true"><?php echo $l->date; ?></td>
                                        <td><?php echo $l->No; ?></td>
                                        <td><?php echo $l->Type; ?></td>
                                        <td><?php echo $l->Category; ?></td>
                                        <td><?php echo $l->Vendor; ?></td>
                                        <td><?php echo $l->Customer; ?></td>
                                        <td><?php echo $l->Method; ?></td>
                                        <td id="total:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Total; ?></td>
                                        <td id="terms:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Terms; ?></td>
                                        <td id="tax:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Tax; ?></td>
                                        <td id="paid:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Paid; ?></td>
                                        <td id="balance:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Balance; ?></td> 
                                        <td id="amount:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Amount; ?></td> 
                                        <td id="itemCount:<?php echo $id; ?>" contenteditable="true"><?php echo $l->ItemCount; ?></td> 
                                        <td><?php echo $l->user; ?></td>
                                        <td><?php echo $l->Sync; ?></td>
                                        <td><?php echo $l->Created; ?></td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button onclick="window.location.href = '<?php echo base_url() . "index.php/invoice/profile/" . $l->Id; ?>'" type="button" class="green tabledit-edit-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-pencil"></span></button>
                                                <button onclick="window.location.href = '<?php echo base_url() . "index.php/invoice/delete/" . $l->Id; ?>'" type="button" class="red tabledit-delete-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </section>
        </div><!--.container-fluid-->

        <?php require_once(APPPATH . 'views/table-js.php'); ?>

    </body>
</html>
<script>
    $(document).ready(function () {

        $("#category").hide();
        $(function () {
            //acknowledgement message
            var message_status = $("#category");
            $("td[contenteditable=true]").blur(function () {
                var field_id = $(this).attr("id");
                var value = $(this).text();
                $.post('<?php echo base_url() . "index.php/invoice/update/"; ?>', field_id + "=" + value, function (data) {
                    if (data != '')
                    {
                        message_status.show();
                        message_status.text(data);
                        //hide the message
                        setTimeout(function () {
                            message_status.hide()
                        }, 4000);
                    }
                });
            });

        });
    });

</script>

