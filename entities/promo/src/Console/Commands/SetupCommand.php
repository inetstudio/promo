<?php

namespace InetStudio\PromoPackage\Promo\Console\Commands;

use InetStudio\AdminPanel\Base\Console\Commands\BaseSetupCommand;

/**
 * Class SetupCommand.
 */
class SetupCommand extends BaseSetupCommand
{
    /**
     * Имя команды.
     *
     * @var string
     */
    protected $name = 'inetstudio:promo-package:promo:setup';

    /**
     * Описание команды.
     *
     * @var string
     */
    protected $description = 'Setup promo package';

    /**
     * Инициализация команд.
     */
    protected function initCommands(): void
    {
        $this->calls = [
            [
                'type' => 'artisan',
                'description' => 'Publish migrations',
                'command' => 'vendor:publish',
                'params' => [
                    '--provider' => 'InetStudio\PromoPackage\Promo\Providers\ServiceProvider',
                    '--tag' => 'migrations',
                ],
            ],
            [
                'type' => 'artisan',
                'description' => 'Migration',
                'command' => 'migrate',
            ],
            [
                'type' => 'artisan',
                'description' => 'Create folders',
                'command' => 'inetstudio:promo-package:promo:folders',
            ],
            [
                'type' => 'artisan',
                'description' => 'Create promo types',
                'command' => 'inetstudio:promo-package:promo:types',
            ],
            [
                'type' => 'artisan',
                'description' => 'Publish config',
                'command' => 'vendor:publish',
                'params' => [
                    '--provider' => 'InetStudio\PromoPackage\Promo\Providers\ServiceProvider',
                    '--tag' => 'config',
                ],
            ],
        ];
    }
}
