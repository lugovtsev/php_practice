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
	
	$clonUser1 = clone $user1; //копирование объекта
	
	$user2 = new User("Inna Ivanova","inna","3434");
	$user2->showInfo();
	
	$superUser1 = new SuperUser("Oleg","admin","0000","superAdmin");
	echo "<hr>Вызов функции getInfo()<pre>";
	print_r($su1->getInfo());
	echo "</pre>";

	$superUser2 = new SuperUser("Jo","jo","999","admin");
	$superUser1->showInfo();
	
	$superUser3 = clone $superUser1;
	echo 'Количество суперюзеров: '.SuperUser::$suCount.'<br>';
	echo 'Количество простых юзеров: '.User::$cntU.'<br>';
	
?>
</body>
</html>
