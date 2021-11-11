@extends('templates.base')

@section('stylesheets')

    <style>
        #nav_hover:hover {
            color: blueviolet;
        }

        .carousel-item {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            height: 60vh;
        }
    </style>

@stop

@section('javascripts')

@stop

@section('content')

<div id="carouselExampleIndicators" class="carousel slide carousel-fade carousel-thumbnails" style="margin-top: 100px;" data-mdb-ride="carousel">


    <div class="carousel-indicators">

        <button
          type="button"
          data-mdb-target="#carouselExampleIndicators"
          data-mdb-slide-to="0"
          class="active"
          aria-current="true"
          aria-label="Slide 1"
        ></button>
        <button
          type="button"
          data-mdb-target="#carouselExampleIndicators"
          data-mdb-slide-to="1"
          aria-label="Slide 2"
        ></button>
        <button
          type="button"
          data-mdb-target="#carouselExampleIndicators"
          data-mdb-slide-to="2"
          aria-label="Slide 3"
        ></button>

    </div>

    <div class="carousel-inner" role="listbox" style="height: 60vh;">


        <div class="carousel-item active" style="
        background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg');
        ">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                <div class="d-flex  align-items-center h-100">
                <div class="text-white " >

                    <div class="container">

                        <div class="row">

                            <div class="col-md-3"></div>

                            <div class="col-md-5">
                                <h1 class="mb-3">Si le rythme du tam-tam change, le pas de danse doit s'adapter</h1>
                                <a
                                class="btn btn-outline-light btn-lg m-2"
                                href="https://www.youtube.com/watch?v=c9B4TPnak1A"
                                role="button"
                                rel="nofollow"
                                target="_blank"
                                >Lire plus</a>
                            </div>

                        </div>

                    </div>
                    
                </div>
                </div>
            </div>
        </div>


        <div class="carousel-item" style="
        background-image: url('https://mdbootstrap.com/img/Photos/Others/images/77.jpg');
        ">

            <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
                <div class="d-flex justify-content-center align-items-center h-100">
                  <div class="text-white text-center">
                    <h2>You can place here any content</h2>
                  </div>
                </div>
            </div>

        </div>


        <div class="carousel-item" style="
        background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg');
        ">

            <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
              <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white text-center">
                  <h2>You can place here any content</h2>
                </div>
              </div>
            </div>

        </div>
    </div>
    
    

</div>



<div class="container mt-16 mb-8">

    <div class="row ">

        <div class="col-md-10">

            <h1 class="ml-12" style="font-size: 25px; color: #1a2649; font-weight: bolder;">PLATEFORME E-LEARNING</h1>

            <p style="margin-top: 25px;text-align: justify; font-size: 18px; font-family: Amiri;" class="ml-16">Notre plateforme s'inscrit dans le cadre de l'apprentissage électronique des mathématiques qui constituent de nos jours un réel handicap pour les élèves du cours secondaire. De même, nous oeuvrons pour une bonne apprentissage de la philosophie qui, dit-on, est la mère des sciences. Ainsi, nous venons enrichir les connaissances de nos élèves à travers des cours vidéos sur mesure pour approfondir leurs savoirs et hausser leurs niveaux à travers des exercices, des TDs et des challenges.</p>
        </div>
        
    </div>


    <div class="row mt-12">

        <h1 class="ml-12 mb-8" style="font-size: 25px; color: #1a2649; font-weight: bolder;">DERNIERS COURS SUR LA PLATEFORME</h1>

        <div class="col-md-1"></div>


        <div class="col-md-10">

            <div class="row">
                        
                    <div class="col-md-4">


                            <div class=" bg-image hover-overlay shadow-1-strong rounded-5 ripple mb-4" data-mdb-ripple-color="light"
                          style="height: 300px;">
                            <img src="" class="img-fluid" />
                            <a href="">
                              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                          </div>
              
                          <!-- Article data -->
                          <div class="card">
                            <div class="row mb-3 card-body">
                              <div class="col-6">
                                <a href="" class="text-info">
                                  <i class="fas fa-align-left"></i>
                                  
                                </a>
                              </div>
                
                              <div class="col-6 text-end">
                                <u> </u>
                              </div>
                            
                
                            <!-- Article title and description -->
                            
                              <h5 style="color: #229ddc; font-size: 20px;"></h5>
              
                            <hr />
                          </div>
                            
                        </div>
                    </div>




                    
                    <div class="col-md-4">
                
                      <div class=" bg-image hover-overlay shadow-1-strong rounded-5 ripple mb-4" data-mdb-ripple-color="light"
                      style="height: 300px;">
                        <img src="" class="img-fluid" />
                        <a href="">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                      </div>
          
                      <!-- Article data -->
                      <div class="card">
                        <div class="row mb-3 card-body">
                          <div class="col-6">
                            <a href="" class="text-info">
                              <i class="fas fa-align-left"></i>
                              
                            </a>
                          </div>
            
                          <div class="col-6 text-end">
                            <u> </u>
                          </div>
                        
            
                        <!-- Article title and description -->
                        
                          <h5 style="color: #229ddc; font-size: 20px;"></h5>
          
                        <hr />
                      </div>
                          
                      
                        
                      </div>
                    </div>


                    
                    <div class="col-md-4">
                        
                        <div class=" bg-image hover-overlay shadow-1-strong rounded-5 ripple mb-4" data-mdb-ripple-color="light"
                      style="height: 300px;">
                        <img src="" class="img-fluid" />
                        <a href="">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                      </div>
          
                      <!-- Article data -->
                      <div class="card">
                        <div class="row mb-3 card-body">
                          <div class="col-6">
                            <a href="" class="text-info">
                              <i class="fas fa-align-left"></i>
                              
                            </a>
                          </div>
            
                          <div class="col-6 text-end">
                            <u> </u>
                          </div>
                        
            
                        <!-- Article title and description -->
                        
                          <h5 style="color: #229ddc; font-size: 20px;"></h5>
          
                        <hr />
                      </div>

                    </div>

                    </div>
            
                    
            </div>

        </div>


        <div class="text-center mt-12" ><a href="" class="btn btn-primary btn-rounded mb-4" style="background-color: #229ddc;">
        Plus de cours</a></div>

    </div>
    
</div>

@stop