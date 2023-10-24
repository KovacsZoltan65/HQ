<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Subdomain;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UsersController extends Controller
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
        
        $this->middleware('can:user list',    ['only' => ['index', 'show']]);
        $this->middleware('can:user create',  ['only' => ['create', 'store']]);
        $this->middleware('can:user edit',    ['only' => ['edit', 'update']]);
        $this->middleware('can:user destroy', ['only' => ['destroy']]);
        $this->middleware('can:user restore', ['only' => ['restore']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render(route('users'), [
            'can' => [
                   'list' => Auth::user()->can('user list'),
                 'create' => Auth::user()->can('user create'),
                   'edit' => Auth::user()->can('user edit'),
                'destroy' => Auth::user()->can('user destroy'),
                'restore' => Auth::user()->can('user restore'),
            ]
        ]);
    }
    
    public function getUsers(Request $request)
    {
        // Beállítások
        $config = $request->get('config', []);
        //$config = ['per_page' => 10];
        
        // Szűrők és keresések
        $filters = $request->get('filters', []);
        
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
                    ['name', 'LIKE', "%$value%"],
                    ['email', 'LIKE', "%$value%"],
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
        $users = $this->repository->paginate($per_page);
        
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
    public function create(Request $request)
    {
        $user = new \App\Models\User();
        
        return Inertia::render('Subdomains/SubdomainsCreate', [
            'user' => $user,
            'can' => [
                   'list' => Auth::user()->can('user list'),
                 'create' => Auth::user()->can('user create'),
                   'edit' => Auth::user()->can('user edit'),
                 'delete' => Auth::user()->can('user delete'),
                'restore' => Auth::user()->can('user restore'),
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = $this->repository->create($request->all());
        
        return redirect()->back()->with('message', __('subdomain_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user){}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return Inertia::render(
            'Userss/UserssEdit', [
                'user' => $user,
                'can' => [
                    'list' => Auth::user()->can('user list'),
                  'create' => Auth::user()->can('user create'),
                    'edit' => Auth::user()->can('user edit'),
                  'delete' => Auth::user()->can('user delete'),
                 'restore' => Auth::user()->can('user restore'),
                ]
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->repository->update($request->all(), $id);
        
        return redirect()->back()->with('message', __('user_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //\Log::info($user);
        
        return redirect()->back()->with('message', __('user_deleted'));
    }
    
    public function restore(int $id)
    {
        $user = User::onlyTrashed()->find($id);
        $res = $user->restore();
        
        return redirect()->back()->with('message', __('user_restored'));
    }
}
