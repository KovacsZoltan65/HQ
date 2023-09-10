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
        // Beállítások
        $config = $request->get('config', []);
        //$config = ['per_page' => 10];
        
        // Szűrők és keresések
        $filters = $request->get('filters', []);
        //$filters = [
        //    'search' => 're',
        //    'column' => 'title',
        //    'direction' => 'desc',
        //];
        
        // Szűrés kezelése
        if( count($filters) > 0 )
        {
            // Ha van keresési paraméter, akkor...
            if( isset($filters['search']) )
            {
                // A keresési paramétert átteszem egy változóba
                $value = $filters['search'];
                // Keresési paraméter érvégyesítése az 'author' és 'title' mezőkre
                $this->repository->findWhere([
                    ['author', 'LIKE', "%$value%"],
                    ['title', 'LIKE', "%$value%"]
                ]);
            }
            
            // ----------------
            // RENDEZÉS
            // ----------------
            
            // Rendezés a 'name' oszlop szerint
            $column = 'name';
            // Ha van más beállítás, akkor...
            if( isset($filters['column']) )
            {
                // azt állítom be
                $column = $filters['column'];
            }
            
            // Alap rendezési irány
            $direction = 'asc';
            // Ha van más beállítás, akkor...
            if( isset($filters['direction']) ){
                // azt állítom be
                $direction = $filters['direction'];
            }
            // Rendezés érvényesítése
            $this->repository->orderBy($column, $direction);
        }
        
        // Oldaltörés értékének kezelése
        $per_page = count($config) != 0 && isset($config['per_page']) 
            ? $config['per_page'] 
            : config('app.per_page');
        
        // Adatok lekérése
        $books = $this->repository->paginate($per_page);
        
        // Adatcsomag összeállítása
        $data = [
              'books' => $books,
             'config' => $config,
            'filters' => $filters,
        ];
        
        // Adatcsomag visszaküldése
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resourOce.
     */
    public function create()
    {
        //
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
