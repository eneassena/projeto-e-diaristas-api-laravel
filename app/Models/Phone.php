<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    /**
     * Define o nome da entidade de banco de dados
     * @var string
     */
    protected $table = "phone";

    protected $fillable = [
        'nome',
        'user_id'
    ];
}
