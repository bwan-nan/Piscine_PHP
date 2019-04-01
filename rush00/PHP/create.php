<?php
	if (isset($_POST["submit"]) && $_POST["submit"] ==	"OK")
	{
		if (!file_exists("../data"))
			mkdir("../data");
		if (!file_exists("../data/private"))
			mkdir("../data/private");
		if (file_exists("../data/private/passwd"))
			$file = unserialize(file_get_contents("../data/private/passwd"));
		if (isset($file[$_POST["login"]]))
			print("Utilisateur deja existant!\n");
		else
		{
			if (isset($_POST["login"]) && isset($_POST["passwd"]) && $_POST["login"] != "" && $_POST["passwd"] != "")
			{
				$user["login"] = $_POST["login"];
				$user["passwd"] = hash(whirlpool, $_POST["passwd"]);
				if ($_POST["login"] == "cbilga")
					$user["admin"] = TRUE;
				else
					$user["admin"] = FALSE;
				$file[$_POST["login"]] = $user;
				file_put_contents("../data/private/passwd", serialize($file));
				print("Creation de l'utilisateur ".$_POST["login"]." reussie\n");
				print("<br /><a href=\"index.php\">Back to Home Page</a>");
			}
			else
			{
				print("Veuillez remplir bien les champs Identifiant et Mot de passe\n");
				print("<br /><a href=\"index.php\">Back to Home Page</a>");
			}
		}
	}
	else
	{
		print("ERROR\n");
		print("<br /><a href=\"index.php\">Back to Home Page</a>");
	}
?>
