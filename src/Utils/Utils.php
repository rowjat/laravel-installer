<?php

namespace Rowjat\Installer\Utils;

use Illuminate\Contracts\Validation\Validator;

class Utils
{

    /** Return success response
     * @param $messageOrData
     * @param null $data
     * @return array
     */
    public static function success($messageOrData, $data = null): array
    {
        $response = [
            'status' => 'success'
        ];

        if (!empty($messageOrData) && !is_array($messageOrData)) {
            $response['message'] = Utils::getTranslated($messageOrData);
        }

        if (is_array($data)) {
            $response = array_merge($data, $response);
        }

        if (is_array($messageOrData)) {
            $response = array_merge($messageOrData, $response);
        }

        return $response;
    }

    /** Return error response
     * @param $message
     * @param null $errorName
     * @param array $errorData
     * @return array
     */
    public static function error($message, $errorName = null, array $errorData = []): array
    {
        return [
            'status' => 'fail',
            'error_name' => $errorName,
            'data' => $errorData,
            'message' => Utils::getTranslated($message)
        ];
    }

    /** Return validation errors response
     * @param Validator $validator
     * @return array
     */

    public static function formErrors(Validator $validator): array
    {
        return [
            'status' => 'fail',
            'errors' => $validator->getMessageBag()->toArray()
        ];
    }

    /** Response with redirect action. This is meant for ajax responses and is not meant for direct redirecting
     * to the page
     * @param $url string to redirect to
     * @param null $message Optional message
     * @return array
     */

    public static function redirect(string $url, $message = null): array
    {
        if ($message) {
            return [
                'status' => 'success',
                'message' => Utils::getTranslated($message),
                'action' => 'redirect',
                'url' => $url
            ];
        } else {
            return [
                'status' => 'success',
                'action' => 'redirect',
                'url' => $url
            ];
        }
    }

    /**
     * @param $message
     * @return mixed
     */
    private static function getTranslated($message): mixed
    {
        $trans = trans("installer::$message");
        if ($trans == $message) {
            return $message;
        } else {
            return $trans;
        }
    }

}
