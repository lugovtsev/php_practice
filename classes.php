<!DOCTYPE HTML>
<html lang="ru">
   <head>
   <meta charset="utf-8">
        <title>Что-то в PHP</title>
    </head>
<body>
	<?
	class Human{
		const HANDS = 2;
		function printHands() {
			echo self::HANDS;
		}
	}
	
	$person1 = new Human;
	$person1->printHands();
	?>
</body>
</html>
