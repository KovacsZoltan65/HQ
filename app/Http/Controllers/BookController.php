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
        // Szűrők és keresések
        $filters = $request->get('filters', []);
    }
}