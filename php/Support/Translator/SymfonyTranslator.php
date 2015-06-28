<?php

namespace Acme\Support\Translator;

use Symfony\Component\Translation\Translator as STranslator;

class SymfonyTranslator implements Translator
{
    /**
     * Create a new instance.
     *
     * @param STranslator $translator
     */
    public function __construct(STranslator $translator)
    {
        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function translate($message, $parameters = [], $number = null, $language = null)
    {
        if (is_int($number)) {
            return $this->translator->transChoice($message, $number, $parameters, null, $language);
        } else {
            return $this->translator->trans($message, $parameters, null, $language);
        }
    }

    /**
     * @param string $language
     * @return self
     */
    public function language($language)
    {
        $this->translator->setLocale($language);
        return $this;
    }

    /**
     * @param string $language
     * @return self
     */
    public function fallback($language)
    {
        $this->translator->setFallbackLocales([$language]);
        return $this;
    }
}
