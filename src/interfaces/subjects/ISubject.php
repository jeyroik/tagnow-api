<?php
namespace tagnow\interfaces\subjects;

use extas\interfaces\IHasId;
use extas\interfaces\IHasName;
use extas\interfaces\IItem;
use tagnow\interfaces\IHaveToken;

/**
 * @field.id(description="Subject ID",type=uuid,edges=[36])
 * @field.token(description="Access token",type=uuid,edges=[36])
 * @field.name(description="User defined subject name",type=string,edges=[1,100])
 */
interface ISubject extends IItem, IHasId, IHaveToken, IHasName
{
    public const SUBJECT = 'tagnow.subject';
}
