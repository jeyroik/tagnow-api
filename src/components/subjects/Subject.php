<?php
namespace tagnow\components\subjects;

use extas\components\Item;
use extas\components\THasName;
use extas\components\THasStringId;
use tagnow\components\THasToken;
use tagnow\interfaces\subjects\ISubject;

class Subject extends Item implements ISubject
{
    use THasStringId;
    use THasToken;
    use THasName;

    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
