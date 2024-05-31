<?php
require "db.php";

// Define a base class for database operations
// ENCAPSULATION PROCESS
class Database {
    protected $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    protected function testInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function uploadImage($name, $dest) {
        $target_dir = $dest;
        $target_file = $target_dir . basename($_FILES[$name]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES[$name]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES[$name]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES[$name]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    protected function insertToDB($table, $data) {
        $columns = implode(", ", array_keys($data));
        $prefixed_array = preg_filter('/^/', ':', array_keys($data));
        $values = implode(", ", $prefixed_array);

        try {
            $sql = "INSERT INTO $table ($columns) VALUES ($values)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);
            echo "New records created successfully";
        } catch (PDOException $error) {
            echo $error;
        }
    }
}

// Define individual classes for different types of data insertion, inheriting from Database
// INHERITANCE PROCESSS
class Article extends Database {
    public function insert($data) {
        $data['article_created_time'] = date('Y-m-d H:i:s');
        $data['article_image'] = $this->testInput($_FILES["arImage"]["name"]);
        $this->uploadImage("arImage", "../img/article/");
        $this->insertToDB('article', $data);
    }
}

class Category extends Database {
    public function insert($data) {
        $data['category_image'] = $this->testInput($_FILES["catImage"]["name"]);
        $this->uploadImage("catImage", "../img/category/");
        $this->insertToDB('category', $data);
    }
}

class Author extends Database {
    public function insert($data) {
        $data['author_avatar'] = $this->testInput($_FILES["authImage"]["name"]);
        $this->uploadImage("authImage", "../img/avatar/");
        $this->insertToDB('author', $data);
    }
}

// Factory class to create the appropriate type of object based on input
// POLYMORPHISM PROCESS
class InsertFactory {
    public static function create($type, $conn) {
        switch ($type) {
            case "article":
                return new Article($conn);
            case "category":
                return new Category($conn);
            case "author":
                return new Author($conn);
            default:
                throw new Exception("Invalid type");
        }
    }
}

// Controller to handle the request
// ABSTRACTION PROCESS
class InsertController {
    private $type;
    private $conn;

    public function __construct($type, $conn) {
        $this->type = $type;
        $this->conn = $conn;
    }

    public function processRequest() {
        if (isset($_POST["submit"])) {
            $data = $this->prepareData();
            $object = InsertFactory::create($this->type, $this->conn);
            $object->insert($data);
            $this->redirect();
        }
    }

    private function prepareData() {
        switch ($this->type) {
            case "article":
                return array(
                    "article_title" => $this->testInput($_POST["arTitle"]),
                    "article_content" => $_POST["arContent"],
                    "id_categorie" => $this->testInput($_POST["arCategory"]),
                    "id_author" => $this->testInput($_POST["arAuthor"])
                );
            case "category":
                return array(
                    "category_name" => $this->testInput($_POST["catName"]),
                    "category_color" => $this->testInput($_POST["catColor"])
                );
            case "author":
                return array(
                    "author_fullname" => $this->testInput($_POST["authName"]),
                    "author_desc" => $this->testInput($_POST["authDesc"]),
                    "author_email" => $this->testInput($_POST["authEmail"]),
                    "author_github" => $this->testInput($_POST["authGithub"])
                );
            default:
                throw new Exception("Invalid type");
        }
    }

    private function testInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    private function redirect() {
        switch ($this->type) {
            case "article":
                header("Location: ../index.php", true, 301);
                exit;
            case "category":
                header("Location: ../categories.php", true, 301);
                exit;
            case "author":
                header("Location: ../author.php", true, 301);
                exit;
        }
    }
}

// Main execution
try {
    if ($conn) {
        $type = $_GET['type'];
        $controller = new InsertController($type, $conn);
        $controller->processRequest();
    } else {
        echo 'Error: ' . $e->getMessage();
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
