<?php

namespace legion112\brackets;

class ValidatorBracket implements ValidatorBracketInterface
{
    /**
     * function parse
     * The function parse brackets
     *
     * @param string $line
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function parse(string $line) : bool {
        if(preg_match('/[^()\s]/', $line)) {
            throw new \InvalidArgumentException('Wrong symbol found');
        }

        $counter = 0;
        for($i = 0, $len = strlen($line); $i < $len; ++$i) {
            $char = $line[$i];
            if($char === '(') $counter++;
            if($char === ')') $counter--;

            if($counter < 0)
                return false;
        }

        return $counter === 0;
    }
}