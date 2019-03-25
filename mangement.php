<?php
header('Access-Control-Allow-Origin: *');
// Define database connection parameters
$hn = 'localhost';
$un = 'root';
$pwd = 'root';
$db = 'Tunisiasmartcities';
$cs = 'utf8';
$dsn = "mysql:host=" . $hn . ";port=8889;dbname=" . $db . ";charset=" . $cs;
$opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES => false,
);
// Create a PDO instance (connect to the database)
$pdo = new PDO($dsn, $un, $pwd, $opt);
// Retrieve specific parameter from supplied URL
$key = strip_tags($_REQUEST['key']);
$data = array();
switch ($key) {
    // Add a new record to the technologies table
    case "create":
        // Sanitise URL supplied values

   //     id 	societe 	specialte 	nom 	prenom 	post 	contact_1 	contact_2 	mail_1 	mail_2 	adresse 	site
        $societe = filter_var($_REQUEST['societe'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $specialte = filter_var($_REQUEST['specialte'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $nom = filter_var($_REQUEST['nom'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $prenom = filter_var($_REQUEST['prenom'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $post = filter_var($_REQUEST['post'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $contact_1 = filter_var($_REQUEST['contact_1'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $contact_2 = filter_var($_REQUEST['contact_2'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $mail_1 = filter_var($_REQUEST['mail_1'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $mail_2 = filter_var($_REQUEST['mail_2'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $adresse = filter_var($_REQUEST['adresse'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $site = filter_var($_REQUEST['site'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $id_user = filter_var($_REQUEST['id_user'], FILTER_SANITIZE_NUMBER_INT);
        // Attempt to run PDO prepared statement
        try {
            $sql = "INSERT INTO data (societe,  specialte,  nom,  prenom, post, contact_1,  contact_2,  mail_1, mail_2, adresse,  site, id_user ) 
                    VALUES (:societe, :specialte, :nom,  :prenom, :post, :contact_1,  :contact_2,  :mail_1, :mail_2, :adresse,  :site, :id_user)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':societe', $societe, PDO::PARAM_STR);
            $stmt->bindParam(':specialte', $specialte, PDO::PARAM_STR);
            $stmt->bindParam(':mail_1', $mail_1, PDO::PARAM_STR);
            $stmt->bindParam(':mail_2', $mail_2, PDO::PARAM_STR);
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':prenom', $prenom, PDO::PARAM_INT);
            $stmt->bindParam(':post', $post, PDO::PARAM_STR);
            $stmt->bindParam(':contact_1', $contact_1, PDO::PARAM_STR);
            $stmt->bindParam(':contact_2', $contact_2, PDO::PARAM_STR);
            $stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR);
            $stmt->bindParam(':site', $site, PDO::PARAM_STR);
            $stmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);
            $stmt->execute();
            echo json_encode(array('message' => 'Cong'));
        } // Catch any errors in running the prepared statement
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        break;
    // Update an existing record in the technologies table
    case "update":
        // Sanitise URL supplied values
        $societe = filter_var($_REQUEST['societe'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $specialte = filter_var($_REQUEST['specialte'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $nom = filter_var($_REQUEST['nom'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $prenom = filter_var($_REQUEST['prenom'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $post = filter_var($_REQUEST['post'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $contact_1 = filter_var($_REQUEST['contact_1'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $contact_2 = filter_var($_REQUEST['contact_2'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $mail_1 = filter_var($_REQUEST['mail_1'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $mail_2 = filter_var($_REQUEST['mail_2'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $adresse = filter_var($_REQUEST['adresse'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $site = filter_var($_REQUEST['site'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
        $id_user = filter_var($_REQUEST['id_user'], FILTER_SANITIZE_NUMBER_INT);
        // Attempt to run PDO prepared statement
        try {
            $sql = "UPDATE data SET societe = :societe, specialte = :specialte, mail_1 = :mail_1,mail_2 = :mail_2, nom = :nom, prenom = :prenom,
              post = :post , contact_1 = :contact_1 , contact_2 = :contact_2 , adresse = :adresse , site = :site, id_user = :id_user WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':societe', $societe, PDO::PARAM_STR);
            $stmt->bindParam(':specialte', $specialte, PDO::PARAM_STR);
            $stmt->bindParam(':mail_1', $mail_1, PDO::PARAM_STR);
            $stmt->bindParam(':mail_2', $mail_2, PDO::PARAM_STR);
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':prenom', $prenom, PDO::PARAM_INT);
            $stmt->bindParam(':post', $post, PDO::PARAM_STR);
            $stmt->bindParam(':contact_1', $contact_1, PDO::PARAM_STR);
            $stmt->bindParam(':contact_2', $contact_2, PDO::PARAM_STR);
            $stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR);
            $stmt->bindParam(':site', $site, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $stmt->execute();
            echo json_encode('Congratulations the record ' . $id . ' was updated');
        } // Catch any errors in running the prepared statement
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        break;
    // Remove an existing record in the technologies table
    case "delete":
        // Sanitise supplied record ID for matching to table record
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
        // Attempt to run PDO prepared statement
        try {
            $pdo = new PDO($dsn, $un, $pwd);
            $sql = "DELETE FROM data WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            echo json_encode('Congratulations the record ' . $id . ' was removed');
        } // Catch any errors in running the prepared statement
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        break;
    case "select":
        // Sanitise supplied record ID for matching to table record
        $id_user = filter_var($_REQUEST['id_user'], FILTER_SANITIZE_NUMBER_INT);
        // Attempt to run PDO prepared statement
        try {
            $pdo = new PDO($dsn, $un, $pwd);
            $sql = "Select * FROM data WHERE id_user = :id_user";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $stmt->execute();
            while($row  = $stmt->fetch(PDO::FETCH_OBJ))
            {
                // Assign each row of data to associative array
                $data[] = $row;
            }
            // Return data as JSON
            echo json_encode($data);
        } // Catch any errors in running the prepared statement
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        break;
}
?>