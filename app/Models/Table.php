<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = ['zone_id', 'numero', 'capacite', 'statut', 'pos_x', 'pos_y'];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function historiques()
    {
        return $this->hasMany(HistoriqueStatutTable::class);
    }
}
