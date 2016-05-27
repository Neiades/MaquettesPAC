<!-- *** TOP *** -->
<?php
  include"includes/database.php";

  $sql = "SELECT * FROM categories";
  $categories = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="top">
    <div class="container">
        <div class="row">
            <div class="col-xs-5 contact">
                <p class="hidden-sm hidden-xs">Contactez-nous au 05.55.73.38.48 ou <a href="mailto:studios@radiopac.fr">studios@radiopac.fr</a></p>
                <p class="hidden-md hidden-lg"><a href="#" data-animate-hover="pulse"><i class="fa fa-phone"></i></a>  <a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                </p>
            </div>
            <div class="col-xs-7">
                <div class="social">
                    <a href="https://www.facebook.com/radiopac" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/radiopac" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                    <a href="mailto:studios@radiopac.fr" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                </div>

                <div class="login">
                    <a href="#" onclick="window.open('http://beta.radiopac.fr/lecteurlive.php', 'newwindow', 'width=546, height=240'); return false;"><i class="fa fa-play"></i><span class="hidden-xs text-uppercase">Écouter la radio</span></a>
                </div>

                <div class="login">
                    <a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Espace admin</span></a>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- *** TOP END *** -->

<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

<div class="navbar navbar-default yamm" role="navigation" id="navbar">

<div class="container">
    <div class="navbar-header">

        <a class="navbar-brand home" href="index.php">
            <img src="img/logo.png" alt="Radio PAC logo" class="hidden-xs hidden-sm">
            <img src="img/logo-small.png" alt="Radio PAC logo" class="visible-xs visible-sm"><span class="sr-only">Radio Pac - aller à l'accueil</span>
        </a>
        <div class="navbar-buttons">
            <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Afficher navigation</span>
                <i class="fa fa-align-justify"></i>
            </button>
        </div>
    </div>
    <!--/.navbar-header -->

    <div class="navbar-collapse collapse" id="navigation">

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Radio <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="calendrier_programmes.php">Grille des programmes</a>
                    </li>
                    <li><a href="liste_emission.php">Emissions</a>
                    </li>
                    <li><a href="#">C'était quoi ce titre ?</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Actualité <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="liste_article.php">Toutes les infos</a></li>
                    <?php
                      foreach($categories as $categorie){ ?>
                        <li><a href="liste_article.php?filtre=categorie&id=<?=$categorie['id_cat'];?>"><?=$categorie['lib_cat'];?></a></li>
                      <?php } ?>
                  </ul>
              </li>

              <li class="dropdown">
                <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Agenda <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="calendrier_evenements.php">Calendrier</a>
                    </li>
                    <li><a href="liste_evenement.php">Tous les événements</a>
                    </li>
                  </ul>
              </li>

            <li class="dropdown">
                <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Publicité <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Particuliers</a>
                    </li>
                    <li><a href="#">Associations</a>
                    </li>
                    <li><a href="#">Entreprises</a>
                    </li>
                </ul>

        </ul>

    </div>
    <!--/.nav-collapse -->



              <div class="collapse clearfix" id="search">

                  <form class="navbar-form" role="search">
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <span class="input-group-btn">

          <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

      </span>
                      </div>
                  </form>

              </div>
              <!--/.nav-collapse -->

          </div>


      </div>
      <!-- /#navbar -->

  </div>

  <!-- *** NAVBAR END *** -->

  <!-- Modal de connexion -->

  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">Connexion administrateur</h4>
            </div>
            <div class="modal-body">

                <form action="traitements/connexion_back.php" method="post">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" id="id_modal" placeholder="Identifiant">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="password_modal" placeholder="Mot de passe">
                    </div>

                    <p class="text-center">
                        <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Connexion</button>
                    </p>

                </form>

            </div>
        </div>
    </div>
</div>
