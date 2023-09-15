<?php

namespace App\Repositories;

use Prettus\Repository\Criteria\SubdomainCriteria;
use App\Repositories\SubdomainRepository;
use App\Entities\Subdomain;
use App\Validators\SubdomainValidator;

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
