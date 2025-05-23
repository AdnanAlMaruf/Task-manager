<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'priority','show_on_client'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
