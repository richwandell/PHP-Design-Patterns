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
> Allows a WeatherData to inform all DisplayElements that a change has occurred. This will allow the display 
  elements to update their data and display new information when new data is available. There are 2 display elements
  in the file, a CurrentConditionsDisplay which shows the current weather conditions and a StatisticsDisplay which keeps
  track of all of the data points that it receives so that it can display the average of this data. 
  A WeatherData object is created in the constructor of the WeatherStation class. 2 observers are then created and 
  assigned the WeatherData via the registerObserver method. Once the observers are registered with the weater data 
  the data is given 3 weather measurements which trigger the measurementChanged method of the weather data. The weater
  data then runs the update method of each observing object. 
  
### Decorator Pattern
> The decorator pattern allows you to add features to a basic object by encapsulating the original object inside another
object. Beverages have a cost method and a getDescription method and for the implementing classes to create these
methods. A CondimentDecorator extends the Beverage class and also must implement the abstract methods. PHP will not let
me override a non abstract method and turn it into an abstract method or else I would have implemented the getDescription
method in my Beverage class so that the method would be available for the different types of coffee while still forcing
the decorating coffee ingredients to implement the method. In the StarBuzzCoffee class I first create a Espresso 
beverage and print its information. I then create a DarkRoast, add Mocha, add more Mocha, then add Whip and print the
beverages info the exact same way that I printed it with the espresso even though the resulting objects outer shell is
a "Whip" it will add the cost of all other toppings and eventually the cost of the DarkRoast before returning the cost 
to be printed.