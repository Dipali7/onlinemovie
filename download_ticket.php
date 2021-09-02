
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ticket</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<?php
	$html='<div class="container ">';
	
	$html.='<div class="row">';
		$html.='<div class="col-lg-6 ">';
			$html.='<h2 class=" my-5 ">Movie Ticket</h2>';
			
			include 'include/config.php';
			$sql="SELECT * FROM movie_list INNER JOIN booking_list ON movie_list.id=booking_list.movie_id where movie_id='".$_GET['movie_id']."'";
			$query=$conn->prepare($sql);
			$query->execute();
			
				while($row = $query->fetch()){
			
					
	
			$html.='<h4>Film :      '.$row['movie_name'].' </h4>';
			$html.='<h4>City :      '.$row['city'].' </h4>';
			$html.='<h4>Time :      '.$row['timess'].' </h4>';
			$html.='<h4>Screen :    '.$row['screen_no'].' </h4>';
			$html.='<h4>Seat No. :  '.$row['seat_no'].' </h4>';
			$html.='<h4>Amount :  '.$row['price'].' </h4>';
			
		}

		
		
		$html.='</div>';
	$html.='</div>';
	$html.='</div>';
	?>
</body>
</html>

	<?php 
	
require('vendor/autoload.php');



$mpdf=new \Mpdf\Mpdf ();
$mpdf->WriteHTML($html);
$file= time().'.pdf';
$mpdf->output($file,'I');
?>