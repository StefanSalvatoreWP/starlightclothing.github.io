<?php
require_once('dbconfig.php');

class User {
    private $db_con;
    private $state;
    private $errMsg;

    public function __construct() {
        try {
            $db = new Database();
            if ($db->getState() == 1) {
                $this->db_con = $db->getDbConnection();
                $this->state = 1;
            } else {
                $this->state = 0;
                $this->errMsg = $db->getErrorMessage();
            }
        } catch (PDOException $e) {
            $this->state = 0;
            $this->errMsg = $e->getMessage();
        }
    }

    public function getState() {
        return $this->state;
    }

    public function getErrorMessage() {
        return $this->errMsg;
    }

    public function getDbConnection() {
        return $this->db_con;
    }

    public function signUp($username, $password) {
        if ($this->getState() == 1) {
            try {
                $sql = "INSERT INTO clothing (username, password) VALUES (:username, :password)";
                $stmt = $this->db_con->prepare($sql);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $stmt->execute();
                return true; // SignUp successful
            } catch (PDOException $e) {
                $this->errMsg = $e->getMessage();
                return false; // SignUp failed
            }
        } else {
            $this->errMsg = 'Database connection error';
            return false; // SignUp failed
        }
    }

    public function authenticate($username, $password) {
        if ($this->getState() == 1) {
            try {
                $sql = "SELECT * FROM clothing WHERE username = :username AND password = :password";
                $stmt = $this->db_con->prepare($sql);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($result) {
                    // Authentication successful
                    return true;
                } else {
                    // Authentication failed
                    return false;
                }
            } catch (PDOException $e) {
                $this->errMsg = $e->getMessage();
                return false;
            }
        } else {
            $this->errMsg = 'Database connection error';
            return false;
        }
    }

    public function processForm() {
        session_start(); // Start the session

        if (isset($_POST['signup_submit'])) {
            // Handle signup form submission
            $username = $_POST['signup_username'];
            $password = $_POST['signup_password'];

            if ($this->signUp($username, $password)) {
                // Signup successful
                $userData = array(
                    'username' => $username,
                    // Add other relevant user data here
                );

                // Store the user data in the session
                $_SESSION['user'] = $userData;

                // Redirect to dashboard.php or perform other actions
                header('Location: ../index.php');
                exit();
            } else {
                // Signup failed
                // Redirect to an error page or display an error message
                echo "Signup failed";
            }
        }

        if (isset($_POST['login_submit'])) {
            // Handle login form submission
            $username = $_POST['login_username'];
            $password = $_POST['login_password'];

            if ($this->authenticate($username, $password)) {
                // Authentication successful
                $userData = array(
                    'username' => $username,
                    // Add other relevant user data here
                );

                // Store the user data in the session
                $_SESSION['user'] = $userData;

                // Redirect to dashboard.php or perform other actions
                header('Location: ../dashboard.php');
                exit();
            } else {
                // Authentication failed
                // Redirect to an error page or display an error message
                header('Location: ../index.php');
            }
        }
    }
}

$user = new User();
$user->processForm();
?>
