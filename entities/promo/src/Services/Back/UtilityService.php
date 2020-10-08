<?php

namespace InetStudio\PromoPackage\Promo\Services\Back;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use InetStudio\AdminPanel\Base\Services\BaseService;
use InetStudio\PromoPackage\Promo\Contracts\Models\PromoModelContract;
use InetStudio\PromoPackage\Promo\Contracts\Services\Back\UtilityServiceContract;

class UtilityService extends BaseService implements UtilityServiceContract
{
    public function __construct(PromoModelContract $model)
    {
        parent::__construct($model);
    }

    public function getSuggestions(string $search): Collection
    {
        $now = Carbon::now();

        return $this->model::where(
                [
                    ['title', 'LIKE', '%'.$search.'%'],
                ]
            )
            ->where(function ($query) use ($now) {
                $query->where('date_start', '<=', $now)->orWhereNull('date_start');
            })
            ->where(function ($query) use ($now) {
                $query->where('date_end', '>=', $now)->orWhereNull('date_end');
            })
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
