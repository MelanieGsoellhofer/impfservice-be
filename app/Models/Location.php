<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'adress', 'description', 'zipcode'
    ];

    /*
     * Location has many impfungen
     */
    public function vaccinations() : BelongsToMany{
        return $this->belongsToMany(Vaccination::class);
    }
}
