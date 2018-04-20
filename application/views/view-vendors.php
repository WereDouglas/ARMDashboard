<!DOCTYPE html>
<html>
    <?php require_once(APPPATH . 'views/table-css.php'); ?>
    <body class="with-side-menu-addl-full">

        <div class="container-fluid">
            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h2>Vendors</h2>
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
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>No</th> 
                                <th>City</th>
                                <th>State</th>
                                <th>Zip</th>                               
                                <th>Category</th>
                                <th>Sync</th>
                                <th class="hidden-phone">Created</th>
                                <th class="hidden-phone">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>No</th> 
                                <th>City</th>
                                <th>State</th>
                                <th>Zip</th>                               
                                <th>Category</th>
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
                                        <td id="email:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Email; ?></td>
                                        <td id="contact:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Contact; ?></td>
                                         
                                        <td id="address:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Address; ?></td>
                                        <td><?php echo $l->No; ?></td>
                                        <td id="city:<?php echo $id; ?>" contenteditable="true"><?php echo $l->City; ?></td>
                                        <td id="state:<?php echo $id; ?>" contenteditable="true"><?php echo $l->State; ?></td>
                                        <td id="zip:<?php echo $id; ?>" contenteditable="true"><?php echo $l->Zip; ?></td>                                   
                                        <td class="edit_td">
                                            <span id="category_<?php echo $id; ?>" class="text"><?php echo $l->Category; ?></span>                                      
                                            <select  name="category" class="editbox" id="category_input_<?php echo $id; ?>" >
                                                <option value="<?php echo $l->Category; ?>" title="<?php echo $l->Category; ?>"><?php echo $l->Category; ?></option>
                                                <option value="Client" />Client
                                                <option value="Patient" />Patient
                                            </select>
                                        </td>  

                                        <td><?php echo $l->Sync; ?></td>
                                        <td><?php echo $l->Created; ?></td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button onclick="window.location.href = '<?php echo base_url() . "index.php/customer/profile/" . $l->Id; ?>'" type="button" class="green tabledit-edit-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-pencil"></span></button>
                                                <button onclick="window.location.href = '<?php echo base_url() . "index.php/customer/delete/" . $l->Id; ?>'" type="button" class="red tabledit-delete-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>
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
                $.post('<?php echo base_url() . "index.php/vendor/update/"; ?>', field_id + "=" + value, function (data) {
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

