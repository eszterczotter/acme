<?php

namespace Acme\Support\Locale;

interface Locale
{
    /**
     * Load the given locale.
     *
     * @param string $locale
     * @return self
     */
    public function choose($locale);

    /**
     * Get a given text
     *
     * @param string $key
     * @param array $data
     * @param null|string $number
     * @return mixed
     */
    public function get($key, $data = [], $number = null);
}
