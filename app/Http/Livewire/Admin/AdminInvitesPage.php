<?php

namespace App\Http\Livewire\Admin;

use App\Model\Invite;
use Livewire\Component;
use Str;

class AdminInvitesPage extends Component
{
    private $invites;

    public $max_count_register;

    public $is_frozen;

    public $note;

    public $showEditForm;

    public $editInviteId;

    public function mount()
    {
    	$this->max_count_register = 1;
    	$this->is_frozen = false;
    }

    public function create_invite()
    {
        $this->validate([
            'max_count_register' => ['required', 'numeric', 'min:1']
        ]);

        $invite = new Invite();
        $invite->max_count_register = $this->max_count_register;
        $invite->invite_symbols = Str::random(12);
        $invite->note = $this->note;
        $invite->save();

        $this->dispatchBrowserEvent("invite-created");
    }

    public function show_edit_form($inviteId)
    {
        $invite = Invite::query()->where("id", $inviteId)->firstOrFail();
        $this->editInviteId = $inviteId;
        $this->max_count_register = $invite->max_count_register;
        $this->is_frozen = $invite->is_frozen;
        $this->note = $invite->note;
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
            'max_count_register' => ['required', 'numeric', 'min:1'],
            'is_frozen' => ['required', 'boolean']
        ]);
        $invite = Invite::query()->where("id", $this->editInviteId)->firstOrFail();
        $invite->max_count_register = $this->max_count_register;
        $invite->is_frozen = $this->is_frozen;
        $invite->note = $this->note;
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
