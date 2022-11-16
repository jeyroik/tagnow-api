<?php
namespace tagnow\components\routes;

use extas\components\exceptions\MissedOrUnknown;
use extas\components\routes\descriptions\TRouteHelp;
use extas\components\routes\dispatchers\JsonDispatcher;
use extas\components\routes\TRouteView;
use tagnow\interfaces\subjects\ISubject;

/**
 * @api__input_method put
 * @api__input.token(required=true,validate=\extas\components\routes\validators\VUUID,description="Token ID",type=uuid,edges=[36])
 * @api__input.id(required=true,validate=\tagnow\components\validators\VUUID,description="Subject ID",type=uuid,edges=[36])
 * 
 * @api__output.one \tagnow\interfaces\subjects\ISubject
 */
class RouteViewSubject extends JsonDispatcher
{
    use TRouteView;
    use TRouteHelp;

    protected string $repoName = 'subjects';

    protected function getWhere(): array
    {
        $data = $this->getRequestData();

        if (!isset($data[ISubject::FIELD__TOKEN])) {
            throw new MissedOrUnknown(ISubject::FIELD__TOKEN);
        }

        if (!isset($data[ISubject::FIELD__ID])) {
            throw new MissedOrUnknown(ISubject::FIELD__ID);
        }

        return $data;
    }
}
