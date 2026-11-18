<?php
    
// this code is used to connect the database and php

@$db = new mysqli('localhost', 'root', '', 'faccio_la_pizza');
    // hostname, user, password, database name

     if (mysqli_connect_errno()) {
       echo "<p>Error: Could not connect to database.<br/>
             Please try again later.</p>";
       exit;
    }

?>