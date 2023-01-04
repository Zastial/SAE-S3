<?php

$prenom = empty(set_value('prenom')) ? $this->session->user["prenom"] : set_value('prenom');
$nom = empty(set_value('nom')) ? $this->session->user["nom"] : set_value('nom');
$email = empty(set_value('email')) ? $this->session->user["email"] : set_value('email');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href=<?= base_url("css/modifyAccount.css")?>>


    <title>Modifier le compte</title>
</head>

<style>
    
</style>
<body>
    
    <?php require_once(APPPATH.'views/header.php'); ?>
    
    <section>

        <?php
            $url = site_url("admin/users");
            if (isset($_SERVER['HTTP_REFERER'])) {
                $url = htmlspecialchars($_SERVER['HTTP_REFERER']); 
            }
        ?>
        <a class="btn btn-orange" href="<?=$url?>"> <img src="" alt=""> < Retour </a>

        <?php echo form_open('admin/modifUser/'.$user->getId()); ?>
            <div class="form-container">
                
    
                <div class="form-head">
                    <h1>Modifier les informations de l'utilisateur</h1>
                </div>

    
                <div class="form-input-modifyAccount">         
                        <div class="first-name">
                            <label for="first-name" class="labelTypo require" size="30">Prénom</label><br>
                            <input class="input" type="text" name="prenom" value="<?= $user->getPrenom() ?>" required>
                            <?php echo form_error('prenom'); ?>
                        </div>
                        <div class="name">
                            <label for="name" class="labelTypo require" size="30" >Nom</label><br>
                            <input class="input" type="text" name="nom" value="<?= $user->getNom() ?>" required>
                            <?php echo form_error('nom'); ?>
                        </div>
                    <div class="email">
                        <label for="email" class="labelTypo require" size="30" >Email</label><br>
                        <input class="input" type="email" name="email" value="<?= $user->getEmail() ?>" required>
                        <?php echo form_error('email'); ?>
                    </div>
    
                    <div class="password">
                        <label for="password" class="labelTypo" size="30" >Mot de passe (non obligatoire)</label><br>
                        <input class="input" type="password" name="password" value="<?= set_value('password'); ?>">
                        <?php echo form_error('password'); ?>
                    </div>

    
                </div>
    
                <div class="form-btn">
                    <button class="btn btn-orange btn-main"type="submit">Appliquer les modifications</button>
                </div>
            </div>
        </form>
       



        
    </section>
    
</body>


    <?php require_once(APPPATH.'views/footer.php'); ?>

</html>