<?php
require_once('db.php');
$pdo = getDatabaseConnection();
var_dump($_POST);
// Define variables and initialize with empty values
$email = $password = $nom = $prenom = $telephone = "";
$email_err = $password_err = $nom_err = $prenom_err = $telephone_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($email, $password);
    // Validate username
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter a email.";
        // } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        //     $email_err = "Email can only contain letters, numbers, and underscores.";
    } else {
        // Prepare a select statement
        $sql = "SELECT email, motDePasse FROM Internautes WHERE email = :email";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $email_err = "This email is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    //validate personal info fields 
    if (empty(trim($_POST["nom"]))) {
        $nom_err = "Please enter a nom.";
    } else {
        $nom = trim($_POST["nom"]);
    }
    if (empty(trim($_POST["prenom"]))) {
        $prenom_err = "Please enter a prenom.";
    } else {
        $prenom = trim($_POST["prenom"]);
    }
    if (empty(trim($_POST["telephone"]))) {
        $telephone_err = "Please enter a telephone.";
    } else {
        $telephone = trim($_POST["telephone"]);
    }
    // // Validate confirm password
    // if (empty(trim($_POST["confirm_password"]))) {
    //     $confirm_password_err = "Please confirm password.";
    // } else {
    //     $confirm_password = trim($_POST["confirm_password"]);
    //     if (empty($password_err) && ($password != $confirm_password)) {
    //         $confirm_password_err = "Password did not match.";
    //     }
    // }

    // Check input errors before inserting in database
    if (empty($email_err) && empty($password_err) && empty($nom_err) && empty($prenom_err) && empty($telephone_err)) {

        // Prepare an insert statement
        try {

            $sql = "INSERT INTO Internautes (email, motDePasse, nom, prenom, telephone) VALUES (:email, :password, :nom, :prenom, :telephone)";

            if ($stmt = $pdo->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
                $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
                $stmt->bindParam(":nom", $nom, PDO::PARAM_STR);
                $stmt->bindParam(":prenom", $prenom, PDO::PARAM_STR);
                $stmt->bindParam(":telephone", $telephone, PDO::PARAM_STR);



                // Set parameters
                $param_email = $email;
                $param_password = $password;
                var_dump($sql, $param_email, $param_password, $nom);
                // $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                //! Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    // Redirect to login page
                    header("location: login.php");
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                var_dump($stmt);
                // Close statement
                unset($stmt);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Close connection
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 360px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control <?php echo (!empty($nom_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nom; ?>">
                <span class="invalid-feedback"><?php echo $nom_err; ?></span>
            </div>
            <div class="form-group">
                <label>Prenom</label>
                <input type="text" name="prenom" class="form-control <?php echo (!empty($prenom_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prenom; ?>">
                <span class="invalid-feedback"><?php echo $prenom_err; ?></span>
            </div>
            <div class="form-group">
                <label>Telephone</label>
                <input type="text" name="telephone" class="form-control <?php echo (!empty($telephone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $telephone; ?>">
                <span class="invalid-feedback"><?php echo $telephone_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>

</html>