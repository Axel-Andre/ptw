<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class Traject extends Model {
    protected $table = 'trajets';
    
    public function utilisateur() {
        return $this->belongsTo('App\User', 'driver_id');
    }
    public function startingLocation() {
        return $this->belongsTo('App\Location', 'starting_location');
    }
    public function finalLocation() {
        return $this->belongsTo('App\Location', 'final_location');
    }
    
}
?>