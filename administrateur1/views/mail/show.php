<form action='index.php?controller=mail&action=reply' method='POST' >
<input type="text" value="<?php echo $_GET['email'] ?>" name="email" readonly/>
<input type="textarea" name="message" placeholder=" le message à ecrire... "/>
<button type='submit'>Valider </button>

</form>