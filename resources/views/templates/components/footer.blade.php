<footer class=" text-center text-lg-start pt-28 pb-12" style="background-color: #1a2649; color: #FFFFFF;">

    <div class="container pl-12 pr-12 pb-12">

      <div class="row ">

        <div class="col-md-2">

          <h1 class="pb-8">Soutenez-nous</h1>
          <ul style="opacity: 0.5;">

            <li><a href="" style="border-bottom: #229ddc solid 1px; ">Faire un don</a></li>
            

          </ul>
          
        </div>

        <div class="col-md-2">

          <h1 class="pb-8">À propos de nous</h1>
          <ul style="opacity: 0.5;">

            <li><a href="" style="border-bottom: #229ddc solid 1px; ">Qui sommes-nous?</a></li>
            <li class="pt-2"><a href="" style="border-bottom: #229ddc solid 1px; ">Contactez-nous</a></li>
            

          </ul>
          
        </div>


        <div class="col-md-4">

          <h1 class="pb-8">Contactez-nous</h1>

          <p style="text-align: justify; opacity: 0.5;" class="pb-3">Nous sommes disponibles par téléphone tous les jours entre 
            8h et 22h au numéro +229 97 22 79 87 et par e-mail via l’adresse kossitheodore@gmail.com</p>

          
          
        </div>


        <div class="col-md-4 ">

          <h1 class="pb-8">Suivez-nous</h1>

          <div class="" style="border: grey solid 0.5px; height: 140px;">

            <p class="pt-4 pl-6 pr-8 pb-3" style="font-size: 12px; text-align: justify; opacity: 0.5;">Abonnez-vous à notre newsletter 
              mensuelle.</p>

            <form action="" class=" pl-6 pr-" method="POST">

              @csrf

              <input type="email" name="email" style="height: 40px; color: #1a2649;" placeholder="E-mail" class="">
              
              <input type="submit" name="abonner" value="S'abonner" class="pl-0" style=" color: white; 
              background-color: #229ddc; height: 40px;">

            </form>

          </div>
          <p style="text-align: right;" class="pt-8">

            <a class="btn-floating  text-center" style="background-color: white; 
            color: #f04e69;" 
            type="button" role="button" target="_blank" href=""><i class="fab fa-facebook-f"></i></a>

            <a class="btn-floating  text-center ml-2" style="background-color: white; 
            color: #f04e69;" 
            type="button" role="button" target="_blank" href=""><i class="fab fa-instagram"></i></a>

            <a class="btn-floating  text-center ml-2" style="background-color: white; 
            color: #f04e69;" 
            type="button" role="button" target="_blank" href=""><i class="fab fa-twitter"></i></a>

            <a class="btn-floating  text-center ml-2" style="background-color: white; 
            color: #f04e69;" 
            type="button" role="button" target="_blank" href=""><i class="fab fa-linkedin"></i></a>
        
          </p>
          
        </div>

      </div>

    </div>
    

    <div class="container p-3 " style="background-color: #1a2649; color: #FFFFFF;opacity: 0.5; font-size: 12px;">
      <hr>
      
        <div class="row pt-3">
            <div class="col-lg-6">
                <p class="text-left">&copy;  
                <a class="text-white text-reset " href="{{ route('index') }}">Learning-App</a>
                  </p>
            </div>

            <div class="col-lg-6">
                <p class="text-right"><b>L'excellence par dessus tout</b></p>
            </div>
        </div>

    </div>
    
</footer>