<?php
namespace tagnow\interfaces;

interface IHaveToken
{
    public const FIELD__TOKEN = 'token';

    public function getToken(): string;
    public function setToken(string $token): self;
}