<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;
    protected $table = 'pembeli';
    protected $guarded = ['id'];


    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function($query, $search){
            return $query->where('nama', 'like', '%' . $search . '%')
                         ->orWhere('no_telepon', 'like', '%' . $search . '%');
        });
    }

    public function getRouteKeyName()
    {
        return 'kode_pembeli';
    }


}
