<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Activity Grade</title>

    <?php
    include 'header.php';
    include 'session.php';
    include 'script.php';
    $get_id = $_GET['id'];
    $quarters = [2];
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
                            "select * from tbl_teacher_class
										LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id
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
            <div class="container-fluid">
                <?php for (
                    $quarterIndex = 0;
                    $quarterIndex < count($quarters);
                    $quarterIndex++
                ) {

                    $quarters = [2];

                    /**
                     * Array that dynamically creates the table header.
                     * Records the Task IDs to be used for individual student query later.
                     */
                    $task_column_ids1 = [];

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

                                <table id="example1" class="table table-bordered table-striped">
                                    <div class="float-right">
                                        <ul class="navbar-nav">
                                            <li class="nav-item dropdown">
                                                <button type="button" class="btn btn-primary dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-users"></i> Quarter List
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <a href="grading.php" class="dropdown-item" type="button">
                                                        1st Quarter</a>
                                                    <a href="2nd-grading.php" class="dropdown-item active" type="button">
                                                        2nd Quarter</a>
                                                    <a href="3rd-grading.php" class="dropdown-item"
                                                        type="button">
                                                        3rd Quarter</a>
                                                    <a href="4th-grading.php" class="dropdown-item"
                                                        type="button">
                                                        4th Quarter</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <thead>
                                        <tr>
                                            <th>
                                                <?php echo $class_row[
                                                    'class_name'
                                                ]; ?> Students
                                            </th>

                                            <?php
                                            ($header_query = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbl_task 
                                                LEFT JOIN tbl_grade_category ON tbl_task.grade_category_id = tbl_grade_category.grade_category_id
                                                WHERE 
                                                    tbl_task.class_id = '$get_id' 
                                                    AND tbl_task.teacher_id = '$session_id' 
                                                    AND isDeleted=false
                                                    AND tbl_task.quarter = '$quarter'
                                                ORDER BY tbl_task.fname and tbl_task.total_points DESC "
                                            )) or die(mysqli_error());
                                            while (
                                                $header_row = mysqli_fetch_array(
                                                    $header_query
                                                )
                                            ) {

                                                $id = $header_row['task_id'];
                                                $floc = $header_row['floc'];

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
                                            <th>
                                                <?php echo $header_row[
                                                    'fname'
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
                                            <th>
                                                Weighted Average
                                            </th>
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
                                                teacher_class_id = '$get_id'
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
                                            <td> <img id="avatar" src="/lmstlee4/admin/<?php echo $row[
                                                'location'
                                            ]; ?>" class="img-circle elevation" alt="User Image" height="30"
                                                    width="30">
                                                <?php echo $row['firstname'] .
                                                    ' ' .
                                                    $row['lastname']; ?>
                                            </td>
                                            <?php for (
                                                $i = 0;
                                                $i < count($task_column_ids1);
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
                                                        AND tbl_student_task.task_id = '$task_column_ids1[$i]' 
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

                                                echo $grade_total .
                                                    ' (' .
                                                    round(
                                                        $percentage_total,
                                                        2
                                                    ) .
                                                    '%)';
                                                ?>
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
    </div>
    <?php include 'footer.php'; ?>
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    </script>
    <script>
    $(function() {
        $("#example2").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
    </script>
</body>

</html>