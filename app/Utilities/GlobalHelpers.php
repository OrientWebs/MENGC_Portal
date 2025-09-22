<?php

use App\Repositories\ApiUserRepository;
use Illuminate\Support\Str;
use App\Models\NrcState;

/**
 * Created by HHOW.
 * Date: 12 Aug 2024
 * Time: 04:01 PM
 */

// if (!function_exists('generateRamdomPassword')) {
//     function generateRamdomPassword()
//     {
//         // Define character sets
//         $capitalLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
//         $lowercaseLetters = 'abcdefghijklmnopqrstuvwxyz';
//         $digits = '0123456789';
//         $specialChars = '!@#$%^&*()-_+=<>?';

//         // Ensure at least one character from each set
//         $result = [
//             $capitalLetters[random_int(0, strlen($capitalLetters) - 1)],
//             $lowercaseLetters[random_int(0, strlen($lowercaseLetters) - 1)],
//             $digits[random_int(0, strlen($digits) - 1)],
//             $specialChars[random_int(0, strlen($specialChars) - 1)]
//         ];

//         // Fill the rest of the string length with random choices from all character sets
//         $allCharacters = $capitalLetters . $lowercaseLetters . $digits . $specialChars;
//         for ($i = 4; $i < 10; $i++)
//             $result[] = $allCharacters[random_int(0, strlen($allCharacters) - 1)];
//         }

//         // Shuffle the result to ensure randomness
//         shuffle($result);
//         return implode('', $result);
//     }
// }

/**
 * Created by HHOW.
 * Date: 12 Aug 2024
 * Time: 04:01 PM
 */
// if (!function_exists('hashPassword')) {
//     function hashPassword($password)
//     {
//         $pbkdf2Iterations = 1000;
//         $hashByteSize = 24;
//         $salt = random_bytes(24);
//         $hash = hash_pbkdf2("sha1", $password, $salt, $pbkdf2Iterations, $hashByteSize, true);
//         return $pbkdf2Iterations . ":" . base64_encode($salt) . ":" . base64_encode($hash);
//     }
// }

/**
 * Created by HHOW.
 * Date: 12 Aug 2024
 * Time: 04:01 PM
 */
// if (!function_exists('verifyHash')) {
//     function verifyHash($password, $storedHash)
//     {
//         list($iterations, $encodedSalt, $encodedHash) = explode(":", $storedHash);
//         $salt = base64_decode($encodedSalt);
//         $hash = base64_decode($encodedHash);
//         $iterations = (int) $iterations;
//         $computedHash = hash_pbkdf2("sha1", $password, $salt, $iterations, strlen($hash), true);
//         return hash_equals($computedHash, $hash);
//     }
// }

/**
 * Created by MPT.
 * Date: 20 Aug 2024
 * Time: 04:01 PM
 */
// if (!function_exists('encrypt_credential')) {
//     function encrypt_credential($data)
//     {
//         $key = config('constants.s3_encryption_key') ?? '';
//         $iv = config('constants.s3_encryption_iv') ?? '';
//         $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
//         return base64_encode($encrypted);
//     }
// }

/**
 * Created by MPT.
 * Date: 20 Aug 2024
 * Time: 04:01 PM
 */
// if (!function_exists('decrypt_credential')) {
//     function decrypt_credential($data)
//     {
//         $key = config('constants.s3_encryption_key') ?? '';
//         $iv = config('constants.s3_encryption_iv') ?? '';
//         $decrypted = openssl_decrypt(base64_decode($data), 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
//         return $decrypted;
//     }
// }

// if (!function_exists('decryptStringGCM')) {
//     function decryptStringGCM($cipheredText)
//     {
//         $secret = hex2bin('1a2b3c4d5e6f707172737475767778797a7b7c7d7e7f80818283848586878889');
//         // Using GCM
//         $method = 'aes-256-gcm';
//         $ivSize = openssl_cipher_iv_length($method);
//         $iv = openssl_random_pseudo_bytes($ivSize);
//         $tagLength = 16; // GCM tag length is usually 16 bytes
//         $tag = '';
//         $cipheredText = base64_decode($cipheredText);
//         $iv = substr($cipheredText, 0, $ivSize);
//         $tag = substr($cipheredText, $ivSize, $tagLength);
//         $ciphertext = substr($cipheredText, $ivSize + $tagLength);
//         $decryptedText = openssl_decrypt($ciphertext, $method, $secret, OPENSSL_RAW_DATA, $iv, $tag);
//         if ($decryptedText === false) {
//             throw new Exception('Decryption failed.');
//         }
//         return $decryptedText;
//     }
// }

/**
 * Created by MPT.
 * Date: 20 Aug 2024
 * Time: 04:01 PM
 */
// if (!function_exists('decryptString')) {
//     function decryptString($cipheredText)
//     {
//         $userRepository = app(ApiUserRepository::class);
//         $user = $userRepository->getApiUserByChannel('UABPAY');
//         $default_token = $user ? $user->public_encryption_key : '';
//         $key = auth('sanctum')->check() ? auth('sanctum')->user()->public_encryption_key : $default_token;
//         $secret = base64_decode($key);
//         $cipheredText = base64_decode($cipheredText);
//         $ivSize = openssl_cipher_iv_length('aes-128-cbc');
//         $iv = substr($cipheredText, 0, $ivSize);
//         $data = substr($cipheredText, $ivSize);
//         $decryptedText = openssl_decrypt($data, 'aes-128-cbc', $secret, OPENSSL_RAW_DATA, $iv);
//         if ($decryptedText === false) {
//             throw new Exception('Decryption failed.');
//         }
//         return $decryptedText;
//     }
// }

/**
 * Created by MPT.
 * Date: 20 Aug 2024
 * Time: 04:01 PM
 */
// if (!function_exists('sha256Hash')) {
//     function sha256Hash($data)
//     {
//         $userRepository = app(ApiUserRepository::class);
//         $user = $userRepository->getApiUserByChannel('UABPAY');
//         $default_token = $user ? $user->token : '';
//         $key = auth('sanctum')->check() ? auth('sanctum')->user()->token : $default_token;
//         $hashed_data = hash_hmac('sha256', $data, $key, true);
//         return base64_encode($hashed_data);
//     }
// }

/**
 * Created by MPT.
 * Date: 20 Aug 2024
 * Time: 04:01 PM
 */
// if (!function_exists('sha256HashCheck')) {
//     function sha256HashCheck($data, $hash_value)
//     {
//         $userRepository = app(ApiUserRepository::class);
//         $user = $userRepository->getApiUserByChannel('UABPAY');
//         $default_token = $user ? $user->token : '';
//         $key = auth('sanctum')->check() ? auth('sanctum')->user()->token : $default_token;
//         $hashed_data = hash_hmac('sha256', $data, $key, true);
//         return base64_encode($hashed_data) === $hash_value;
//     }
// }

/**
 * Created by MPT.
 * Date: 20 Aug 2024
 * Time: 04:01 PM
 */
// if (!function_exists('encryptString')) {
//     function encryptString($plainText)
//     {
//         $userRepository = app(ApiUserRepository::class);
//         $user = $userRepository->getApiUserByChannel('UABPAY');
//         $default_token = $user ? $user->public_encryption_key : '';
//         $key = auth('sanctum')->check() ? auth('sanctum')->user()->public_encryption_key : $default_token;
//         $secret = base64_decode($key);
//         $ivSize = openssl_cipher_iv_length('aes-128-cbc');
//         $iv = openssl_random_pseudo_bytes($ivSize);

//         $encryptedData = openssl_encrypt($plainText, 'aes-128-cbc', $secret, OPENSSL_RAW_DATA, $iv);
//         if ($encryptedData === false) {
//             throw new Exception('Encryption failed.');
//         }

//         $cipheredText = $iv . $encryptedData;

//         return base64_encode($cipheredText);
//     }
// }

// if (!function_exists('convertToNumber')) {
//     function convertToNumber($string)
//     {
//         $string = trim($string);
//         if ($string === '') {
//             return '';
//         }
//         if (is_numeric($string) && substr($string, 0, 1) == '0') {
//             return $string;
//         }
//         if (filter_var($string, FILTER_VALIDATE_INT) !== false) {
//             return (int)$string;
//         }
//         if (filter_var($string, FILTER_VALIDATE_FLOAT) !== false) {
//             return (float)$string;
//         }
//         return $string;
//     }
// }

/**
 * Created by MPT.
 * Date: 7 Oct 2024
 * Time: 04:23 PM
 */
// if (!function_exists('sha1Hash')) {
//     function sha1Hash($data, $key)
//     {
//         $hashed_data = hash_hmac('sha1', $data, $key);
//         return Str::upper($hashed_data);
//     }
// }

/**
 * Created by MPT.
 * Date: 08 Jan 2025
 * Time: 04:01 PM
 */
// if (!function_exists('getSetting')) {
//     function getSetting($name)
//     {
//         $socialSettingRepository = app('App\Repositories\SocialSettingRepository');
//         return $socialSettingRepository->getByName($name)?->value;
//     }
// }

if (!function_exists('format_nrc')) {
    /**
     * Format NRC number into full string using DB state code.
     *
     * @param  array  $data
     * @param  string $lang  'en' or 'mm'
     * @return string|null
     */
    function format_nrc(array $data, string $lang = 'en'): ?string
    {
        $stateId  = $data["nrc_state_{$lang}"] ?? null;
        $township = $data["nrc_township_{$lang}"] ?? null;
        $type     = $data["nrc_type_{$lang}"] ?? null;
        $number   = $data["nrc_number_{$lang}"] ?? null;

        // if (!$stateId || !$township || !$type || !$number) {
        //     return null;
        // }

        $state = NrcState::find($stateId);
        if (!$state) {
            return null;
        }

        $stateCodeColumn = $lang === 'mm' ? 'code_mm' : 'code_en';
        $stateCode = $state->{$stateCodeColumn};

        return "{$stateCode}/{$township}({$type}){$number}";
    }

    function parse_nrc(string $nrcFormatted, string $lang = 'en'): array
    {
        if (!$nrcFormatted) return [];

        // Matches pattern: state/township(type)number
        if (preg_match('/^(.*?)\/(.*?)\((.*?)\)(.*)$/', $nrcFormatted, $matches)) {

            // Look up the state id by its code
            $stateCodeColumn = $lang === 'mm' ? 'code_mm' : 'code_en';
            $state = NrcState::where($stateCodeColumn, $matches[1])->first();

            return [
                'state_id'  => $state?->id,
                'state_code' => $matches[1] ?? null,
                'township'  => $matches[2] ?? null,
                'type'      => $matches[3] ?? null,
                'number'    => $matches[4] ?? null,
            ];
        }

        return [];
    }
}