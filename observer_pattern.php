<?php

/**
 * Interface Subject
 *
 * A subject can register, remove and notify observers
 */
interface Subject{
    public function registerObserver(Observer $o);
    public function removeObserver(Observer $o);
    public function notifyObservers();
}

/**
 * Interface Observer
 *
 * Observers get updated by the subject when there is a change
 */
interface Observer{
    public function update($temp, $humidity, $pressure);
}

/**
 * Interface DisplayElement
 *
 * Display Elements can display data
 */
interface DisplayElement{
    public function display();
}

/**
 * Class WeatherData
 *
 * The weather data subject will keep the current temperature humidity and pressure
 */
class WeatherData implements Subject{
    private $observers;
    private $temperature;
    private $humidity;
    private $pressure;

    public function __construct(){
        $this->observers = new SplObjectStorage();
    }

    public function registerObserver(Observer $o){
        $this->observers->attach($o);
    }

    public function removeObserver(Observer $o){
        $this->observers->detach($o);
    }

    public function notifyObservers(){
        foreach($this->observers as $ob){
            $ob->update($this->temperature, $this->humidity, $this->pressure);
        }
    }

    public function measurementsChanged(){
        $this->notifyObservers();
    }

    public function setMeasurements($temperature, $humidity, $pressure){
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->measurementsChanged();
    }
}

/**
 * Class CurrentConditionsDisplay
 *
 * The current conditions display is notified by the weather data when there is a
 * change in temperature humidity or pressure.
 *
 * It will display the current weather conditions
 */
class CurrentConditionsDisplay implements Observer, DisplayElement{
    private $temperature;
    private $humidity;
    private $weatherData;

    public function __construct(Subject $weatherData){
        $this->weatherData = $weatherData;
        $weatherData->registerObserver($this);
    }

    public function update($temperature, $humidity, $pressure){
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->display();
    }

    public function display(){
        print "Current conditions: ".$this->temperature."F degrees and ".$this->humidity."% humidity".PHP_EOL;
    }
}

/**
 * Class StatisticsDisplay
 *
 * A statistics display is notified by the weather data when there is a
 * change in temperature humidity or pressure.
 *
 * It will display the average for all three data points.
 */
class StatisticsDisplay implements Observer, DisplayElement{
    private $temperature = array();
    private $humidity = array();
    private $pressure = array();
    private $weatherData;

    public function __construct(Subject $weatherData){
        $this->weatherData = $weatherData;
        $weatherData->registerObserver($this);
    }

    public function update($temperature, $humidity, $pressure){
        $this->temperature[] = $temperature;
        $this->humidity[] = $humidity;
        $this->pressure[] = $pressure;
        $this->display();
    }

    public function display(){
        $avg_temperature = array_sum($this->temperature) / count($this->temperature);
        $avg_humidity = array_sum($this->humidity) / count($this->humidity);
        $avg_pressure = array_sum($this->pressure) / count($this->pressure);
        print "Average temperature {$avg_temperature}F degrees".PHP_EOL;
        print "Average humidity {$avg_humidity}% humidity".PHP_EOL;
        print "Average pressure {$avg_pressure}".PHP_EOL;
    }
}

class WeatherStation{
    public function __construct(){
        $weatherData = new WeatherData();
        new CurrentConditionsDisplay($weatherData);
        new StatisticsDisplay($weatherData);

        $weatherData->setMeasurements(80, 65, 30.4);
        $weatherData->setMeasurements(82, 70, 29.2);
        $weatherData->setMeasurements(78, 90, 29.2);
    }
}

new WeatherStation();