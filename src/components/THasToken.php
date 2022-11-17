<?php
namespace tagnow\components;

use tagnow\interfaces\IHaveToken;

/**
 * @property array $config
 */
trait THasToken
{
    public function getToken(): string
    {
        return $this->config[IHaveToken::FIELD__TOKEN] ?? '';
    }

    public function setToken(string $token): self
    {
        $this->config[IHaveToken::FIELD__TOKEN] = $token;

        return $this;
    }
}
