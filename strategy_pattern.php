<?php

/**
 * Interface WeaponBehavior
 *
 * Each weapon is used in a different way.
 */
interface WeaponBehavior{
    public function useWeapon();
}

/**
 * Class Character
 *
 * Characters will inherit the set and get weapon methods so that they can be used in all
 * characters.
 *
 * Each character will have to know how to fight! (maybe using a weapon, maybe not)
 */
abstract class Character{
    private $weapon;

    abstract function fight();

    public function setWeapon(WeaponBehavior $w){
        $this->weapon = $w;
        return $this;
    }
    public function getWeapon(){
        return $this->weapon;
    }
}

class SwordBehavior implements WeaponBehavior{
    public function useWeapon(){
        print "Using my sword!!: ".PHP_EOL;
    }
}

class KnifeBehavior implements WeaponBehavior{
    public function useWeapon(){
        print "Using my knife!!".PHP_EOL;
    }
}

class BowAndArrowBehavior implements WeaponBehavior{
    public function useWeapon(){
        print "Using my Bow and Arrow!!".PHP_EOL;
    }
}

class AxeBehavior implements WeaponBehavior{
    public function useWeapon(){
        print "Using my Axe!!".PHP_EOL;
    }
}

class King extends Character{
    public function fight(){
        print "King Fighting!!".PHP_EOL;
        $this->getWeapon()->useWeapon();
    }
}

class Queen extends Character{
    public function fight(){
        print "Queen Fighting!!".PHP_EOL;
        $this->getWeapon()->useWeapon();
    }
}

class Knight extends Character{
    public function fight(){
        print "Knight Fighting!!".PHP_EOL;
        $this->getWeapon()->useWeapon();
    }
}

class Troll extends Character{
    public function fight(){
        print "Troll Fighting!!".PHP_EOL;
        $this->getWeapon()->useWeapon();
    }
}
//Create a troll
$troll = new Troll();
//Fight using a knife
$troll->setWeapon(new KnifeBehavior())->fight();
//Fight using a Axe
$troll->setWeapon(new AxeBehavior())->fight();

//Create a king
$king = new King();
//Fight using a sword
$king->setWeapon(new SwordBehavior())->fight();
//Fight using a bow and arrow
$king->setWeapon(new BowAndArrowBehavior())->fight();