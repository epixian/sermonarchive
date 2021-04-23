<?php

namespace App\Models;

use Illuminate\Support\Carbon;

class Breeze
{
    const TEST_SERVICE_ID = 0;
    
    protected $apiKey;
    protected $baseUrl;
    protected $emailProfileField;

    public function __construct()
     {
        $this->apiKey = config('sermonarchive.breeze_api_key');
        $this->baseUrl = config('sermonarchive.breeze_api_url');
        $this->emailProfileField = config('sermonarchive.breeze_email_profile_field');
    }

    // fetch request
    public function url($url) {

        // url encode all variables if variables found
        if (strpos($url,'?')) {
            $base_url = substr( $url, 0, strpos( $url, '?' ) + 1 );
            $parts = parse_url($url);
            parse_str($parts['query'], $parameters);
            foreach($parameters as $name => $value) {
                $base_url .= "&" . $name . "=".urlencode($value);
            }
            $url = $base_url;
        }

        $options = array(
            CURLOPT_HTTPHEADER => array('Api-key: ' . $this->apiKey),  // send API key in header
            CURLOPT_RETURNTRANSFER => true,                             // return web page
            CURLOPT_HEADER         => false,                            // don't return headers
            CURLOPT_FOLLOWLOCATION => true,                             // follow redirects
            CURLOPT_ENCODING       => "",                               // handle all encodings
            CURLOPT_USERAGENT      => "user",                           // who am i
            CURLOPT_AUTOREFERER    => true,                             // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,                              // timeout on connect
            CURLOPT_TIMEOUT        => 120,                              // timeout on response
            CURLOPT_MAXREDIRS      => 10,                               // stop after 10 redirects
            CURLOPT_SSL_VERIFYPEER => false                             // Disabled SSL Cert checks (if enabled, ensure path for CURLOPT_CAINFO is correct)
            //CURLOPT_CAINFO           => "breeze/cacert.pem",          // security certificate
            //CURLOPT_SSLVERSION        => 3                                // set correct SSL version
        );

        // get page data
        $ch      = curl_init( $url );
        curl_setopt_array( $ch, $options );
        $content = curl_exec( $ch );
        $err     = curl_errno( $ch );
        $errmsg  = curl_error( $ch );
        $header  = curl_getinfo( $ch );
        curl_close( $ch );

        // set to variables
        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['content'] = $content;

        if(empty($header['content']) || $header['content'] == false) {
            return $header['errmsg'];
        }

        // return content
        return $header['content'];
    }

    /**
     * Look up a person using their email address
     * @link   https://app.breezechms.com/api#list_people
     * @param  string $email
     * @return object|null
     */
    public function getPersonByEmail($email)
    {
        $url = $this->baseUrl . '/people?details=1&filter_json={"' .
            $this->emailProfileField . '":"' . $email . '"}';

        $matches = json_decode($this->url($url));

        foreach ($matches as $person) {
            if ($person->details->details->email_primary === $email) {
                return $person;
            }
        }

        return null;
    }

    /**
     * Get family members' first names and IDs
     * @link   https://app.breezechms.com/api#show_person
     * @param  string $id
     * @return \Illuminate\Support\Collection
     */
    public function getFamilyMembers($id)
    {
        $url = $this->baseUrl . '/people/' .  $id . '?details=1';

        $person = json_decode($this->url($url));

        return collect($person->family)->map(function($member) {
            return [
                'id' => $member->details->id,
                'name' => $member->details->first_name,
            ];
        });
    }

    /**
     * Record attendance for an event
     * @link   https://app.breezechms.com/api#add_attendance_record
     * @param  string $personId
     * @param  string $event_id
     * @return [type]         [description]
     */
    public function recordAttendance($personId, $eventId)
    {
        $url = $this->baseUrl . '/events/attendance/add?person_id=' .
            $personId . '&instance_id=' . $eventId;

        return json_decode($this->url($url));
    }

    /**
     * Add an event
     * @link   https://app.breezechms.com/api#add_event
     * @param  string $event_id
     * @param  array  $people
     * @return mixed
     */
    public function createServiceEvent($name, $date)
    {
        $start = Carbon::parse($date, 'America/New_York')->timestamp;
        $end = Carbon::parse($date, 'America/New_York')->setTime(23, 59, 59)->timestamp;

        $url = $this->baseUrl . '/events/add?name=' .  $name .
            '&starts_on=' . $start . '&ends_on=' . $end;

        $event = json_decode($this->url($url));

        return $event;
    }

}
