<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Question') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form
                    method="post"
                    action="{{ route('questions.store') }}"
                    x-data="{
                        type : '{{ old('type') }}',
                        name : '{{ old('name') }}',
                        choice_1 : '{{ old('choice_1') }}',
                        choice_2 : '{{ old('choice_2') }}',
                        choice_3 : '{{ old('choice_3') }}',
                        choice_4 : '{{ old('choice_4') }}',
                        answer : '{{ old('answer') }}'
                    }"
                >
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="type" class="block font-medium text-sm text-gray-700">{{ __('Type') }}</label>
                            <select
                                name="type"
                                id="type"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                x-model="type"
                            >
                                @foreach($types as $type)
                                    <option value="{{ $type }}">
                                    @if($type == 'yes-or-no')
                                        {{ __('Yes or No') }}
                                    @elseif($type == 'multiple-choice')
                                        {{ __('Multiple Choice') }}
                                    @endif
                                    </option>
                                @endforeach
                            </select>
                            @error('type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Question Name') }}</label>
                            <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                   x-model="name" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="choice_1" class="block font-medium text-sm text-gray-700">{{ __('Choice 1') }}</label>
                            <input type="text" name="choice_1" id="choice_1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                   x-model="choice_1" />
                            @error('choice_1')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="choice_2" class="block font-medium text-sm text-gray-700">{{ __('Choice 2') }}</label>
                            <input type="text" name="choice_2" id="choice_2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                   x-model="choice_2" />
                            @error('choice_2')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6" x-show="type == 'multiple-choice'">
                            <label for="choice_3" class="block font-medium text-sm text-gray-700">{{ __('Choice 3') }}</label>
                            <input type="text" name="choice_3" id="choice_3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                   x-model="choice_3" />
                            @error('choice_3')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6" x-show="type == 'multiple-choice'">
                            <label for="choice_4" class="block font-medium text-sm text-gray-700">{{ __('Choice 4') }}</label>
                            <input type="text" name="choice_4" id="choice_4" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                   x-model="choice_4" />
                            @error('choice_4')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="answer" class="block font-medium text-sm text-gray-700">{{ __('Answer') }}</label>
                            <select
                                name="answer"
                                id="answer"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                x-model="answer"
                            >
                                <option value="1">{{ __('Choice 1') }}</option>
                                <option value="2">{{ __('Choice 2') }}</option>
                                <option value="3" x-show="type == 'multiple-choice'">{{ __('Choice 3') }}</option>
                                <option value="4" x-show="type == 'multiple-choice'">{{ __('Choice 4') }}</option>
                            </select>
                            @error('answer')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>