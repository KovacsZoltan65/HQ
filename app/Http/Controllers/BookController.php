<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$data = Book::query()->paginate(config('app.page_lines'));

        //return Inertia::render('Books/booksIndex', [
        //    'data' => $data
        //]);
        return Inertia::render('Books/booksIndex');
    }

    public function getBooks(Request $request)
    {
        $config = $request->get('config', []);
        $filters = $request->get('filters', []);

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
        
        $per_page = count($config) != 0 && isset($config['per_page'])
            ? $config['per_page']
            : config('app.per_page');

        $books = $query->paginate($per_page);
        
        $data = [
            'books' => $books,
            'config' => $config,
            'filters' => $filters,
        ];

        //sleep(5);

        //return response()->json($books, Response::HTTP_OK);
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

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

        return redirect()->back()->with('message', 'Book created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
    }

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
            ->with('message', 'Book deleted');
    }
}
