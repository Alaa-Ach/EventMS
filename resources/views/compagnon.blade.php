<!DOCTYPE html>

<html>

<head>

    <title>Add/remove multiple input fields dynamically with Jquery Laravel 5.8</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>

<body>



    <div class="container" style="margin-top:2%">


        <input type="number" value="0" min="0" max="10">
        <br>

        <form action="{{route('sendForm')}}" method="POST">

            @csrf



            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul>

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif



            @if (Session::has('success'))
                <div class="alert alert-success text-center">

                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                    <p>{{ Session::get('success') }}</p>

                </div>
            @endif



            <table class="table table-bordered" id="dynamicTable">

                <tr>

                    <th>Nom</th>

                    <th>Prénom</th>

                    <th>Fonction</th>


                </tr>



            </table>



            <button type="submit" class="btn btn-success">Save</button>

        </form>

    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




    <script type="text/javascript">
        $(document).ready(function() {
            $('input:text').val('');
            $('input[type=number]').val('0');

        })
        var indexComp = 0;

        $('input[type=number]').on('change', function() {
            currentRow = $('table tr[data="row"]').length;
            acc = $('input[type=number]').val();
            diff = acc - currentRow;
            //add
            // indexComp++;

            for (var i = 0; i < acc - currentRow; i++) {
                $("#dynamicTable").append('<tr data="row"><td><input  type="text" name="addComp[' + indexComp +
                    '][nom]"  class="form-control" /></td><td><input type="text" name="addComp[' +
                    indexComp +
                    '][prenom]"  class="form-control" /></td><td><input type="text" name="addComp[' +
                    indexComp +
                    '][fonction]"  class="form-control" /></td></tr>'
                    );


            }
            // console.log(diff);
            if (diff < 0) {
                // console.log('-');
                for (var i = 0; i < -diff; i++) {
                    //    console.log($('tr[data="row"]').lastElementChild());
                    $("#dynamicTable").find('tr[data="row"]:last').remove();
                    // $("#dynamicTable").removeChild('tr[data="row"]');
                }

            }
            diff<0 ? indexComp-- : indexComp++;
        });
    </script>



</body>

</html>
