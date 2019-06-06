<?php


class Homework
{
    public function __construct()
    {

    }

    static public function fetchHomework($currentdate)
    {
        $conn = Utility::pdoConnect();
        $data = $conn->query("select * from homework, subjects, teacher WHERE homework.subject_id = subjects.subject_id AND subjects.subject_teacher_id = teacher.teacher_id AND homework.deadline >= '$currentdate'");
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

    public function sendFeedback($feedback, $name = null, $email = null)
    {
        if (!empty($feedback)) {
            $conn = Utility::pdoConnect();
            $send = $conn->prepare("INSERT INTO feedback (id, name, email, feedback) VALUES  ((SELECT UUID()), ?, ?, ?)");
            $send->bindParam(1, $name);
            $send->bindParam(2, $email);
            $send->bindParam(3, $feedback);
            $send->execute();
            echo "Works";
        } else {
            echo "Error";
        }
    }

    public function createHomework($title, $description, $subject, $deadline)
    {
        if (!empty($title) && !empty($description) && !empty($subject) && !empty($deadline)) {
            $conn = Utility::pdoConnect();
            $send = $conn->prepare("INSERT INTO homework (id, title, description, subject_id, deadline) VALUES  ((SELECT UUID()), ?, ?, ?, ?)");
            $send->bindParam(1, $title);
            $send->bindParam(2, $description);
            $send->bindParam(3, $subject);
            $send->bindParam(4, $deadline);
            $send->execute();
            echo "OK!";
        } else {
            echo "Yo";
        }
    }

    public function fetchSubject()
    {
        $conn = Utility::pdoConnect();
        $fetch = $conn->query("SELECT * FROM subjects");
        return $fetch;
    }

    static public function getFeedback()
    {
        $conn = Utility::pdoConnect();
        $data = $conn->query("select * from feedback");
        return $data;
    }

    static public function displayFeedback($data)
    {
        ?>
        <div class="container">
            <div class='col-md-12'>
                <form method="get">
                    <table class='table'>
                        <thead class='thead-light'>
                        <tr>
                            <th scope='col'>Naam</th>
                            <th scope='col'>Email</th>
                            <th scope='col'>Feedback</th>
                        </tr>
                        <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['feedback'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <?php
    }
}