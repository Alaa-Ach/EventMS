<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel</title>
</head>
<body>
    <div class="m-5">

        <div class="row">

            {{-- Search All --}}
            <div class="col-2">
                <label for="Search :" class="label-control">Search :</label>
                <input type="text" class="form-control" id="myInput" Placeholder="Search">

            </div>

            {{-- Export --}}
            <div class="col-2" style="margin-left: auto;margin-right: 0;">
                <button id="Export" class="btn btn-success">Export CSV</button>
                <button type="" style="" id="Pdf" class=" btn btn-danger">Export PDF</button>

            </div>
        </div>
    </div>
    <hr class="mx-0">

<div class="container all">
    @foreach ($allRes as $key => $City)
        <h1>{{ $key }}</h1>
        <br>

        @foreach ($City as $key => $Type)
            <h2>{{ $key . ' => ' . $Type->count() }} Diff Date</h2>
            @php
                $full = 0;
                foreach ($Type as $t) {
                    foreach ($t as $key => $value) {
                        $full += $value->count();
                    }

                }
            @endphp

            <i>Total : {{ $full }} Room in All Date</i>
            @foreach ($Type as $key => $FromTo)
                <h4>{{ $key }} => {{$FromTo->sum('NbrRoom')}} </h4>

                                @foreach ( $FromTo as $user=>$userHas )
                                {{$user}} = {{$userHas->sum('NbrRoom')}}
                                @php   echo "<pre>"@endphp
                                    {{$userHas}}


                                    {{-- TAAAAA --}}
                                @php   echo "</pre>"@endphp


                                @endforeach

            @endforeach
        @endforeach
        <hr>
    @endforeach
</div>
    {{-- {{dd($allRes->toArray())}} --}}
    <div class="mx-5">
        <table class="table table-striped table-hover table-bordered" >

            <thead class="table-dark ">
                <tr class=''>
                    @php
                        $i = 1;
                    @endphp
                    <th scope="row" class="Nbr" scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Fonction</th>
                    <th scope="col">  Ville </th>
                    <th scope="col">Type</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Nombre Des Chambres</th>
                    {{-- <th class="no-export" scope="col">no-export</th> --}}

                </tr>

            </thead>

            <tbody id='myTable'>

                {{-- 11 --}}

            </tbody>

        </table>

    </div>
    <div id="capture" style="padding: 10px; background: #f5da55">
    <h4 style="color: #000; ">Hello world!</h4>
</div>
</body>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
{{-- Excel --}}


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/gh/rainabba/jquery-table2excel@1.1.0/dist/jquery.table2excel.min.js"></script>
{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script> --}}




{{-- Time Date --}}
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

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

{{-- PDF --}}
{{-- Table Sorter --}}


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.9.0/js/jquery.tablesorter.min.js"
integrity="sha512-+aqgzpZjN7M8hA6a5oJLY6U1I/LIM33OY2JrOai67XsofNilo/s56V3rigaj0004aWBfW5K8r+aay0TOTv4NlA=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.9.0/js/jquery.tablesorter.widgets-filter-formatter.min.js"
integrity="sha512-BvTVoN4Y7C4IhXRft7wbZtkjLNt1LWb2zRnvh7LTn28k6TbFLLP7jCBCzzQyvhKfr8TJsNGLyCIKQMSdLiC2hQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.9.0/js/jquery.tablesorter.widgets.min.js"
integrity="sha512-2UHq3FO0SGGxnYsevav03hKJZ4UEJfc8G8hODTdvTofKYHPH8y2zCh4+4ae7TjA5dx/Ont7c4MipN87huuEqMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.9.0/addons/pager/jquery.tablesorter.pager.min.js"
integrity="sha512-9gQKDhKzCqFgVsYRFKZCQFsmqiENDapTSsPQCdD+WbKENInddJLC8sCNvWXtEaKjBA/epPgDyWZhwhgiujuVaQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- canvas --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

<script>

$('#Pdf').click(function() {
    // function getPDF () {
        return html2canvas($('.all'), {
            background: "#ffffff",
            onrendered: function(canvas) {
                var myImage = canvas.toDataURL("image/jpeg,1.0");
                // Adjust width and height
                var imgWidth =  (canvas.width * 60) / 240;
                var imgHeight = (canvas.height * 70) / 240;
                // jspdf changes
                var pdf = new jsPDF('p', 'mm', 'a4');
                pdf.addImage(myImage, 'png', 15, 2, imgWidth, imgHeight); // 2: 19
                pdf.save(`Budgeting ${$('.pdf-title').text()}.pdf`);
            }
        });
    // }



});

</script>

</html>
