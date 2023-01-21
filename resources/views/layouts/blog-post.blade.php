<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Post</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/assets/css/poststyles.css" rel="stylesheet" />
        <!-- Styles -->


      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Code With KAMRUL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">

      @yield('content')

                </div>

                <!-- Side widgets-->
                  <div class="col-lg-4">

                        <!-- Search widget-->
                        <div class="card mb-4" id="headingOne">
                                <button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                  Search Button Bellow
                                </button>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                        <span class="input-group-btn">
                                          <button class="btn btn-default" type="button">
                                            <span class="glyphicon glyphicon-search"></span>
                                          </button>
                                        </span>
                                  </div>
                              </div>
                            </div>
                        </div>
                        <!--End Search widget-->
                        <!-- Category widget-->
                        <div class="card mb-4" id="headingTwo">
                                <button class="btn btn-primary collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Category Items Bellow
                                </button>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="#!">Web Design</a></li>
                                            <li><a href="#!">HTML</a></li>
                                            <li><a href="#!">Freebies</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="#!">JavaScript</a></li>
                                            <li><a href="#!">CSS</a></li>
                                            <li><a href="#!">Tutorials</a></li>
                                        </ul>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <!--End Category widget-->

                        <!-- button widget-->
                        <div class="card mb-4">
                          <div class="card-header" id="headingThree">
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Search Button Bellow
                            </button>
                          </div>

                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                        <span class="input-group-btn">
                                          <button class="btn btn-default" type="button">
                                            <span class="glyphicon glyphicon-search"></span>
                                          </button>
                                        </span>
                                  </div>
                              </div>
                            </div>
                        </div>
                        <!--End button widget-->

                  </div>
                  <!--End Side widget-->

                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; coddewithk 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

        <!-- Core theme JS-->
        <script src="{{asset('js/libs.js')}}"></script>

        <script src="{{ asset('assets/js/libs/styles.js') }}"></script>
        <script src="{{ asset('assets/js/libs/blog-post.js') }}"></script>
        <script src="{{ asset('assets/js/libs/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/js/libs/metisMenu.js') }}"></script>
        <script src="{{ asset('assets/js/libs/sb-admin-2.js') }}"></script>

        @yield('scripts')
    </body>
</html>
