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
                            <h2>DME Instruction Delivery</h2>

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
                                <th>#Image</th>
                                <th>Customer</th>
                                <th>#Image</th>
                                <th>User</th>
                                <th>#Image</th>
                                <th>Product</th>
                                <th>Type</th>
                                <th>Alt Contact</th>
                                <th>Safety</th>
                                <th>Appropriate</th>
                                <th>Selection</th>
                                <th>Other</th>
                                <th>Phone</th>
                                <th>Equip Type</th>
                                <th>Equip Other</th>
                                <th>Additional</th>
                                <th>Additional Notes</th>
                                <th>Follow up</th>
                                <th>Signature</th>
                                <th>Kin</th>
                                <th>Next Of Kin Contact</th>
                                <th>Kin Address</th>
                                <th>Reason</th>
                                <th>Signature</th>
                                <th>Sync</th>
                                <th class="hidden-phone">Created</th>
                                <th class="hidden-phone">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>#Image</th>
                                <th>Customer</th>
                                <th>#Image</th>
                                <th>User</th>
                                <th>#Image</th>
                                <th>Product</th>
                                <th>Type</th>
                                <th>Alt Contact</th>
                                <th>Safety</th>
                                <th>Appropriate</th>
                                <th>Selection</th>
                                <th>Other</th>
                                <th>Phone</th>
                                <th>Equip Type</th>
                                <th>Equip Other</th>
                                <th>Additional</th>
                                <th>Additional Notes</th>
                                <th>Follow up</th>
                                <th>Signature</th>
                                <th>Kin</th>
                                <th>Next Of Kin Contact</th>
                                <th>Kin Address</th>
                                <th>Reason</th>
                                <th>Signature</th>
                                <th>Sync</th>
                                <th class="hidden-phone">Created</th>
                                <th class="hidden-phone">Action</th>

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
                                        <td><?php echo $l->Type; ?></td>
                                        <td><?php echo $l->AltContact; ?></td>
                                        <td><?php echo $l->Safety; ?></td>
                                        <td><?php echo $l->Appropriate; ?></td>
                                        <td><?php echo $l->AppropriateSelection; ?></td>
                                        <td><?php echo $l->SafetyOther; ?></td>
                                        <td><?php echo $l->Phone; ?></td>
                                        <td><?php echo $l->EquipmentType; ?></td>
                                        <td><?php echo $l->EquipmentOther; ?></td>
                                        <td><?php echo $l->Additional; ?></td>
                                        <td><?php echo $l->AdditionalNotes; ?></td>                               
                                        <td><?php echo $l->FollowUp; ?></td>
                                        <td><?php echo $l->Signature; ?></td>
                                        <td><?php echo $l->KinName; ?></td>
                                        <td><?php echo $l->KinContact; ?></td>
                                        <td><?php echo $l->KinAddress; ?></td>
                                        <td><?php echo $l->Reason; ?></td>
                                        <td><?php echo $l->UserSignature; ?></td>
                                        <td><?php echo $l->Sync; ?></td>
                                        <td><?php echo $l->Created; ?></td> 
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
                                                                $.post('<?php echo base_url() . "index.php/instruction/update/"; ?>', field_id + "=" + value, function (data) {
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

