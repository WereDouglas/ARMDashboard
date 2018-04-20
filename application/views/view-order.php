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
                            <h2>Orders</h2>

                        </div>
                    </div>
                </div>
            </header>
            <section class="card">
                <div class="card-block">
                    <table id="example" class="display table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Order Date</th>
                                <th>#Image</th>
                                <th>Customer</th>
                                <th>#Image</th>
                                <th>User</th>
                                <th>#Image</th>
                                <th>Product</th>
                                <th>Order By</th>
                                <th>Dispensed On</th>
                                <th>Dispensed By</th>
                                <th>Customer Type</th>
                                <th>Diagnosis</th>
                                <th>Surgery</th>
                                <th>Clinical Date</th>
                                <th>Equip Limits</th>
                                <th>Equip Height</th>
                                <th>Equip Weights</th>
                                <th>Equip Instructions</th>
                                <th>Equip Period</th>
                                <th>Setup Location</th>
                                <th>Setup Date</th>
                                <th>Discharge Location</th>
                                <th>Discharge Date</th>
                                <th>Notification</th>
                                <th>Notification Date</th>
                                <th>Authorization</th>
                                <th>Authorization Date</th>
                                <th class="hidden-phone">Created</th>
                                <th class="hidden-phone">Action</th>
                                <th>Actions</th>
                                <th>Other</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Order Date</th>
                                <th>#Image</th>
                                <th>Customer</th>
                                <th>#Image</th>
                                <th>User</th>
                                <th>#Image</th>
                                <th>Product</th>
                                <th>Order By</th>
                                <th>Dispensed On</th>
                                <th>Dispensed By</th>
                                <th>Customer Type</th>
                                <th>Diagnosis</th>
                                <th>Surgery</th>
                                <th>Clinical Date</th>
                                <th>Equip Limits</th>
                                <th>Equip Height</th>
                                <th>Equip Weights</th>
                                <th>Equip Instructions</th>
                                <th>Equip Period</th>
                                <th>Setup Location</th>
                                <th>Setup Date</th>
                                <th>Discharge Location</th>
                                <th>Discharge Date</th>
                                <th>Notification</th>
                                <th>Notification Date</th>
                                <th>Authorization</th>
                                <th>Authorization Date</th>
                                <th class="hidden-phone">Created</th>
                                <th class="hidden-phone">Action</th>
                                <th>Actions</th>
                                <th>Other</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if (is_array($d) && count($d)) {
                                foreach ($d as $l) {
                                    $id = $l->Id;
                                    ?>  
                                    <tr>
                                        <td><?php echo $l->OrderDateTime; ?></td>
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
                                        <td><?php echo $l->product; ?></td>
                                        <td> 
                                            <?php
                                            if ($l->Image != "") {
                                                echo '<img height="50px" width="50px" src="data:image/jpeg;base64,' . $l->itemImage . '" />';
                                            } else {
                                                ?>
                                                <img  height="50px" width="50px"  src="<?= base_url(); ?>images/user_place.png"  />
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $l->product; ?></td>
                                        <td><?php echo $l->OrderBy; ?></td>
                                        <td><?php echo $l->DispenseDateTime; ?></td>
                                        <td><?php echo $l->DispenseBy; ?></td>
                                        <td><?php echo $l->CustomerType; ?></td>
                                        <td><?php echo $l->Diagnosis; ?></td>
                                        <td><?php echo $l->Surgery; ?></td>
                                        <td><?php echo $l->ClinicalDate; ?></td>
                                        <td><?php echo $l->EquipmentLimits; ?></td>
                                        <td><?php echo $l->EquipmentHeights; ?></td>
                                        <td><?php echo $l->EquipmentWeights; ?></td>
                                        <td><?php echo $l->EquipmentInstructions; ?></td>                               
                                        <td><?php echo $l->EquipmentPeriod; ?></td>
                                        <td><?php echo $l->SetupLocation; ?></td>
                                        <td><?php echo $l->SetupDate; ?></td>
                                        <td><?php echo $l->DischargeLocation; ?></td>
                                        <td><?php echo $l->DischargeDate; ?></td>
                                        <td><?php echo $l->Notification; ?></td>
                                        <td><?php echo $l->NotificationDate; ?></td>
                                        <td><?php echo $l->Authoriz; ?></td>
                                        <td><?php echo $l->AuthorizationDate; ?></td>
                                        <td><?php echo $l->Created; ?></td> 
                                        <td><?php echo $l->Sync; ?></td>
                                        <td><?php echo $l->Action; ?></td> 
                                        <td><?php echo $l->Other; ?></td> 
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button onclick="window.location.href = '<?php echo base_url() . "index.php/order/profile/" . $l->Id; ?>'" type="button" class="green tabledit-edit-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-pencil"></span></button>
                                                <button onclick="window.location.href = '<?php echo base_url() . "index.php/order/delete/" . $l->Id; ?>'" type="button" class="red tabledit-delete-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>
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
                                                                $.post('<?php echo base_url() . "index.php/order/update/"; ?>', field_id + "=" + value, function (data) {
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

