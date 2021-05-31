<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class resume_info extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'dob', 'mobile', 'cur_loc', 'pref_loc', 'gender','skills','total_exp', 'cur_salary' ,'cur_desig' ,'cur_area', 'cur_industry', 'cur_company', 'cur_company_exp', 'notice_period', 'high_edu_level', 'high_edu_stream', 'high_edu_institute', 'passing_year', 'high_edu_course_type', 'note' ,'resume','created_at','updated_at','remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
