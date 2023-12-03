<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


   public static function generate_code(int $number): string
    {
        // Convert the number to a string.
        $number_string = strval($number);

        // Pad the string with zeros to make it 4 characters long.
        while (strlen($number_string) < 4) {
            $number_string = "0" . $number_string;
        }

        // Return the padded string.
        return $number_string;
    }
}
