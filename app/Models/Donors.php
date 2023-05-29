<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donors extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'whatsapp',
        'age',
        'ward',
        'date',
        'blood',
    ];

    public function getDonors(string|null $search = null)
    {
        $donors = $this->where(function ($query) use ($search){
            if($search){
                $query->where('email', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
                $query->orWhere('ward', 'LIKE', "%{$search}%");
                $query->orWhere('blood', 'LIKE', "%{$search}%");
            }
        })->paginate(5);

        return $donors;
    }
}
