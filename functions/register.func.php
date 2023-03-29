<?php

if (isset($_POST['submit'])) {

    $nom = htmlspecialchars(trim($_POST['nom_util']));
    $prenom = htmlspecialchars(trim($_POST['prenom_util']));
    $email = htmlspecialchars(trim($_POST['email_util']));
    $grade = htmlspecialchars(trim($_POST['id_grade']));
    // $matiere = htmlspecialchars(trim($_POST['matiere_util']));
    $sexe = htmlspecialchars(trim($_POST['sexe_util']));
    $matricule_eleve = htmlspecialchars(trim(intval($_POST['matricule_eleve'])));
    // $confirm_email = htmlspecialchars(trim($_POST['confirm_email_utils']));
    $motpass = htmlspecialchars(trim($_POST['motpass_util']));
    $motpass_repeat = htmlspecialchars(trim($_POST['motpass_repeat_util']));
    // $etat_civil = htmlspecialchars(trim($_POST['etat_civil_util']));
    $token = token(30);


    if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($motpass) && !empty($motpass_repeat)) {

        $motpasslenght = strlen($motpass);
        if ($motpasslenght >= 8) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (email_taken($email)) {

                    $error = "<font color='red'>Cette adresse email est déjà utilisée !</font>";
                } else {

                    if ($motpass == $motpass_repeat) {

                        $longeurCle = 15;
                        $Cle = "";
                        for ($i = 1; $i < $longeurCle; $i++) {

                            $Cle .= mt_rand(0, 9);
                        }

                        if ($grade != 6) {
                            utilRegister($nom, $prenom, $email, $sexe, $grade, $motpass, $token, $Cle, $matricule_eleve = 1);
                        } else {
                            utilRegister($nom, $prenom, $email, $sexe, $grade, $motpass, $token, $Cle, $matricule_eleve);
                        }
                    } else {
                        $error = "<font color='red'>Les deux mots de passes ne sont pas identiques !</font>";
                    }
                }
            } else {
                $error = "<font color='red'>Votre adresse email n'est pas valide !</font>";
            }
        } else {
            $error = "<font color='red'>Mot de passe trop court !</font>";
        }
    } else {

        $error = "<font color='red'>Tous les champs ne sont pas remplis !</font>";
    }
}
















// La fonction qui permet à l'utilisateur de créer son compte
function utilRegister($nom, $prenom, $email, $sexe, $grade, $motpass, $token, $Cle, $matricule_eleve)
{

    global $db;
    $sql = "INSERT INTO utils(nom_util, prenom_util, email_util, motpass_util, sexe_util, id_grade, token_util, confirmCle_util, matricule_eleve, date_inscription_util) VALUES(:nom_util, :prenom_util, :email_util, :motpass_util, :sexe_util, :id_grade, :token_util, :confirmCle_util, :matricule_eleve, NOW())";
    $req = $db->prepare($sql);
    $c = ([

        'nom_util'        => $nom,
        'prenom_util'     => $prenom,
        'email_util'      => $email,
        'id_grade'      => $grade,
        // 'matiere_util'    => $matiere,
        'sexe_util'       => $sexe,
        'token_util'      => $token,
        'confirmCle_util' => $Cle,
        // 'etat_civil_util' => $etat_civil,
        'matricule_eleve' => $matricule_eleve,
        'motpass_util'    => sha1($motpass)
    ]);
    $req->execute($c);






    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From:"JoSchool.com"<support@JoSchool.com>' . "\n";
    $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
    $header .= 'Content-Transfer-Encoding: 8bit';

    $message = '
            <html>
                <body>
                    <div align="center">
                        <a href="http://localhost:800/module2/confirmation.php?email_util=' . urlencode($email) . '&Cle=' . $Cle . '">Confirmez votre compte !</a>
                    
                        <br/>
                        
                        <hr>
                    </div>
                </body>
            </html>
            ';

    mail($email, "Confirmation de compte", $message, $header);
}
// Recuperation des grades pour le select du formulaire register
function get_grades()
{
    global $db;

    $req = $db->query("SELECT * FROM grades  ORDER BY id_grade DESC");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}
$grades = get_grades();

// Recuperation des matieres pour le select du formulaire register
function get_matieres()
{
    global $db;

    $req = $db->query("SELECT * FROM matieres  ORDER BY id_matiere DESC");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}

function token($length)
{

    $chars = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789";
    return substr(str_shuffle(str_repeat($chars, $length)), 0, $length);
}
// La fonction qui permet verifier si l'email a déjà été utilisé
function email_taken($email)
{

    global $db;

    $e = ['email_util'     => $email];

    $sql = "SELECT * FROM utils WHERE email_util =:email_util";
    $req = $db->prepare($sql);
    $req->execute($e);
    $free = $req->rowCount($sql);

    return $free;
}



// Recuperation du sexe pour le select du formulaire register
function get_sexes()
{
    global $db;

    $req = $db->query("SELECT * FROM sexes  ORDER BY id_sexe DESC");

    $results = [];

    while ($rows = $req->fetchObject()) {
        $results[] = $rows;
    }

    return $results;
}

$sexes = get_sexes();
