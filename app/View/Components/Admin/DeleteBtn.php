<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class DeleteBtn extends Component
{
    public $action;

    public function __construct(string $action)
    {
        $this->action = $action;
    }

    public function render()
    {
        return view('components.admin.delete-btn');
    }
}
