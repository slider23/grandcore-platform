<div
    x-data="{show_modal_create_invite: false, show_create_loader: false, show_edit_loader: false}"
    x-on:invite-created.window="show_modal_create_invite = false; "
    x-on:invite-edited.window="show_modal_edit_invite = false; "
>

    <h1 class="text-4xl font-bold mb-8">Инвайты</h1>

    <button @click="show_modal_create_invite = true" class="button mb-8">
        Создать инвайт
    </button>

    <div class="flex flex-col">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider w-32">
                            Создан
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider w-32">
                            Регистраций
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider w-24">
                            Заморожен
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider max-w-md">
                            Зарегистрированные пользователи
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 w-16"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach($invites as $invite)
                        <tr wire:key="{{ $loop->index }}" x-data="{show_loader: false}" x-on:edit-form-showed.window="show_loader = false;">
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm">
                                {{$invite->created_at->format("d.m.Y H:i")}}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                @if($invite->registered_users->count() == 0)
                                    <span class="px-2 inline-flex text-sm leading-5 font-semibold text-gray-800">{{$invite->registered_users->count()}}/{{$invite->max_count_register}}</span>
                                @elseif($invite->registered_users->count() >= $invite->max_count_register)
                                    <span
                                        class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">{{$invite->registered_users->count()}}/{{$invite->max_count_register}}</span>
                                @else
                                    <span
                                        class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{$invite->registered_users->count()}}/{{$invite->max_count_register}}</span>
                                @endif

                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                @if($invite->is_frozen)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Да
                                </span>
                                @else
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Нет
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                @foreach($invite->registered_users as $user)
                                    <span class="mr-2">{{$user->email}}</span>
                                @endforeach
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                <span wire:click="show_edit_form({{$invite->id}})" @click="show_loader = true;" :class="{ 'spinner': show_loader === true }" class="text-blue-600 hover:text-blue-900 cursor-pointer">Edit</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$invites->links()}}
            </div>
        </div>
    </div>


    <div x-show="show_modal_create_invite" style="display: none">
        <div class="fixed bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div
                class="bg-white rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full sm:p-6"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="sm:flex sm:items-start">
                    <div
                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                            Создание инвайта:
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm leading-5 text-gray-500 mt-2">Максимальное количество регистраций:</p>
                            <input type="text" wire:model="maxRegistrations"
                                   class="form-input @error('maxRegistrations') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror"/>
                            @error('maxRegistrations')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-4 sm:ml-10 sm:pl-4 sm:flex">
                    <span class="flex w-full rounded-md shadow-sm sm:w-auto">
                        <button wire:click="create_invite" @click="show_create_loader = true"
                                :class="{ 'spinner': show_create_loader === true }"
                                type="button" class="button-success">
                          Создать инвайт
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:ml-3 sm:w-auto">
                        <button @click="show_modal_create_invite = false" type="button" class="button">
                          Отмена
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>

    @if($showEditForm)
    <div>
        <div class="fixed bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div
                class="bg-white rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full sm:p-6"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="sm:flex sm:items-start">
                    <div
                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                            Редактирование инвайта
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm leading-5 text-gray-500 mt-2">Максимальное количество регистраций:</p>
                            <input type="text" wire:model="maxRegistrations"
                                   class="form-input @error('maxRegistrations') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror"/>
                            @error('maxRegistrations')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-2 flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="froze_invite" wire:model="isFrozen" type="checkbox"
                                       class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out">
                                <label for="froze_invite" class="ml-2 block text-sm leading-5 text-gray-900">
                                    заморозить инвайт и запретить по нему регистрацию
                                </label>
                            </div>
                            @error('isFrozen')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-5 sm:mt-4 sm:ml-10 sm:pl-4 sm:flex">
                        <span class="flex w-full rounded-md shadow-sm sm:w-auto">
{{--                            <button wire:click="edit_invite"
                                        @click="show_edit_loader = true" :class="{ 'spinner': show_edit_loader === true }"
                                    type="button" class="button-success">--}}
{{--                              Сохранить--}}
{{--                            </button>                            --}}
                            <button wire:click="edit_invite" wire:target="edit_invite" wire:loading.class="spinner"
                                    type="button" class="button-success">
                              Сохранить
                            </button>
                        </span>
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:ml-3 sm:w-auto">
                            <button wire:click="close_edit_form" type="button" class="button">
                              Отмена
                            </button>
                        </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endif

</div>
