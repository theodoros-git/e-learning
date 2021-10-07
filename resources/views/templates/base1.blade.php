<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>@yield('title', 'Accueil') - Learning App</title>
		
		<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
		<link href="/css/toast.style.min.css" rel="stylesheet">
		<link href="/css/toast.style.css" rel="stylesheet">
		<link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"
    />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- MDB -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
      rel="stylesheet"
    />
	</head>

	<body>
		<header>
<style>
    #nav_menu{
      color: #1a2649;
      font-family: Arial;
      font-weight: bolder;
    }
    
    #btp:hover{
      color: white;
      background-color: #1a2649;
    }

    .current{

      border-bottom: #229ddc solid;
    }

    .dropbtn {
  
	  font-size: 16px;
	  border: none;
	}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: #1a2649;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {}
    
  </style>

	


	<nav class="navbar navbar-expand-lg  fixed-top navbar-light bg-light " style="margin-top: 15px;">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand nav-link"  href="{{ route('index') }}" style="margin-left: 10px;">
          <img
                    src=""
                    style="height: 70px; width: 100px; margin-left: 10px;"
                    height="10"
                    alt=""
                    loading="lazy"
                />
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>  
        

          
        </div>
      </div>
    </nav>


    
</header>

		@yield('content')

		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="/css/toast.script.js"></script>
	</body>

</html>