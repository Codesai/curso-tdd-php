# Tire Pressure Monitoring System Variation

## Goal
Be able to test `Alarm`'s `check` function without changing the method signature.

1. Test the code using test doubles created with a library.

2. Test the code using test doubles created by you.

## Tools

[Prophecy](https://github.com/phpspec/prophecy)

### Example of spying an interaction

```php
/**
 * @test
 */
public function shouldUseTheExternalCollaborator()
{
    $myCollaboratorProphecy = $this->prophesize('Collaborator');
    /** @var Collaborator $collaborator */
    $collaborator = $myCollaboratorProphecy->reveal();
    $myClass = new MyClass($collaborator);
    $myClass->run();
    $myCollaboratorProphecy->collaborate()->shouldBeCalled();
}
```

### Example of stubbing an interaction

```php
/**
 * @test
 */
public function shouldReturnTheCollaboratorResponse()
{
    $myCollaboratorProphecy = $this->prophesize('Collaborator');
    $collaboratorResponse = 'collaborator response';
    $myCollaboratorProphecy->collaborate()->willReturn($collaboratorResponse);
    /** @var Collaborator $collaborator */
    $collaborator = $myCollaboratorProphecy->reveal();
    $myClass = new MyClass($collaborator);
    $response = $myClass->run();
    $this->assertEquals($collaboratorResponse, $response);
}
```

## Learnings
How to build a Spy and a Stub manually.

How to use a library to generate the test doubles.

## References

Based on an exercise from [Luca Minudel](https://twitter.com/lukadotnet?lang=en) 's:
[TDD with Mock Objects And Design Principles exercises](https://github.com/lucaminudel/TDDwithMockObjectsAndDesignPrinciples)
