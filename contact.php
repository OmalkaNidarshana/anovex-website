<?php
/**
 * Anovex Technologies — contact.php
 * Receives POST from the "Submit Your Proposal" form
 * and sends it to info@anovextechnologies.net
 */

header('Content-Type: application/json');

/* ── Allow only POST ── */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

/* ── Honeypot spam check ── */
if (!empty($_POST['website'])) {
    http_response_code(200);
    echo json_encode(['success' => true, 'message' => 'Thank you!']); // silent discard
    exit;
}

/* ── Collect & sanitise fields ── */
function clean(string $v): string {
    return htmlspecialchars(trim(strip_tags($v)), ENT_QUOTES, 'UTF-8');
}

//$to          = 'info@anovextechnologies.net';
$to          = 'omalkanidarshana@gmail.com';
$name        = clean($_POST['name']        ?? '');
$email       = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$company     = clean($_POST['company']     ?? '');
$phone       = clean($_POST['phone']       ?? '');
$service     = clean($_POST['service']     ?? '');
$budget      = clean($_POST['budget']      ?? '');
$timeline    = clean($_POST['timeline']    ?? '');
$message     = clean($_POST['message']     ?? '');

/* ── Validation ── */
$errors = [];
if (empty($name))                                  $errors[] = 'Name is required.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL))    $errors[] = 'A valid email is required.';
if (empty($message))                               $errors[] = 'Project description is required.';

if ($errors) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

/* ── Build email body ── */
$subject = "New Proposal from {$name}" . ($company ? " ({$company})" : '');

$body = <<<TEXT
═══════════════════════════════════════════
  ANOVEX TECHNOLOGIES — NEW PROPOSAL
═══════════════════════════════════════════

CONTACT
  Name     : {$name}
  Email    : {$email}
  Company  : {$company}
  Phone    : {$phone}

PROJECT DETAILS
  Service  : {$service}
  Budget   : {$budget}
  Timeline : {$timeline}

MESSAGE
{$message}

═══════════════════════════════════════════
Submitted : {$_SERVER['REQUEST_TIME_FLOAT']} UTC
IP        : {$_SERVER['REMOTE_ADDR']}
═══════════════════════════════════════════
TEXT;

/* ── HTML version ── */
$html = '<!DOCTYPE html><html><head><meta charset="UTF-8">
<style>
  body{font-family:Arial,sans-serif;background:#f4f6fb;color:#222;margin:0;padding:0;}
  .wrap{max-width:620px;margin:32px auto;background:#fff;border-radius:8px;overflow:hidden;box-shadow:0 2px 16px rgba(0,0,0,.1);}
  .hdr{background:#060c18;padding:28px 32px;text-align:center;}
  .hdr h1{font-size:20px;color:#00d4ff;margin:0;letter-spacing:2px;font-family:Arial,sans-serif;}
  .hdr p{font-size:11px;color:#6a82a8;margin:4px 0 0;letter-spacing:3px;}
  .body{padding:28px 32px;}
  .sec{margin-bottom:24px;}
  .sec-title{font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:#1e78ff;border-bottom:1px solid #eef;padding-bottom:6px;margin-bottom:12px;}
  .row{display:flex;gap:16px;margin-bottom:8px;}
  .field{flex:1;}
  .label{font-size:11px;color:#888;margin-bottom:2px;}
  .value{font-size:14px;color:#222;font-weight:500;}
  .msg{background:#f8faff;border-left:3px solid #1e78ff;padding:14px 16px;border-radius:0 6px 6px 0;font-size:14px;line-height:1.7;color:#333;white-space:pre-wrap;}
  .ftr{background:#f0f4ff;padding:16px 32px;text-align:center;font-size:11px;color:#aaa;}
</style></head><body>
<div class="wrap">
  <div class="hdr">
    <h1>ANOVEX TECHNOLOGIES</h1>
    <p>NEW PROPOSAL SUBMISSION</p>
  </div>
  <div class="body">
    <div class="sec">
      <div class="sec-title">Contact</div>
      <div class="row">
        <div class="field"><div class="label">Name</div><div class="value">' . $name . '</div></div>
        <div class="field"><div class="label">Email</div><div class="value"><a href="mailto:' . $email . '" style="color:#1e78ff">' . $email . '</a></div></div>
      </div>
      <div class="row">
        <div class="field"><div class="label">Company</div><div class="value">' . ($company ?: '—') . '</div></div>
        <div class="field"><div class="label">Phone</div><div class="value">' . ($phone ?: '—') . '</div></div>
      </div>
    </div>
    <div class="sec">
      <div class="sec-title">Project Details</div>
      <div class="row">
        <div class="field"><div class="label">Service Interest</div><div class="value">' . ($service ?: '—') . '</div></div>
        <div class="field"><div class="label">Budget Range</div><div class="value">' . ($budget ?: '—') . '</div></div>
      </div>
      <div class="row">
        <div class="field"><div class="label">Timeline</div><div class="value">' . ($timeline ?: '—') . '</div></div>
      </div>
    </div>
    <div class="sec">
      <div class="sec-title">Project Description</div>
      <div class="msg">' . nl2br($message) . '</div>
    </div>
  </div>
  <div class="ftr">Submitted via anovextechnologies.com &nbsp;·&nbsp; ' . date('d M Y, H:i') . ' UTC</div>
</div>
</body></html>';

/* ── Headers ── */
$boundary = md5(uniqid());
$headers  = implode("\r\n", [
    "From: Anovex Web <noreply@anovextechnologies.net>",
    "Reply-To: {$name} <{$email}>",
    "MIME-Version: 1.0",
    "Content-Type: multipart/alternative; boundary=\"{$boundary}\"",
    "X-Mailer: PHP/" . phpversion(),
]);

$mime = "--{$boundary}\r\n"
      . "Content-Type: text/plain; charset=UTF-8\r\n"
      . "Content-Transfer-Encoding: 8bit\r\n\r\n"
      . $body . "\r\n"
      . "--{$boundary}\r\n"
      . "Content-Type: text/html; charset=UTF-8\r\n"
      . "Content-Transfer-Encoding: 8bit\r\n\r\n"
      . $html . "\r\n"
      . "--{$boundary}--";

/* ── Send ── */
$sent = mail($to, $subject, $mime, $headers);

if ($sent) {
    echo json_encode([
        'success' => true,
        'message' => "Thank you, {$name}! Your proposal has been received. We'll be in touch shortly.",
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'There was a problem sending your message. Please email us directly at info@anovextechnologies.net.',
    ]);
}