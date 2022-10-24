<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Badge</title>
</head>

<body>

    <div class="page text-center left" id='page' style=" background-image:url('https://i.ibb.co/Y81P5Mq/Nouveau.png')">


        <div class="tag " style="">
            <img src="https://www.cmas.org/images/redesign/cmas-logo.png" width="60%"  alt="">
            {{-- <p class="fct" style="margin-top: 15%; font-size:25px"><b>{{$info->Fonction ? $info->Fonction->label : 'UNKNOWN'}}</b></p> --}}
            <p class="fct" style="margin-top: 15%; font-size:25px"><b>Fnideq 2022</b></p>

            <p style="margin-top: 30%; font-size:25px"><b>{{$info->Nom}} {{$info->Prenom}}</b></p>
            {{-- <p style="margin-top: 5%; font-size:30px"><b>{{$info->Nom}} {{$info->Prenom}}</b></p> --}}

            <p style="margin-top: 35%; font-size:30px"><b>{{$info->Fonction->label}} </b></p>


            {{-- <p style="margin-top: 35%; font-size:20px"><b><i>Tanger</i></b></p> --}}
            {{-- <p style="margin-top :-5%; font-size:20px"><b><i>01-04 June 2022</i></b></p> --}}

            {{-- <img src="https://posterstore.eu/images/zoom/matte-black-alu-frame-a4-22869.jpg" width="" height=""alt=""> --}}
        </div>



    </div>


{{-- ---------------------------------------------------------------------- --}}




</body>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

{{-- pdf --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>

{{-- <script src=
"https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js">
     // </script> --}}
<script>

if($('.fct:first').text()!='UNKNOWN'){
    color='{{$info->Fonction ? $info->Fonction->color : "black"}}';
//   console.log(color.replace('#',''));
//   color={{$info->Fonction->color}};
  $('.page').css('background-color',color);

}else console.log('no');

</script>


<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .page {

        width: 105mm;
        height: 148mm;
        padding: 0.5cm;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        /* box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); */
        padding-top:0.5cm;
    }

    /* .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 256mm;
        outline: 2cm #FFEAEA solid;
    } */

    @page {
        size: landscape;
        /* size: ; */
        margin: 2;


    }

    @media print {

        .page{


        }
       .left{
            margin: 0;
            width: 105mm;
            height: 148mm;
            /* page-break-after: always; */
            color-adjust: exact;
             -webkit-print-color-adjust: exact;
        }


        .right {
            margin-top: -54%;
            margin-right: 0;
            width: 105mm;
            height: 148mm;
            page-break-after: always;
            color-adjust: exact;
             -webkit-print-color-adjust: exact;
        }

        /* ... the rest of the rules ... */
    }

</style>
<script>
    // var doc = new jsPDF();
    // var pageHeight = doc.internal.pageSize.height || doc.internal.pageSize.getHeight();
    // var pageWidth = doc.internal.pageSize.width || doc.internal.pageSize.getWidth();

    // // console.log(imgData);
    // doc.addImage(imgData, 'png', 60, 2, 90, 50);
    // doc.setFontSize(50);

    // doc.text('Alaa Achouairi', 50, 70, {
    //     align: 'center'
    // });

    // doc.setFontSize(60);
    // doc.text('Deleguate', 58, 140, {
    //     align: 'center'
    // });
    // // Add new page 120

    // // doc.text('Deleguate','center');
    // doc.setFontSize(50);
    // doc.text('Tanger', 80, 220, {
    //     align: 'center'
    // });

    // // Save the PDF
    // doc.save('document.pdf');

    window.print();
</script>

</html>
