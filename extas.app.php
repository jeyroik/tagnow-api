<?php

return [
    'routes' => [
        [
            IRoute::FIELD__NAME => '/v1/token/{id}',
            IRoute::FIELD__TITLE => 'Создание шаблона героя',
            IRoute::FIELD__DESCRIPTION => 'Создание шаблона героя',
            IRoute::FIELD__METHOD => IRoute::METHOD__READ,
            IRoute::FIELD__CLASS => '\\'. RouteCreateHeroSample::class
        ],
        [
            IRoute::FIELD__NAME => '/v1/token/',
            IRoute::FIELD__TITLE => 'Создание шаблона героя',
            IRoute::FIELD__DESCRIPTION => 'Создание шаблона героя',
            IRoute::FIELD__METHOD => IRoute::METHOD__CREATE,
            IRoute::FIELD__CLASS => '\\'. RouteCreateHeroSample::class
        ],
        [
            IRoute::FIELD__NAME => '/v1/subject/{token}',
            IRoute::FIELD__TITLE => 'Создание субъекта',
            IRoute::FIELD__DESCRIPTION => 'Создание субъекта',
            IRoute::FIELD__METHOD => IRoute::METHOD__CREATE,
            IRoute::FIELD__CLASS => '\\'. RouteCreateHeroSample::class
        ],
        [
            IRoute::FIELD__NAME => '/v1/subject/{subject_id}/{token}/',
            IRoute::FIELD__TITLE => 'Информация по субъекту',
            IRoute::FIELD__DESCRIPTION => 'Детальная информация по субъекту',
            IRoute::FIELD__METHOD => IRoute::METHOD__READ,
            IRoute::FIELD__CLASS => '\\'. RouteCreateHeroSample::class
        ],
        [
            IRoute::FIELD__NAME => '/v1/subject/{subject_id}/{token}',
            IRoute::FIELD__TITLE => 'Обновление субъекта',
            IRoute::FIELD__DESCRIPTION => 'Изменение набора тегов для субъекта',
            IRoute::FIELD__METHOD => IRoute::METHOD__UPDATE,
            IRoute::FIELD__CLASS => '\\'. RouteCreateHeroSample::class
        ],
        [
            IRoute::FIELD__NAME => '/v1/subject/{token}/{tags}',
            IRoute::FIELD__TITLE => 'Поиск субъекта',
            IRoute::FIELD__DESCRIPTION => 'Поиск субъекта по тегам',
            IRoute::FIELD__METHOD => IRoute::METHOD__READ,
            IRoute::FIELD__CLASS => '\\'. RouteCreateHeroSample::class
        ]
    ]
];