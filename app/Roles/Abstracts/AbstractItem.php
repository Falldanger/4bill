<?php

namespace App\Roles\Abstracts;

use App\Roles\Contracts\ItemContract;

abstract class AbstractItem implements ItemContract
{
    protected $name;
    protected $id;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
}
