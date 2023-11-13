<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/bootstrap.css">

    <title>Registration</title>
</head>

<body style="background-color:hsla(9, 100%, 64%, 0.2);">
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="" class="navbar-brand">
                <h3>CRUD APPLICATION</h3>
            </a>
        </div>
    </div>
    <br>
    <h3 class="text-center"> <strong>Student Registration</strong></h3>
    <hr style="width:50%;color:black;">

    <div class="container border" style="background-color:rgb(200, 200, 200);">
        <form method="POST" action="<?= base_url() ?>index.php/Student/insert" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <br>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Gender:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" >
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" class="form-control" name="dob" required>
                    </div>
                    <div class="form-group">
                        <label for="place">Place:</label>
                        <select class="form-control" name="place" required>
                            <option value="select">select</option>
                            <option value="kozhikode">Kozhikode</option>
                            <option value="kollam">Kollam</option>
                            <option value="kasargod">Kasargod</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <br>
                    <br>
                    
                        <div class="form-group">
                            <label>Qualification:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="qualification[]" value="SSLC"
                                    id="sslc" >
                                <label class="form-check-label" for="sslc">SSLC</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="qualification[]" value="Plus Two"
                                    id="plus_two" >
                                <label class="form-check-label" for="plus_two">Plus Two</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="qualification[]" value="Degree"
                                    id="degree" >
                                <label class="form-check-label" for="degree">Degree</label>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input type="text" class="form-control" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="mark">Mark:</label>
                            <input type="text" class="form-control" name="mark" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Select Image:</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                    
                        <div class="text-center" >
                    <button type="submit" class="btn btn-primary " name="submit" value="submit" style="margin-right:93%;" >Submit</button>
                        </div>
                <br>

            </div>
    </div>
    </div>

    </form>

    <?php
                    if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success" role="alert">
        successfully registered
    </div>
    <?php }
                    ?>
    <?php
                    if($this->session->flashdata('error')){ ?>
    <div class="alert alert-danger" role="alert">
        failed
    </div>
    <?php }
                    ?>




    <br>
<center>
    <a href="<?php echo base_url().'index.php/Student/index';?>" class="btn btn-primary">cancel</a></center>

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