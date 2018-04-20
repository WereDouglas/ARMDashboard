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
<div class="row container">
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <span class="info-box status col-lg-12" id="status"></span>
            <table id="datatables">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>CLIENT</th>
                        <th>CONTACT</th> 
                        <th>NO</th>                   
                        <th>C/O</th>
                        <th>TYPE</th>
                        <th>STATUS</th>
                        <th>CASE</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_array($files) && count($files)) {
                        foreach ($files as $loop) {
                            ?>
                            <tr class="odd">
                                <td id="name:<?php echo $loop->fileID; ?>" contenteditable="true">
                                    <span class="green"><?php echo $loop->name; ?></span> 
                                </td>

                                <td id="client:<?php echo $loop->client; ?>" contenteditable="false">
                                    <span class="green"><?php echo $loop->client; ?></span> 
                                </td>
                                <td id="contact:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="green"><?php echo $loop->contact; ?></span></td>
                                <td id="no:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="red"><?php echo $loop->no; ?></span></td>
                                <td id="lawyer:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="red"><?php echo $loop->lawyer; ?></span></td>

                                <td id="type:<?php echo $loop->fileID; ?>" contenteditable="true"><?php echo $loop->type; ?></td>
                                <td id="status:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="blue"><?php echo $loop->status; ?></span> </td>
                                <td id="case:<?php echo $loop->fileID; ?>" contenteditable="true"><span class="blue"><?php echo $loop->case; ?></span> </td>


                            </tr>
                            <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">           
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Billable</a>
                    </li>

                    <li role="presentation" class=""><a href="#fees" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">PAYMENTS</a>
                    </li>
                    <li role="presentation" class=""><a href="#expenses" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">EXPENSES</a>
                    </li>
                    <li role="presentation" class=""><a href="#document" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Documents</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">


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
                                        <th>COST</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sum = 0;
                                    if (is_array($events) && count($events)) {
                                        foreach ($events as $loop) {

                                            $sum = $sum + $loop->cost;
                                            ?>  
                                            <tr class="odd">

                                                <td id="date:<?php echo $loop->id; ?>" contenteditable="true">
                                                    <span class="green"><?php echo $loop->dated; ?></span> 
                                                </td>
                                                <td id="user:<?php echo $loop->id; ?>" contenteditable="true"><span class="blue"><?php echo $loop->users; ?></span> </td>

                                                <td id="name:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->details; ?></td>
                                                <td id="starts:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->starts; ?></td>
                                                <td id="ends:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->ends; ?></td>
                                                <td id="file:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->file; ?> </td>
                                                <td id="status:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->status; ?> </td>
                                                <td id="hours:<?php echo $loop->id; ?>" contenteditable="true"><?php echo $loop->cost; ?></td>


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
                                        <td><?php echo number_format($sum); ?></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div> 
                    </div>

                  
                    <div role="tabpanel" class="tab-pane fade  in" id="fees" aria-labelledby="home-tab">


                        <div  class="col-md-12" >

                            <table id="datatable" class="table table-striped table-bordered scroll ">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>INVOICE/NO</th>                   
                                        <th>SERVICE</th>
                                        <th>FILE</th>
                                        <th>TYPE</th> 
                                        <th>QUANTITY</th> 
                                        <th>PRICE</th>                   
                                        <th>TOTAL AMOUNT</th>
                                        <th>BALANCE ON TRANSACTION</th>
                                        <th>RECEIVED BY</th>
                                        <th>WALLET</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    // var_dump($pay);
                                    foreach ($pay as $loop) {
                                        ?>  
                                        <tr class="odd">
                                            <td><?php echo $loop->date; ?></td>
                                            <td id="no:<?php echo $loop->id; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->no; ?></span>                      
                                            </td>
                                            <td id="services:<?php echo $loop->id; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->services; ?></span>                      
                                            </td>                         

                                            <td><?php echo $loop->file; ?></td>
                                            <td><?php echo $loop->type; ?></td>
                                            <td><?php echo $loop->qty; ?></td>
                                            <td><?php echo number_format(($loop->price), 2); ?></td>
                                            <td><?php echo number_format($loop->total, 2); ?></td>
                                            <td><?php echo number_format($loop->balance, 2); ?></td>
                                             <td><?php echo $loop->user; ?></td>
                                             <td><?php echo $loop->wallet; ?></td>
                                           
                                        </tr>

                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div> 
                    </div>
                    
                    <div role="tabpanel" class="tab-pane fade in" id="expenses" aria-labelledby="home-tab">

                        <div  class="col-md-12" >

                       <table id="datatable" class="table table-striped table-bordered scroll ">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>INVOICE/NO</th>                   
                                        <th>SERVICE</th>
                                        <th>FILE</th>
                                        <th>TYPE</th> 
                                        <th>QUANTITY</th> 
                                        <th>PRICE</th>                   
                                        <th>TOTAL AMOUNT</th>
                                        <th>BALANCE ON TRANSACTION</th>
                                        <th>RECEIVED BY</th>
                                        <th>WALLET</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    // var_dump($pay);
                                    foreach ($exp as $loop) {
                                        ?>  
                                        <tr class="odd">
                                            <td><?php echo $loop->date; ?></td>
                                            <td id="no:<?php echo $loop->id; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->no; ?></span>                      
                                            </td>
                                            <td id="services:<?php echo $loop->id; ?>" contenteditable="true">
                                                <span class="green"><?php echo $loop->services; ?></span>                      
                                            </td>                         

                                            <td><?php echo $loop->file; ?></td>
                                            <td><?php echo $loop->type; ?></td>
                                            <td><?php echo $loop->qty; ?></td>
                                            <td><?php echo number_format(($loop->price), 2); ?></td>
                                            <td><?php echo number_format($loop->total, 2); ?></td>
                                            <td><?php echo number_format($loop->balance, 2); ?></td>
                                             <td><?php echo $loop->user; ?></td>
                                             <td><?php echo $loop->wallet; ?></td>
                                           
                                        </tr>

                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div> 
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
                                    <th>ACTION</th> 
                                    <th>DOWNLOAD</th>   


                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($docs as $loop) {
                                    ?>  
                                    <tr class="odd">

                                        <td id="created:<?php echo $loop->documentID; ?>" contenteditable="true">
                                            <span class="green"><?php echo $loop->created; ?></span> 
                                        </td>
                                        <td id="name:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->name; ?></td>
                                        <td id="fileID:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->fileID; ?></td>
                                        <td id="client:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->client; ?></td>

                                        <td id="details:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->details; ?></td>
                                        <td id="lawyer:<?php echo $loop->documentID; ?>" contenteditable="true"><?php echo $loop->lawyer; ?></td>

                                        <td class="center">
                                            <a class="btn btn-danger btn-xs" href="<?php echo base_url() . "index.php/document/delete/" . $loop->documentID; ?>"><li class="fa fa-trash">Delete</li></a>
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-successr btn-xs" href="<?php echo base_url() . "documents/" . $loop->fileUrl; ?>"><li class="fa fa-download">Download</li></a>
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

<script src="<?= base_url(); ?>vendors/echarts/dist/echarts.min.js"></script>
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

    var echartBarLine = echarts.init(document.getElementById('mainb'), theme);

    echartBarLine.setOption({
        title: {
            x: 'center',
            y: 'top',
            padding: [0, 0, 20, 0],
            text: 'Service usage statistics',
            textStyle: {
                fontSize: 15,
                fontWeight: 'normal'
            }
        },
        tooltip: {
            trigger: 'axis'
        },
        toolbox: {
            show: true,
            feature: {
                dataView: {
                    show: true,
                    readOnly: false,
                    title: "Text View",
                    lang: [
                        "Text View",
                        "Close",
                        "Refresh",
                    ],
                },
                restore: {
                    show: true,
                    title: 'Restore'
                },
                saveAsImage: {
                    show: true,
                    title: 'Save'
                }
            }
        },
        calculable: true,
        legend: {
            data: ['Messaging', 'Scheduling', 'Time Sheets'],
            y: 'bottom'
        },
        xAxis: [{
                type: 'category',
                data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            }],
        yAxis: [{
                type: 'value',
                name: 'Count',
                axisLabel: {
                    formatter: '{value} count'
                }
            }, {
                type: 'value',
                name: 'Number',
                axisLabel: {
                    formatter: '{value} No'
                }
            }],
        series: [{
                name: 'Messaging',
                type: 'bar',
                data: [2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
            }, {
                name: 'Scheduling',
                type: 'bar',
                data: [2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3]
            }, {
                name: 'Time Sheets',
                type: 'line',
                yAxisIndex: 1,
                data: [2.0, 2.2, 3.3, 4.5, 6.3, 10.2, 20.3, 23.4, 23.0, 16.5, 12.0, 6.2]
            }]
    });

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

        $('.date-picker').datepicker().next().on(ace.click_event, function () {
            $(this).prev().focus();
        });
        $('#id-date-range-picker-1').daterangepicker().prev().on(ace.click_event, function () {
            $(this).next().focus();
        });

        $('#timepicker1').timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false
        })
        $('#colorpicker1').colorpicker();
        $('#simple-colorpicker-1').ace_colorpicker();

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







