<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use AzisHapidin\IndoRegion\Traits\DistrictTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * District Model.
 */
class District extends Model
{
    use DistrictTrait;

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'districts';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'regency_id',
    ];

    /**
     * District belongs to Regency.
     */
    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }

    /**
     * District has many villages.
     */
    public function villages(): HasMany
    {
        return $this->hasMany(Village::class);
    }
}
