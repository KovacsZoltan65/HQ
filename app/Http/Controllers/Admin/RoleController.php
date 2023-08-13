<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function __create()
    {
        $this->middleware('can:role list', ['only' => ['index', 'show']]);
        $this->middleware('can:role create', ['only' => ['create', 'store']]);
        $this->middleware('can:role edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:role delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Role/roleIndex', [
            'can' => [
                'list' => Auth::user()->can('role list'),
                'create' => Auth::user()->can('role create'),
                'edit' => Auth::user()->can('role edit'),
                'delete' => Auth::user()->can('role delete'),
            ]
        ]);
        /* EREDETI! MÉG NE TÖRÖLD KI!!
        $roles = (new Role)->newQuery();
        $roles->latest();
        $roles = $roles->paginate(100)->onEachSide(2)->appends(request()->query());

        return Inertia::render('Admin/Role/Index', [
            // szerepkörök
            'roles' => $roles,
            // jogosultságok
            'can' => [
                'create' => Auth::user()->can('role create'),
                'edit' => Auth::user()->can('role edit'),
                'delete' => Auth::user()->can('role delete'),
            ],
        ]);
        */
    }

    public function getRoles(Request $request){
        // Beállítások
        $config = $request->get('config', []);
        // Szűrők és keresések
        $filters = $request->get('filters', []);

        // Lekérdezés előkészítése
        $query = Role::query();

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
        $roles = $query->paginate($per_page);

        // Küldendő adatcsomag
        $data = [
            'roles' => $roles,
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
