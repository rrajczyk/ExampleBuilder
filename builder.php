<?php

interface Builder
{
    public function produceRoof(): void;

    public function produceWalls(): void;

    public function producePool(): void;
}

class HouseBuilder implements Builder
{
    private $parts = [];

    /**
     * All production steps work with the same product instance.
     */
    public function produceWalls(): void
    {
        $this->parts[] = "Walls";
    }

    public function produceRoof(): void
    {
        $this->parts[] = "Roof";
    }

    public function producePool(): void
    {
        $this->parts[] = "Pool";
    }
    public function listParts()
    {
        echo "<br>Product parts: " . implode(', ', $this->parts) . "<hr>";
    }
}

class Director
{
    /**
     * @var Builder
     */
    private $builder;

    public function setBuilder(Builder $builder): void
    {
        $this->builder = $builder;
    }

    public function buildMinimalViableProduct(): void
    {
        $this->builder->produceWalls();
    }

    public function buildFullFeaturedProduct(): void
    {
        $this->builder->produceWalls();
        $this->builder->produceRoof();
        $this->builder->producePool();
    }
}

$director = new Director();
$builder = new HouseBuilder();

$director->setBuilder($builder);

echo "Standard basic house:\n";
$director->buildMinimalViableProduct();
$builder->listParts();

echo "Standard full featured house:\n";
$director->buildFullFeaturedProduct();
$builder->listParts();

echo "Custom house:\n";
$builder->produceWalls();
$builder->produceRoof();
$builder->listParts();