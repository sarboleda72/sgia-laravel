<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Loan extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fecha_prestamo',
        'fecha_fin',
        'fecha_devolucion',
        'estado',
    ];

    public function scopeNames($loans, $query){
        if(trim($query)){
            if($query == 'Prestado'){
                $query = true;
            }elseif($query == 'Devuelto'){
                $query = false;
            }
            $loans->where('fecha_prestamo', 'LIKE','%'.$query.'%')
            ->orWhere('fecha_fin', 'LIKE', '%'.$query.'%')
            ->orWhere('fecha_devolucion', 'LIKE', '%'.$query.'%')
            ->orWhere('estado', 'LIKE', $query);
        }
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tool(){
        return $this->belongsTo(Tool::class);
    }
}
