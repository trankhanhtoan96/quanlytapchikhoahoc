<?php

use Slim\Http\UploadedFile;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function moveUploadedFile($directory, UploadedFile $uploadedFile)
{
    $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
    try {
        $basename = bin2hex(random_bytes(8));
    } catch (Exception $e) {
    }
    $filename = sprintf('%s.%0.8s', $basename, $extension);
    $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
    return $filename;
}

class KTEncrypt
{
    public function encode($string, $key)
    {
        return base64_encode($this->mcrypt_encode($string, md5($key)));
    }

    public function decode($string, $key)
    {
        if (preg_match('/[^a-zA-Z0-9\/\+=]/', $string) OR base64_encode(base64_decode($string)) !== $string) return FALSE;
        return $this->mcrypt_decode(base64_decode($string), md5($key));
    }

    protected function mcrypt_encode($data, $key)
    {
        $init_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
        $init_vect = mcrypt_create_iv($init_size, MCRYPT_DEV_URANDOM);
        return $this->_add_cipher_noise($init_vect . mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $data, MCRYPT_MODE_CBC, $init_vect), $key);
    }

    protected function mcrypt_decode($data, $key)
    {
        $data = $this->_remove_cipher_noise($data, $key);
        $init_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
        if ($init_size > self::strlen($data)) return FALSE;
        $init_vect = self::substr($data, 0, $init_size);
        $data = self::substr($data, $init_size);
        return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $data, MCRYPT_MODE_CBC, $init_vect), "\0");
    }

    protected function _add_cipher_noise($data, $key)
    {
        $key = hash('sha1', $key);
        $str = '';
        for ($i = 0, $j = 0, $ld = self::strlen($data), $lk = self::strlen($key); $i < $ld; ++$i, ++$j) {
            if ($j >= $lk) $j = 0;
            $str .= chr((ord($data[$i]) + ord($key[$j])) % 256);
        }
        return $str;
    }

    protected function _remove_cipher_noise($data, $key)
    {
        $key = hash('sha1', $key);
        $str = '';
        for ($i = 0, $j = 0, $ld = self::strlen($data), $lk = self::strlen($key); $i < $ld; ++$i, ++$j) {
            if ($j >= $lk) $j = 0;
            $temp = ord($data[$i]) - ord($key[$j]);
            if ($temp < 0) $temp += 256;
            $str .= chr($temp);
        }
        return $str;
    }

    protected static function strlen($str)
    {
        return defined('MB_OVERLOAD_STRING') ? mb_strlen($str, '8bit') : strlen($str);
    }

    protected static function substr($str, $start, $length = NULL)
    {
        if (defined('MB_OVERLOAD_STRING')) {
            isset($length) OR $length = ($start >= 0 ? self::strlen($str) - $start : -$start);
            return mb_substr($str, $start, $length, '8bit');
        }
        return isset($length) ? substr($str, $start, $length) : substr($str, $start);
    }
}

function sendEmail($subject, $body, array $attachments, array $reveicer, array $cc = array(), array $bcc = array())
{
    global $settings;

    $kte = new KTEncrypt();
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->Host = $settings['mailer_host'];
    $mail->SMTPAuth = true;
    $mail->Username = $settings['mailer_user'];
    $mail->Password = $kte->decode($settings['mailer_pass'], 'tkt');
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    try {
        $mail->setFrom($settings['mailer_from'], $settings['mailer_fromname']);
    } catch (\PHPMailer\PHPMailer\Exception $e) {
    }
    try {
        $mail->addReplyTo($settings['mailer_replyto'], $settings['mailer_replytoname']);
    } catch (\PHPMailer\PHPMailer\Exception $e) {
    }

    if (!empty($reveicer))
        foreach ($reveicer as $r)
            if (!empty($r['email'])) try {
                $mail->addAddress($r['email'], $r['name']);
            } catch (\PHPMailer\PHPMailer\Exception $e) {
            }

    if (!empty($cc))
        foreach ($cc as $r)
            if (!empty($r['email'])) try {
                $mail->addCC($r['email'], $r['name']);
            } catch (\PHPMailer\PHPMailer\Exception $e) {
            }

    if (!empty($bcc))
        foreach ($bcc as $r)
            if (!empty($r['email'])) try {
                $mail->addBCC($r['email'], $r['name']);
            } catch (\PHPMailer\PHPMailer\Exception $e) {
            }

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;

    if (!empty($attachments))
        foreach ($attachments as $at)
            if (!empty($at['path'])) try {
                $mail->addAttachment($at['path'], $at['name']);
            } catch (\PHPMailer\PHPMailer\Exception $e) {
            }

    try {
        return $mail->send();
    } catch (\PHPMailer\PHPMailer\Exception $e) {
    }
}

function insertDB($conn, $table, $data)
{
    $tmp1 = "insert into " . $table . "(";
    $tmp2 = "values(";
    foreach ($data as $key => $val) {
        $tmp1 .= $key . ',';
        $tmp2 .= "'" . $val . "',";
    }
    $tmp1 = rtrim($tmp1, ',') . ')';
    $tmp2 = rtrim($tmp2, ',') . ');';
    $sql = $tmp1 . ' ' . $tmp2;
    return $conn->query($sql);
}

function createID()
{
    $id = md5(time());
    $stringToRandom = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    for ($i = 0; $i < 4; $i++) {
        $id .= $stringToRandom[rand(0, 61)];
    }
    return $id;
}

function getDBDef($table)
{
    if (file_exists('app/database/' . $table . '.php')) {
        include 'app/database/' . $table . '.php';
        if (!empty($tables[$table])) {
            return $tables[$table];
        }
    }
    return false;
}

function getAllDBDef()
{
    $def = array();
    $files = scandir('app/database');
    foreach ($files as $file) {
        $tables = array();
        if (is_file('app/database/' . $file)) {
            include 'app/database/' . $file;
            foreach ($tables as $table => $tableDetail) {
                $def[$table] = $tableDetail;
            }
        }
    }
    return $def;
}