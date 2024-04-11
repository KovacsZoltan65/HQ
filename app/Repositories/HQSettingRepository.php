<?php

namespace App\Repositories;

use App\Criteria\HQSettingCriteria;
use App\Interfaces\HQSettingRepositoryInterface;
use App\Models\HQSetting;

/**
 * Class HQSettingRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class HQSettingRepository extends BaseRepository implements HQSettingRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return HQSetting::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
