<?php

namespace App\Presenters;

use App\Presenters\Traits\Personable;

class FollowupPresenter extends Presenter
{
    use Personable;

    /**
     * Present new visitor status.
     *
     * @return array
     */
    public function status()
    {
        switch ($this->model->status) {
            case 'first_visit':
                return ['class' => 'text-gray-800 bg-gray-200', 'text' => 'First visit'];
            case 'week_1':
                return ['class' => 'text-yellow-800 bg-yellow-200', 'text' => 'First week'];
            case 'week_2':
                return ['class' => 'text-teal-800 bg-teal-200', 'text' => 'Second week'];
            case 'week_3':
                return ['class' => 'text-indigo-800 bg-indigo-200', 'text' => 'Third week'];
            case 'week_4':
                return ['class' => 'text-green-800 bg-green-200', 'text' => 'Fourth week'];
            case 'left':
                return ['class' => 'text-red-800 bg-red-200', 'text' => 'Left'];
        }
    }
}
