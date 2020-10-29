<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function profileImage()
    {
        $imagePath = ($this->img) ?  $this->img : 'profile/0ob9hF4Nz8rlbY5U9VoKoEgubMgBjQcP9KwN2LdD.png';
        return '/storage/' . $imagePath ;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}