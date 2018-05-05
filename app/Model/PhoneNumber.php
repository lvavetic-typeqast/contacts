<?php

namespace App\Model;

class PhoneNumber extends Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'phone_number';

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
    protected $fillable = ['number', 'label'];
    
    /**
     * Fields which have to be convert to null in case of empty imput.
     *
     * @var array
     */
    protected $nullable = ['number', 'label'];
    
    /**
     * Get the phone numbers that owns the contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}