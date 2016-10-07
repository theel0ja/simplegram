<!--
    Simplegram
    A simple Telegram bot written with PHP. Good start for making own bots.
    https://github.com/theel0ja/Simplegram
-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>Simplegram Web Interface</title>

		<style>
			@import 'https://fonts.googleapis.com/css?family=Raleway:600,800';
			* {
				font-family: 'Raleway', sans-serif;
				font-weight: 600;
			}
			a {
				text-decoration: none;
				color: blue;
			}
			a:clicked {
				color: blue;
			}

			h1, h2, h3 {
				font-weight: 800;
			}
		</style>
	</head>
	<body><center>
		<a href="https://github.com/theel0ja/simplegram"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>

		<h1>Simplegram Web Interface</h1>
		<?php
			if(isset($_POST["mode"])) {
				echo '<b>Answer for query:</b><br /><div style="border: 5px solid black; border-width: 50%; width: 50%; text-align: left;"><pre style="padding-left: 2%;">';
				$security = "e91e6348157868de9dd8b25c81aebfb9"; // md5 hash for "security"

				if($_POST["mode"] == "SendMessageToChannel") {
					if($_POST["msg"] != "" && $_POST["chn"] != "") {
						include("functions.php");
						SendMessageToChannel($_POST["msg"], htmlspecialchars($_POST["chn"]));
					}
					else {
						echo "Error - message or channel name is not set";
					}
				}
				elseif($_POST["mode"] == "getMe") {
					include("functions.php");
					getMe();
				}

				elseif($_POST["mode"] == "getChannel") {
					if($_POST["chn"] != "") {
						include("functions.php");
						getChannel(htmlspecialchars($_POST["chn"]));
					}
					else {
						echo "Error - message or channel name is not set";
					}
				}
				echo "</pre></div><b><a href=''>Close box</a>";
			}
		?>

		<h2>Bot releated</h2>
			<h3>Get bot info</h3>
			<form action="" method="post">
				<input type="submit" value="Send query" />
				<input type="hidden" name="mode" value="getMe" />
			</form>

		<h2>Channel releated</h2>
			<h3>Get channel info</h3>
				<form action="" method="post">
					<input type="text" name="chn" placeholder="Channel name (without @)" required />	<br />
					<input type="submit" value="Send query" />
					<input type="hidden" name="mode" value="getChannel" />
				</form>
			<h3>Send message to channel</h3>
				<form action="" method="post">
					<input type="text" name="msg" placeholder="Message" required />	<br />
					<input type="text" name="chn" placeholder="Channel name (without @)" required />	<br />
					<input type="submit" value="Send query" />

					<input type="hidden" name="mode" value="SendMessageToChannel" />
				</form>
	</center></body>
</html>
