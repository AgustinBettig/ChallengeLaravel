<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentFile extends Model
{
    use HasFactory;

    public function PaymentFileStatus()
    {
        return $this->belongsTo(PaymentFileStatu::class, 'payment_file_status_id');
    }
}
