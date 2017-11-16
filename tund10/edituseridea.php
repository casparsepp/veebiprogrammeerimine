<?php
	require("functions.php");
	require("editideafunctions.php");
	$notice = "";
	
	
	
	
	//kas pole sisse loginud
	if(!isset($_SESSION["userId"])){
		header("Location: login.php");
		exit();
	}
	
	//väljalogimine
	if(isset($_GET["logout"])){
		session_destroy();
		header("Location: login.php");
		exit();
	}
	
	if (isset($_POST["ideaButton"])){
		updateIdea($_POST["id"], test_input($_POST["idea"]), $_POST["ideaColor"]);
		//jään siia samasse
		header("Location: ?id=" .$_POST["id"]);
		exit();
	}	
	
	if(isset($_GET["delete"])){
		deleteIdea($_GET["id"]);
		header("Location: userideas.php");
		exit();
	}
	
	$idea = getSingleIdea($_GET["id"]);	
		
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Caspar Sepp</title>
</head>
<body>
	<h1>Veebiprogrameerimine</h1>
	<p>See leht on loodud õppetöö raames ning ei sisalda mingit tõsiseltvõetavat sisu.</p>
	<p><a href="?logout=1">Logi välja!</a></p>
	<p><a href="userideas.php">Tagasi mõtete lehele</a></p>
	<br>
	<h2>Toimeta mõtet</h2>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<input name="id" type="hidden" value="<?php echo $_GET["id"]; ?>">
		<label>Hea mõte: </label>
		<textarea name="idea"><?php echo $idea->text ?> </textarea>
		<br>
		<label>Mõttega seonduv värv: </label>
		<input name="ideaColor" type="color" value="<?php echo $idea->color ?>">
		<br>
		<input name="ideaButton" type="submit" value="Salvesta mõte!">
		<span><?php echo $notice; ?></span>
	</form>
	<p><a href="?id=<?php echo $_GET["id"]; ?>&delete=true">Kustuta</a> see mõte!</p>
	<!--  href="?id=17&delete=true"    -->
	<hr>
	
	
	
	
	
</body>
</html>