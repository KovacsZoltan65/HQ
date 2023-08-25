<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:post list', ['only' => ['index', 'show']]);
        $this->middleware('can:post create', ['only' => ['create', 'store']]);
        $this->middleware('can:post edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:post delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Post/postIndex', [
            'can' => [
                'list' => Auth::user()->can('post list'),
                'create' => Auth::user()->can('post create'),
                'edit' => Auth::user()->can('post edit'),
                'delete' => Auth::user()->can('post delete'),
            ],
        ]);
        /*
        $posts = (new Post)->newQuery();
        $posts->latest();
        $posts = $posts->paginate(100)->onEachSide(2)->appends(request()->query());

        return Inertia::render('Admin/Post/Index', [
            'posts' => $posts,
            'can' => [
                'list' => Auth::user()->can('post list'),
                'create' => Auth::user()->can('post create'),
                'edit' => Auth::user()->can('post edit'),
                'delete' => Auth::user()->can('post delete'),
            ],
        ]);
        */
    }

    public function getPosts(Request $request)
    {
        // Beállítások
        $config = $request->get('config', []);
        // Szűrők és keresések
        $filters = $request->get('filters', []);

        // Lekérdezés előkészítése
        $query = Post::query();

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
                            $q->{$whereType}('name', 'LIKE', "%{$term}%");
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
        $posts = $query->paginate($per_page);

        // Küldendő adatcsomag
        $data = [
            'posts' => $posts,
            'config' => $config,
            'filters' => $filters,
        ];

        // Adatok visszaküldése
        return response()->json($data, Response::HTTP_OK);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
