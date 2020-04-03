<?php

return [
    [
        'key' => 'sales.carriers.flatshipping',
        'name' => 'flatship::app.flat_ship',
        'sort' => 3,
        'fields' => [
            [
                'name' => 'title',
                'title' => 'admin::app.admin.system.title',
                'type' => 'text',
                'validation' => 'required',
                'channel_based' => true,
                'locale_based' => true
            ], [
                'name' => 'description',
                'title' => 'admin::app.admin.system.description',
                'type' => 'textarea',
                'channel_based' => true,
                'locale_based' => false
            ], [
                'name' => 'default_rate',
                'title' => 'admin::app.admin.system.rate',
                'type' => 'text',
                'channel_based' => true,
                'locale_based' => false
            ], [
                'name' => 'type',
                'title' => 'admin::app.admin.system.type',
                'type' => 'select',
                'options' => [
                    [
                        'title' => 'Per Unit',
                        'value' => 'per_unit'
                    ], [
                        'title' => 'Per Order',
                        'value' => 'per_order'
                    ]
                ],
                'validation' => 'required'
            ], [
                'name' => 'active',
                'title' => 'admin::app.admin.system.status',
                'type' => 'select',
                'options' => [
                    [
                        'title' => 'Active',
                        'value' => true
                    ], [
                        'title' => 'Inactive',
                        'value' => false
                    ]
                ],
                'validation' => 'required',
                'channel_based' => false,
                'locale_based' => true
            ]
        ]
    ]
];