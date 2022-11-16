<?php

use extas\components\UUID;
use extas\interfaces\IItem;
use tagnow\interfaces\tokens\IToken;

/**
 * @var IItem $item
 */

return 
    '\\'. UUID::class . '::setId($item);' . PHP_EOL .
    '$item["' . IToken::FIELD__CREATED_AT . '"] = time();';