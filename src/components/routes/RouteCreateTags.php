<?php
namespace tagnow\components\routes;

use extas\components\routes\descriptions\TRouteHelp;
use extas\components\routes\dispatchers\JsonDispatcher;
use extas\components\routes\TRouteCreate;
use extas\interfaces\repositories\IRepository;
use tagnow\interfaces\IHaveToken;
use tagnow\interfaces\subjects\ISubject;
use tagnow\interfaces\tags\ITag;
use tagnow\interfaces\tokens\IToken;

/**
 * @method IRepository tokens()
 * @method IRepository subjects()
 * 
 * @api__input_method post
 * @api__input.token(required=true,validate=\extas\components\routes\validators\VUUID,description="Token ID",type=uuid,edges=[36])v
 * @api__input.subject_id(required=true,validate=\tagnow\components\validators\VUUID,description="Subject ID",type=uuid,edges=[36])
 * @api__input.names(required=true,validate=0,description="Tags delimited with comma",type=string,edges=[1,1024])
 * @api__output.one \tagnow\interfaces\subjects\ISubject 
 */
class RouteCreateTags extends JsonDispatcher
{
    use TRouteCreate;
    use TRouteHelp;

    protected string $repoName = 'tags';
    protected array $validators = ['isTokenExist', 'isSubjectExist'];

    protected function isTokenExist(): bool
    {
        $exist = $this->tokens()->one([
            IToken::FIELD__ID => $this->getRequestParameter(IHaveToken::FIELD__TOKEN, '')
        ]);

        return !empty($exist);
    }

    protected function isSubjectExist(): bool
    {
        $exist = $this->subjects()->one([
            ISubject::FIELD__ID => $this->getRequestParameter(ITag::FIELD__SUBJECT_ID, '')
        ]);

        return !empty($exist);
    }
}
