<?php
namespace tagnow\components\tags;

use extas\components\Item;
use extas\components\THasId;
use extas\components\THasName;
use tagnow\components\THasToken;
use tagnow\interfaces\tags\ITag;

class Tag extends Item implements ITag
{
    use THasId;
    use THasToken;
    use THasName;

    public function getSubjectId(): string
    {
        return $this->config[static::FIELD__SUBJECT_ID] ?? '';
    }

    public function setSubjectId(string $id): ITag
    {
        $this->config[static::FIELD__SUBJECT_ID] = $id;

        return $this;
    }

    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
