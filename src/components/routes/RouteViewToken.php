<?php
namespace tagnow\components\routes;

use extas\components\exceptions\MissedOrUnknown;
use extas\components\routes\descriptions\TRouteHelp;
use extas\components\routes\dispatchers\JsonDispatcher;
use extas\components\routes\TRouteView;
use tagnow\interfaces\IHaveToken;
use tagnow\interfaces\tokens\IToken;

/**
 * @api__input_method get
 * @api__input.token(required=true,validate=\extas\components\routes\validators\VUUID,description="Token ID",type=uuid,edges=[36])
 * 
 * @api__output.one \tagnow\interfaces\tokens\IToken
 */
class RouteViewToken extends JsonDispatcher
{
    use TRouteView;
    use TRouteHelp;

    protected string $repoName = 'tokens';

    protected function getWhere(): array
    {
        $data = $this->args;

        if (!isset($data[IHaveToken::FIELD__TOKEN])) {
            throw new MissedOrUnknown(IHaveToken::FIELD__TOKEN);
        }

        return [IToken::FIELD__ID => $data[IHaveToken::FIELD__TOKEN]];
    }
}
