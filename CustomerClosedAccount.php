<?php

class CustomerClosedAccount
{
  /**
   * @var Customer
   */
  protected $customer;

  /**
   * @param Customer $customer
   */
  public function __construct(Customer $customer)
  {
    $this->customer = $customer;
  }

  /**
   * @return Customer
   */
  public function getCustomer()
  {
    return $this->customer;
  }
}
