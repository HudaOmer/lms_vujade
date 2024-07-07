<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    // use HasFactory;
    protected $fillable = [
        'user_id', 'book_id', 'reserve_date', 'return_date', 'due_date',
        'borrow_days', 'exceeded_days', 'cost','fine_amount'
    ];

     /**
     * Get the user that owns the report (transaction).
     *
     * Establishes a belongsTo relationship indicating that this report
     * belongs to a single User record in the database.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   /**
     * Define a relationship with the Book model.
     *
     * This method defines a belongsTo relationship indicating that this model
     * belongs to a single Book record in the database.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
