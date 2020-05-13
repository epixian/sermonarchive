<?php

namespace App\Http\Controllers\Auth;

use App\Breeze;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * The user has been verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function verified(Request $request)
    {
        // link to breeze
        $breeze = new Breeze(env('BREEZE_API_KEY'));
        $email = auth()->user()->email;
        $response = $breeze->url('https://newlifeglenside.breezechms.com/api/people?details=1&filter_json={"1786141247":"' . $email . '"}');
        $found = false;
        foreach (json_decode($response) as $person) {
            if ($person->details->details->email_primary === $email) {
                $found = true;
                auth()->user()->update(['breeze_id' => $person->id]);
                auth()->user()->fresh();
                break;
            }
        }

        if ($found) {
            Session::flash('message', 'Success! Your account has been verified and linked.');
        }
        else {
            Session::flash('message', 'Thank you for verifying your email address!  However, we did not find it in our system.  If you feel this is in error, please contact the church receptionist.');

            // email Jan
        }
    }
}
