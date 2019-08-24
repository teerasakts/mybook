<?php
$link = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b62f8c9009e920", "36640e33", "heroku_01216849a621e17");



if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
else
{

		if (!mysqli_set_charset($link, "utf8")) 
		{
				printf("Error loading character set utf8: %s\n", mysqli_error($link));
				exit;
		} 
		else 
		{
				//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL."<BR>";
				//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
				//printf("Current character set: %s\n", mysqli_character_set_name($link));
		}

}

//mysqli_close($link);
?>