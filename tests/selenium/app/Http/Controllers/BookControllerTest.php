<?php

/**
 * Description of BookControllerTest
 *
 * @author kovacs.zoltan
 */

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;



class BookControllerTest extends TestCase {

    //protected function setUp(): void{
    //    Log::info('setUp');
    //}
    
    //public static function setUpBeforeClass(): void {
    //    Log::info('setUpBeforeClass');
    //}
    
    public function test_getBooks() {
        
        $per_page = Config::get('app.per_page');
        //Log::info('per_page: ' . $per_page);
        
        $request = new Request();
        $request->merge([
            'config' => [
                'per_page' => $per_page,
            ],
            'filter' => [],
        ]);
        
        //Log::info('$request: ' . print_r($request->all(), true));
        
        $bookController = new BookController();
        $res = $bookController->getBooks($request);
        $books_data = $res->getData(true);
        $books = $books_data['books'];
        
        $books_count = count($books['data']);

        $this->assertEquals($per_page, $books_count, "Elvárt: {$per_page}; Kapott: {$books_count}");

    }
}
