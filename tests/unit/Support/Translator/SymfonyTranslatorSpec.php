<?php

namespace unit\Acme\Support\Translator;

use Acme\Support\Translator\Translator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Translation\Translator as STranslator;

class SymfonyTranslatorSpec extends ObjectBehavior
{
    function let(STranslator $translator)
    {
        $this->beConstructedWith($translator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Translator::class);
    }

    function it_translates_messages(STranslator $translator)
    {
        $translator->trans('message', [], null, null)->willReturn('Message');
        $this->translate('message')->shouldReturn('Message');
    }

    function it_translates_messages_with_parameters(STranslator $translator)
    {
        $translator->trans('message', ['name' => 'Name'], null, null)->willReturn('Message');
        $this->translate('message', ['name' => 'Name'])->shouldReturn('Message');
    }

    function it_translates_messages_with_pluralization(STranslator $translator)
    {
        $translator->transChoice('message', 5, [], null, null)->willReturn('Message');
        $this->translate('message', [], 5)->shouldReturn('Message');
    }

    function it_translates_messages_to_any_language(STranslator $translator)
    {
        $translator->trans('message', [], null, 'en')->willReturn('Message');
        $this->translate('message', [], null, 'en')->shouldReturn('Message');
    }

    function it_changes_the_language(STranslator $translator)
    {
        $this->language('en')->shouldReturn($this);
        $translator->setLocale('en')->shouldHaveBeenCalled();
    }

    function it_changes_the_fallback_language(STranslator $translator)
    {
        $this->fallback('en')->shouldReturn($this);
        $translator->setFallbackLocales(['en'])->shouldHaveBeenCalled();
    }
}
