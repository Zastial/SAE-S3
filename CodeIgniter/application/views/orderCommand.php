<?php 
$date = date('d/m/Y');
$disabled = empty($this->session->cart);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= <?= base_url("css/orderCommand.css") ?>>
    <title>ShoppingCart</title>
</head>
<body>
<?php require_once(APPPATH.'views/main-component/header.php'); ?>
    <?php require_once (APPPATH.'views/error.php'); ?>

    <section>
        
        <div class="main">
            <div class="summary">
                <div class="summary-facturation tab">
                    <form action="<?= site_url("ShoppingCart/validatePayment") ?>" class="facturation" method="POST">

                        <?php $user = $this->UserModel->findByEmail($this->session->user['email']); ?>

                        <div class="formulaire">
                            <h4>1 Adresse de facturation</h4>
                            <div class="entries">
                                <label for="nom">Nom</label><br>
                                <input class="input" type="text" name="nom" value = "<?= $this->session->user["nom"] ?>" required> <br>

                                <label for="prenom">Prenom</label><br>
                                <input class="input" type="text" name="prenom" value = "<?= $this->session->user["prenom"] ?> " required> <br>         
                                
                                <label for="rue">Numéro de rue</label><br>
                                <input class="input" type="number" min="0" oninput="this.value = Math.abs(this.value)" name="rue" value="<?= ($user->getNumRue()=="NON DEFINI" ? "" : $user->getNumRue())?>" required> <br>

                                <label for="adresse">Adresse</label><br>
                                <input class="input" type="text" name="adresse" value="<?= ($user->getAdresse()=="NON DEFINI" ? "" : $user->getAdresse())?>"  required> <br>

                                <label for="ville">Ville</label><br>
                                <input class="input" type="text" name="ville" value="<?= ($user->getVille()=="NON DEFINI" ? "" : $user->getVille())?>" required> <br>

                                <label for="code_postal">Code postal</label><br>
                                <input class="input" type="number" min="0" oninput="this.value = Math.abs(this.value)" name="code_postal" value="<?= ($user->getPostalCode()=="NON DEFINI" ? "" : $user->getPostalCode())?>" required> <br>
                                
                                <label for="pays">Pays</label><br>
                                <input class="input" type="text" name="pays" value="<?= ($user->getPays()=="NON DEFINI" ? "" : $user->getPays())?>" required> <br>
                            </div>
                        </div>
    
                        <div class='order-total'>
                            <h1>Total</h1>
                            <?php 
                                $total = 0
                            ?>
                            <?php foreach($produits as $prod) :?>
                                <div class="produit-total">
                                    <p><?= $prod->getTitre() ?></p>
                                    <p><?= $prod->getPrix() ?> €</p>
                                    <?php 
                                        $total += $prod->getPrix()
                                    ?>
                                </div>
                            <?php endforeach; ?>
                            <p>Total = <?= $total ?> €</p>
                            <input type="hidden" value="<?= $total ?>" name="total">
                            <button class='btn btn-main btn-orange' type="submit"> Valider paiement </button>
                        </div>
    
                        <div class="payment-methods tab">
                            <h4>2 Méthode de Paiement</h4>
                            <div class="entries">
                                <div class="payment-method">
                                    <div class="payment paypal">
                                        <div class="left">
                                            <input type="radio" id="paypal" name="choose" value="Paypal" checked>
                                            <label for="paypal">Paypal</label>
                                        </div>
                                        <label for="paypal"><img src=<?= base_url("assets/image/PayPal.png")?> alt="paypal"></label>
                                    </div>
                                    <div class="payment cb">
                                        <div class="left">
                                            <input type="radio" id="cb" name="choose" value="CB">
                                            <label for="cb">Carte bancaire</label>
                                        </div>
                                        <label for="cb"><img src=<?= base_url("assets/image/cb.png")?> alt="cb"></label>
                                    </div>
                                    <div class="payment virement">
                                        <div class="left">
                                            <input type="radio" id="virement" name="choose" value="Virement">
                                            <label for="virement">Virement bancaire</label>
                                        </div>
                                        <label for="virement"><img src=<?= base_url("assets/image/virement.png")?> alt="virement"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>


<?php require_once(APPPATH.'views/main-component/footer.php'); ?>

</html>