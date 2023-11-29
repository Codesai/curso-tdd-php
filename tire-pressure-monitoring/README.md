# Tire Pressure Monitoring System Variation

## Goal
Be able to test `Alarm`'s `check` function without changing the method signature.

1. Test the code using test doubles created with a library.

2. Test the code using test doubles created by you.

## Tools

[Prophecy](https://github.com/phpspec/prophecy)

### Example of spying an interaction

```php
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

interface Collaborator {
    public function collaborate(): void;
}

class MyClass {
    private $collaborator;

    public function __construct(Collaborator $collaborator) {
        $this->collaborator = $collaborator;
    }

    public function run(): void {
        $this->collaborator->collaborate();
    }
}

class MyClassTest extends TestCase {

   use ProphecyTrait;

    /** @test */
    public function should_change_me() {
        $collaborator = $this->prophesize(Collaborator::class);
        $myClass = new MyClass($collaborator->reveal());

        $myClass->run();

        $collaborator->collaborate()->shouldHaveBeenCalled();
    }
}
```

### Example of stubbing an interaction

```php
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

interface Collaborator {
    public function collaborate(): string;
}

class MyClass {
    private $collaborator;

    public function __construct(Collaborator $collaborator) {
        $this->collaborator = $collaborator;
    }

    public function run(): string {
        return $this->collaborator->collaborate();
    }
}

class MyClassTest extends TestCase {
    /**
     * @test
     */
    public function shouldReturnTheCollaboratorResponse()
    {
        $collaborator = $this->prophesize(Collaborator::class);
        $collaboratorResponse = 'collaborator response';
        $collaborator->collaborate()->willReturn($collaboratorResponse);
        $myClass = new MyClass($collaborator->reveal());
        
        $response = $myClass->run();
        
        $this->assertEquals($collaboratorResponse, $response);
    }
}
```

## Learnings
How to use a library to generate the test doubles.

How to build a Spy and a Stub manually.

## References

Based on an exercise from [Luca Minudel](https://twitter.com/lukadotnet?lang=en) 's:
[TDD with Mock Objects And Design Principles exercises](https://github.com/lucaminudel/TDDwithMockObjectsAndDesignPrinciples)
