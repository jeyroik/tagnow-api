<?php
namespace tagnow\components\tokens;

use extas\components\Item;
use extas\components\THasCreatedAt;
use extas\components\THasId;
use tagnow\interfaces\tokens\IToken;

class Token extends Item implements IToken
{
    use THasId;
    use THasCreatedAt;

    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
