<div class="row-fluid">
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Add Student</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <form id="add_student" method="post">

                    <div class="control-group">

                        <div class="controls">
                            <select name="class_id" class="" required>
                                <option>Select Section</option>
                                <?php
                                   $class_query = mysqli_query(
                                       $conn,
                                       'select * from class order by class_name'
                                   );
                                   while (
                                       $class_row = mysqli_fetch_array(
                                           $class_query
                                       )
                                   ) { ?>
                                <option value="<?php echo $class_row[
                                       'class_id'
                                ]; ?>">
                                    <?php echo $class_row[
                                           'class_name'
                                       ]; ?></option>
                                <?php }
                                   ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input name="username" maxlength="7" class="input focused" id="focusedInput" type="number"
                                placeholder="ID Number" style="text-transform: uppercase" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input name="firstname" class="input focused" id="focusedInput" type="text"
                                placeholder="Firstname" style="text-transform: uppercase" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input name="lastname" class="input focused" id="focusedInput" type="text"
                                placeholder="Lastname" style="text-transform: uppercase" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <select name="gender" class="" placeholder="Gender" required>
                                <option>Select Gender</option>
                                <option>MALE</option>
                                <option>FEMALE</option>
                                <option>GAY</option>
                                <option>LESBIAN</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <select name="age" class="" placeholder="Age" type="number" required>
                                <option>Select Age</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="teacher_id" value="<?php echo $_SESSION['id'] ?>" />

                    <div class="control-group">
                        <div class="controls">
                            <button name="save" class="btn btn-info"><i class="fa-solid fa-add"></i></button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    $("#add_student").submit(function(e) {
        e.preventDefault();
        var _this = $(e.target);
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "save_student.php",
            data: formData,
            success: function(html) {
                $.jGrowl("Student Successfully  Added", {
                    header: 'Student Added'
                });
                $('#studentTableDiv').load('student_table.php', function(response) {
                    $("#studentTableDiv").html(response);
                    $('#example').dataTable({
                        "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
                        "sPaginationType": "bootstrap",
                        "oLanguage": {
                            "sLengthMenu": "_MENU_ records per page"
                        }
                    });
                    $(_this).find(":input").val('');
                    $(_this).find('select option').attr('selected', false);
                    $(_this).find('select option:first').attr('selected', true);
                });
            }
        });
    });
});
</script>