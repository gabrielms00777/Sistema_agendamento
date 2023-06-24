<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'name',
        'time',
        'value',
        'category_id',
        'description',
        'image',
    ];

    protected $casts = [
        'status' => 'boolean',
        'value' => 'double',
    ];

    public function scheduling(): HasMany
    {
        return $this->hasMany(Scheduling::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function professionais(): BelongsToMany
    {
        return $this->belongsToMany(Professional::class);
    }


}
