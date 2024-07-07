<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class representing a Book model.
 *
 * This class defines the attributes and relationships of a Book within the application.
 *
 * Relationships:
 * - Many-to-Many: Users who have borrowed this book.
 * - One-to-Many: Reports (transactions) associated with this book.
 */
class Book extends Model
{
    // Uncomment if using HasFactory trait
    // use HasFactory;

    /**
     * Define a many-to-many relationship with the User model.
     *
     * This method establishes a many-to-many relationship indicating that multiple
     * users can borrow this book, and this book can be borrowed by multiple users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get the reports (transactions) associated with this book.
     *
     * This method defines a one-to-many relationship indicating that this book
     * has multiple reports associated with it.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
