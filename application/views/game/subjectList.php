<!DOCTYPE html>

<html>
<head>
	<title>SUBJECTS</title>
</head>
<body>
	<?php
		foreach($query->result() as $subject) {
			if ($subject->subject_name == "english") {
				echo form_open('subjectController/english');
				echo '<button type="submit" name="id" value="'.$subject->id.'">ENGLISH</button>';
				echo form_close();
			}
			else if ($subject->subject_name == "mathematics") {
				echo form_open('subjectController/mathematics');
				echo '<button type="submit" name="id" value="'.$subject->id.'">MATHEMATICS</button>';
				echo form_close();
			}
			else if ($subject->subject_name == "science") {
				echo form_open('subjectController/science');
				echo '<button type="submit" name="id" value="'.$subject->id.'">SCIENCE</button>';
				echo form_close();
			}
			else {
				echo form_open('subjectController/general_knowledge');
				echo '<button type="submit" name="id" value="'.$subject->id.'">GENERAL KNOWLEDGE</button>';
				echo form_close();
			}
		}
	?>
</body>
</html>