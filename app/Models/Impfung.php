<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Impfung extends Model
{
    use HasFactory;

    protected $fillable = [
        'impfdatum', 'startzeitpunkt', 'endzeitpunkt', 'maxTN'
    ];

    /*
     * Imfpung gehört genau zu einem Ort
     */
    public function location() : BelongsTo  {
        return  $this->belongsTo(Impfort::class);
    }

    /*
     * Imfpung has many Users
     */
    public function persons() : HasMany{
        return $this->hasMany(User::class);
    }


}
