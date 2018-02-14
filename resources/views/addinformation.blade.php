@extends('layouts.app')

@section('content') 

<div>
    <form method="post" action="#" >
        <label for="phone">Numéro de Téléphone</label>
        <input type="text" name="phone" id="phone">
        </br>
         <label for="birthday">Date de Naissance</label>
        <input type="date" name="birthday" id="birthday">
        </br>
         <label for="number_address">N°</label>
        <input type="text" name="number_address" id="number_address" min="0">
         <label for="rue_address">Rue</label>
        <input type="text" name="rue_address" id="rue_address">
        <label for="town_address">Ville</label>
        <input type="text" name="town_address" id="town_address">
         <label for="code_address">Code Postal</label>
        <input type="text" name="code" id="code_address" onkeypress="checknumber()">
    </form>
</div>


<script>
function checknumber() {

}

</script>


@endsection