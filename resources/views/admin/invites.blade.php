@extends('layouts.app') @section('content')

<div class="create-invite-block">
  <a href="#" role="button" class="btn btn-primary create-invite">Создать инвайт</a>
</div>

<br>

<ul class="invites-head">
  <li>№</li>
  <li>Осталось регистраций</li>
  <li>Invite код</li>
  <li>Заморожено</li>
  <li>Дата создания</li>
</ul>


  @foreach ($invites as $invite)
  <ul class="invites">
    <li>{{$invite->id}}<li>
    <li>{{$invite->max_count_register}}<li>
    <li>{{$invite->invite_symbols}}<li>
    <li>
    
    @if ($invite->is_frozen)
      <input type="checkbox" checked />
    @else
      <input type="checkbox"  />
    @endif
    <li>{{$invite->created_at}}<li>
    </ul>
  @endforeach


<div class="modal fade" id="createInviteModal" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-body">
              <form method="POST" action="/invites">
                  {!! csrf_field() !!}
                  <div class="form-group">
                      <label>Invite code</label>
                      <input
                          type="text"
                          name="inviteCode"
                          class="form-control"
                          required
                          placeholder="Enter invite Code"
                      />
                      <p class="generate-invite">Generate invite code</p>
                  </div>
                  <div class="form-group">
                      <label>Max count register</label>
                      <input
                          type="number"
                          name="maxCountRegister"
                          class="form-control"
                          required
                          placeholder="Enter max count register"
                      />
                  </div>

                  <button type="submit" class="btn btn-primary">
                      Создать
                  </button>
              </form>
          </div>
      </div>
  </div>
</div>

<script>
  const generateCodeButton = document.querySelector('.generate-invite').addEventListener('click', () => {
    alert('Generate code');
  });
</script>

@endsection
