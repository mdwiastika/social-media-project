<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use AzisHapidin\IndoRegion\Traits\ProvinceTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Province Model.
 */
class Province extends Model
{
    use ProvinceTrait;

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'provinces';

    /**
     * Province has many regencies.
     */
    public function regencies(): HasMany
    {
        return $this->hasMany(Regency::class);
    }
}
