<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>@yield('title')</title>
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
            /* padding: 1%; */
        }

        .food-search {
            background-image: url(../images/bg.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            padding: 7% 0;
        }

        .food-search input[type="search"] {
            width: 50%;
            padding: 1%;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
        }

        /*categories*/
        .float-container {
            position: relative;
        }

        .float-text {
            position: absolute;
            bottom: 50px;
            left: 40%;
        }

        .categories h2 {
            margin-top: 0.4rem;
            margin-bottom: 0;
        }

        /* CSS for Social */
        .social {
            padding: 5% 0;
        }

        .social ul {
            list-style-type: none;
        }

        .social ul li {
            display: inline;
            padding: 1%;
        }

        /* CSS for Food Menu */
        .food-menu {
            background-color: #ececec;
            padding: 4% 0;
        }

        .food-menu-box {
            width: 43%;
            margin: 1%;
            padding: 2%;
            /* float: left; */
            background-color: white;
            border-radius: 15px;
        }

        .food-menu-img {
            width: 20%;
            /* float: left; */
        }

        .food-menu-desc {
            width: 70%;
            /* float: left; */
            margin-left: 8%;
        }

        .food-price {
            font-size: 1.2rem;
            margin: 2% 0;
        }

        .food-detail {
            font-size: 1rem;
            color: #747d8c;
        }

    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid mx-5 px-5">
            <img class="mx-5 p1-5" height="8%" width="8%" src="images/logo.png" alt="Restaurant Logo"
                class="img-responsive">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="/home">Home</a>
                    </li>
                    <li class="nav-item mycolor">
                        <a class="nav-link text-danger" href="/categories">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="/foods">Food</a>
                    </li>
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- banner -->
    <section class="food-search text-center">
        <div class="container">
            <form action="/search-food" method="POST">
                @csrf
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-danger">
            </form>

        </div>
    </section>
    <!-- end banner -->

    @yield('content')

    <section class="social">
        <div class="text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png" /></a>
                </li>
            </ul>
        </div>
        <p class="text-center ms-4 px-5">2022</p>
    </section>


    <!-- footer Section Starts Here -->
    <!-- <section class="footer text-center">
            <p>2022</p>
    </section> -->
    <!-- footer Section Ends Here -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
