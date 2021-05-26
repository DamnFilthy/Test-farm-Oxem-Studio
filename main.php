<?php
class Farm{
	$allAnimals = array();
	$milkOnFarm = array();
	$eggsOnFarm = array();
	function __construct(public $name, public $address, public $allAnimals)
	{
		$this->name = $name;
		$this->address = $address;
		$this->animals = $allAnimals;
	}

	function displayInfo()
	{
		echo "Ферма: $this->name; По Адресу: $this->address \n";
	}

	
	function addAnimal($animal) {
		if ($animal instanceof Cow || $animal instanceof Chiken) {
			array_push(self::$allAnimals, $animal);
		} else {
			echo 'Error';
		}
	}
	
	function collectGoods()
	{
		foreach ($allAnimals as $animal) {
			$typeGoods = $animal->typeGoods(); 
			$countGoods = $animal->giveGoods();

			
			if ($typeGoods == 'milk') {
				array_push($milkOnFarm, $countGoods);
			} else {
				array_push($eggsOnFarm, $countGoods);
			}
		}
	}

	
	function displayGoods(){
		$countMilk = 0;
		$countEggs = 0;
		echo "\nВсего на ферме:\n";
		foreach (self::$milkOnFarm as $milk) {
			$countMilk += $milk;
		}
		echo "\nМолоко: {$countMilk}\n";
		foreach (self::$eggsOnFarm as $eggs) {
			$countEggs += $eggs;
		}
		echo "\nЯйца: {$countEggs}\n";
	}
}
	


$myFarm = new Farm('У Дядюшки Джо', 'Миннесота, ул.Тестового стр. 1');
$myFarm->displayInfo();
$myFarm->collectGoods();

class Animal
{
	public function __construct(public $type)
	{
		$this->type = $type;
	}

	public function displayAnimalType()
	{
		echo "Type: $this->type; \n";
	}
}

class Cow extends Animal
{
	public $id, $name;
	public function __construct($type, $id, $name)
	{
		Animal::__construct($type);
		$this->id = $id;
		$this->name = $name;
	}

	public function displayAnimalInfo()
	{
		echo "id: $this->id, name: $this->name \n";
	}

	public function typeGoods()
	{
		return "milk";
	}

	public function giveGoods()
	{
		return rand(8, 12);
	}
}

$myCow = new Cow("cow", 1, "Burenka");
$myCow->displayAnimalType();
$myCow->displayAnimalInfo();


class Chiken extends Animal
{
	public $id, $name;
	public function __construct($type, $id, $name)
	{
		Animal::__construct($type);
		$this->id = $id;
		$this->name = $name;
	}
	public function displayAnimalInfo()
	{
		echo "id: $this->id, name: $this->name \n";
	}

	public function typeGoods()
	{
		return "milk";
	}

	public function giveGoods()
	{
		return rand(0, 1);
	}
}

$myChiken = new Chiken("chiken", 1, "Petya");
array_push($allAnimals, $myChiken);
$myChiken->displayAnimalType();
$myChiken->displayAnimalInfo();

echo " {$myCow->giveGoods()}\n";
echo "{$myChiken->giveGoods()} \n";

$allCows = 10;
$allChickens = 20;


for ($i = 0; $i < $allCows; $i++) {
	$animal = new Cow($i, $i + 'Cow');
	Farm::addAnimal($animal);
}

for ($i = 0; $i < $allChicken; $i++) {
	$animal = new Chicken($i, $i + 'Chicken');
	Farm::addAnimal($animal);
}

Farm::collectGoods(); 
Farm::displayGoods(); 