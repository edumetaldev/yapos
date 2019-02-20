<?php
  return [
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => \Cobierto\Acl\Models\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],
    'guards' => ['web' => 'web']
  ];
