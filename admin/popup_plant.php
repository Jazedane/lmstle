            <div class="modal fade" id="popup_plant<?php echo $data['id'];?>" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="del_query.php">
                                <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                                <img width="90%" style="height: 300px" src="<?php echo $imageURL; ?>"></a>
                                <label class="text-dark mt-3">Plant Name:</label>
                                <p class="text-dark font-20"><i><?php echo $data['plant_name'];?></i></p>
                                <label class="text-dark">Plant Information:</label>
                                <p class="text-dark"><?php echo $data['description'];?></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>