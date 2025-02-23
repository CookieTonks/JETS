<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;

class PrecioMaterial extends Model
{
    use HasFactory;

    protected $table = 'precios_materiales';

    protected $fillable = ['material_id', 'proveedor_id', 'precio_unitario'];

    public function material()
    {
        return $this->belongsTo(models\materiales::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(models\proveedor::class);
    }
}
