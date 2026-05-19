<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Memberikan izin pada Laravel agar kolom 'name' boleh diisi
    // melalui Request form (Mass Assignment)
    protected $fillable = ['name'];

    // Relasi One-to-Many: 1 Kategori memiliki banyak Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
