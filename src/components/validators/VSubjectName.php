<?php
namespace tagnow\components\validators;

use extas\components\routes\validators\Validator;
use extas\interfaces\repositories\IRepository;
use tagnow\interfaces\subjects\ISubject;

/**
 * @method IRepository subjects()
 */
class VSubjectName extends Validator
{
    protected string $type = 'string';
    protected bool $canBeEmpty = false;

    protected function isValidData(): bool
    {
        $exist = $this->subjects()->one([
            ISubject::FIELD__NAME => $this->data
        ]);

        return empty($exist);
    }
}
