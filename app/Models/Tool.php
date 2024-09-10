<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tool extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'marca',
        'cantidad',
        'precio',
        'estado',
    ];

    public function scopeNames($tools, $query){
        if(trim($query)){
            $tools->where('nombre', 'LIKE','%'.$query.'%')
            ->orWhere('marca', 'LIKE', '%'.$query.'%')
            ->orWhere('cantidad', 'LIKE', '%'.$query.'%');
        }
    }

    public function tools(){
        return $this->belongToMany(Tool::class, 'loan')
                ->withPivot('fecha_prestamo', 'fecha_fin', 'fecha_devolucion', 'estado')
                ->withTimestamps();
    }
}
