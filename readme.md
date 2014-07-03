[![Connect Joe Public](http://connectjoepublic.com/github.png)](http://connectjoepublic.com)

# Event Sourcing

This is the companion code for <https://medium.com/p/153cb9c354c3>.

## Installation

```bash
❯ git clone git@github.com:connectjoepublic/tutorial-event-sourcing.git
```

## Usage

```php
$dispatcher = new Dispatcher();

$repository = new CustomerRepository();

$projector = new CustomerProjector($repository);

$dispatcher->listen(
  "CustomerRegistered",
  [$projector, "customerRegistered"]
);

$dispatcher->listen(
  "CustomerUpdatedProfile",
  [$projector, "customerUpdatedProfile"]
);

$customer = Customer::register(
  $dispatcher,
  "Christopher", "Pitt",
  "chris@connectjoepublic.com"
);

$customer->updateProfile("name", "Chris");
```
