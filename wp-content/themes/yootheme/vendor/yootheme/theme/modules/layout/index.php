<?php

return [

    'name' => 'yootheme/layout',

    'events' => [

        'theme.init' => function ($theme) {

            // set defaults
            $theme['@config']->merge($this['@config']->get('defaults'), true);
        },

        'theme.admin' => function ($theme) {

            // add script
            $this['scripts']->add('customizer-layout', "{$this->path}/app/layout.min.js", 'customizer');
        }

    ],

    'config' => [

        'section' => [
            'title' => 'Layout',
            'priority' => 10
        ],

        'fields' => [],

        'defaults' => [

            'menu' => [

                'items' => [],
                'positions' => [],

            ]

        ]

    ]

];
