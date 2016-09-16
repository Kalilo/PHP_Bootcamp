<?php
	if ($_SERVER['PHP_AUTH_USER'] === "zaz" && $_SERVER['PHP_AUTH_PW'] === "Ilovemylittleponey")
	{
		/*<img src= data:image/png;base64,iVBORw0KGgoAAAA...
		... ...
		...6MIHnr2t+eeO4Fr+v/H80AmcVvzqAfAAAAAElFTkSuQmCC >
		</body></html>*/
		$IMG = base64_encode(file_get_contents("../img/42.png"));
		echo "<html><body>
Hello Zaz<br/>
<img src= data:image/png;base64,$IMG >
</body></html>
";
	}
	else
	{
		echo "<html><body>That area is accessible for members only</body></html>";
	}
?>