<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use TracingContext\KeyDoesNotExist;
use TracingContext\TracingContext;

final class TracingContextTest extends TestCase
{
    const TEST_KEY = 'test_key';
    const TEST_VALUE = 'test_value';

    public function testATracingContextFailsWhenRetrievingAnInexistingValue()
    {
        $tracingContext = TracingContext::create();
        $this->expectException(KeyDoesNotExist::class);
        $tracingContext->value(self::TEST_KEY);
    }

    public function testATracingContextHasTheExpectedValues()
    {
        $tracingContext = TracingContext::create();
        $tracingContext->withValue(self::TEST_KEY, self::TEST_VALUE);
        $this->assertEquals(self::TEST_VALUE, $tracingContext->value(self::TEST_KEY));
    }

    public function testATwoTracingContextAreEqual()
    {
        $tracingContext = TracingContext::create();
        $tracingContext->withValue(self::TEST_KEY, self::TEST_VALUE);

        $tracingContext2 = TracingContext::create();
        $tracingContext2->withValue(self::TEST_KEY, self::TEST_VALUE);
        $this->assertTrue($tracingContext->isEqual($tracingContext2));
    }
}
