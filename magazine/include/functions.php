<?php
    session_start();
	error_reporting(0);
	set_time_limit(0);
    function checkAdminPassword($username,$password){
        global $con;
        $result=false;
        $stmt = $con->prepare("SELECT password FROM settings WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($stored_password);
        if($stmt->num_rows>0){
            $stmt->fetch();
            if (md5($password)==$stored_password)
                $result=true;
        }
        return $result;
    }
    function setAdminPassword($password){
        global $con;
        $password=md5($password);
        $stmt = $con->prepare("UPDATE settings set password=? WHERE id = 1");
        $stmt->bind_param("s", $password);
        $stmt->execute();
    }
	function checkUserPassword($username,$password){
        global $con;
        $result=false;
        $stmt = $con->prepare("SELECT id,password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user_id,$stored_password);
        if($stmt->num_rows>0){
            $stmt->fetch();
            if (md5($password)==$stored_password)
                $result=$user_id;
        }
        return $result;
    }
    function setSession(){
        $_SESSION['loggedin']=true;

    }
    function checkSession(){
        if(!isset($_SESSION['loggedin']))
            header("location: signin.php");
    }
    function getAdminUsername(){
        global $con;
        $stmt = $con->prepare("SELECT username FROM settings WHERE id = 1");
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($username);
        if($stmt->num_rows>0){
            $stmt->fetch();
        }
        return $username;
    }
    function logout(){
        session_destroy();
        header("location: index.php");
    }
    function uploadBook($file,$filename,$price,$description,$thumb){
        $target_dir = "books/";
        $target_file = $target_dir . $filename.".pdf";
        $uploadOk = 1;
        $imageFileType = pathinfo($file["name"],PATHINFO_EXTENSION);

// Check if file already exists
        if (file_exists($target_file)) {
            $error= "Sorry, Magazine name already exists.";
            $uploadOk = 0;
        }

// Allow certain file formats
        if($imageFileType != "pdf" && $imageFileType != "PDF" ) {
            $error= "Sorry, only PDF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk != 0) {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                $error="none";
                $thumbname=uniqid();
                $imageFileType = pathinfo($thumb["name"],PATHINFO_EXTENSION);
                $target_file = $target_dir . $thumbname.".".$imageFileType;
                $uploadOk = 1;

// Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    $error= "Sorry, only images files are allowed for thumbnail.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk != 0) {
                    if (move_uploaded_file($thumb["tmp_name"], $target_file)) {
                        $bookid=insertBook($filename,$price,$description,$thumbname.".".$imageFileType);
                        header("location: convert.php?id=$bookid");
                    }
                    else {
                        $error= "Sorry, there was an error uploading the file, Please try again.";
                    }

            } }else {
                $error= "Sorry, there was an error uploading the file, Please try again.";
            }
        }
        return $error;
        }

    function insertBook($bookname,$price,$description,$image){
        global $con;
        $stmt = $con->prepare("INSERT into books set bookname=?,price=?,description=?,image=?");
        $stmt->bind_param("ssss", $bookname,$price,$description,$image);
        $stmt->execute();
        return $stmt->insert_id;
    }
	function insertUser($username,$password,$email,$gender,$birthdate){
        global $con;
        $stmt = $con->prepare("INSERT into users set username=?,password=?,email=?,gendre=?,birth_date=?");
        $stmt->bind_param("sssss", $username,md5($password),$email,$gender,$birthdate);
        $stmt->execute();
        return $stmt->insert_id;
    }
    function getBookPages($id){
        global $con;
		$pages="none";
        $stmt = $con->prepare("SELECT pages FROM books WHERE id = ?");
		$stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($pages);
        if($stmt->num_rows>0){
            $stmt->fetch();
        }
        return $pages;
    }
	function getBookName($id){
        global $con;
		$pages="none";
        $stmt = $con->prepare("SELECT bookname FROM books WHERE id = ?");
		$stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($bookname);
        if($stmt->num_rows>0){
            $stmt->fetch();
        }
        return $bookname;
    }
	function setPages($id,$pages){
        global $con;
        $stmt = $con->prepare("UPDATE books set pages=? WHERE id = ?");
        $stmt->bind_param("ss", $pages, $id );
        $stmt->execute();
    }
	
	function setUserPassword($username,$password){
        global $con;
        $stmt = $con->prepare("UPDATE users set password=? WHERE username = ?");
        $stmt->bind_param("ss", md5($password), $username);
        $stmt->execute();
    }
	function booksToJson(){
		global $con;
		$query=mysqli_query($con,"select * from books");
		while($row=mysqli_fetch_assoc($query)){
			$l[]=$row;
		}
		$json=json_encode($l);
		file_put_contents("json/books.json",$json);
	}
	function getBooksToJson($userid){
		global $con;
		$query=mysqli_query($con,"select * from books");
		while($row=mysqli_fetch_assoc($query)){
			if($userid==0){
				$row['purchased']=0;
				$row['bookmarked']=0;
			}
			else{
				$purchases=mysqli_query($con,"select * from purchases where book_id=".$row['id']." AND user_id=".$userid);
				if(mysqli_num_rows($purchases)>0)
					$row['purchased']=1;
				else
					$row['purchased']=0;
					
				$bookmarked=mysqli_query($con,"select * from bookmarks where book_id=".$row['id']." AND user_id=".$userid);
			if(mysqli_num_rows($bookmarked)>0)
				$row['bookmarked']=1;
			else
				$row['bookmarked']=0;
			}
			$l[]=$row;
		}
		echo $json=json_encode($l);
		
	}
    function usersToJson(){
        global $con;
        $query=mysqli_query($con,"select * from users");
        while($row=mysqli_fetch_assoc($query)){
            $l[]=$row;
        }
        $json=json_encode($l);
        file_put_contents("json/users.json",$json);
    }
	function toggleBookmark($user_id,$book_id){
        global $con;
        $query=mysqli_query($con,"select * from bookmarks where user_id=$user_id AND book_id=$book_id");
		if(mysqli_num_rows($query)>0){
			mysqli_query($con,"delete from bookmarks where user_id=$user_id AND book_id=$book_id");
			return "removed";
		}
		else{
			mysqli_query($con,"insert into bookmarks set user_id=$user_id, book_id=$book_id");
			return "added";
		}
        
    }
	function checkBookmark($user_id,$book_id){
        global $con;
        $query=mysqli_query($con,"select * from bookmarks where user_id=$user_id AND book_id=$book_id");
		if(mysqli_num_rows($query)>0){
			return "true";
		}
		else{
			return "false";
		}
        
    }
	function userToJson($id){
        global $con;
        $query=mysqli_query($con,"select * from users where id=$id");
        while($row=mysqli_fetch_assoc($query)){
            $l[]=$row;
        }
        $json=json_encode($l);
        return $json;
    }
    function compare($x1,$x2){
        if($x1==$x2)
           return true;
        else
            return false;
    }
	function getBooksCount(){
        global $con;
        $stmt = $con->prepare("SELECT * FROM books");
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows;
    }
	function deleteBook($id){
		global $con;
		if(!is_numeric($id))
			exit();
		$query=mysqli_query($con,"select * from books where id=$id");
		if(mysqli_num_rows($query)>0){
			$row=mysqli_fetch_object($query);
			try{
			unlink('books/'.$row->bookname.'.pdf');
			unlink('books/'.$row->image);
			deleteDir("books/".$row->bookname);
			}catch(Exeption $e){}
			mysqli_query($con,"delete from books where id=$id");
		}
	}
	function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}

?>