<?php

namespace App\Concerns;

use App\Customer;

trait CreatesCustomer
{
    /**
     * Creates a new customer entry.
     *
     * @param  array  $data
     * @return int
     */
    protected function createsCustomer(array $data)
    {
        return ['customer_id' => Customer::create($data)->id];
    }
}
