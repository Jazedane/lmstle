<div class="block" id="search_class">
    <div class="navbar navbar-inner block-header">
        <div id="" class="muted pull-center"><strong>Search Past Class</strong></div>
    </div>
    <div class="block-content collapse in">
        <div class="span2">
            <form method="post" action="search_class.php">
                <div class="control-group">
                    <label>School Year:</label>
                    <div class="controls">
                        <select name="school_year" class="span2" required style="width:120px">
                            <option></option>
                            <?php
											      $query = mysqli_query($conn,"select * from school_year order by school_year DESC");
											      while($row = mysqli_fetch_array($query)){
											
											      ?>
                            <option><?php echo $row['school_year']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="controls">
                    <button name="search" class="btn btn-info" style="height:28px "><i class="fa-solid fa-search"></i> Search</button>
                </div>
            </form>
        </div>
    </div>
</div>