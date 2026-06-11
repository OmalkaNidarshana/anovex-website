<?php
/**
 * Anovex Technologies - contact.php
 * On form submit:
 *   Email 1 → admin (proposal details)
 *   Email 2 → customer (thank-you auto-reply)
 */

header('Content-Type: application/json');

/* ── POST only ── */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

/* ── Honeypot ── */
if (!empty($_POST['website'])) {
    echo json_encode(['success' => true, 'message' => 'Thank you!']);
    exit;
}

/* ── Sanitise ── */
function clean(string $v): string {
    return htmlspecialchars(trim(strip_tags($v)), ENT_QUOTES, 'UTF-8');
}

/* ── Config ── */
$adminEmail   = 'omalkanidarshana@gmail.com'; // change to info@anovextechnologies.net when live
$fromAddress  = 'noreply@anovextechnologies.net';
$fromName     = 'Anovex Technologies';
$siteUrl      = 'https://anovextechnologies.com';

/* ── Collect fields ── */
$name     = clean($_POST['name']     ?? '');
$email    = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$company  = clean($_POST['company']  ?? '');
$phone    = clean($_POST['phone']    ?? '');
$service  = clean($_POST['service']  ?? '');
$budget   = clean($_POST['budget']   ?? '');
$timeline = clean($_POST['timeline'] ?? '');
$message  = clean($_POST['message']  ?? '');

/* ── Validate ── */
$errors = [];
if (empty($name))                               $errors[] = 'Name is required.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email is required.';
if (empty($message))                            $errors[] = 'Project description is required.';

if ($errors) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

/* ── Shared values ── */
$co        = $company  ?: '—';
$ph        = $phone    ?: '—';
$sv        = $service  ?: '—';
$bg        = $budget   ?: '—';
$tl        = $timeline ?: '—';
$submitted = date('d M Y, H:i') . ' UTC';
$ip        = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$msgHtml   = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));

/* ================================================================
   HELPER — send a dual-part (plain + HTML) email
   ================================================================ */
function sendEmail(
    string $to,
    string $toName,
    string $fromAddr,
    string $fromName,
    string $replyTo,
    string $replyName,
    string $subject,
    string $plain,
    string $html
): bool {
    $b    = 'bnd_' . md5(uniqid('', true));
    $hdrs  = 'From: ' . $fromName . ' <' . $fromAddr . ">\r\n";
    $hdrs .= 'Reply-To: ' . $replyName . ' <' . $replyTo . ">\r\n";
    $hdrs .= "MIME-Version: 1.0\r\n";
    $hdrs .= 'Content-Type: multipart/alternative; boundary="' . $b . "\"\r\n";
    $hdrs .= 'X-Mailer: PHP/' . phpversion();

    $body  = '--' . $b . "\r\n";
    $body .= "Content-Type: text/plain; charset=UTF-8\r\nContent-Transfer-Encoding: 8bit\r\n\r\n";
    $body .= $plain . "\r\n";
    $body .= '--' . $b . "\r\n";
    $body .= "Content-Type: text/html; charset=UTF-8\r\nContent-Transfer-Encoding: 8bit\r\n\r\n";
    $body .= $html . "\r\n";
    $body .= '--' . $b . '--';

    return @mail($to, $subject, $body, $hdrs);
}

/* ================================================================
   EMAIL 1 — ADMIN NOTIFICATION (proposal details)
   ================================================================ */
$adminSubject = 'New Proposal: ' . $name . ($company ? ' (' . $company . ')' : '');

/* plain */
$adminPlain  = "ANOVEX TECHNOLOGIES — NEW PROPOSAL\n";
$adminPlain .= str_repeat('=', 40) . "\n\n";
$adminPlain .= "CONTACT\n";
$adminPlain .= "  Name     : " . $name    . "\n";
$adminPlain .= "  Email    : " . $email   . "\n";
$adminPlain .= "  Company  : " . $co      . "\n";
$adminPlain .= "  Phone    : " . $ph      . "\n\n";
$adminPlain .= "PROJECT DETAILS\n";
$adminPlain .= "  Service  : " . $sv      . "\n";
$adminPlain .= "  Budget   : " . $bg      . "\n";
$adminPlain .= "  Timeline : " . $tl      . "\n\n";
$adminPlain .= "MESSAGE\n" . $message . "\n\n";
$adminPlain .= str_repeat('=', 40) . "\n";
$adminPlain .= "Submitted : " . $submitted . "\n";
$adminPlain .= "IP        : " . $ip . "\n";

/* html */
$adminHtml  = '<!DOCTYPE html><html><head><meta charset="UTF-8">';
$adminHtml .= '<style>body{font-family:Arial,sans-serif;background:#f4f6fb;margin:0;padding:0;}';
$adminHtml .= '.wrap{max-width:620px;margin:28px auto;background:#fff;border-radius:10px;overflow:hidden;box-shadow:0 2px 20px rgba(0,0,0,.1);}';
$adminHtml .= '.hdr{background:#060c18;padding:26px 30px;text-align:center;}';
$adminHtml .= '.hdr h1{font-size:17px;color:#00d4ff;margin:0;letter-spacing:3px;font-family:Arial,sans-serif;}';
$adminHtml .= '.hdr p{font-size:10px;color:#4a6280;margin:5px 0 0;letter-spacing:4px;}';
$adminHtml .= '.bd{padding:26px 30px;}';
$adminHtml .= '.sec{margin-bottom:22px;}';
$adminHtml .= '.sec-t{font-size:9px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:#1e78ff;border-bottom:1px solid #e8f0ff;padding-bottom:6px;margin-bottom:12px;}';
$adminHtml .= '.row{display:flex;gap:16px;flex-wrap:wrap;margin-bottom:10px;}';
$adminHtml .= '.f{flex:1;min-width:130px;}';
$adminHtml .= '.lb{font-size:10px;color:#999;margin-bottom:3px;}';
$adminHtml .= '.vl{font-size:13px;color:#111;font-weight:600;}';
$adminHtml .= '.msg{background:#f5f8ff;border-left:3px solid #1e78ff;padding:13px 15px;font-size:13px;line-height:1.75;color:#333;border-radius:0 6px 6px 0;white-space:pre-wrap;}';
$adminHtml .= '.meta{background:#f0f4ff;padding:12px 30px;font-size:10px;color:#aaa;text-align:center;}';
$adminHtml .= 'a{color:#1e78ff;}</style></head><body>';
$adminHtml .= '<div class="wrap">';
$adminHtml .= '<div class="hdr"><h1>ANOVEX TECHNOLOGIES</h1><p>NEW PROPOSAL RECEIVED</p></div>';
$adminHtml .= '<div class="bd">';

$adminHtml .= '<div class="sec"><div class="sec-t">Contact Information</div>';
$adminHtml .= '<div class="row">';
$adminHtml .= '<div class="f"><div class="lb">Full Name</div><div class="vl">' . $name . '</div></div>';
$adminHtml .= '<div class="f"><div class="lb">Email</div><div class="vl"><a href="mailto:' . $email . '">' . $email . '</a></div></div>';
$adminHtml .= '</div><div class="row">';
$adminHtml .= '<div class="f"><div class="lb">Company</div><div class="vl">' . $co . '</div></div>';
$adminHtml .= '<div class="f"><div class="lb">Phone</div><div class="vl">' . $ph . '</div></div>';
$adminHtml .= '</div></div>';

$adminHtml .= '<div class="sec"><div class="sec-t">Project Details</div>';
$adminHtml .= '<div class="row">';
$adminHtml .= '<div class="f"><div class="lb">Service Interest</div><div class="vl">' . $sv . '</div></div>';
$adminHtml .= '<div class="f"><div class="lb">Budget Range</div><div class="vl">' . $bg . '</div></div>';
$adminHtml .= '</div><div class="row">';
$adminHtml .= '<div class="f"><div class="lb">Timeline</div><div class="vl">' . $tl . '</div></div>';
$adminHtml .= '</div></div>';

$adminHtml .= '<div class="sec"><div class="sec-t">Project Description</div>';
$adminHtml .= '<div class="msg">' . $msgHtml . '</div>';
$adminHtml .= '</div></div>';
$adminHtml .= '<div class="meta">Submitted ' . $submitted . ' &nbsp;&middot;&nbsp; IP: ' . $ip . ' &nbsp;&middot;&nbsp; anovextechnologies.com</div>';
$adminHtml .= '</div></body></html>';

/* ================================================================
   EMAIL 2 — CUSTOMER AUTO-REPLY (thank you)
   ================================================================ */
$customerSubject = 'We received your proposal — Anovex Technologies';

$firstName = explode(' ', $name)[0];

/* plain */
$custPlain  = "Dear " . $firstName . ",\n\n";
$custPlain .= "Thank you for reaching out to Anovex Technologies.\n\n";
$custPlain .= "We have received your proposal and our team will review it carefully.\n";
$custPlain .= "You can expect to hear from us within 24 hours.\n\n";
$custPlain .= "Here is a summary of what we received:\n";
$custPlain .= str_repeat('-', 38) . "\n";
$custPlain .= "  Service  : " . $sv . "\n";
$custPlain .= "  Budget   : " . $bg . "\n";
$custPlain .= "  Timeline : " . $tl . "\n";
$custPlain .= str_repeat('-', 38) . "\n\n";
$custPlain .= "If you have any urgent questions, please contact us directly:\n";
$custPlain .= "  Email : info@anovextechnologies.net\n";
$custPlain .= "  Web   : https://anovextechnologies.com\n\n";
$custPlain .= "Warm regards,\n";
$custPlain .= "The Anovex Technologies Team\n";
$custPlain .= "AI · ERP · GovTech · Analytics\n";

/* html */
$custHtml  = '<!DOCTYPE html><html><head><meta charset="UTF-8">';
$custHtml .= '<style>body{font-family:Arial,sans-serif;background:#f4f6fb;margin:0;padding:0;}';
$custHtml .= '.wrap{max-width:600px;margin:28px auto;background:#fff;border-radius:10px;overflow:hidden;box-shadow:0 2px 20px rgba(0,0,0,.1);}';
$custHtml .= '.hdr{background:#060c18;padding:30px;text-align:center;}';
$custHtml .= '.hdr h1{font-size:17px;color:#00d4ff;margin:0 0 6px;letter-spacing:3px;}';
$custHtml .= '.hdr p{font-size:10px;color:#4a6280;margin:0;letter-spacing:4px;}';
$custHtml .= '.bd{padding:30px;}';
$custHtml .= '.greeting{font-size:20px;font-weight:700;color:#111;margin-bottom:16px;}';
$custHtml .= '.body-text{font-size:14px;color:#444;line-height:1.8;margin-bottom:20px;}';
$custHtml .= '.summary{background:#f5f8ff;border:1px solid #dce8ff;border-radius:8px;padding:18px 20px;margin-bottom:24px;}';
$custHtml .= '.sum-title{font-size:9px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:#1e78ff;margin-bottom:12px;}';
$custHtml .= '.sum-row{display:flex;gap:8px;margin-bottom:8px;font-size:13px;}';
$custHtml .= '.sum-key{color:#999;min-width:80px;font-size:12px;}';
$custHtml .= '.sum-val{color:#222;font-weight:600;}';
$custHtml .= '.cta-box{background:#060c18;border-radius:8px;padding:20px 22px;margin-bottom:24px;}';
$custHtml .= '.cta-box p{font-size:13px;color:#6a82a8;margin:0 0 12px;line-height:1.6;}';
$custHtml .= '.cta-btn{display:inline-block;background:#1e78ff;color:#fff;text-decoration:none;padding:10px 22px;border-radius:6px;font-size:13px;font-weight:700;letter-spacing:1px;}';
$custHtml .= '.sig{font-size:13px;color:#666;line-height:1.8;}';
$custHtml .= '.sig strong{color:#111;}';
$custHtml .= '.sig .tag{font-size:10px;color:#aaa;letter-spacing:2px;margin-top:4px;}';
$custHtml .= '.ftr{background:#f0f4ff;padding:14px 30px;text-align:center;font-size:10px;color:#bbb;}';
$custHtml .= 'a{color:#1e78ff;}</style></head><body>';
$custHtml .= '<div class="wrap">';
$custHtml .= '<div class="hdr"><h1>ANOVEX TECHNOLOGIES</h1><p>PROPOSAL CONFIRMATION</p></div>';
$custHtml .= '<div class="bd">';
$custHtml .= '<div class="greeting">Dear ' . $firstName . ',</div>';
$custHtml .= '<div class="body-text">Thank you for contacting <strong>Anovex Technologies</strong>. We have successfully received your proposal and our team will review it carefully.<br><br>You can expect to hear back from us <strong>within 24 hours</strong> with next steps.</div>';

$custHtml .= '<div class="summary">';
$custHtml .= '<div class="sum-title">Your Proposal Summary</div>';
$custHtml .= '<div class="sum-row"><span class="sum-key">Service</span><span class="sum-val">' . $sv . '</span></div>';
$custHtml .= '<div class="sum-row"><span class="sum-key">Budget</span><span class="sum-val">' . $bg . '</span></div>';
$custHtml .= '<div class="sum-row"><span class="sum-key">Timeline</span><span class="sum-val">' . $tl . '</span></div>';
$custHtml .= '</div>';

$custHtml .= '<div class="cta-box">';
$custHtml .= '<p>Have an urgent question in the meantime? Our team is available and ready to help.</p>';
$custHtml .= '<a href="mailto:info@anovextechnologies.net" class="cta-btn">Contact Us Directly</a>';
$custHtml .= '</div>';

$custHtml .= '<div class="sig">';
$custHtml .= '<strong>Warm regards,</strong><br>';
$custHtml .= 'The Anovex Technologies Team<br>';
$custHtml .= '<div class="tag">AI &nbsp;&middot;&nbsp; ERP &nbsp;&middot;&nbsp; GOVTECH &nbsp;&middot;&nbsp; ANALYTICS</div>';
$custHtml .= '</div></div>';
$custHtml .= '<div class="ftr">&copy; ' . date('Y') . ' Anovex Technologies &nbsp;&middot;&nbsp; <a href="' . $siteUrl . '">' . $siteUrl . '</a></div>';
$custHtml .= '</div></body></html>';

/* ================================================================
   DISPATCH BOTH EMAILS
   ================================================================ */
$sentAdmin    = sendEmail(
    $adminEmail, $fromName,
    $fromAddress, $fromName,
    $email, $name,
    $adminSubject, $adminPlain, $adminHtml
);

$sentCustomer = sendEmail(
    $email, $name,
    $fromAddress, $fromName,
    $adminEmail, $fromName,
    $customerSubject, $custPlain, $custHtml
);

/* ── Log if either failed ── */
if (!$sentAdmin || !$sentCustomer) {
    $log   = __DIR__ . '/mail_debug.log';
    $entry = date('[Y-m-d H:i:s]')
        . ' admin:' . ($sentAdmin    ? 'OK' : 'FAIL')
        . ' customer:' . ($sentCustomer ? 'OK' : 'FAIL')
        . ' to:' . $adminEmail . ' customer:' . $email . "\n";
    @file_put_contents($log, $entry, FILE_APPEND | LOCK_EX);
}

/* ── Always save submission locally as backup ── */
$save  = __DIR__ . '/submissions.log';
$entry = date('[Y-m-d H:i:s]') . "\n" . $adminPlain . str_repeat('-', 40) . "\n";
@file_put_contents($save, $entry, FILE_APPEND | LOCK_EX);

/* ── Response ── */
if ($sentAdmin || $sentCustomer) {
    echo json_encode([
        'success' => true,
        'message' => 'Thank you, ' . $firstName . '! Your proposal has been received. '
                   . 'We\'ve sent a confirmation to ' . $email . ' and will be in touch within 24 hours.',
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Your submission was saved but mail could not be sent from this server. '
                   . 'Please email us directly at info@anovextechnologies.net.',
    ]);
}