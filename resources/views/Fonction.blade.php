<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fonction</title>
</head>

<body class=''>
    <form method="post" action="{{ route('AddFonction') }}">
        @csrf
        <div class="row align-items-center " style="max-width: 500px;
        margin: 10% auto;">

            {{-- <div class="row g-3 align-items-center">
                <div class="col-3">
                    <label for="" class="col-form-label"><b>Fonction : </b></label>
                </div>
                <div class="col-4">
                    <input type="" required name="Fonction" id="" placeholder="Fonction" class="form-control"
                        aria-describedby="passwordHelpInline">
                </div>

            </div> --}}
            <div class="row g-3 align-items-center">
                {{-- <div class="col-3">
                    <label for="exampleColorInput" class="col-form-label"><b>Color : </b></label>
                </div>
                <div class="col-2">
                    <input type="color" required name="Color" class="form-control form-control-color"
                        id="exampleColorInput" value="" title="Choose your color">
                </div> --}}

                <div class="col-md-3">
                    <label for="inputEmail4" class="form-label">Fonction Color</label>
                    <select required name='select'  class="form-select form-control" aria-label="Default select example">
                        <option hidden value="">Choisie une fonction</option>
                        {{-- <option disabled >Choisie une fonction</option> --}}
                        {{-- <option style="display: none" >Choisie une fonction</option> --}}
                        @foreach ($fonctions as $f)
                            <option value="{{ $f->id }}">{{ $f->label }}</option>
                        @endforeach


                    </select>

                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

            </div>


        </div>
    </form>

</body>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


</html>
