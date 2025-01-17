<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href=<?= base_url("css/account.css") ?> >
    <link rel="stylesheet" href=<?= base_url("css/commandes.css") ?>>

    <title>Account</title>
</head>
<body>

    <?php require_once(APPPATH.'views/main-component/header.php'); ?>

    <section>
        <h1>Vos commandes</h1>
        <p>Vous pouvez ici consulter les produits que vous avez achetés et les télécharger.</p>
        <div class = "commandes-container">
            <?php foreach($p as $prod): ?>
                <div class="commandes-product" style="cursor:pointer">
                    <div class="commandes-content" <?= $prod->getDisponible()?"onclick='location.href=\"" . site_url("Product/display/".$prod->getId())."\"'":""?>>
                        <img class="image-model" src="<?= base_url('resource/picture/'.$prod->getId()) ?>" alt="product image">
                        <p><?= $prod->getTitre() ?></p>
                        <p><?= $prod->getPrix() ?> €</p>
                    </div>

                    <div class="link-show" <?= $prod->getDisponible()?"onclick='location.href=\"" . site_url("Product/display/".$prod->getId())."\"'":""?>>
                        <?php if($prod->getDisponible()){ ?>
                            <a><img class="icon icon-show" src="<?=base_url("assets/icon/icon-available.svg") ?>" alt="show product" title="Afficher le produit"></a>
                        <?php } else { ?>
                            <a><img class="icon icon-unavailable" src="<?=base_url("assets/icon/icon-unavailable.svg") ?>" alt="product unavailable" title="Produit non disponible"></a> 
                        <?php } ?>
                    </div>

                    <div class="link-download" onclick='location.href="<?= site_url("resource/model/".$prod->getId())?>"'>
                        <a><img class="icon icon-download" src="<?=base_url("assets/icon/icon-download.svg") ?>" alt="download bouton" title="Télécharger le produit"></a>   
                    </div>
                </div>  
            <?php endforeach; ?>
    
        </div>
    </section>

</body>
<?php require_once(APPPATH.'views/main-component/footer.php'); ?>

</html>