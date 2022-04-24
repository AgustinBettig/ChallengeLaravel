<?php

namespace App\Models;

use Faker\Provider\ar_EG\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function organizationAccountName()
    {
        return $this->belongsTo(Organization::class, 'gsa_organization_id');
    }

    public function organizationIssuerName()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function voucherState()
    {
        return $this->belongsTo(VoucherStatu::class, 'voucher_status_id');
    }

    public function paymentFile()
    {
        return $this->belongsTo(PaymentFile::class, 'payment_file_id');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getPastDueAttribute()
    {
        if($this->past_due == 1) {
          return 'Past Due';
        }else {
          return '';
        }
    }

    public function getPaymentFileAttribute()
    {
        if($this->payment_file_id != null) {
            return $this->payment_file_id;
        }else{
            return '-';
        }
    }

    public function getBookingNumberAttribute() // Confirmation field
    {
        return $this->booking->number;
    }

    public function getUserNameAttribute()
    {
        $firstName = $this->user->name;
        $lasttName = $this->user->last_name;
        $user = $firstName." ".$lasttName;
        return $user;
    }

}
