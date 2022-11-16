<?php
namespace tagnow\components\routes;

use extas\components\routes\descriptions\TRouteHelp;
use extas\components\routes\dispatchers\JsonDispatcher;
use extas\components\routes\TRouteCreate;

/**
 * @api__input_method post
 * @api__output.one \tagnow\interfaces\tokens\IToken
 */
class RouteCreateToken extends JsonDispatcher
{
    // add execute()
    use TRouteCreate;

    //add help()
    use TRouteHelp;

    protected string $repoName = 'tokens';
    protected array $validators = [];
}
