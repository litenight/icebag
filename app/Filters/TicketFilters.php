<?php

namespace App\Filters;

class TicketFilters extends Filter
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['status', 'customer'];

    /**
     * Filter the query by a given status.
     *
     * @param  string $state
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function status($state)
    {
        return $this->builder->where('status', $state);
    }

    /**
     * Filter the query by a given customer id.
     *
     * @param  int $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function customer($id)
    {
        return $this->builder->where('customer_id', $id);
    }
}
