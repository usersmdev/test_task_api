<?php

namespace App;

class CountCategory
{
    private array $ar;
    private string $categoryName;

    /**
     * @param array $ar
     * @param string $categoryName
     */
    public function __construct(array $ar, string $categoryName)
    {
        $this->ar = $ar;
        $this->categoryName = $categoryName;
    }

    private function cont()
    {
        $count = 0;
        foreach ($this->ar as $category) {
            if ($category['category'] == $this->categoryName) {
                $count++;
            }
        }
        return $count;
    }

    /**
     * @return int
     */
    public function getCountCategory(): int
    {
        return $this->cont();
    }


}