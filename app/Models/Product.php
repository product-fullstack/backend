<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model

{
    use HasApiTokens, HasFactory, Notifiable;

   
    protected $table = 'products';
     protected $fillable = [
        'nama',
        'kategori',
        'qty',
        'harga',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function insert($data)
    {
       return DB::table('products')->insert($data);
    } 
    public function upd_produk($id,$data)
    {
        return DB::table('products')
        ->where('id',$id)
        ->update($data);
    }
}
