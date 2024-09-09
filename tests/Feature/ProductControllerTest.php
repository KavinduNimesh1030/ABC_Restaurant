<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Mockery;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Http\Request;
use App\Services\ProductService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ProductControllerTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /** @test */
    public function it_should_return_the_product_add_view_with_categories()
    {
        // Mock ProductService
        $productService = Mockery::mock(ProductService::class);
        $controller = new ProductController($productService);

        // Mock View facade
        View::shouldReceive('make')
            ->with('account.admin.pages.product.add', Mockery::type('array'))
            ->once()
            ->andReturn('view');

        // Call the controller method
        $response = $controller->index();

        $this->assertEquals('view', $response);
    }

    /** @test */
    public function it_should_store_a_product()
    {
        // Mock ProductService
        $productService = Mockery::mock(ProductService::class);
        $productService->shouldReceive('store')->once()->andReturn(true);

        // Mock Request
        $request = Mockery::mock(Request::class);
        $request->shouldReceive('all')->once()->andReturn([]);

        $controller = new ProductController($productService);

        // Call the store method
        $response = $controller->store($request);

        $this->assertNull($response);  // Assuming the store method doesn't return a view or redirect
    }

    /** @test */
    public function it_should_return_the_edit_page_with_product()
    {
        // Mock ProductService
        $productService = Mockery::mock(ProductService::class);
        $productService->shouldReceive('findById')->once()->with('1')->andReturn('product');

        $controller = new ProductController($productService);

        // Mock View facade
        View::shouldReceive('make')
            ->with('account.admin.pages.product.edit', Mockery::type('array'))
            ->once()
            ->andReturn('view');

        // Call the controller method
        $response = $controller->getEditPage('1');

        $this->assertEquals('view', $response);
    }

    /** @test */
    public function it_should_delete_a_product()
    {
        // Mock ProductService
        $productService = Mockery::mock(ProductService::class);
        $productService->shouldReceive('delete')->once()->with('1')->andReturn(true);

        $controller = new ProductController($productService);

        // Mock Redirect facade
        Redirect::shouldReceive('route')
            ->with('product.list-view')
            ->once()
            ->andReturn('redirected');

        // Call the delete method
        $response = $controller->delete('1');

        $this->assertEquals('redirected', $response);
    }
}
