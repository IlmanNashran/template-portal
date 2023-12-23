<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function technician()
    {
        return $this->belongsTo(User::class,'technician_id','id');
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class,'supervisor_id','supervisor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getStatusBadgeClass()
    {
        switch ($this->status) {
            case 'Selesai':
                return 'badge-primary';
            case 'Baharu':
            case 'Dijawab':
                return 'badge-success';
            case 'KIV':
                return 'badge-danger';
            default:
                return 'badge-secondary';
        }
    }
}
