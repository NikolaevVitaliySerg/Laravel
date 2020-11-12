<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table='tasks';

    protected $fillable = [
        'list_id',
        'name',
        'description',
        'urgency',
        'state'
    ];

    public function list()
    {
        return $this->belongsTo('TodoList');
    }
}