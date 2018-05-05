<?php

namespace App\Model;

class Contact extends Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contact';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'email', 'profile_photo', 'is_favorite'];
    
    /**
     * Fields which have to be convert to null in case of empty imput.
     *
     * @var array
     */
    protected $nullable = ['profile_photo', 'is_favorite'];
    
    /**
     * Get name for notification
     *
     * @return mixed
     */
    public function getFullName()
    {
        return $this->firstname.' '.$this->lastname;
    }
    
    /**
     * Get the phone numbers that owns the contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function numbers()
    {
        return $this->hasMany(PhoneNumber::class);
    }
}