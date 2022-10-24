<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Form</title>

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






{{-- <script></script> --}}







    @include('Layout.navbar')
    <div class="container mt-5">


        <div class="row g-3" method="post" action="{{route('UpdateForm_CG',$Par->id)}}">

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
                    <input  type="checkbox"style="height: 30px;width: 60px;" class="form-check-input" type="checkbox" name="Transport"
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


            <hr>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Nomres des compagnons : {{$Par->Compagnons->count()}} </label>

                <br>

                <div id="CompagnonExist">
                    @php
                        $indexComp=1;
                    @endphp
                        @foreach ($Par->Compagnons as $Comp)
                        <div id='' style="border: 0.5px solid #e4e4e4;border-radius: 5px;padding: 0.5%; margin-bottom:0.5%" class="container">
                            <i > Compagnon N {{$indexComp++}} </i>


                            <br><br>
                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">N Passport</label>
                                <input type="text" disabled  value="{{$Comp->N_Passport}}" class="form-control"
                                    id="inputEmail4">
                            </div>
                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">Nom</label>
                                <input type="text"  disabled value="{{$Comp->Nom}}" class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">Prénom</label>
                                <input type="text"  disabled  value="{{$Comp->Prenom}}" class="form-control" id="inputEmail4">
                            </div>

                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">Pays</label>
                                <input type="text"  disabled  value="{{$Comp->Pays}}"   class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-md-2">

                                <label for="inputEmail4" class="form-label">Fonction</label>
                                <select disabled name=""  class="form-select form-control" aria-label="Default select example">

                                    @php
                                        $CompFct=$Comp->IdFonction ?? '';
                                    @endphp
                                <option   style="">Choisie une fonction</option>

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

                                <input class="form-control" value="{{$Comp->Vol->N_Vol_Arr}}"  disabled  type="text"  id="">


                            </div>

                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">Date d'Arrivée:</label>

                                <div class='input-group date' id='datetimepicker10'>
                                    <input type='text' value="{{$Comp->Vol->Date_Arr}}"  disabled  class="form-control"  />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar">
                                        </span>
                                    </span>
                                </div>


                            </div>

                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">Heure d'Arrivée:</label>

                                <div class='input-group date time' id='datetimepicker3'>
                                    <input type='text'  value="{{$Comp->Vol->Heure_Arr}}"  disabled class="form-control"  />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>


                            </div>
                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">N De Vol De Départ:</label>

                                <input class="form-control"  value="{{$Comp->Vol->N_Vol_Dep}}" disabled  type="text"  id="">


                            </div>

                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">Date de Départ:</label>

                                <div class='input-group date' id='datetimepicker10'>
                                    <input type='text' value="{{$Comp->Vol->Date_Dep}}"  disabled class="form-control"  />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar">
                                        </span>
                                    </span>
                                </div>


                            </div>

                            <div class="col-md-2">
                                <label for="inputEmail4" class="form-label">Heure de Départ:</label>

                                <div class='input-group date time' id='datetimepicker3'>
                                    <input type='text' value="{{$Comp->Vol->Heure_Dep}}"  disabled class="form-control"  />
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
                $Tng=$Par->AllRes->where('City','=','Mövenpick');
                // dd($Par->AllRes);
                    $TngS_Room=$Tng->where('Type','=','Single Room');
                    $TngD_Room=$Tng->where('Type','=','Double Room');

                $Fndq=$Par->AllRes->where('City','=','Marina Smir');
                    $FndqS_Room=$Fndq->where('Type','=','Single Room');
                    $FndqD_Room=$Fndq->where('Type','=','Double Room');
            @endphp
            <div id='' class="container col-12 ">
                <h3> <b>Reservations Exist</b> </h3>
                    {{-- {{dd($TngS_Room->toArray())}} --}}

                    {{-- Tanger Existed --}}
                    @if($Tng)

                        <div id="" class="col-12 text-center">
                            <div class="container " style="border: 0.5px solid #b6b0b0;border-radius: 5px;padding:2%; margin-bottom:0.5%">
                                <div class="row">
                                    <h3> <b>Mövenpick</b> </h3>

                                        <div style="background-color:#c5cec8a6 !important" class=" py-2 col m-2 rounded">

                                            <label for="" class="form-label">Nombre des Single Rooms : <b>{{$TngS_Room->count()}}</b> </label>

                                            <br>
                                                    {{-- Single Room --}}
                                            <div id="">
                                                @foreach ( $TngS_Room as $Room )

                                                    <div id="" class="container-fluid b-0.5 " style="border: 0.5px solid #e4e4e4;border-radius: 5px;padding: 0.5%; margin-bottom:0.5%">


                                                       <div class="row col-12">

                                                            <div class="col-md-4">
                                                                <label for="inputEmail4" class="form-label">Nombre des Room</label>
                                                                <input type="text" value="{{$Room->NbrRoom}}" disabled class="form-control" id="inputEmail4">
                                                            </div>


                                                            <div class="col-md-4">
                                                                <label for="inputEmail4" class="form-label">From:</label>

                                                                <div class="input-group date" id="datetimepicker10">
                                                                    <input type="text" value="{{$Room->From}}" disabled class="form-control" id="inputEmail4">
                                                                </div>


                                                            </div>


                                                            <div class="col-md-4">
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
                                        <label for="" class="form-label">Nombre des Double Rooms : <b>{{$TngD_Room->count()}}</b> </label>
                                        <br>
                                            {{-- DbRoomTable --}}
                                        <div id="">
                                            @foreach ( $TngD_Room as $Room )

                                                    <div id="" class="container-fluid b-0.5 " style="border: 0.5px solid #e4e4e4;border-radius: 5px;padding: 0.5%; margin-bottom:0.5%">

                                                        <div class="row col-12">
                                                            <div class="col-md-4">
                                                                <label for="inputEmail4" class="form-label">Nombre des Room</label>
                                                                <input type="text" value="{{$Room->NbrRoom}}" disabled class="form-control" id="inputEmail4">
                                                            </div>


                                                            <div class="col-md-4">
                                                                <label for="inputEmail4" class="form-label">From:</label>

                                                                <div class="input-group date" id="datetimepicker10">
                                                                    <input type="text" value="{{$Room->From}}" disabled class="form-control" id="inputEmail4">
                                                                </div>


                                                            </div>


                                                            <div class="col-md-4">
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

                     {{-- Tanger Existed --}}
                     @if($Fndq)

                        <div id="" class="col-12 text-center">
                            <div class="container " style="border: 0.5px solid #b6b0b0;border-radius: 5px;padding:2%; margin-bottom:0.5%">
                                <div class="row">
                                    <h3> <b>Marina Smir</b> </h3>

                                        <div style="background-color:#c5cec8a6 !important" class=" py-2 col m-2 rounded">
                                                    {{-- Single Room --}}
                                            <label for="" class="form-label">Nombre des Single Rooms : <b>{{$FndqS_Room->count()}}</b> </label>

                                            <br>

                                            <div id="">
                                                @foreach ( $FndqS_Room as $Room )

                                                    <div id="" class="container-fluid b-0.5 " style="border: 0.5px solid #e4e4e4;border-radius: 5px;padding: 0.5%; margin-bottom:0.5%">


                                                        <div class="row col-12">
                                                            <div class="col-md-4">
                                                                <label for="inputEmail4" class="form-label">Nombre des Room</label>
                                                                <input type="text" value="{{$Room->NbrRoom}}" disabled class="form-control" id="inputEmail4">
                                                            </div>


                                                            <div class="col-md-4">
                                                                <label for="inputEmail4" class="form-label">From:</label>

                                                                <div class="input-group date" id="datetimepicker10">
                                                                    <input type="text" value="{{$Room->From}}" disabled class="form-control" id="inputEmail4">
                                                                </div>


                                                            </div>


                                                            <div class="col-md-4">
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
                                        <label for="" class="form-label">Nombre des Double Rooms : <b>{{$FndqD_Room->count()}}</b> </label>
                                        <br>
                                            {{-- DbRoomTable --}}
                                        <div id="">
                                            @foreach ( $FndqD_Room as $Room )

                                                <div id="" class="container-fluid b-0.5 " style="border: 0.5px solid #e4e4e4;border-radius: 5px;padding: 0.5%; margin-bottom:0.5%">


                                                        <div class="row col-12">
                                                            <div class="col-md-4">
                                                                <label for="inputEmail4" class="form-label">Nombre des Room</label>
                                                                <input type="text" value="{{$Room->NbrRoom}}" disabled class="form-control" id="inputEmail4">
                                                            </div>


                                                            <div class="col-md-4">
                                                                <label for="inputEmail4" class="form-label">From:</label>

                                                                <div class="input-group date" id="datetimepicker10">
                                                                    <input type="text" value="{{$Room->From}}" disabled class="form-control" id="inputEmail4">
                                                                </div>


                                                            </div>


                                                            <div class="col-md-4">
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










            {{--  --}}



    </div>
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








<style>
    /* input:disabled {
        background-color:red;
    } */
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

<script >
// $('input ,select').on('click', function(e){
//     e.preventDefault();


// })
// $('select').on('change', function(){
//     return false;
// })

$(document).ready(function(){
    $('input ,select').each(function(){


        if( $(this).attr('type') != 'checkbox')   {

            $(this).attr('disabled','true')
        $(this).css("background-color","white")
        }

    })

    $('input[type="checkbox"]').on('click',function(){
       return false;
    })
})



</script>

</html>
