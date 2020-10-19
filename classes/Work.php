<?php
/* Class Work */
class Work
{
    /* Connect to database + add table name */
    private $conn;
    private $table_name = "work";

    /* Work properties */
    public $work_id;
    public $company;
    public $title;
    public $length;
    

    /* Constructor */
    public function __construct($db)
    {
        $this->conn = $db;
    }

    /* GET all work */
    public function getAll()
    {
        $query = "SELECT * FROM  courses.work";

        /* Prepare and execute statement */
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }


    /* GET one work */
    public function getOne()
    {
        $query = "SELECT * FROM courses.work WHERE work_id = ?";

        /* Prepare statement */
        $stmt = $this->conn->prepare($query);
        /* Bind data */
        $stmt->bindParam(1, $this->work_id);
        /* Execute statement */
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->work_id = $row['work_id'];
        $this->company = $row['company'];
        $this->title = $row['title'];
        $this->length = $row['length'];
        
    }


    /* Create new work */
    public function create()
    {
        $query = "INSERT INTO courses.work 
        SET
            company = :company,
            title = :title,
            length = :length";
            

        /* Prepare statement */
        $stmt = $this->conn->prepare($query);

        /* Clean up in data */
        $this->company = htmlspecialchars(strip_tags($this->company));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->length = htmlspecialchars(strip_tags($this->length));


        /* Bind data */
        $stmt->bindParam(':company', $this->company);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':length', $this->length);
    

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    /* Update work */
    public function update()
    {
        $query = "UPDATE courses.work
        SET
            company = :company,
            title = :title,
            length = :length
        WHERE
            work_id = :work_id";

        /* Prepare statement */
        $stmt = $this->conn->prepare($query);

        /* Clean up in data */
        $this->work_id = htmlspecialchars(strip_tags($this->work_id));
        $this->company = htmlspecialchars(strip_tags($this->company));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->length = htmlspecialchars(strip_tags($this->length));


        /* Bind data */
        $stmt->bindParam(':work_id', $this->work_id);
        $stmt->bindParam(':company', $this->company);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':length', $this->length);
     

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
        if (isset($_GET['work_id'])) {
            $work_id = $_GET['work_id'];

            $query = "DELETE FROM courses.work WHERE work_id = $work_id";
            $stmt = $this->conn->prepare($query);

            /* Clean data */
            $this->work_id = htmlspecialchars(strip_tags($this->work_id));

            /* Bind data */
            $stmt->bindParam(1, $this->work_id);
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