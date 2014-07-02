<?php

class CustomerProjector
{
  /**
   * @var CustomerRepository
   */
  protected $repository;

  /**
   * @param CustomerRepository $repository
   */
  public function __construct(CustomerRepository $repository)
  {
    $this->repository = $repository;
  }

  /**
   * @param CustomerRegistered $event
   */
  public function customerRegistered(CustomerRegistered $event)
  {
    $this->repository->create(
      $event->getName(),
      $event->getSurname(),
      $event->getEmail()
    );
  }

  /**
   * @param CustomerUpdatedProfile $event
   */
  public function customerUpdatedProfile(CustomerUpdatedProfile $event)
  {
    $customer = $this->repository->findByEmail(
      $event->getCustomer()->getEmail()
    );

    $this->repository->update(
      $customer,
      $event->getField(),
      $event->getValue()
    );
  }
}
