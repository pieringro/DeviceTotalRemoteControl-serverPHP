<?php



//ricevo in GET una stringa criptata
//provo a decriptarla usando ogni uuid della tabella dtrc_pending_email_user_confirmation
//come chiave e come valore l'email corrispondente
//trovata la corrispondenza, elimino il record di dtrc_pending_email_user_confirmation
//e abilito l'utente su dtrc_users (flag inactive)

$cryptString = $_GET[EMAIL_KEY_NAME];

