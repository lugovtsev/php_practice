<?
class User extends AUser{
		public $name;
		public $login;
		public $pas;
		public static $cntU = 0;
		
		function __construct($n, $l, $p)
		{
			$currentClass = __CLASS__;
			$this->name = $n;
			$this->login = $l;
			$this->pas = $p;
			++self::$cntU;
			echo "<hr>Создан объект класса $currentClass: $this->name";
		}
		
		// функция ниже вызывается при копировании объекта
		function __clone()
		{
				echo "<hr>Объект $this->name скопирован<br>";
				++self::$cntU;
		}
		
		function __destruct(){
			echo "<hr>Объект $this->name класса ".__CLASS__." удален";
		}
		
		function showInfo() //перегрузка метода абстрактного класса
		{
			echo "<hr>Имя: $this->name";
			echo "<br>Логин: $this->login";
			echo "<br>Пароль: $this->pas<br>";
		}
	}
?>