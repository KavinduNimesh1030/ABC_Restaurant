<?php

namespace Tests\Unit;

use App\Http\Controllers\service\ServicesController;
use App\Services\ServiceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery;
use PHPUnit\Framework\TestCase;

class ServicesControllerTest extends TestCase
{
    private ServicesController $controller;
    private Mockery\MockInterface $serviceService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->serviceService = Mockery::mock(ServiceService::class);
        $this->controller = new ServicesController($this->serviceService);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testStore()
    {
        DB::shouldReceive('beginTransaction')->once();
        DB::shouldReceive('commit')->once();
        $this->serviceService->shouldReceive('store')->once()->with(Mockery::type('array'));

        $request = Request::create('/store', 'POST', ['data' => 'test']);
        $response = $this->controller->store($request);

        $this->assertNull($response);
    }

 

    public function testGetAll()
    {
        $this->serviceService->shouldReceive('getAll')->once()->andReturn(['service1', 'service2']);

        $response = $this->controller->getAll();

        $this->assertEquals(['service1', 'service2'], $response);
    }

    public function testGetEditPage()
    {
        $this->serviceService->shouldReceive('findById')->once()->with('1')->andReturn(['id' => '1', 'name' => 'Service']);

        $response = $this->controller->getEditPage('1');

        $this->assertEquals(['id' => '1', 'name' => 'Service'], $response);
    }

    public function testEdit()
    {
        $this->serviceService->shouldReceive('update')->once()->with(Mockery::type('array'), '1');

        $request = Request::create('/edit/1', 'POST', ['data' => 'test']);
        $response = $this->controller->edit($request, '1');

        $this->assertNull($response);
    }

 

    public function testDelete()
    {
        $this->serviceService->shouldReceive('delete')->once()->with('1');

        $response = $this->controller->delete(1);

        $this->assertEquals(['success' => 'Service deleted successfully.'], $response);
    }

  
}
