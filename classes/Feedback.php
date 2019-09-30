<?php
	
	/**
	 * Class Feedback
	 */
	class Feedback
	{
		/**
		 * @return false|PDOStatement
		 *
		 *  Fetches feedback from database.
		 */
		static public function fetch()
		{
			$conn = Utility::pdoConnect();
			$data = $conn->query("select * from feedback");
			return $data;
		}
		
		/**
		 * @param $data
		 *
		 *  displays feedback.
		 */
		static public function display($data)
		{
			?>
            <div class="table-responsive">
                <table class='table table-sm'>
                    <thead class='thead-light'>
                    <tr>
                        <th scope='col'>Naam</th>
                        <th scope='col'>Email</th>
                        <th scope='col'>Feedback</th>
                        <th scope='col'>Verwijder</th>
                    </tr>
                    <tbody>
		            <?php foreach ($data as $row) : ?>
                        <tr>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['feedback'] ?></td>
                            <td><a href="dashboardhandler.php?feedback_del_id=<?= $row['id'] ?>">
                                    <i class="fas fa-times"></i>
                        </tr>
		            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
			<?php
		}
		
		/**
		 * @param $feedback
		 * @param null $name
		 * @param null $email
		 * @return bool
		 *
		 *  Saves feedback in database.
		 */
		public static function send($feedback, $name = null, $email = null)
		{
			if (!empty($feedback)) {
				$conn = Utility::pdoConnect();
				$send = $conn->prepare("INSERT INTO feedback (id, name, email, feedback) VALUES  ((SELECT UUID()), ?, ?, ?)");
				$send->bindParam(1, $name);
				$send->bindParam(2, $email);
				$send->bindParam(3, $feedback);
				$send->execute();
				return true;
			} else {
				return false;
			}
		}
	}