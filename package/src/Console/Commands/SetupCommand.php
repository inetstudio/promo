<?php

namespace InetStudio\PromoPackage\Console\Commands;

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
    protected $name = 'inetstudio:promo-package:setup';

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
                'description' => 'Promo setup',
                'command' => 'inetstudio:promo-package:promo:setup',
            ],
        ];
    }
}
