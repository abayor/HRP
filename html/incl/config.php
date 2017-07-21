<?php

// Maximum file size in MB.


// Allowed file types. On the left side is user friendly file type presentation, on the right side is mime type presentation (you can found almost all mime types on this site: http://www.freeformatter.com/mime-types-list.html).
// You can add as many file types as you want. If array is empty ( $file_types = array(); ), than all file types will be accepted.

// Text for file types - this text appear in file input so user can see which file types are allowed in attachment. If you leave this string empty, left values from $file_types will be shown (if even $file_types is empty than "All" will be shown).


// Text that is shown before submit button
$submit_label = "";

// Write in address where the mail is sent.
$recipient = "olaasunkami@gmail.com";

// E-mail address that is shown in received mail. Write in "contact_form" if you want that user e-mail from contact form is shown in received mail.
$send_from = "contact_form";

// Name that is shown in received mail. Write in "contact_form" if you want that user first name and last name from contact form is shown in received mail.
$send_from_name = "contact_form";

// E-mail subject.
$subject = "Email from HRP";

// Text displayed if mail was successfully sent.
$message_success = "<div class='alert alert-success top40'>Mail was sent successfully.</div>";

// Text displayed if there was a problem sending mail.
$message_fail = "<div class='alert alert-danger top40'>There was a problem to send a mail.</div>";

?>