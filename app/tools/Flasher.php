<?php 

class Flasher 
{
    /**
     * @param string $type
     * @param string $message
     * @param int $statusCode
     * default status code adalah '500' jika $type nya danger selain itu defaultnya 200
     * @return void
     */
    public static function set($type, $message, $statusCode = null)
    {
        $_SESSION['flash'] = [
            'type' => $type,
            'message' => $message
        ];

        if ($statusCode === null) {
            $statusCode = $type == 'danger' ? 500 : 200; 
        }

        http_response_code($statusCode);
    }

    public static function set_user($message)
    {
        $_SESSION['flash_user'] = [
            'message' => $message
        ];
    }
    
    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            $type = $_SESSION['flash']['type'];
            $message = $_SESSION['flash']['message'];

            echo <<<html
                <div class="alert alert-alt alert-$type">$message</div>
            html;

            unset($_SESSION['flash']);
        }
    }

    public static function flash_user()
    {
        if (isset($_SESSION['flash_user'])) {
            $message = $_SESSION['flash_user']['message'];

            echo "<script>alert('$message')</script>";

            unset($_SESSION['flash_user']);
        }
    }

}