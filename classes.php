<!DOCTYPE HTML>
<html lang="ru">
   <head>
   <meta charset="utf-8">
        <title>Интерфейсы, статика, финальные классы в PHP</title>
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
	
	//финальные методы нельзя перегружать (изменять), финальные классы нельзя наследовать
	final class Hello{
		static function sayHello() { //статические внутриклассовые функции  можно вызывать без создания объекта класса
			echo "<br>hello";
		}
	}
	/* ошибка нельзя наследовать 
	class NewHello extends Hello{
		public $q;
	}*/
	$class = "Hello";
	$method = "sayHello";
	//$class::$method(); // вызов метода класса в динамике
	
	//ниже 2 идентичные реализации способа проверки: имеет ли класс объекта в своих предках искомый класс, или принадлежит ли объект искомому классу
	//if ($man1 instanceof Hand) echo 'В предках у объекта $man1 есть абстрактный класс (интерфейс) Hand<br>';
	//if (is_a($man1, 'Hand')) echo 'В предках у объекта $man1 есть абстрактный класс (интерфейс) Hand<br>';
	
	class TestInvoke{
		function __invoke($var){
			return $var*$var;
		}
	}
	
	$obj = new TestInvoke;
	echo $obj(5); //когда объект вызывается как функция, прежде чем выдать ошибку в классе ищется магический метод __invoke
?>
</body>
</html>
