<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubdomainRequest;
use App\Http\Requests\UpdateSubdomainRequest;
use App\Models\Subdomain;
use App\Repositories\SubdomainRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SubdomainController extends Controller
{
    private $repository;
    
    public function __construct(SubdomainRepository $repository) {
        $this->repository = $repository;
        
        $this->middleware('can:subdomain list',    ['only' => ['index', 'show']]);
        $this->middleware('can:subdomain create',  ['only' => ['create', 'store']]);
        $this->middleware('can:subdomain edit',    ['only' => ['edit', 'update']]);
        $this->middleware('can:subdomain delete',  ['only' => ['destroy']]);
        $this->middleware('can:subdomain restore', ['only' => ['restore']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Subdomains/subdomainsIndex', [
            'can' => [
                   'list' => Auth::user()->can('subdomain list'),
                 'create' => Auth::user()->can('subdomain create'),
                   'edit' => Auth::user()->can('subdomain edit'),
                 'delete' => Auth::user()->can('subdomain delete'),
                'restore' => Auth::user()->can('subdomain restore'),
            ]
        ]);
    }
    
    public function getSubdomains(Request $request)
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
                    ['subdomain', 'LIKE', "%$value%"],
                    ['url', 'LIKE', "%$value%"],
                    ['name', 'LIKE', "%$value%"],
                    ['db_host', 'LIKE', "%$value%"],
                    ['db_name', 'LIKE', "%$value%"],
                    ['db_user', 'LIKE', "%$value%"],
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
        $subdomains = $this->repository->paginate($per_page);
        
        // Adatcsomag összeállítása
        $data = [
            'subdomains' => $subdomains,
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
        $subdomain = new Subdomain();
        return Inertia::render('Subdomains/SubdomainsCreate', [
            'subdomain' => $subdomain,
            'can' => [
                   'list' => Auth::user()->can('subdomain list'),
                 'create' => Auth::user()->can('subdomain create'),
                   'edit' => Auth::user()->can('subdomain edit'),
                 'delete' => Auth::user()->can('subdomain delete'),
                'restore' => Auth::user()->can('subdomain restore'),
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        \Log::info('store');
    }
    //public function store(StoreSubdomainRequest $request)
    //{
    //    $subdomain = $this->repository->create($request->all());
        
    //    return redirect()->back()->with('message', __('subdomain_created'));
    //}

    /**
     * Display the specified resource.
     */
    public function show(){}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(){}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubdomainRequest $request, int $id)
    {
        $subdomain = $this->repository->update($request->all(), $id);
        
        return response()->json($subdomain, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->repository->delete($id);
        
        return redirect()->back()->with('message', __('subdomain_deleted'));
    }
    
    public function restore(int $id)
    {
        $subdomain = Subdomain::onlyTrashed()->find($id);
        $res = $subdomain->restore();
        
        return redirect()->back()->with('message', __('subdomain_restored'));
    }
}
