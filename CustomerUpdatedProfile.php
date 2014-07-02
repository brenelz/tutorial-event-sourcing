<?php

class CustomerUpdatedProfile
{
  /**
   * @var Customer
   */
  protected $customer;

  /**
   * @var string
   */
  protected $field;

  /**
   * @var mixed
   */
  protected $value;

  /**
   * @param Customer $customer
   * @param string   $field
   * @param mixed    $value
   */
  public function __construct(Customer $customer, $field, $value)
  {
    $this->customer = $customer;
    $this->field    = $field;
    $this->value    = $value;
  }

  /**
   * @return Customer
   */
  public function getCustomer()
  {
    return $this->customer;
  }

  /**
   * @return string
   */
  public function getField()
  {
    return $this->field;
  }

  /**
   * @return mixed
   */
  public function getValue()
  {
    return $this->value;
  }
}
