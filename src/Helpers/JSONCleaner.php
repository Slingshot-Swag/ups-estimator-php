<?php

namespace Jamiehoward\UpsEstimator\Helpers;

class JSONCleaner
{
    /**
     * Returns a cleaned JSON string.
     *
     * @param string $json
     * @return string
     */
    public static function toJson(string $string)
    {
        $cleanedString = self::cleanString($string);

        $json = json_decode($cleanedString);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception(json_last_error_msg());
        }

        return json_encode($json);
    }

    /**
     * Returns a cleaned string.
     *
     * @param string $string
     * @return string
     */
    public static function cleanString(string $string)
    {
        $string = self::stripSlashes($string);
        $string = self::stripQuotes($string);
        $string = self::stripWhitespace($string);

        return $string;
    }

    /**
     * Returns a string without unnecessary quotes.
     *
     * @param string $string
     * @return string
     */
    public static function stripQuotes(string $string)
    {
        $string = str_replace('"[', '[', $string);
        $string = str_replace(']"', ']', $string);
        $string = str_replace('"{', '{', $string);
        $string = str_replace('}"', '}', $string);

        return $string;
    }

    /**
     * Returns a string without unnecessary whitespace.
     *
     * @param string $string
     * @return string
     */
    public static function stripWhitespace(string $string)
    {
        $patterns = ["\n", "\r", "\t", "\0", "\x0B", "  ", "   "];
        
        $string = str_replace($patterns, '', $string);

        $string = str_replace(': \"', ':"', $string);

        return $string;
    }

    /**
     * Returns a string without slashes.
     *
     * @param string $string
     * @return string
     */
    public static function stripSlashes(string $string)
    {
        $slashesPresent = true;

        while ($slashesPresent) {
            $string = stripslashes($string);
            $slashesPresent = strpos($string, '\\') !== false;
        }

        return $string;
    }
}