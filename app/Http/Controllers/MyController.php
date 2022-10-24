<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participants;
use App\Models\Vol;
use App\Models\CompPart;
use App\Models\Fonction;
use App\Models\InfoReservation;

use App\Models\Participant_WC;
use App\Models\Reservation_Comp;
use App\Models\Fonction_WC;


use Carbon\Carbon;
class MyController extends Controller
{
    //


    public function AddForm_CG(){
        $fonctions =Fonction::all();
        return view('AddForm_CG')->with('fonctions',$fonctions);
    }

    public function EditForm_CG($id){

            $Par =Participants::find($id);
            $Fcts =Fonction::all();
            // dd($Par->AllRes);
            return view('EditForm_CG')->with(['Par'=>$Par,'Fcts'=>$Fcts]);
        }

        public function Show_CG($id){
            $Par =Participants::find($id);
            $Fcts =Fonction::all();

            return view('Show_CG')->with(['Par'=>$Par,'Fcts'=>$Fcts]);
        }


    public function UpdateForm_CG($id ,Request $request){
        // dd($request);
        $Par =Participants::find($id);
        $idPar=$Par->id;


                //Update Participants
                    $Par->N_Passport=$request->N_Passport;
                    $Par->Nom=$request->Nom;
                    $Par->Prenom=$request->Prenom;
                    $Par->IdFonction=$request->Fonction;
                    $Par->Pays=$request->Pays   ;
                    $Par->Nbr_Comp=$request->NbrComp;
                    $Par->Transport=$request->Transport ? true :false;
                    $Par->save();

                //Update Vols
                    $vol=$Par->Vol;
                    $vol->N_Vol_Dep=$request->N_Vol_Dep;
                    $vol->Date_Dep=$request->DateDepart;
                    $vol->Heure_Dep=$request->HeureDepart;
                    $vol->N_Vol_Arr=$request->N_Vol_Arr;
                    $vol->Date_Arr=$request->DateArrivee;
                    $vol->Heure_Arr=$request->HeureArrivee;
                    $vol->save();

                //Delete Compagnon
                if ($request->DeleteComp) {
                    foreach ($request->DeleteComp as $idComp) {

                        $Par->Compagnons->find($idComp)->Vol->delete();
                        $Par->Compagnons->find($idComp)->delete();

                    }
                }

                //Delete Reservation
                if ($request->DeleteRes) {
                    // dd(count($request->DeleteRes));
                    foreach ($request->DeleteRes as $idRes) {
                           $res=$Par->AllRes->find($idRes);
                           $res->delete();

                    }
                }
                 //Comp
                    if($request->Comp){
                        // dd('nice');
                        foreach($request->Comp as $comp){
                            $compagnon=new CompPart;
                            $compagnon->IdPart=$Par->id;
                            $compagnon->N_Passport=$comp['N_Passport'] ?? '';
                            $compagnon->Prenom=$comp['Prenom'] ?? '';
                            $compagnon->Nom=$comp['Nom'] ?? '';
                            $compagnon->IdFonction=$comp['Fonction'];
                            $compagnon->Pays=$comp['Pays'] ?? '';
                            $compagnon->Transport=$Par->Transport;
                                //VOL
                                $volComp=new Vol;
                                $volComp->N_Vol_Dep=$comp['N_Vol_Dep'];
                                $volComp->Date_Dep=$comp['DateDepart'];
                                $volComp->Heure_Dep=$comp['HeureDepart'];
                                $volComp->N_Vol_Arr=$comp['N_Vol_Arr'];
                                $volComp->Date_Arr=$comp['DateArrivee'];
                                $volComp->Heure_Arr=$comp['HeureArrivee'];
                                $volComp->save();

                            $compagnon->IdVol=$volComp->id;

                            $compagnon->save();

                        }
                    }

                //Reservation
                //Tanger
                    //Single Room
                        if($request->SRoomTng){
                            // dd('nice');
                            foreach($request->SRoomTng as $Room){
                                $SRoomTng=new InfoReservation;
                                $SRoomTng->IdPart=$Par->id;
                                $SRoomTng->City='Mövenpick';
                                $SRoomTng->Type='Single Room';
                                $SRoomTng->NbrRoom=$Room['Nbr_Room'];
                                $SRoomTng->From=$Room['From'];
                                $SRoomTng->To=$Room['To'];

                                $SRoomTng->save();

                            }
                        }
                    //Double Room
                        if($request->DbRoomTng){
                            // dd('nice');
                            foreach($request->DbRoomTng as $Room){
                                $DbRoomTng=new InfoReservation;
                                $DbRoomTng->IdPart=$Par->id;
                                $DbRoomTng->City='Mövenpick';
                                $DbRoomTng->Type='Double Room';
                                $DbRoomTng->NbrRoom=$Room['Nbr_Room'];
                                $DbRoomTng->From=$Room['From'];
                                $DbRoomTng->To=$Room['To'];
                                $DbRoomTng->save();

                            }
                        }

                //Fnideq
                    //Single Room
                        if($request->SRoomFndq){
                            // dd('nice');
                            foreach($request->SRoomFndq as $Room){
                                $SRoomFndq=new InfoReservation;
                                $SRoomFndq->IdPart=$Par->id;
                                $SRoomFndq->City='Marina Smir';
                                $SRoomFndq->Type='Single Room';
                                $SRoomFndq->NbrRoom=$Room['Nbr_Room'];
                                $SRoomFndq->From=$Room['From'];
                                $SRoomFndq->To=$Room['To'];

                                $SRoomFndq->save();

                            }
                        }
                    //Double Room
                        if($request->DbRoomFndq){
                            // dd('nice');
                            foreach($request->DbRoomFndq as $Room){
                                $DbRoomFndq=new InfoReservation;
                                $DbRoomFndq->IdPart=$Par->id;
                                $DbRoomFndq->City='Marina Smir';
                                $DbRoomFndq->Type='Double Room';
                                $DbRoomFndq->NbrRoom=$Room['Nbr_Room'];
                                $DbRoomFndq->From=$Room['From'];
                                $DbRoomFndq->To=$Room['To'];
                                $DbRoomFndq->save();

                            }
                        }


                // dd($request->DeleteRes);

                $Fcts =Fonction::all();

                // return view('EditForm')->with(['Par'=>$Par,'Fcts'=>$Fcts]);
                return back()->with('success', 'Formulaire Modifier Avec Succès');   ;
            }



    public function sendForm_CG(Request $request){
        // dd(Participants::where('id',1)->with('Fonction')->get());
        // dd($request->addComp[0]['nom']);
        // dd($request->Transport ? 1 :0);
        $par=Participants::all();
        $vol=Vol::all();
        $com=CompPart::all();
        $Rese=InfoReservation::all();
        $fcts=Fonction::all();
        $i=0;
        // dd($request);

        //PARTICIPANT
            $participant=new Participants;

            $participant->N_Passport=$request->N_Passport;
            $participant->Nom=$request->Nom;
            $participant->Prenom=$request->Prenom;
            $participant->IdFonction=$request->Fonction;
            $participant->Pays=$request->Pays   ;
            $participant->Nbr_Comp=$request->NbrComp;
            $participant->Transport=$request->Transport ? true :false;

                //VOL
                $vol=new Vol;
                $vol->N_Vol_Dep=$request->N_Vol_Dep;
                $vol->Date_Dep=$request->DateDepart;
                $vol->Heure_Dep=$request->HeureDepart;
                $vol->N_Vol_Arr=$request->N_Vol_Arr;
                $vol->Date_Arr=$request->DateArrivee;
                $vol->Heure_Arr=$request->HeureArrivee;
                $vol->save();

            $participant->IdVol=$vol->id;
            $participant->save();


        //Comp
        if($request->Comp){
            // dd('nice');
            foreach($request->Comp as $comp){
                $compagnon=new CompPart;
                $compagnon->IdPart=$participant->id;
                $compagnon->N_Passport=$comp['N_Passport'] ?? '';
                // $compagnon->N_Passport=5;
                $compagnon->Prenom=$comp['Prenom'] ?? '';
                $compagnon->Nom=$comp['Nom'] ?? '';

                $compagnon->IdFonction=$comp['Fonction'];
                $compagnon->Pays=$comp['Pays'] ?? '';
                $compagnon->Transport=$participant->Transport;
                    //VOL
                    $volComp=new Vol;
                    $volComp->N_Vol_Dep=$comp['N_Vol_Dep'];
                    $volComp->Date_Dep=$comp['DateDepart'];
                    $volComp->Heure_Dep=$comp['HeureDepart'];
                    $volComp->N_Vol_Arr=$comp['N_Vol_Arr'];
                    $volComp->Date_Arr=$comp['DateArrivee'];
                    $volComp->Heure_Arr=$comp['HeureArrivee'];
                    $volComp->save();

                $compagnon->IdVol=$volComp->id;

                $compagnon->save();

            }
        }

        //Reservation
         //Tanger
            //Single Room
                if($request->SRoomTng){
                    // dd('nice');
                    foreach($request->SRoomTng as $Room){
                        $SRoomTng=new InfoReservation;
                        $SRoomTng->IdPart=$participant->id;
                        $SRoomTng->City='Mövenpick';
                        $SRoomTng->Type='Single Room';
                        $SRoomTng->NbrRoom=$Room['Nbr_Room'];
                        $SRoomTng->From=$Room['From'];
                        $SRoomTng->To=$Room['To'];

                        $SRoomTng->save();

                    }
                }
            //Double Room
                if($request->DbRoomTng){
                    // dd('nice');
                    foreach($request->DbRoomTng as $Room){
                        $DbRoomTng=new InfoReservation;
                        $DbRoomTng->IdPart=$participant->id;
                        $DbRoomTng->City='Mövenpick';
                        $DbRoomTng->Type='Double Room';
                        $DbRoomTng->NbrRoom=$Room['Nbr_Room'];
                        $DbRoomTng->From=$Room['From'];
                        $DbRoomTng->To=$Room['To'];
                        $DbRoomTng->save();

                    }
                }



         //Fnideq
            //Single Room
                if($request->SRoomFndq){
                    // dd('nice');
                    foreach($request->SRoomFndq as $Room){
                        $SRoomFndq=new InfoReservation;
                        $SRoomFndq->IdPart=$participant->id;
                        $SRoomFndq->City=' Marina Smir';
                        $SRoomFndq->Type='Single Room';
                        $SRoomFndq->NbrRoom=$Room['Nbr_Room'];
                        $SRoomFndq->From=$Room['From'];
                        $SRoomFndq->To=$Room['To'];

                        $SRoomFndq->save();

                    }
                }
            //Double Room
                if($request->DbRoomFndq){
                    // dd('nice');
                    foreach($request->DbRoomFndq as $Room){
                        $DbRoomFndq=new InfoReservation;
                        $DbRoomFndq->IdPart=$participant->id;
                        $DbRoomFndq->City=' Marina Smir';
                        $DbRoomFndq->Type='Double Room';
                        $DbRoomFndq->NbrRoom=$Room['Nbr_Room'];
                        $DbRoomFndq->From=$Room['From'];
                        $DbRoomFndq->To=$Room['To'];
                        $DbRoomFndq->save();

                    }
                }
        return redirect()->route('AddForm_CG');
    }


    //WC

    public function AddForm_WC(){
        $fonctions =Fonction_WC::all();
        return view('WC.AddForm_WC')->with('fonctions',$fonctions);
    }

    public function sendForm_WC(Request $request){
            // dd($request);
            // $par=Participant_WC::all();
            // $vol=Vol::all();
            // $com=CompPart::all();
            // $Rese=InfoReservation::all();
            // $fcts=Fonction::all();
            $i=0;
            // dd($request);

            //PARTICIPANT
                $participant=new Participant_WC;

                $participant->N_Passport=$request->N_Passport;
                $participant->Nom=$request->Nom;
                $participant->Prenom=$request->Prenom;
                $participant->IdFonction=$request->Fonction;
                $participant->Pays=$request->Pays   ;
                $participant->Nbr_Comp=$request->NbrComp;
                $participant->Transport=$request->Transport ? true :false;

                    //VOL
                    $vol=new Vol;
                    $vol->N_Vol_Dep=$request->N_Vol_Dep;
                    $vol->Date_Dep=$request->DateDepart;
                    $vol->Heure_Dep=$request->HeureDepart;
                    $vol->N_Vol_Arr=$request->N_Vol_Arr;
                    $vol->Date_Arr=$request->DateArrivee;
                    $vol->Heure_Arr=$request->HeureArrivee;
                    $vol->save();

                $participant->IdVol=$vol->id;
                $participant->save();


            //Comp
            if($request->Comp){
                // dd('nice');
                foreach($request->Comp as $comp){
                    $compagnon=new Participant_WC;
                    $compagnon->IdSup=$participant->id;
                    $compagnon->N_Passport=$comp['N_Passport'] ?? '';
                    // $compagnon->N_Passport=5;
                    $compagnon->Prenom=$comp['Prenom'] ?? '';
                    $compagnon->Nom=$comp['Nom'] ?? '';

                    // $compagnon->IdSup=$participant->id;

                    $compagnon->IdFonction=$comp['Fonction'];
                    $compagnon->Pays=$comp['Pays'] ?? '';
                    $compagnon->Transport=$participant->Transport;
                        //VOL
                        $volComp=new Vol;
                        $volComp->N_Vol_Dep=$comp['N_Vol_Dep'];
                        $volComp->Date_Dep=$comp['DateDepart'];
                        $volComp->Heure_Dep=$comp['HeureDepart'];
                        $volComp->N_Vol_Arr=$comp['N_Vol_Arr'];
                        $volComp->Date_Arr=$comp['DateArrivee'];
                        $volComp->Heure_Arr=$comp['HeureArrivee'];
                        $volComp->save();

                    $compagnon->IdVol=$volComp->id;

                    $compagnon->save();

                }
            }

            //Reservation
            //Marina beach

                    if($request->App){
                        // dd('nice');
                        foreach($request->App as $App){
                            $newApp=new Reservation_Comp;
                            $newApp->IdPart=$participant->id;
                            $newApp->HotelName='Marina Beach';
                            $newApp->Type='Appartement';
                            $newApp->Nbr_Personne=$App['Nbr_Personne'];
                            $newApp->From=$App['From'];
                            $newApp->To=$App['To'];

                            $newApp->save();

                        }
                    }



            //Marina Smir
                //Single Room
                    if($request->SRoomSmir){
                        // dd('nice');
                        foreach($request->SRoomSmir as $Room){
                            $SRoomSmir=new Reservation_Comp;
                            $SRoomSmir->IdPart=$participant->id;
                            $SRoomSmir->HotelName='Marina Smir';
                            $SRoomSmir->Type='Single Room';
                            // $SRoomSmir->Nbr_Personne=null;
                            $SRoomSmir->From=$Room['From'];
                            $SRoomSmir->To=$Room['To'];

                            $SRoomSmir->save();

                        }
                    }
                //Double Room
                    if($request->DbRoomSmir){
                        // dd('nice');
                        foreach($request->DbRoomSmir as $Room){
                            $DbRoomSmir=new Reservation_Comp;
                            $DbRoomSmir->IdPart=$participant->id;
                            $DbRoomSmir->HotelName='Marina Smir';
                            $DbRoomSmir->Type='Double Room';
                            // $SRoomSmir->Nbr_Personne=null;
                            $DbRoomSmir->From=$Room['From'];
                            $DbRoomSmir->To=$Room['To'];
                            $DbRoomSmir->save();

                        }
                    }
            return redirect()->route('AddForm_WC');
        }










        public function Fonction(){
        $fonctions =Fonction::all();
        return view('Fonction')->with('fonctions',$fonctions);
    }


    public function EditForm_WC($id){

        $Par =Participant_WC::find($id);
        $Fcts =Fonction_WC::all();
        // dd($Par->Vol);
        return view('WC.EditForm_WC')->with(['Par'=>$Par,'Fcts'=>$Fcts]);
    }

public function UpdateForm_WC($id ,Request $request){
    $Par =Participant_WC::find($id);
    $idPar=$Par->id;
    // dd($request);


    //Update Participants
    $Par->N_Passport=$request->N_Passport;
    $Par->Nom=$request->Nom;
    $Par->Prenom=$request->Prenom;
    $Par->IdFonction=$request->Fonction;
    $Par->Pays=$request->Pays   ;
    $Par->Nbr_Comp=$request->NbrComp;
    $Par->Transport=$request->Transport ? true :false;
    $Par->save();
       //Update Vols
       $vol=$Par->Vol;
    //    dd($request);
    // dd($vol);
       $vol->N_Vol_Dep=$request->N_Vol_Dep ;
       $vol->Date_Dep=$request->DateDepart ;
       $vol->Heure_Dep=$request->HeureDepart ;
       $vol->N_Vol_Arr=$request->N_Vol_Arr  ;
       $vol->Date_Arr=$request->DateArrivee;
       $vol->Heure_Arr=$request->HeureArrivee;
       $vol->save();

    //Update Comp
    foreach ($request->UpdateComp as $idComp => $InfoComp) {
        $Comp =Participant_WC::find($idComp);
        $Comp->N_Passport=$InfoComp['N_Passport'] ?? '';
        $Comp->Prenom=$InfoComp['Prenom'] ?? '';
        $Comp->Nom=$InfoComp['Nom'] ?? '';
        $Comp->IdFonction=$InfoComp['Fonction'];
        $Comp->Pays=$InfoComp['Pays'] ?? '';
        $Comp->Transport=$Par->Transport;
        $Comp->save();

          //Update Vols
            $volComp=$Comp->Vol;
            $volComp->N_Vol_Dep=$InfoComp['N_Vol_Dep'];
            $volComp->Date_Dep=$InfoComp['Date_Dep'];
            $volComp->Heure_Dep=$InfoComp['Heure_Dep'];
            $volComp->N_Vol_Arr=$InfoComp['N_Vol_Arr'];
            $volComp->Date_Arr=$InfoComp['Date_Arr'];
            $volComp->Heure_Arr=$InfoComp['Heure_Arr'];
            $volComp->save();
    }

    //Add Comp
    if($request->Comp){
        foreach($request->Comp as $comp){
            $compagnon=new Participant_WC;
            $compagnon->IdSup=$Par->id;
            $compagnon->N_Passport=$comp['N_Passport'] ?? '';
            $compagnon->Prenom=$comp['Prenom'] ?? '';
            $compagnon->Nom=$comp['Nom'] ?? '';
            $compagnon->IdFonction=$comp['Fonction'];
            $compagnon->Pays=$comp['Pays'] ?? '';
            $compagnon->Transport=$Par->Transport;
                //VOL
                $volComp=new Vol;
                $volComp->N_Vol_Dep=$comp['N_Vol_Dep'];
                $volComp->Date_Dep=$comp['DateDepart'];
                $volComp->Heure_Dep=$comp['HeureDepart'];
                $volComp->N_Vol_Arr=$comp['N_Vol_Arr'];
                $volComp->Date_Arr=$comp['DateArrivee'];
                $volComp->Heure_Arr=$comp['HeureArrivee'];
                $volComp->save();

            $compagnon->IdVol=$volComp->id;

            $compagnon->save();

            }
    }

     //Delete Comp
     if ($request->DeleteComp) {
        foreach ($request->DeleteComp as $idComp) {

            $Par->AllComp->find($idComp)->Vol->delete();
            $Par->AllComp->find($idComp)->delete();

        }
    }


    //Add Reservation
        //Marina beach
            if($request->App){
            // dd('nice');
            foreach($request->App as $App){
                $newApp=new Reservation_Comp;
                $newApp->IdPart=$Par->id;
                $newApp->HotelName='Marina Beach';
                $newApp->Type='Appartement';
                $newApp->Nbr_Personne=$App['Nbr_Personne'];
                $newApp->From=$App['From'];
                $newApp->To=$App['To'];

                $newApp->save();

            }
            }

        //Marina Smir
            //Single Room
                if($request->SRoomSmir){
                    // dd('nice');
                    foreach($request->SRoomSmir as $Room){
                        $SRoomSmir=new Reservation_Comp;
                        $SRoomSmir->IdPart=$Par->id;
                        $SRoomSmir->HotelName='Marina Smir';
                        $SRoomSmir->Type='Single Room';
                        // $SRoomSmir->Nbr_Personne=null;
                        $SRoomSmir->From=$Room['From'];
                        $SRoomSmir->To=$Room['To'];

                        $SRoomSmir->save();

                    }
                }
            //Double Room
                if($request->DbRoomSmir){
                    // dd('nice');
                    foreach($request->DbRoomSmir as $Room){
                        $DbRoomSmir=new Reservation_Comp;
                        $DbRoomSmir->IdPart=$Par->id;
                        $DbRoomSmir->HotelName='Marina Smir';
                        $DbRoomSmir->Type='Double Room';
                        // $SRoomSmir->Nbr_Personne=null;
                        $DbRoomSmir->From=$Room['From'];
                        $DbRoomSmir->To=$Room['To'];
                        $DbRoomSmir->save();

                    }
                }



    //Delete Reservation
    if ($request->DeleteRes) {
        // dd(count($request->DeleteRes));
        foreach ($request->DeleteRes as $idRes) {
            $res=$Par->AllRes->find($idRes);
            $res->delete();

        }
    }






    return back()->with('success', 'Formulaire Modifier Avec Succès');
}







    public function AddFonction(Request $request){
        // dd($request);
        $fonction=new Fonction;
        $fonction->label=$request->Fonction;
        $fonction->color=$request->Color;
        $fonction->save();

        return view('Fonction');
    }

    public function Facture_CG($id){
        $Par =Participants::find($id);
        $a = Carbon::parse('2022-2-28');
        $b = Carbon::parse('2022-03-1');
        $now = new Carbon();

        $diff = $a->diffInDays($b);
        // dd($diff);


        return view('Facture_CG')->with('Par',$Par);
    }
    public function Facture_WC($id){
            $Par =Participant_WC::find($id);
            // $a = Carbon::parse('2022-2-28');
            // $b = Carbon::parse('2022-03-1');
            // $now = new Carbon();

            // $diff = $a->diffInDays($b);
            // dd($diff);


            return view('WC.Facture_WC')->with('Par',$Par);
        }


}
