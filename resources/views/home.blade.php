@extends('layouts.app')

@section('content')
<div class="container" id="home_container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div id="home_recherche">
                <div id="home_recherche_buttons">
                <button id="home_recherche_button_rec" onclick='modeRecherche("recurrent")'>Trajet récurrent</button>
                <button id="home_recherche_button_pon" onclick='modeRecherche("ponctuel")'>Trajet Ponctuel</button>
                </div>
                
                <div id="recherche_recurrente">
                    <form action="/result">
                        <input type="text" placeholder="Lieu de départ"/>
                        <input type="date" />
                        <input type="text" placeholder="Lieu d'arrivée"/>
                        <div class=spacer></div>
                        <input type="submit" value="Rechercher destination"/>
                    </form>
                </div>
                <div id="recherche_ponctuelle">
                    <form action="/result">
                        <input type="text" placeholder="Lieu de départ"/>
                        <input type="date" />
                        <input type="text" placeholder="Lieu d'arrivée"/>
                        
                        <div class="search_tag_container">
                        <input  type="text" placeholder="Insérer tag"/>
                        <input  type="text" placeholder="Insérer tag"/>
                        <input  type="text" placeholder="Insérer tag"/>
                        </div>
                        
                         
                        
                        <div class=spacer></div>
                        <input type="submit" value="Rechercher destination"/>
                    </form>
                </div>
                
            </div>
           
            
            
        </div>
        
    </div>
    
</div>

<h1 id="title_homepage">Pave the Way</h1>
<h2 id="undertitle_homepage">c'est quoi ?</h2>
<div id="banner_container">
<div id="banner_homepage">
    <div id="center_banner">
        <div><i class="fa fa-btn fa-users"></i><p>Une communauté solidaire</p></div>
        <div><i class="fa fa-btn fa-calendar"></i><p>Conçu pour des trajets réguliers ou ponctuels</p></div>
        <div><i class="fa fa-btn fa-map-marker"></i><p>Destiné à une échelle locale</p></div>
        <div><i class="fa fa-btn fa-leaf"></i><p>Pensé pour une conduite responsable</p></div>
    
    </div>
</div>
    
</div>
@endsection
