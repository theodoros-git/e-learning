<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title', 'Dashboard') - Dashboard - Learning-App</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/css/style_dashboard.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    @yield('stylesheets')
    @include('templates.components.css')

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Learning-App</h3>
            </div>

            <ul class="list-unstyled components">
                <p style="font-weight: bold;">Tableau de bord - Admin</p>

                <li>
                    <a href="#coursSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Cours</a>
                    <ul class="collapse list-unstyled" id="coursSubmenu">
                        <li>
                            <a href="{{ route('admin_all_courses') }}">Tous les cours</a>
                        </li>
                        <li>
                            <a href="{{ route('admin_course_add') }}">Ajouter un Cours</a>
                        </li>

                        <li>
                            <a href="{{ route('admin_sa_add') }}">Ajouter une situation d'apprentissage</a>
                        </li>

                        <li>
                            <a href="{{ route('admin_seq_add') }}">Ajouter une séquence</a>
                        </li>

                        <li>
                            <a href="{{ route('admin_activity_add') }}">Ajouter une activité</a>
                        </li>

                        <li>
                            <a href="{{ route('admin_upload_files') }}">Uploader des fichiers pour une activité</a>
                        </li>
                        
                    </ul>
                </li>

                <li>
                    <a href="#classeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Classes</a>
                    <ul class="collapse list-unstyled" id="classeSubmenu">
                        <li>
                            <a href="{{ route('admin_all_classes') }}">Toutes les classes</a>
                        </li>
                        <li>
                            <a href="{{ route('admin_classe_add') }}">Ajouter une Classe</a>
                        </li>

                        <li>
                            <a href="{{ route('admin_classe_modify') }}">Modifier une classe</a>
                        </li>

                        
                    </ul>
                </li>


                <li class="">
                    
                    <a href="{{ route('students_tds') }}">Programmer un TD</a>
                        
                </li>

                <li class="">
                    
                    <a href="{{ route('students_challenges') }}">Lancer un Challenge</a>
                        
                </li>

                <li>
                    <a href="#catSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Catégorie de cours</a>
                    <ul class="collapse list-unstyled" id="catSubmenu">
                        <li>
                            <a href="{{ route('admin_category_add') }}">Ajouter une Catégorie de cours</a>
                        </li>
                        <li>
                            <a href="{{ route('admin_category_modify') }}">Modifier une Catégorie de cours</a>
                        </li>
                        
                    </ul>
                </li>
                

                
                <li>
                    <a href="#pageSubmenue" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Paramètres</a>
                    <ul class="collapse list-unstyled" id="pageSubmenue">
                        <li>
                            <a href="{{ route('students_change_informations') }}">Changer mes informations</a>
                        </li>
                        <li>
                            <a href="{{ route('students_change_password') }}">Changer mon mot de passe</a>
                        </li>
                        
                    </ul>
                </li>
            </ul>

            
        </nav>

        
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-dark" style="background-color: #1a2649;">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item ">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"
                                > {{ auth()->user()->username }} | Admin &nbsp;&nbsp;&nbsp;  </a>
                                    
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin_logout') }}">Se déconnecter</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            
            
        </div>
    </div>


    @yield('content')

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>

</html>