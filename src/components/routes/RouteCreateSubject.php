<?php
namespace tagnow\components\routes;

use extas\components\routes\descriptions\TRouteHelp;
use extas\components\routes\dispatchers\JsonDispatcher;
use extas\components\routes\TRouteCreate;

/**
 * @api__input_method post
 * @api__input.token(required=true,validate=\extas\components\routes\validators\VUUID,description="Token ID",type=uuid,edges=[36])v
 * @api__input.name(required=true,validate=\tagnow\components\validators\VSubjectName,description="Subject",type=string,edges=[1,40])
 * @api__output.one \tagnow\interfaces\subjects\ISubject 
 */
class RouteCreateSubject extends JsonDispatcher
{
    use TRouteCreate;
    use TRouteHelp;

    protected string $repoName = 'subjects';
    protected array $validators = [];
}
