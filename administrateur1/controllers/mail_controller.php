
<?php

  class mailController {
    public function reply() {
      // we store all the mail in a variable
     
      require_once('models/mail/reply.php');
    }

    public function show() {
      // we expect a url of form ?controller=mail&action=show&id=x
      // without an id we just redirect to the error page as we need the mail id to find it in the database

      require_once('views/mail/show.php');
    }
   


  }
?>