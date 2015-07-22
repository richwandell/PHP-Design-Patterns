# Design Patterns

### Strategy Pattern
> Allows characters to use different implementations of an action.
The character class has an abstract "fight" method that is implemented by the 
King, Queen, Knight and Troll.
The fight method of each character allows each character to fight in their own way.
The Troll will yell out "Troll Fighting!!" and then use its weapon. The weapon is assigned to 
the troll by using the setWeapon method in the Character class. Type hints are used to make sure that the
setWeapon method accepts a WeaponBehavior which will contain a useWeapon method allowing the troll to use 
his weapon through a WeaponBehavior. By doing this, each weapon can have a different behavior. 
For example when the troll uses a knife, the troll will scream out "Using my Knife!!", but when the Troll is 
using a Axe it will scream out "Using my Axe!!".
  
### Observer Pattern