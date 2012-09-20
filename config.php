<?php
/*
** =====================================================================
** config.php
**
** includes email configuration settings for the SMS sending php script.
**
** Megawatt Sep 2012
** =====================================================================
*/

/*
** SMS_CNF_SMTP_SERVER: 
** this is the smtp server that is used to send the email to the 
** carrier. Often in the format smtp-server.somedomain.com, for example
*/
$SMS_CNF_SMTP_SERVER        = "smtp-server-name-here.filldomainhere.com";

/*
** SMS_CNF_ORIGINATOR_ADDRESS:
** name of the mail user the mail is sent from
*/
$SMS_CNF_ORIGINATOR_ADDRESS = "fillusername@filldomainname.com";

/*
** SMS_CNF_SUBJECT:
** This is a default subject sent to all outgoing messages. It can be 
** set to any sane value, it does not impact the way sending works
*/
$SMS_CNF_SUBJECT            = "SMS";

?>
