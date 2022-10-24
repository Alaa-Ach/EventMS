<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vols Avec Tout les Dates</title>
</head>

<body class=''>




    <div class="container mt-5 facture">

        @php
            $Par;
            $Res = $Par->AllRes;
            $total = 0;
            $Tng = $Res->where('City', '=', 'Mövenpick');
            $Tng_S = $Tng->where('Type', '=', 'Single Room');
            $Tng_DB = $Tng->where('Type', '=', 'Double Room');
        @endphp





        {{-- fnideq --}}
        @php
            $Fndq = $Res->where('City', '=', 'Marina Smir');
            $Fndq_S = $Fndq->where('Type', '=', 'Single Room');
            $Fndq_DB = $Fndq->where('Type', '=', 'Double Room');
        @endphp



</body>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
{{-- Excel --}}


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- PDF --}}
{{-- Table Sorter --}}

<script src="/js/invoices.js"></script>


<script>
function readFilePromise(filename, options) {
    return new Promise((resolve, reject) => {
        fs.readFile(filename, options, (err, data) => {
            if (err) {
                reject(err);
            } else {
                resolve(data);
            }
        })
    });
}
    $(document).ready(function(){
        var doc= new jsPDF();

        doc.setFillColor(141, 195, 227);
        // doc.rect(10,10,190,15,"F");
        doc.rect(10,10,190,15,"DF");
        doc.setFontSize(25);
        doc.setFontType("bold");
        doc.text('Invoice',105,20,'center');



        doc.setFillColor(141, 195, 227);
        doc.rect(10,45,40,10,"DF");
        doc.setFontSize(15);
        doc.setFontType("normal");
        doc.text('Name :',25,52,'center');


        fullname='{{$Par->Nom}} {{$Par->Prenom}}',
        length=(fullname.length),
        doc.setFillColor(255, 255, 255);
        doc.rect(50,45,length*4,10,"DF");

        doc.text(fullname ,52+(length-10)/3,52);

        doc.setFillColor(141, 195, 227);
        doc.rect(10,63,46,8,"DF");
        doc.setFontSize(11);
        doc.text('Number of persons :',15,68);


        doc.setFillColor(255, 255, 255);
        doc.rect(56,63,10,8,"DF");
        doc.setFontSize(13);
        doc.setFontType("bold");
        doc.text('{{(1 + count($Par->Compagnons))}}',59,68);

        nextY=88;
        {{$Total=0}}

       @if(count($Tng)>0)
                doc.setFillColor(220, 220, 220);
                doc.rect(20,nextY,170,8,"DF");
                doc.text('Tanger',105,nextY+=5,'center');

                // Header

                doc.setFontStyle('Normal');
                doc.setFillColor(240, 240, 240);
                doc.rect(20,nextY+=3,45,8,"DF");
                doc.text('Type',42.5,nextY+6,'center');


                doc.setFillColor(240, 240, 240);
                doc.rect(65,nextY,35,8,"DF");
                doc.setFontSize(10);
                doc.text('Cost Per Day &',82,nextY+3,'center');
                doc.text('Per Persons',82,nextY+7,'center');

                doc.setFillColor(240, 240, 240);
                doc.rect(100,nextY,25,8,"DF");
                doc.setFontSize(10);
                doc.text('Number of Days',112.5,nextY+5,'center');

                doc.setFillColor(240, 240, 240);
                doc.rect(125,nextY,30,8,"DF");
                doc.setFontSize(10);
                doc.text('Number',135,nextY+3,'center');
                doc.text('of Room',135,nextY+7,'center');

                doc.setFillColor(240, 240, 240);
                doc.rect(145,nextY,45,8,"DF");
                doc.text('Amount',167.5,nextY+6,'center');











                nextY+=8;
            @if (count($Tng_S) > 0)




                @foreach ($Tng_S as $S)
                            @php
                                $Total_Days=0;

                                $a = \Carbon\Carbon::parse($S->From);
                                $b = \Carbon\Carbon::parse($S->To);

                                $diff = $a->diffInDays($b);
                                $Total_Days=$diff;

                            @endphp



                            doc.setFontSize(13);
                            doc.setFillColor(255, 255, 255);
                            doc.rect(20,nextY,45,8,"DF");
                            doc.text('Single Room',42.5,nextY+6,'center');

                            doc.setFillColor(255, 255, 255);
                            doc.rect(65,nextY,35,8,"DF");
                            doc.text('165 Euro',82,nextY+6,'center');

                            doc.setFillColor(255, 255, 255);
                            doc.rect(100,nextY,25,8,"DF");
                            doc.text('{{$Total_Days}}',112.5,nextY+6,'center');


                            doc.setFillColor(255, 255, 255);
                            doc.rect(125,nextY,30,8,"DF");
                            doc.text('{{$S->NbrRoom}}',135,nextY+6,'center');

                            {{$res = 165 * $Total_Days * $S->NbrRoom}}
                            doc.setFillColor(255, 255, 255);
                            doc.rect(145,nextY,45,8,"DF");
                            doc.text('{{$res}} Euro',167.5,nextY+6,'center');
                            {{$Total+=$res}};


                            nextY+=8;

                @endforeach





            @endif

             @if (count($Tng_DB) > 0)




                @foreach ($Tng_DB as $DB)
                @php
                    $Total_Days=0
                @endphp
                            @php
                                $a = \Carbon\Carbon::parse($DB->From);
                                $b = \Carbon\Carbon::parse($DB->To);

                                 $diff = $a->diffInDays($b);
                                 if(!$DB->From || !$DB->To) $diff=0;
                                $Total_Days+=$diff;

                            @endphp



                            doc.setFontSize(13);
                            doc.setFillColor(255, 255, 255);
                            doc.rect(20,nextY,45,8,"DF");
                            doc.text('Double Room',42.5,nextY+6,'center');

                            doc.setFillColor(255, 255, 255);
                            doc.rect(65,nextY,35,8,"DF");
                            doc.text('115 Euro',82,nextY+6,'center');

                            doc.setFillColor(255, 255, 255);
                            doc.rect(100,nextY,25,8,"DF");
                            doc.text('{{$Total_Days}}',112.5,nextY+6,'center');



                            doc.setFillColor(255, 255, 255);
                            doc.rect(125,nextY,30,8,"DF");
                            doc.text('{{$DB->NbrRoom}}',135,nextY+6,'center');
                            {{$res = 115 * 2 * $Total_Days * $DB->NbrRoom}}

                            doc.setFillColor(255, 255, 255);
                            doc.rect(145,nextY,45,8,"DF");
                            doc.text('{{$res}} Euro',167.5,nextY+6,'center');
                            {{$Total+=$res}};


                            nextY+=8;
                @endforeach




            @endif

            nextY+=12;
       @endif


       @if(count($Fndq)>0)
                doc.setFillColor(220, 220, 220);
                doc.rect(20,nextY,170,8,"DF");
                doc.setFontType('bold');
                doc.text("M'diq/Fnideq",105,nextY+=5,'center');

                // Header

                doc.setFontStyle('Normal');
                doc.setFillColor(240, 240, 240);
                doc.rect(20,nextY+=3,45,8,"DF");
                doc.text('Type',42.5,nextY+6,'center');


                doc.setFillColor(240, 240, 240);
                doc.rect(65,nextY,35,8,"DF");
                doc.setFontSize(10);
                doc.text('Cost Per Day &',82,nextY+3,'center');
                doc.text('Per Persons',82,nextY+7,'center');

                doc.setFillColor(240, 240, 240);
                doc.rect(100,nextY,25,8,"DF");
                doc.setFontSize(10);
                doc.text('Number of Days',112.5,nextY+5,'center');

                doc.setFillColor(240, 240, 240);
                doc.rect(125,nextY,30,8,"DF");
                doc.setFontSize(10);
                doc.text('Number',135,nextY+3,'center');
                doc.text('of Room',135,nextY+7,'center');

                doc.setFillColor(240, 240, 240);
                doc.rect(145,nextY,45,8,"DF");
                doc.text('Amount',167.5,nextY+6,'center');


                nextY+=8;
            @if (count($Fndq_S) > 0)




                @foreach ($Fndq_S as $S)
                            @php
                                $Total_Days=0
                            @endphp

                            @php
                                $a = \Carbon\Carbon::parse($S->From);
                                $b = \Carbon\Carbon::parse($S->To);

                                $diff = $a->diffInDays($b);
                                $Total_Days+=$diff;

                            @endphp



                        doc.setFontSize(13);
                            doc.setFillColor(255, 255, 255);
                            doc.rect(20,nextY,45,8,"DF");
                            doc.text('Single Room',42.5,nextY+6,'center');

                            doc.setFillColor(255, 255, 255);
                            doc.rect(65,nextY,35,8,"DF");
                            doc.text('165 Euro',82,nextY+6,'center');

                            doc.setFillColor(255, 255, 255);
                            doc.rect(100,nextY,25,8,"DF");
                            doc.text('{{$Total_Days}}',112.5,nextY+6,'center');


                            doc.setFillColor(255, 255, 255);
                            doc.rect(125,nextY,30,8,"DF");
                            doc.text('{{$S->NbrRoom}}',135,nextY+6,'center');

                            {{$res = 165 * $Total_Days * $S->NbrRoom}}
                            doc.setFillColor(255, 255, 255);
                            doc.rect(145,nextY,45,8,"DF");
                            doc.text('{{$res}} Euro',167.5,nextY+6,'center');
                            {{$Total+=$res}};


                            nextY+=8;

                @endforeach



            @endif

             @if (count($Fndq_DB) > 0)




                @foreach ($Fndq_DB as $DB)
                            @php
                                $Total_Days=0
                            @endphp
                            @php
                                $a = \Carbon\Carbon::parse($DB->From);
                                $b = \Carbon\Carbon::parse($DB->To);

                                $diff = $a->diffInDays($b);
                                $Total_Days+=$diff* $DB->NbrRoom;

                            @endphp


                            doc.setFontSize(13);
                            doc.setFillColor(255, 255, 255);
                            doc.rect(20,nextY,45,8,"DF");
                            doc.text('Double Room',42.5,nextY+6,'center');

                            doc.setFillColor(255, 255, 255);
                            doc.rect(65,nextY,35,8,"DF");
                            doc.text('115 Euro',82,nextY+6,'center');

                            doc.setFillColor(255, 255, 255);
                            doc.rect(100,nextY,25,8,"DF");
                            doc.text('{{$Total_Days}}',112.5,nextY+6,'center');



                            doc.setFillColor(255, 255, 255);
                            doc.rect(125,nextY,30,8,"DF");
                            doc.text('{{$DB->NbrRoom}}',135,nextY+6,'center');
                            {{$res = 115 * 2 * $Total_Days * $DB->NbrRoom}}

                            doc.setFillColor(255, 255, 255);
                            doc.rect(145,nextY,45,8,"DF");
                            doc.text('{{$res}} Euro',167.5,nextY+6,'center');
                            {{$Total+=$res}};

                        nextY+=8;
                @endforeach




            @endif

            nextY+=12;
       @endif


       @if ($Par->Transport)
        nextY+=10;
            doc.setFillColor(220, 220, 220);
            doc.rect(20,nextY,50,8,"DF");
            doc.text('Transport',45,nextY+5.5,'center');

            doc.setFillColor(255, 255, 255);
            doc.rect(70,nextY,35,8,"DF");
            doc.text('{{60*(1 + count($Par->Compagnons))}} Euro',87.5,nextY+5.5,'center');
            {{$Total+=60*(1 + count($Par->Compagnons))}}


       @endif

       nextY+=30;
            doc.setFillColor(141, 195, 227);
            doc.rect(105,nextY,40,10,"DF");
            doc.setFontStyle('bold');
            doc.setFontSize(16);
            doc.text('Total Amount :',125,nextY+6.5,'center');

            doc.setFillColor(255, 255, 255);
            doc.setFontSize(18);
            doc.setFontStyle('normal');
            doc.rect(145,nextY,45,10,"DF");
            doc.text('{{$Total}} Euro',165,nextY+6.5,'center');

            doc.save('Facture {{$Par->Nom}} {{$Par->Prenom}}.pdf');
            window.open('/Queries/Participants','_self');




    })


</script>


</html>
