<?php
    include("db.php");
/**********************************************************************/
	function login($username,$password){
		global $con;
		$password=md5($password);
		$q=mysqli_query($con,"select * from student where username='$username' and password='$password'");
		if(mysqli_num_rows($q)>0){
			$user_id=mysqli_fetch_assoc($q);
			return $user_id['student_id'];
			
		}
		else
		return "fail";
	}
	function getStudents($id){
		global $con;
		
		if($id!=null){
		$q=mysqli_query($con,"select * from student where student_id=$id");
		}
		else
		$q=mysqli_query($con,"select * from student");
		if(mysqli_num_rows($q)>0){
			$l=[];
			while($user_id=mysqli_fetch_assoc($q)){
			$value['value']=$user_id['username'];
			$value['id']=$user_id['student_id'];
			array_push($l,$value);
			}
			return json_encode($l);
			
		}
	}
	function getSections($id){
		global $con;
		if($id!=null){
		$q=mysqli_query($con,"select * from section where course_id=$id");
		}
		else
		$q=mysqli_query($con,"select * from section");
		if(mysqli_num_rows($q)>0){
			$l=[];
			while($data=mysqli_fetch_assoc($q)){
			$value['value']="Section No.".$data['section_id'];
			$value['id']=$data['section_id'];
			array_push($l,$value);
			}
			return json_encode($l);
			
		}
	}
	function getCourses(){
		global $con;
		$q=mysqli_query($con,"select * from course");
		if(mysqli_num_rows($q)>0){
			$l=[];
			while($data=mysqli_fetch_assoc($q)){
			$value['value']=$data['title'];
			$value['id']=$data['course_id'];
			array_push($l,$value);
			}
			return json_encode($l);
			
		}
	}
	function getInstructors(){
		global $con;
		$q=mysqli_query($con,"select * from instructor");
		if(mysqli_num_rows($q)>0){
			$l=[];
			while($data=mysqli_fetch_assoc($q)){
			$value['value']=$data['first_name']." ".$data['last_name'];
			$value['id']=$data['instructor_id'];
			array_push($l,$value);
			}
			return json_encode($l);
			
		}
	}
	function getEnrollments(){
		global $con;
		$q=mysqli_query($con,"select * from enrollment");
		if(mysqli_num_rows($q)>0){
			$l=[];
			while($data=mysqli_fetch_assoc($q)){
			
			$section=mysqli_query($con,"select * from section where section_id=".$data['section_id']);
			$section_data=mysqli_fetch_assoc($section);
			$course=mysqli_query($con,"select * from course where course_id=".$section_data['course_id']);
			$course_data=mysqli_fetch_assoc($course);				
			$student=mysqli_query($con,"select * from student where student_id=".$data['student_id']);
			$student_data=mysqli_fetch_assoc($student);
			$instructor=mysqli_query($con,"select * from instructor where instructor_id=".$section_data['instructor_id']);
			$instructor_data=mysqli_fetch_assoc($instructor);
			$value['value']=$student_data["username"]." Enrolled to\n Section No: ".$data['section_id']."\n Instructor :".$instructor_data["first_name"]."\nCourse:".$course_data['title'];
			$value['id']=$data['enrollment_id'];
			array_push($l,$value);
			}
			return json_encode($l);
			
		}
	}
	function getDetails($id,$listtype){
		global $con;
		switch ($listtype){
			case 0:
				$q=mysqli_query($con,"select * from student where student_id=$id");
				$d=mysqli_fetch_object($q);
				return "ID:".$d->student_id." - First Name: ".$d->first_name." - Last Name: ".$d->last_name."  - username: ".$d->username."  - Gender: ".$d->gender;
				break;
			case 1:
				$q=mysqli_query($con,"select * from course where course_id=$id");
				$d=mysqli_fetch_object($q);
				return "ID:".$d->course_id." - Title: ".$d->title." - Hours: ".$d->hours;
				break;
			case 2:
				$q=mysqli_query($con,"select * from section where section_id=$id");
				$d=mysqli_fetch_object($q);
				return "ID:".$d->section_id." - Room_number: ".$d->room_number." - Course ID: ".$d->course_id." - Instructor ID: ".$d->instructor_id;
				break;
			case 3:
				$q=mysqli_query($con,"select * from instructor where instructor_id=$id");
				$d=mysqli_fetch_object($q);
				return "ID:".$d->instructor_id." - First Name: ".$d->first_name." - Last Name: ".$d->last_name." - Gender :".$d->gender." - address:".$d->address." - phone: ".$d->phone;
				break;

			default:
				break;
            }
	}
	function deleteStudent($id){
		global $con;
		mysqli_query($con,"delete from student where student_id=$id");
	}
	function deleteCourse($id){
		global $con;
		mysqli_query($con,"delete from course where course_id=$id");
	}
	function deleteInstructor($id){
		global $con;
		mysqli_query($con,"delete from instructor where instructor_id=$id");
	}
	function deleteSection($id){
		global $con;
		mysqli_query($con,"delete from section where section_id=$id");
	}
/**********************************************************************/
   