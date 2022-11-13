<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Types extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'image',
        'type',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'types';

    public function questions()
    {
        return  $this->hasMany(Questions::class, 'type_id', 'id');
    }
}
