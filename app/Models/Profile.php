<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    public function getProfiles(string|null $search = null)
    {
        $profiles = $this->where(function ($query) use ($search){
            if($search){
                $query->where('name', 'LIKE', "%{$search}%");
            }
        })->paginate(5);

        return $profiles;
    }
}
