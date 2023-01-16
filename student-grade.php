<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Grade</title>

    <?php
    include 'header.php';
    include 'session.php';
    include 'script.php';
    $get_id = $_GET['id'];
    $selected_quarter = isset($_GET['quarter']) ? $_GET['quarter'] : '1';

    $quarters = [$selected_quarter];

    if (isset($_GET['quarter'])) {
        if ($_GET['quarter'] == 'all')  {
            $quarters = [1, 2, 3, 4];
        } else {
            $quarter = [$selected_quarter];
        }
    } else {
        $selected_quarter = 0;
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
                        <h1>Student Grade</h1>
                    </div>
                    <div class="col-sm-6">
                        <?php
                        ($class_query = mysqli_query(
                            $conn,
                            "SELECT * from tbl_teacher_class
										LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id
                                        LEFT JOIN tbl_school_year ON tbl_school_year.school_year_id = tbl_teacher_class.school_year_id
										where teacher_class_id = '$get_id'"
                        )) or die(mysqli_error());
                        $class_row = mysqli_fetch_array($class_query);
                        $class_id = $class_row['class_id'];
                        $school_year = $class_row['school_year'];
                        ?>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"><?php echo $class_row[
                                'class_name'
                            ]; ?></a> <span class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $class_row[
                                        'school_year'
                                    ]; ?></a> <span class="divider"></span></li>
                            <li class="breadcrumb-item active"><a href="#"><b>Student Grade</b></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-header">
            <div class="row mb-2 ml-1">
                <div class="col-sm-3">
                    <select class="form-control" id="quarter-selection">
                        <option value="0" <?php if ($selected_quarter == "0") { echo "selected"; } else { echo ""; } ?>
                            selected disabled hidden>
                            Select Quarter</option>
                        <option value="1" <?php if ($selected_quarter == "1") { echo "selected"; } else { echo ""; } ?>>
                            1st Quarter</option>
                        <option value="2" <?php if ($selected_quarter == "2") { echo "selected"; } else { echo ""; } ?>>
                            2nd Quarter</option>
                        <option value="3" <?php if ($selected_quarter == "3") { echo "selected"; } else { echo ""; } ?>>
                            3rd Quarter</option>
                        <option value="4" <?php if ($selected_quarter == "4") { echo "selected"; } else { echo ""; } ?>>
                            4th Quarter</option>
                        <option value="all"
                            <?php if ($selected_quarter == "all") { echo "selected"; } else { echo ""; } ?>>All Quarters
                        </option>
                    </select>
                </div>
            </div>
            <div class="container-fluid">
                <?php for (
                    $quarterIndex = 0;
                    $quarterIndex < count($quarters);
                    $quarterIndex++
                ) {

                    $quarter = $quarters[$quarterIndex];

                    /**
                     * Array that dynamically creates the table header.
                     * Records the Task IDs to be used for individual student query later.
                     */
                    $task_column_ids = [];

                    /**
                     * Array that dynamically holds the total points for each task.
                     * Example: Task 1 has 10 points in total, Task 2 has 20 points in total, etc.
                     */
                    $task_total_grade = [];

                    /**
                     * Array that dynamically holds the impact percentage of each task type.
                     * Example: "Activity" task types has 10% impact, "Exam" task types has 20% impact, etc.
                     */
                    $grade_impact = [];
                    ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Grades for Quarter <?php echo $quarter; ?></h3>
                            </div>
                            <div class="card-body">
                                <table id="<?php echo 'grade_section_'.$quarterIndex; ?>" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="220">
                                                <?php echo $class_row[
                                                    'class_name'
                                                ]; ?> STUDENTS
                                            </th>

                                            <?php
                                            ($header_query = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbl_task 
                                                LEFT JOIN tbl_grade_category ON tbl_task.grade_category_id = tbl_grade_category.grade_category_id
                                                WHERE 
                                                    tbl_task.class_id = '$get_id' 
                                                    AND isDeleted=false
                                                    AND tbl_task.quarter = '$quarter'
                                                ORDER BY tbl_task.task_name and tbl_task.total_points DESC "
                                            )) or die(mysqli_error());
                                            while (
                                                $header_row = mysqli_fetch_array(
                                                    $header_query
                                                )
                                            ) {

                                                $id = $header_row['task_id'];
                                                $task_file = $header_row['task_file'];

                                                /**
                                                 * Record the task ID to be used for individual student query later.
                                                 */
                                                array_push(
                                                    $task_column_ids,
                                                    $id
                                                );

                                                /**
                                                 * Record the impact percentages of each activity.
                                                 */
                                                if (
                                                    !isset(
                                                        $grade_impact[
                                                            $header_row[
                                                                'category_name'
                                                            ]
                                                        ]
                                                    )
                                                ) {
                                                    /**
                                                     * Null checking. Make sure that the array key is initialized.
                                                     */
                                                    $grade_impact[
                                                        $header_row[
                                                            'category_name'
                                                        ]
                                                    ] = 0;
                                                }

                                                $grade_impact[
                                                    $header_row['category_name']
                                                ] =
                                                    $header_row[
                                                        'impact_percentage'
                                                    ];
                                                ?>
                                            <th width="120">
                                                <?php echo $header_row[
                                                    'task_name'
                                                ]; ?>
                                                <br><?php echo $header_row[
                                                    'category_name'
                                                ]; ?><br> out of
                                                <?php
                                                /**
                                                 * Record the total points of each activity.
                                                 */
                                                if (
                                                    isset(
                                                        $task_total_grade[
                                                            $header_row[
                                                                'category_name'
                                                            ]
                                                        ]
                                                    )
                                                ) {
                                                    $task_total_grade[
                                                        $header_row[
                                                            'category_name'
                                                        ]
                                                    ] +=
                                                        $header_row[
                                                            'total_points'
                                                        ];
                                                } else {
                                                    /**
                                                     * Null checking. Make sure that the array key is initialized.
                                                     */
                                                    $task_total_grade[
                                                        $header_row[
                                                            'category_name'
                                                        ]
                                                    ] =
                                                        $header_row[
                                                            'total_points'
                                                        ];
                                                }

                                                echo $header_row[
                                                    'total_points'
                                                ];
                                                ?> points
                                            </th>
                                            <?php
                                            }
                                            ?>
                                            <th width="120">
                                                Weighted Average
                                            </th>
                                            <th width="80"> Overall Grade</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        ($query = mysqli_query(
                                            $conn,
                                            "SELECT
                                            *
                                            FROM
                                                tbl_teacher_class_student
                                            LEFT JOIN tbl_student ON tbl_student.student_id = tbl_teacher_class_student.student_id AND tbl_student.isDeleted = FALSE
                                            INNER JOIN tbl_class ON tbl_class.class_id = tbl_student.class_id
                                            WHERE
                                                tbl_teacher_class_student.student_id = '$session_id'
                                            ORDER BY
                                                lastname"
                                        )) or die(mysqli_error());

                                        while (
                                            $row = mysqli_fetch_array($query)
                                        ) {

                                            $student_id = $row['student_id'];

                                            /**
                                             * Array that will hold the sum of a student's grade for each activity.
                                             */
                                            $student_grade = [];
                                            ?>

                                        <tr>
                                            <td> <img id="avatar" src="/lmstlee4/admin/uploads/<?php echo $row[
                                                'location'
                                            ]; ?>" class="img-circle elevation" alt="User Image" height="30"
                                                    width="30">
                                                <?php $middlename = $row['middlename']; 
                                                echo $row['lastname'] .
                                                    ', ' .
                                                    $row['firstname'] . ' ' . $middlename = mb_substr($middlename, 0, 1) .'.'; ?>
                                            </td>
                                            <?php for (
                                                $i = 0;
                                                $i < count($task_column_ids);
                                                $i++
                                            ) {
                                                ($grade_query = mysqli_query(
                                                    $conn,
                                                    "SELECT
                                                    *
                                                    FROM
                                                        tbl_student_task
                                                    LEFT JOIN tbl_student ON tbl_student.student_id = tbl_student_task.student_id
                                                    INNER JOIN tbl_task ON tbl_student_task.task_id = tbl_task.task_id
                                                    LEFT JOIN tbl_grade_category ON tbl_task.grade_category_id = tbl_grade_category.grade_category_id
                                                    WHERE
                                                        tbl_task.class_id = '$get_id' 
                                                        AND tbl_student_task.task_id = '$task_column_ids[$i]' 
                                                        AND tbl_student.student_id = '$student_id'
                                                        AND tbl_task.quarter = '$quarter'
                                                        "
                                                )) or die(mysqli_error());

                                                $grade_row_count = mysqli_num_rows(
                                                    $grade_query
                                                );

                                                if ($grade_row_count === 0) { ?>

                                            <!-- If there is no grade, default to 0. -->
                                            <td>0</td>

                                            <?php }

                                                while (
                                                    $grade_row = mysqli_fetch_array(
                                                        $grade_query
                                                    )
                                                ) {

                                                    $grade =
                                                        $grade_row['grade'];

                                                    if (
                                                        !isset(
                                                            $student_grade[
                                                                $grade_row[
                                                                    'category_name'
                                                                ]
                                                            ]
                                                        )
                                                    ) {
                                                        /**
                                                         * Null checking. Make sure that the array key is initialized.
                                                         */
                                                        $student_grade[
                                                            $grade_row[
                                                                'category_name'
                                                            ]
                                                        ] = 0;
                                                    }

                                                    /**
                                                     * Sum up the student grades for each category.
                                                     */
                                                    $student_grade[
                                                        $grade_row[
                                                            'category_name'
                                                        ]
                                                    ] += $grade;
                                                    ?>
                                            <td>
                                                <?php echo $grade; ?>
                                            </td>
                                            <?php
                                                }
                                            } ?>
                                            <td>
                                                <?php
                                                /**
                                                 * Student's overall grade.
                                                 */
                                                $grade_total = 0;
                                                /**
                                                 * Student's overall weighted percentage.
                                                 */
                                                $percentage_total = 0;

                                                foreach (
                                                    $grade_impact
                                                    as $key =>
                                                        $grade_impact_value
                                                ) {
                                                    /**
                                                     * Get the student's grade for each category.
                                                     */
                                                    $value = 0;
                                                    if (
                                                        isset(
                                                            $student_grade[$key]
                                                        )
                                                    ) {
                                                        $value =
                                                            $student_grade[
                                                                $key
                                                            ];
                                                    }

                                                    /**
                                                     * Sum up the overall student's grade.
                                                     */
                                                    $grade_total += $value;

                                                    /**
                                                     * Sum up the overall student's percentage for each task.
                                                     */
                                                    $per_task_total_grade =
                                                        ($value /
                                                            $task_total_grade[
                                                                $key
                                                            ]) *
                                                        100;

                                                    /**
                                                     * Calculate the weighted percentage.
                                                     */
                                                    $percentage_total +=
                                                        $per_task_total_grade *
                                                        ($grade_impact_value /
                                                            100);
                                                }

                                                $student_grade_per_quarter[
                                                    $student_id
                                                ][$quarter] = round(
                                                    $percentage_total,
                                                    2
                                                );

                                                echo $grade_total .
                                                    ' (' .
                                                    round(
                                                        $percentage_total,
                                                        2
                                                    ) .
                                                    ')';
                                                ?>
                                            </td>
                                            <td>
                                                <center><?php echo 
                                                    round(
                                                        $percentage_total
                                                    );
                                                ?></center>
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
                <?php
                } ?>
            </div>
        </section>
        <?php if (isset($_GET['quarter']) && $_GET['quarter'] === 'all') { ?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">General Average for Quarters</h3>
                            </div>
                            <div class="card-body">
                                <table id="grade_section_overall" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="220">
                                                <?php echo $class_row[
                                                    'class_name'
                                                ]; ?> STUDENTS
                                            </th>
                                            <th width="80"> 1st Quarter</th>
                                            <th width="80"> 2nd Quarter</th>
                                            <th width="80"> 3rd Quarter</th>
                                            <th width="80"> 4th Quarter</th>
                                            <th width="80"> General Average</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        ($query = mysqli_query(
                                            $conn,
                                            "SELECT
                                            *
                                            FROM
                                                tbl_teacher_class_student
                                            LEFT JOIN tbl_student ON tbl_student.student_id = tbl_teacher_class_student.student_id AND tbl_student.isDeleted = FALSE
                                            INNER JOIN tbl_class ON tbl_class.class_id = tbl_student.class_id
                                            WHERE
                                                teacher_class_id = '$get_id' AND tbl_teacher_class_student.student_id = '$session_id'
                                            ORDER BY
                                                lastname"
                                        )) or die(mysqli_error());

                                        while (
                                            $row = mysqli_fetch_array($query)
                                        ) {

                                            $student_id = $row['student_id'];

                                            /**
                                             * Array that will hold the sum of a student's grade for each activity.
                                             */
                                            $student_grade = [];
                                            ?>

                                        <tr>
                                            <td> <img id="avatar" src="/lmstlee4/admin/uploads/<?php echo $row[
                                                'location'
                                            ]; ?>" class="img-circle elevation" alt="User Image" height="30"
                                                    width="30">
                                                <?php $middlename = $row['middlename']; 
                                                    echo $row['lastname'] .
                                                    ', ' .
                                                    $row['firstname'] . ' ' . $middlename = mb_substr($middlename, 0, 1) .'.'; ?>
                                            </td>
                                            <td>
                                                <center>
                                                    <?php echo isset(
                                                        $student_grade_per_quarter[
                                                            $student_id
                                                        ][1]
                                                    )
                                                        ? $student_grade_per_quarter[
                                                            $student_id
                                                        ][1]
                                                        : 0; ?>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <?php echo isset(
                                                        $student_grade_per_quarter[
                                                            $student_id
                                                        ][2]
                                                    )
                                                        ? $student_grade_per_quarter[
                                                            $student_id
                                                        ][2]
                                                        : 0; ?>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <?php echo isset(
                                                        $student_grade_per_quarter[
                                                            $student_id
                                                        ][3]
                                                    )
                                                        ? $student_grade_per_quarter[
                                                            $student_id
                                                        ][3]
                                                        : 0; ?>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <?php echo isset(
                                                        $student_grade_per_quarter[
                                                            $student_id
                                                        ][4]
                                                    )
                                                        ? $student_grade_per_quarter[
                                                            $student_id
                                                        ][4]
                                                        : 0; ?>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <?php
                                                    // calculate total average grade per quarter
                                                    $total_grade = 0;
                                                    for (
                                                        $i = 1;
                                                        $i <= 4;
                                                        $i++
                                                    ) {
                                                        $total_grade += isset(
                                                            $student_grade_per_quarter[
                                                                $student_id
                                                            ][$i]
                                                        )
                                                            ? $student_grade_per_quarter[
                                                                $student_id
                                                            ][$i]
                                                            : 0;
                                                    }
                                                    echo round(
                                                        $total_grade / 4,
                                                        2
                                                    );
                                                    ?>
                                                </center>
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
        </section>
        <?php } ?>
    </div>
    <?php include 'footer.php'; ?>
    <script>
    $(function() {
        $("#grade_section_0").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#grade_section_0_wrapper .col-md-6:eq(0)');

        $("#grade_section_1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#grade_section_1_wrapper .col-md-6:eq(0)');

        $("#grade_section_2").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#grade_section_2_wrapper .col-md-6:eq(0)');

        $("#grade_section_3").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#grade_section_3_wrapper .col-md-6:eq(0)');
    });
    $(document).ready(function() {
        $('.dataTables_filter input[type="search"]').css({
            'width': '220px',
            'display': 'inline-block'
        });
    });
    </script>
    <script>
    $(function() {
        $("#grade_section_overall").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print", ]
        }).buttons().container().appendTo('#grade_section_overall_wrapper .col-md-6:eq(0)');
    });
    $(document).ready(function() {
        $('.dataTables_filter input[type="search"]').css({
            'width': '220px',
            'display': 'inline-block'
        });
    });

    $(document).ready(() => {
        $('#quarter-selection').on('change', (evt) => {
            const url = new URL(window.location.href);
            const host = url.origin;
            const path = url.pathname;
            const id = url.searchParams.get('id');
            const queryBuilder = `${host}${path}?id=${id}&quarter=${evt.target.value}`;
            window.location.href = queryBuilder;
        })
    })
    </script>
</body>

</html>