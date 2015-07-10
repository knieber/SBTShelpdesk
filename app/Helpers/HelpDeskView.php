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
        } elseif ($this->filter === 'open') {
            $view = \App\Ticket::where('status', $this->filter)->get();
        } elseif ($this->filter === 'closed') {
            $view = \App\Ticket::where('status', $this->filter)->get();
        } elseif ($this->filter === 'started') {
            $view = \App\Ticket::where('activity', $this->filter)->get();
        } elseif ($this->filter === 'not_started') {
            $view = \App\Ticket::where('activity', $this->filter)->get();
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
        } elseif ($this->filter === 'open') {
            $department = \App\Department::where('department_code', $this->department_code)->first();

            $view = $department->tickets()->where('status', $this->filter)->get();
        } elseif ($this->filter === 'close') {
            $department = \App\Department::where('department_code', $this->department_code)->first();

            $view = $department->tickets()->where('status', $this->filter)->get();
        } elseif ($this->filter === 'started') {
            $department = \App\Department::where('department_code', $this->department_code)->first();

            $view = $department->tickets()->where('activity', $this->filter)->get();
        } elseif ($this->filter === 'not_started') {
            $department = \App\Department::where('department_code', $this->department_code)->first();

            $view = $department->tickets()->where('activity', $this->filter)->get();
        }

        return $view;
    }

}