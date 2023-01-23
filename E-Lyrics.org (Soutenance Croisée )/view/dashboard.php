<?php

    include_once '../Database.php';
    include_once '../controller/DataController.php';
    include_once '../modal/MusicInfo.php';

    if (isset($_POST['Save-model'])) {
        DataController::saveData();
    }
    if (isset($_POST['Edit-model'])) {
        DataController::editData();
    }
    if (isset($_POST['saveedit'])) {
        DataController::checkDelete();
    }
    if (isset($_POST['save-singer'])) {
        DataController::getData();
    }
    if (isset($_POST['save-album'])) {
        DataController::addAlbum();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkMusic</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-music me-2"></i>DarkMusic</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/me.jpeg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Youssef Hammani</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <!-- <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a> -->
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" onkeyup="searsh()" id="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <smSingerNameall>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/me.jpeg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Youssef Hammani</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-music fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Songs</p>
                                <h6 class="mb-0"><?php MusicInfo::showStatistics('Music'); ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-compact-disc fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Albums</p>
                                <h6 class="mb-0"><?php MusicInfo::showStatistics('album'); ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-users fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Singers</p>
                                <h6 class="mb-0"><?php MusicInfo::showStatistics('artist'); ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-user-gear fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Admin</p>
                                <h6 class="mb-0"><?php MusicInfo::showStatistics('users'); ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Salse</h6>
                        <!-- <a href="">Show All</a> -->
                        <button class="btn btn-sm btn-success" href="#modal-Singer" data-bs-toggle="modal">Add Singer</button>
                        <button class="btn btn-sm btn-success" href="#modal-album" data-bs-toggle="modal">Add Album</button>
                        <button class="btn btn-sm btn-success" href="#modal-Add" data-bs-toggle="modal">Add music</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Singer Name</th>
                                    <th scope="col">Song Name</th>
                                    <th scope="col">Album Name</th>
                                    <th scope="col">Lyric</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                MusicInfo::addData();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

            <!-- Modal Start -->
            <div class="modal fade mt-3" id="modal-Add">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="" action="" method="post" id="form-task">
                            <div class="modal-header">
                                <input type="hidden" id="task-idd3" name="idd3">
                                <h5 class="modal-title text-danger">Add Music</h5>
                                <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                            </div>
                            <div id="survey_options">
                                <div class="modal-body">
                                    <label class="form-label text-danger text-uppercase">Song Name</label>
                                    <input type="text" name="Song[]" class="form-control text-dark" style="background-color : #ffffff" id="task-titl" />
                                </div>
                                <div class="modal-body">
                                    <label class="form-label text-danger text-uppercase">Singer Name</label>
                                    <select class="form-select text-dark" name="Singer[]" style="background-color : #ffffff" id="task-priority1">
                                        <option value="">Please select</option>
                                        <?php
                                        MusicInfo::addSinger();
                                        ?>
                                    </select>
                                </div>
                                <div class="modal-body">
                                    <label class="form-label text-danger text-uppercase">Album</label>
                                    <select class="form-select text-dark" name="Album[]" style="background-color : #ffffff" id="task-priorit2">
                                        <option class="" value="">Please select</option>
                                        <?php
                                        MusicInfo::addAlbum();
                                        ?>
                                    </select>
                                </div>
                                <div class="modal-body">
                                    <label class="form-label text-danger text-uppercase">Date</label>
                                    <input type="date" name="Date[]" class="form-control text-dark" style="background-color : #ffffff" id="task-tit" />
                                </div>
                                <div class="modal-body text-danger text-uppercase">
                                    <label class="form-label">Lyric</label>
                                    <input type="text" name="Lyric[]" class="form-control text-dark" style="background-color : #ffffff" id="task-ti" />
                                </div>
                            </div>
                            <div class="all-form"></div>
                            <div class="modal-footer bg-danger  text-uppercase">
                                <a href="#" class="bg-white btn btn-white text-dark" data-bs-dismiss="modal">Cancel</a>
                                <button type="submit" name="Save-model" class="btn btn-info task-action-btn" id="task-save-btn">Save</button>
                                <button type="button" class="btn btn-secondary  task-action-btn"id="plus" ><i class="bi bi-plus-circle"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal end -->

            <!-- Modal Add Singer Start -->
            <div class="modal fade mt-5" id="modal-Singer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="post" id="form-task">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger">Add Singer</h5>
                                <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                            </div>
                            <div class="modal-body">
                                <label class="form-label text-danger">USERNAME</label>
                                <input type="text" name="username" class="form-control text-dark" style="background-color : #DDDDDD" id="task-title" />
                            </div>
                            <div class="modal-footer bg-danger">
                                <a href="#" class="bg-white btn btn-white text-dark" data-bs-dismiss="modal">Cancel</a>
                                <button type="submit" name="save-singer" class="btn btn-info task-action-btn" id="task-save-btn1">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Add Singer End -->

            <!-- Modal Add Album Start -->
            <div class="modal fade mt-5" id="modal-album">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="post" id="form-task">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger">Add Album</h5>
                                <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                            </div>
                            <div class="modal-body">
                                <label class="form-label text-danger">ALBUM NAME</label>
                                <input type="text" name="aalbum" class="form-control text-dark" style="background-color : #DDDDDD" id="task-title" />
                            </div>
                            <div class="modal-footer bg-danger">
                                <a href="#" class="bg-white btn btn-white text-dark" data-bs-dismiss="modal">Cancel</a>
                                <button type="submit" name="save-album" class="btn btn-info task-action-btn" id="task-save-btn1">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Add Album End -->

            <!-- Modal Edit Start -->
            <div class="modal fade mt-3" id="modal-edit">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="post" id="form-task">
                            <div class="modal-header">
                                <input type="" id="edit-id" name="edit-id">
                                <h5 class="modal-title text-danger">Edit Music</h5>
                                <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                            </div>
                            <div id="survey_options">
                                <div class="modal-body">
                                    <label class="form-label text-danger">Song Name</label>
                                    <input type="text" name="Editsong" class="form-control text-dark text-dark" style="background-color : #DDDDDD" id="edit-song" />
                                </div>
                                <div class="modal-body">
                                    <label class="form-label text-danger">Singer Name</label>
                                    <select class="form-select text-dark" name="Editsinger" style="background-color : #DDDDDD" id="edit-singer">
                                        <option value="">Please select</option>
                                        <?php
                                        MusicInfo::addSinger();
                                        ?>
                                    </select>
                                </div>
                                <div class="modal-body">
                                    <label class="form-label text-danger">Album</label>
                                    <select class="form-select text-dark" name="Editalbum" style="background-color : #DDDDDD" id="edit-album">
                                        <option value="">Please select</option>
                                        <?php
                                        MusicInfo::addAlbum();
                                        ?>
                                    </select>
                                </div>
                                <div class="modal-body">
                                    <label class="form-label text-danger">Date</label>
                                    <input type="date" name="Editdate" class="form-control text-dark" style="background-color : #DDDDDD" id="edit-date" />
                                </div>
                                <div class="modal-body">
                                    <label class="form-label text-danger">Lyric</label>
                                    <input type="text" name="Editlyric" class="form-control text-dark" style="background-color : #DDDDDD" id="edit-lyric" />
                                </div>
                            </div>
                            <div class="modal-footer bg-danger">
                                <a href="#" class="bg-white btn btn-white text-dark" data-bs-dismiss="modal">Cancel</a>
                                <button type="submit" name="Edit-model" class="btn btn-info task-action-btn" id="task-save-btn">Save Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Edit End -->

            <!-- Modal Show Lyric Start-->
            <div class="modal fade mt-5" id="show">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="./../controller/controller_index/controller_index.php" method="post" id="form-task">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger">Song lyrics</h5>
                                <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                            </div>
                            <input type="hidden" id="id-lyric" name="idd1">
                            <div class="modal-body">
                                <label class="form-label">words</label>
                                <input type="text" name="wordshow" class="form-control text-dark" style="background-color : #DDDDDD" id="lyric" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Show Lyric End-->

            <!-- Modal for Delete -->
            <div class="modal fade mt-5" id="delet">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="post" id="form-task">
                            <!-- Modal -->
                            <div class="modal-header">
                                <input type="hidden" id="task-idd4" name="idd4">
                                <h5 class="modal-title text-dark">Are you sure you want to delete this music?</h5>
                                <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                            </div>
                            <input type="hidden" id="task-id1" name="idd1">
                            <div style="margin-left:4cm; margin-top:0.5cm; margin-bottom:0.5cm">
                                <a href="#" class="btn btn-primary" data-bs-dismiss="modal">No</a>
                                <button type="submit" name="saveedit" class="btn btn-success task-action-btn" id="task-save-btn">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal for Delete -->

            <!-- Footer Start -->
            <!-- <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link
                        </div>
                    </div> </div>
            </div> -->
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/fe6f2341ca.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script> -->
    <script>
        function searsh() {
            let input = document.getElementById('search').value;
            let x = document.getElementsByClassName('cart');

            for (i = 0; i < x.length; i++) {
                if (!x[i].innerHTML.toLowerCase().includes(input)) {
                    x[i].style.display = "none";
                } else {
                    x[i].style.display = document.getElementById('Name-Song');
                    x[i].style.display = document.getElementById('id-info');
                }
            }
        }
    </script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/script.js"></script>
</body>

</html>