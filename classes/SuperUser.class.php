<?
class SuperUser extends User implements ISuperUser{
		public $role;
		public static $suCount = 0;
		
		function getInfo() { //перегрузка метода из интерфейса 
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
			++self::$suCount;
			--parent::$cntU; //так как вызывается родительский конструктор при создании объекта суперадмина то каждый раз увеличивается и статическая переменная $cntU, поэтому каждый раз возвращаем ее к начальному состоянию 
		}
		
		function __destruct(){} 
		
		function __clone() {
			++self::$suCount;
		}
		
		function showInfo() 
		{
			parent::showInfo();
			echo "<br>Роль: $this->role<br>";
		}
	}
?>