<?php

require dirname(__DIR__) . '/src/Whovian.php';
use PHPUnit\Framework\TestCase;

class WhovianTest extends TestCase{
    public function testSetsDoctorConstructor(){
        $whovian = new Whovian('Peter Capaldi');
        //可以测试受保护的对象属性，如，protected，第一个参数是期望值，第二个是属性名，第三个是实例
        $this->assertAttributeEquals('Peter Capaldi' , 'favoriteDoctor', $whovian);
    }

    public function testSaysDoctorName(){
        $whovian = new Whovian('David Tennant');
        //第一个参数是期望值，第二个是要检查的值
        $this->assertEquals('The best doctor is David Tennant',$whovian->say());
    }

    public function testRespondToInAgreement(){
        $whovian = new Whovian('David Tennant');
        $opinion = 'David Tennant is the best doctor, period';
        $this->assertEquals('I agree!',$whovian->respondTo($opinion));
    }
    /**
     * @expectedException Exception
     */
    public function testRespondToInDisagreement(){
        $whovian = new Whovian('David Tennant');
        $opinion = 'No way, Matt Smith was awesome!';
        $whovian->respondTo($opinion);
    }
}