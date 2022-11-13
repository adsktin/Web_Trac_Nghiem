<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class Questions extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'questcontent',
        'score',
        'type_id',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'questions';

    public function answers()
    {
        return  $this->hasMany(Answers::class, 'question_id', 'id');
    }
    public function types()
    {
        return  $this->belongsTo(Types::class, 'id');
    }
}