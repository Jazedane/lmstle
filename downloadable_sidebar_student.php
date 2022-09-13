<div class="span3" id="">
    <div class="row-fluid">

        <div id="block_bg" class="block">
            <div class="navbar navbar-inner block-header">
                <div id="" class="muted pull-left">
                    <h4><i class="fa-solid fa-plus-circle"></i> Add Downloadable</h4>
                </div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form class="" id="add_downloadable" method="post" enctype="multipart/form-data" name="upload">
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">File</label>
                            <div class="controls">

                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">
                                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                                </div>

                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                <input type="hidden" name="id" value="<?php echo $session_id ?>" />
                                <input type="hidden" name="id_class" value="<?php echo $get_id; ?>">
                            </div>
                        </div>
                        <div class="control-group">

                            <div class="controls">
                                <input type="text" name="name" Placeholder="File Name" class="input" required>
                            </div>
                        </div>
                        <div class="control-group">

                            <div class="controls">
                                <input type="text" name="desc" Placeholder="Description" class="input" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">

                                <button name="Upload" type="submit" value="Upload" class="btn btn-info" /><i
                                    class="fa-solid fa-upload"></i> Upload</button>
                            </div>
                        </div>
                    </form>

                    <script>
                    jQuery(document).ready(function($) {
                        $("#add_downloadble").submit(function(e) {
                            $.jGrowl("Uploading File Please Wait......", {
                                sticky: true
                            });
                            e.preventDefault();
                            var _this = $(e.target);
                            var formData = new FormData($(this)[0]);
                            $.ajax({
                                type: "POST",
                                url: "upload_save_student.php",
                                data: formData,
                                success: function(html) {
                                    $.jGrowl("Student Successfully  Added", {
                                        header: 'Student Added'
                                    });
                                    window.location =
                                        'downloadable_student.php<?php echo '?id='.$get_id; ?>';
                                },
                                cache: false,
                                contentType: false,
                                processData: false
                            });
                        });
                    });
                    </script>
                </div>
            </div>
        </div>
        <!-- /block -->


    </div>
</div>