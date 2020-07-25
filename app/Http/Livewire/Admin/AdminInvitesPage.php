<?php

namespace App\Http\Livewire\Admin;

use App\Model\Invite;
use Livewire\Component;
use Str;

class AdminInvitesPage extends Component
{
    private $invites;

    public $maxRegistrations;

    public $isFrozen;

    public $showEditForm;

    public $editInviteId;

    public function mount()
    {
    	$this->maxRegistrations = 1;
    	$this->isFrozen = false;
    }

    public function create_invite()
    {
        $this->validate([
            'maxRegistrations' => ['required', 'numeric', 'min:1']
        ]);

        $invite = new Invite();
        $invite->max_count_register = $this->maxRegistrations;
        $invite->invite_symbols = Str::random(12);
        $invite->save();

        $this->dispatchBrowserEvent("invite-created");
    }

    public function show_edit_form($inviteId)
    {
        $invite = Invite::query()->where("id", $inviteId)->firstOrFail();
        $this->editInviteId = $inviteId;
        $this->maxRegistrations = $invite->max_count_register;
        $this->isFrozen = $invite->is_frozen;
        $this->showEditForm = true;

        $this->dispatchBrowserEvent("edit-form-showed");
    }

    public function close_edit_form()
    {
        $this->showEditForm = false;
    }

    public function edit_invite()
    {
        $this->validate([
            'maxRegistrations' => ['required', 'numeric', 'min:1'],
            'isFrozen' => ['required', 'boolean']
        ]);
        $invite = Invite::query()->where("id", $this->editInviteId)->firstOrFail();
        $invite->max_count_register = $this->maxRegistrations;
        $invite->is_frozen = $this->isFrozen;
        $invite->save();
        $this->close_edit_form();
        $this->dispatchBrowserEvent("invite-edited");
    }

    public function render()
    {
        $this->invites = Invite::query()->orderBy("created_at", "desc")->paginate();
        return view('livewire.admin.admin-invites-page', [
            'invites' => $this->invites
        ]);
    }
}
