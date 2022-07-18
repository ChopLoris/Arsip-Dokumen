<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    public $table = "posts";

    protected $fillable = [
        'nomor_dokumen',
        'pekerjaan',
        'tanggal_pelaksanaan' => 'datetime:d/m/Y',
        'akhir_pelaksanaan' => 'datetime:d/m/Y',
        'description',
        'file_name',
    ];

    public static function autonumber($barang,$primary,$prefix){
        $q=DB::table($barang)->select(DB::raw('MAX(RIGHT('.$primary.',5)) as kd_max'));
        $prx=$prefix;
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = $prx.sprintf("%06s", $tmp);
            }
        }
        else
        {
            $kd = $prx."000001";
        }

        return $kd;
    }


    public function getBeginAttribute($date)
    {
        return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
