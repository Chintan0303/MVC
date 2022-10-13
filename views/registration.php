<!-- 
 <section class="w3l-breadcrumb">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.html">Home</a></li>
                <li class="active"><span class="fa fa-angle-right mx-2" aria-hidden="true"></span> Pages</li>
                <li class="active"><span class="fa fa-angle-right mx-2" aria-hidden="true"></span> About Us</li>
            </ul>
        </div>
    </section> -->
<section class="locations-1" id="locations">
    <style>
        input[type="radio"],[type='checkbox'] {
            -webkit-appearance: auto !important;
            outline: auto !important;
        }
    </style>
    <div class="locations py-5">
        <!-- test -->
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="card">
                        <div class="card-header text-center">
                            Registration
                        </div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col">
                                        <input type="text" placeholder="Enter User Name" class="form-control" name="user_name" id="username">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="password" placeholder="Enter Password" class="form-control" name="password" id="password">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="email" placeholder="Enter Email" class="form-control" name="email" id="email">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="text" placeholder="Enter Fullname" class="form-control" name="fullname" id="Fullname">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="tel" placeholder="Enter Mobile" class="form-control" name="mobile" id="mobile">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="radio" name="gender" value="Male" id="male" checked> <label for="male"> Male</label>
                                        <input type="radio" name="gender" value="Female" id="female"> <label for="female"> Female</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="checkbox" name="hobbies[]" value="cricket" id="hobbies"> <label for="cricket"> Cricket</label>
                                        <input type="checkbox" name="hobbies[]" value="reading" id="reading"> <label for="reading"> Reading</label>
                                        <input type="checkbox" name="hobbies[]" value="music" id="music"> <label for="music"> Music</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <?php  // echo "<pre>";print_r($allCityData);?>
                                        <select name="city" class="form-control" id="city">
                                            <option value="">---Select City---</option>;   
                                            <?php
                                        
                                        foreach ($allCityData['Data'] as $key => $value) {
                                               echo  '<option value="'.$value->id.'">'.$value->city.'</option>';
                                            
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                <div class="col">
                                    <input type="file" name="profile_pic" id="profile_pic">
                                </div>
                            </div>
                                <div class="row mt-3">
                                    <div class="col text-center">
                                        <input type="submit" class="btn btn-primary" name="registraion" id="registraion">
                                        <input type="reset" class="btn btn-danger">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>