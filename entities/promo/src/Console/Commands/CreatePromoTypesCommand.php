<?php

namespace InetStudio\PromoPackage\Promo\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * Class CreatePromoTypesCommand.
 */
class CreatePromoTypesCommand extends Command
{
    /**
     * Имя команды.
     *
     * @var string
     */
    protected $name = 'inetstudio:promo-package:promo:types';

    /**
     * Описание команды.
     *
     * @var string
     */
    protected $description = 'Create classifiers promo type';

    /**
     * Запуск команды.
     *
     * @throws BindingResolutionException
     */
    public function handle(): void
    {
        $groupsService = app()->make('InetStudio\Classifiers\Groups\Contracts\Services\Back\ItemsServiceContract');

        if (DB::table('classifiers_groups')->where('alias', 'promo_types')->count() == 0) {
            $now = Carbon::now()->format('Y-m-d H:m:s');

            $group = $groupsService->getModel()::updateOrCreate([
                'name' => 'Тип промо',
            ], [
                'alias' => 'promo_types',
            ]);

            $ids = [];

            $ids[] = DB::connection('mysql')->table('classifiers_entries')->insertGetId([
                'value' => 'Акция',
                'alias' => 'promo_type_promoaction',
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $ids[] = DB::connection('mysql')->table('classifiers_entries')->insertGetId([
                'value' => 'Скидка',
                'alias' => 'promo_type_sale',
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $ids[] = DB::connection('mysql')->table('classifiers_entries')->insertGetId([
                'value' => 'Промокод',
                'alias' => 'promo_type_promocode',
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $group->entries()->attach($ids);
        }
    }
}
