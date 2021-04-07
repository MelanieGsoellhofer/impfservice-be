<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Impfort extends Model
{
    use HasFactory;

    /*
     * Impfort has many impfungen
     */
    public function impfungen() : HasMany{
        return $this->hasMany(Impfung::class);
    }
}
