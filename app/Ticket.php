<?php

namespace App;

use App\User;
use App\Traits\HasUid;
use App\Traits\Fillable;
use App\Traits\Filterable;
use App\Mail\TicketUpdated;
use Laravel\Scout\Searchable;
use App\Concerns\GeneratesUid;
use App\Mail\NewTicketCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use Fillable,
        Searchable,
        Filterable,
        HasUid,
        GeneratesUid;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['path'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid', 'customer_id', 'user_id', 'priority_id',
        'subject', 'description', 'status'
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'uid' => $this->uid,
            'subject' => $this->subject,
            'description' => $this->description,
            'id' => $this->id,
            'status' => $this->status,
        ];
    }

    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // Assign a random agent to the support ticket.
        static::creating(function ($ticket) {
            $userIds = User::all()->pluck('id')->toArray();

            $ticket->user_id = rand(1, $userIds[array_rand($userIds)]);
        });

        // Send email to customer
        static::created(function ($ticket) {
            Mail::send(new NewTicketCreated($ticket));
        });

        // Send email to customer
        static::updated(function ($ticket) {
            Mail::send(new TicketUpdated($ticket));
        });
    }

    /**
     * Get full path to resource page.
     *
     * @return string
     */
    public function getPathAttribute()
    {
        return $this->path();
    }

    /**
    * Get full path to resource page.
    *
    * @return string
    */
    public function path()
    {
        return route('tickets.show', [
            'priority' => $this->priority->slug,
            'ticket' => $this->uid,
        ]);
    }

    /**
     * Mark the ticket as expired.
     */
    public function markAs($status)
    {
        $this->update(['status' => $status]);
    }

    /**
     * Get priority the ticket comes under.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    /**
     * Get all replies of the ticket.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get customer the ticket belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get user the ticket belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
