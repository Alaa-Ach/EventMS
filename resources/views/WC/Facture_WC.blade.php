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

            $Apps = $Res->where('HotelName', '=', 'Marina Beach');
            // dd($Par);
        @endphp





        {{-- fnideq --}}
        @php
            $Hotel = $Res->where('HotelName', '=', 'Marina Smir');
            $Room_S = $Hotel->where('Type', '=', 'Single Room');
            $Room_DB = $Hotel->where('Type', '=', 'Double Room');
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
        doc.text('{{(1 + count($Par->AllComp))}}',59,68);

        nextY=88;
        {{$Total=0}}

       @if(count($Apps)>0)
                doc.setFillColor(220, 220, 220);
                doc.rect(20,nextY,170,8,"DF");
                doc.text("M'diq - Fnideq",105,nextY+=5,'center');

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
                doc.text('of Persons',135,nextY+7,'center');

                doc.setFillColor(240, 240, 240);
                doc.rect(145,nextY,45,8,"DF");
                doc.text('Amount',167.5,nextY+6,'center');

                nextY+=8;





                @foreach ($Apps as $S)
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
                doc.text('Appartement',42.5,nextY+6,'center');

                doc.setFillColor(255, 255, 255);
                doc.rect(65,nextY,35,8,"DF");
                doc.text('80 Euro',82,nextY+6,'center');

                doc.setFillColor(255, 255, 255);
                doc.rect(100,nextY,25,8,"DF");
                doc.text('{{$Total_Days}}',112.5,nextY+6,'center');


                doc.setFillColor(255, 255, 255);
                doc.rect(125,nextY,30,8,"DF");
                doc.text('{{$S->Nbr_Personne}}',135,nextY+6,'center');


                {{$res = 80 * $Total_Days * $S->Nbr_Personne}}
                doc.setFillColor(255, 255, 255);
                doc.rect(145,nextY,45,8,"DF");
                doc.text('{{$res}} Euro',167.5,nextY+6,'center');
                {{$Total+=$res}};




                nextY+=8;
                @endforeach







            nextY+=12;
       @endif


       @if(count($Hotel)>0)
                doc.setFillColor(220, 220, 220);
                doc.rect(20,nextY,170,8,"DF");
                doc.setFontSize(13);
                 doc.setFontType("bold");
                doc.text("M'diq - Fnideq ",105,nextY+=5,'center');

                // Header
                doc.setFontStyle('Normal');
                doc.setFillColor(240, 240, 240);
                doc.rect(20,nextY+=3,50,8,"DF");
                doc.text('Type',45,nextY+6,'center');

                doc.setFillColor(240, 240, 240);
                doc.rect(70,nextY,35,8,"DF");
                doc.setFontSize(10);
                doc.text('Cost Per Day &',87.5,nextY+3,'center');
                doc.text('Per Persons',87.5,nextY+7,'center');

                doc.setFillColor(240, 240, 240);
                doc.rect(105,nextY,40,8,"DF");
                doc.setFontSize(13);
                doc.text('Number of Days',125,nextY+6,'center');

                doc.setFillColor(240, 240, 240);
                doc.rect(145,nextY,45,8,"DF");
                doc.text('Amount',167.5,nextY+6,'center');


                nextY+=8;
            @if (count($Room_S) > 0)




                @foreach ($Room_S as $S)
                        @php
                            $Total_Days=0
                        @endphp

                            @php
                                $a = \Carbon\Carbon::parse($S->From);
                                $b = \Carbon\Carbon::parse($S->To);

                                $diff = $a->diffInDays($b);
                                $Total_Days+=$diff;

                            @endphp


                            doc.setFillColor(255, 255, 255);
                            doc.rect(20,nextY,50,8,"DF");
                            doc.text('Single Room',45,nextY+6,'center');

                            doc.setFillColor(255, 255, 255);
                            doc.rect(70,nextY,35,8,"DF");
                            doc.text('165 Euro',87.5,nextY+6,'center');

                            doc.setFillColor(255, 255, 255);
                            doc.rect(105,nextY,40,8,"DF");
                            doc.text('{{$Total_Days}}',125,nextY+6,'center');

                            {{$res = 165 * $Total_Days}}
                            doc.setFillColor(255, 255, 255);
                            doc.rect(145,nextY,45,8,"DF");
                            doc.text('{{$res}} Euro',167.5,nextY+6,'center');
                            {{$Total+=$res}};
                            nextY+=8;

                @endforeach





            @endif

             @if (count($Room_DB) > 0)




                @foreach ($Room_DB as $DB)
                @php
                    $Total_Days=0
                @endphp
                            @php
                                $a = \Carbon\Carbon::parse($DB->From);
                                $b = \Carbon\Carbon::parse($DB->To);

                                $diff = $a->diffInDays($b);
                                $Total_Days+=$diff;

                            @endphp



                            doc.setFillColor(255, 255, 255);
                            doc.rect(20,nextY,50,8,"DF");
                            doc.text('Double Room',45,nextY+6,'center');

                            doc.setFillColor(255, 255, 255);
                            doc.rect(70,nextY,35,8,"DF");
                            doc.text('115 Euro',87.5,nextY+6,'center');

                            doc.setFillColor(255, 255, 255);
                            doc.rect(105,nextY,40,8,"DF");
                            doc.text('{{$Total_Days}}',125,nextY+6,'center');

                            {{$res = 115 * 2 * $Total_Days}}
                            doc.setFillColor(255, 255, 255);
                            doc.rect(145,nextY,45,8,"DF");
                            doc.text('{{$res}} Euro',167.5,nextY+6,'center');

                            {{$Total+=$res}}
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
        doc.text('{{60*(1 + count($Par->AllComp))}} Euro',87.5,nextY+5.5,'center');
        {{$Total+=60*(1 + count($Par->AllComp))}}


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
        window.open('/Queries/Coupe','_self');




    })


</script>


</html>
