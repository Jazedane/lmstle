
						<ul	 id="da-thumbs" class="da-thumbs">
										<?php $query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										where teacher_id = '$session_id' and school_year = '$school_year' ")or die(mysqli_error());
										$count = mysqli_num_rows($query);
										
										if ($count > 0){
										while($row = mysqli_fetch_array($query)){
										$id = $row['teacher_class_id'];
				
										?>
											<li id="del<?php echo $id; ?>">
												<a href="my_students.php<?php echo '?id='.$id; ?>">
														<img src ="<?php echo $class_row['thumbnails'] ?>" width="124" height="140" class="img-polaroid" alt="">
														
												</a>
												<p class="class"><?php echo $row['class_name']; ?></p>
												<a href="#<?php echo $class_id; ?>" data-toggle="modal"><i class="fa-solid fa-trash-can"></i> Remove</a>	
												<?php include("delete_class_modal.php"); ?>
											</li>
										
									<?php } }else{ ?>
									<div class="alert alert-info"><i class="fa-solid fa-info-circle"></i> No Class Currently Added</div>
									<?php  } ?>
									</ul>