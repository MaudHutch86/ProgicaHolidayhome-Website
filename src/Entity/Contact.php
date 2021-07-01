<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert ;

class Contact{
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2,max=100)
     *
     */


     private string $firstName;

/**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2,max=100)
     *
     */

     private  string $lastName;

/**
     * @var string|null
     * @Assert\NotBlank()
     * 
     *
     */
     private string $phone;


/**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     *
     */
     private string $email;


/**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2,max=100)
     *
     */
     private string  $message;


/**
     * 
     */
  private string $HolidayHome;


     /**
      * Get the value of firstName
      */ 
     public function getFirstName()
     {
          return $this->firstName;
     }

     /**
      * Set the value of firstName
      *
      * @return  self
      */ 
     public function setFirstName($firstName)
     {
          $this->firstName = $firstName;

          return $this;
     }

     /**
      * Get the value of lastName
      */ 
     public function getLastName()
     {
          return $this->lastName;
     }

     /**
      * Set the value of lastName
      *
      * @return  self
      */ 
     public function setLastName($lastName)
     {
          $this->lastName = $lastName;

          return $this;
     }

     /**
      * Get pattern="/[0-9]{10}/"
      *
      * @return  string|null
      */ 
     public function getPhone()
     {
          return $this->phone;
     }

     /**
      * Set pattern="/[0-9]{10}/"
      *
      * @param  string|null  $phone  pattern="/[0-9]{10}/"
      *
      * @return  self
      */ 
     public function setPhone($phone)
     {
          $this->phone = $phone;

          return $this;
     }

     /**
      * Get the value of email
      *
      * @return  string|null
      */ 
     public function getEmail()
     {
          return $this->email;
     }

     /**
      * Set the value of email
      *
      * @param  string|null  $email
      *
      * @return  self
      */ 
     public function setEmail($email)
     {
          $this->email = $email;

          return $this;
     }

     /**
      * Get the value of message
      *
      * @return  string|null
      */ 
     public function getMessage()
     {
          return $this->message;
     }

     /**
      * Set the value of message
      *
      * @param  string|null  $message
      *
      * @return  self
      */ 
     public function setMessage($message)
     {
          $this->message = $message;

          return $this;
     }



  /**
   * Get the value of HolidayHome
   */ 
  public function getHolidayHome()
  {
    return $this->HolidayHome;
  }

  /**
   * Set the value of HolidayHome
   *
   * @return  self
   */ 
  public function setHolidayHome($HolidayHome)
  {
    $this->HolidayHome = $HolidayHome;

    return $this;
  }
}