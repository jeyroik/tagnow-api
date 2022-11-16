<?php

use extas\components\plugins\PluginInputValidators;
use extas\components\plugins\PluginOutputValidators;
use extas\components\plugins\PluginRoutes;
use extas\components\repositories\drivers\DriverFileJson;
use extas\components\UUID;
use extas\interfaces\stages\IStageApiAppInit;
use extas\interfaces\stages\IStageApiListData;
use extas\interfaces\stages\IStageApiUpdateData;
use extas\interfaces\stages\IStageApiViewData;
use extas\interfaces\stages\IStageInputDescription;
use extas\interfaces\stages\IStageOutputDescription;
use tagnow\components\plugins\PluginSubjectsTags;
use tagnow\components\plugins\PluginSubjectTags;
use tagnow\components\plugins\PluginUpdateSubject;

return [
    "name" => "tagnow/api",
    "drivers" => [
        [
            "class" => '\\'.DriverFileJson::class,
            "options" => [
                "path" => 'resources/',
                "db" => "system"
            ],
            "tables" => [
                "tags", "subjects", "tokens", "routes", "plugins", "extensions"
            ]
        ]
    ],
    'tables' => [
        'tags' => [
            "namespace" => "repositories",
            "item_class" => "\\tagnow\\components\\tags\\Tag",
            "pk" => "id",
            "code" => [
                "create-before" => '\\' . UUID::class . '::setId($item);'
            ]
        ],
        'subjects' => [
            "namespace" => "repositories",
            "item_class" => "\\tagnow\\components\\subjects\\Subject",
            "pk" => "id",
            "code" => [
                "create-before" => '\\' . UUID::class . '::setId($item);'
            ]
        ],
        'tokens' => [
            "namespace" => "repositories",
            "item_class" => "\\tagnow\\components\\tokens\\Token",
            "pk" => "id",
            "code" => [
                "create-before" => __DIR__ . '/resources/token-before-create.php'
            ]
        ]
    ],
    "plugins" => [
        [
            "class" => PluginRoutes::class,
            "stage" => IStageApiAppInit::NAME
        ],
        [
            "class" => PluginInputValidators::class,
            "stage" => IStageInputDescription::NAME
        ],
        [
            "class" => PluginOutputValidators::class,
            "stage" => IStageOutputDescription::NAME
        ],
        [
            "class" => PluginSubjectTags::class,
            "stage" => IStageApiViewData::NAME . '.subjects'
        ],
        [
            "class" => PluginSubjectsTags::class,
            "stage" => IStageApiListData::NAME . '.subjects'
        ],
        [
            "class" => PluginUpdateSubject::class,
            "stage" => IStageApiUpdateData::NAME . '.subjects'
        ],
    ]
];
