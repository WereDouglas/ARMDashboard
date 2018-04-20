<!-- Bootstrap -->
<?php //var_dump($sch); ?>
<link href="<?php echo base_url(); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="<?php echo base_url(); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="<?php echo base_url(); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- FullCalendar -->
<link href="<?php echo base_url(); ?>vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">

<!-- Custom styling plus plugins -->
<link href="<?php echo base_url(); ?>build/css/custom.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url(); ?>css/mine.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/easyui.css?date=<?php echo date('Y-m-d') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/icon.css?date=<?php echo date('Y-m-d') ?>">
<style type="text/css" media="screen">

    table{
        border-collapse:collapse;
        border:0px solid #FF0000;
    }

    table td{
        border:0px solid #FF0000;
    }

    table tr{
        border:0px solid #FF0000;
    }
</style>
<div class="row container">
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="col-md-12 col-sm-12 col-xs-12"> <span class="info-box status col-md-12 col-sm-12 col-xs-12" id="status"></span></div>

        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">           
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#profile" id="profile-tab" role="tab" data-toggle="tab" aria-expanded="true">Profile</a>
                    </li>
                    <li role="presentation" class=""><a href="#client" id="client-tab" role="tab" data-toggle="tab" aria-expanded="true">Clients</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Time sheet</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Schedules</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Files</a>
                    </li>
                    <li role="presentation" class=""><a href="#document" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Documents</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="profile" aria-labelledby="home-tab">

                        <div  class="col-md-12" >

                            <table >
                                <h2>USER PROFILE</h2>
                                <tbody>
                                    <?php
                                    if (is_array($users) && count($users)) {
                                        foreach ($users as $loop) {
                                            ?>
                                            <tr class="odd">
                                                <td> 
                                                    <div class="profile_img">
                                                        <div id="crop-avatar">
                                                            <!-- Current avatar -->
                                                            <?php
                                                            echo '<img height="50px" width="50px" src="data:image/jpeg;base64,' . $loop->image . '" />';
                                                            ?>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                </td>
                                                <td></td>
                                                <td></td>


                                            </tr>
                                            <tr>
                                                <td>SUR NAME:</td>
                                                <td id="surname:<?php echo $loop->id; ?>" contenteditable="true">
                                                    <span class="green"><?php echo $loop->surname; ?></span> 
                                                </td>
                                                <td>LAST NAME:</td>
                                                <td id="lastname:<?php echo $loop->id; ?>" contenteditable="true"><span class="green"><?php echo $loop->lastname; ?></span></td>

                                            </tr>
                                              <tr>
                                                <td></td>
                                                <td >
                                                   
                                                </td>
                                                <td>EMAIL:</td>
                                                <td id="email:<?php echo $loop->id; ?>" contenteditable="true"><span class="green"><?php echo $loop->email; ?></span></td>

                                            </tr>
                                            <tr>
                                                <td>DESIGNATION:</td>
                                                <td id="roles:<?php echo $loop->id; ?>" contenteditable="true"><span class="red"><?php echo $loop->roles; ?></span></td>

                                                <td>STATUS:</td>
                                                <td id="status:<?php echo $loop->id; ?>" contenteditable="false"><span class="red"><?php echo $loop->status; ?></span></td>


                                            </tr>
                                            <tr>
                                                <td>CONTACT:</td>
                                                <td id="contact:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->contact; ?></td>

                                                <td></td>
                                                <td > </td>

                                            </tr>
                                            <tr>
                                                <td>

                                                    <form  enctype="multipart/form-data" class="form-horizontal form-label-left"  action='<?= base_url(); ?>index.php/user/update_image'  method="post">                                       

                                                        <input type="file" name="userfile" id="userfile" />
                                                        <div id="imagePreview" ></div>
                                                        <input type="hidden" name="userID" id="userID" value="<?php echo $loop->id; ?>" />                                                   
                                                        <input type="hidden" name="namer" id="namer" value="<?php echo $loop->name; ?>" />
                                                        <button id="send" type="submit" >Update picture</button>


                                                    </form>

                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php
                                                    //echo $this->session->userdata('email');
                                                    if ($loop->email == $this->session->userdata('email')) {
                                                        ?>
                                                        <form id="identicalForm"  enctype="multipart/form-data" class="form-horizontal form-label-left"  action='<?= base_url(); ?>index.php/user/update_password'  method="post">                                       


                                                            <h4>Change password</h4>
                                                            <div class="form-group">
                                                                <label for="email">Password:</label>
                                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" />                                                   

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="pwd">Confirm password:</label>
                                                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm password" value="" />

                                                            </div>  

                                                            <input type="hidden" name="userID" id="userID" value="<?php echo $loop->id; ?>" />     
                                                            <button id="send" class="btn btn-default" type="submit" >Change password</button>


                                                        </form>
                                                    <?php } ?>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div> 
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="client" aria-labelledby="home-tab">

                        <div  class="col-md-12" >
                            <table id="datatable" class="table table-striped table-bordered scroll ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>REGISTERED</th>
                                        <th>NAME</th>
                                        <th>EMAIL</th>                   
                                        <th>STATUS</th>
                                        <th>CONTACT</th>
                                        <th>ADDRESS</th>
                                        <th>CREATED:</th>
                                        <th>VIEW</th>

                                        <th>SEND E-MAIL</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    if (is_array($clients) && count($clients)) {
                                        foreach ($clients as $loop) {
                                            $name = $loop->name;
                                            $address = $loop->address;
                                            $email = $loop->email;
                                            $designation = $loop->designation;
                                            $status = $loop->status;
                                            $category = $loop->category;
                                            $id = $loop->clientID;
                                            $contact = $loop->contact;
                                            $created = $loop->created;
                                            ?>  
                                            <tr id="<?php echo $id; ?>" class="edit_tr">
                                                <td> 

                                                    <?php
                                                    echo '<img height="50px" width="50px" src="data:image/jpeg;base64,' . $loop->image . '" />';
                                                    ?>
                                                </td>
                                                <td class="edit_td">
                                                    <?php echo $loop->registration; ?>
                                                </td>    
                                                <td class="edit_td">
                                                    <span id="name_<?php echo $id; ?>" class="text"><?php echo $name; ?></span>
                                                    <input type="text" value="<?php echo $name; ?>" class="editbox" id="name_input_<?php echo $id; ?>"
                                                </td>
                                                <td class="edit_td">
                                                    <span id="email_<?php echo $id; ?>" class="text"><?php echo $email; ?></span>
                                                    <input type="text" value="<?php echo $email; ?>" class="editbox" id="email_input_<?php echo $id; ?>"
                                                </td>

                                                <td class="edit_td">
                                                    <span id="status_<?php echo $id; ?>" class="text"><?php echo $status; ?></span>                                                       
                                                    <select  name="status" class="editbox" id="status_input_<?php echo $id; ?>" >
                                                        <option value="<?php echo $status; ?>" /><?php echo $status; ?>
                                                        <option value="Partner" />Active
                                                        <option value="Associate" />Dull

                                                    </select>
                                                </td>  

                                                <td class="edit_td">
                                                    <span id="contact_<?php echo $id; ?>" class="text"><?php echo $contact; ?></span>
                                                    <input type="text" value="<?php echo $contact; ?>" class="editbox" id="contact_input_<?php echo $id; ?>"

                                                </td>
                                                <td class="edit_td">

                                                    <span id="address_<?php echo $id; ?>" class="text">
                                                        <?php
                                                        //echo $abstract;
                                                        // strip tags to avoid breaking any html
                                                        $string = strip_tags($address);

                                                        if (strlen($string) > 10) {

                                                            // truncate string
                                                            $stringCut = substr($string, 0, 10);

                                                            // make sure it ends in a word so assassinate doesn't become ass...
                                                            $string = substr($stringCut, 0, strrpos($stringCut, ' ')) . '... <a href="' . base_url() . "index.php/user/finding/" . $loop->id . '">Read More</a>';
                                                        }
                                                        echo $string;
                                                        ?>
                                                    </span>
                                                    <textarea type="text" value="<?php echo $address; ?>" class="editbox" id="address_input_<?php echo $id; ?>"><?php echo $address; ?></textarea>

                                                </td>
                                                <td class="edit_td">
                                                    <?php echo $created; ?>
                                                </td>                            
                                                <td class="edit_td">
                                                    <a class="btn btn-default btn-xs" href="<?php echo base_url() . "index.php/client/profile/" . $loop->name; ?>"><li class="fa fa-folder">View</li></a>

                                                </td>  
                                                <td class="edit_td">
                                                    <a class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm" ><li class="fa fa-mail-reply">E-mail</li></a>

                                                </td>  
                                                <td class="center">
                                                    <a class="btn-danger btn-small icon-remove" href="<?php echo base_url() . "index.php/client/delete/" . $id; ?>">delete</a>
                                                </td>

                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div> 
                    </div>

                    <div role="tabpanel" class="tab-pane fade in" id="tab_content1" aria-labelledby="home-tab">

                        <div  class="col-md-12" >
                            <table id="datatable" class="table table-striped table-bordered scroll ">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>USER</th>
                                        <th>NAME</th> 
                                        <th>START</th>                   
                                        <th>END</th>
                                        <th>FILE</th>
                                        <th>STATUS</th> 
                                        <th>HOURS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sum = 0;
                                    if (is_array($events) && count($events)) {
                                        foreach ($events as $loop) {

                                            $sum = $sum + $loop->hours;
                                            ?>  
                                            <tr class="odd">

                                                <td id="date:<?php echo $loop->id; ?>" contenteditable="true">
                                                    <span class="green"><?php echo $loop->date; ?></span> 
                                                </td>
                                                <td id="user:<?php echo $loop->id; ?>" contenteditable="true"><span class="blue"><?php echo $loop->user; ?></span> </td>

                                                <td id="name:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->name; ?></td>
                                                <td id="start:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->start; ?></td>
                                                <td id="end:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->end; ?></td>
                                                <td id="file:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->file; ?> </td>
                                                <td id="status:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->status; ?> </td>
                                                <td id="hours:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->hours; ?></td>


                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <tr class="even">

                                        <td></td>
                                        <td></td>
                                        <td></td> 
                                        <td></td> 
                                        <td></td>
                                        <td></td>  
                                        <td></td>    
                                        <td></td>

                                    </tr>
                                    <tr class="even">

                                        <td></td>
                                        <td></td>
                                        <td></td> 
                                        <td>TOTAL TASKS</td> 
                                        <td><?php echo count($events); ?></td>
                                        <td></td>  
                                        <td>TOTAL HRS</td>    
                                        <td><?php echo $sum; ?></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div> 
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <div id='calendar'></div> 
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        <table id="datatable2" class="table table-striped table-bordered scroll ">
                            <thead>
                                <tr>
                                    <th>DATE</th>
                                    <th>NO</th> 
                                    <th>CLIENT</th> 
                                    <th>FILE CONTACT</th> 
                                    <th>NAME</th>
                                    <th>CASE/NO</th>
                                    <th>NOTE</th>
                                    <th>STATUS</th> 
                                    <th>NEXT DUE</th>
                                    <th>C/O</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (is_array($files) && count($files)) {
                                    foreach ($files as $loop) {
                                        $color = "orange";
                                        if ($loop->due < date('Y-m-d') && $loop->progress != 'complete' || $loop->progress != 'closed') {
                                            $color = "red";
                                        } else {
                                            $color = "green";
                                        }
                                        ?>  
                                        <tr class="odd">

                                            <td id="created:<?php echo $loop->fileID; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->created; ?></span> 
                                            </td>
                                            <td id="no:<?php echo $loop->fileID; ?>" contenteditable="true"><?php echo $loop->no; ?></td>
                                            <td id="client:<?php echo $loop->fileID; ?>" contenteditable="true"><?php echo $loop->client; ?></td>
                                            <td id="contact:<?php echo $loop->fileID; ?>" contenteditable="true"><?php echo $loop->contact; ?></td>

                                            <td id="name:<?php echo $loop->fileID; ?>" contenteditable="true"><?php echo $loop->name; ?></td>
                                            <td id="case:<?php echo $loop->fileID; ?>" contenteditable="true"><?php echo $loop->case; ?></td>
                                            <td id="note:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="blue"><?php echo $loop->note; ?></span> </td>
                                            <td id="progress:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="<?php echo $color; ?>"><?php echo $loop->progress; ?></span> </td>
                                            <td id="due:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="<?php echo $color; ?>"><?php echo $loop->due; ?></span> </td>
                                            <td id="lawyer:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="<?php echo $color; ?>"><?php echo $loop->lawyer; ?></span> </td>


                                        </tr>
                                        <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>


                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="document" aria-labelledby="profile-tab">
                        <table id="datatable" class="table table-striped table-bordered scroll ">
                            <thead>
                                <tr>
                                    <th>CREATED</th>
                                    <th>NAME</th>
                                    <th>FILE</th>
                                    <th>CLIENT</th>
                                    <th>DETAILS</th>
                                    <th>C/O</th> 
                                    <th>NOTE</th>
                                    <th>ACTION</th> 
                                    <th>DOWNLOAD</th>
                                    <th>SIZE(kilobytes/Kbs)</th>


                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($docs as $loop) {
                                    ?>  
                                    <tr class="odd">

                                        <td id="created:<?php echo $loop->documentID; ?>" contenteditable="true">
                                            <span class="green"><?php echo $loop->created; ?></span>                        </td>
                                        <td id="name:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->name; ?></td>
                                        <td id="fileID:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->fileID; ?></td>
                                        <td id="client:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->client; ?></td>
                                        <td id="details:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->details; ?></td>
                                        <td id="lawyer:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->lawyer; ?></td>
                                        <td id="note:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->note; ?></td>

                                        <td class="center">
                                            <a class="btn btn-danger btn-xs" href="<?php echo base_url() . "index.php/document/delete/" . $loop->documentID; ?>"><li class="fa fa-trash">Delete</li></a>
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-successr btn-xs" href="<?php echo base_url() . "documents/" . $loop->fileUrl; ?>"><li class="fa fa-download">Download</li></a>
                                        </td>
                                        <td class="center">
                                            <?php echo $loop->sizes; ?>
                                        </td>

                                    </tr>

                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url(); ?>js/validator.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->

<!-- FullCalendar -->
<script src="<?php echo base_url(); ?>vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/fullcalendar/dist/fullcalendar.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>build/js/custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/datepicker/daterangepicker.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>-->
<script type="text/javascript" src="<?= base_url(); ?>js/jquery.easyui.min.js"></script>


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
    var theme = {
        color: [
            '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
            '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
        ],
        title: {
            itemGap: 8,
            textStyle: {
                fontWeight: 'normal',
                color: '#408829'
            }
        },
        dataRange: {
            color: ['#1f610a', '#97b58d']
        },
        toolbox: {
            color: ['#408829', '#408829', '#408829', '#408829']
        },
        tooltip: {
            backgroundColor: 'rgba(0,0,0,0.5)',
            axisPointer: {
                type: 'line',
                lineStyle: {
                    color: '#408829',
                    type: 'dashed'
                },
                crossStyle: {
                    color: '#408829'
                },
                shadowStyle: {
                    color: 'rgba(200,200,200,0.3)'
                }
            }
        },
        dataZoom: {
            dataBackgroundColor: '#eee',
            fillerColor: 'rgba(64,136,41,0.2)',
            handleColor: '#408829'
        },
        grid: {
            borderWidth: 0
        },
        categoryAxis: {
            axisLine: {
                lineStyle: {
                    color: '#408829'
                }
            },
            splitLine: {
                lineStyle: {
                    color: ['#eee']
                }
            }
        },
        valueAxis: {
            axisLine: {
                lineStyle: {
                    color: '#408829'
                }
            },
            splitArea: {
                show: true,
                areaStyle: {
                    color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                }
            },
            splitLine: {
                lineStyle: {
                    color: ['#eee']
                }
            }
        },
        timeline: {
            lineStyle: {
                color: '#408829'
            },
            controlStyle: {
                normal: {color: '#408829'},
                emphasis: {color: '#408829'}
            }
        },
        k: {
            itemStyle: {
                normal: {
                    color: '#68a54a',
                    color0: '#a9cba2',
                    lineStyle: {
                        width: 1,
                        color: '#408829',
                        color0: '#86b379'
                    }
                }
            }
        },
        map: {
            itemStyle: {
                normal: {
                    areaStyle: {
                        color: '#ddd'
                    },
                    label: {
                        textStyle: {
                            color: '#c12e34'
                        }
                    }
                },
                emphasis: {
                    areaStyle: {
                        color: '#99d2dd'
                    },
                    label: {
                        textStyle: {
                            color: '#c12e34'
                        }
                    }
                }
            }
        },
        force: {
            itemStyle: {
                normal: {
                    linkStyle: {
                        strokeColor: '#408829'
                    }
                }
            }
        },
        chord: {
            padding: 4,
            itemStyle: {
                normal: {
                    lineStyle: {
                        width: 1,
                        color: 'rgba(128, 128, 128, 0.5)'
                    },
                    chordStyle: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        }
                    }
                },
                emphasis: {
                    lineStyle: {
                        width: 1,
                        color: 'rgba(128, 128, 128, 0.5)'
                    },
                    chordStyle: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        }
                    }
                }
            }
        },
        gauge: {
            startAngle: 225,
            endAngle: -45,
            axisLine: {
                show: true,
                lineStyle: {
                    color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                    width: 8
                }
            },
            axisTick: {
                splitNumber: 10,
                length: 12,
                lineStyle: {
                    color: 'auto'
                }
            },
            axisLabel: {
                textStyle: {
                    color: 'auto'
                }
            },
            splitLine: {
                length: 18,
                lineStyle: {
                    color: 'auto'
                }
            },
            pointer: {
                length: '90%',
                color: 'auto'
            },
            title: {
                textStyle: {
                    color: '#333'
                }
            },
            detail: {
                textStyle: {
                    color: 'auto'
                }
            }
        },
        textStyle: {
            fontFamily: 'Arial, Verdana, sans-serif'
        }
    };



</script>
<!-- FullCalendar -->
<script>
    $(window).load(function () {


        var date = new Date(),
                d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear(),
                started,
                categoryClass;
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                $('#fc_create').click();

                started = start;
                ended = end;
                var allDay = !start.hasTime() && !end.hasTime();
                $("#date").val(moment(start).format("YYYY-MM-DD"));

                $(".antosubmit").on("click", function () {
                    var title = $("#title").val();
                    if (end) {
                        ended = end;
                    }

                    categoryClass = $("#event_type").val();

                    if (title) {
                        calendar.fullCalendar('renderEvent', {
                            title: title,
                            start: started,
                            end: end,
                            allDay: allDay
                        },
                                true // make the event "stick"
                                );
                    }

                    $('#title').val('');

                    calendar.fullCalendar('unselect');

                    $('.antoclose').click();

                    return false;
                });
            },
            eventClick: function (calEvent, jsEvent, view) {
                $('#fc_edit').click();
                $('#title2').val(calEvent.title);

                categoryClass = $("#event_type").val();

                $(".antosubmit2").on("click", function () {
                    calEvent.title = $("#title2").val();

                    calendar.fullCalendar('updateEvent', calEvent);
                    $('.antoclose2').click();
                });

                calendar.fullCalendar('unselect');
            },
            editable: true,
            events: [<?php

                                function clean($string) {
                                    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

                                    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
                                }

                                if (is_array($sch)) {

                                    foreach ($sch as $loop) {
                                        $mydate = $loop->date;
                                        $prior = $loop->priority;
                                        $days = $loop->period;

                                        $informations = '' . $loop->startTime . ': ' . clean($loop->details);
                                        $informations .= 'A/T:';
                                        $informations .= $loop->name . ' ';
                                        $d = (int) date("d", strtotime($mydate));
                                        $m = (int) date("m", strtotime($mydate)) - 1;
                                        $y = (int) date("Y", strtotime($mydate));

                                        switch ($prior) {
                                            case High:
                                                $className = 'label-important';
                                                break;
                                            case Medium:
                                                $className = 'label-success';
                                                break;
                                            case Low:
                                                $className = 'label-grey';
                                                break;
                                            case File:
                                                $className = 'label-blue';
                                                break;
                                        }
                                        ?>
                        {
                            title: '<?php echo $informations . '-' . $loop->name . '-' . ' ' . $loop->contact . '-' . $loop->email; ?>',
                            start: new Date(<?php echo $y; ?>, <?php echo $m; ?>, <?php echo $d; ?>),
                            className: '<?php echo $className; ?>'

                        },
        <?php
    }
}
?>]
        });
    });
</script>
<script>
    $(document).ready(function () {
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


    function myformatter(date) {
        var y = date.getFullYear();
        var m = date.getMonth() + 1;
        var d = date.getDate();
        return y + '-' + (m < 10 ? ('0' + m) : m) + '-' + (d < 10 ? ('0' + d) : d);
    }
    function myparser(s) {
        if (!s)
            return new Date();
        var ss = (s.split('-'));
        var y = parseInt(ss[0], 10);
        var m = parseInt(ss[1], 10);
        var d = parseInt(ss[2], 10);
        if (!isNaN(y) && !isNaN(m) && !isNaN(d)) {
            return new Date(y, m - 1, d);
        } else {
            return new Date();
        }
    }

</script>


<script src="<?= base_url(); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url(); ?>vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>

<script>
    $(document).ready(function () {
        var handleDataTableButtons = function () {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function () {
            "use strict";
            return {
                init: function () {
                    handleDataTableButtons();
                }
            };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
            keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
            ajax: "js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });

        TableManageButtons.init();


    });
</script>
<script>
    $(document).ready(function () {
        $('#identicalForm').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                confirmPassword: {
                    validators: {
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        }
                    }
                }
            }
        });
    });
</script>








