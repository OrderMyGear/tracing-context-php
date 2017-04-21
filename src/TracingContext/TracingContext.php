<?php

namespace TracingContext;

use InvalidArgumentException;

final class TracingContext
{
    private $values = [];

    public static function create()
    {
        return new self();
    }

    public function withValue($key, $value)
    {
        if (empty($key)) {
            throw new InvalidArgumentException("Key cannot be empty.");
        }

        $this->values[(string) $key] = $value;

        return $this;
    }

    public function value($key)
    {
        if (!array_key_exists($key, $this->values)) {
            throw KeyDoesNotExist::create($key);
        }

        return $this->values[(string) $key];
    }
}
