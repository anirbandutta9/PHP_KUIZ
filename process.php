<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
   
	if(!isset($_SESSION['score'])) {
		$_SESSION['score'] = 0;
	}
    
	if ($_POST) {
        $newtime = time();
    if ( $newtime > $_SESSION['time_up']) {
    echo "<script>alert('time up');
    window.location.href='results.php';</script>";
}
else {
        $_SESSION['start_time'] = $newtime;
		$qno = $_POST['number'];
        $_SESSION['quiz'] = $_SESSION['quiz'] + 1;
		$selected_choice = $_POST['choice'];
		$nextqno = $qno+1;

		$query = "SELECT correct_answer FROM questions WHERE qno= '$qno' ";
        $run = mysqli_query($conn , $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($run) > 0 ) {
        	$row = mysqli_fetch_array($run);
        	$correct_answer = $row['correct_answer'];
        }
        if ($correct_answer == $selected_choice) {
        	$_SESSION['score']++;
        }

        $query1 = "SELECT * FROM questions ";
        $run = mysqli_query($conn , $query1) or die(mysqli_error($conn));
        $totalqn = mysqli_num_rows($run);

        if ($qno == $totalqn) {
        	header("location: results.php");
        }
        else {
        	header("location: question.php?n=".$nextqno);
        }

    
}
}
else {
    header("location: home.php");
}
}
else {
	header("location: home.php");
}
?>