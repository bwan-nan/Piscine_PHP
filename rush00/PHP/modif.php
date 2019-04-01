<?php
	if (isset($_POST["submit"]) && $_POST["submit"] ==	"OK")
	{
		$file = unserialize(file_get_contents("../data/private/passwd"));
		if (isset($file[$_POST["login"]]))
		{
			if (isset($_POST["newpw"]) && isset($_POST["oldpw"]) && $_POST["newpw"] != "" && $_POST["oldpw"] != "")
			{
				if ($file[$_POST["login"]]["passwd"] == hash(whirlpool, $_POST["oldpw"]))
				{
					$file[$_POST["login"]]["passwd"] = hash(whirlpool, $_POST["newpw"]);
					file_put_contents("../data/private/passwd", serialize($file));
					print("Modification de mot de passe reussie!\n");
				}
				else
					print("Old password incorrect.\n");
			}
			else
				print("An error occured filling the fields.\n");
		}
		else
				print("An error occured filling the fields.\n");
	}
	else
	{
		print("ERROR\n");
	}
header('Location: ../index.php');
?>
