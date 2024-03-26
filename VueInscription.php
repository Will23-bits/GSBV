<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>







    <script>
        function validateForm() {
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var logins = document.getElementById('logins').value;
    var mdp = document.getElementById('mdp').value;
    var adresse = document.getElementById('adresse').value;
    var cp = document.getElementById('cp').value;
    var ville = document.getElementById('ville').value;
    var departement = document.getElementById('departement').value;
    var dateEmbauche = document.getElementById('dateEmbauche').value;

    // Liste noire de mots interdits
    var blacklist = ['or', 'and', 'select', 'union', 'order', 'delete', 'update', 'insert', 'drop', 'create', ';', '*', '%', '--', '[', '<', '>', '(', ')', '{', '}', '$', '`', '~'];

    // Vérification si les champs sont vides
    if (nom === '' || prenom === '' || adresse === '' || cp === '' || ville === '' || departement === '' || dateEmbauche === '') {
        alert('Veuillez remplir tous les champs.');
        return false;
    }

    // Vérification si les champs contiennent des mots de la liste noire
    if (isBlacklisted(nom, blacklist) || isBlacklisted(prenom, blacklist) || isBlacklisted(adresse, blacklist) || isBlacklisted(cp, blacklist) || isBlacklisted(ville, blacklist) || isBlacklisted(departement, blacklist) || isBlacklisted(dateEmbauche, blacklist) || isBlacklisted(logins, blacklist) || isBlacklisted(mdp, blacklist)) {
        alert('Certains termes ne sont pas autorisés.');
        return false;
    }

    return true;
}

function isBlacklisted(value, blacklist) {
    value = value.toLowerCase(); // Convertit en minuscules pour une correspondance insensible à la casse
    for (var i = 0; i < blacklist.length; i++) {
        if (value.includes(blacklist[i])) {
            return true; // Trouvé dans la liste noire
        }
    }
    return false; // Non trouvé dans la liste noire
}

function getCodePostalInfo(codePostal) {
            if (codePostal.length === 5) {
                fetch('https://api.zippopotam.us/fr/' + codePostal)
                    .then(response => response.json())
                    .then(data => {
                        var ville = data.places[0]['place name'];
                        var departement = data.places[0]['state'];

                        document.getElementById('ville').value = ville;
                        document.getElementById('departement').value = departement;
                    })
                    .catch(error => console.error('Erreur :', error));
            }
        }



    </script>
</head>
<body>

<h2>Inscription</h2>

<form action="./?action=valideCompte" method="post" onsubmit="return validateForm()">
    <label for="nom">Nom :</label><br>
    <input type="text" id="nom" name="nom"><br>

    <label for="prenom">Prénom :</label><br>
    <input type="text" id="prenom" name="prenom"><br>

    <label for="adresse">Adresse :</label><br>
    <input type="text" id="adresse" name="adresse"><br>

    <label for="cp">Code postal :</label><br>
    <input type="text" id="cp" name="cp"  onkeyup="getCodePostalInfo(this.value)"><br>

    <label for="ville">Ville :</label><br>
    <input type="text" id="ville" name="ville"><br>

    <label for="logins">Login :</label><br>
    <input type="text" id="logins" name="logins"><br>

    <label for="mdp">Mot de passe :</label><br>
    <input type="password" id="mdp" name="mdp"><br>

    <label for="departement">Département :</label><br>
    <input type="text" id="departement" name="departement"><br>

    <label for="dateEmbauche">Date d'embauche :</label><br>
    <input type="text" id="dateEmbauche" name="dateEmbauche"><br><br>

    <input type="submit" value="S'inscrire">
</form>

</body>
</html>