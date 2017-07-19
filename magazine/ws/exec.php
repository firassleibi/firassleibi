<?php
include("../include/phrases.php");
include("../include/db.php");
include("../include/functions.php");

if(isset($_GET['key'])&& isset($_GET['fname'])){

    $key=$_GET['key'];
    $fname=$_GET['fname'];
    // Check Key
        if(!compare($key,"mag"))
            header("location: ../index.php");
    // End Check Key
    switch($fname){
//#################################################################################
        case "getBooks" :
				if(isset($_GET['userid']))
					echo getBooksToJson($_GET['userid']);
				else
					echo "error";
                break;
//#################################################################################				
		case "register" :
				if(isset($_GET['username'])&&isset($_GET['password'])&&isset($_GET['email'])&&isset($_GET['gender'])&&isset($_GET['birthdate'])){
					$userid=insertUser($_GET['username'],$_GET['password'],$_GET['email'],$_GET['gender'],$_GET['birthdate']);
					echo $userid;
				}
				else{
					echo "error";
				}
				break;
//#################################################################################			
		case "login" :
				if(isset($_GET['username'])&&isset($_GET['password'])){
					$result=checkUserPassword($_GET['username'],$_GET['password']);
					if($result==false){
						echo "error";
					}
					else
						echo userToJson($result);
				}
				else{
					echo "error";
				}
				break;
//#################################################################################
		case "change_password" :
				if(isset($_GET['username'])&&isset($_GET['password'])&&isset($_GET['newpassword'])){
					$result=checkUserPassword($_GET['username'],$_GET['password']);
					if($result==false){
						echo "error";
					}
					else
					{
						setUserPassword($_GET['username'],$_GET['newpassword']);
						echo userToJson($result);
					}
				}
				else{
					echo "error";
				}
				break;
//#################################################################################
		case "toggle_bookmark" :
				if(isset($_GET['user_id'])&&isset($_GET['book_id'])){
					$result=toggleBookmark($_GET['user_id'],$_GET['book_id']);
					echo $result;
				}
				else{
					echo "error";
				}
				break;
//#################################################################################
		case "check_bookmark" :
				if(isset($_GET['user_id'])&&isset($_GET['book_id'])){
					$result=checkBookmark($_GET['user_id'],$_GET['book_id']);
					echo $result;
				}
				else{
					echo "error";
				}
				break;
//#################################################################################
        default :
            echo "error";
            break;
    }
}
else{
    header("location: ../index.php");
}

?>