<?php
	//muutujad
	$myName = "Caspar";
	$myFamilyName ="Sepp";
	$monthNamesET=["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
	//var_dump($monthNamesET);
	//echo $monthNamesET[8];
	$monthNow = $monthNamesET[date("n") - 1];
	
	//hindan päeva osa | võrdlemine  <  >  <=  >=  ==  !=
	$hourNow = date ("H");
	$partofDay = "";
	if ($hourNow < 8){
		$partofDay = "varajane hommik";
	}
	if ($hourNow >= 8 and $hourNow < 16){
		$partofDay = "koolipäev";
	}
	if ($hourNow > 16){
		$partofDay = "vaba aeg";
	}
	
	//echo $partofDay;

	//vanusega tegelemine
	//var_dump($_POST);
	//echo $_POST["birthYear"];
	$myBirthYear;
	$ageNotice = " ";
	if(isset($_POST["birthYear"]) and $_POST["birthYear"] != 0) {
		$myBirthYear = $_POST["birthYear"];
		$myAge = date("Y") - $_POST["birthYear"];
		$ageNotice = "<p>Te olete umbkaudu " .$myAge ." aastat vana.</p>";
		
		$ageNotice .="<p>Te olete elanud järgnevatel aastatel: </p> <ul>";
		for ($i = $myBirthYear; $i <=date ("Y"); $i ++){
			$ageNotice .= "<li>" .$i ."</li>";
		}
		$ageNotice .= "</ul>";
	}
		
	/*for ($i = 0; $i < 5; $i ++){
		echo "ha";
		
	}*/
	?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Veebiprogrammeerimine</title>
</head>
<body>
	<h1><?php echo $myName ." " .$myFamilyName; ?> </h1>
	<p>See veebileht on loodud õppetöö raames ning ei sisalda mingisugust tõsiseltvõetavat sisu!</p>
	<?php
		echo "<p>Algas PHP õppimine.</p>";
		echo "<p>Täna on ";
		echo date ("d. ") .$monthNow .date(" Y") .", kell oli lehe avamise hetkel " .date("H:i:s");
		echo ", hetkel on " .$partofDay .".</p>";

		
	?>
	<h2>Natuke vanusest</h2>
	<form method="POST">
		<label>Teie sünniaasta: </label> <input name="birthYear" id="birthYear" type="number" value="<?php echo $myBirthYear; ?>" min="1900" max="2017">
		<input name="submitBirthYear" type="submit" value="Sisesta">
	
	</form>
	<?php
		if ($ageNotice != ""){
			echo $ageNotice;
		}
	?>

</body>
</html>