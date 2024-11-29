<?php

require __DIR__ . '/vendor/autoload.php';

// Inicializar Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';

// Inicializar el kernel HTTP (necesario en Laravel 11)
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\Hash;

// Generar el hash para la contraseña
echo Hash::make('Tarea7') . PHP_EOL;
