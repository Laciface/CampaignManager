<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Date;
use PHPUnit\Framework\TestCase;
use App\Http\Controllers\BlogPostController;

class DateTest extends TestCase
{
    private $controller;

    protected function setUp() : void
    {
        $this->controller = new BlogPostController();
    }

    protected function tearDown() : void
    {
        $this->controller = null;
    }

    public function testForIsWeekendOnMonday(){
        $date = strtotime('next Monday');
        $this->assertFalse($this->controller->isWeekend($date));
    }

    public function testForIsWeekendOnSaturday(){

        $date = strtotime('next saturday');
        $this->assertTrue($this->controller->isWeekend($date));
    }
}
