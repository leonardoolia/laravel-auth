<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getCreatedAt()
    {
        return Carbon::create($this->created_at)->format('d-m-Y H:i:s');
    }

    public function getUpdatedAt()
    {
        return Carbon::create($this->updated_at)->format('d-m-Y H:i:s');
    }
}
