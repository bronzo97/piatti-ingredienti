<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Piatto;


class Piatto extends Model
{
    use HasFactory;

    protected $table = 'piatti';
    protected $primaryKey = 'codice_piatto';
    public $timestamps = true;

    public function ingredienti()
    {
        return $this->belongsToMany(Ingrediente::class, 'piatto_ingrediente', 'id_piatto', 'id_ingrediente', 'codice_piatto', 'codice_ingrediente');
    }

}
