<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Intervention extends Model
{
    protected $fillable = ['date', 'type', 'commentaire', 'device_id'];

    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }
}
