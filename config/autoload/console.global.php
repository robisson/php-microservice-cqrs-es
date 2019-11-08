<?php // config/autoload/console.global.php

return [
    'dependencies' => [
        'invokables' => [
        ],

        'factories' => [
          Projects\Application\Console\ConsoleGateway::class => function () {
              return new Projects\Application\Console\ConsoleGateway;
          }
        ],
    ],

    'console' => [
        'commands' => [
            Projects\Application\Console\ConsoleGateway::class,
        ],
    ],
];
