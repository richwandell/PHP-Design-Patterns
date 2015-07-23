<?php

/**
 * Class Beverage
 *
 * Beverages must have a cost method and a getDescription method. I was not able to implement getDescription in the
 * Beverage class and change it to an abstract method in the CondimentDecorator class because PHP wont let me do that :(
 * Before a beverage is implemented it is an unknown beverage!
 */
abstract class Beverage {
    protected $description = "Unknown Beverage";
    public abstract function getDescription();
    public abstract function cost();
}

/**
 * Class CondimentDecorator
 *
 * The condiment decorators must implement the getDescription method and the cost method from
 * the Beverage class.
 */
abstract class CondimentDecorator extends Beverage{}

class Espresso extends Beverage {
    public function __construct() {
        $this->description = "Espresso";
    }

    public function getDescription() {
        return $this->description;
    }

    public function cost() {
        return 1.99;
    }
}

class HouseBlend extends Beverage {
    public function __construct() {
        $this->description = "House Blend Coffee";
    }

    public function getDescription() {
        return $this->description;
    }

    public function cost() {
        return .89;
    }
}

class DarkRoast extends Beverage{
    public function __construct() {
        $this->description = "Dark Roast Coffee";
    }

    public function getDescription() {
        return $this->description;
    }

    public function cost() {
        return .89;
    }
}

class Mocha extends CondimentDecorator {

    private $beverage;

    public function __construct(Beverage $b) {
        $this->beverage = $b;
    }

    public function getDescription() {
        return $this->beverage->getDescription() . ", Mocha";
    }

    public function cost() {
        return $this->beverage->cost() + .20;
    }
}

class Whip extends CondimentDecorator {

    private $beverage;

    public function __construct(Beverage $b) {
        $this->beverage = $b;
    }

    public function getDescription() {
        return $this->beverage->getDescription() . ", Whip";
    }

    public function cost() {
        return $this->beverage->cost() + .20;
    }
}

class Soy extends CondimentDecorator {

    private $beverage;

    public function __construct(Beverage $b) {
        $this->beverage = $b;
    }

    public function getDescription() {
        return $this->beverage->getDescription() . ", Soy";
    }

    public function cost() {
        return $this->beverage->cost() + .20;
    }
}

class StarBuzzCoffee{
    public function __construct() {
        //Create a beverage
        $beverage = new Espresso();
        //Print info about this beverage
        print $beverage->getDescription()." $".$beverage->cost().PHP_EOL;

        //Create another beverage
        $beverage2 = new DarkRoast();
        //Add mocha
        $beverage2 = new Mocha($beverage2);
        //Add more mocha!
        $beverage2 = new Mocha($beverage2);
        //Add whip
        $beverage2 = new Whip($beverage2);
        //Print info about this beverage
        print $beverage2->getDescription()." $".$beverage2->cost().PHP_EOL;

        //Create a third beverage
        $beverage3 = new HouseBlend();
        //Add soy
        $beverage3 = new Soy($beverage3);
        //Add mocha
        $beverage3 = new Mocha($beverage3);
        //Add whip
        $beverage3 = new Whip($beverage3);
        //Print info about the third beverage
        print $beverage3->getDescription()." $".$beverage3->cost().PHP_EOL;
    }
}

new StarBuzzCoffee();