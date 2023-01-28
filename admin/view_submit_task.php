<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Task</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>
    <?php $get_id = $_GET['id']; ?>
    <?php 
	  $post_id = $_GET['post_id'];
	  if($post_id == ''){
	  ?>
    <script>
    window.location = "/lmstlee4/task_student.php<?php echo '?id='.$get_id; ?>";
    </script>
    <?php
	  }
 ?>
</head>

<body>
    <?php include 'homepage2.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tasks</h1>
                    </div>
                    <div class="col-sm-6">
                        <?php 
                        $task_status = array("Pending","On-Progress","Over Due","Done");
                        $p_condition = array("Alive","Withered","Dead");
                        $class_query = mysqli_query($conn,"select * from tbl_teacher_class
										LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id
                                        LEFT JOIN tbl_school_year ON tbl_school_year.school_year_id = tbl_teacher_class.school_year_id
										where teacher_class_id = '$get_id'")or die(mysqli_error());
										$class_row = mysqli_fetch_array($class_query);
										?>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"><?php echo $class_row['class_name']; ?></a> <span
                                    class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $class_row['school_year']; ?></a> <span class="divider"></span></li>
                            <li class="breadcrumb-item active"><a href="#"><b>View Submitted Task</b></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <div id="" class="float-sm-right"><a href="task.php<?php echo '?id='.$get_id; ?>"><i
                                            class="fas fa-arrow-left"></i> Back</a></div>
                            </div>
                            <div class="card-body">
                                <?php
										$query1 = mysqli_query($conn,"select * FROM tbl_task where task_id = '$post_id'")or die(mysqli_error());
										$row1 = mysqli_fetch_array($query1);
									
									?>
                                <div class="alert alert-primary">Submit Task in :
                                    <b><?php echo $row1['task_name']; ?></b>
                                </div>

                                <div id="">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Date Submitted</th>
                                                <th>Task Name</th>
                                                <th>Description</th>
                                                <th>Submitted by:</th>
                                                <th>Status</th>
                                                <th>Attachment</th>
                                                <th>Points</th>
                                                <th>Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                            <?php
										    $query = mysqli_query($conn,"SELECT * FROM tbl_student_task
										    LEFT JOIN tbl_student on tbl_student.student_id  = tbl_student_task.student_id 
										    where task_id = '$post_id' order by task_date_upload DESC")or die(mysqli_error());
										    while($row = mysqli_fetch_array($query)){
										    $id  = $row['student_task_id'];
                                            $student_id = $row['student_id'];
                                            $task_name = $row['task_name'];
									        ?>
                                            <tr>
                                                <td width="220"><?php $task_date_upload = date_create($row['task_date_upload']);
                                                    echo date_format(
                                                    $task_date_upload,
                                                    'F d, Y h:i A'
                                                    ); ?>
                                                </td>
                                                <td><?php  echo $row['task_name']; ?></td>
                                                <td><?php echo $row['task_description']; ?></td>
                                                <td><?php $middlename = $row['middlename']; echo $row['firstname'] ." ". $middlename = mb_substr($middlename, 0, 1) .". ". $row['lastname'];?>
                                                </td>
                                                <td class="project-state" width="60">
                                                    <?php
                            					if($row['task_status'] =='0') {
                              						echo "<span class='badge badge-secondary'>Pending</span>";
                            					}elseif($row['task_status'] =='1'){
                              						echo "<span class='badge badge-info'>On-Progress</span>";
                            					}elseif($row['task_status'] =='2'){
                              						echo "<span class='badge badge-danger'>Overdue</span>";
                            					}elseif($row['task_status'] =='3'){
                              						echo "<span class='badge badge-success'>Done</span>";
                            					}
                                                ?>
                                                </td>
                                                <td width="100"><a href="<?php echo $row['task_file']; ?>"
                                                        target="_blank"><i class="fas fa-paperclip"></i>
                                                        <i>Attachment</i></a></td>
                                                <td width="40"><span
                                                        class="badge badge-success"><?php  echo $row['grade']; ?></span>
                                                </td>
                                                <td width="40">
                                                    <a class="btn btn-success"
                                                        href="edit_task_modal.php<?php echo '?student_task_id='.$id.'&id='.$get_id.'&post_id='.$post_id ?>"><i
                                                            class="fas fa-edit"></i></a>
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
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "paging": true,
            "autoWidth": true,
            "dom": 'Bfrtip',
            "buttons": [{
                    extend: 'copyHtml5',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: [0, 1, 3, 4, 6]
                    }
                },
                {
                    extend: 'excelHtml5',
                    titleAttr: 'Export to Excel',
                    exportOptions: {
                        columns: [0, 1, 3, 4, 6]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    titleAttr: 'Export to PDF',
                    extension: ".pdf",
                    filename: "lmstle",
                    exportOptions: {
                        columns: [0, 1, 3, 4, 6]
                    }
                },
                {
                    extend: 'print',
                    messageBottom: '<br><div class="float-right"><u><b><?php
                                            ($query = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbl_teacher WHERE isDeleted=false AND teacher_id=$session_id ORDER BY lastname"
                                            )) or die(mysqli_error());
                                            while (
                                                $row = mysqli_fetch_array(
                                                    $query
                                                )
                                            ) {
                                                $id = $row['teacher_id']; ?><?php $middlename = $row['middlename']; echo $row['firstname'] ." ". $middlename = mb_substr($middlename, 0, 1) .". ". $row['lastname'];?><?php } ?></b></u><p class="text-center">Teacher</p></div></br>',
                    exportOptions: {
                        columns: [0, 1, 3, 4, 6]
                    },
                    title: '<center><h5><b>List of Students Who Submitted</b></h5></center>',
                    customize: function(win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<div class="text-center"><img src="http://localhost/lmstlee4/admin/dist/img/logo.png" style="width: 80px; height: 70px;position:absolute; top:0; left:240px;" alt="logo"/><h4><b>Bug-Ang National High School</b></h4><p><h6>Brgy. Bug-Ang, Toboso, Negros Occidental </h6></p></div><div><hr style="border-bottom: 3px solid black"></hr></div>'
                            );
                        $(win.document.body).find(
                                'table')
                            .addClass('compact')
                            .css('font-size',
                                'inherit');
                    }
                }
            ],
        }).buttons().container().appendTo(
            '#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $(document).ready(function() {
        $('.dataTables_filter input[type="search"]').css({
            'width': '220px',
            'display': 'inline-block'
        });
    });
    </script>
    <script>
    /*!
     * Print button for Buttons and DataTables.
     * 2016 SpryMedia Ltd - datatables.net/license
     */

    (function(factory) {
        if (typeof define === 'function' && define.amd) {
            // AMD
            define(['jquery', 'datatables.net', 'datatables.net-buttons'], function($) {
                return factory($, window, document);
            });
        } else if (typeof exports === 'object') {
            // CommonJS
            module.exports = function(root, $) {
                if (!root) {
                    root = window;
                }

                if (!$ || !$.fn.dataTable) {
                    $ = require('datatables.net')(root, $).$;
                }

                if (!$.fn.dataTable.Buttons) {
                    require('datatables.net-buttons')(root, $);
                }

                return factory($, root, root.document);
            };
        } else {
            // Browser
            factory(jQuery, window, document);
        }
    }(function($, window, document, undefined) {
        'use strict';
        var DataTable = $.fn.dataTable;


        var _link = document.createElement('a');

        /**
         * Clone link and style tags, taking into account the need to change the source
         * path.
         *
         * @param  {node}     el Element to convert
         */
        var _styleToAbs = function(el) {
            var url;
            var clone = $(el).clone()[0];
            var linkHost;

            if (clone.nodeName.toLowerCase() === 'link') {
                clone.href = _relToAbs(clone.href);
            }

            return clone.outerHTML;
        };

        /**
         * Convert a URL from a relative to an absolute address so it will work
         * correctly in the popup window which has no base URL.
         *
         * @param  {string} href URL
         */
        var _relToAbs = function(href) {
            // Assign to a link on the original page so the browser will do all the
            // hard work of figuring out where the file actually is
            _link.href = href;
            var linkHost = _link.host;

            // IE doesn't have a trailing slash on the host
            // Chrome has it on the pathname
            if (linkHost.indexOf('/') === -1 && _link.pathname.indexOf('/') !== 0) {
                linkHost += '/';
            }

            return _link.protocol + "//" + linkHost + _link.pathname + _link.search;
        };


        DataTable.ext.buttons.print = {
            className: 'buttons-print',

            text: function(dt) {
                return dt.i18n('buttons.print', 'Print');
            },

            action: function(e, dt, button, config) {
                var data = dt.buttons.exportData(
                    $.extend({
                        decodeEntities: false
                    }, config.exportOptions) // XSS protection
                );
                var exportInfo = dt.buttons.exportInfo(config);
                var columnClasses = dt
                    .columns(config.exportOptions.columns)
                    .flatten()
                    .map(function(idx) {
                        return dt.settings()[0].aoColumns[dt.column(idx).index()].sClass;
                    })
                    .toArray();

                var addRow = function(d, tag) {
                    var str = '<tr>';

                    for (var i = 0, ien = d.length; i < ien; i++) {
                        // null and undefined aren't useful in the print output
                        var dataOut = d[i] === null || d[i] === undefined ?
                            '' :
                            d[i];
                        var classAttr = columnClasses[i] ?
                            'class="' + columnClasses[i] + '"' :
                            '';

                        str += '<' + tag + ' ' + classAttr + '>' + dataOut + '</' + tag + '>';
                    }

                    return str + '</tr>';
                };

                // Construct a table for printing
                var html = '<table class="' + dt.table().node().className + '">';

                html += '<thead>';

                // Adding logo to the page (repeats for every page while print)
                if (config.repeatingHead.logo) {
                    var logoPosition = (['left'].indexOf(config.repeatingHead.logoPosition) > 0) ?
                        config.repeatingHead.logoPosition : 'left';
                    html += '<tr><th colspan="' + data.header.length +
                        '" style="width: 40px; height: 60px; padding: 0;margin: 0;text-align: ' +
                        logoPosition + ';"><img style="' + config.repeatingHead.logoStyle + '" src="' +
                        config.repeatingHead.logo + '"/></th></tr>';
                }

                // Adding title (repeats for every page while print)
                if (config.repeatingHead.title) {
                    html += '<tr><th colspan="' + data.header.length + '">' + config.repeatingHead
                        .title + '</th></tr>';
                }

                if (config.header) {
                    html += addRow(data.header, 'th');
                }

                html += '</thead>';

                html += '<tbody>';
                for (var i = 0, ien = data.body.length; i < ien; i++) {
                    html += addRow(data.body[i], 'td');
                }
                html += '</tbody>';

                if (config.footer && data.footer) {
                    html += '<tfoot>' + addRow(data.footer, 'th') + '</tfoot>';
                }
                html += '</table>';

                // Open a new window for the printable table
                var win = window.open('', '');
                win.document.close();

                // Inject the title and also a copy of the style and link tags from this
                // document so the table can retain its base styling. Note that we have
                // to use string manipulation as IE won't allow elements to be created
                // in the host document and then appended to the new window.
                var head = '<title>' + exportInfo.title + '</title>';
                $('style, link').each(function() {
                    head += _styleToAbs(this);
                });

                try {
                    win.document.head.innerHTML = head; // Work around for Edge
                } catch (e) {
                    $(win.document.head).html(head); // Old IE
                }

                // Inject the table and other surrounding information
                win.document.body.innerHTML =
                    '<h1>' + exportInfo.title + '</h1>' +
                    '<div>' + (exportInfo.messageTop || '') + '</div>' +
                    html +
                    '<div>' + (exportInfo.messageBottom || '') + '</div>';

                $(win.document.body).addClass('dt-print-view');

                $('img', win.document.body).each(function(i, img) {
                    img.setAttribute('src', _relToAbs(img.getAttribute('src')));
                });

                if (config.customize) {
                    config.customize(win, config, dt);
                }

                // Allow stylesheets time to load
                var autoPrint = function() {
                    if (config.autoPrint) {
                        win.print(); // blocking - so close will not
                        win.close(); // execute until this is done
                    }
                };

                if (navigator.userAgent.match(
                        /Trident\/\d.\d/)) { // IE needs to call this without a setTimeout
                    autoPrint();
                } else {
                    win.setTimeout(autoPrint, 1000);
                }
            },

            title: '*',

            messageTop: '*',

            messageBottom: '*',

            repeatingHead: {},

            exportOptions: {},

            header: true,

            footer: true,

            autoPrint: true,

            customize: null
        };


        return DataTable.Buttons;
    }));
    </script>
</body>

</html>