/* 寄送 mail */
if (isset($b_mailtouser) && $b_mailtouser == 1) {
  mb_internal_encoding('UTF-8');
  $subject = mb_encode_mimeheader("[行政公布欄] $b_sub", "UTF-8", "B");
  $mailto = 'teachers@edu.tw';
  $sender = 'noreply@edu.tw';
  $mailbody = "<h3>$b_sub</h3>\r\n";
  $mailbody .= nl2br($b_con) . "<br />\r\n";
  if ($_FILES[b_upload][name] !="" ) {
    $mailbody .= "<p>附件：<a href=\"$download_path$b_upload_name\">$b_upload_name</a></p>\r\n";
  }
  if (isset($b_url) && $b_url != "") {
    $stripurl = explode('://', $b_url);
    if (!$stripurl[1]) $b_url = "http://$b_url";
    $mailbody .= "<p>相關網址：<a href=\"$b_url\">$b_url</a></p>\r\n";
  }
  $mailheader = 'From: noreply <noreply@edu.tw>' . "\r\n";
  $mailheader .= 'MIME-Version: 1.0' . "\r\n";
  $mailheader .= 'Content-type: text/html; charset=utf-8' . "\r\n";
  $extraoption = '-f noreply@edu.tw';
  mail($mailto, $subject, $mailbody, $mailheader, $extraoption);
}
/* end of 寄送 mail */
