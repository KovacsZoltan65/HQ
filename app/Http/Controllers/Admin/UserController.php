<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    private $repository;
    
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
        
        $this->middleware('can:user list',    ['only' => ['index', 'show']]);
        $this->middleware('can:user create',  ['only' => ['create', 'store']]);
        $this->middleware('can:user edit',    ['only' => ['edit', 'update']]);
        $this->middleware('can:user delete',  ['only' => ['destroy']]);
        //$this->middleware('can:user restore', ['only' => ['restore']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Itertia::render('Admin/User/userIndex', [
            'can' => [
                  'list' => Auth::user()->can('user list'),
                'create' => Auth::user()->can('user create'),
                  'edit' => Auth::user()->can('user edit'),
                'delete' => Auth::user()->can('user delete'),
            ],
        ]);
    }

    public function getUsers(Request $request)
    {
        // Beállítások
        $config = $request->get('config', []);
        //$config = ['per_page' => 10];
        
        // Szűrők és keresések
        $filters = $request->get('filters', []);
        
        if( count($filters) > 0 )
        {
            if( isset($filters['column']) )
            {
                //
            }
            
            if( isset($filters['direction']) )
            {
                //
            }
        }
        
        // Oldaltörés értékének kezelése
        $per_page = count($config) != 0 && isset($config['per_page']) 
            ? $config['per_page'] 
            : config('app.per_page');
        
        $users = $this->repository;
        
        // Adatcsomag összeállítása
        $data = [
              'users' => $users,
             'config' => $config,
            'filters' => $filters,
        ];
        
        // Adatcsomag visszaküldése
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
    public function store(StoreUserRequest $request)
    {
        //$user = $this->repository
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
    public function update(UpdateUserRequest $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
    
    public function restore(int $id)
    {
        //
    }
}
