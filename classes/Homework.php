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
        foreach ($data as $row) :
            ?>
            <div class="card" style="width: 36rem;">
                <div class="card-body">
                    <h5 class="card-title">Titel: <?= $row['title'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Vak: <?= $row['subject'] ?></h6>
                    <p class="card-text"><?= $row['homework'] ?></p>
                    <h6 class="card-subtitle mb-2 text-muted">Einddatum: <?= $row['deadline'] ?></h6>
                    <a href="#" class="card-link"><?= $row['file'] ?></a>
                </div>
            </div>
        <?php
        endforeach;
    }
}