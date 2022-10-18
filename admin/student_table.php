	<?php include 'dbcon.php'; ?>
	<form action="delete_student.php" method="post">
	    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
	        <a data-toggle="modal" href="#student_delete" id="delete" class="btn btn-danger" name=""><i
	                class="fa-solid fa-trash-can"></i></a>
	        <div class="pull-right">
	            <ul class="nav nav-pills">
	                <li class="active">
	                    <a href="students.php">All</a>
	                </li>
	                <li class="">
	                    <a href="unreg_students.php">Unregistered</a>
	                </li>
	                <li class="">
	                    <a href="reg_students.php">Registered</a>
	                </li>
	            </ul>
	        </div>
	        <?php include 'modal_delete.php'; ?>
	        <thead>
	            <tr>
	                <th></th>

	                <th>Name</th>
	                <th>ID Number</th>
	                <th>Gender</th>
	                <th>Age</th>
	                <th>Year & Section</th>
	                <th></th>
	            </tr>
	        </thead>
	        <tbody>

	            <?php
             ($query = mysqli_query(
                 $conn,
                 "SELECT * FROM student 
				 LEFT JOIN class ON student.class_id = class.class_id 
				 WHERE student.isDeleted=false
				 ORDER BY student.student_id DESC"
             )) or die(mysqli_error($conn));
             while ($row = mysqli_fetch_array($query)) {
                 $id = $row['student_id']; ?>

	            <tr>
	                <td width="30">
	                    <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox"
	                        value="<?php echo $id; ?>">
	                </td>

	                <td><?php $firstname = $row['firstname'];
						$lastname = $row['lastname'];
						$firstname = strtoupper ($firstname);
						$lastname = strtoupper($lastname);
						echo $firstname .' '. $lastname; ?></td>
	                <td><?php echo $row['username']; ?></td>
	                <td><?php $gender = $row['gender'];
					$gender = strtoupper ($gender);
					echo $gender ?></td>
	                <td><?php echo $row['age']; ?></td>
	                <td width="100"><?php $class_name = $row['class_name'];
					$class_name = strtoupper ($class_name);
					echo $class_name ?></td>

	                <td width="30"><a href="edit_student.php<?php echo '?id=' .
                     $id; ?>" class="btn btn-success"><i class="fa-solid fa-edit"></i> </a></td>

	            </tr>
	            <?php
             }
             ?>

	        </tbody>
	    </table>
	</form>