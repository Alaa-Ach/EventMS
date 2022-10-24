<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifer la Formulaire</title>

</head>

<body>


<!-- Modal HTML -->



<div id="myModal" class="modal">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body text-center">
				<h4>Great!</h4>
				<p>Formulaire Modifier Avec Succès.</p>
			</div>
		</div>
	</div>
</div>



@php
if (Session::has('success')){
$updated=true;}
else $updated=false;
@endphp



{{-- <script></script> --}}







    @include('Layout.navbar')
    <div class="container mt-5">


        <form class="row g-3" method="post" action="{{route('UpdateForm_WC',$Par->id)}}">
            @csrf
            <div class="col-md-2">
                <label for="" class="form-label">N Passport</label>
                <input type="text"  placeholder="N Passport" name="N_Passport" class="form-control" value="{{$Par->N_Passport ?? ''}}" id="Card">
            </div>
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">Nom</label>
                <input type="text"   placeholder="Nom" name="Nom" class="form-control" id="username" value="{{$Par->Nom ?? ''}}">
            </div>
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">Prénom</label>
                <input type="text"   placeholder="Prenom" name="Prenom" class="form-control" value="{{$Par->Prenom ?? ''}}" >
            </div>
            {{-- <div class="col-md-3">
                <label for="inputEmail4" class="form-label">Fonction</label>
                <input type="text"   placeholder="Fonction" name="Fonction" class="form-control" id="city">
            </div> --}}
            <div class="col-md-3">
                <label for="inputEmail4" class="form-label">Fonction</label>



                  <select name="Fonction" class="form-select form-control" aria-label="Default select example">

                        @php
                            $parFct=$Par->IdFonction ?? '';
                        @endphp
                    <option style="" value="">Choisie une fonction</option>

                               @foreach ( $Fcts as $f)
                               <option  {{$parFct==$f->id ? 'selected'  : ''}} value="{{$f->id}}">{{$f->label}}</option>
                               @endforeach


                  </select>

            </div>


            <div class="col-md-3">
                <label for="" class="form-label">Pays</label>
                <input type="text" value="{{$Par->Pays ?? ''}}"  placeholder="Pays" name="Pays" class="form-control" id="country">
            </div>
            <br>
            <br>



            <div class="col-md-4 ">
                <label class="form-label" for="flexSwitchCheckDefault">Transport</label>
                @php
                    $Tr=$Par->Transport ?? '';
                @endphp
                <div class="form-check form-switch ">
                    <input style="height: 30px;width: 60px;" class="form-check-input" type="checkbox" name="Transport"
                        id="flexSwitchCheckDefault" {{$Tr==1 ? 'checked' : ''}}>
                </div>
            </div>
            <hr>
            <div class="col-md-12 mt-3">
                <label for="inputEmail4" class="form-label"><b>Vol:</b></label><br>
            </div>
            @php
                $Vol=$Par->Vol;
            @endphp


            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">N De Vol d'Arrivée:</label>

                <input  class="form-control"  placeholder="N De Vol" type="text" name="N_Vol_Arr" value="{{$Vol->N_Vol_Arr ?? ''}}" id="">


            </div>
            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">Date d'Arrivée:</label>

                <div class='input-group date' id='datetimepicker10'>
                    <input   type='text' placeholder="yyyy-mm-dd" class="form-control" name="DateArrivee" value="{{$Vol->Date_Arr ?? ''}}"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar">
                        </span>
                    </span>
                </div>


            </div>

            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">Heure d' Arrivée:</label>

                <div class='input-group date time' id='datetimepicker3'>
                    <input   type='text' placeholder="HH:MM" class="form-control" name="HeureArrivee"  value="{{$Vol->Heure_Arr ?? ''}}"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>


            </div>

            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">N De Vol de Départ:</label>

                <input class="form-control"  placeholder="N De Vol" type="text" name="N_Vol_Dep" value="{{$Vol->N_Vol_Dep ?? ''}}" id="">


            </div>

            <div class="col-md-2">
                <label for="DatedeDepart" class="form-label">Date de Départ:</label>

                <div class='input-group date' id=''>
                    <input  type='text' id='' placeholder="yyyy-mm-dd" class="form-control" name="DateDepart" value="{{$Vol->Date_Dep ?? ''}}" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar">
                        </span>
                    </span>
                </div>


            </div>

            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">Heure de Départ:</label>

                <div class='input-group date time' id='datetimepicker3'>
                    <input   type='text' placeholder="HH:MM" class="form-control" name="HeureDepart" value="{{$Vol->Heure_Dep ?? ''}}" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>


            </div>


            <hr>

            {{-- Ajouter des compagnons  --}}
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Ajouter des compagnons : </label>
                <input  type="number" name='NbrComp' value="0" min="0" max="10">
                <br>

                <div id="CompagnonTable">

                </div>

            </div>
            <hr>
            {{-- Compagnon Exist --}}
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Nomres des compagnons : {{count($Par->AllComp)}} </label>

                <br>

                <div id="CompagnonExist">
                    @php
                        $indexComp=1;
                    @endphp
                        @foreach ($Par->AllComp as $Comp)
                        <div id='' style="border: 0.5px solid #e4e4e4;border-radius: 5px;padding: 0.5%; margin-bottom:0.5%" class="container">
                            <i > Compagnon N {{$indexComp++}} </i>

                            <span class="pull-right">
                                <input type="checkbox" name="DeleteComp[]" value="{{$Comp->id}}" id="">
                                <label for=""> Supprimer</label>

                            </span>

                            <br><br>
                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">N Passport</label>
                                <input type="text"   value="{{$Comp->N_Passport}}" name="UpdateComp[{{$Comp->id}}][N_Passport]" class="form-control"
                                    id="inputEmail4">
                            </div>
                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">Nom</label>
                                <input type="text"   value="{{$Comp->Nom}}" name="UpdateComp[{{$Comp->id}}][Nom]" class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">Prénom</label>
                                <input type="text"    value="{{$Comp->Prenom}}" name="UpdateComp[{{$Comp->id}}][Prenom]" class="form-control" id="inputEmail4">
                            </div>

                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">Pays</label>
                                <input type="text"    value="{{$Comp->Pays}}"   name="UpdateComp[{{$Comp->id}}][Pays]" class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-md-2">

                                <label for="inputEmail4" class="form-label">Fonction</label>
                                <select  name="UpdateComp[{{$Comp->id}}][Fonction]"  class="form-select form-control" aria-label="Default select example">

                                    @php
                                        $CompFct=$Comp->IdFonction ?? '';
                                    @endphp
                                <option   style="" value="">Choisie une fonction</option>

                                           @foreach ( $Fcts as $f)
                                           <option  {{$CompFct==$f->id ? 'selected'  : ''}} value="{{$f->id}}">{{$f->label}}</option>
                                           @endforeach


                              </select>

                                </div>

                                @php
                                $CompVol=$Comp->Vol ?? '';
                            @endphp

                            <div class="col-md-12 mt-3">
                                <label for="inputEmail4"  class="form-label"><b>Vol:</b></label><br>
                            </div>
                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">N De Vol D'Arrivée:</label>

                                <input class="form-control" name="UpdateComp[{{$Comp->id}}][N_Vol_Arr]" value="{{$Comp->Vol->N_Vol_Arr ?? ' '}}"    type="text"  id="">


                            </div>

                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">Date d'Arrivée:</label>

                                <div class='input-group date' id='datetimepicker10'>
                                    <input type='text' name="UpdateComp[{{$Comp->id}}][Date_Arr]" value="{{$Comp->Vol->Date_Arr ?? ' '}}"    class="form-control"  />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar">
                                        </span>
                                    </span>
                                </div>


                            </div>

                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">Heure d'Arrivée:</label>

                                <div class='input-group date time' id='datetimepicker3'>
                                    <input type='text' name="UpdateComp[{{$Comp->id}}][Heure_Arr]"  value="{{$Comp->Vol->Heure_Arr ?? ' '}}"   class="form-control"  />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>


                            </div>
                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">N De Vol De Départ:</label>

                                <input class="form-control" name="UpdateComp[{{$Comp->id}}][N_Vol_Dep]" value="{{$Comp->Vol->N_Vol_Dep ?? ' '}}"   type="text"  id="">


                            </div>

                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">Date de Départ:</label>

                                <div class='input-group date' id='datetimepicker10'>
                                    <input type='text' value="{{$Comp->Vol->Date_Dep ?? ' '}}" name="UpdateComp[{{$Comp->id}}][Date_Dep]"  class="form-control"  />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar">
                                        </span>
                                    </span>
                                </div>


                            </div>

                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">Heure de Départ:</label>

                                <div class='input-group date time' id='datetimepicker3'>
                                    <input type='text' value="{{$Comp->Vol->Heure_Dep ?? ' '}}" name="UpdateComp[{{$Comp->id}}][Heure_Dep]"  class="form-control"  />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>


                            </div>




                        </div>
                        @endforeach
                </div>

            </div>

            <hr>
            {{-- Existed Reservations --}}
            @php
                $M_Smir=$Par->AllRes->where('HotelName','=','Marina Smir');
                    $S_Room=$M_Smir->where('Type','=','Single Room');
                    $D_Room=$M_Smir->where('Type','=','Double Room');

                $M_Beach=$Par->AllRes->where('HotelName','=','Marina Beach');

            @endphp
            <div id='' class="container col-12 ">
                <h3> <b>Reservations Exist</b> </h3>

                    {{-- Marina beach Existed --}}
                    @if($M_Beach)


                            <div id="" class="col-12 text-center">
                                <div class="container "
                                    style="border: 0.5px solid #b6b0b0;border-radius: 5px;padding:2%; margin-bottom:0.5%">
                                    <div class="row">
                                        <h3> <b>Marina Beach</b> </h3>
                                        <label for="" class="form-label">Nombre des Appartements : {{$M_Beach->count()}} </label>
                                        <br>
                                        @foreach ( $M_Beach as $App )
                                            <div style="background-color:#c5cec8a6 !important" class=" py-2 col-12 m-2 rounded">



                                                <div id="">
                                                    <div id='newApp' class="container-fluid b-0.5 " style="border: 0.5px solid #e4e4e4;border-radius: 5px;padding: 0.5%; margin-bottom:0.5%" class="container">

                                                        <div class="col-md-3">
                                                            <label for="inputEmail4" class="form-label">Nombre des Personnes:</label>
                                                            <input type="text"  readonly value={{$App->Nbr_Personne}}  class="form-control"
                                                                id="inputEmail4">
                                                        </div>



                                                        <div class="col-md-3">
                                                            <label for="inputEmail4" class="form-label">From:</label>

                                                            <div class='input-group date' id='datetimepicker10'>
                                                                <input type='text' readonly value={{$App->From}}  placeholder="yyyy-mm-dd" class="form-control"  />
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar">
                                                                    </span>
                                                                </span>
                                                            </div>


                                                        </div>




                                                        <div class="col-md-3">
                                                            <label for="inputEmail4" class="form-label">To:</label>

                                                            <div class='input-group date' id='datetimepicker10'>
                                                                <input type='text'  readonly value={{$App->To}} placeholder="yyyy-mm-dd" class="form-control" />
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar">
                                                                    </span>
                                                                </span>
                                                            </div>


                                                        </div>

                                                        <div class="mt-5 col-md-3">
                                                            <span class="bg-danger p-3 rounded">
                                                                <input type="checkbox" id="checkbox{{$App->id}}" name="DeleteRes[]" value="{{$App->id}}" id="">
                                                                <label style="color:white" for="checkbox{{$App->id}}"> Supprimer</label>

                                                            </span>
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                            </div>


                    @endif
                    {{-- Marina Smir Existed --}}
                    @if($M_Smir)

                        <div id="" class="col-12 text-center">
                            <div class="container " style="border: 0.5px solid #b6b0b0;border-radius: 5px;padding:2%; margin-bottom:0.5%">
                                <div class="row">
                                    <h3> <b>Marina Smir</b> </h3>

                                        <div style="background-color:#c5cec8a6 !important" class=" py-2 col m-2 rounded">
                                                    {{-- Single Room --}}
                                            <label for="" class="form-label">Nombre des Single Rooms : <b>{{$S_Room->count()}}</b> </label>

                                            <br>

                                            <div id="">
                                                @foreach ( $S_Room as $Room )

                                                    <div id="" class="container-fluid b-0.5 " style="border: 0.5px solid #e4e4e4;border-radius: 5px;padding: 0.5%; margin-bottom:0.5%">
                                                        <div class="row col-md-3 ">
                                                            <span class="bg-danger mb-2 border-2 rounded-2">
                                                                <input type="checkbox" id="checkbox{{$Room->id}}" name="DeleteRes[]" value="{{$Room->id}}" id="">
                                                                <label style="color:white" for="checkbox{{$Room->id}}"> Supprimer</label>

                                                            </span>
                                                        </div>

                                                        <div class="row col-12">


                                                            <div class="col-md-6">
                                                                <label for="inputEmail4" class="form-label">From:</label>

                                                                <div class="input-group date" id="datetimepicker10">
                                                                    <input type="text" value="{{$Room->From}}" disabled class="form-control" id="inputEmail4">
                                                                </div>


                                                            </div>


                                                            <div class="col-md-6">
                                                                <label for="inputEmail4" class="form-label">To:</label>

                                                                <div class="input-group date" id="datetimepicker10">
                                                                    <input type="text" value="{{$Room->To}}" disabled class="form-control" id="inputEmail4">
                                                            </div>




                                                        </div>


                                                    </div>





                                                </div>

                                                @endforeach
                                            </div>


                                        </div>




                                    <div style="background-color:#c5cec8a6 !important" class=" py-2 col m-2 rounded">
                                        <label for="" class="form-label">Nombre des Double Rooms : <b>{{$D_Room->count()}}</b> </label>
                                        <br>
                                            {{-- DbRoomTable --}}
                                        <div id="">
                                            @foreach ( $D_Room as $Room )

                                                <div id="" class="container-fluid b-0.5 " style="border: 0.5px solid #e4e4e4;border-radius: 5px;padding: 0.5%; margin-bottom:0.5%">
                                                        <div class="row col-md-3 ">
                                                            <span class="bg-danger mb-2 border-2 rounded-2">
                                                                <input type="checkbox" id="checkbox{{$Room->id}}" name="DeleteRes[]" value="{{$Room->id}}" id="">
                                                                <label style="color:white" for="checkbox{{$Room->id}}"> Supprimer</label>

                                                            </span>
                                                        </div>

                                                        <div class="row col-12">



                                                            <div class="col-md-6">
                                                                <label for="inputEmail4" class="form-label">From:</label>

                                                                <div class="input-group date" id="datetimepicker10">
                                                                    <input type="text" value="{{$Room->From}}" disabled class="form-control" id="inputEmail4">
                                                                </div>


                                                            </div>


                                                            <div class="col-md-6">
                                                                <label for="inputEmail4" class="form-label">To:</label>

                                                                <div class="input-group date" id="datetimepicker10">
                                                                    <input type="text" value="{{$Room->To}}" disabled class="form-control" id="inputEmail4">
                                                                </div>


                                                            </div>

                                                        </div>

                                                </div>

                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    @endif

        </div>



            <hr>
            <h3> <b>Ajouter des Reservations </b> </h3>

            {{-- Marina Beach --}}
            <div id='Marina_Beach_Div' class="col-12 text-center">
                <div class="container "
                    style="border: 0.5px solid #b6b0b0;border-radius: 5px;padding:2%; margin-bottom:0.5%">
                    <div class="row">
                        <h3> <b>Marina Beach</b> </h3>

                        <div style="background-color:#c5cec8a6 !important" class=" py-2 col m-2 rounded">

                            <label for="" class="form-label">Nombre des Appartements : </label>
                            <input type="number" name='N_App' value="0" min="0" max="10">
                            <br>

                            <div id="AppTable">

                            </div>


                        </div>


                    </div>
                </div>

            </div>
            {{-- Smir --}}
            <div id='MarinaSmir_Div' class="col-12 text-center">
                <div class="container "
                    style="border: 0.5px solid #b6b0b0;border-radius: 5px;padding:2%; margin-bottom:0.5%">
                    <div class="row">
                        <h3> <b>Marina Smir</b> </h3>

                        <div style="background-color:#c5cec8a6 !important" class=" py-2 col m-2 rounded">

                            <label for="" class="form-label">Nombre des Single Rooms : </label>
                            <input type="number" name='N_SRoom_Smir' value="0" min="0" max="10">
                            <br>

                            <div id="AppTable">

                            </div>


                        </div>


                        <div style="background-color:#c5cec8a6 !important" class=" py-2 col m-2 rounded">
                            <label for="" class="form-label">Nombre des Double Rooms : </label>
                            <input type="number" name='N_DbRoom_Smir' value="0" min="0" max="10">
                            <br>

                            <div id="DbRoomTable">

                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <button class=" col-12 btn btn-primary" type="submit">Enregistrer </button>



            {{--  --}}



        </form>
    </div>

</body>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
<script src="https://code.jquery.com/jquery.min.js"></script>



{{-- time --}}
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
</script>

<!-- Include Moment.js CDN -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js">
</script>

<!-- Include Bootstrap DateTimePicker CDN -->
<link
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
    rel="stylesheet">

<script
src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
</script>

{{-- modal --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



<script>

</script>

<script type="text/javascript">

    function show_model(){
        $('#myModal').modal('show');
    }

    $('.close').on('click', function(){
        $(this).parents().modal('hide');
    });





    function TimeInput() {

        $('.time').datetimepicker({

        format: 'HH:mm'
        });
    }


    function DateInput() {
        $('.date').datetimepicker({
            viewMode: 'years',
            format: 'YYYY-MM-DD',

            // minDate:'2020-04',
            // maxDate:'2020-04',
            // Default: false,
        });



    }



    $(document).ready(function() {
        {{$updated ? 'show_model();' : '' }}
        // show_model()
        // $('input:text').val('');
        // $('input[type=number]').val('0');
        $('form')[1].reset();
        TimeInput();
        DateInput();

    })
//Marina Beach

    var AppIndex = 0;

    function App() {

        currentRow = $('#Marina_Beach_Div #AppTable #newApp').length;
        acc = $('input[name=N_App]').val();

        diff = acc - currentRow;



        for (var i = 0; i < acc - currentRow; i++) {

            $("#Marina_Beach_Div #AppTable").append(`<div id='newApp' class="container-fluid b-0.5 " style="border: 0.5px solid #e4e4e4;border-radius: 5px;padding: 0.5%; margin-bottom:0.5%" class="container">

                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">Nombre des Personnes:</label>
                    <input type="number" min=1 value=1 name="App[${AppIndex}][Nbr_Personne]" class="form-control"
                        id="inputEmail4">
                </div>



                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">From:</label>

                    <div class='input-group date' id='datetimepicker10'>
                        <input type='text'   placeholder="yyyy-mm-dd" class="form-control" name="App[${AppIndex}][From]" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>


                </div>




                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">To:</label>

                    <div class='input-group date' id='datetimepicker10'>
                        <input type='text'   placeholder="yyyy-mm-dd" class="form-control" name="App[${AppIndex}][To]"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>


                </div>





            </div>
            `);
            AppIndex++;
            TimeInput();
            DateInput();

        }


        if (diff < 0) {
            // console.log('-');
            for (var i = 0; i < -diff; i++) {
                AppIndex--;
                //    console.log($('tr[data="row"]').lastElementChild());
                $("#Marina_Beach_Div #AppTable").find('div#newApp:last').remove();
                // $("#CompagnonTable").removeChild('tr[data="row"]');
        }

        }
        }
    $('input[name="N_App"]').on('change keyup', function() {
        // console.log('a');
        App();

    });


//Marina Smir
    //Double Rooms
        var DbRmSmirIndex = 0;

        function DbRmSmir() {

        RowDbRoom = $('#MarinaSmir_Div #DbRoomTable #newApp').length;

        Inp_DbRoom = $('input[name=N_DbRoom_Smir]').val();
        diffDbRoom = Inp_DbRoom - RowDbRoom;


        for (var i = 0; i < Inp_DbRoom-RowDbRoom; i++) {

            $("#MarinaSmir_Div #DbRoomTable").append(`<div id='newApp' class="container-fluid b-0.5 " style="border: 0.5px solid #e4e4e4;border-radius: 5px;padding: 0.5%; margin-bottom:0.5%" class="container">


                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">From:</label>

                    <div class='input-group date' id='datetimepicker10'>
                        <input type='text'   placeholder="yyyy-mm-dd" class="form-control" name="DbRoomSmir[${DbRmSmirIndex}][From]" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>


                </div>


                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">To:</label>

                    <div class='input-group date' id='datetimepicker10'>
                        <input type='text'  placeholder="yyyy-mm-dd" class="form-control" name="DbRoomSmir[${DbRmSmirIndex}][To]"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>


                </div>


                </div>`);

            DbRmSmirIndex++;
            TimeInput();
            DateInput();

        }

        if (diffDbRoom < 0) {
            for (var i = 0; i < -diffDbRoom; i++) {
                DbRmSmirIndex--;
            $("#MarinaSmir_Div #DbRoomTable").find('div#newApp:last').remove();

            }
        }
        }
        $('input[name="N_DbRoom_Smir"]').on('change keyup', function() {
            // console.log('a');
            DbRmSmir();

        });



    //Single Rooms
        var SRoomSmirIndex = 0;

        function SRoomSmir() {

            currentRow = $('#MarinaSmir_Div #AppTable #newApp').length;
            acc = $('input[name=N_SRoom_Smir]').val();
            diff = acc - currentRow;

            console.log($('#MarinaSmir_Div #AppTable #newApp').length);


            for (var i = 0; i < acc - currentRow; i++) {

                $("#MarinaSmir_Div #AppTable").append(`<div id='newApp' class="container-fluid b-0.5 " style="border: 0.5px solid #e4e4e4;border-radius: 5px;padding: 0.5%; margin-bottom:0.5%" class="container">




                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">From:</label>

                        <div class='input-group date' id='datetimepicker10'>
                            <input type='text'   placeholder="yyyy-mm-dd" class="form-control" name="SRoomSmir[${SRoomSmirIndex}][From]" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar">
                                </span>
                            </span>
                        </div>


                    </div>


                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">To:</label>

                        <div class='input-group date' id='datetimepicker10'>
                            <input type='text'  placeholder="yyyy-mm-dd" class="form-control" name="SRoomSmir[${SRoomSmirIndex}][To]"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar">
                                </span>
                            </span>
                        </div>


                    </div>





                </div>
                `);
                SRoomSmirIndex++;
                TimeInput();
                DateInput();

            }
            // console.log(diff);
            if (diff < 0) {
                // console.log('-');
                for (var i = 0; i < -diff; i++) {
                    SRoomSmirIndex--;
                    //    console.log($('tr[data="row"]').lastElementChild());
                    $("#MarinaSmir_Div #AppTable").find('div#newApp:last').remove();
                    // $("#CompagnonTable").removeChild('tr[data="row"]');
            }

            }
            }
        $('input[name="N_SRoom_Smir"]').on('change', function() {
            // console.log('a');
            SRoomSmir();

        });
        $('input[name="N_SRoom_Smir"]').on('keyup', function() {
            SRoomSmir();

        });




//CompForms

        var indexComp = 0;

        function CompForm() {

        currentRow = $('#CompagnonTable #newComp').length;
        acc = $('input[name=NbrComp]').val();
        diff = acc - currentRow;

        console.log($('#CompagnonTable #newComp').length);


        for (var i = 0; i < acc - currentRow; i++) {

            $("#CompagnonTable").append(`
            <div id='newComp' style="border: 0.5px solid #e4e4e4;border-radius: 5px;padding: 0.5%; margin-bottom:0.5%" class="container">
                        <i > Compagnon N ${indexComp+1} </i>
                        <br><br>
                        <div class="col-md-2">
                            <label for="inputEmail4" class="form-label">N Passport</label>
                            <input type="text"  placeholder="N Passport" name="Comp[${indexComp}][N_Passport]" class="form-control"
                                id="inputEmail4">
                        </div>
                        <div class="col-md-2">
                            <label for="inputEmail4" class="form-label">Nom</label>
                            <input type="text"  placeholder="Nom" name="Comp[${indexComp}][Nom]" class="form-control" id="Nom">
                        </div>
                        <div class="col-md-2">
                            <label for="inputEmail4" class="form-label">Prénom</label>
                            <input type="text"  placeholder="Prénom" name="Comp[${indexComp}][Prenom]" class="form-control" id="Prenom">
                        </div>

                        <div class="col-md-2">
                            <label for="inputEmail4" class="form-label">Pays</label>
                            <input type="text"  placeholder="Pays" name="Comp[${indexComp}][Pays]" class="form-control" id="Pays">
                        </div>
                        <div class="col-md-2">

                            <label for="inputEmail4" class="form-label">Fonction</label>
                            <select name="Comp[${indexComp}][Fonction]" class="form-select form-control" aria-label="Default select example">


                            <option style="" value="">Choisie une fonction</option>

                                @foreach ( $Fcts as $fct )
                                    <option value="{{$fct->id}}">{{$fct->label}}</option>
                                @endforeach




                </select>
                            </div>

                        <div class="col-md-12 mt-3">
                            <label for="inputEmail4"  class="form-label"><b>Vol:</b></label><br>
                        </div>
                        <div class="col-md-2">
                            <label for="inputEmail4" class="form-label">N De Vol D'Arrivée:</label>

                            <input class="form-control"   placeholder="N De Vol" type="text" name="Comp[${indexComp}][N_Vol_Arr]" id="">


                        </div>

                        <div class="col-md-2">
                            <label for="inputEmail4" class="form-label">Date d'Arrivée:</label>

                            <div class='input-group date' id='datetimepicker10'>
                                <input type='text'  placeholder="yyyy-mm-dd" class="form-control" name="Comp[${indexComp}][DateArrivee]"' />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                                </span>
                            </div>


                        </div>

                        <div class="col-md-2">
                            <label for="inputEmail4" class="form-label">Heure d'Arrivée:</label>

                            <div class='input-group date time' id='datetimepicker3'>
                                <input type='text'   placeholder="HH:MM" class="form-control" name="Comp[${indexComp}][HeureArrivee]" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>


                        </div>
                        <div class="col-md-2">
                            <label for="inputEmail4" class="form-label">N De Vol De Départ:</label>

                            <input class="form-control"   placeholder="N De Vol" type="text" name="Comp[${indexComp}][N_Vol_Dep]" id="">


                        </div>

                        <div class="col-md-2">
                            <label for="inputEmail4" class="form-label">Date de Départ:</label>

                            <div class='input-group date' id='datetimepicker10'>
                                <input type='text'   placeholder="yyyy-mm-dd" class="form-control" name="Comp[${indexComp}][DateDepart]" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                                </span>
                            </div>


                        </div>

                        <div class="col-md-2">
                            <label for="inputEmail4" class="form-label">Heure de Départ:</label>

                            <div class='input-group date time' id='datetimepicker3'>
                                <input type='text'  placeholder="HH:MM" class="form-control" name="Comp[${indexComp}][HeureDepart]" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>


                        </div>




                    </div>







            `);
            indexComp++;
            TimeInput();
            DateInput();

        }
        // console.log(diff);
        if (diff < 0) {
            console.log('-');
            for (var i = 0; i < -diff; i++) {
                indexComp--;
                //    console.log($('tr[data="row"]').lastElementChild());
                $("#CompagnonTable").find('div#newComp:last').remove();
                // $("#CompagnonTable").removeChild('tr[data="row"]');
            }

        }
        }
        $('input[name="NbrComp"]').on('change', function() {
        CompForm();

        });
        $('input[name="NbrComp"]').on('keyup', function() {
        CompForm();

        });
</script>

<style>
    /* Modal */
            .modal-confirm {
                color: #434e65;
                width: 525px;
                margin: 30px auto;
            }
            .modal-confirm .modal-content {
                padding: 20px;
                font-size: 16px;
                border-radius: 5px;
                border: none;
            }
            .modal-confirm .modal-header {
                background: #47c9a2;
                border-bottom: none;
                position: relative;
                text-align: center;
                margin: -20px -20px 0;
                border-radius: 5px 5px 0 0;
                padding: 35px;
            }
            .modal-confirm h4 {
                text-align: center;
                font-size: 36px;
                margin: 10px 0;
            }
            .modal-confirm .form-control, .modal-confirm .btn {
                min-height: 40px;
                border-radius: 3px;
            }
            .modal-confirm .close {
                position: absolute;
                top: 15px;
                right: 15px;
                color: #fff;
                text-shadow: none;
                opacity: 0.5;
            }
            .modal-confirm .close:hover {
                opacity: 0.8;
            }
            .modal-confirm .icon-box {
                color: #fff;
                width: 95px;
                height: 95px;
                display: inline-block;
                border-radius: 50%;
                z-index: 9;
                border: 5px solid #fff;
                padding: 15px;
                text-align: center;
            }
            .modal-confirm .icon-box i {
                font-size: 64px;
                margin: -4px 0 0 -4px;
            }
            .modal-confirm .btn {
                color: #fff;
                border-radius: 4px;
                background: #eeb711;
                text-decoration: none;
                transition: all 0.4s;
                line-height: normal;
                border-radius: 30px;
                margin-top: 10px;
                padding: 6px 20px;
                border: none;
            }
            .modal-confirm .btn:hover, .modal-confirm .btn:focus {
                background: #eda645;
                outline: none;
            }
            .modal-confirm .btn span {
                margin: 1px 3px 0;
                float: left;
            }
            .modal-confirm .btn i {
                margin-left: 1px;
                font-size: 20px;
                float: right;
            }
            .trigger-btn {
                display: inline-block;
                margin: 100px auto;
            }



    .form-check-input:checked {
        background-color: #198754;
        border-color: #198754;
    }

</style>

</html>
