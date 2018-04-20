<!DOCTYPE html>
<html>

    <?php require_once(APPPATH . 'views/table-css.php'); ?>
    <body class="with-side-menu-addl-full">


        <div class="container-fluid">
            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h2>Patient Insurance</h2>

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
                                <th>Customer</th>
                                <th>Company</th>
                                <th>Type</th>                                                         
                                <th>Logo</th>
                                <th>No.</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Zip</th>
                                <th class="hidden-phone">Created</th>
                                <th class="hidden-phone">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Company</th>
                                <th>Type</th>                                                         
                                <th>Logo</th>
                                <th>No.</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Zip</th>
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
                                        <td> 
                                            <?php
                                            if ($l->Image != "") {
                                                echo '<img height="50px" width="50px" src="data:image/jpeg;base64,' . $l->customerImage . '" />';
                                            } else {
                                                ?>
                                                <img  height="50px" width="50px"  src="<?= base_url(); ?>img/temp.png"  />
                                                <?php
                                            }
                                            ?>
                                        </td>

                                        <td><?php echo $l->customer; ?></td>
                                        <td id="Name:<?php echo $l->Id; ?>" contenteditable="true">
                                            <?php echo $l->Name; ?>
                                        </td>
                                        <td id="Type:<?php echo $l->Id; ?>" contenteditable="true">
                                            <?php echo $l->Type; ?>
                                        </td>
                                        <td> 
                                            <?php
                                            if ($l->Image != "") {
                                                echo '<img height="50px" width="50px" src="data:image/jpeg;base64,' . $l->Image . '" />';
                                            } else {
                                                ?>
                                                <img  height="50px" width="50px"  src="<?= base_url(); ?>img/temp.png"  />
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $l->No; ?></td>
                                        <td id="Address:<?php echo $l->Id; ?>" contenteditable="true">
                                            <?php echo $l->Address; ?>
                                        </td> 
                                        <td id="Zip:<?php echo $l->Id; ?>" contenteditable="true">
                                            <?php echo $l->Zip; ?>
                                        </td> 

                                        <td><?php echo $l->Created; ?></td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button onclick="window.location.href = '<?php echo base_url() . "index.php/insurance/delete/" . $l->Id; ?>'" type="button" class="red tabledit-delete-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>
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
                $.post('<?php echo base_url() . "index.php/insurance/update/"; ?>', field_id + "=" + value, function (data) {
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

