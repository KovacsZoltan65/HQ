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
            if( isset($filters['search']) )
            {
                $value = $filters['search'];
                $this->repository
                ->findWhere([
                    ['author', 'LIKE', "%$value%"],
                    ['title', 'LIKE', "%$value%"]
                ]);
            }
        }
        
        // Rendezés kezelése
        if( count($filters) > 0 )
        {
            $column = 'name';
            if( isset($filters['column']) )
            {
                $column = $filters['column'];
            }
            
            $direction = 'asc';
            if( isset($filters['direction']) ){
                $direction = $filters['direction'];
            }
            
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
        
        return response()->json($data, Response::HTTP_OK);
    }
            
    public function getBooks_old(Request $request)
    {
        // Beállítások
        $config = $request->get('config', []);
        \Log::info('config: ' . print_r($config, true));
        // Szűrők és keresések
        $filters = $request->get('filters', []);
        \Log::info('filters: ' . print_r($filters, true));
        
        if( count($filters) > 0 )
        {
            if( $search = ($filters['search'] ?? null) )
            {
                $terms = array_reduce(
                    ex,
                    '',
                    []
                );
                /*
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
                */
            }
            \Log::info('terms: ' . print_r($terms, true));
            if( count($terms) > 0 )
            {
                $books = $this->repository->findWhere([
                    // Default Condition =
                    'title' => '10',
                    'author' => '15',
                    
                    // Custom Condition
                    ['title', '>', '10'],
                    
                    // DATE, DAY, MONTH, YEAR
                    ['columnName2', 'DATE', '2023-01-01'],          //whereDate
                    ['columnName3', 'DATE >=', '2023-01-01'],       //whereDate with operator
                    
                    ['columnName4','IN',['value1','value2']],       //whereIn
                    ['columnName5','NOTIN',['value1','value2']],    //whereNotIn
                    ['columnName6','EXIST',''],                     //whereExists
                    
                    //HAS, HASMORPH, DOESNTHAVE, DOESNTHAVEMORPH
                    ['columnName7','HAS',function($query){}],       //whereHas
                            
                    //BETWEEN, BETWEENCOLUMNS, NOTBETWEEN, NOTBETWEENCOLUMNS
                    ['columnName8','BETWEEN',[10, 100]],            //whereBetween
                    
                ]);
                //foreach ( $terms as $value )
                //{
                //    \Log::info('$value: ' . print_r($value, true));
                    //$this->repository->where('title', 'LIKE', "%$value%");
                    //$a = $this->repository->orWhere('title', 'LIKE', "%$value%");
                    //\Log::info('$this->repository: ' . print_r($this->repository, true));
                    //$this->repository->where('author', 'LIKE', "%$value%");
                //}
            }
        }
        
        $per_page = count($config) != 0 && isset($config['per_page']) 
            ? $config['per_page'] 
            : config('app.per_page');
        
        $books = $this->repository->paginate($per_page)->toArray();
        \Log::info('books: ' . print_r($books, true));
        //dd($books);
        
        $data = [
              'books' => $books,
             'config' => $config,
            'filters' => $filters,
        ];
        
        return response()->json($data, Response::HTTP_OK);
    }
}