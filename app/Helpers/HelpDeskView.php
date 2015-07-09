<?php

namespace App\Helpers;


class HelpDeskView
{

    public $department_code;
    public $filter;

    /**
     * @param $department
     * @param $filter
     */
    public function __construct($department_code, $filter)
    {
        $this->department_code = $department_code;
        $this->filter = $filter;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function allViewFilter()
    {
        if ($this->filter === 'all') {
            $view = \App\Ticket::all();
        } elseif ($this->filter === 'unassigned') {
            $view = \App\Ticket::where('user_id', null)->get();
        }

        return $view;

    }


    /**
     * @return mixed
     */
    public function departmentViewFilter()
    {
        if ($this->filter === 'all') {
            $department = \App\Department::where('department_code', $this->department_code)->first();

            $view = $department->tickets()->get();

        } elseif ($this->filter === 'unassigned') {
            $department = \App\Department::where('department_code', $this->department_code)->first();

            $view = $department->tickets()->where('user_id', null)->get();

        }

        return $view;
    }

}