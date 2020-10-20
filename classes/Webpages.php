<?php
/* Class Webpages */
class Webpages
{
    /* Connect to database + add table name */
    private $conn;
    private $table_name = "webpages";

    /* Course properties */
    public $web_id;
    public $web_title; 
    public $url;
    public $description;

    /* Constructor */
    public function __construct($db)
    {
        $this->conn = $db;
    }

    /* GET all webpages */
    public function getAll() 
    {
        $query = "SELECT * FROM  courses.webpages";

        /* Prepare and execute statement */
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }


    /* GET one webpage */
    public function getOne() 
    {
        $query = "SELECT * FROM courses.webpages WHERE web_id = ?";

        /* Prepare statment */
        $stmt = $this->conn->prepare($query);
        /* Bind data */
        $stmt->bindParam(1, $this->web_id);
        /* Execute statement */
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->web_id = $row['web_id'];
        $this->web_title = $row['web_title']; 
        $this->url = $row['url'];
        $this->description = $row['description'];
    }


    /* Create new webpage */
    public function create()
    {
        $query = "INSERT INTO courses.webpages 
        SET
            web_title = :web_title,
            url = :url,
            description = :description";

        /* Prepare statement */
        $stmt = $this->conn->prepare($query);

        /* Clean up in data */
        $this->web_title = htmlspecialchars(strip_tags($this->web_title));
        $this->url = htmlspecialchars(strip_tags($this->url));
        $this->description = htmlspecialchars(strip_tags($this->description));

        /* Bind data */
        $stmt->bindParam(':web_title', $this->web_title);
        $stmt->bindParam(':url', $this->url);
        $stmt->bindParam(':description', $this->description);

        /* Execute */
        if ($stmt->execute()) {
            return true;
        }
        /* Error message */
        printf('Error: %s.\n', $stmt->error);
        return false;
    }

/* Update webpage */
public function update()
{
    $query = "UPDATE courses.webpages 
    SET
    web_title = :web_title,
    url = :url,
    description = :description
    WHERE
        web_id = :web_id";

    /* Prepare statement */
    $stmt = $this->conn->prepare($query);

    /* Clean up in data */
    $this->web_id = htmlspecialchars(strip_tags($this->web_id));
    $this->web_title = htmlspecialchars(strip_tags($this->web_title));
    $this->url = htmlspecialchars(strip_tags($this->url));
    $this->description = htmlspecialchars(strip_tags($this->description));

    /* Bind data */
    $stmt->bindParam(':web_id', $this->web_id);
    $stmt->bindParam(':web_title', $this->web_title);
    $stmt->bindParam(':url', $this->url);
    $stmt->bindParam(':description', $this->description);

    /* Execute */
    if ($stmt->execute()) {
        return true;
    }
    /* Error message */
    printf('Error: %s.\n', $stmt->error);
    return false;
}

    /* Delete post */
    public function delete()
    {
        if (isset($_GET['web_id'])) {
            $web_id = $_GET['web_id'];

            $query = "DELETE FROM courses.webpages WHERE web_id = $web_id";
            $stmt = $this->conn->prepare($query);

            /* Clean data */
            $this->web_id = htmlspecialchars(strip_tags($this->web_id));

            /* Bind data */
            $stmt->bindParam(1, $this->web_id);
            /* Execute */
            if ($stmt->execute()) {
                return true;
            }
            /* Error message */ 
            printf('Error: %s.\n', $stmt->error);
            return false;
        }
    }
}