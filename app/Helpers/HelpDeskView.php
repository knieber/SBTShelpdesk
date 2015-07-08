<?php
namespace App\Helpers;

class HelpDeskView
{

    public $department;
    public $filter;

    public function __construct($department, $filter)
    {
        $this->department = $department;
        $this->filter = $filter;
    }

    public function allViewFilter()
    {
        if ($this->filter === 'all') {

            $view = \App\Ticket::all();

        } elseif ($this->filter === 'unassigned') {

            $view = \App\Ticket::where('user_id', null)->get();

        }

        return $view;

    }


    public function departmentViewFilter()
    {
        if ($this->filter === 'all') {

            $view = \App\Ticket::where('department', $this->department)->get();

        } elseif ($this->filter === 'unassigned') {

            $view = \App\Ticket::where('department', $this->department)->where('user_id', null)->get();

        }

        return $view;
    }

}