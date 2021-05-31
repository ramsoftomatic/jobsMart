<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	public $timestamps = false;

    protected $fillable = [
       'company','industry', 'job_title', 'job_description', 'requirement', 'salary_from', 'salary_to', 'salary_type', 'job_location_state', 'job_location_city', 'experience_from', 'experience_to', 'experience_type', 'status', 'vacancy', 'create_date', 'job_active_date', 'job_expiry_date', 'active_date', 'inactive_date'
    ];

	protected $hidden = [
    ];
}
