<?php
namespace tagnow\components\routes;

use extas\components\exceptions\MissedOrUnknown;
use extas\components\routes\descriptions\TRouteHelp;
use extas\components\routes\dispatchers\JsonDispatcher;
use extas\components\routes\TRouteList;
use GuzzleHttp\Promise\Is;
use tagnow\interfaces\IHaveToken;
use tagnow\interfaces\subjects\ISubject;
use tagnow\interfaces\tags\ITag;

/**
 * @api__input_method get
 * @api__input.token(required=true,validate=\extas\components\routes\validators\VUUID,description="Token ID",type=uuid,edges=[36])
 * @api__input.tags(required=true,validate=0,description="Tags list",type=string,edges=[1,256])
 * 
 * @api__output.all \tagnow\interfaces\subjects\ISubject
 */
class RouteListSubject extends JsonDispatcher
{
    use TRouteList;
    use TRouteHelp;

    protected string $repoName = 'subjects';

    protected function getWhere(): array
    {
        $data = $this->getRequestData();

        if (!isset($data[IHaveToken::FIELD__TOKEN])) {
            throw new MissedOrUnknown(IHaveToken::FIELD__TOKEN);
        }

        if (isset($data['tags'])) {
            $tags = $this->tags()->allAsArray([
                ITag::FIELD__TOKEN => $data[IHaveToken::FIELD__TOKEN],
                ITag::FIELD__NAME => $data['tags']
            ]);

            if (!empty($tags)) {
                return [
                    ISubject::FIELD__ID => array_column($tags, ITag::FIELD__SUBJECT_ID)
                ];
            } else {
                return [
                    ISubject::FIELD__ID => 'unknown'
                ];
            }
        }

        return $data;
    }
}
