<!DOCTYPE html>

<html>
<head>
	<title>SUBJECTS</title>
	<link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
	    	<link href="<?php echo base_url();?>css/bootstrap-responsive.css" media="screen" rel="stylesheet" type="text/css" />
	    	<link href="<?php echo base_url();?>css/common.css" media="screen" rel="stylesheet" type="text/css" />
	    	<link href="<?php echo base_url();?>css/fontawesome.css" media="screen" rel="stylesheet" type="text/css" />
			<link href="<?php echo base_url();?>css/mainmenu.css" media="screen" rel="stylesheet" type="text/css" />
	    	
</head>
<body>
	   <div id="page-wrapper">
      <div id="absolute-wrapper">
        <div class="image image-1">
		 <?php
		foreach($query->result() as $subject) {
			if ($subject->subject_name == "english") {
				echo form_open('subjectController/english');
				echo '<button class="btn btn-1 btn-5" type="submit" name="id" value="'.$subject->id.'">ENGLISH</button>';
				echo form_close();
			}
			else if ($subject->subject_name == "mathematics") {
				echo form_open('subjectController/mathematics');
				echo '<button class="btn btn-1 btn-2 btn-3" type="submit" name="id" value="'.$subject->id.'">MATHEMATICS</button>';
				echo form_close();
			}
			else if ($subject->subject_name == "science") {
				echo form_open('subjectController/science');
				echo '<button class="btn btn-2 btn-3 btn-4" type="submit" name="id" value="'.$subject->id.'">SCIENCE</button>';
				echo form_close();
			}
			else {
				echo form_open('subjectController/general_knowledge');
				echo '<button class="btn btn-2 btn-4 btn-6" type="submit" name="id" value="'.$subject->id.'">GENERAL KNOWLEDGE</button>';
				echo form_close();
			}
		}
	?>
        </div>
        <img src="<?php echo base_url();?>images/kdis.jpg" class="image image-2">
      </div>
    </div>

</body>
</html>