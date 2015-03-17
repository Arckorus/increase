<h1>BANANA !!!!</h1>

<div id="projetTitle">
    <?php
        echo $projet->getNom() . " [" . $equipe->getIdentite() . "]";
    ?>
</div>

<div id="projetDetail">
    <div id="descritption">
        <div id="dateL"></div>
        <div id="dateF"></div>
    </div>
</div>

<div id="equipe">
    <?php
	foreach($equipe as $membre)
	{
		echo "<div class='divCategorie'>" .$membre->getIdentite(). "</div>" ;
    }
    ?>
</div>

<a id="btnMessages" class="btn btn-default" href="">Messages</a>
<div id="divMessages">nuggets</div>