<?php

namespace InetStudio\PromoPackage\Promo\Http\Controllers\Back;

use InetStudio\AdminPanel\Base\Http\Controllers\Controller;
use InetStudio\PromoPackage\Promo\Contracts\Services\Back\ItemsServiceContract;
use InetStudio\PromoPackage\Promo\Contracts\Services\Back\DataTableServiceContract;
use InetStudio\PromoPackage\Promo\Contracts\Http\Requests\Back\SaveItemRequestContract;
use InetStudio\PromoPackage\Promo\Contracts\Http\Controllers\Back\ResourceControllerContract;
use InetStudio\PromoPackage\Promo\Contracts\Http\Responses\Back\Resource\FormResponseContract;
use InetStudio\PromoPackage\Promo\Contracts\Http\Responses\Back\Resource\SaveResponseContract;
use InetStudio\PromoPackage\Promo\Contracts\Http\Responses\Back\Resource\ShowResponseContract;
use InetStudio\PromoPackage\Promo\Contracts\Http\Responses\Back\Resource\IndexResponseContract;
use InetStudio\PromoPackage\Promo\Contracts\Http\Responses\Back\Resource\DestroyResponseContract;

class ResourceController extends Controller implements ResourceControllerContract
{
    public function index(DataTableServiceContract $dataTableService): IndexResponseContract
    {
        $table = $dataTableService->html();

        return resolve(
            IndexResponseContract::class,
            [
                'data' => compact('table'),
            ]
        );
    }

    public function create(ItemsServiceContract $resourceService, string $type = ''): FormResponseContract
    {
        $item = $resourceService->getItemById();

        $item->promo_type = $type;

        return resolve(
            FormResponseContract::class,
            [
                'data' => compact('item'),
            ]
        );
    }

    public function store(ItemsServiceContract $resourceService, SaveItemRequestContract $request): SaveResponseContract
    {
        return $this->save($resourceService, $request);
    }

    public function edit(ItemsServiceContract $resourceService, int $id = 0): FormResponseContract
    {
        $item = $resourceService->getItemById($id);

        return resolve(
            FormResponseContract::class,
            [
                'data' => compact('item'),
            ]
        );
    }

    public function update(
        ItemsServiceContract $resourceService,
        SaveItemRequestContract $request,
        int $id = 0
    ): SaveResponseContract {
        return $this->save($resourceService, $request, $id);
    }

    protected function save(
        ItemsServiceContract $resourceService,
        SaveItemRequestContract $request,
        int $id = 0
    ): SaveResponseContract {
        $data = $request->all();

        $item = $resourceService->save($data, $id);

        return resolve(SaveResponseContract::class, compact('item'));
    }

    public function show(ItemsServiceContract $resourceService, int $id = 0): ShowResponseContract
    {
        $item = $resourceService->getItemById($id);

        return resolve(
            ShowResponseContract::class,
            [
                'data' => compact('item'),
            ]
        );
    }

    public function destroy(ItemsServiceContract $resourceService, int $id = 0): DestroyResponseContract
    {
        $result = $resourceService->destroy($id);

        return resolve(
            DestroyResponseContract::class,
            [
                'result' => ($result === null) ? false : $result,
            ]
        );
    }
}
