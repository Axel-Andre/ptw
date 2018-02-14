@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div>
                <form>
                    <input type="text" placeholder="Rechercher une ville ou un lieu stratégique"/>
                </form>
                
            </div>
            <h1>Pave the Way</h1>
            
            <div><i class="fa fa-btn fa-calendar"></i>Conçu pour des trajets réguliers</div>
            <div><i class="fa fa-btn fa-map-marker"></i>Destiné à une échelle locale</div>
            <div><i class="fa fa-btn fa-leaf"></i>Pensé pour une conduite responsable</div>
        </div>
    </div>
</div>
@endsection
