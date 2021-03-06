<?php

namespace tests;

use app\MainClass;
use PHPUnit\Framework\TestCase;

require_once 'app\MainClass.php';

class MainClassTest extends TestCase
{
        function testAdd(){
            $mainClass = new MainClass(5,4);
            $mainClass2 = new MainClass(3,2);
            $mainClass->add($mainClass2);
            self::assertEquals("(8,6)", $mainClass);
        }

        function testMult(){
            $mainClass = new MainClass(12,4);
            $mainClass2 = new MainClass(1,-10);
            $mainClass->mult($mainClass2);
            $this->assertFalse("(45,-9)"== $mainClass);
        }

        function testSub(){
            $mainClass = new MainClass(1,5);
            $mainClass2 = new MainClass(2,6);
            $mainClass->sub($mainClass2);
            $this->assertFalse("(6,35)"== $mainClass);
        }

        function testDiv(){
            $mainClass = new MainClass(1,1);
            $mainClass2 = new MainClass(-2,1);
            $mainClass->div($mainClass2);
            $this->assertEquals("(-0.2,-0.6)", $mainClass->__toString());
        }

        function testAbs(){
            $mainClass = new MainClass(3,6);
            $mainClass->abs();
            $this->assertNotSame("3", $mainClass);
        }

        function testToString(){
            $mainClass = new MainClass(3,6);
            $mainClass->__toString();
            $this->assertEquals("(3,6)", $mainClass);
        }
}