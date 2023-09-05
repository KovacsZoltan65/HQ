<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BookController extends Controller
{
    //
    private $repository;
    
    public function __construct(\App\Repositories\BookRepository $repo)
    {
        $this->repository = $repo;
        
        $this->middleware('can:book list',   ['only' => ['index', 'show']]);
        $this->middleware('can:book create', ['only' => ['create', 'store']]);
        $this->middleware('can:book edit',   ['only' => ['edit', 'update']]);
        $this->middleware('can:book delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        return Inertia::render('Books/booksIndex', [
            'can' => [
                  'list' => Auth::user()->can('book list'),
                'create' => Auth::user()->can('book create'),
                  'edit' => Auth::user()->can('book edit'),
                'delete' => Auth::user()->can('book delete'),
            ]
        ]);
    }
    
    public function getBooks(Request $request)
    {
        // Beállítások
        $config = $request->get('config', []);
        \Log::info('config: ' . print_r($config, true));
        // Szűrők és keresések
        $filters = $request->get('filters', []);
        \Log::info('filters: ' . print_r($filters, true));
        
        if( count($filters) > 0 )
        {
            if( $search = ($filters['search'] ?? null) )
            {
                $search_cleaned = preg_replace("/[^a-zA-Z0-9\(\)\-\+\_@\.]+/", " ", $search);
                
                $terms = array_reduce(
                    explode(' ', $search_cleaned),
                    function($carry, $term){
                        $term = trim($term);
                        if(!empty($term)){
                            $carry[] = strtolower($term);
                        }
                        return $carry;
                    }, 
                    []
                );
            }
            
            if( count($terms) > 0 )
            {
                //
            }
        }
        
        $per_page = count($config) != 0 && isset($config['per_page']) 
            ? $config['per_page'] 
            : config('app.per_page');
        
        $books = $this->repository->paginate($per_page);
        \Log::info('books: ' . print_r($books, true));
        
        $data = [
              'books' => $books,
             'config' => $config,
            'filters' => $filters,
        ];
        
        return response()->json($data, Response::HTTP_OK);
    }
}