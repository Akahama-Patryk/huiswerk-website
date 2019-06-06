<?php

/**
 * Class Homework
 */
class Homework
{
    /**
     * @param $current_date
     * @return false|PDOStatement
     *
     *  Fetches homework from database.
     */
    public static function fetch($current_date)
    {
        $conn = Utility::pdoConnect();
        $data = $conn->query("select * from homework, subjects, teacher 
WHERE homework.subject_id = subjects.subject_id AND subjects.subject_teacher_id = teacher.teacher_id 
AND homework.deadline >= '$current_date' ORDER BY homework.deadline ASC");
        return $data;
    }

    /**
     * @param $data
     *
     *  Displays homework.
     */
    static public function displayHomework($data)
    {
        ?>
        <div class="container">
            <?php foreach ($data as $row) :
                // convert freedom units to date.
                $freedom_unit_date = $row['deadline'];
                $dumb_dutch_date = date("l d-m-Y", strtotime($freedom_unit_date));
                ?>
                <div class="card-group">
                    <div class="card border-dark mb-3" style="width: 36rem;">
                        <div class="card-body">
                            <h3 class="card-title"><?= $row['subject_abbreviation'] . ": " . $row['title'] ?></h3>
                            <h5 class="card-text">Beschrijving: <?= $row['description'] ?></h5>
                            <br>
                            <h5 class="card-subtitle mb-2">Deadline: <?= $dumb_dutch_date ?></h5>
                            <hr>
                            <p class="card-subtitle mb-2">Vak: <?= $row['subject_name'] ?></p>
                            <p class="card-subtitle mb-2">Docent: <?= $row['teacher_name'] ?>
                                (<?= $row['teacher_email'] ?>)</p>

                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
        <?php
    }

    /**
     * @param $title
     * @param $description
     * @param $subject
     * @param $deadline
     * @return bool
     *
     *  Adds homework item to database.homework .
     */
    public static function add($title, $description, $subject, $deadline)
    {
        if (!empty($title) && !empty($description) && !empty($subject) && !empty($deadline)) {
            $conn = Utility::pdoConnect();
            $send = $conn->prepare("INSERT INTO homework (id, title, description, subject_id, deadline) VALUES  ((SELECT UUID()), ?, ?, ?, ?)");
            $send->bindParam(1, $title);
            $send->bindParam(2, $description);
            $send->bindParam(3, $subject);
            $send->bindParam(4, $deadline);
            $send->execute();
            return true;
        } else {
            return false;
        }
    }
}