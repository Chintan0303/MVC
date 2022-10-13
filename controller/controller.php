<?php
session_start();
include_once("model/model.php");
class Controller extends Model{
    
    // public $base_url = "http://localhost/laravel/11JulyMWF3/25JulyMWF3/PHP/MVC/";
    public $base_url = "";
    public function __construct() {
        ob_start();
        parent::__construct();
        //   echo "<pre>";
        //   print_r($_SERVER);
        $ArrOfReq = explode("/",$_SERVER['REQUEST_URI']);
        //  print_r($ArrOfReq);
        // echo "<br>http://localhost/laravel/11JulyMWF3/25JulyMWF3/PHP/MVC/<br>";
        $this->base_url = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/".$ArrOfReq[1];
        $this->base_url_assets = $this->base_url."/assets/";
        // exit;
        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                case '/home':
                    include_once("views/header.php");
                    include_once("views/maincontent.php");
                    include_once("views/footer.php");
                    break;
                case '/about':
                    echo "about us page";
                    // include_once("views/header.php");
                    // include_once("views/maincontent.php");
                    // include_once("views/footer.php");
                    break;
                case '/signin':
                
                    include_once("views/headersubpages.php");
                    include_once("views/loginpage.php");
                    include_once("views/footer.php");
                    if (isset($_POST['login'])){
                        echo "<pre>";
                        print_r($_POST);
                        
                        if($_POST['username'] == !"" && $_POST['password']== !""){
                         $LoginRes = $this->login($_POST['username'],$_POST['password']);
                         echo "signin post data "; print_r($_POST);
                         echo "login res  "; print_r($LoginRes);
                         echo "login res 0 index "; print_r($LoginRes['Data'][0]);
                           if ($LoginRes['Code']==1) {
                            $_SESSION['UserData'] = $LoginRes['Data'][0];
                            if($LoginRes['Data'][0] ->role_id ==1){

                                header("location:admindashboard");
                            }else{
                                header("location:home");
                            }
                           
                           }else{
                            echo "<script>alert('Invalid User')</script>";
                           }

                        }else {
                            echo " <script>alert('User Name and password is required!!!')</script>";
                        }

                        }
                       
                    break;
                case '/registration':
                    $allCityData = $this->select('cities');
                    // echo "<pre>";
                    // print_r($allCityData);
                    // exit;
                    include_once("views/headersubpages.php");
                    include_once("views/registration.php");
                    include_once("views/footer.php");
                    // echo "<pre>";
                    // print_r($_REQUEST);

                    if (isset($_POST['registraion'])) {
                        $hobb = implode(',',$_POST['hobbies']);
                        print_r($hobb);
                        // $FetchAllUsersData = $this->insert('users',array("user_name"=>$_POST['username'],"password"=>$_POST['password'],"fullname"=>$_POST['fullname'],"email"=>$_POST['email'],"mobile"=>$_POST['mobile'],"gender"=>$_POST['gender'],"city"=>$_POST['city']));
                         echo "<pre>";
                         print_r($_POST); 
                         unset($_POST['hobbies']);
                         array_pop($_POST);
                         $insertarray = array_merge($_POST,array('hobbies'=>$hobb));
                         print_r($_POST);
                         print_r($insertarray);
                         $RegistUserData = $this->insert('users',$insertarray); 
                    }

                    break;
                case '/allusers':
                    // echo "showallusers";
                    // echo "<pre>";
                    $FetchAllUsersData = $this->select('users');
                    // print_r($FetchAllUsersData);
                    // exit;

                    include_once("admin/header.php");
                    include_once("admin/allusers.php");
                    include_once("admin/footer.php");
                    break;

                case '/addnewuser':
                    $allCityData = $this->select('cities');
                    if (isset($_POST['adduser'])) {
                        $hobb = implode(',',$_POST['hobbies']);  
                        // echo "<pre>";
                        // print_r($_POST);
                        array_pop($_POST);
                        unset($_POST['hobbies']);      
                        // print_r($_POST);
                        $insertArray = array_merge($_POST,array('hobbies'=>$hobb));
                        // print_r($insertArray);
                        $this->insert('users',$insertArray);
                    }
                    
                        include_once("admin/header.php");
                        include_once("admin/addnewuser.php");
                        include_once("admin/footer.php");
                        break;                

                    case '/admindashboard':

                        include_once("admin/header.php");
                        include_once("admin/admindashboard.php");
                        include_once("admin/footer.php"); 
                        // echo "<pre>";
                        // print_r($_SESSION['UserData']);
                        // print_r($_SESSION['UserData']->role_id );

                    break;

                    case '/edituser':
                        $allCityData = $this->select('cities');
                        $allStateData = $this->select('states');
                        $allCountryData = $this->select('countries');
                        $UserDataById =$this->selectWithWhere('users',$_GET);
                        $CityIdToNameArray =array('id'=>$UserDataById['Data'][0]->city);
                        $UserCityName =$this->selectWithWhere('cities',$CityIdToNameArray);

                        // echo"<pre>";
                        // print_r($CityNameArray );
                        // print_r($UserCityName);
                        // print_r($_GET);
                        // echo $UserDataById['Data'][0]->city;
                        // print_r($UserDataById);
                        // exit;


                        include_once("admin/header.php");
                        include_once("admin/edituser.php");
                        include_once("admin/footer.php"); 
                        // echo "<pre>";
                        // print_r($_SESSION['UserData']);
                        // print_r($_SESSION['UserData']->role_id );

                     if (isset($_POST['edituser'])) {
                        // echo"<pre>";
                        // print_r($_POST);
                        // echo"</pre>";

                        $hobb = implode(',',$_POST['hobbies']);
                        // print_r($hobb);
                        // echo "<pre>";
                        //  print_r($_POST); 
                         unset($_POST['hobbies']);
                         array_pop($_POST);
                         unset($_POST['state']);
                         unset($_POST['country']);
                        //  array_pop($_POST);
                        //  array_pop($_POST);
                        //  print_r($_POST);
                         $insertArray = array_merge($_POST,array('hobbies'=>$hobb));
                        //  print_r($insertArray);
                         //  print_r($insertarray);
                        //  echo"</pre>";
                         $this->update('users',$insertArray,$_GET);
                         echo "<pre>";
                          print_r($_FILES);
                          exit;
                          if(isset($_FILES["profile_pic"]))


                         header("location:allusers");
                         
                        
                     }



                    break;

                    case '/deleteuser':
                    //    print_r($_GET);
                    //    foreach ($_GET as $key => $value) {
                    //        echo "$key = $value";
                    //    }
                    
                    $this->delete('users',$_GET); 
                    header("location:allusers");
                    break;
        

                    case '/logout':
                    session_destroy();
                    header("location:signin");
                    break;
        
                
                default:
                    
                    break;
            }
        }else{
            header("location:home");
        }
    ob_flush();
    
    }

}

$Controller = new Controller;


?>