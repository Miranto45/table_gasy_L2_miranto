<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriqueStatutTable extends Model
{
    protected $table = 'historique_statuts_tables';
    public $timestamps = false;
    protected $fillable = ['table_id', 'ancien_statut', 'nouveau_statut'];
    protected $casts = ['created_at' => 'datetime'];

    public function table() { return $this->belongsTo(Table::class); }
}
