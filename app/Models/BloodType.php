<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
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

    public function getBloodTypes(string|null $search = null)
    {
        $bloodType = $this->where(function ($query) use ($search){
            if($search){
                $query->where('name', 'LIKE', "%{$search}%");
            }
        })->paginate(5);

        return $bloodType;
    }
}
