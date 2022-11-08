<?php
namespace tagnow\components\subjects;

use extas\components\Item;
use extas\components\THasId;
use extas\components\THasName;
use tagnow\components\THasToken;
use tagnow\interfaces\subjects\ISubject;

class Subject extends Item implements ISubject
{
    use THasId;
    use THasToken;
    use THasName;

    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
