<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function getWards(string|null $search = null)
    {
        $wards = $this->where(function ($query) use ($search){
            if($search){
                $query->where('name', 'LIKE', "%{$search}%");
            }
        })->paginate(5);

        return $wards;
    }

}
