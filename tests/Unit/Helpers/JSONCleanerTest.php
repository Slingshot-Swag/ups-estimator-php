<?php

namespace Tests\Unit\Helpers;

use Tests\TestCase;
use Jamiehoward\UpsEstimator\Helpers\JSONCleaner;

final class JSONCleanerTest extends TestCase
{
    public function test_class_exists()
    {
        $this->assertTrue(class_exists('\Jamiehoward\UpsEstimator\Helpers\JSONCleaner'));
    }

    public function test_can_convert_text_to_json()
    {
        $string = '{"foo":"bar"}';
        $json = JSONCleaner::toJson($string);
        
        $this->assertSame('{"foo":"bar"}', $json);
    }

    public function test_invalid_json_is_rejected()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Syntax error');
        
        JSONCleaner::toJson('{foo: "bar"}');
    }

    public function test_escaped_json_is_cleaned()
    {
        $testString ='{\"test\":false,\"foo\":\"bar\"}';
        $expected = '{"test":false,"foo":"bar"}';

        $json = JSONCleaner::stripSlashes($testString);

        $this->assertSame($expected, $json);
    }
    
    public function test_nested_escaped_json_is_also_cleaned()
    {
        $testString ='{\"test\":false,\"nested\":\"[{\\\"test\\\":\\\"test\\\"}]\"}';
        $expected = '{"test":false,"nested":[{"test":"test"}]}';

        $cleanedString = JSONCleaner::cleanString($testString);

        $this->assertSame($expected, $cleanedString);
    }

    public function test_nested_arrays_are_escaped()
    {
        $string = '"[{"test":false},{"test":false}]"';
        $expected = '[{"test":false},{"test":false}]';

        $json = JSONCleaner::stripQuotes($string);

        $this->assertSame($expected, $json);
    }

    public function test_string_is_cleaned_before_converting_to_json()
    {
        $string = '{\"test\":false,\"nested\":\"[{\\\"test\\\":\\\"test\\\"}]\"}';
        $expected = '{"test":false,"nested":[{"test":"test"}]}';

        $json = JSONCleaner::toJson($string);

        $this->assertSame($expected, $json);
    }
}
