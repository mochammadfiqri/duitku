<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Modelpemasukan extends Model
{
    use Sortable;

    protected $table = 'incomes';
    protected $primarykey = 'id';
    protected $fillable = ['nominal','jenis_pemasukan','keterangan','tanggal'];
    public $timestamps = false;

    public $sortable = [
        'nominal','tanggal'
    ];

    public static function totalIncome()
    {
        return self::sum('nominal');
    }
}
