<?php

namespace App\Repositories;

use App\Models\Role;
use App\Criteria\RoleCriteria;

/**
 * Class RoleRepository.
 *
 * @package namespace App\Repositories;
 */
class RoleRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( RoleCriteria::class );
    }
    
}
