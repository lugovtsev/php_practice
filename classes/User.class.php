<?
class User extends AUser{
		public $name;
		public $login;
		public $pas;
		public static $cntU = 0;
		
		function __construct($n, $l, $p)
		{
			$this->name = $n;
			$this->login = $l;
			$this->pas = $p;
			++self::$cntU;
		}
		
		// функция ниже вызывается при копировании объекта
		function __clone()
		{
				echo "<hr>Объект $this->name скопирован<br>";
		}
		
		function __destruct(){}
		
		function showInfo() //перегрузка метода абстрактного класса
		{
			echo "<hr>"
			echo "<br>Имя: $this->name";
			echo "<br>Логин: $this->login";
			echo "<br>Пароль: $this->pas<br>";
		}
	}
?>