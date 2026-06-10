<?php
/**
 * Anovex Technologies - contact.php
 * Proposal form mailer with PHPMailer + mail() fallbacks
 */

header('Content-Type: application/json');

/* POST only */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

/* Honeypot spam trap */
if (!empty($_POST['website'])) {
    echo json_encode(['success' => true, 'message' => 'Thank you!']);
    exit;
}

/* Sanitise helper */
function clean(string $v): string {
    return htmlspecialchars(trim(strip_tags($v)), ENT_QUOTES, 'UTF-8');
}

/* Collect fields */
$to       = 'omalkanidarshana@gmail.com'; // change to info@anovextechnologies.net when live
$name     = clean($_POST['name']     ?? '');
$email    = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$company  = clean($_POST['company']  ?? '');
$phone    = clean($_POST['phone']    ?? '');
$service  = clean($_POST['service']  ?? '');
$budget   = clean($_POST['budget']   ?? '');
$timeline = clean($_POST['timeline'] ?? '');
$message  = clean($_POST['message']  ?? '');

/* Validate */
$errors = [];
if (empty($name))                               $errors[] = 'Name is required.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email is required.';
if (empty($message))                            $errors[] = 'Project description is required.';

if ($errors) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

/* Subject */
$subject = 'New Proposal from ' . $name . ($company ? ' (' . $company . ')' : '');

/* Plain text body — built with concatenation, no heredoc */
$submitted = date('d M Y H:i:s') . ' UTC';
$ip        = $_SERVER['REMOTE_ADDR'] ?? 'unknown';

$plain  = "ANOVEX TECHNOLOGIES - NEW PROPOSAL\n";
$plain .= "====================================\n\n";
$plain .= "CONTACT\n";
$plain .= "  Name     : " . $name    . "\n";
$plain .= "  Email    : " . $email   . "\n";
$plain .= "  Company  : " . $company . "\n";
$plain .= "  Phone    : " . $phone   . "\n\n";
$plain .= "PROJECT DETAILS\n";
$plain .= "  Service  : " . $service  . "\n";
$plain .= "  Budget   : " . $budget   . "\n";
$plain .= "  Timeline : " . $timeline . "\n\n";
$plain .= "MESSAGE\n";
$plain .= $message . "\n\n";
$plain .= "====================================\n";
$plain .= "Submitted : " . $submitted . "\n";
$plain .= "IP        : " . $ip        . "\n";

/* HTML email body */
$co  = $company  ?: '&mdash;';
$ph  = $phone    ?: '&mdash;';
$sv  = $service  ?: '&mdash;';
$bg  = $budget   ?: '&mdash;';
$tl  = $timeline ?: '&mdash;';
$msg = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));
$dt  = date('d M Y, H:i');

$html  = '<!DOCTYPE html><html><head><meta charset="UTF-8">';
$html .= '<style>';
$html .= 'body{font-family:Arial,sans-serif;background:#f4f6fb;margin:0;padding:0;}';
$html .= '.wrap{max-width:600px;margin:30px auto;background:#fff;border-radius:8px;overflow:hidden;box-shadow:0 2px 16px rgba(0,0,0,.1);}';
$html .= '.hdr{background:#060c18;padding:24px 28px;text-align:center;}';
$html .= '.hdr h1{font-size:18px;color:#00d4ff;margin:0;letter-spacing:2px;}';
$html .= '.hdr p{font-size:11px;color:#6a82a8;margin:4px 0 0;letter-spacing:3px;}';
$html .= '.bd{padding:24px 28px;}';
$html .= '.sec{margin-bottom:20px;}';
$html .= '.st{font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:#1e78ff;border-bottom:1px solid #eef;padding-bottom:5px;margin:0 0 10px;}';
$html .= '.row{display:flex;gap:14px;margin-bottom:8px;flex-wrap:wrap;}';
$html .= '.f{flex:1;min-width:120px;}';
$html .= '.lb{font-size:11px;color:#999;margin-bottom:2px;}';
$html .= '.vl{font-size:13px;color:#222;font-weight:600;}';
$html .= '.msg{background:#f8faff;border-left:3px solid #1e78ff;padding:12px 14px;font-size:13px;line-height:1.7;color:#333;border-radius:0 5px 5px 0;white-space:pre-wrap;}';
$html .= '.ftr{background:#f0f4ff;padding:14px 28px;text-align:center;font-size:11px;color:#aaa;}';
$html .= '</style></head><body>';
$html .= '<div class="wrap">';
$html .= '<div class="hdr"><h1>ANOVEX TECHNOLOGIES</h1><p>NEW PROPOSAL SUBMISSION</p></div>';
$html .= '<div class="bd">';
$html .= '<div class="sec"><div class="st">Contact</div>';
$html .= '<div class="row">';
$html .= '<div class="f"><div class="lb">Name</div><div class="vl">'  . $name  . '</div></div>';
$html .= '<div class="f"><div class="lb">Email</div><div class="vl"><a href="mailto:' . $email . '" style="color:#1e78ff">' . $email . '</a></div></div>';
$html .= '</div>';
$html .= '<div class="row">';
$html .= '<div class="f"><div class="lb">Company</div><div class="vl">' . $co . '</div></div>';
$html .= '<div class="f"><div class="lb">Phone</div><div class="vl">'   . $ph . '</div></div>';
$html .= '</div></div>';
$html .= '<div class="sec"><div class="st">Project Details</div>';
$html .= '<div class="row">';
$html .= '<div class="f"><div class="lb">Service</div><div class="vl">' . $sv . '</div></div>';
$html .= '<div class="f"><div class="lb">Budget</div><div class="vl">'  . $bg . '</div></div>';
$html .= '</div>';
$html .= '<div class="row"><div class="f"><div class="lb">Timeline</div><div class="vl">' . $tl . '</div></div></div>';
$html .= '</div>';
$html .= '<div class="sec"><div class="st">Description</div>';
$html .= '<div class="msg">' . $msg . '</div>';
$html .= '</div>';
$html .= '</div>';
$html .= '<div class="ftr">Submitted ' . $dt . ' UTC &nbsp;&middot;&nbsp; anovextechnologies.com</div>';
$html .= '</div></body></html>';

/* ================================================================
   SEND — three methods tried in order
   1. PHPMailer via SMTP  (most reliable, needs composer install)
   2. mail() plain text   (simple fallback)
   3. mail() MIME         (full html+plain fallback)
   ================================================================ */

$sent      = false;
$sendError = '';

/* Method 1: PHPMailer */
$autoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoload)) {
    require $autoload;
    try {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = defined('SMTP_HOST') ? SMTP_HOST : 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = defined('SMTP_USER') ? SMTP_USER : $to;
        $mail->Password   = defined('SMTP_PASS') ? SMTP_PASS : '';
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = defined('SMTP_PORT') ? SMTP_PORT : 587;
        $mail->setFrom('noreply@anovextechnologies.net', 'Anovex Web');
        $mail->addAddress($to);
        $mail->addReplyTo($email, $name);
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body    = $html;
        $mail->AltBody = $plain;
        $mail->send();
        $sent = true;
    } catch (Exception $e) {
        $sendError = 'PHPMailer: ' . $e->getMessage();
    }
}

/* Method 2: Simple plain-text mail() */
if (!$sent) {
    $h2  = "From: noreply@anovextechnologies.net\r\n";
    $h2 .= "Reply-To: " . $email . "\r\n";
    $h2 .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $h2 .= "X-Mailer: PHP/" . phpversion();
    if (@mail($to, $subject, $plain, $h2)) {
        $sent = true;
    } else {
        $err = error_get_last();
        $sendError .= ' | plain mail(): ' . ($err['message'] ?? 'unknown');
    }
}

/* Method 3: Full MIME mail() */
if (!$sent) {
    $b   = 'bnd_' . md5(uniqid('', true));
    $h3  = "From: noreply@anovextechnologies.net\r\n";
    $h3 .= "Reply-To: " . $email . "\r\n";
    $h3 .= "MIME-Version: 1.0\r\n";
    $h3 .= "Content-Type: multipart/alternative; boundary=\"" . $b . "\"\r\n";
    $h3 .= "X-Mailer: PHP/" . phpversion();

    $body  = "--" . $b . "\r\n";
    $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $body .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
    $body .= $plain . "\r\n";
    $body .= "--" . $b . "\r\n";
    $body .= "Content-Type: text/html; charset=UTF-8\r\n";
    $body .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
    $body .= $html . "\r\n";
    $body .= "--" . $b . "--";

    if (@mail($to, $subject, $body, $h3)) {
        $sent = true;
    } else {
        $err = error_get_last();
        $sendError .= ' | MIME mail(): ' . ($err['message'] ?? 'unknown');
    }
}

/* Log failures */
if (!$sent) {
    $log = __DIR__ . '/mail_debug.log';
    $entry = date('[Y-m-d H:i:s]') . ' FAILED to:' . $to . ' from:' . $email . ' err:' . $sendError . "\n";
    @file_put_contents($log, $entry, FILE_APPEND | LOCK_EX);

    /* Save submission so no data is lost */
    $fallback = __DIR__ . '/submissions.log';
    $save = date('[Y-m-d H:i:s]') . "\n" . $plain . str_repeat('-', 40) . "\n";
    @file_put_contents($fallback, $save, FILE_APPEND | LOCK_EX);

    http_response_code(500);
    echo json_encode([
        'success' => false,
        'debug'   => $sendError, // remove in production
        'message' => 'Mail could not be sent. Your submission has been saved. You can also reach us at info@anovextechnologies.net.',
    ]);
    exit;
}

echo json_encode([
    'success' => true,
    'message' => 'Thank you, ' . $name . '! Your proposal has been received. We\'ll be in touch shortly.',
]);