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
    public function __construct()
    {
        $this->middleware('can:book list',   ['only' => ['index', 'show']]);
        $this->middleware('can:book create', ['only' => ['create', 'store']]);
        $this->middleware('can:book edit',   ['only' => ['edit', 'update']]);
        $this->middleware('can:book delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$data = Book::query()->paginate(config('app.page_lines'));

        //return Inertia::render('Books/booksIndex', [
        //    'data' => $data
        //]);
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

        // Lekérdezés előkészítése
        $query = Book::query();
        
        if( count($filters) > 0 ){
            if( $search = ($filters['search'] ?? null) ){
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
                    
                if( count($terms) > 0 ){
                    $query->where(function($q) use($terms) {
                        $whereType = 'where';
                        foreach( $terms as $term ){
                            $q->{$whereType}('title', 'LIKE', "%{$term}%");
                            $whereType = 'orWhere';
                            $q->{$whereType}('author', 'LIKE', "%{$term}%");
                        }
                    });
                }
            }
        }
        
        // Sorok a táblázat egy lapján
        $per_page = count($config) != 0 && isset($config['per_page'])
            ? $config['per_page']
            : config('app.per_page');

        // Adatok lekérése
        $books = $query->paginate($per_page);
        
        // Küldendő adatcsomag
        $data = [
              'books' => $books,
             'config' => $config,
            'filters' => $filters,
        ];

        // Adatok visszaküldése
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        //Validator::make($request->all(), [
        //    'title' => 'required',
        //    'author' => 'required',
        //])->validate();

        Book::create($request->all());

        return redirect()->back()->with('message', __('books_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book){}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book){}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //Validator::make($request->all(), [
        //    'title' => 'required',
        //    'author' => 'required',
        //])->validate();

        //$book->update($request->all());

        //return redirect()->back()->with('message', 'Book updated');
        $book->update($request->all());

        return response()->json($book, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->back()
            ->with('message', __('books_deleted'));
    }
}
