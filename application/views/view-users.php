<?php require_once(APPPATH . 'views/inner-css.php'); ?>

<div class="col-md-12">

    <?php echo $this->session->flashdata('msg'); ?>

    <div class="alert alert-info" id="status"></div>

    <div class="row-fluid">
        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th><a href="#modal-form" role="button" class="green" data-toggle="modal"><i class="icon-pencil bigger-130"></i>Add </a> </th>
                    <th>First name</th>
                    <th>Sur name</th>
                    <th>Primary Contact</th>
                    <th>Contact</th>
                    <th>Role/Designation</th>                                    
                    <th>email</th>
                    <th>Nationality</th>
                    <th>Address</th>
                    <th class="hidden-phone">Active</th>
                    <th class="hidden-phone">Created</th>

                    <th class="hidden-phone">Reset password</th>
                    <th class="hidden-phone">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (is_array($users) && count($users)) {
                    foreach ($users as $loop) {
                        $id = $loop->id;
                        $role = $loop->roles;
                        ?>  
                        <tr class="odd edit_tr" id="<?php echo $id; ?>">

                            <td > 
                                <?php
                                if ($loop->image != "") {

                                    echo '<img height="50px" width="50px" src="data:image/jpeg;base64,' . $loop->image . '" />';
                                } else {
                                    ?>
                                    <img  height="50px" width="50px"  src="<?= base_url(); ?>images/user_place.png"  />
                                    <?php
                                }
                                ?>
                            </td>
                            <td id="lastname:<?php echo $loop->id; ?>" contenteditable="true">
                                <?php echo $loop->lastname; ?>
                            </td>
                            <td id="surname:<?php echo $loop->id; ?>" contenteditable="true">
                                <?php echo $loop->surname; ?>
                            </td>
                            <td id="contact:<?php echo $loop->id; ?>" contenteditable="true">
                                <?php echo $loop->contact; ?>
                            </td>
                            <td id="contact2:<?php echo $loop->id; ?>" contenteditable="true">
                                <?php echo $loop->contact2; ?>
                            </td>
                            <td class="edit_td">
                                <span id="role_<?php echo $id; ?>" class="text"><?php echo $role; ?></span>                                      
                                <select  name="type" class="editbox" id="role_input_<?php echo $id; ?>" >
                                    <option value="<?php echo $role; ?>" title="<?php echo $role; ?>"><?php echo $role; ?></option>

                                    <?php
                                    if (is_array($roles) && count($roles)) {
                                        foreach ($roles as $loops) {
                                            ?>                        
                                            <option value="<?= $loops->id ?>" /><?= $loops->name ?>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </td>  
                            <td ><?php echo $loop->email; ?></td>
                            <td ><?php echo $loop->nationality; ?></td>

                            <td id="address:<?php echo $loop->id; ?>" contenteditable="true">
                                <?php echo $loop->address; ?>
                            </td>
                            <td id="active:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->active; ?></td>
                            <td id="created:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->created; ?></td>

                            <td>
                                <a href="#"  value="<?php echo $loop->id; ?>"  id="myLink" onclick="NavigateToSite(this)" class="tooltip-error text-danger" data-rel="tooltip" title="reset">
                                    <span class="red">
                                        <i class="icon-lock bigger-120 text-danger"></i>
                                        Reset
                                    </span>
                                </a>
                            </td>
                            <td class="td-actions">
                                <div class="hidden-phone visible-desktop action-buttons">
                                    <a class=" blue" href="<?php echo base_url() . "index.php/user/profile/" . $loop->id; ?>">  <i class="icon-pencil"></i></a>

                                    <a class=" red" href="<?php echo base_url() . "index.php/user/delete/" . $loop->id; ?>"><li class="fa fa-trash-o"></li></a>
                                </div>
                            </td> 


                        </tr>
                        <?php
                    }
                }
                ?>

            </tbody>

        </table>
    </div><!--/table-responsive-->
</div><!--/porlets-content-->


<div id="modal-form" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Please fill the user details</h4>
    </div>
    <form id="station-form" parsley-validate novalidate role="form" class="form-horizontal" name="login-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/user/create'  method="post">
        <div class="modal-body overflow-visible"> 

            <div class="row-fluid">    

                <div class=" span6">
                    <div class="form-group">                    
                        <label >Profile picture</label>                        
                        <input type="file" name="userfile" id="userfile" class="btn-default btn-small form-control"/>
                        <div id="imagePreview" ></div>                      
                    </div>
                    <div class="form-group">                        
                        <input type="text" name="no" value="<?php echo $this->session->userdata('code') . '-' . date('d-m-Y') . '/W' . (count($users) + 1); ?>" placeholder="Registration No." id="no" required class="form-control"/>

                    </div>
                    <div class="form-group">                        
                        <input type="text" name="surname" placeholder="sur name" id="surname" required class="form-control"/>

                    </div>
                    <div class="form-group">                        
                        <input type="text" name="lastname" placeholder="Last name" id="lastname" required class="form-control"/>

                    </div>
                    <div class="form-group">                        
                        <input type="number" name="contact" placeholder="256" id="contact"  class="form-control"/>

                    </div>
                    <div class="form-group">                        
                        <input type="number" name="contact2" placeholder="256" id="contact2"  class="form-control"/>

                    </div>
                    <div class="control-group">                        
                        <input type="email" name="email" placeholder="E-mail" id="email"  class="form-control"/>

                    </div>
                    <div class="form-group">                        
                        <input type="text" name="nationality" placeholder="Nationality" id="nationality" class="form-control"/>
                    </div>
                    <div class="form-group">                       
                        <label >Gender</label>
                        <select class="form-control" id="gender" name="gender"> 

                            <option value="Male">Male</option> 
                            <option value="Female">Female</option>                                  
                        </select>                       
                    </div><!--/form-group-->
                    <div class="form-group">                       
                        <label >Designation</label>
                        <select class="form-control" id="designation" name="designation"> 

                            <option value="Partner">Partner</option> 
                            <option value="Associate">Associate</option>  
                            <option value="Associate">Administrative</option> 
                            <option value="Associate">Other</option>  

                        </select>                       
                    </div><!--/form-group-->
                    <div class="form-group">                        
                        <input type="text" name="address" placeholder="Address" id="address" class="form-control"/>

                    </div>
                </div>
                <div class="span6">

                    <div class="form-group">                    

                        <label>Select role</label>

                        <input class="easyui-combobox form-control" name="role" id="role" style="width:100%;height:26px" data-options="
                               url:'<?php echo base_url() ?>index.php/role/lists',
                               method:'get',
                               valueField:'name',
                               textField:'name',
                               multiple:false,
                               panelHeight:'auto'


                               ">
                    </div>

                    <div class="form-group">
                        <label>Supervisor</label>
                        <input class="easyui-combobox form-control" name="userID" id="userID" style="width:100%;height:26px" data-options="
                               url:'<?php echo base_url() ?>index.php/user/lists',
                               method:'get',
                               valueField:'id',
                               textField:'surname',
                               multiple:false,
                               panelHeight:'auto'                               
                               ">
                    </div>
                    <div class="form-group">                       
                        <label >Department</label>
                        <select class="form-control" id="department" name="department"> 
                            <option value="Legal">Legal</option> 
                            <option value="Accounting">Accounting and Finance</option> 
                            <option value="Administrative">Administrative</option> 
                            <option value="Other">Other</option> 
                        </select>                       
                    </div><!--/form-group-->
                    <div class="form-group">                       
                        <label >Active</label>
                        <select class="form-control" id="active" name="active"> 

                            <option value="true">true</option> 
                            <option value="false">false</option>                                  
                        </select>                       
                    </div><!--/form-group-->

                    <div class="form-group">
                        <label for="email">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" />                                                   

                    </div>
                    <div class="form-group">
                        <label for="pwd">Confirm password:</label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm password" value="" />

                    </div>

                </div>
                <div class="">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>  <button class="btn btn-success pull-right" type="submit">SUBMIT</button> 

                </div>
            </div>

        </div>
    </form>


</div>

<?php require_once(APPPATH . 'views/inner-js.php'); ?>

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
                $.post('<?php echo base_url() . "index.php/user/update/"; ?>', field_id + "=" + value, function (data) {
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
<script type="text/javascript">
    $(function () {
        $("#userfile").on("change", function ()
        {
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader)
                return; // no file selected, or no FileReader support

            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function () { // set image data as background of div
                    $("#imagePreview").css("background-image", "url(" + this.result + ")");
                }
            }
        });
    });
</script>
<script>

    function NavigateToSite(ele) {
        var selectedVal = $(ele).attr("value");
        //var selectedVal = document.getElementById("myLink").getAttribute('value');
        //href= "index.php/patient/add_user/'
        $.post("<?php echo base_url() ?>index.php/user/reset", {
            userID: selectedVal
        }, function (response) {
            alert(response);
        });

    }
    function SelectedRole(ele) {


        $('#loading_card').show();


        var role = $("input[name=role]").val();

        if (role.length > 0) {

            $.post("<?php echo base_url() ?>index.php/role/details", {role: role}
            , function (response) {
                //#emailInfo is a span which will show you message

                $('#loading_card').hide();
                setTimeout(finishAjax('loading_card', escape(response)), 200);

            }).fail(function (e) {
                console.log(e);
            }); //end change
        } else {
            alert("Please insert missing information");
            $('#loading_card').hide();
        }

        function finishAjax(id, response) {
            $('#' + id).html(unescape(response));
            $('#' + id).fadeIn();
        }
    }


</script>
<script type="text/javascript">
    $(document).ready(function ()
    {
        $(".editbox").hide();

        $(".edit_tr").click(function ()
        {
            var ID = $(this).attr('id');

            $("#role" + ID).hide();
            $("#role_input_" + ID).show();


        }).change(function ()
        {
            var ID = $(this).attr('id');
            var role = $("#role_input_" + ID).val();


            var dataString = 'id=' + ID + '&role=' + role;

            $("#role_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif" />'); // Loading image

            if (role.length > 0)
            {

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . "index.php/user/updating/"; ?>",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {

                        $("#role_" + ID).html(role);


                    }
                });
            } else
            {
                alert('Enter something.');
            }
            location.reload();
        });

        // Edit input box click action
        $(".editbox").mouseup(function ()
        {
            return false
        });

        // Outside click action
        $(document).mouseup(function ()
        {
            $(".editbox").hide();
            $(".text").show();
        });

    });
</script>


<script src="<?= base_url(); ?>js/validator.js"></script>