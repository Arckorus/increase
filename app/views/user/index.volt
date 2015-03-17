
<?php
	foreach($projets as $projet)
	{
		echo Phalcon\Tag::linkTo('projet/show/' . $projet->getId(), "<div class='divCategorie'><h1>" .$projet->getNom(). "</h1></div>") ;
    }
?>