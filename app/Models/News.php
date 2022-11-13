<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class News extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'image',
        'title',
        'decription',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'news';
}