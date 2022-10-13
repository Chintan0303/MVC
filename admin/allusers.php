
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="col_3">
					<div class="clearfix"> </div>
				</div>

				<div class="charts">
					<div class="mid-content-top charts-grids">
						<div class="middle-content">
                            <div class="row">
                                <div class="col-md-11">
                                    <h4 class="title">All Users List</h4>

                                </div>
                               <div class="col">
                                  <a class="btn btn-sm btn-info" href="addnewuser">Add New</a>
                               </div>
                            </div>
                            <!--//sreen-gallery-cursual---->
						</div>
                    </div>

				</div>

                <table class='table table-bordered table-striped'>
                    <thead class="bg-dark text-light">
                        <tr>
                        <th>sr. no </th>
						<th>Username</th>
						<th>Full name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Gender</th>
                        <th>Role</th>
                        <th>Action</th>
                        </tr>
					</thead>
                    <tbody>
                         <?php $count=1; 
                         foreach ($FetchAllUsersData['Data'] as $key => $value) {?>
                        <tr>
                        <td> <?php echo $count ?>  </td>
                        <td> <?php echo $value->user_name ?>  </td>
                        <td> <?php echo $value->fullname ?>  </td>
                        <td> <?php echo $value->email ?>  </td>
                        <td> <?php echo $value->mobile?>  </td>
                        <td> <?php echo $value->gender ?>  </td>
                        <td> <?php if ($value->role_id == 1) {echo "Admin";}else{echo "User";} ?>  </td>
                        <td>
                            <?php if ($value->role_id != 1) {?>
                                
                                <a href="deleteuser?user_id=<?php echo $value->user_id;?>" class="fa fa-trash btn-sm btn-danger"></a> 
                                <a href="edituser?user_id=<?php echo  $value->user_id; ?>" class="fa fa-pencil btn-sm btn-primary"></a>
                            <?php } ?>
                        </td>



                        </tr>
                        
                        <?php $count++; }
                         ?>
                        


                    </tbody>




				</table>


			</div>
		</div>



