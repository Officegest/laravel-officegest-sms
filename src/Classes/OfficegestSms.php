<?php

namespace OfficegestSms\Classes;

class OfficegestSms
{

    public function __construct()
    {
        $this->url = config('officegest-sms.url');
        $this->user = config('officegest-sms.user');
        $this->api_key = config('officegest-sms.api_key');
    }

    public function isActive()
    {
        if (!config('officegest-sms.is_active') == true) {
            return response()->json('Gateway is not active', 405);
        }
    }

    public function send(string $phone_number, string $text)
    {
        $this->isActive();

        $auth_data = [
            'username' => $this->user,
            'password' => $this->api_key
        ];



        $mobile_phone = (!empty($phone_number) && strpos($phone_number, '+') === false) ? '+351.' . $phone_number : $phone_number;
        $post_data = array(
            'mobile_phone' => $mobile_phone,
            'sms_text' => $text,
        );
        $url = $this->url . '/api/utils/send_sms';


        $resposta = self::CallAPI('POST', $url, $post_data, $auth_data);
        $result = json_decode($resposta);
        dd($resposta);
        return true;
    }

    public static function CallAPI($method, $url, $data = false, $auth = [])
    {
        $curl = curl_init();

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, self::build_post_fields($data));
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // Optional Authentication:
        if (isset($auth)) {
            $authentication = $auth['username'] . ':' . $auth['password'];
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_USERPWD, $authentication);
        }

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }


    public static function build_post_fields($data, $existingKeys = '', &$returnArray = [])
    {
        if (($data instanceof CURLFile) or !(is_array($data) or is_object($data))) {
            $returnArray[$existingKeys] = $data;
            return $returnArray;
        } else {
            foreach ($data as $key => $item) {
                self::build_post_fields($item, $existingKeys ? $existingKeys . "[$key]" : $key, $returnArray);
            }
            return $returnArray;
        }
    }
}
