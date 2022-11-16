<?php

use extas\interfaces\routes\IRoute;
use tagnow\components\routes\RouteCreateSubject;
use tagnow\components\routes\RouteCreateToken;
use tagnow\components\routes\RouteListSubject;
use tagnow\components\routes\RouteUpdateSubject;
use tagnow\components\routes\RouteViewSubject;
use tagnow\components\routes\RouteViewToken;

return [
    'routes' => [
        [
            IRoute::FIELD__NAME => '/v1/token/{token}',
            IRoute::FIELD__TITLE => 'Детальная информация по токену',
            IRoute::FIELD__DESCRIPTION => 'Получение детальной информации по токену',
            IRoute::FIELD__METHOD => IRoute::METHOD__READ,
            IRoute::FIELD__CLASS => '\\'. RouteViewToken::class
        ],
        [
            IRoute::FIELD__NAME => '/v1/token/',
            IRoute::FIELD__TITLE => 'Создание токена',
            IRoute::FIELD__DESCRIPTION => 'Создание токена',
            IRoute::FIELD__METHOD => IRoute::METHOD__CREATE,
            IRoute::FIELD__CLASS => '\\'. RouteCreateToken::class
        ],
        [
            IRoute::FIELD__NAME => '/v1/subject/{token}',
            IRoute::FIELD__TITLE => 'Создание субъекта',
            IRoute::FIELD__DESCRIPTION => 'Создание субъекта',
            IRoute::FIELD__METHOD => IRoute::METHOD__CREATE,
            IRoute::FIELD__CLASS => '\\'. RouteCreateSubject::class
        ],
        [
            IRoute::FIELD__NAME => '/v1/subject/{token}/{id}',
            IRoute::FIELD__TITLE => 'Информация по субъекту',
            IRoute::FIELD__DESCRIPTION => 'Детальная информация по субъекту',
            IRoute::FIELD__METHOD => IRoute::METHOD__READ,
            IRoute::FIELD__CLASS => '\\'. RouteViewSubject::class
        ],
        [
            IRoute::FIELD__NAME => '/v1/subject/{token}',
            IRoute::FIELD__TITLE => 'Обновление субъекта',
            IRoute::FIELD__DESCRIPTION => 'Изменение набора тегов для субъекта',
            IRoute::FIELD__METHOD => IRoute::METHOD__UPDATE,
            IRoute::FIELD__CLASS => '\\'. RouteUpdateSubject::class
        ],
        [
            IRoute::FIELD__NAME => '/v1/subject/{token}',
            IRoute::FIELD__TITLE => 'Поиск субъекта',
            IRoute::FIELD__DESCRIPTION => 'Поиск субъекта по тегам',
            IRoute::FIELD__METHOD => IRoute::METHOD__READ,
            IRoute::FIELD__CLASS => '\\'. RouteListSubject::class
        ]
    ]
];