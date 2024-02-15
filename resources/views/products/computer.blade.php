<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
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
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="{{url('/')}}" class="navbar-brand mx-4 mb-3">
                    <img src="ex/images/cw.png" width="100px">
                  <img src="ex/images/name.png" width="100px">
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/png-clipart-user-profile-computer-icons-login-user-avatars-monochrome-black-thumbnail.png" alt="" style="width: 40px; height: 40px;">


                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                   <div class="ms-3">
                        <h6 class="mb-0">{{Auth()->user()->name}}</h6>
                        <span>@if (Auth()->user()->admin==0)
                            User
                            @else
                            Admin

                        @endif</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ url('/') }}" class="nav-item nav-link active"><i
                            class="fa fa-home"></i>الرءيسيه</a>
                   @if (Auth()->user()->admin === 1)
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <i
                                    class="bi bi-diagram-3-fill"></i>المنتجات </a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="{{ route('computer') }}" class="dropdown-item"><i
                                        class="bi bi-laptop"></i>قسم ألبسة عامة</a>
                                <a href="{{route('computer_tool')}}" class="dropdown-item"> <i
                                        class="bi bi-door-open-fill"></i>قسم مفروشات.</a>
                                <a href="{{route('printer')}}" class="dropdown-item">
                                    <i class="bi bi-printer-fill"></i>صحية </a>
                                <a href="{{route('camera')}}" class="dropdown-item"> <i
                                        class="bi bi-camera-video-fill"></i>أجهزة إلكترونية وكهربائية</a>
                                <a href="{{route('network')}}" class="dropdown-item"> <i class="bi bi-router-fill"></i>قسم الحوم</a>
                                <a href="{{route('projector')}}" class="dropdown-item"> <i class="bi bi-cast"></i>اجهزه عرض</a>
                                <a href="{{route('game')}}" class="dropdown-item"> <i class="bi bi-joystick"></i>اجهزه
                                    العاب</a>
                                <a href="{{route('bag')}}" class="dropdown-item"> <i class="bi bi-backpack4"></i>حقاءب لاب
                                    توب ماركات</a>
                            </div>
                        </div>
                        <a href="{{ route('show_user') }}" class="nav-item nav-link">
                            <i class="bi bi-people-fill"></i> المستخدمين</a>
                    @endif

                    <a href="{{ route('profile.edit') }}" class="nav-item nav-link"> <i
                            class="bi bi-diagram-3-fill"></i>الاعدادات </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <p class="nav-item nav-link"> <i class="bi bi-box-arrow-right"></i>تسجيل الخروج </p>
                        </x-dropdown-link>
                    </form>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="{{url('/')}} class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><img src="ex/images/cw.png" width="50px"></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
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
                                <small>15 minutes ago</small>
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

                            <i class="bi bi-person-circle" class="rounded-circle me-lg-2" style="width: 40px; height: 40px;"></i>
                            <span class="d-none d-lg-inline-flex">Safwan Ali</span>
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
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Sale</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Sale</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Revenue</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Revenue</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->
            @if ($message = Session::get('delete'))
            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>{{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Salse</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th>Id</th>
                                    <th> اسم النتج</th>
                                    <th>تفاصيل</th>
                                    <th>السعر</th>
                                    <th> السماحيه</th>
                                    <th>Created at</th>
                                    <th>Update at</th>
                                    <th>edit</th>

                                    <th>delete</th>



                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i =1;
                                @endphp
                                @foreach ($products as $we )

                               @if ($we->type==1)
                               <tr>
                                <td>{{$i++}}</td>
                                <td>{{$we->name}}</td>
                                <td>{{$we->dis}}</td>
                                <td>{{$we->price}}</td>
                                @if ($we->allaw==0)
                                <td>لم يتم الموافقه بعد</td>
                                @else
                                <td> تم النشر</td>

                                @endif
                                <td>{{$we->created_at}}</td>
                                <td>{{$we->updated_at}}</td>
                                <td><a href="{{route('edit_product',$we->id)}}"><button type="button" class="btn btn-success">edite</button></a></td>


                                <td><a href="{{route('delete_pro',$we->id)}}"> <button type="button" class="btn btn-danger">delete</button></a></td>
                            </tr>


                               @endif

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->



        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
