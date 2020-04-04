<?php

namespace App\Presenters\Traits;

trait Personable
{
    /**
     * Present members' full name.
     *
     * @return string
     */
    public function fullname()
    {
        return sprintf(
            '%s %s',
            $this->model->first_name,
            $this->model->last_name
        );
    }

    /**
     * Present complete member address.
     *
     * @return string
     */
    public function address()
    {
        if (is_null($this->model->street)) {
            return 'No address provided.';
        }

        return sprintf(
            '%s, %s, %s, %s',
            $this->model->street,
            $this->model->city,
            $this->model->region,
            $this->model->country
        );
    }
}
