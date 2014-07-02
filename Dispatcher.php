<?php

class Dispatcher
{
  /**
   * @var array
   */
  protected $events = [];

  /**
   * @param string   $key
   * @param callable $callback
   */
  public function listen($key, $callback)
  {
    $this->events[$key][] = $callback;
  }

  /**
   * @param string $key
   * @param mixed  $event
   */
  public function dispatch($key, $event)
  {
    if (isset($this->events[$key])) {
      foreach ($this->events[$key] as $callback) {
        $callback($event);
      }
    }
  }
}
