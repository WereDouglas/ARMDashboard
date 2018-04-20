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
                            <h2>Products</h2>

                        </div>
                    </div>
                </div>
            </header>
            <section class="card">
                <div class="card-block">
                    <table id="example" class="display table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Cost</th>
                                <th>Description</th>
                                <th>Manufacturer</th>
                                <th>Category</th>
                                <th>Barcode</th>
                                <th>Batch No.</th>
                                <th>Unit Of Measure</th>
                                <th>Measure Description</th>
                                <th>Serial No.</th>
                                <th>Sync</th>
                                <th class="hidden-phone">Created</th>
                                <th class="hidden-phone">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Cost</th>
                                <th>Description</th>
                                <th>Manufacturer</th>
                                <th>Category</th>
                                <th>Barcode</th>
                                <th>Batch No.</th>
                                <th>Unit Of Measure</th>
                                <th>Measure Description</th>
                                <th>Serial No.</th>
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
                                    <tr>
                                        <td> 
                                            <?php
                                            if ($l->Image != "") {
                                                echo '<img height="50px" width="50px" src="data:image/jpeg;base64,' . $l->Image . '" />';
                                            } else {
                                                ?>
                                                <img  height="50px" width="50px"  src="<?= base_url(); ?>images/user_place.png"  />
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td id="name:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Name; ?></td>
                                        <td id="type:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Type; ?></td>
                                        <td id="cost:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Cost; ?></td>
                                        <td id="Description:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Description; ?></td>
                                        <td id="Manufacturer:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Manufacturer; ?></td>
                                        <td id="Category:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Category; ?></td>
                                        <td id="barcode:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Barcode; ?></td>
                                        <td id="BatchNo:<?php echo $id; ?>" contenteditable="true"><?php echo $l->BatchNo; ?></td>
                                        <td id="UnitOfMeasure:<?php echo $id; ?>" contenteditable="true"><?php echo $l->UnitOfMeasure; ?></td>
                                        <td id="MeasureDescription:<?php echo $id; ?>" contenteditable="true"><?php echo $l->MeasureDescription; ?></td>
                                        <td id="SerialNo:<?php echo $id; ?>" contenteditable="true"><?php echo $l->SerialNo; ?></td>

                                        <td><?php echo $l->Sync; ?></td>
                                        <td><?php echo $l->Created; ?></td>                                        
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button onclick="window.location.href = '<?php echo base_url() . "index.php/product/profile/" . $l->Id; ?>'" type="button" class="green tabledit-edit-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-pencil"></span></button>
                                                <button onclick="window.location.href = '<?php echo base_url() . "index.php/product/delete/" . $l->Id; ?>'" type="button" class="red tabledit-delete-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>
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

