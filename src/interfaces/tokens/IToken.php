<?php
namespace tagnow\interfaces\tokens;

use extas\interfaces\IHasCreatedAt;
use extas\interfaces\IHaveUUID;
use extas\interfaces\IItem;

/**
 * @field.id(description="Token ID",type=uuid,edges=[36])
 * @field.created_at(description="Creation date",type=int,edges=[1,36])
 */
interface IToken extends IItem, IHaveUUID, IHasCreatedAt
{
    public const SUBJECT = 'tagnow.token';
}
