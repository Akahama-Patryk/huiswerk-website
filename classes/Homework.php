<?php


class Homework
{
    public function __construct()
    {
    }

    static public function fetchHomework()
    {
        $conn = Utility::pdoConnect();
        $data = $conn->query("select * from homework");
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
                            <h5 class="card-title">Titel: <?= $row['title'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Vak: <?= $row['subject'] ?></h6>
                            <p class="card-text"><?= $row['homework'] ?></p>
                            <h6 class="card-subtitle mb-2 text-muted">Einddatum: <?= $row['deadline'] ?></h6>
                            <a href="#" class="card-link"><?= $row['file'] ?></a>
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
            RedirectHandler::HTTP_301('index.php');
            echo "Works";
        } else {
            echo "Error";
        }
    }
}