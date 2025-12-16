<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pisua extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional si sigues la convención 'pisuas')
    protected $table = 'pisua';

    /**
     * Los atributos que se pueden asignar masivamente.
     * Es crucial incluir aquí los campos de control de sincronización.
     */
    protected $fillable = [
        'izena',        // Nombre del piso
        'kodigoa',      // Código del piso
        'odoo_id',      // ID que devuelve Odoo al crear (null si no se ha enviado)
        'synced',       // Booleano: true si ya está en Odoo
        'sync_error',    // Para guardar el mensaje de error si el Job falla
    ];

    /**
     * Conversión de tipos automática.
     * Ayuda a tratar 'synced' como true/false en lugar de 1/0.
     */
    protected $casts = [
        'synced' => 'boolean',
        'odoo_id' => 'integer',
    ];

    public function scopePending($query)
    {
        return $query->where('synced', false);
    }

}