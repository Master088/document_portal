<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['created_by', 'last_modified_id', 'name', 'type', 'date_modified'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
