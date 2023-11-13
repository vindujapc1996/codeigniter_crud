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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <title>VIEW</title>
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
    <div class="row">

        <div class="col-8">
            <h3>
                <center>VIEW STUDENTS</center>
            </h3>
        </div>
        <div class="col-xs-12 .col-sm-6">
            <a href="<?php echo base_url().'index.php/Student/insert';?>" class="btn btn-primary">register <i class="fas fa-plus"></i></a>
        </div>
    </div>
    <hr style="width: 50%;">

    </div>
    </div>
    <br>
    <?php echo $this->session->flashdata('message'); ?>
    <center>

        <table class="table table-striped table-info " style="width:70%;padding:2%;border-style:groove;">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>gender</th>
                <th>dob</th>
                <th>qualification</th>
                <th>subject</th>
                <th>mark</th>
                <th>image</th>
                <th colspan=2><center>action</center></th>
            </tr>
            <?php foreach($students as $student): ?>
            <tr>
                <td>
                    <?php echo $student['id']?>
                </td>
                <td>
                    <?php echo $student['name']?>
                </td>
                <td>
                    <?php echo $student['gender']?>
                </td>
                <td>
                    <?php echo $student['dob']?>
                </td>
                <td>
                    <?php echo $student['qualification']?>
                </td>
                <td>
                    <?php echo $student['subject']?>
                </td>
                <td>
                    <?php echo $student['mark']?>
                </td>
                <td>
                    <img src="<?php echo base_url().'assets/uploads/'.$student['image'];?>" height="50" width="50" alt="">
                </td>

                <td><a href="<?php echo base_url('/index.php/Student/edit/' . $student['id']); ?>"
                        class="btn btn-primary"><i class="fa fa-edit"></i>edit</a></td>
                <td> <a href="<?php echo base_url('/index.php/Student/delete/' . $student['id']); ?>"
                        class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this record?')"><i
                            class="far fa-trash-alt" style="vertical-align: middle;"></i>
                        Delete</a></td>
                <?php endforeach;?>


        </table>
    </center>
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