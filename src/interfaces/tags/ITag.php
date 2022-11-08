<?php
namespace tagnow\interfaces\tags;

use extas\interfaces\IHasId;
use extas\interfaces\IHasName;
use extas\interfaces\IItem;
use tagnow\interfaces\IHaveToken;

/**
 * @field.id(description="Tag ID",type=uuid,edges=[36])
 * @field.token(description="Access token",type=uuid,edges=[36])
 * @field.siubject_id(description="Subject ID",type=uuid,edges=[36])
 * @field.name(description="User defined tag",type=string,edges=[1,30])
 */
interface ITag extends IItem, IHasName, IHaveToken, IHasId
{
    public const SUBJECT = 'tagnow.tag';

    public const FIELD__SUBJECT_ID = 'subject_id';

    public function getSubjectId(): string;
    public function setSubjectId(string $id): self;
}
