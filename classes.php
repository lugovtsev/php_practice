<!DOCTYPE HTML>
<html lang="ru">
   <head>
   <meta charset="utf-8">
        <title>Что-то в PHP</title>
    </head>
<body>
	<?
	// Константа в классе и ее использование
	class Human{
		const HANDS = 2;
		function printHands() {
			echo self::HANDS."<br>";
		}
	}
	
	$person1 = new Human;
	//$person1->printHands();
 	//echo "Количество рук: ".Human::HANDS."<br>";
	
	
	//Абстрактные классы и методы и их использование. Нельзя создавать объекты абстрактного класса, создавать можно только у наследуемого
	
	abstract class Db{   //В абстрактном классе может и не быть абстрактных методов
		public $cnn =5;
		function connect(){
			//
		}
		abstract function open(); //если в классе есть хоть один абстрактный метод, класс нужно делать абстрактным
		abstract function query();
		abstract function close();
	}
	// создаем класс наследуемый от абстрактного класса и перегружаем абстрактные методы
	class MyDb extends Db{
		function open(){} //чтобы класс заработал достаточно добавить методам пустое тело и убрать abstract
		function query(){}
		function close(){}
	}
	$objDb = new MyDb;
	//echo $objDb->cnn;
	
	// Создание интерфейсов. Интерфейс это абстрактный класс, в котором должны быть только абстрактные функции
	interface Hand{
		function useKeyboard(); //слово abstract не пишется, так как по умолчанию все методы интерфейса абстрактные
		function touchNose();
	}	
	interface Foot{
		function Kick();
		function Run();
	}
	//Класс Man наследует интерфейсы (абстрактные классы) и перегружаются методы. Особенность - в нескольких интерфейсах, от которых наследуется класс, не должно быть одноименных методов 
	class Man implements Hand, Foot { 
		function useKeyboard(){echo "1";}
		function touchNose(){echo "2";}
		function Kick(){echo "3";}
		function Run(){echo "4";}
	}
	$man1 = new Man;

	
	// Переделанный Юзер с использованием  абстрактного класса и интерфейса
	abstract class AUser{
		abstract function showInfo();
	}
	
	class User extends AUser{
		public $name;
		public $login;
		public $pas;
		function __construct($n, $l, $p)
		{
			$this->name = $n;
			$this->login = $l;
			$this->pas = $p;
		}
		
		function showInfo() 
		{
			echo "<br>Имя: $this->name";
			echo "<br>Логин: $this->login";
			echo "<br>Пароль: $this->pas<br>";
		}
	}
	
	interface ISuperUser{
		function getInfo();
	}
	
	class SuperUser extends User implements ISuperUser{
		public $role;
		function getInfo() {
			/*$arr = array();
			foreach($this as $k=>$v)
			$arr[$k] = $v;
			return $arr;*/
			return (array)$this; //тоже самое только короче
		}
		function __construct($n, $l, $p, $r)
		{
			parent::__construct($n, $l, $p); //вызов метода родителя и ниже добавление итераций
			$this->role = $r;
		}
		function showInfo() 
		{
			parent::showInfo();
			echo "<br>Роль: $this->role<br>";
		}
	}
	$su1 = new SuperUser("Nik","nik","999","admin");
	echo "<pre>";
	print_r($su1->getInfo());
	echo "</pre>";
?>
</body>
</html>
