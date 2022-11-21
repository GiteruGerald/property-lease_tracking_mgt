<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Property MS | Dashboard</title>


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-expanded="false"
                            aria-haspopup="true" v-pre>
                            <i class="far fa-user"></i>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-sm-right">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <div class="media">
                                    <div class="media-body">
                                        Logout
                                    </div>
                                </div>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <router-link to="/home" class="brand-link">
                <img src="{{ asset('img/house.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Property Track</span>
            </router-link>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <router-link to="/home" class="nav-link" tag="a">
                                <i class="nav-icon fas fa-tachometer-alt yellow"></i>
                                <p>
                                    Dashboard
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item menu-open">
                              <router-link to="/properties" class="nav-link">
                                <i class="nav-icon fas fa-house teal"></i>
                                <p>
                                    Properties
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                              </router-link>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/properties" class="nav-link">
                                        <i class="fa-solid fa-circle nav-icon"></i>
                                        <p>All properties</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/properties/create" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>Add New</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <router-link to="/leases" class="nav-link">
                                <i class="nav-icon fas fa-file-contract green"></i>
                              <p>
                                  Leases
                              </router-link>
                          {{-- <ul class="nav ">
                              <li class="nav-item">
                                  <router-link to="/locations" class="nav-link">
                                      <i class="fa-solid fa-circle nav-icon"></i>
                                      <p>All locations</p>
                                  </router-link>
                              </li>
                              
                          </ul> --}}
                      </li>
                        {{-- <li class="nav-item">
                            <router-link to="/profile" class="nav-link">
                                <i class="nav-icon fas fa-user purple"></i>
                                <p>
                                    Profile
                                </p>
                            </router-link>
                        </li> --}}
                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">
                    <router-view></router-view>
                </div>
            </div>

        </div>


        <aside class="control-sidebar control-sidebar-dark">

            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>


        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>

            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
