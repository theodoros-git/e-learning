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
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #1a2649; color: white;">
          <i class="fas fa-bars" style="color: white;"></i>
        </button>  
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="margin-right: 50px;">
            
            <li class="nav-item" style="margin-right: 15px;">
            	<div class="dropdown">
	              <a class="nav-link dropbtn" href="" id="nav_menu"  
	                >Catégories</a>
	               <div class="dropdown-content">
				    <a href="#">Matières Scientifiques</a>
				    <a href="#">Matières Littéraires</a>
				    
				   </div>
               </div>

               
            </li>
            

            <li class="nav-item" style="margin-right: 15px;">
              <a class="nav-link" href="" id="nav_menu"  
                >Suivre un cours</a>
            </li>

            

            <li class="nav-item" style="margin-right: 15px;">
              <a class="nav-link " href="{{ route('about') }}"  id="nav_menu">Qui sommes-nous?</a>
            </li>
            <li class="nav-item" style="margin-right: 15px;">
              <a class="nav-link " href="{{ route('contact') }}"  id="nav_menu">Contact</a>
            </li>
            &nbsp;
            
            <li class="nav-item" >
              <a
                  class="btn btn-outline-info btn-rounded"
                  href="{{ route('signin') }}"
                  role="button"
                  style="  color: #1a2649;
                   background-color: white;
                   font-family: Arial;
      				font-weight: bolder; 
      				border-color: #1a2649;"
                  id="btp"
               >Se connecter</a>
            </li>&nbsp;&nbsp;

            <li class="nav-item" >
              <a
                  class="btn btn-info btn-rounded "
                  href="{{ route('signup') }}"
                  role="button"
                  style="  color: white;
                   background-color: #1a2649;
                   border-color: #1a2649; "
                  
               >S'inscrire</a>
            </li>
          </ul>

          
        </div>
      </div>
    </nav>


    
</header>