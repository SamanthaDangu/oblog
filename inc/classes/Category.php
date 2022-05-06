<?php

class Category {

    public $name;
    
    /**
     * __construct
     *
     * @param  mixed $author
     * @return void
     */
    public function __construct($category) {
        $this->name = $category;
    }
    
    /**
     * getCategory
     *
     * @return string
     */
    public function getCategory(): string {
        return $this->name;
    }
}