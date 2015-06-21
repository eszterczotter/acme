<?php

namespace unit\Acme\Support\Locale;

use Acme\Support\Locale\Locale;
use Gettext\Translator;
use InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GettextLocaleSpec extends ObjectBehavior
{
    function let(Translator $translator)
    {
        $this->beConstructedWith($translator, '.');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Locale::class);
    }

    function it_gets_a_translation(Translator $translator)
    {
        $translator->dgettext('task', 'name')->willReturn('Name');
        $translator->loadTranslations('.//task.php')->willReturn(null);

        $this->get('task.name')->shouldReturn('Name');
    }

    function it_throws_exception_without_domain(Translator $translator)
    {
        $translator->loadTranslations('.//task.php')->willReturn(null);

        $this->shouldThrow(InvalidArgumentException::class)->during('get', ['name']);
    }

    function it_replaces_placeholders(Translator $translator)
    {
        $translator->dgettext('task', 'welcome')->willReturn('Hello, {name}!');
        $translator->loadTranslations('.//task.php')->willReturn(null);

        $this->get('task.welcome', ['name' => 'John'])->shouldReturn('Hello, John!');
    }

    function it_gets_the_plural_form(Translator $translator)
    {
        $translator->dngettext('task', 'tasks', 'tasks.pl', 1)->willReturn('Tasks');
        $translator->loadTranslations('.//task.php')->willReturn(null);

        $this->get('task.tasks', [], 1)->shouldReturn('Tasks');
    }

    function it_loads_the_correct_locale(Translator $translator)
    {
        $translator->dgettext('task', 'name')->willReturn('Name');
        $translator->loadTranslations('./hu/task.php')->willReturn(null);

        $this->choose('hu');
        $this->get('task.name')->shouldReturn('Name');
    }
}
