<?php


class Homework
{
    public function __construct()
    {
    }

    static public function fetchHomework()
    {
        $conn = Utility::pdoConnect();
        $data = $conn->query("select * from homework, subjects, teacher WHERE homework.subject_id = subjects.subject_id AND subjects.subject_teacher_id = teacher.teacher_id");
        return $data;
    }

    static public function displayHomework($data)
    {
        ?>
        <div class="container">
            <?php foreach ($data as $row) :
                ?>
                <div class="card-group">
                    <div class="card border-dark mb-3" style="width: 36rem;">
                        <div class="card-body">
                            <h3 class="card-title"><?= $row['subject_abbreviation'] . ": " . $row['title'] ?></h3>
                            <h5 class="card-text">Beschrijving: <?= $row['description'] ?></h5>
                            <br>
                            <h5 class="card-subtitle mb-2">Deadline: <?= $row['deadline'] ?></h5>
                            <hr>
                            <p class="card-subtitle mb-2">Vak: <?= $row['subject_name'] ?></p>
                            <p class="card-subtitle mb-2">Docent: <?= $row['teacher_name'] ?> (<?= $row['teacher_email']?>)</p>
                 
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
        <?php
    }

    public function sendFeedback($name, $email, $feedback)
    {
        if (!empty($name) && (!empty($email) && (!empty($feedback)))) {
            $conn = Utility::pdoConnect();
            $send = $conn->prepare("INSERT INTO feedback (id, name, email, feedback) VALUES  ((SELECT UUID()), ?, ?, ?)");
            $send->bindParam(1, $name);
            $send->bindParam(2, $email);
            $send->bindParam(3, $feedback);
            $send->execute();
            RedirectHandler::HTTP_301('dashboard.php');
            echo "Works";
        } else {
            echo "Error";
        }
    }
}