<div id="page-wrapper">
			<div class="main-page">
				<div class="col_3">
					<div class="clearfix"> </div>
				</div>

				<div class="charts">
					<div class="mid-content-top charts-grids">
						<div class="middle-content">
							<h4 class="title">Edit User Data</h4>
						</div>
						<!--//sreen-gallery-cursual---->
					</div>
				</div>
                <section class="locations-1" id="locations">
    <style>
        input[type="radio"],[type='checkbox'] {
            -webkit-appearance: auto !important;
            outline: auto !important;
        }
    </style>
      <div class="card">
                        <div class="card-header text-center">
                            
                        </div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo $UserDataById['Data'][0]->user_name; ?>" class="form-control" name="user_name" id="username">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-2">
                                        <label for="fullname">Fullname</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="fullname" value="<?php echo $UserDataById['Data'][0]->fullname; ?>"  class="form-control" name="fullname" id="fullname">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                   <div class="col-md-2">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="email" value="<?php echo $UserDataById['Data'][0]->email; ?>"  class="form-control" name="email" id="email">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-2">
                                        <label for="mobile">Mobile</label>
                                    </div>
                                    <div class="col-md-8">                                    
                                        <input type="text" value="<?php echo $UserDataById['Data'][0]->mobile; ?>"  class="form-control" name="mobile" id="mobile">
                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col-md-2">
                                        <label for="gender">Gender</label>
                                    </div>
                                    <div class="col-md-8">
                                        <?php //echo $UserDataById['Data'][0]->gender ?>
                                        <input type="radio" name="gender" <?php if ($UserDataById['Data'][0]->gender == "Male") {
                                            echo "checked";
                                        }?>  value="Male" id="Male"> <label for="Male"> Male</label>
                                        <input type="radio" name="gender" <?php if ($UserDataById['Data'][0]->gender == "Female") {
                                            echo "checked";
                                        }?>  value="Female" id="Female"> <label for="Female"> Female</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                   <div class="col-md-2">
                                        <label for="hobbies">Hobbies</label>
                                    </div>
                                    <div class="col-md-8">
                                        <?php 
                                        $arrayOfHobbies=explode(',',$UserDataById['Data'][0]->Hobbies);
                                        // echo "<pre>";
                                        // print_r($arrayOfHobbies);
                                        // echo "</pre>";
                                        // var_dump(in_array("cricket",$arrayOfHobbies)) ;

                                        ?>

                                        <input type="checkbox" <?php if (in_array("cricket",$arrayOfHobbies)) { echo "checked"; }?> name="hobbies[]" value="cricket" id="hobbies"> <label for="cricket"> Cricket</label>
                                        <input type="checkbox" <?php if (in_array("reading",$arrayOfHobbies)) { echo "checked"; }?> name="hobbies[]" value="reading" id="reading"> <label for="reading"> Reading</label>
                                        <input type="checkbox" <?php if (in_array("music",$arrayOfHobbies)) { echo "checked"; }?> name="hobbies[]" value="music" id="music"> <label for="music"> Music</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-2">
                                        <label for="city">City</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="city" class="form-control" id="city">
                                        <option   value="<?php echo $UserDataById['Data'][0]->city ?>"><?php echo $UserCityName['Data'][0]->city ?></option>   
                                       <?php
                                       foreach ($allCityData['Data'] as $Citykey => $Cityvalue) {
                                        echo  '<option value="'.$Cityvalue->id.'">'.$Cityvalue->city.'</option>';
                                     
                                 } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-2">
                                        <label for="state">State</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="state" class="form-control" id="state">
                                        <option value="">State</option>   
                                       <?php
                                      foreach ($allStateData['Data'] as $Statekey => $Statevalue) {
                                       echo  '<option value="'.$Statevalue->id.'">'.$Statevalue->name.'</option>';
                                     
                                 } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-2">
                                        <label for="country">Country</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="country" class="form-control" id="country">
                                        <option value="">Country</option>   
                                       <?php
                                      foreach ($allCountryData['Data'] as $Countrykey => $Countryvalue) {
                                        echo  '<option value="'.$Countryvalue->id.'">'.$Countryvalue->name.'</option>';
                                     
                                 } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-2">
                                        <label for="profile_pic">Profile Pic</label>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="file" name="profile_pic" id="profile_pic">
                                </div>
                            </div>
                                <div class="row mt-3">
                                    <div class="col text-center">
                                        <input type="submit" class="btn btn-primary" value="Update" name="edituser" id="edituser">
                                        <input type="reset" class="btn btn-danger">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>



    </div>
</div>