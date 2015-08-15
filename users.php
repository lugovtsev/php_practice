<!DOCTYPE HTML>
<html lang="ru">
   <head>
   <meta charset="utf-8">
        <title>Юзеры</title>
    </head>
<body>
	<?
	function __autoload($className){
		include("classes/$className.class.php");
	}
	
	$user1 = new User("Ivan Petrov", "ivan", "123"); //создается объект и в $user1 заносится ссылка на этот объкт
	$user1->showInfo();
	
	$user2 = clone $user1; //копирование объекта
	
	$user3 = new User("Inna Ivanova","inna","3434");
	$user3->showInfo();
	
	$superUser1 = new SuperUser("Oleg","admin","0000","superAdmin");
	echo "<hr>Вызов функции getInfo()<pre>";
	print_r($superUser1->getInfo());
	echo "</pre>";

	$superUser2 = new SuperUser("John","john","999","admin");
	$superUser2->showInfo();
	
	$superUser3 = clone $superUser1;
	
	echo '<hr>Количество суперюзеров: '.SuperUser::$suCount.'<br>';
	echo 'Количество простых юзеров: '.User::$cntU.'<br>';
	
?>
</body>
</html>
