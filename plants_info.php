<?php  include('header.php'); ?>
<?php  include('session.php'); ?>

<?php include('sidebar.php'); ?>

<div class="container-fluid main-content">
    <div class="row" style="margin-top:80px">
        <div class="span9" id="content">
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Available Plants in School Garden</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="card" style="width: 18rem;">
                            <img src="/lmstle/images/index.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Plant 1</h5>
                                <p class="card-text">This is a plant.</p>
                                <a href="#" class="btn btn-primary"> Check Information</a>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="/lmstle/images/index.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Plant 2</h5>
                                <p class="card-text">This is a plant.</p>
                                <a href="#" class="btn btn-primary"> Check Information</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php include('script.php'); ?>

<?php include('footer.php'); ?>