<!DOCTYPE html>
<html>
    <head lang="en">
        <link rel="stylesheet" href="<?= base_url(); ?>css/mine.css" /> 
        <link rel="stylesheet" href="<?= base_url(); ?>css/lib/datatables-net/datatables.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/separate/vendor/datatables-net.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/lib/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/lib/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/main.css">

    </head>
    <body class="with-side-menu-addl-full">


        <div class="container-fluid">
            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h2>Deliveries</h2>

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
                                <th>#Image</th>
                                <th>By</th>
                                <th>#Image</th>
                                <th>Customer</th>
                                <th>Comments</th>
                                <th>Delivered By</th>
                                <th>Date Received</th>
                                <th>Received By</th>
                                <th>Signature</th>
                                <th>Total</th>                                
                                <th>Sync</th>
                                <th class="hidden-phone">Created</th>
                                <th class="hidden-phone">Action</th>
                                <th>Products</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>No</th>
                                <th>Type</th>
                                <th>#Image</th>
                                <th>By</th>
                                <th>#Image</th>
                                <th>Customer</th>
                                <th>Comments</th>
                                <th>Delivered By</th>
                                <th>Date Received</th>
                                <th>Received By</th>
                                <th>Signature</th>
                                <th>Total</th>                                
                                <th>Sync</th>
                                <th class="hidden-phone">Created</th>
                                <th class="hidden-phone">Action</th>
                                <th>Products</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if (is_array($d) && count($d)) {
                                foreach ($d as $l) {
                                    $id = $l->Id;
                                    ?>  
                                    <tr>
                                        <td><?php echo $l->Date; ?></td>
                                        <td><?php echo $l->No; ?></td>
                                        <td id="type:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Type; ?></td>
                                        <td> 
                                            <?php
                                            if ($l->Image != "") {
                                                echo '<img height="50px" width="50px" src="data:image/jpeg;base64,' . $l->userImage . '" />';
                                            } else {
                                                ?>
                                                <img  height="50px" width="50px"  src="<?= base_url(); ?>images/user_place.png"  />
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $l->user; ?></td>
                                        <td> 
                                            <?php
                                            if ($l->Image != "") {
                                                echo '<img height="50px" width="50px" src="data:image/jpeg;base64,' . $l->customerImage . '" />';
                                            } else {
                                                ?>
                                                <img  height="50px" width="50px"  src="<?= base_url(); ?>images/user_place.png"  />
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $l->customer; ?></td>
                                        <td id="comments:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Comments; ?></td>
                                        <td id="DeliveredBy:<?php echo $id; ?>" contenteditable="true"><?php echo $l->DeliveredBy; ?></td>
                                        <td id="DateReceived:<?php echo $id; ?>" contenteditable="true"><?php echo $l->DateReceived; ?></td>
                                        <td id="ReceivedBy:<?php echo $id; ?>" contenteditable="true"><?php echo $l->ReceivedBy; ?></td>
                                        <td id="Signature:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Signature; ?></td>
                                        <td id="Total:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Total; ?></td>                                       

                                        <td><?php echo $l->Sync; ?></td>
                                        <td><?php echo $l->Created; ?></td>                                        
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button onclick="window.location.href = '<?php echo base_url() . "index.php/product/profile/" . $l->Id; ?>'" type="button" class="green tabledit-edit-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-pencil"></span></button>
                                                <button onclick="window.location.href = '<?php echo base_url() . "index.php/product/delete/" . $l->Id; ?>'" type="button" class="red tabledit-delete-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>
                                            </div>
                                        </td>
                                        <th>
                                            <table class="table table-bordered">

                                                <?php
                                                if (is_array($c) && count($c)) {
                                                    foreach ($c as $p) {
                                                        if($p->No==$l->No) {
                                                            $id = $p->Id;
                                                            ?>  
                                                            <tr>
                                                                <td><?php echo $p->Date; ?></td>
                                                                <td><?php echo $p->No; ?></td>
                                                                <td id="type:<?php echo $id; ?>" contenteditable="true"><?php echo $p->Type; ?></td>
                                                                <td> 
                                                                    <?php
                                                                    if ($l->Image != "") {
                                                                        echo '<img height="50px" width="50px" src="data:image/jpeg;base64,' . $p->Image . '" />';
                                                                    } else {
                                                                        ?>
                                                                        <img  height="50px" width="50px"  src="<?= base_url(); ?>images/user_place.png"  />
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $p->product; ?></td>                                                           
                                                                <td><?php echo $p->Total; ?></td>
                                                                <td><?php echo $p->Qty; ?></td>
                                                                <td><?php echo $p->Cost; ?></td>
                                                                <td><?php echo $p->Sync; ?></td>
                                                                <td><?php echo $p->Created; ?></td>                                        
                                                                <td>
                                                                    <div class="btn-group btn-group-sm">
                                                                        <button onclick="window.location.href = '<?php echo base_url() . "index.php/deliveries/delete/" . $p->Id; ?>'" type="button" class="red tabledit-delete-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </table>
                                        </th>
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


        <script src="<?= base_url(); ?>js/lib/jquery/jquery-3.2.1.min.js"></script>
        <script src="<?= base_url(); ?>js/lib/popper/popper.min.js"></script>
        <script src="<?= base_url(); ?>js/lib/tether/tether.min.js"></script>
        <script src="<?= base_url(); ?>js/lib/bootstrap/bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>js/plugins.js"></script>

        <script src="<?= base_url(); ?>js/lib/datatables-net/datatables.min.js"></script>

        <script>
                                                                        $(function () {
                                                                            $('#example').DataTable({
                                                                                responsive: true
                                                                            });
                                                                        });
        </script>

        <script src="<?= base_url(); ?>js/app.js"></script>
    </body>
</html>
<script>
                                                                        $(document).ready(function () {
                                                                            $('#loading_card').hide();
                                                                            $("#status").hide();
                                                                            $(function () {
                                                                                //acknowledgement message
                                                                                var message_status = $("#status");
                                                                                $("td[contenteditable=true]").blur(function () {
                                                                                    var field_id = $(this).attr("id");
                                                                                    var value = $(this).text();
                                                                                    $.post('<?php echo base_url() . "index.php/product/update/"; ?>', field_id + "=" + value, function (data) {
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

