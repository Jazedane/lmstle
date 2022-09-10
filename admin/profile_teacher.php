<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('sidebar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span6" id="content">
                     <div class="row-fluid">
						
					     <ul class="breadcrumb">
						<?php
						$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
						$school_year_query_row = mysqli_fetch_array($school_year_query);
						$school_year = $school_year_query_row['school_year'];
						?>
							<li><a href="#">Teacher</a><span class="divider">/</span></li>
							<li><a href="#"><b>Profile</b></a></li>
						</ul>

                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
										<div class="alert alert-info"><i class="fa-solid fa-info-circle"></i> About Me</div>
								<?php $query= mysqli_query($conn,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
						?>
  									<?php echo $row['about']; ?>
						
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>