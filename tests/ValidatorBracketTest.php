<?php

use legion112\brackets\ValidatorBracket;

class ValidatorBracketTest extends \PHPUnit\Framework\TestCase
{
    /** @var \legion112\brackets\ValidatorBracketInterface */
    protected $validator;

    protected function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        $this->validator = new ValidatorBracket();
    }

    public function testThrowsWhenHasNumberSymbol(){
        $this->expectException(InvalidArgumentException::class);
        $this->validator->parse("(1)");
    }

    public function testThrowsWhenHasPlushSymbol(){
        $this->expectException(InvalidArgumentException::class);
        $this->validator->parse('(+)');
    }

    public function testWrongBrackets() {
        $this->assertFalse($this->validator->parse(")"));
        $this->assertFalse($this->validator->parse("("));
        $this->assertFalse($this->validator->parse(")("));
        $this->assertFalse($this->validator->parse(")(    ()"));

    }

    public function testRightBrackets() {
        $this->assertTrue($this->validator->parse("()"));
        $this->assertTrue($this->validator->parse("()( ()()()()()()()() )"));
        $this->assertTrue($this->validator->parse("( () )"));
    }
}