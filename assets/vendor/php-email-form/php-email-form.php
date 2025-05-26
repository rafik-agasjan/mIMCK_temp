<?php
/**
 * PHP Email Form Library
 * See: https://bootstrapmade.com/php-email-form/
 *
 */

class PHP_Email_Form {
  public $ajax = false;
  public $to;
  public $from_name;
  public $from_email;
  public $subject;
  public $smtp = null;
  
  private $messages = array();

  /**
   *
   * @param string $message
   * @param string $label
   * @param int $priority
   */
  public function add_message($message, $label = '', $priority = 0) {
    $this->messages[] = array(
      "label"    => $label,
      "message"  => $message,
      "priority" => $priority
    );
  }

  
  public function send() {
    usort($this->messages, function($a, $b) {
      return $a["priority"] - $b["priority"];
    });

    $body = "";
    foreach ($this->messages as $msg) {
      if (!empty($msg['label'])) {
        $body .= $msg['label'] . ": " . $msg['message'] . "\n";
      } else {
        $body .= $msg['message'] . "\n";
      }
    }

    $headers = "From: " . $this->from_name . " <" . $this->from_email . ">\r\n";
    $headers .= "Reply-To: " . $this->from_email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";


    if(mail($this->to, $this->subject, $body, $headers)) {
      return "OK";
    } else {
      return "Mail send failed. Please check your internet connection.";
    }
  }
}
?>