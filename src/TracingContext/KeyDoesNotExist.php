<?php

namespace TracingContext;

use RuntimeException;

final class KeyDoesNotExist extends RuntimeException
{
    public static function create($key)
    {
        return new self(sprintf('%s does not exists in the context.', $key));
    }
}
