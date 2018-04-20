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
                            <h2>Follow up Patient Care</h2>
                        </div>
                    </div>
                </div>
            </header>
            <section class="card">
                <div class="card-block">
                    <table id="example" class="display table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#Image</th>
                                <th>Customer</th>
                                <th>#Image</th>
                                <th>User</th>
                                <th>#Image</th>
                                <th>Product</th>                                
                                <th>Type</th>
                                <th>Diagnosis</th>
                                <th>Hospitalization</th>
                                <th>Source</th>
                                <th>Length</th>
                                <th>Need</th>
                                <th>Goals</th>
                                <th>Results</th>
                                <th>Recommend</th>
                                <th>Follow Up By Visit</th>
                                <th>Follow Up By Phone</th>                                
                                <th>Next Visit</th>
                                <th>P/U</th>
                                <th>Signature</th>
                                <th>Authorized By</th>
                                <th>Relationship</th>
                                <th>Reason</th>
                                <th class="hidden-phone">Created</th>
                                <th class="hidden-phone">Action</th>
                                <th>Reviews</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#Image</th>
                                <th>Customer</th>
                                <th>#Image</th>
                                <th>User</th>
                                <th>#Image</th>
                                <th>Product</th>                                
                                <th>Type</th>
                                <th>Diagnosis</th>
                                <th>Hospitalization</th>
                                <th>Source</th>
                                <th>Length</th>
                                <th>Need</th>
                                <th>Goals</th>
                                <th>Results</th>
                                <th>Recommend</th>
                                <th>Follow Up By Visit</th>
                                <th>Follow Up By Phone</th>                                
                                <th>Next Visit</th>
                                <th>P/U</th>
                                <th>Signature</th>
                                <th>Authorized By</th>
                                <th>Relationship</th>
                                <th>Reason</th>
                                <th class="hidden-phone">Created</th>
                                <th class="hidden-phone">Action</th>
                                <th>Reviews</th>
                                <th>Status</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if (is_array($d) && count($d)) {
                                foreach ($d as $l) {
                                    $id = $l->Id;
                                    ?>  
                                    <tr>
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
                                        <td><?php echo $l->user; ?></td>
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
                                        <td><?php echo $l->Type; ?></td>
                                        <td><?php echo $l->Diagnosis; ?></td>
                                        <td><?php echo $l->Hospitalisation; ?></td>
                                        <td><?php echo $l->Source; ?></td>
                                        <td><?php echo $l->Length; ?></td>
                                        <td><?php echo $l->Need; ?></td>
                                        <td><?php echo $l->Goal; ?></td>
                                        <td><?php echo $l->Results; ?></td>
                                        <td><?php echo $l->Recommend; ?></td>
                                        <td><?php echo $l->FollowVisit; ?></td>
                                        <td><?php echo $l->FollowPhone; ?></td>
                                        <td><?php echo $l->Next; ?></td>
                                        <td><?php echo $l->Pu; ?></td>
                                        <td><?php echo $l->Signature; ?></td>
                                        <td><?php echo $l->Authoriser; ?></td>
                                        <td><?php echo $l->Relationship; ?></td>
                                        <td><?php echo $l->Reason; ?></td>
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
                                                if (is_array($r) && count($r)) {
                                                    foreach ($r as $p) {
                                                        if ($p->FollowID == $l->Id) {
                                                            $id = $p->Id;
                                                            ?>  
                                                            <tr>
                                                                <td><?php echo $p->Title; ?></td>
                                                                <td><?php echo $p->Status; ?></td>
                                                                <td><?php echo $p->Details; ?></td>                                                                
                                                                <td><?php echo $p->Sync; ?></td>
                                                                <td><?php echo $p->Created; ?></td>                                        
                                                                <td>
                                                                    <div class="btn-group btn-group-sm">
                                                                        <button onclick="window.location.href = '<?php echo base_url() . "index.php/follow/delete/" . $p->Id; ?>'" type="button" class="red tabledit-delete-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>
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
                                        <th>
                                            <table class="table table-bordered">

                                                <?php
                                                if (is_array($s) && count($s)) {
                                                    foreach ($s as $p) {
                                                        if ($p->FollowID == $l->Id) {
                                                            $id = $p->Id;
                                                            ?>  
                                                            <tr>
                                                                <td><?php echo $p->Title; ?></td>
                                                                <td><?php echo $p->Status; ?></td>
                                                                <td><?php echo $p->Details; ?></td>                                                                
                                                                <td><?php echo $p->Sync; ?></td>
                                                                <td><?php echo $p->Created; ?></td>                                        
                                                                <td>
                                                                    <div class="btn-group btn-group-sm">
                                                                        <button onclick="window.location.href = '<?php echo base_url() . "index.php/follow/delete/" . $p->Id; ?>'" type="button" class="red tabledit-delete-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>
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

