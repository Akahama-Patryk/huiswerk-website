<?php
	
	/**
	 * Class Homework
	 */
	class Homework
	{
		/**
		 * @param $order
		 *  string ASC/DESC in SQL.
		 * @param $show_old_data
		 *  bool If the SQL fetch should fetch older data.
		 * @param null $id
		 *  int Used in dashboard "huiswerk wijzigen".
		 * @return array
		 *
		 * Fetches homework from database.
		 */
		public static function fetch($order = "ASC", $show_old_data = true, $id = null)
		{
			$current_date = Utility::fetchCurrentDateTime();
			
			if (!empty($id)) {
				$conn = Utility::pdoConnect();
				$data = $conn->prepare("select * from homework, subjects, teacher
WHERE homework.subject_id = subjects.subject_id AND subjects.subject_teacher_id = teacher.teacher_id
AND homework.id = :id");
				$data->bindParam(':id', $id);
				$data->execute();
				return $data->fetchAll();
			} else {
				if ($show_old_data == false) {
					$conn = Utility::pdoConnect();
					$data = $conn->prepare("select * from homework, subjects, teacher
WHERE homework.subject_id = subjects.subject_id AND subjects.subject_teacher_id = teacher.teacher_id
AND homework.deadline >= :date ORDER BY homework.deadline $order");
					$data->bindParam(':date', $current_date);
					$data->execute();
					return $data->fetchAll();
				} else {
					$conn = Utility::pdoConnect();
					$data = $conn->prepare("select * from homework, subjects, teacher
WHERE homework.subject_id = subjects.subject_id AND subjects.subject_teacher_id = teacher.teacher_id
ORDER BY homework.deadline $order");
					$data->execute();
					return $data->fetchAll();
				}
			}
		}
		
		/**
		 * @param $data
		 *
		 *  Displays homework.
		 */
		public static function displayHomework($data)
		{
			?>
			
			<?php foreach ($data as $row) :
			// Set locale to dutch for date.
			setlocale(LC_TIME, 'NL_nl');
			?>
            <div class="col-lg-12" xmlns:max-height="http://www.w3.org/1999/xhtml">
                <div class="card-group style=" max-height:12em;
                "">
                <div class="card border-dark mb-3" style="min-width: 36rem;">
                    <div class="card-body">
                        <h3 class="card-title"><?= $row['subject_abbreviation'] . ": " . $row['title'] ?></h3>
                        <h5 class="card-text" style="max-height:8em;">Beschrijving: <?= $row['description'] ?></h5>
                        <br>
                        <h5 class="card-subtitle mb-2">Deadline: <?= strftime("%A %d-%m-%G",
								strtotime($row['deadline'])) ?></h5>
                        <hr>
                        <p class="card-subtitle mb-2">Vak: <?= $row['subject_name'] ?></p>
                        <p class="card-subtitle mb-2">Docent: <?= $row['teacher_name'] ?>
                            (<?= $row['teacher_email'] ?>)</p>

                    </div>
                </div>
            </div>
            </div>
		<?php
		endforeach;
			?>
			
			<?php
		}
		
		/**
		 * @param $data
		 */
		
		static public function displayAdminHomework($data)
		{
			?>
            <div class="container">
                <div class='col-md-12'>
                    <form method="GET" action="">
                        <table class='table'>
                            <thead class='thead-light'>
                            <tr>
                                <th scope='col'>Titel van huiswerk</th>
                                <th scope='col'>Omschrijving van huiswerk</th>
                                <th scope='col'>Vak</th>
                                <th scope='col'>Deadline</th>
                                <th scope='col'>Update</th>
                                <th scope='col'>Delete</th>
                            </tr>
                            <tbody>
							<?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $row['title'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td><?= $row['subject_name'] ?></td>
                                    <td><?= $row['deadline'] ?></td>
                                    <td><a href="huiswerk/wijzig.php?id=<?= $row['id'] ?>">
                                            Wijzig
                                        </a></td>
                                    <td><a href="?id=<?= $row['id'] ?>">
                                            Verwijder
                                        </a></td>
                                </tr>
							<?php endforeach; ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
			<?php
		}
		
		static public function deleteHomework($id)
		{
			if (!empty($id)) {
				$conn = Utility::pdoConnect();
				$del = $conn->prepare("DELETE FROM homework WHERE homework.id = ?;");
				$del->bindParam(1, $id);
				$del->execute();
			} else {
				http_response_code(405);
			}
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
			if (!empty($title) && !empty($subject) && !empty($deadline)) {
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
		
		public static function update($id, $title, $description, $subject, $deadline)
		{
			if (!empty($id) && !empty($title) && !empty($subject) && !empty($deadline)) {
				$conn = Utility::pdoConnect();
				$send = $conn->prepare("Update homework set title = ?, description = ?, subject_id = ?, deadline = ? where id = ?;");
				$send->bindParam(1, $title);
				$send->bindParam(2, $description);
				$send->bindParam(3, $subject);
				$send->bindParam(4, $deadline);
				$send->bindParam(5, $id);
				$send->execute();
				return true;
			} else {
				return false;
			}
		}
	}