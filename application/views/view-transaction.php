<!DOCTYPE html>
<html>
    <?php require_once(APPPATH . 'views/table-css.php'); ?>
    <body class="with-side-menu-addl-full">

        <div class="container-fluid">
            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h2>Sales & Purchases</h2>
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
                                <th>Product</th>
                                <th>Total</th>
                                <th>Quantity</th>
                                <th>Cost</th>
                                <th>Sync</th>
                                <th class="hidden-phone">Created</th>
                                <th class="hidden-phone">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>No</th>
                                <th>Product</th>
                                <th>Total</th>
                                <th>Quantity</th>
                                <th>Cost</th>
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
                                        <td id="date:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Date; ?></td>
                                        <td><?php echo $l->No; ?></td>
                                        <td><?php echo $l->itemID; ?></td>
                                        <td><?php echo $l->Total; ?></td>
                                        <td><?php echo $l->Qty; ?></td>
                                        <td><?php echo $l->Cost; ?></td>                                        
                                        <td><?php echo $l->Sync; ?></td>
                                        <td><?php echo $l->Created; ?></td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button onclick="window.location.href = '<?php echo base_url() . "index.php/transaction/delete/" . $l->Id; ?>'" type="button" class="red tabledit-delete-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>
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
                $.post('<?php echo base_url() . "index.php/transaction/update/"; ?>', field_id + "=" + value, function (data) {
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

