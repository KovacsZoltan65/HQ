<?php

namespace App\Repositories;

use App\Criteria\PermissionCriteria;
use App\Models\Permission;

class PermissionRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }
    
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( PermissionCriteria::class );
    }
}