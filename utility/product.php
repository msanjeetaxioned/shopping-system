<?php

class Product
{
    public $id;
    public $name;
    public $category;
    public $priceOfOne;
    public $imageName;

    public function Product($id, $name, $category, $price, $imageName) {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->priceOfOne = $price;
        $this->imageName = $imageName;
    }
}