<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Story extends Model
{
    use HasFactory, Prunable, SoftDeletes;

    protected $guarded = [];

    public function prunable()
    {
        return static::where('created_at', '<=', now()->subDay());
    }

    public function pruning()
    {
        return Storage::disk('public')->delete($this->image);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
