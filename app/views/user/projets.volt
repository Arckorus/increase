<h3>Mes projets []</h3>
{% for projet in projets %}
    <div><h4> {{ projet.getNom() }} </h4></div>
{% endfor  %}