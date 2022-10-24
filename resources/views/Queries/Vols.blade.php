<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vols</title>
</head>

<body class=''>

    @include('Layout.navbar')
    <div class="d-flex flex-row bd-highlight m-4 gap-3" >

        <div style="width:8%" class="p-2 bd-highlight  align-self-end">
            <h4 for=""> Date d'Arrivée : </h4>

        </div>

        <div class="p-2 bd-highlight col-1">

            <label for="inputEmail4" class="form-label">De :</label>

            <div class='input-group date' id='datetimepicker3'>
                <input type='text' placeholder="yyyy-mm-dd" class="form-control" name="DateArr_From" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>

        </div>
        <div class="p-2 bd-highlight col-1">

            <label for="inputEmail4" class="form-label">À :</label>

            <div class='input-group date' id='datetimepicker3'>
                <input type='text' placeholder="yyyy-mm-dd" class="form-control" name="DateArr_To" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>

        </div>
        <div class="p-2 bd-highlight align-self-end" >

            <button  id="Filter" class="btn btn-primary ">Filter</button>

            <button  id="Reset" class=" btn btn-danger ">Reset</button>


        </div>
    </div>


    <div class="d-flex flex-row bd-highlight m-4 gap-3" >

        <div style="width:8%" class="p-2 bd-highlight align-self-end">
            <h4 for=""> Date de Départ: </h4>

        </div>

        <div class="p-2 bd-highlight col-1">

            <label for="inputEmail4" class="form-label">De :</label>

            <div class='input-group date' id='datetimepicker3'>
                <input type='text' placeholder="yyyy-mm-dd" class="form-control" name="DateDep_From" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>

        </div>
        <div class="p-2 bd-highlight col-1">

            <label for="inputEmail4" class="form-label">À :</label>

            <div class='input-group date' id='datetimepicker3'>
                <input type='text' placeholder="yyyy-mm-dd" class="form-control" name="DateDep_To" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>

        </div>

    </div>



    <div class="m-5">
        <div class="row">

            {{-- Search All --}}
            <div class="col-2">
                <label for="Search :" class="label-control">Search :</label>
                <input type="text" class="form-control" id="myInput" Placeholder="Search">

            </div>

            {{-- Export --}}
            <div class="col-2" style="margin-left: auto;margin-right: 0;">
                <button id="Export" class="btn btn-success">Export Excel</button>
                <button type="" style="" id="Pdf" class=" btn btn-danger">Export PDF</button>

            </div>
        </div>

        <hr class="mx-0">

       <div class="row mt-2">
                    <div class="col-1">

                        <label for="" class="form-label">Disponible Dans:</label>

                        <div class='input-group date' id='datetimepicker10'>
                            <input type='text' placeholder="yyyy-mm-dd" class="form-control" name="isHere" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar">
                                </span>
                            </span>
                        </div>
                    </div>





                    <div class="col col-1 align-self-end" >


                        <button style="" type="submit" style="" id="isHere"
                            class=" btn btn-primary ">Ask</button>
                    </div>


            </div>
    </div>

    <div class="mx-5">
        <table class="table table-striped table-hover table-bordered  tablesorter-dark ">
            {{-- <thead class=" "> --}}
            <thead class="table-dark ">
                <tr class=''>
                    @php
                        $i = 1;
                    @endphp
                    <th scope="row" class="Nbr" scope="col">#</th>
                    <th scope="col">N° Vol D'Arrivée</th>
                    <th scope="col"> Date D'Arrivée </th>
                    <th scope="col">Heure D'Arrivée</th>
                    <th scope="col">N° Vol De Départ</th>
                    <th scope="col">Date De Départ</th>
                    <th scope="col">Heure De Départ</th>
                    <th scope="col">N° Passport</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                     <th scope="col">Pays</th>
                    <th  scope="col">Fonction</th>
                    <th  scope="col">Type</th>
                     <th scope="col">Hôtel</th>


                    {{-- <th class="no-export" scope="col">no-export</th> --}}

                </tr>
            </thead>
            <tbody id='myTable'>
                {{-- 11 --}}
                @foreach ($allVols as $Vol)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td> {{ $Vol->N_Vol_Arr }}</td>
                        <td class="Date_Arr"> {{ $Vol->Date_Arr }} </td>
                        <td> {{ $Vol->Heure_Arr }}</td>
                        <td> {{ $Vol->N_Vol_Dep }}</td>
                        <td> {{ $Vol->Date_Dep }}</td>
                        <td> {{ $Vol->Heure_Dep }}</td>
                        <td> {{ $Vol->N_Passport }}</td>
                        <td> {{ $Vol->Nom }}</td>
                        <td> {{ $Vol->Prenom }}</td>
                        <td> {{ $Vol->Pays }}</td>
                        <td > {{ $Vol->Fonction }}</td>
                        <td > {{ $Vol->Type }}</td>
                                                <td> {{ $Vol->HotelName }}</td>


                    </tr>



                @endforeach


            </tbody>
        </table>

    </div>

</body>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
{{-- Excel --}}


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/gh/rainabba/jquery-table2excel@1.1.0/dist/jquery.table2excel.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>




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

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.9.0/css/theme.default.css" integrity="sha512-DDf/vCwmDEWkpkPQpgIl9mrX5zNLyEPcSyY9r0h0jJO5LwoxuiGfBd/Qm15foZ7d7Rjs+vrrVcO2+u4jIud73w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.9.0/css/theme.dark.css" integrity="sha512-lLFDD7wMkIDJ+PKdYoMZNKifucnw2pD3EOcLsa1jJ2CaIxY6Z2UL1x3NELrqGjBhOPUnqE1gfoGtZdZ7z1uDxw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

<style type="text/css">
    /*************
  Dark Theme (by thezoggy)
 *************/
    /* overall */

    tr:nth-child(2) {
        color: black;
    }

    /* header */
    .tablesorter-dark th,
    .tablesorter-dark thead td {
        padding: 4px;
        font: bold 12px/20px Arial, Sans-serif;

        /* background-color: rgb(255, 255, 255); */
        border-collapse: collapse;
    }

    .tablesorter-dark thead th {
        border-bottom: #333 2px solid;
    }

    .tablesorter-dark .header,
    .tablesorter-dark .tablesorter-header {
        padding: 4px 20px 4px 4px;
        cursor: pointer;
        background-image: url(data:image/gif;base64,R0lGODlhFQAJAIAAAP///////yH5BAEAAAEALAAAAAAVAAkAAAIXjI+AywnaYnhUMoqt3gZXPmVg94yJVQAAOw==);
        background-position: center right;
        background-repeat: no-repeat;
    }

    .tablesorter-dark thead .headerSortUp,
    .tablesorter-dark thead .tablesorter-headerSortUp,
    .tablesorter-dark thead .tablesorter-headerAsc {
        background-image: url(data:image/gif;base64,R0lGODlhFQAEAIAAAP///////yH5BAEAAAEALAAAAAAVAAQAAAINjI8Bya2wnINUMopZAQA7);
        border-bottom: #888 1px solid;
    }

    .tablesorter-dark thead .headerSortDown,
    .tablesorter-dark thead .tablesorter-headerSortDown,
    .tablesorter-dark thead .tablesorter-headerDesc {
        background-image: url(data:image/gif;base64,R0lGODlhFQAEAIAAAP///////yH5BAEAAAEALAAAAAAVAAQAAAINjB+gC+jP2ptn0WskLQA7);
        border-bottom: #888 1px solid;
    }

    .tablesorter-dark thead .sorter-false {
        background-image: none;
        padding: 4px;
    }

    /* tfoot */
    .tablesorter-dark tfoot .tablesorter-headerSortUp,
    .tablesorter-dark tfoot .tablesorter-headerSortDown,
    .tablesorter-dark tfoot .tablesorter-headerAsc,
    .tablesorter-dark tfoot .tablesorter-headerDesc {
        border-top: #888 1px solid;
        /* remove sort arrows from footer */
        background-image: none;
    }


    /
    /* table processing indicator */
    .tablesorter-dark .tablesorter-processing {
        background-position: center center !important;
        background-repeat: no-repeat !important;
        /* background-image: url(../addons/pager/icons/loading.gif) !important; */
        background-image: url('data:image/gif;base64,R0lGODlhFAAUAKEAAO7u7lpaWgAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh+QQBCgACACwAAAAAFAAUAAACQZRvoIDtu1wLQUAlqKTVxqwhXIiBnDg6Y4eyx4lKW5XK7wrLeK3vbq8J2W4T4e1nMhpWrZCTt3xKZ8kgsggdJmUFACH5BAEKAAIALAcAAAALAAcAAAIUVB6ii7jajgCAuUmtovxtXnmdUAAAIfkEAQoAAgAsDQACAAcACwAAAhRUIpmHy/3gUVQAQO9NetuugCFWAAAh+QQBCgACACwNAAcABwALAAACE5QVcZjKbVo6ck2AF95m5/6BSwEAIfkEAQoAAgAsBwANAAsABwAAAhOUH3kr6QaAcSrGWe1VQl+mMUIBACH5BAEKAAIALAIADQALAAcAAAIUlICmh7ncTAgqijkruDiv7n2YUAAAIfkEAQoAAgAsAAAHAAcACwAAAhQUIGmHyedehIoqFXLKfPOAaZdWAAAh+QQFCgACACwAAAIABwALAAACFJQFcJiXb15zLYRl7cla8OtlGGgUADs=') !important;
    }



    /* caption */
    caption {
        background: #fff;
    }

    /* filter widget */
    .tablesorter-dark .tablesorter-filter-row td {
        background: #202020;
        line-height: normal;
        text-align: center;
        /* center the input */
        -webkit-transition: line-height 0.1s ease;
        -moz-transition: line-height 0.1s ease;
        -o-transition: line-height 0.1s ease;
        transition: line-height 0.1s ease;
    }

    /* optional disabled input styling */
    .tablesorter-dark .tablesorter-filter-row .disabled {
        opacity: 0.5;
        filter: alpha(opacity=50);
        cursor: not-allowed;
    }

    /* hidden filter row */
    .tablesorter-dark .tablesorter-filter-row.hideme td {
        /*** *********************************************** ***/
        /*** change this padding to modify the thickness     ***/
        /*** of the closed filter row (height = padding x 2) ***/
        padding: 2px;
        /*** *********************************************** ***/
        margin: 0;
        line-height: 0;
        cursor: pointer;
    }

    .tablesorter-dark .tablesorter-filter-row.hideme .tablesorter-filter {
        height: 1px;
        min-height: 0;
        border: 0;
        padding: 0;
        margin: 0;
        /* don't use visibility: hidden because it disables tabbing */
        opacity: 0;
        filter: alpha(opacity=0);
    }

</style>

<script>

    function compareDate(DateFrom,DateComp,DateTo) {
        From=new Date(DateFrom);
        Comp=new Date(DateComp);
        To=new Date(DateTo);


        return (From<=Comp && Comp <=To)

    }

    $('button#Filter').on('click',function (e) {
        e.preventDefault();
                ResetTable()

        $("#myTable tr").filter(function() {
                    //Cols
                colArr=$(this).find('td:visible:nth(2)').text().trim(" ");
                colDep=$(this).find('td:visible:nth(5)').text().trim(" ");

                    // Arrivée
                DateArr_From=$('input[name="DateArr_From"]').val();
                DateArr_To=$('input[name="DateArr_To"]').val();

                    // Départ
                DateDep_From=$('input[name="DateDep_From"]').val();
                DateDep_To=$('input[name="DateDep_To"]').val();






                $(this).toggle(  compareDate(DateArr_From,colArr,DateArr_To)  && compareDate(DateDep_From,colDep,DateDep_To)   )

                // if(!(compareTime(From,colHour,To))){

                //     $(this).hide();

                // }else{
                //     $(this).show();
                // }

                NbrReorder();

            });

    })

   function ResetTable(){
        $('tr').each(function(){$(this).show()})
        NbrReorder();
    }
    $("button#Reset").on("click", function(){

        ResetTable()

    })




      //$('button#isHere').on('click',function (e) {
            $('input[name="isHere"]').on('keyup',function (e) {
                  //ResetTable()

        // alert('test');
        $("#myTable tr").filter(function() {
                    //Cols
                colArr=$(this).find('td:visible:nth(2)').text().trim(" ");
                colDep=$(this).find('td:visible:nth(5)').text().trim(" ");

                    // isHere
                    isHere=$('input[name="isHere"]').val();
                     if(isHere.length == 10){
                         $(this).toggle(compareDate(colArr,isHere,colDep))
                    }

                    else if(isHere.length==0) {
                        ResetTable()

                    }



                NbrReorder();

            });

    })


        // $(document).ready(function() {
        // $(".navbar-nav li").click(function(event) {

        //     $(".navbar-nav li ").removeClass("active"); //Remove any "active" class
        //     $("a", this).addClass("active"); //Add "active" class to selected tab //
        //     // $(activeTab).show(); //Fade in the active content
        // });
        // });







    function DateInput() {



        $('.date').datetimepicker({
            viewMode: 'years',
            format: 'YYYY-MM-DD',

        });
    };

    //Nbr Reload
    function NbrReorder() {
        thNbr = $('tbody tr:visible');

        i = 1;
        thNbr.each(function(e) {
            $(this).find('td:first-child').text(i++)
        })
    }

    $('th').on('click', function(){
        NbrReorder();

        });

    // Table Sorter

    $(function() {

        $("table").tablesorter({
            widgets: ["filter", "stickyHeaders"],
            widgetOptions: {
                // add a default type search to the first name column


                filter_startsWith: true,
                filter_columnFilters: true,

                filter_functions: {

                    12: {
                        "Compagnon": function(e, n, f, i, $r, c, data) {
                            return /Compagnon/.test(e);
                        },
                        "Participant": function(e, n, f, i, $r, c, data) {
                            return /Participant/.test(e);
                        }
                    },

                    11: {
                        @foreach ( $allFct as $Fct)

                        "{{$Fct->label}}": function(e, n, f, i, $r, c, data)
                            {
                                return  e === f;
                            },

                        @endforeach
                    },

                     13: {
                        "Mövenpick": function(e, n, f, i, $r, c, data) {
                            return /Mövenpick/.test(e);
                        },
                        "Marina Smir": function(e, n, f, i, $r, c, data) {
                            return /Marina Smir/.test(e);
                        },
                        "Marina Beach": function(e, n, f, i, $r, c, data) {
                            return /Marina Beach/.test(e);
                        }
                    },

                },




                // extra class name added to the sticky header row
                stickyHeaders: '',
                // number or jquery selector targeting the position:fixed element
                stickyHeaders_offset: 0,
                // added to table ID, if it exists
                stickyHeaders_cloneId: '-sticky',
                // trigger "resize" event on headers
                stickyHeaders_addResizeEvent: true,
                // if false and a caption exist, it won't be included in the sticky header
                stickyHeaders_includeCaption: true,
                // The zIndex of the stickyHeaders, allows the user to adjust this to their needs
                stickyHeaders_zIndex: 2,
                // jQuery selector or object to attach sticky header to
                stickyHeaders_attachTo: null,
                // jQuery selector or object to monitor horizontal scroll position (defaults: xScroll > attachTo > window)
                stickyHeaders_xScroll: null,
                // jQuery selector or object to monitor vertical scroll position (defaults: yScroll > attachTo > window)
                stickyHeaders_yScroll: null,

                // scroll table top into view after filtering
                stickyHeaders_filteredToTop: true


            },


            headers: {
                0: {
                    filter: false,
                    sorter: false
                },



            }

        });

        $('tr input:disabled').hide();

        $('.tablesorter-filter').on(' change keyup', function() {

            NbrReorder()

        })

    });

    $('table').bind("sortEnd",function() {
        NbrReorder()
});







    // Pdf Button
    $('#Pdf').click(function() {


        $('table').find('.tablesorter-filter-row').hide();
        $('table').find('.no-export').hide();

        var doc = new jsPDF('p', 'pt', 'letter');
        // var doc = new jsPDF('landscape');

        var htmlstring = '';
        var tempVarToCheckPageHeight = 0;
        var pageHeight = 0;
        pageHeight = doc.internal.pageSize.height;
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function(element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };



        doc.setLineWidth(2);
        doc.text(280, 30, "Vols");

        doc.autoTable({

            html: 'table',
            startY: false,
            margin: {

                left: 2,
                right: 2
            },
            showHeader: 'everyPage',
            theme: 'grid',
            tableWidth: 'auto',
            // styles: { minCellHeight: 100},
        })
        // doc.fromHTML(a[0].outerHTML);
        doc.setFontSize(2);
        doc.save('Vols.pdf');
        // location.reload();
        $('table').find('.tablesorter-filter-row').show();
        $('table').find('.no-export').show();


    });

    $("#Export").on("click", function() {
         $('table tr:hidden').remove();
        $("table").table2excel({

            exclude: ".tablesorter-filter-row,.no-export,.filtered",
            name: "Worksheet Name",
            filename: "Vols.xls", // do include extension
            preserveColors: true // set to true if you want background colors and font colors preserved

        });
         location.reload();

    })


    $('form #test').on('click', function(e) {
        e.preventDefault();
    });
    $('button #Export').on('click', function(e) {
        e.preventDefault();
    });


    $(document).ready(function() {


        DateInput();
        // Fonction
        $("select[name=Fonction]").on("change", function() {
            // console.log("aha");
            var value = $(this).find(':selected').text().toLowerCase();

            value = value != 'all' ? value : '';
            console.log(value);

            $("#myTable tr").filter(function() {
                $(this).toggle($(this).find('td').text().toLowerCase().indexOf(value) > -1)
            });

        });
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            // $("#myTable tr").filter(function() {

            $("#myTable tr ").filter(function() {
                $(this).toggle($(this).find('td:visible').text().toLowerCase().indexOf(
                    value) > -1);




            });
            NbrReorder();
        });

        $("#SearchDate").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            // $("#myTable tr").filter(function() {
            $("#myTable tr ").filter(function() {
                $(this).toggle($(this).find('.Date_Arr').text().toLowerCase().indexOf(value) > -
                    1);
            });
        });
    });
</script>



</html>
