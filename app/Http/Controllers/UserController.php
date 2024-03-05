<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\ { UserRepository, LogementRepository, MessageRepository };

use App\Notifications\MessageLogementNotification;
use App\Http\Requests\MessageLogementRequest;  
use App\Notifications\ {LogementApprove, LogementRefuse};
use App\Http\Requests\MessageRefuse as MessageRefuseRequest;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\User;


class UserController extends Controller
{
    protected $nbrPerPage = 25;
    protected $userRepository;
    protected $logementRepository;
    protected $messageRepository;


    public function __construct(UserRepository $userRepository, LogementRepository $logementRepository, MessageRepository $messageRepository)
    {
        $this->userRepository = $userRepository; 
        $this->logementRepository = $logementRepository;  
        $this->messageRepository = $messageRepository;
    }  

    // Afficher le tableau de bord
    public function index(Request $request){
        // Logements non actifs  
        $adModerationCount = $this->logementRepository->noActiveCount();
        // Logements obsolètes
        $adPerimesCount = $this->logementRepository->obsoleteCount();
        // Message à modérer
        $messageModerationCount = $this->messageRepository->count();

        // Récupérer les logements d'un utilisateur
        $logements = $this->logementRepository->getByUser($request->user());
        // Logements en attente d'activation
        $adAttenteCount = $this->logementRepository->noActiveCount($logements);
        // Logements actifs
        $adActivesCount = $this->logementRepository->activeCount($logements);
        // Logement obsolète
        $addPerimesCount = $this->logementRepository->obsoleteCount($logements);

        return view('user.index', compact('adModerationCount', 'messageModerationCount', 'adPerimesCount', 'adActivesCount', 'addPerimesCount', 'adAttenteCount'));
    }

    // Fonction permettant de récupérer la liste des logements à modérer
    public function moderer()
    {
        $adModeration = $this->logementRepository->noActive(10);
        return view('user/logements-a-moderer', compact('adModeration'));
    }

    // Fonction permettant d'approuver un logement
    public function approve(Request $request, Logement $logement)
    {  
        $this->logementRepository->approve($logement);
        $request->session()->flash('status', "Le logement a bien été approuvé et le rédacteur va être notifié.");
        $logement->notify(new LogementApprove($logement));
        return response()->json(['id' => $logement->id]);
    }

    // Fonction permettant de refuser un logement
    public function refuse(MessageRefuseRequest $request)
    {
        $logement = $this->logementRepository->getById($request->id);
        $logement->notify(new LogementRefuse($request->message));
        $this->logementRepository->delete($logement);
        $request->session()->flash('status', "L'annonce a bien été refusée et le rédacteur va être notifié.");
        return response()->json(['id' => $logement->id]);
    }

    // 
    public function destroy(Request $request, Logement $logement)
    {
        $this->authorize('manage', $logement);
        $this->logementRepository->delete($logement);
        $request->session()->flash('status', "Le logement a bien été supprimé.");
        return response()->json();
    }

    


    

    // Récupérer la liste des logements obsolètes
    public function obsoletes()
    {
        $logements = $this->logementRepository->obsolete(5);
        return view('user.logements-obsoletes', compact('logements'));
    }

    //
    public function addWeek(Request $request, Logement $logement)
    {
        $this->authorize('manage', $logement);
        $limit = $this->logementRepository->addWeek($logement);
        return response()->json([
            'limit' => $limit->format('d-m-Y'),
            'ok' => $limit->greaterThan(Carbon::now()),
        ]);
    }

    // Envoyer un message à celui qui publié une annonce
    public function message(MessageLogementRequest $request)
    {
        $logement = $this->logementRepository->getById($request->id);

        if(auth()->check()) {
            $logement->notify(new MessageLogementNotification($logement, $request->message, auth()->user()->email));
            return response()->json(['info' => 'Votre message va être rapidement transmis.']);
        }

        $this->messageRepository->create([
            'texte' => $request->message,
            'email' => $request->email,
            'logement_id' => $logement->id,
        ]);
        return response()->json(['info' => 'Votre message a été mémorisé et sera transmis après modération.']);
    }

    // 
    public function messages()
    {
        $messages = $this->messageRepository->all(5);
        return view('user.messages-en-attente', compact('messages'));
    }

    // Approuver un message
    public function messageApprove(Request $request, Message $message)
    {
        $logement = $this->messageRepository->getLogement($message);
        $logement->notify(new MessageApprove($logement, $message));
        $this->messageRepository->delete($message);
        $request->session()->flash('status', "Le message a bien été approuvé et le rédacteur va être notifié.");
        return response()->json(['id' => $message->id]);
    }

    // Refuser un message
    public function MessageRefuse(MessageRefuseRequest $request)
    {
        $message = $this->messageRepository->getById($request->id);
        $logement = $this->messagerepository->getLogement($message);
        $logement->notify(new MessageRefuse($logement, $message, $request->message));
        $this->messagerepository->delete($message);
        $request->session()->flash('status', "Le message a bien été refusé et le rédacteur va être notifié.");
        return response()->json(['id' => $logement->id]);
    }

    // Récupérer les logements actifs
    public function actives(Request $request)
    {
        $logements = $this->logementRepository->active($request->user(), 5);
        return view('user.actives', compact('logements'));
    }

    // Afficher la liste des utilisateurs
    public function allUsers()
    {
        $users = $this->userRepository->getPaginate($this->nbrPerPage);
        $links = $users->render();
        return view('user/tous-les-utilisateurs', compact('users', 'links'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->middleware('auth');
        //$this->middleware('permission:user.create');
        $roles = Role::get();
        return view('user/ajouter', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {     
        $user = $this->userRepository->store($request->all());
        //$user->assignRole($request->input('roles'));
        return redirect('user/all');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->getById($id);
        return view('user/afficher-utilisateur',  compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
