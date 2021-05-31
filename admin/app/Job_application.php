<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_application extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'job_id', 'resume_id', 'create_date'
    ];

	protected $hidden = [
    ];
}
