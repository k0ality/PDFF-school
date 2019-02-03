<?php

class VehicleException extends Exception
{

}

class VinException extends VehicleException
{
    protected $message = 'Vehicle identification number should contain 17-characters. Alpha-numeric, excluding letters i, o, q' . PHP_EOL;
}

class YearException extends VehicleException
{
    protected $message = 'Year should be between 1900 and 2020' . PHP_EOL;
}

abstract class Vehicle
{
    protected $brand = 'whatever';
    protected $manufactureYear;
    protected $model = 'idk';
    protected $vin;

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setManufactureYear(int $manufactureYear): void
    {
        try {
            if ($input > 1900 && $input <= 2020 === false) {
                throw new YearException;
            }
        } catch (VehicleException $e) {
            die($e->getMessage());
        }

        $this->manufactureYear = $manufactureYear;
    }

    public function getManufactureYear(): int
    {
        return $this->manufactureYear;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setVIN(string $vin): void
    {
        $vinPattern = '/[A-HJ-NPR-Z0-9]{17}/';
        try {
            if (!preg_match($vinPattern, $vin)) {
                throw new VinException;
            }
        } catch (VehicleException $e) {
            die($e->getMessage());
        }

        $this->vin = $vin;
    }

    public function getVIN(): string
    {
        return $this->vin;
    }
}

class PassengerVehicle extends Vehicle
{
    private $configuration;

    public function setConfiguration(string $configuration): void
    {
        $this->configuration = $configuration;
    }

    public function getConfiguration(): string
    {
        return $this->configuration;
    }

    public function __construct($brand, $manufactureYear, $model, $vin, $configuration)
    {
        $this->brand = $brand;
        $this->setManufactureYear($manufactureYear);
        $this->model = $model;
        $this->setVIN($vin);
        $this->setConfiguration($configuration);
    }
}

class TransportationVehicle extends Vehicle
{
    private $capacity;

    public function setCapacity(int $capacity): void
    {
        $this->capacity = $capacity;
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function __construct($brand, $manufactureYear, $model, $vin, $capacity)
    {
        $this->brand = $brand;
        $this->setManufactureYear($manufactureYear);
        $this->model = $model;
        $this->setVIN($vin);
        $this->setCapacity($capacity);
    }
}

$CarObj = new PassengerVehicle('BMW', 2019, 'X3', 'WAUAF78E37A056494', 'crossover');

$TruckObj = new TransportationVehicle('ZAZ', 2016, 'Lanos Cargo', 'JH2RC46187M972736', 500);

/*
PHP OOP. Part 1. Home task
Нам нужен каталог автомобилей.
- У нас есть два типа автомобилей: Легковые и Грузовые.
- У всех автомобилей есть свойства: Марка, Год выпуска, Модель, VIN-код.
- У легковых автомобилей есть уникальное свойство: Комплектация.
- У грузовых автомобилей есть уникальное свойство: Грузоподъемность.
Нужно описать классы (PHP-кодом) для всех типов машин. Необходимо использовать наследование, инкапсуляцию и полиморфизм.
Также нужен пример создания и использования объектов этих классов.

Notes:
- Запускать PHP код можно в докере, например вот так: `docker run -v $(pwd):/app php:cli php /app/user.php`.
Еще можно использовать online-сервис, например: https://www.runphponline.com/
- Результат желательно положить в git repo или в gist
*/
