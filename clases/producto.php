<?php

class Producto
{
    protected $name;
    protected $type;
    protected $price;
    protected $stock;
   

    public function __construct($name, $type = null, $price, $stock){
      
        $this->name = $name;
        $this->type = $type;
        $this->price= $price;
        $this->stock = $stock;
       
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

}