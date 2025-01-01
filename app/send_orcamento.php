<?php




try{
	
 	//var_dump($dados);
 	//var_dump($json);
}
catch(PDOException $e){
    echo $e->getMessage;
}




/*Retrieve form data. 
//GET - user submitted data using AJAX
//POST - in case user does not support javascript, we'll use POST instead
$name = ($_GET['name']) ? $_GET['name'] : $_POST['name'];
$company = ($_GET['company']) ?$_GET['company'] : $_POST['company'];
$email = ($_GET['email']) ?$_GET['email'] : $_POST['email'];
$comment = ($_GET['comment']) ?$_GET['comment'] : $_POST['comment'];*/

$dados =$_POST["dados"];
$json =$_POST["json"];

$name = $dados['nome'];
$contribuinte = $dados['contribuinte'];
$company = $dados['empresa'];
$email = $dados['email'];


//flag to indicate which method it uses. If POST set it to 1

if ($_POST) $post=1;

/*//Simple server side validation for POST data, of course, you should validate the email
if (!$name) $errors[count($errors)] = 'Please enter your name.';
if (!$email) $errors[count($errors)] = 'Please enter your email.'; 
if (!$comment) $errors[count($errors)] = 'Please enter your message.'; */
$errors =NULL;
//if the errors array is empty, send the mail
if (!$errors) {

	//recipient - replace your email here
	$to = 'sales@importinox.com';	
	//sender - from the form
	$from = $name . ' <' . $email . '>';
	
	//subject and the html message
	$subject = 'PO: ' . $name .' - ' .$company;	
	$message = 'Nome: ' . $name . '<br/><br/>
				Empresa: ' . $company . '<br/><br/>
				Contribuinte: ' . $contribuinte . '<br/><br/>	
		       	Email: ' . $email . '<br/><br/>';
	$message .= '<html><body>';
	$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
	$message .= "<tr style='background: #eee;'><td><strong>Referência:</strong></td><td><strong>Descrição:</strong></td><td><strong>Quantidade:</strong></td></tr>";
	foreach ($json as $each_member) { 
		$message .= "<tr >";
		while (list($key, $value) = each ($each_member)) {                                       
        	$message .= "<td>". $value ."</td>";
    	}
    	$message .= "</tr>";
	}

	$message .= "</table>";
	$message .= "</body></html>";

	//send the mail
	$result = sendmail($to, $subject, $message, $from);
	
	//if POST was used, display the message straight away
	if ($_POST) {
		if ($result) echo 'Thank you! We have received your message.';
		else echo 'Sorry, unexpected error. Please try again later';
		
	//else if GET was used, return the boolean value so that 
	//ajax script can react accordingly
	//1 means success, 0 means failed
	} else {
		echo $result;	
	}

//if the errors array has values
} else {
	//display the errors message
	for ($i=0; $i<count($errors); $i++) echo $errors[$i] . '<br/>';
	echo '<a href="index.php">Back</a>';
	exit;
}


//Simple mail function with HTML header
function sendmail($to, $subject, $message, $from) {
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=utf8" . "\r\n";
	$headers .= 'From: ' . $from . "\r\n";
	
	$result = mail($to,$subject,$message,$headers);
	
	if ($result) return 1;
	else return 0;
}

?>