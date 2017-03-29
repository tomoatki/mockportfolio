<?php
	session_start();
	if(isset($_SESSION['views']))	{
			$_SESSION['views'] = $_SESSION['views'] + 1;
			} else {
					$_SESSION['views'] = 1;
			}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">Me</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">ME</a></li>
        <li><a href="#">WHAT</a></li>
        <li><a href="#">WHERE</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid bg-1 text-center">
	<h3>Tom Atkinson</h3>
	<br>
	<img src="face.JPG" class="img-circle" alt='me' style="width:350px;height350px;">
	<h3> Web Developer </h3>
	<br>
</div>
<div class="container-fluid bg-2 text-center">
	<h3> What do I do? </h3>
	<p> I am a third year software Engineering student at Edinburgh Napier University, I am also a free-lance  web developer. <p>
	<p> when I'm not bashing out code I enjoy scaling climbing walls and rock faces, allong with lifting heavy things up and down repeatedly! </p>
	<p> I am from Aberdeen but live in Edinburgh, around the tollcross area. </p>
	<p> My specalist area of work is in small enterprise or personal page website building. </p>
	<p> Coding is my biggest passion and I am working every day to build this skill and a richer understanding of computing. </p>
	<br>
</div>

<div class="container-fluid bg-3 text-left" div id="contact">
	<?php
	if (isset ($_POST['button'])) {
	
		$name =  trim($_POST['fname']);
		$last_name = trim($_POST['lname']);
		$email = trim($_POST['contact']);
		$message1 = ($_POST['message']);
		
		
		if( !$name || !$last_name || !$email || !$message1)
		{
			echo 'hello';
			exit;
		}
		
		$to = "tom.atkinson12@btinternet.com";
		
		$subject = "$name sent you a message via your contact form";
		
		$message = "Name: $name\r\n";
		$message .= "lastname: $last_name\r\n";
		$message .="Email: $email\r\n";
		$message .="Message: $message1\r\n";
		
		$message = wordwrap($message1, 72);
		
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
		$headers .= "From: $name $last_name <$email>/r/n";
		$headers .= "X-Priority: 1\r\n";
		$headers .= "X-MSMail-Priority: High/r/n/r/n";
		
		// Send mail
		mail($to, $subject, $message, $headers);
	
	?>
	<h5>Thanks for contacting me </h5>
	<p>I will be in touch soon! </p>
	
	<?php } else { ?>
	<h3> How to contact </h3>
	<br>
	<div class="row">
    <div class="col-sm-4">
	<form action="" method="post" id="contact-form">
	<p>First name</p>
	<input type="text" id="fname" name="fname"><br>
		<br>
		<p>Last name<p> 
		<input type="text" id="lname" name="lname"><br>
		<br>
	</div>
	<div class="col-sm-4">
		<p>Email<p>
		<input type="text" id="contact" name="contact"><br>
		<p>Message</p>
		<textarea rows="4" id="message" name="message" cols="50"> Please enter the message here 
		</textarea>
		<br>
		<br>
	</div>
	<div class="col-sm-4">
		<br>
		<input type ="submit" class="button next" name="button" value="send message">
	</form>
	</div> 
	</div>
	<?php } ?>
</div>
	<br>
	<div class="container-fluid bg-4 text-center">
	<br>
	<p>Bootstrap Theme Made By Tom Atkinson</p> 
	<p> Page Views: <?php echo $_SESSION['views'];?></p>
	</div>
</body>
</html>