<?php
namespace tagnow\components\tokens;

use extas\components\Item;
use extas\components\THasCreatedAt;
use extas\components\THasStringId;
use tagnow\interfaces\tokens\IToken;

class Token extends Item implements IToken
{
    use THasStringId;
    use THasCreatedAt;

    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
