<!DOCTYPE HTML>
<html lang="ru">
   <head>
   <meta charset="utf-8">
        <title>Работа с классами PHP</title>
    </head>
<body>
	<?
	define("MYNAME","Андрей");
	class Employer{
		public $name = "'Default organisation name'";
		public $type = "Web develop";
		// Функция(метод) ниже выполняется автоматически при создании объекта класса 
		function __construct($time) {
			echo "Объект $this->name создан  в: $time<br>";
		}
		
		/* Функция(метод) ниже выполняется автоматически при УДАЛЕНИИ объекта класса, в нее нельзя передавать параметры и обращаться из нее к другим объектам, потому что объекты удаляются в неизвестном порядке после выполнения кода */
		function __destruct() {
			echo "<br>Объект $this->name удален";
		}
		function sendInvite($worker) {
			echo "Dear, $worker. Our company - $this->name invite you"
			.$this->addBR()."to work in area of $this->type."
			.$this->addHR();
		} 
		function addBR() {
			return "<br>";
		}
		function addHR() {
			return "<br><hr>";
		}
	}
	
	class User{
		public $name;
		public $login;
		public $pas;
		function __construct($n, $l, $p)
		{
			$this->name = $n;
			$this->login = $l;
			$this->pas = $p;
		}
		// функция ниже вызывается при копировании объекта
		function __clone()
		{
				echo "Объект $this->name скопирован<br>";
		}
		function showInfo() 
		{
			echo "<br>Вызван метод ".__METHOD__;
			echo "<br>Имя: $this->name";
			echo "<br>Логин: $this->login";
			echo "<br>Пароль: $this->pas<br>";
		}
	}
	//наследование класса и инкапсуляция (добавление в дочерний новых экземпляров класса)
	class SuperUser extends User{
		public $role;
		// ниже перегрузка двух методов из родительского класса
		
		/* рабочий вариант но неправильный
		function __construct($n, $l, $p, $r)
		{
			$this->name = $n;
			$this->login = $l;
			$this->pas = $p;
			$this->role = $r;
		}*/
		
		function __construct($n, $l, $p, $r)
		{
			parent::__construct($n, $l, $p); //вызов метода родителя и ниже добавление итераций
			$this->role = $r;
		}
		function showInfo() 
		{
			echo "<br>Вызван метод ".__METHOD__;
			parent::showInfo();
			echo "<br>Роль: $this->role<br>";
		}
	}
	
	// КОД ПОСЛЕ ОПИСАНИЯ КЛАССОВ
	
	$sidenis = new Employer(date("H-i-s"));
	//sleep(1); // задержка выполнения кода на 1 секунду в PHP
	$mega = new Employer(date("H-i-s"));
	$sidenis->name = "Sidenis";
	$mega->name = "MegaGroup";
	$mega->type = "Creating sites";
//			  $mega->addHR();
	$mega->sendInvite(MYNAME);
	$sidenis->sendInvite(MYNAME);
	
	$user1 = new User("Ivan Petrov", "ivan", "123"); //создается объект и в $user1 заносится ссылка на этот объкт
	$clonUser1 = clone $user1; //копирование объекта
	$user1->showInfo();
	$user2 = new User("Inna Ivanova","inna","3434");
	$user2->showInfo();
	$superuser1 = new SuperUser("Oleg","admin","0000","superAdmin");
	$superuser1->showInfo();
	
	// try catch
	try {
		$a = 2;
		$b = 0;
		if ($b==0)
			throw new Exception("Деление на ноль!"); //бросить новый объект класса Exception на catch
		$c = $a / $b;
	} catch(Exception $e) {
		echo $e->getMessage().' - ';
		echo $e->getLine().' - ';
		echo $e->getFile().' - ';		
	}
	
	// Можно создать дочерний элемент класса Exception, перегрузить методы и использовать несколько catch 
	class MyExcOne extends Exception{
		function __construct($msg) {
			parent::__construct($msg);
		}
	}
	class MyExcTwo extends Exception{
		function __construct($msg) {
			parent::__construct($msg);
		}
	}
	
	try {
		$a = 2;
		$b = 1;
		if ($b == 0)
			throw new MyExcOne("b = 0!"); //бросить новый объект класса MyExcOne на нужный catch p
		if ($a == 2)
			throw new MyExcTwo("a = 2!");
	} catch(MyExcOne $e) {
		echo '<br>'.$e->getMessage();
	} catch(MyExcTwo $e) {
		echo '<br>'.$e->getMessage();
	}
	?>
</body>
</html>
