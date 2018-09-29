<?php

namespace legion112\brackets;


/**
 * Interface BracketParserInterface
 *
 * The BracketParserInterface interface provides the API for checking brackets
 */

interface ValidatorBracketInterface
{
    /**
     * Function parse should return true if brackets is right or false otherwise
     *
     * @param string $line
     * @return bool
     */
    function parse(string $line) : bool;
}