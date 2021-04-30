<?php

namespace App\Validators;

use Illuminate\Http\Request;

abstract class AbstractBaseValidator
{
    /** @var array */
    protected $request;

    /** @var array */
    protected $messages = [];

    /**
     * AbstractBaseValidator constructor.
     */
    public function __construct()
    {
        $this->request = app(Request::class)->all();
    }

    /**
     * The validation rules.
     *
     * @return array
     */
    abstract function rules();

    /**
     * Validate the data.
     *
     * @return array
     */
    public function validate()
    {
        return validator($this->request, $this->rules(), $this->messages)->validate();
    }

    /**
     * Set the data for the request;
     *
     * @param array $request
     * @return void
     */
    public function setRequestData(array $request)
    {
        $this->request = $request;

        return $this;
    }
}