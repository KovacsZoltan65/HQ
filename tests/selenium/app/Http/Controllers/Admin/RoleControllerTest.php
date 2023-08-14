<?php

use App\Http\Controllers\Admin\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

/**
 * Description of RoleControllerTest
 *
 * @author kovacs.zoltan
 */
class RoleControllerTest extends TestCase {

    /**
     * @assert (0, 0) == 0
     */
    public function testGetRoles() {
        
        // ------------
        // Paraméterek
        // ------------
        
        // Táblázat sor / oldal
        $per_page = Config::get('app.per_page');
        
        // Request osztály példányosítása
        $request = new Request();
        // Beállítások és szűrők
        $conf = [];
        
        // Könyvek controller példányosítása
        $roleController = new RoleController();
        
        // ----------------------------------------------
        // Adatok lekérése az átadott paraméterek alapján
        // ----------------------------------------------
        
        // Csak az oldaltörést adom át.
        $conf = [
            'config' => [
                'per_page' => $per_page,
            ],
            'filter' => [],
        ];

        // A paramétertömb átadása a request osztálynak
        $request->merge($conf);

        // Adatok lekérése a paraméterek alapján.
        $res = $roleController->getRoles($request);

        // Adathalmaz lekérése asszociatív tömb alakban
        $roles_data = $res->getData(true);

        // Könyv adathalmaz
        $roles = $roles_data['roles'];
        
        // Rekordok száma
        $roles_count = count($roles['data']);

        // A rekordok száma kisebb, vagy egyenlő az átadott paraméterrel
        $this->assertLessThanOrEqual($per_page, $roles_count, "Elvárt: {$per_page}; Kapott: {$roles_count}");
    }
}
