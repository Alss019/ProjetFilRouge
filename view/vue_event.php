<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/event.css">
    <script defer src="./asset/script/script.js"></script>
    <title>Accueil</title>
</head>

<body>
    <main>
    <?php
        $events = new ManagerEvenement();
        $month = new Mois($_GET['month'] ?? null, $_GET['annees'] ?? null);
        $debut = $month->getDebutMois();
        $debut = $debut->format('N') === '1' ? $debut : $month->getDebutMois()->modify('last monday');
        $nbrsem = $month->getSemaine();
        $fin = (clone $debut)->modify('+' . (6 + 7 * ($nbrsem - 1)) . 'days');
        $events = $events->getEventBetweenByDay($bdd ,$debut, $fin);
    ?>

    <?php if(isset($_GET['success'])):?>
        <p>L'ajout de l'evenement a bien ete effectuer</p>
    <?php endif; ?>

    <div class="header_calendar">
        <!-- affiche le mois  -->
        <h1><?= $month->toString(); ?></h1>
        <div class="btn1">
            <!-- Bouton pour changer de mois  -->
            <a href="/projetFilRouge/event?month=<?= $month->MoisPrecedent()->month; ?>&annees=<?= $month->MoisPrecedent()->annees; ?>" class="btn">Mois precedent</a>
            <a href="/projetFilRouge/event?month=<?= $month->MoisSuivant()->month; ?>&annees=<?= $month->MoisSuivant()->annees; ?>" class="btn">Mois suivant</a>
        </div>
    </div>

        <table class="calendar calendar--<?= $nbrsem ?>semaines">
            <!-- Calendrier -->
            <?php for ($i = 0; $i < $nbrsem; $i++) : ?>
                <tr>
                    <?php foreach ($month->days as $j => $day) :
                        $date = (clone $debut)->modify("+" . ($j + $i * 7) . "days"); 
                        $eventsForDays = $events[$date->format('Y-m-d')] ?? [];
                    ?>
                        <td class="<?= $month->DansLeMois($date) ? '' : 'autre_mois'; ?>">
                            <?php if ($i === 0) : ?>
                                <div class="joursem"><?= $day; ?></div>
                            <?php endif; ?>
                                <div class="calendar_jour"><?= $date->format('d'); ?></div>
                            <?php foreach($eventsForDays as $event):?>
                                <div class="calendrier__event">
                                    <?= (new DateTime($event['date_debut_event']))->format('H:i')?> - <a href="/projetFilRouge/event?id=<?= $event['id_event'];?>"><?= $event['nom_event'];?></a>
                                </div>
                                <!-- <div class="form-popup" id="m"> -->
                    
                    <!-- <h1></h1>
                    <button type="submit" name="confirme" class="btn">Confirmer</button>
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button> -->
                                <?php endforeach; ?>
                        </td>

                    <?php endforeach; ?>

                </tr>

            <?php endfor; ?>

        </table>


</body>