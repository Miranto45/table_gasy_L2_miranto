<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['client_id', 'table_id', 'date_reservation', 'nb_personnes', 'notes'];
    protected $casts = ['date_reservation' => 'datetime'];

    public function client() { return $this->belongsTo(Client::class); }
    public function table()  { return $this->belongsTo(Table::class); }
}
