<?php include('header.php'); ?>
<?php include('session.php'); ?>

<?php include('sidebar.php'); ?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span7" id="content">
            <div class="row-fluid" style="margin-top: 45px">
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Plants in School Garden</div>
                    </div>
                    <li class="block-content collapse in">
                        <div class="card" style="width: 10rem;border:2px solid black;padding:5px">
                            <center><img src="/lmstle/images/index.jpg" class="card-img-top" alt="..." style="width:100%;height:100px">
                                <div class="card-body">
                                    <h5 class="card-title">Plant 1</h5>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </center>
                        </div>
                    </li>
                </div>
            </div>
        </div>
        <?php include('plants_sidebar.php'); ?>
    </div>
</div>
<?php include('footer.php'); ?>
<?php include('script.php'); ?>