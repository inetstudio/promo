<?php

namespace InetStudio\PromoPackage\Promo\Services\Back;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use InetStudio\AdminPanel\Base\Services\BaseService;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\PromoPackage\Promo\Contracts\Models\PromoModelContract;
use InetStudio\PromoPackage\Promo\Contracts\Services\Back\ItemsServiceContract;

/**
 * Class ItemsService.
 */
class ItemsService extends BaseService implements ItemsServiceContract
{
    /**
     * ItemsService constructor.
     *
     * @param  PromoModelContract  $model
     */
    public function __construct(PromoModelContract $model)
    {
        parent::__construct($model);
    }

    /**
     * Сохраняем модель.
     *
     * @param  array  $data
     * @param  int  $id
     *
     * @return PromoModelContract
     *
     * @throws BindingResolutionException
     */
    public function save(array $data, int $id): PromoModelContract
    {
        $action = ($id) ? 'отредактировано' : 'создано';

        $itemData = Arr::only($data, $this->model->getFillable());
        $item = $this->saveModel($itemData, $id);

        $classifiersData = Arr::get($data, 'classifiers', []);
        app()->make('InetStudio\Classifiers\Entries\Contracts\Services\Back\ItemsServiceContract')
            ->attachToObject($classifiersData, $item);

        $images = (config('promo.images.conversions.promo')) ? array_keys(config('promo.images.conversions.promo')) : [];
        app()->make('InetStudio\Uploads\Contracts\Services\Back\ImagesServiceContract')
            ->attachToObject(request(), $item, $images, 'promo', 'promo');

        event(
            app()->makeWith(
                'InetStudio\PromoPackage\Promo\Contracts\Events\Back\ModifyItemEventContract',
                compact('item')
            )
        );

        Session::flash('success', 'Промо «'.$item->title.'» успешно '.$action);

        return $item;
    }

    /**
     * Возвращаем статистику по страницам.
     *
     * @return mixed
     */
    public function getPromoStatistic()
    {
        return $this->model::count();
    }
}
