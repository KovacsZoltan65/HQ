<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:permission list',   ['only' => ['index', 'show']]);
        $this->middleware('can:permission create', ['only' => ['create', 'store']]);
        $this->middleware('can:permission edit',   ['only' => ['edit', 'update']]);
        $this->middleware('can:permission delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Permission/permissionIndex', [
            'can' => [
                  'list' => Auth::user()->can('permission list'),
                'create' => Auth::user()->can('permission create'),
                  'edit' => Auth::user()->can('permission edit'),
                'delete' => Auth::user()->can('permission delete'),
            ]
        ]);
        //$permissions = (new Permission)->newQuery();
        //$permissions->latest();
        //$permissions = $permissions->paginate(100)->onEachSide(2)->appends(request()->query());

        //return Inertia::render('Admin/Permission/Index', [
        //    'permissions' => $permissions,
        //    'can' => [
        //        'create' => Auth::user()->can('permission create'),
        //        'edit' => Auth::user()->can('permission edit'),
        //        'delete' => Auth::user()->can('permission delete'),
        //    ],
        //]);
    }

    public function getPermissions (Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resourOce.
     */
    public function create()
    {
        // Beállítások
        $config = $request->get('config', []);
        // Szűrők és keresések
        $filters = $request->get('filters', []);

        // Lekérdezés előkészítése
        $query = Permission::query();
        
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
                            $whereType = 'orWhere';
                            $q->{$whereType}('guard_name', 'LIKE', "%{$term}%");
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
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request)
    {
        Permission::create($request->all());

        return redirect()->back()->with('message', 'Permission created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        return response()->json($permission, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->back()
            ->with('message', 'Permission deleted');
    }
}
