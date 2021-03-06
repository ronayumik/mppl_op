<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Assistant\CreateAssistantRequest;
use App\Repositories\AssistantRepository;
use App\Repositories\UserRepository;

class AssistantController extends Controller
{
    public $modelName = 'assistant';

    /**
     * UserRepository dependency
     */
    protected $userRepository;

    /**
     * AssistantRepository dependency
     */
    protected $modelRepository;

    /**
     * Create a new Assistant controller instance.
     *
     * @param   AssistantRepository Repository to access App\Models\Assistant
     * @param   UserRepository Repository to access App\Models\Users
     * @return  void
     */
    public function __construct(AssistantRepository $assistantRepository, UserRepository $userRepository)
    {
        $this->modelRepository = $assistantRepository;

        $this->userRepository = $userRepository;
    }

    /**
     * Show form to create a new instance
     */
    protected function create()
    {
        $users = $this->userRepository->findAll();

        $stringView = 'pages.'.$this->modelName.'.create';

        return view($stringView, compact('users'));
    }

    /**
     * Create a new student instance
     *
     * @param  CreateAssistantRequest  $request
     */
    protected function store(CreateAssistantRequest $request)
    {
        $data = $request->all();

        $this->modelRepository->create($data);

        return redirect()->back()->with('assistantAdded', 'ok');
    }

    /**
     * Delete the spcified user instance from database
     * 
     * @param  int $id assistant_id
     */
    protected function destroy($id)
    {
        $this->modelRepository->delete($id);

        return redirect()->back()->with('assistantDeleted', 'ok');
    }
}
