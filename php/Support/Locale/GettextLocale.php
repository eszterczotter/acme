<?php

namespace Acme\Support\Locale;

use Gettext\Translator;

class GettextLocale implements Locale
{
    /**
     * @var string
     */
    private $pluralSuffix = '.pl';

    /**
     * @var Translator
     */
    private $translator;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var string[]
     */
    private $domains = [];

    /**
     * @var string
     */
    private $directory;

    /**
     * @param Translator $translator
     */
    public function __construct(Translator $translator, $directory)
    {
        $this->translator = $translator;
        $this->directory = $directory;
    }

    /**
     * Load the given locale.
     *
     * @param string $locale
     * @return self
     */
    public function choose($locale)
    {
        $this->locale = $locale;
    }

    /**
     * Get a given text
     *
     * @param string $key
     * @param array $data
     * @param null|string $number
     * @return mixed
     */
    public function get($key, $data = [], $number = null)
    {
        list($domain, $original) = $this->parseKey($key);

        $this->loadIfNotLoaded($this->locale, $domain);

        $translation = $this->getTranslation($domain, $original, $number);

        return $this->replacePlaceholders($data, $translation);
    }

    /**
     * Parse the key.
     *
     * @param string $key
     * @return array
     */
    private function parseKey($key)
    {
        $keys = explode('.', $key, 2);

        if (count($keys) == 1) {
            throw new \InvalidArgumentException;
        }

        $domain = $keys[0];

        $original = $keys[1];

        return array($domain, $original);
    }

    /**
     * Replace the placeholders in the translation.
     *
     * @param array $data
     * @param string $translation
     * @return mixed
     */
    private function replacePlaceholders($data, $translation)
    {
        foreach ($data as $placeholder => $value) {
            $translation = str_replace('{' . $placeholder . '}', $value, $translation);
        }
        return $translation;
    }

    /**
     * @param $domain
     * @param $original
     * @param $number
     * @return string
     */
    private function getTranslation($domain, $original, $number)
    {
        if (is_null($number)) {
            return $this->translator->dgettext($domain, $original);
        } else {
            return $this->translator->dngettext($domain, $original, $this->pluralize($original), $number);
        }
    }

    /**
     * Get the plural key from the original.
     *
     * @param string $original
     * @return string
     */
    private function pluralize($original)
    {
        return $original . $this->pluralSuffix;
    }

    private function loadIfNotLoaded($locale, $domain)
    {
        if (! in_array($locale . '.' . $domain, $this->domains)) {
            $this->translator->loadTranslations($this->directory . '/' . $locale . '/' . $domain . '.php');
            $this->domains[] = $locale . '.' . $domain;
        }
    }
}
