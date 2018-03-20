<?php
	$id=$_GET['user'];

	$connect = mysqli_connect("92.222.96.254","oliver","Opert213","email");

	// for results
	if($id!='AllUsers'){
	$result2 = mysqli_query($connect,"SELECT * FROM feedback Where ReceiverID='$id' AND Grade is not NULL AND GradePercentage is not NULL");
    }
	else if($id=='AllUsers'){
	$result2 = mysqli_query($connect,"SELECT * FROM feedback WHERE Grade is not NULL AND GradePercentage is not NULL");
    }

	$rs2 = array();
	$i=0;
	while($rs2[] = mysqli_fetch_assoc($result2)) {
	// do nothing ;-)
	}

	$result3 = mysqli_query($connect,"SELECT * FROM users");
	$rs3 = array();
	$i=0;
	while($rs3[] = mysqli_fetch_assoc($result3)) {
	// do nothing ;-)
	}


	mysqli_close($connect);

	unset($rs2[count($rs2)-1]);
	unset($rs3[count($rs3)-1]);
  // echo json_encode($rs2);
  //removes a null value
	//print("{ \"results\":" . json_encode($rs2) . "}");
	print("{ \"results\":" . json_encode($rs2) . " , \"users\":" . json_encode($rs3) . "}");
?>