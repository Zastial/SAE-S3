<?php
if (isset($this->session->user["status"])) {
    $status = $this->session->user["status"];
} else {
    $status = "";
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href= <?= base_url("css/components.css") ?>>
    <link rel="stylesheet" href=<?= base_url("css/style.css") ?> >
    <link rel="stylesheet" href=<?= base_url("css/tabs.css") ?> >
    <link rel="stylesheet" href=<?= base_url("css/colors.css") ?>>
    <script type="text/javascript" src=<?=base_url("js/tabs.js")?>></script>
    <title>Admin</title>
</head>
<body>
    
    <?php require_once('header.php'); ?>

    <div class="main">
        <div class="tab-container">
            <?php if ($status == "Responsable" || $status == "Administrateur"): ?>
                <button class="tab-link" onclick="openTab(event, 'Produits')" clicked>Produits</button>
            <?php endif; ?>    
            <?php if ($status == "Administrateur"): ?>
                <button class="tab-link" onclick="openTab(event, 'Utilisateurs')">Utilisateurs</button>
            <?PHP endif; ?>

            <?php if ($status == "Responsable" || $status == "Administrateur"): ?>
                <button class="tab-link" onclick="openTab(event, 'Categories')">Categories</button>
            <?php endif; ?>
        </div>
    
    
        <?php if ($status == "Responsable" || $status == "Administrateur"): ?>
        <div id="Produits" class="tab-content">
        
            <a class="btn btn-large btn-blue-200" href= <?= site_url("Admin\addProduct")?>>Ajouter un Produit</a>

            <div class="item-container item-container-black">
                <p>ID</p>
                <p>Titre</p>
                <p>Prix</p>
                <p>Disponibilité</p>
            </div>
            
            <?php foreach ($products as $product) :?>
                    <div class="item-container item-container-white">

                        <p><?= $product->getID()?></p>
                        <p><?= $product->getTitre()?></p>
                        <p><?= $product->getPrix()?></p>
                        <p><?= $product->getDisponible() ? "oui" : "non"?></p>

                        <div class="icon-container">
                            <a href="<?=site_url("Admin/modifProduct/".$product->getID()) ?>">
                                <img class="icon" src="<?=base_url("assets/icon/icon-pen.svg")?>" alt="Modifier le produit">
                            </a>
                            <a href="<?=site_url("Admin/removeProduct/".$product->getID()) ?>">
                                <img class="icon icon-delete" src="<?=base_url("assets/icon/icon-delete.svg")?>" alt="Supprimer le produit">
                            </a>
                        </div>
                        
                    </div>
    
            <?php endforeach ; ?>
        </div>
        <?php endif; ?>
        
        
        <?php if ($status == "Administrateur"): ?>
        <div id="Utilisateurs" class="tab-content">

            <div class="item-container item-container-black">
                <p>Nom</p>
                <p>Prénom</p>
                <p>Email</p>
                <p>Status</p>
            </div>

            <?php foreach ($users as $user) :?>


                    <div class="item-container item-container-white">
                        <p> <?= $user->getPrenom()?></p>
                        <p><?= $user->getNom()?></p>
                        <p><?= $user->getEmail()?></p>
                        <p><?= $user->getStatus(); ?></p>

                        
                        <div class="icon-container">
                            <a href="<?=site_url("Admin/modifUser/".$user->getID()) ?>">
                                <img class="icon" src="<?=base_url("assets/icon/icon-pen.svg")?>" alt="Modifier l'utilisateur">
                            </a>
                            <img class="icon icon-delete" src="<?=base_url("assets/icon/icon-delete.svg")?>" alt="Supprimer l'utilisateur">
                        </div>
                    </div>
    
            <?php endforeach ; ?>
    
        </div>
        <?php endif; ?>

        <?php if ($status == "Responsable" || $status == "Administrateur"): ?>
        <div id="Categories" class="tab-content">

            <a class="btn btn-large btn-blue-200" href= <?= site_url("Admin\addCategorie")?>>Ajouter une Catégorie</a>

            <div class="item-container item-container-black">
                <p>ID</p>
                <p>Nom Catégorie</p>
            </div>


            <?php foreach ($categories as $cat) :?>
                    <div class="item-container item-container-white">
                        <p><?= $cat->getId()?></p>
                        <p><?= $cat->getLibelle()?></p>
                        <div class="icon-container">
                            <a href="<?=site_url("Admin/modifCategorie/".$cat->getId()) ?>">
                                <img class="icon" src="<?=base_url("assets/icon/icon-pen.svg")?>" alt="Modifier la catégorie">
                            </a>
                            <script>
                                function supprimerCategorie() {
                                    var x;
                                    var r = confirm("Voulez-vous vraiment supprimer la catégorie ?");

                                    if (r == true) {
                                        window.location.href = "<?= site_url("Admin/removeCategorie/".$cat->getId()) ?>";
                                    }
                                }
                            </script>
                            <a href="<?=site_url("Admin/removeCategorie/".$cat->getId()) ?>">
                                <img class="icon icon-delete" src="<?=base_url("assets/icon/icon-delete.svg")?>" alt="Supprimer la catégorie">
                            </a>
                        </div>
                        
                    </div>

            <?php endforeach ; ?>
        </div>
        <?php endif; ?>
    </div>

</body>
</html>


