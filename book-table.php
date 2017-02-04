<?php
if($_POST!='' && isset($_POST)){
	
	if($_REQUEST['userEmail']!='' || $_REQUEST['bookDate']!='' || $_REQUEST['bookTime']!='')
	{
		$to = "info@deliciousrestaurant.com"; 
		$from = strip_tags($_REQUEST['userEmail']); 
		$date = strip_tags($_REQUEST['bookDate']); 
		$time = strip_tags($_REQUEST['bookTime']); 
		$headers = 'From:'.$from. "\r\n" .
		'Reply-To:'.$from. "\r\n" .
		'X-Mailer: PHP/' . phpversion();	
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";	
		
		$subject = "You have a message sent from your site";
		
		$body   = '<html>';
		$body  .= '<body>';
		$body  .= 'Hello Webmaster,<br><br>';
		$body  .= 'Email: '.$from.'<br>';		
		$body  .= 'Date: '.$date.'<br>';
		$body  .= 'Time: '.$time.'<br>';
		$body  .= '</body>';
		$body  .= '</html>';
			
		$send = @mail($to, $subject, $body, $headers);
		
		if($send == true)
		{
			header('location:index.html#success');
		}
		else
		{
			header('location:index.html#failed');
		}
	}
	else
	{
		header('location:index.html#data-missing');
	}		
}
?>