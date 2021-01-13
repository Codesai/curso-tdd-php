# Tire Pressure Monitoring System Variation

## Goal
Be able to test `Alarm`'s `check` function without changing the method signature.

1. Test the code using test doubles created by you.

2. Test the code using test doubles created with a library.

## Tools

[Prophecy](https://github.com/phpspec/prophecy)

### Example of spying an interaction

```php
$prophet = new Prophecy\Prophet;

$spyRepository = $prophet->prophesize('Infrastructure\Repositories\UserRepository');

$controller->createUser($spyRepository->reveal());

$spyRepository->save($user)->shouldHaveBeenCalled();
```

### Example of stubbing an interaction

```php
$hasher = $this->prophet->prophesize('App\Security\Hasher');
$user   = new User($hasher->reveal());

$hasher->generateHash($user, 'qwerty')->willReturn('hashed_pass');

$user->setPassword('qwerty');

$this->assertEquals('hashed_pass', $user->getPassword());
```

## Learnings
How to build a Spy and a Stub manually.

How to use a library to generate the test doubles.

## References

Based on an exercise from [Luca Minudel](https://twitter.com/lukadotnet?lang=en) 's:
[TDD with Mock Objects And Design Principles exercises](https://github.com/lucaminudel/TDDwithMockObjectsAndDesignPrinciples)