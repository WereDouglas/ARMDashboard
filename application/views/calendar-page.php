<!DOCTYPE html>
<html>
    <head lang="en">

        <link rel="stylesheet" href="<?= base_url(); ?>css/lib/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/separate/vendor/flatpickr.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/lib/fullcalendar/fullcalendar.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/separate/pages/calendar.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/lib/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/lib/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/main.css">
    </head>
    <body class="with-side-menu">



        <div class="container-fluid">

            <div class="box-typical">
                <div class="calendar-page">
                    <div class="calendar-page-content">
                        <div class="calendar-page-title">Calendar</div>
                        <div class="calendar-page-content-in">
                            <div id='calendar'></div>
                        </div><!--.calendar-page-content-in-->
                    </div><!--.calendar-page-content-->

                    <div class="calendar-page-side">
                        <section class="calendar-page-side-section">
                            <div class="calendar-page-side-section-in">
                                <div id="side-datetimepicker"></div>
                            </div>
                        </section>


                        <section class="calendar-page-side-section">
                            <header class="box-typical-header-sm">Schedule <?php echo date('Y-m-d') ?></header>
                            <div class="calendar-page-side-section-in">
                                <ul class="colors-guide-list">

                                    <?php
                                    if (is_array($vs)) {
                                        foreach ($vs as $l) {
                                            if ($l->Indicator = 'Shift') {
                                                ?>                                           
                                                <li>
                                                    <div class="color-double green"><div></div></div>
                                                    <?php echo $l->Starts . ' ' . $l->Ends . ' ' . $l->Location; ?>
                                                </li>                                         

                                                <?php
                                            } else {
                                                ?>
                                                <li>
                                                    <div class="color-double orange"><div></div></div>
                                                    <?php echo $l->Starts . ' ' . $l->Ends . ' ' . $l->Location; ?>
                                                </li>                                            
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                    <li>
                                        <div class="color-double"><div></div></div>
                                        Meetings
                                    </li>
                                    <li>
                                        <div class="color-double orange"><div></div></div>
                                        Supervision
                                    </li>
                                    <li>
                                        <div class="color-double red"><div></div></div>
                                        Surgey
                                    </li>
                                    <li>
                                        <div class="color-double coral"><div></div></div>
                                        Training
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div><!--.calendar-page-side-->
                </div><!--.calendar-page-->
            </div><!--.box-typical-->
        </div><!--.container-fluid-->




        <script src="<?= base_url(); ?>js/lib/jquery/jquery-3.2.1.min.js"></script>
        <script src="<?= base_url(); ?>js/lib/popper/popper.min.js"></script>
        <script src="<?= base_url(); ?>js/lib/tether/tether.min.js"></script>
        <script src="<?= base_url(); ?>js/lib/bootstrap/bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>js/plugins.js"></script>

        <script type="text/javascript" src="<?= base_url(); ?>js/lib/match-height/jquery.matchHeight.min.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>js/lib/moment/moment-with-locales.min.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>js/lib/flatpickr/flatpickr.min.js"></script>
        <script src="<?= base_url(); ?>js/lib/fullcalendar/fullcalendar.min.js"></script>

        <script src="<?= base_url(); ?>js/app.js"></script>
    </body>
</html>
<script>
    $(document).ready(function () {

        /* ==========================================================================
         Fullcalendar
         ========================================================================== */
        var day = <?php echo date('d'); ?>;
        var year = <?php echo date('Y'); ?>;
        var month = <?php echo date('m'); ?>;

        $('#calendar').fullCalendar({

            header: {
                left: '',
                center: 'prev, title, next',
                right: 'today agendaDay,agendaTwoDay,agendaWeek,month'
            },
            buttonIcons: {
                prev: 'font-icon font-icon-arrow-left',
                next: 'font-icon font-icon-arrow-right',
                prevYear: 'font-icon font-icon-arrow-left',
                nextYear: 'font-icon font-icon-arrow-right'
            },
            defaultDate: new Date(year, month - 1, day - 1),
            editable: true,
            selectable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                    title: 'TODAY',
                    start: new Date(year, month - 1, day - 1)
                },
<?php

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

if (is_array($v)) {

    foreach ($v as $loop) {
        $mydate = $loop->Date;
        $prior = $loop->Indicator;
        $days = $loop->Period;

        $informations = '' . date('H:i', strtotime($loop->Starts)) . ' to ' . date('H:i', strtotime($loop->Ends)) . ' ' . clean($loop->Location);

        $informations .= $loop->Location . ' ';
        $d = (int) date("d", strtotime($mydate));
        $m = (int) date("m", strtotime($mydate)) - 1;
        $y = (int) date("Y", strtotime($mydate));

        switch ($prior) {
            case Shift:
                $className = 'event-orange';
                break;
            case Appointment:
                $className = 'event-coral';
                break;
        }
        ?>
                        {
                            title: '<?php echo $informations; ?>',
                            start: '<?php echo $loop->Starts; ?>',
                            end: '<?php echo $loop->Ends; ?>',
                            className: 'event-green'

                        },
        <?php
    }
}
?>


            ],
            viewRender: function (view, element) {
                // При переключении вида инициализируем нестандартный скролл
                if (!("ontouchstart" in document.documentElement)) {
                    $('.fc-scroller').jScrollPane({
                        autoReinitialise: true,
                        autoReinitialiseDelay: 100
                    });
                }

                $('.fc-popover.click').remove();
            },
            eventClick: function (calEvent, jsEvent, view) {

                var eventEl = $(this);
                // Add and remove event border class
                if (!$(this).hasClass('event-clicked')) {
                    $('.fc-event').removeClass('event-clicked');
                    $(this).addClass('event-clicked');
                }

                // Add popover
                $('body').append(
                        '<div class="fc-popover click">' +
                        '<div class="fc-header">' +
                        moment(calEvent.start).format('dddd • D') +
                        '<button type="button" class="cl"><i class="font-icon-close-2"></i></button>' +
                        '</div>' +
                        '<div class="fc-body main-screen">' +
                        '<p>' +
                        moment(calEvent.start).format('dddd, D YYYY, hh:mma') +
                        '</p>' +
                        '<p class="color-blue-grey">Name Surname Patient<br/>Surgey ACL left knee</p>' +
                        '<ul class="actions">' +
                        '<li><a href="#">More details</a></li>' +
                        '<li><a href="#" class="fc-event-action-edit">Edit event</a></li>' +
                        '<li><a href="#" class="fc-event-action-remove">Remove</a></li>' +
                        '</ul>' +
                        '</div>' +
                        '<div class="fc-body remove-confirm">' +
                        '<p>Are you sure to remove event?</p>' +
                        '<div class="text-center">' +
                        '<button type="button" class="btn btn-rounded btn-sm">Yes</button>' +
                        '<button type="button" class="btn btn-rounded btn-sm btn-default remove-popover">No</button>' +
                        '</div>' +
                        '</div>' +
                        '<div class="fc-body edit-event">' +
                        '<p>Edit event</p>' +
                        '<div class="form-group">' +
                        '<div class="input-group date datetimepicker">' +
                        '<input type="text" class="form-control" />' +
                        '<span class="input-group-addon"><i class="font-icon font-icon-calend"></i></span>' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<div class="input-group date datetimepicker-2">' +
                        '<input type="text" class="form-control" />' +
                        '<span class="input-group-addon"><i class="font-icon font-icon-clock"></i></span>' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<textarea class="form-control" rows="2">Name Surname Patient Surgey ACL left knee</textarea>' +
                        '</div>' +
                        '<div class="text-center">' +
                        '<button type="button" class="btn btn-rounded btn-sm">Save</button>' +
                        '<button type="button" class="btn btn-rounded btn-sm btn-default remove-popover">Cancel</button>' +
                        '</div>' +
                        '</div>' +
                        '</div>'
                        );
                // Position popover
                function posPopover() {
                    $('.fc-popover.click').css({
                        left: eventEl.offset().left + eventEl.outerWidth() / 2,
                        top: eventEl.offset().top + eventEl.outerHeight()
                    });
                }

                posPopover();
                $('.fc-scroller, .calendar-page-content, body').scroll(function () {
                    posPopover();
                });
                $(window).resize(function () {
                    posPopover();
                });
                // Remove old popover
                if ($('.fc-popover.click').length > 1) {
                    for (var i = 0; i < ($('.fc-popover.click').length - 1); i++) {
                        $('.fc-popover.click').eq(i).remove();
                    }
                }

                // Close buttons
                $('.fc-popover.click .cl, .fc-popover.click .remove-popover').click(function () {
                    $('.fc-popover.click').remove();
                    $('.fc-event').removeClass('event-clicked');
                });
                // Actions link
                $('.fc-event-action-edit').click(function (e) {
                    e.preventDefault();
                    $('.fc-popover.click .main-screen').hide();
                    $('.fc-popover.click .edit-event').show();
                });
                $('.fc-event-action-remove').click(function (e) {
                    e.preventDefault();
                    $('.fc-popover.click .main-screen').hide();
                    $('.fc-popover.click .remove-confirm').show();
                });
            }
        });
        /* ==========================================================================
         Side datepicker
         ========================================================================== */

        $('#side-datetimepicker').flatpickr({
            inline: true,
            format: 'DD/MM/YYYY'
        });
    });
    /* ==========================================================================
     Calendar page grid
     ========================================================================== */

    (function ($, viewport) {
        $(document).ready(function () {

            if (viewport.is('>=lg')) {
                $('.calendar-page-content, .calendar-page-side').matchHeight();
            }

            // Execute code each time window size changes
            $(window).resize(
                    viewport.changed(function () {
                        if (viewport.is('<lg')) {
                            $('.calendar-page-content, .calendar-page-side').matchHeight({remove: true});
                        }
                    })
                    );
        });
    })(jQuery, ResponsiveBootstrapToolkit);






</script>