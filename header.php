<head>
<link rel="stylesheet" href="https://unpkg.com/flickity@2.0.11/dist/flickity.min.css">
<link rel="stylesheet" href="style.css">
</head>


<script src="https://kit.fontawesome.com/0f99f3d970.js" crossorigin="anonymous"></script> 
<script src="https://kit.fontawesome.com/0f99f3d970.js" crossorigin="anonymous"></script> 
<script src="https://unpkg.com/flickity@2.0.11/dist/flickity.pkgd.min.js"></script> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<nav class="banda fix">

      <div class="fshop"><h2>Fshop</h2></div>

     <div class="nav">
        <ul >
             <li><a href="index.php"> <i class="fas fa-home fa-lg"></i> Home</a></li>

                    <li><a href=""><i class="fas fa-align-justify fa-lg"></i>  Categorie</a>
                        <ul>
                            <li><a href="affprod.php?idc=1"><i class="fas fa-bolt"></i>Electronique</a>
                                <ul>
                                    <li><a href="affprod.php?idc=5"> <i class="fas fa-mobile-alt"></i>Telephone</a>
                                        <ul>
                                             <li><a href="affprod.php?idc=5&marque=Sumsung"><i class="fab fa-stripe-s"></i></i>Sumsung</a></li>
                                             <li><a href="affprod.php?idc=5&marque=Apple"><i class="fab fa-apple"></i>Apple</a></li>
                                             <li><a href="affprod.php?idc=5&marque=Xiaomi">Xiaomi</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="affprod.php?idc=6"><i class="fas fa-laptop"></i>PC</a>
                                       <ul>
                                             <li><a href="affprod.php?idc=6&marque=HP">HP</a></li>
                                             <li><a href="affprod.php?idc=6&marque=Dell">Dell</a></li>
                                             <li><a href="affprod.php?idc=6&marque=Apple">Apple</a></li>
                                        </ul>
                                
                                
                                       </li>
                                    <li><a href="affprod.php?idc=1&idc1=7"><i class="fab fa-adn"></i>Acessoirs</a></li>
                                    <li><a href="affprod.php?idc=8"><i class="fas fa-home"></i>Maison & Quisine</a></li>
                                </ul>
                        
                            </li>

                            <li><a href="affprod.php?idc=2"><i class="fas fa-tshirt"></i></i>Vetements</a>
                                <ul>
                                    <li><a href=""><i class="fas fa-male"></i>Homme</a></li>
                                    <li><a href=""><i class="fas fa-female"></i>Femme</a></li>
                                </ul>
                            </li>


                            <li><a href="affprod.php?idc=4"><i class="fas fa-gem"></i>Montre et Bijoux</a>
                               <ul>
                                             <li><a href=""><i class="fas fa-watch"></i> Montre</a></li>
                                             <li><a href=""><i class="fas fa-gem"></i>Bijoux</a></li>
                                            
                                        </ul>
                        
                                </li>
                          
                            <li><a href="affprod.php?idc=3"><i class="fas fa-running"></i></i>Sport et Loisires</a>

                            <li><a href="affprod.php?idc=20"><i class="far fa-heart"></i></i>Beaute et Sante</a>


                             </ul>
                    </li>

                    <li><a href="#fifth-section"><i class="fas fa-question-circle fa-lg "></i> A propos de nous  </a></li>
                    <li><a href="#fin"><i class="fas fa-envelope fa-lg"></i> Contacter Nous</a></li>
                     </ul>


                <ul class="right">
                 <?php
                 if(isset($_SESSION['logged']) && isset($_SESSION)){
                     $pr= $_SESSION['login'];
                     echo "<li><a href='$pr.php'><i class='fas fa-user-circle fa-lg'></i> $pr</a> </li>";
                    echo '<li><a href="deco.php"><i class="fas fa-sign-out-alt fa-lg"></i> Se Déconnecter</a></li>';
                 }  
                 else{
                   echo '<li><a href="conn.php"><i class="fas fa-sign-in-alt fa-lg"></i> Se Connecter</a></li>';
                 }

                     ?>
                        <li ><a href="panier.php"> <i class="fas fa-shopping-cart fa-lg"></i></a></li>
                     </ul>

    </div>
   </nav>