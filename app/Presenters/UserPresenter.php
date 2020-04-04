<?php

namespace App\Presenters;

use App\Presenters\Traits\Personable;

class UserPresenter extends Presenter
{
    use Personable;

    /**
     * Present user role.
     *
     * @return string
     */
    public function title()
    {
        if ($this->model->role == 'admin') {
            return 'Administrator';
        } elseif ($this->model->role == 'staff') {
            return 'Staff';
        } else {
            return 'Volunteer';
        }
    }
}
