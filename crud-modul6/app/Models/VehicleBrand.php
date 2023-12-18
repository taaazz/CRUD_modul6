<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBrand extends Model
{
    use HasFactory;

    protected $fillable = [
        "brand",
        "tahun_produksi",
        "harga_sewa",
        "lama_sewa",
        "category_id",
        "customer_id"
    ];


    // Method untuk menampilkan semua data dengan kategori
    public static function findAllWithCategory()
    {
        return self::Join('categories', 'vehicle_brands.category_id', '=', 'categories.id')
            ->select('vehicle_brands.*', 'categories.category_name',)
            ->get();
    }

    // Method untuk mencari berdasarkan category_id
    public static function findByCategoryId($category_id)
    {
        return self::Join('categories', 'vehicle_brands.category_id', '=', 'categories.id')
            ->select('vehicle_brands.brand', 'vehicle_brands.category_id', 'categories.category_name')
            ->where('vehicle_brands.category_id', $category_id)
            ->get();
    }
}
