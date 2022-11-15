<?php 
    $connected = (isset($this->session->user)) ? true : false;
    $status = ($connected) ? $this->session->user["status"] : "";
?>


<head>
    <link rel="stylesheet" href= <?= base_url("css/components.css") ?>>
    <link rel="stylesheet" href=<?= base_url("css/header.css") ?> >
</head>

<nav>
    <div class="nav-container">
        <a href=<?= site_url("Home") ?>>
            <img class="nav-left" src="" alt="Euclidia">
        </a>
        
        
        <ul class="nav-center">
            <li><a class="link-nav" href=<?= site_url("Home") ?>>Accueil</a></li> 
            <li><a class="link-nav" href=<?= site_url("Product/find") ?>>Modèles 3D</a></li>
            <li><a class="link-nav" href=<?= site_url("Contact") ?>>Contact</a></li>
        </ul>
        
    
        <div class="nav-right">
            <a href= <?= site_url("ShoppingCart")?>>
                <img class="nav-icon shopping-cart-icon"src= <?= base_url("assets/icon/icon-shopping-cart.svg") ?>  alt="panier">
            </a>


            <?php if ($connected):?>
            <div class="dropdown">
                <button class="dropbtn">
                        <img class="nav-icon account-icon" src=<?= base_url("assets/icon/icon-account-circle.svg") ?> alt="account icon">
                        <p ><?= $this->session->user["nom"]." ".$this->session->user["prenom"] ?> </p>
                </button>
                
                <div class="dropdown-content">

                    <a href=<?=base_url("User/account")?>> Compte</a>

                    <?php if ($connected): ?>
                        <?php if ($status == "Utilisateur") : ?>
                            
                            <html>
                                <a href=<?= site_url("user/logout") ?>> Se déconnecter</a>
                            </html>
                            


                        <?php endif; ?>
                    <?php endif; ?>

                </div>
            </div>
            <?php else: ?>
                <div>
                    <a class="btn-nav" href=<?= site_url("user/login")?>>Connexion</a>
                    <a class="btn-nav" href=<?= site_url("user/register")?>>S'inscrire</a>
                </div>
            <?php endif ;?>

            

            
            
        </div>
    </div>
</nav>