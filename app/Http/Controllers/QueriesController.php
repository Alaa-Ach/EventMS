<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\InfoReservation;
use App\Models\Reservation_Comp;
use App\Models\CompPart;
use App\Models\Fonction;
use App\Models\Fonction_WC;
use App\Models\Participants;
use App\Models\Participant_WC;
use App\Models\Vol;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
class QueriesController extends Controller
{
    //



    public function Vols(){
        $allVols=Db::table('AllVols_view')->get() ;
        // dd($allVols);
        $allFct=(Fonction_WC::all())->concat(Fonction::all())->shuffle();


     return view('Queries.Vols')->with(['allVols'=>$allVols,'allFct'=> $allFct]);
    }

    public function VolsAllDate(request $request){

        $allVols=Db::table('AllVols_view')->get() ;


        if($request->Hour_From && $request->Hour_To ){
                // dd($request->Hour_From);
                $allVols=Db::table('AllVols_view')->where('Heure_Arr','>=',$request->Hour_From)
                ->where('Heureds_Arr','<=',$request->Hour_To)
                ->orwhere('Date_Dep','>=',$request->Hour_From)
                ->where('Date_Dep','<=',$request->Hour_To)
                ->get() ;
        }


        return view('Queries.VolsAllDate')->with('allVols',$allVols);
        }


        public function Transport(){
            $allVols=Db::table('AllVols_view')->get() ;
            $Transfert=Db::table('AllVols_view')->where("Date_Dep",">","2022-06-04")->get() ;


            return view('Queries.Transport')->with(['allVols'=>$allVols ,'Transfert'=>$Transfert ]);

        }





    public function SearchVol(Request $request){
        $Fonction =$request->Fonction;
        $DateArrivee=$request->DateArrivee;
        $Type=$request->Type;

        // Filter
            //3

            if($Fonction && $DateArrivee ){
                $allVols=Db::table('AllVols_view')->where('Date_Arr','=',$DateArrivee)
                ->where('Fonction','=',$Fonction)->where('Type','=',$Type)->get() ;

            }
            //1
            else if($Fonction && $Type ){
                $allVols=Db::table('AllVols_view')->where('Type','=',$Type)
                ->where('Fonction','=',$Fonction)->get() ;

            }
            else if($Fonction && $DateArrivee ){
                $allVols=Db::table('AllVols_view')->where('Date_Arr','=',$DateArrivee)
                ->where('Fonction','=',$Fonction)->get() ;

            }
            else if($DateArrivee && $Type ){
                $allVols=Db::table('AllVols_view')->where('Type','=',$Type)
                ->where('Date_Arr','=',$DateArrivee)->get() ;

            }

            //2
            else if($Fonction){
                $allVols=Db::table('AllVols_view')->where('Fonction','=',$Fonction)->get() ;
            }
            else if($DateArrivee){
                $allVols=Db::table('AllVols_view')->where('Date_Arr','=',$DateArrivee)->get() ;
            }
            else if($Type){
                $allVols=Db::table('AllVols_view')->where('Type','=',$Type)->get() ;
            }

            else{
                $allVols=Db::table('AllVols_view')->get() ;
            }
        // dd($allVols);
        return view('Queries.Vols')->with('allVols',$allVols);
    }


    public function isHere(Request $request){
        $isHere=$request->isHere;
        $DispoFrom=$request->DispoFrom;
        $DispoTo=$request->DispoTo;
        // dd($isHere);
        if($isHere){
            $allVols=Db::table('AllVols_view')
        ->whereRaw('? between Date_Arr and Date_Dep',$isHere)
        ->get() ;
        } else if($DispoFrom && $DispoTo){
            $allVols=Db::table('AllVols_view')
            ->where('Date_Arr','<=',$DispoFrom)
            ->where('Date_Dep','>=',$DispoTo)
            ->get() ;
        }
        else{
            $allVols=Db::table('AllVols_view')->get() ;
            return redirect()->route("Queries.Vols");
        }
        return view('Queries.Vols')->with('allVols',$allVols);
    }

    public function Hotel(){
        // DB::enableQueryLog();

        $allRes=InfoReservation::all()->groupBy(['City','Type',function ($item, $key) {

                return $item['From'].' To '.$item['To'];

            },function ($item, $key) {
                $sum=0;
                $sum+=$item->NbrRoom;

                return $item->ReservedBy->Nom .' '.$item->ReservedBy->Prenom ;

            }]);

            // $allRes=InfoReservation::all()->where('City','=','Tanger')->where('Type','=','Double Room')
            // ->where('From','=','0008-01-01')->where('To','=','0001-01-01');
            // dd(DB::getQueryLog());
            // $allRes;
            // dd($allRes->toArray());
            // dd($allRes->sum('NbrRoom'));
            // dd(DB::getQueryLog());
        return view('Queries.Hotel')->with('allRes',$allRes);
    }

    public function Reservation_CG(Request $request){
        // $allRes=InfoReservation::all();
        $ResCongres=InfoReservation::all();
        // $FonctionCong=Fonction::all();


        // $FonctionWC=Fonction_WC::all();

        $allFct=Fonction::all();
        // $all=all
        // dd($test->toArray());


        return view('Queries.Reservation_CG')->with(['ResCongres'=> $ResCongres ,'allFct'=> $allFct]);
    }
    public function Reservation_WC(Request $request){

        $ResComp=Reservation_Comp::all();





        $allFct=Fonction_WC::all();



        return view('Queries.Reservation_WC')->with(['ResComp'=> $ResComp ,'allFct'=> $allFct]);
    }


    public function Compagnons(){
        $allComp=CompPart::all();
        $allFct=Fonction::all();
        // dd($allComp->toArray());


        return view('Queries.Compagnons')->with(['allComp'=> $allComp, 'allFct'=>$allFct]);

    }


    public function Coupe(){
        $allPart=Participant_WC::where('IdSup','=',null)->get();
        $allFct=Fonction_WC::all();
        // dd($allPart->AllComp->toArray());

        return view('Queries.Coupe_Part')->with(['allPart'=> $allPart, 'allFct'=>$allFct]);

    }



    public function Participants(){
        $allPart=Participants::all();
        $allFct=Fonction::all();

        // dd($allComp->toArray());


        return view('Queries.Participants')->with(['allPart'=> $allPart, 'allFct'=>$allFct]);

    }
    public function DeleteP_CG(int $id){

        $Part=Participants::find($id);

        $Part->AllRes->each->delete();
        $Part->Vol ? $Part->Vol->delete() : '';
        $Part->Compagnons->each(function($Comp){
            $Comp->Vol->delete();
        });
        $Part->Compagnons->each->delete();
        $Part->delete();

        // return back();
        return redirect()->route('Queries.Participants');

    }


    public function DeleteP_WC(int $id){

        $Part=Participant_WC::find($id);
        // dd($Part->Vol);
        // $Part->AllRes->each->delete();
        // $Part->Vol ? $Part->Vol->delete() : '';
        // $Part->AllComp->each(function($Comp){
        //     $Comp->Vol->delete();
        // });
        // $Part->AllComp->each->delete();
        // dd($Part->AllComp->delete());
        // $Part->AllComp->each->delete();
        $Part->Remove();

        // return back();
        return redirect()->route('Queries.Coupe');

    }


    public function BadgeParticipant($id){

        $info=Participants::find($id);
        return view('Queries.Badge_CG')->with('info',$info);

    }




    public function printAll(){
        // $info=Participants::find(22);
        $allPart=Participants::all();
        $allComp=CompPart::all();
        // dd($info);


        return view('Queries.Badge_CG_All')->with(['allPart'=> $allPart, 'allComp'=> $allComp,]);
    }



     public function BadgeComp($id){

        $info=CompPart::find($id);
        return view('Queries.Badge_CG')->with('info',$info);

    }

    public function Badge_WC($id){

        $info=Participant_WC::find($id);
        return view('WC.Badge_WC')->with('info',$info);

    }
}
