<?php

namespace App\Roles\Contracts;

interface ItemContract
{
    public function getId(): int;

    public function getName(): string;
}
