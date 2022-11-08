<?php

return [
    "name" => "lifecraft/api",
    "drivers" => [
        [
            "class" => '\\'.DriverFileJson::class,
            "options" => [
                "path" => 'resources/',
                "db" => "system"
            ],
            "tables" => [
                "tags", "subjects", "tokens"
            ]
        ]
    ],
    'tables' => [
        "routes" => [
            "namespace" => "repositories",
            "item_class" => "\\extas\\components\\routes\\Route",
            "pk" => "id",
            "code" => [
                "create-before" => '\\' . UUid::class . '::generateFor($item);'
            ]
        ],
        'tags' => [
            "namespace" => "repositories",
            "item_class" => "\\tagnow\\components\\tags\\Tag",
            "pk" => "id",
            "code" => [
                "create-before" => '\\' . UUid::class . '::generateFor($item);'
            ]
        ],
        'subjects' => [
            "namespace" => "repositories",
            "item_class" => "\\tagnow\\components\\subjects\\Subject",
            "pk" => "id",
            "code" => [
                "create-before" => '\\' . UUid::class . '::generateFor($item);'
            ]
        ],
        'tokens' => [
            "namespace" => "repositories",
            "item_class" => "\\tagnow\\components\\tokens\\Token",
            "pk" => "id",
            "code" => [
                "create-before" => '\\' . UUid::class . '::generateFor($item);'
            ]
        ]
    ]
];
