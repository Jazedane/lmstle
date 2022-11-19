<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Task</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>
</head>

<body>
    <?php include 'index.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>About</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <?php
                            ($school_year_query = mysqli_query(
                                $conn,
                                'select * from tbl_school_year order by school_year DESC'
                            )) or die(mysqli_error());
                            $school_year_query_row = mysqli_fetch_array(
                                $school_year_query
                            );
                            $school_year = $school_year_query_row['school_year'];
                            ?>
                            <li class="breadcrumb-item"><a href="#"><b>Home</b></a><span class="divider"></span></li>
                            <li class="breadcrumb-item active"><a href="#"><b>About</b></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">About BNHS</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <p><b>SCHOOL’S INFO</b></p>
                                The <b>Bug-ang National High School</b> (6125) is a DepED Managed
                                partially urban Secondary Public School located in Prk. Pag-asa, Brgy Bug-ang,
                                Toboso, Negros Occidental.
                                It is a Junior High School with Senior High Department.
                                <button type="button" class="btn btn-success toastrDefaultSuccess">
                                    Launch Success Toast
                                </button>
                                <button type="button" class="btn btn-info toastrDefaultInfo">
                                    Launch Info Toast
                                </button>
                                <button type="button" class="btn btn-danger toastrDefaultError">
                                    Launch Error Toast
                                </button>
                                <button type="button" class="btn btn-warning toastrDefaultWarning">
                                    Launch Warning Toast
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">VISION</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <p><b>VISION</b></p>

                                We dream of Filipinos who passionately love their country and whose values
                                and competencies enable them to realize their full potential and contribute meaningfully
                                to building the nation. As a learner-centered public institution, the Department of
                                Education continuously improves itself to better serve its stakeholders.
                                <button type="button" class="btn btn-success swalDefaultSuccess">
                                    Launch Success Toast
                                </button>
                                <button type="button" class="btn btn-info swalDefaultInfo">
                                    Launch Info Toast
                                </button>
                                <button type="button" class="btn btn-danger swalDefaultError">
                                    Launch Error Toast
                                </button>
                                <button type="button" class="btn btn-warning swalDefaultWarning">
                                    Launch Warning Toast
                                </button>
                                <button type="button" class="btn btn-default swalDefaultQuestion">
                                    Launch Question Toast
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">MISSION</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <p><b>MISSION</b></p>
                                <p>To protect and promote the right of every Filipino to quality, equitable,
                                    culture-based,
                                    and complete basic education where:</p>
                                <ul>
                                    <li>Students learn in a child-friendly, gender-sensitive, safe and motivating
                                        environment</li>
                                    <li>Teachers facilitate learning and constantly nurture every learner</li>
                                    <li>Administrators and staff, as stewards of the institution, ensure an enabling and
                                        supportive environment for effective learning to happen</li>
                                    <li>Family, community and other stakeholders are actively engaged and share
                                        responsibility
                                        for developing life-long learners.</li>
                                </ul>
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
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.swalDefaultInfo').click(function() {
            Toast.fire({
                icon: 'info',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.swalDefaultError').click(function() {
            Toast.fire({
                icon: 'error',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.swalDefaultWarning').click(function() {
            Toast.fire({
                icon: 'warning',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.swalDefaultQuestion').click(function() {
            Toast.fire({
                icon: 'question',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultInfo').click(function() {
            toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultError').click(function() {
            toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultWarning').click(function() {
            toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
    });
    </script>
</body>

</html>