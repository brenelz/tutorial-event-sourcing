<?php

class CustomerRegistered
{
  /**
   * @var string
   */
  protected $name;

  /**
   * @var string
   */
  protected $surname;

  /**
   * @var string
   */
  protected $email;

  /**
   * @param string $name
   * @param string $surname
   * @param string $email
   */
  public function __construct($name, $surname, $email)
  {
    $this->name    = $name;
    $this->surname = $surname;
    $this->email   = $email;
  }

  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @return string
   */
  public function getSurname()
  {
    return $this->surname;
  }

  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }
}
