<?php

return [

    /*
     * Расширение файла конфигурации app/config/filesystems.php
     * добавляет локальные диски для хранения изображений страниц
     */

    'promo' => [
        'driver' => 'local',
        'root' => storage_path('app/public/promo'),
        'url' => env('APP_URL').'/storage/promo',
        'visibility' => 'public',
    ],

];
