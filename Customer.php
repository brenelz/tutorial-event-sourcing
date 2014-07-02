<?php

class Customer
{
  /**
   * @var Dispatcher
   */
  protected $dispatcher;

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
   * @var array
   */
  protected $events = [];

  /**
   * @param Dispatcher $dispatcher
   */
  private function __construct(Dispatcher $dispatcher)
  {
    /*
     * We make this private so that
     * it will not be poorly created.
     */

    $this->dispatcher = $dispatcher;
  }

  /**
   * @param Dispatcher $dispatcher
   * @param string     $name
   * @param string     $surname
   * @param string     $email
   *
   * @return Customer
   */
  public static function register($dispatcher, $name, $surname, $email)
  {
    $event = new CustomerRegistered($name, $surname, $email);

    $customer = new self($dispatcher);
    $customer->recordThat($event);
    $customer->dispatch($event);

    return $customer;
  }

  /**
   * @param mixed $event
   */
  protected function dispatch($event)
  {
    $this->dispatcher->dispatch(
      get_class($event), $event
    );
  }

  /**
   * @param $event
   */
  public function recordThat($event)
  {
    $this->events[] = $event;

    $this->apply($event);
  }

  /**
   * @return array
   */
  public function getEvents()
  {
    return $this->events;
  }

  /**
   * @param string $field
   * @param mixed  $value
   */
  public function updateProfile($field, $value)
  {
    $event = new CustomerUpdatedProfile(
      $this, $field, $value
    );

    $this->recordThat($event);
    $this->dispatch($event);
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

  /**
   * @param Dispatcher $dispatcher
   * @param array      $events
   *
   * @return self
   */
  public static function regenerateFrom(Dispatcher $dispatcher, array $events)
  {
    $customer = new self($dispatcher);

    foreach ($events as $event) {
      $customer->recordThat($event);
    }

    return $customer;
  }

  /**
   * @param $event
   */
  protected function apply($event)
  {
    $method = "apply" . get_class($event);
    $this->$method($event);
  }

  /**
   * @param $event
   */
  protected function applyCustomerRegistered($event)
  {
    $this->name    = $event->getName();
    $this->surname = $event->getSurname();
    $this->email   = $event->getEmail();
  }

  /**
   * @param $event
   */
  protected function applyCustomerUpdatedProfile($event)
  {
    $field        = $event->getField();
    $this->$field = $event->getValue();
  }
}
