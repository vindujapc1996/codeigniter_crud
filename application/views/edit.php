<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/bootstrap.css">

    <title>Update</title>
</head>

<body style="background-color:hsla(9, 100%, 64%, 0.2);">
    <div class="container" style="background-color:mediumseagreen;">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card" style="background-color:rgb(200, 200, 200);">
                    <form method="POST" action="<?php echo base_url().'index.php/Student/update/'.$student['id']; ?>"
                    enctype="multipart/form-data"  style="margin-left:5%;margin-top:5%;">

                    <div class="form-group">
                    <h3 class="text-center">Update Student</h3>
                            <hr>
                            <label for="image"> Image:</label>
                          <input type="file" name="image">

                           <?php if ($student['image']) : ?>
                             <img src="<?php echo base_url('assets/uploads/' . $student['image']); ?>" alt="Current Profile Image" height="90" width="90">
                                <?php else : ?>
                               <p>No image available</p>
                                   <?php endif; ?>
                               </div>

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name"
                                value="<?php echo set_value('name', $student['name']); ?>">
                        </div>

                        <div class="form-group">
                            <label>Gender:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php
                                    echo set_radio('gender', 'male' , ($student['gender']=='male' )); ?>>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                                    <?php echo set_radio('gender', 'female' , ($student['gender']=='female' )); ?>>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="other" value="other"
                                    <?php echo set_radio('gender', 'other' , ($student['gender']=='other' )); ?>>
                                <label class="form-check-label" for="other">Other</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" class="form-control" name="dob"
                                value="<?php echo set_value('dob', $student['dob']); ?>">
                        </div>

                        <div class="form-group">
                            <label>Qualification:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="qualification[]" value="SSLC"
                                    id="sslc" <?php echo in_array('SSLC', explode(', ', $student['qualification'])) ? 'checked' : '' ; ?>>
                                <label class="form-check-label" for="sslc">SSLC</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="qualification[]" value="Plus Two"
                                    id="plus_two" <?php echo in_array('Plus Two', explode(', ', $student['qualification'])) ? 'checked' : '' ; ?>>
                                <label class="form-check-label" for="plus_two">Plus Two</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="qualification[]" value="Degree"
                                    id="degree" <?php echo in_array('Degree', explode(', ', $student['qualification']))? 'checked' : '' ; ?>>
                                <label class="form-check-label" for="degree">Degree</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input type="text" class="form-control" name="subject"
                                value="<?php echo set_value('subject', $student['subject']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="mark">Mark:</label>
                            <input type="text" class="form-control" name="mark"
                                value="<?php echo set_value('mark', $student['mark']); ?>">
                        </div>
                    
                        <center>
                            <button type="submit" class="btn btn-primary" name="update" value="update">Update</button>
                        </center>
                        <br>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <a href="<?php echo base_url().'index.php/Student/index/'; ?>" class="btn btn-primary">Cancel</a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>