<?php
namespace App\Entity;



class BBSearch
{
    
    
    /**
    *  int|null
    */
   private $minSurface;


    /**
     *  int|null
     */
    private $maxBedding;



     /**
     *  boolean|null
     */
    private $animalsAccepted;

 /**
     *  boolean|null
     */
    private $perCity;

 /**
     *  boolean|null
     */
    private $perAmenities;


   
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

    /**
     * Get the value of maxBedding
     */ 
    public function getMaxBedding()
    {
        return $this->maxBedding;
    }

    /**
     * Set the value of maxBedding
     *
     * @return  self
     */ 
    public function setMaxBedding($maxBedding)
    {
        $this->maxBedding = $maxBedding;

        return $this;
    }

    /**
     * Get the value of animalsAccepted
     */ 
    public function getAnimalsAccepted()
    {
        return $this->animalsAccepted;
    }

    /**
     * Set the value of animalsAccepted
     *
     * @return  self
     */ 
    public function setAnimalsAccepted($animalsAccepted)
    {
        $this->animalsAccepted = $animalsAccepted;

        return $this;
    }

    /**
     * Get the value of perCity
     */ 
    public function getPerCity()
    {
        return $this->perCity;
    }

    /**
     * Set the value of perCity
     *
     * @return  self
     */ 
    public function setPerCity($perCity)
    {
        $this->perCity = $perCity;

        return $this;
    }

    /**
     * Get the value of perAmenities
     */ 
    public function getPerAmenities()
    {
        return $this->perAmenities;
    }

    /**
     * Set the value of perAmenities
     *
     * @return  self
     */ 
    public function setPerAmenities($perAmenities)
    {
        $this->perAmenities = $perAmenities;

        return $this;
    }
}
