<?php
	require ("../../../config.php");
	$database = "if17_seppcasp";

	function getSingleIdea($editId){
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("SELECT idea, ideacolor FROM userideas WHERE id=?");
		echo $mysqli->error;
		$stmt->bind_param("i", $editId);
		$stmt->bind_result($idea, $color);
		$stmt->execute();
		$ideaObject = new Stdclass();
		if($stmt->fetch()){
				$ideaObject->text = $idea;
				$ideaObject->color = $color;
		} else{
			//sellist mõtet polnudki
			$stmt->close();
			$mysqli->close();
			header("Location: userideas.php");
			exit();
		}
		
		$stmt->close();
		$mysqli->close();
		return $ideaObject;
	}


	function updateIdea($id, $idea, $color){
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("UPDATE userideas SET idea=?, ideacolor=? WHERE id=?");
		$stmt->bind_param("ssi", $idea, $color, $id);
		$stmt->execute();

		$stmt->close();
		$mysqli->close();
	}

	function deleteIdea($id){
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("UPDATE userideas SET deleted=NOW() WHERE id=?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		
		$stmt->close();
		$mysqli->close();
	}

?>