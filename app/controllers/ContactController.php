<?php
namespace App\Controllers;

use App\Core\Session;

class ContactController
{
    public function submit(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405); exit('Method Not Allowed');
        }

        if (!Session::verifyCsrf($_POST['_csrf'] ?? null)) {
            http_response_code(400); exit('Bad request (CSRF)');
        }

        // Trim + basic validation
        $name    = trim($_POST['name'] ?? '');
        $email   = trim($_POST['email'] ?? '');
        $subject = trim($_POST['subject'] ?? '');
        $message = trim($_POST['message'] ?? '');

        $errors = [];
        if ($name === '')    $errors[] = 'Name is required.';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required.';
        if ($subject === '') $errors[] = 'Subject is required.';
        if ($message === '') $errors[] = 'Message cannot be empty.';

        if ($errors) {
            Session::flash('contact_errors', $errors);
            Session::flash('contact_old', compact('name','email','subject','message'));
            header('Location: /project-root/public/index.php?route=contact'); exit;
        }

        // Persist to a simple log file so it works on any machine.
        $logDir = dirname(__DIR__, 2) . '/storage/logs';
        if (!is_dir($logDir)) @mkdir($logDir, 0775, true);

        $entry = [
            'time'    => date('c'),
            'ip'      => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
            'name'    => $name,
            'email'   => $email,
            'subject' => $subject,
            'message' => $message,
        ];
        @file_put_contents(
            $logDir . '/contact.log',
            json_encode($entry, JSON_UNESCAPED_UNICODE) . PHP_EOL,
            FILE_APPEND
        );

        // Optional: in future, send via PHPMailer here.

        Session::flash('contact_success', 'Thanks! Your message has been received. We’ll get back to you soon.');
        header('Location: /project-root/public/index.php?route=contact'); exit;
    }
}
