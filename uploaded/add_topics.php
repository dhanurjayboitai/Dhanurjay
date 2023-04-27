<?php
//error_reporting(0);
session_start();
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('d-m-Y h:i:s A', time());
include('includes/config.inc.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $domain_id = $_POST['domain_id'];
        $course_id=$_POST['course_id'];
        $topic_name=$_POST['topic_name'];
        $sql = mysqli_query($con, "INSERT INTO topic(domain_id,course_id,topic_name,date_created) 
        VALUES('$domain_id','$course_id','$topic_name','$currentTime')");
        //calculate course count
       /*  $qry=mysqli_query($con, "SELECT * FROM domain_chat WHERE id='$domain_id'");
        $res= mysqli_fetch_array($qry);
        $count=$res['course_count']+1;
        $sql_domain=mysqli_query($con, "UPDATE domain_chat SET course_count='$count' WHERE id='$domain_id'"); */
        if ($sql) {
            $_SESSION['msg'] = "Topic Details has been Updated Successfully !!!";
        } else {
            $_SESSION['msg'] = "Something Went Wrong !!!";
        }
    }
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>DigiOne :: Add Topic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <script>
    function getSubcat(val) {
        $.ajax({
            type: "POST",
            url: "get_course.php",
            data: 'cat_id=' + val,
            success: function(data) {
                $("#subcategory").html(data);
            }
        });
    }

    function selectCountry(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
    }
    </script>
</head>

<body data-sidebar="dark">
    <div id="layout-wrapper">
        <?php include 'includes/header.inc.php';?>
        <?php include 'includes/leftside_bar.inc.php';?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Add Topics</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb"><a href="dashboard.php">Dashboard </a></li> /
                                        <li class="breadcrumb-item active">Add Topics </li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add New Topics <a href="manage_topics.php"><button
                                                type="button" class="btn btn-info btn-sm waves-effect waves-light"
                                                style="float:right">View All</button></a></h4>

                                    <form class="p-3" method="POST">
                                        <div class="row">
                                            <?php
                                                    if(isset($_POST['submit'])) {
                                                ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <i class="mdi mdi-check-all me-2"></i>
                                                <?php echo $_SESSION['msg'];?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                            <?php } ?>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-email-input" class="form-label">Select Domain
                                                        Name</label>
                                                    <select class="form-select form-select-sm" name="domain_id" onChange="getSubcat(this.value);">
                                                        <?php
                                                        $domain_query=mysqli_query($con,"SELECT * FROM domain ORDER BY domain_name");
                                                        while ($domain_result = mysqli_fetch_array($domain_query)) {
                                                       ?>
                                                        <option
                                                            value="<?php echo htmlentities($domain_result['id']);?>">
                                                            <?php echo htmlentities($domain_result['domain_name']);?>
                                                            (<?php echo htmlentities($domain_result['shortcode']);?>)
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="formrow-email-input" class="form-label">Select Course
                                                        Name</label>
                                                    <select class="form-select form-select-sm" name="course_id" id="subcategory">
                                                        <?php
                                                        $course_query=mysqli_query($con,"SELECT * FROM course WHERE domain_id='".$domain_result['id']."'");
                                                        while ($course_result = mysqli_fetch_array($course_query)) {
                                                       ?>
                                                       <option value="<?php echo $course_result['id'];?>"><?php echo $course_result['course_name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="formrow-password-input" class="form-label">Enter
                                                        Topic Name</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="formrow-password-input" name="topic_name"
                                                        placeholder="Enter Topic Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="reset" class="btn btn-secondary waves-effect btn-sm">
                                                Cancel
                                            </button>
                                            <button type="submit" name="submit" id="submit"
                                                class="btn btn-success waves-effect waves-light btn-sm">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'includes/footer.inc.php'?>
        </div>
    </div>
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/parsleyjs/parsley.min.js"></script>
    <script src="assets/js/pages/form-validation.init.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="dist/js/custom.min.js"></script>
  
   
   </body>

</html>
    <?php } ?>