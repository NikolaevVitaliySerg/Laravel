<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;
    protected $table='lists';
    //protected $primaryKey = 'list_id';
    protected $fillable = [
        //'doing_id',
        'name',
    ];
    public function tasks(){
        return $this->hasMany('Task');
    }
}