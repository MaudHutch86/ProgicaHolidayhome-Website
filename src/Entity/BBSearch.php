<?php
namespace App\Entity;

class BBSearch
{

    /**
     * @avar int|null
     */
    private $maxPrice;

    /**
     * @avar int|null
     */
    private $minSurface;

    /**
     * @return int| null
     */ 
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * @param int| null
     *
     * @return BBSearch
     */ 
    public function setMaxPrice( int $maxPrice)
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    /**
     * @return int| null
     */ 
    public function getMinSurface()
    {
        return $this->minSurface;
    }

    /**
     * @param int| null
     *
     * @return  BBSearch
     */ 
    public function setMinSurface( int $minSurface)
    {
        $this->minSurface = $minSurface;

        return $this;
    }
}
