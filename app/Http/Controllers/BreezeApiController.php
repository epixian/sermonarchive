<?php

namespace App\Http\Controllers;

use App\Breeze;
use Illuminate\Http\Request;

class BreezeApiController extends Controller
{
    protected $breeze;

    public function __construct()
    {
        $this->breeze = new Breeze();
    }

    /**
     * Attempt link to Breeze.
     *
     * @return \Illuminate\Http\Response
     */
    public function attemptLink()
    {
        if ($person = $this->breeze->getPersonByEmail(auth()->user()->email)) {
            auth()->user()->update(['breeze_id' => $person->id]);

            auth()->user()->givePermissionTo('record_attendance');

            return redirect('/')
                ->with('status', 200)
                ->with('message', 'Successfully linked!');
        }

        return redirect('/')
            ->with('status', 404)
            ->with('message', 'We did not find your email address in our system.  Please contact church staff at receptionist@newlifeglenside.com to be added.');
    }

    /**
     * Get family members from Breeze.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFamily()
    {
        if (! auth()->check() || ! auth()->user()->breeze_id)
            return null;

        return $this->breeze
            ->getFamilyMembers(auth()->user()->breeze_id)
            ->toJson();
    }
}
