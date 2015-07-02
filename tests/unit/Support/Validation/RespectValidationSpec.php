<?php

namespace unit\Acme\Support\Validation;

use Acme\Support\Validation\Validation as V;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Respect\Validation\Factory;
use Respect\Validation\Rules\AllOf;
use Respect\Validation\Rules\Email;
use Respect\Validation\Rules\Key;

class RespectValidationSpec extends ObjectBehavior
{
    function let(Factory $factory)
    {
        $this->beConstructedWith($factory);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(v::class);
    }

    function it_validates_emails(Factory $factory, Email $email, Key $key, AllOf $field, AllOf $validator)
    {
        $factory->rule('email', [])->willReturn($email);
        $factory->rule('allof', [$email])->willReturn($field);
        $factory->rule('key', ['contact', $field])->willReturn($key);
        $factory->rule('allof', [$key])->willReturn($validator);
        $validator->validate(['contact' => 'john@doe.sg'])->willReturn(true);

        $this->check(['contact' => 'john@doe.sg'], ['contact' => V::EMAIL])->shouldReturn(true);
    }
}
