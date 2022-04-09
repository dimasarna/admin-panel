<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Group') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            <div class="py-2 mb-4 align-middle inline-block min-w-full">
                <a href="{{ route('groups.index') }}" class="bg-gray-200 hover:bg-gray-100 text-black font-bold py-2 px-4 rounded">{{ __('Back to list') }}</a>
            </div>
            <div class="md:grid md:grid-cols-2 md:gap-6">
                <div class="mt-0 md:col-span-1">
                    <form
                        action="{{
                            route('group_user.update', [
                                'group_user' => $group->id,
                                'users_page' => $users->currentPage(),
                                'quizzes_page' => $quizzes->currentPage()
                            ])
                        }}"
                        method="post"
                        x-data="{
                            users : @json( $group->users->pluck('id')->toArray() )
                        }"
                    >
                        @csrf
                        @method('put')
                        <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <fieldset>
                            <legend class="text-base font-semibold text-gray-900">{{ __('By User') }}</legend>
                            <div class="mt-4 space-y-1">
                                @foreach ($users as $user)
                                    <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input
                                            type="hidden"
                                            name="users[]"
                                            value="{{ $user->id }}"
                                        >
                                        <input
                                            id="users.{{ $user->id }}"
                                            name="selected_users[]"
                                            type="checkbox"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            value="{{ $user->id }}"
                                            x-model="users">
                                    </div>
                                    <div class="inline-flex ml-3 text-sm">
                                        <label for="users.{{ $user->id }}" class="font-semibold text-gray-700">{{ $user->name }}</label>
                                        <p class="text-gray-500 ml-1">{{ $user->email }}</p>
                                    </div>
                                    </div>
                                @endforeach
                            </div>
                            </fieldset>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">{{ __('Save') }}</button>
                        </div>
                        </div>
                    </form>
                    <div
                    class="py-2 align-middle inline-block min-w-full">
                        {{ $users->appends(['quizzes_page' => $quizzes->currentPage()])->links() }}
                    </div>
                </div>

                <div class="mt-4 md:mt-0 md:col-span-1">
                    <form
                        action="{{
                            route('group_quiz.update', [
                                'group_quiz' => $group->id,
                                'users_page' => $users->currentPage(),
                                'quizzes_page' => $quizzes->currentPage()
                            ])
                        }}"
                        method="post"
                        x-data="{
                            quizzes : @json( $group->quizzes->pluck('id')->toArray() )
                        }"
                    >
                        @csrf
                        @method('put')
                        <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <fieldset>
                            <legend class="text-base font-semibold text-gray-900">{{ __('By Quiz') }}</legend>
                            <div class="mt-4 space-y-1">
                                @foreach ($quizzes as $quiz)
                                    <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input
                                            type="hidden"
                                            name="quizzes[]"
                                            value="{{ $quiz->id }}"
                                        >
                                        <input
                                            id="quizzes.{{ $quiz->id }}"
                                            name="selected_quizzes[]"
                                            type="checkbox"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            value="{{ $quiz->id }}"
                                            x-model="quizzes">
                                    </div>
                                    <div class="inline-flex ml-3 text-sm">
                                        <label for="quizzes.{{ $quiz->id }}" class="font-semibold text-gray-700">{{ $quiz->name }}</label>
                                    </div>
                                    </div>
                                @endforeach
                            </div>
                            </fieldset>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">{{ __('Save') }}</button>
                        </div>
                        </div>
                    </form>
                    <div
                    class="py-2 align-middle inline-block min-w-full">
                        {{ $quizzes->appends(['users_page' => $users->currentPage()])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
