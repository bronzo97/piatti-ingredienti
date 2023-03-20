<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Piatto;


class Ingrediente extends Model
{
    use HasFactory;

    protected $table = 'ingredienti';
    protected $primaryKey = 'codice_ingrediente';
    public $timestamps = true;

    public function piatti()
    {
        return $this->belongsToMany(Piatto::class, 'piatto_ingrediente', 'id_ingrediente', 'id_piatto', 'codice_ingrediente', 'codice_piatto');
    }

}
