<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>

</head>

<body>
    @include('Layout.navbar')
    <div class="container mt-5">


        <form class="row g-3" method="post" action="{{route('sendForm_WC')}}">
            @csrf
            <div class="col-md-2">
                <label for="" class="form-label">N Passport</label>
                <input type="text"  placeholder="N Passport" name="N_Passport" class="form-control" id="Card">
            </div>
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">Nom</label>
                <input type="text"   placeholder="Nom" name="Nom" class="form-control" id="username">
            </div>
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">Prénom</label>
                <input type="text"   placeholder="Prenom" name="Prenom" class="form-control"  >
            </div>
            {{-- <div class="col-md-3">
                <label for="inputEmail4" class="form-label">Fonction</label>
                <input type="text"   placeholder="Fonction" name="Fonction" class="form-control" id="city">
            </div> --}}
            <div class="col-md-3">
                <label for="inputEmail4" class="form-label">Fonction</label>
                <select name="Fonction" class="form-select form-control" aria-label="Default select example">


                    <option style="" value="">Choisie une fonction</option>

                        @foreach ( $fonctions as $fct )
                            <option value="{{$fct->id}}">{{$fct->label}}</option>
                        @endforeach




                  </select>

            </div>


            <div class="col-md-3">
                <label for="" class="form-label">Pays</label>
                <input type="text"   placeholder="Pays" name="Pays" class="form-control" id="country">
            </div>
            <br>
            <br>



            <div class="col-md-4 ">
                <label class="form-label" for="flexSwitchCheckDefault">Transport</label>

                <div class="form-check form-switch ">
                    <input style="height: 30px;width: 60px;" class="form-check-input" type="checkbox" name="Transport"
                        id="flexSwitchCheckDefault">
                </div>
            </div>
            <hr>
            <div class="col-md-12 mt-3">
                <label for="inputEmail4" class="form-label"><b>Vol:</b></label><br>
            </div>



            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">N De Vol d'Arrivée:</label>

                <input class="form-control"  placeholder="N De Vol" type="text" name="N_Vol_Arr" id="">


            </div>
            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">Date d'Arrivée:</label>

                <div class='input-group date' id='datetimepicker10'>
                    <input   type='text' placeholder="yyyy-mm-dd" class="form-control" name="DateArrivee" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar">
                        </span>
                    </span>
                </div>


            </div>

            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">Heure d' Arrivée:</label>

                <div class='input-group date time' id='datetimepicker3'>
                    <input   type='text' placeholder="HH:MM" class="form-control" name="HeureArrivee" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>


            </div>

            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">N De Vol de Départ:</label>

                <input class="form-control"  placeholder="N De Vol" type="text" name="N_Vol_Dep" id="">


            </div>

            <div class="col-md-2">
                <label for="DatedeDepart" class="form-label">Date de Départ:</label>

                <div class='input-group date' id=''>
                    <input  type='text' id='' placeholder="yyyy-mm-dd" class="form-control" name="DateDepart" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar">
                        </span>
                    </span>
                </div>


            </div>

            <div class="col-md-2">
                <label for="inputEmail4" class="form-label">Heure de Départ:</label>

                <div class='input-group date time' id='datetimepicker3'>
                    <input   type='text' placeholder="HH:MM" class="form-control" name="HeureDepart" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>


            </div>
            <hr>


            <div class="col-12">
                <label for="inputAddress2" class="form-label">Nombre des compagnons : </label>
                <input type="number" name='NbrComp' value="0" min="0" max="10">
                <br>

                <div id="CompagnonTable">

                </div>

            </div>


            <hr>

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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



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

<script type="text/javascript">
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

                                @foreach ( $fonctions as $fct )
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
    .form-check-input:checked {
        background-color: #198754;
        border-color: #198754;
    }

</style>

</html>
