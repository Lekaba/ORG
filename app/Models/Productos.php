<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ArchivosProductos()
    {
        return $this->hasMany(ArchivosProductos::class, "producto_id");
    }

    public function categoria()
    {

        return $this->belongsTo(Categorias::class);
    }
}
