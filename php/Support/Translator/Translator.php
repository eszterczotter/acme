<?php

namespace Acme\Support\Translator;

interface Translator
{
    /**
     * @param string $language
     * @return self
     */
    public function language($language);

    /**
     * @param string $language
     * @return self
     */
    public function fallback($language);

    /**
     * Translate the message.
     *
     * @param string $message The message (key) to translate.
     * @param array $parameters The array of data for placeholders if any.
     * @param number|null $number The number for pluralization if any.
     * @param null $language
     * @return string
     */
    public function translate($message, $parameters = [], $number = null, $language = null);
}
