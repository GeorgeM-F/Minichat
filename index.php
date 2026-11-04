<?php

date_default_timezone_set('UTC');

if (isset($_POST["submit"])) {
    $f=fopen("postore.txt","a");
    fwrite($f,"<p>UTC ".date("Y/m/d")." ".date("H:i:sa")."<br><strong>".filter_var($_POST["username"], FILTER_SANITIZE_STRING)."</strong><br><em>".filter_var($_POST["message"], FILTER_SANITIZE_STRING)."<br></em></p>");
    fclose($f);
};
 
?>



<!DOCTYPE html>
<html>
<head>
    <title>Minichat</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
 
<body>
    <h1>Minichat</h1>
    <h2>Make a post:</h2>
    <form method="post">
		<p>Your username:</p>
		<input type="text" name="username">
		<p>Your message</p>
        <input type="text" name="message">
        <input type="submit" name="submit">
    </form>
    <h2>Last posts:</h2>
	<?php $f=fopen("postore.txt","r"); ?>
	    <dir>
		    <?php echo (htmlentities(readfile("postore.txt"))) ?>
	    </dir>
	<?php fclose($f); ?>
</body>
 
</html>
