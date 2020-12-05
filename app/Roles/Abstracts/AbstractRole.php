<?php

namespace App\Roles\Abstracts;

use Illuminate\Support\Facades\App;


class AbstractRole extends AbstractItem
{
    protected $id;

    protected $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

}
