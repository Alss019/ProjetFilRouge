<?php 
    $cat = new ManagerCategorie(null,null);
    $tb = $cat->allCat($bdd);
?>
<head>
    <link rel="stylesheet" href="./asset/css/cat.css">
    <title>Categorie</title>
</head>
<body>
<?php foreach($tab as $value):?>
            <span><a href="/projetFilRouge/categorie?id=<?=$value->id_cat?>"><?=$value->nom_cat?></a></span>';
            <?php endforeach?>
    <main>
    
