<?php 
$to = "rigatos@vesto.gr"; 
$subject = "Email From www.vesto.gr";
$headers = "From: www.vesto.gr";
$forward = 1;
$location = "index.html#section-07";
$date = date ("l, F jS, Y"); 
$time = date ("h:i A"); 
$msg = "Below is the result of your feedback form. It was submitted on $date at $time.\n\n"; 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	foreach ($_POST as $key => $value) { 
		$msg .= ucfirst ($key) ." : ". $value . "\n"; 
	}
}
else {
	foreach ($_GET as $key => $value) { 
		$msg .= ucfirst ($key) ." : ". $value . "\n"; 
	}
}

mail($to, $subject, $msg, $headers); 
if ($forward == 1) { 
    header ("Location:$location"); 
} 
else { 
    echo "Thank you for submitting our form. We will get back to you as soon as possible."; 
}
?>