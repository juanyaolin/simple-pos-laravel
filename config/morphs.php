<?php

$morphs = [];
$mapping = [
    'App\Models' => '\app\Models',
];

foreach ($mapping as $namespace => $path) {
    foreach (glob(base_path($path . '\*.php')) as $fileName) {
        $class = str_replace(
            [base_path(), $path, '.php'],
            ['', $namespace, ''],
            $fileName,
        );

        $morphs[(new $class())->getTable()] = $class;
    }
}

return $morphs;
