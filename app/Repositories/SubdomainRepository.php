<?php

namespace App\Repositories;

use App\Models\Subdomain;
use App\Criteria\SubdomainCriteria;

/**
 * Class SubdomainRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SubdomainRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Subdomain::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(SubdomainCriteria::class));
    }
    
}
