<?php

$classes = [
    \App\Models\User::class,
];

$mapping = [];

foreach ($classes as $class) {
    $model = new $class;

    if ($model instanceof \Illuminate\Database\Eloquent\Model) {
        $mapping[$model->getTable()] = $class;
    }
}

return $mapping;
