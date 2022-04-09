<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Question') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <a href="{{ route('questions.index') }}" class="bg-gray-200 hover:bg-gray-100 text-black font-bold py-2 px-4 rounded">{{ __('Back to list') }}</a>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <tr class="border-b">
                                    <th scope="row" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('ID') }}
                                    </th>
                                    <td class="w-3/4 px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $question->id }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="row" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Question Name') }}
                                    </th>
                                    <td class="w-3/4 px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $question->name }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="row" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Choice 1') }}
                                    </th>
                                    <td class="w-3/4 px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $question->choice_1 }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="row" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Choice 2') }}
                                    </th>
                                    <td class="w-3/4 px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $question->choice_2 }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="row" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Choice 3') }}
                                    </th>
                                    <td class="w-3/4 px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $question->choice_3 ?? '-' }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="row" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Choice 4') }}
                                    </th>
                                    <td class="w-3/4 px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $question->choice_4 ?? '-' }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="row" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Answer') }}
                                    </th>
                                    <td class="w-3/4 px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $question->answer }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="row" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Type') }}
                                    </th>
                                    <td class="w-3/4 px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-500 text-white">
                                        @if($question->type == 'yes-or-no')
                                            {{ __('yes-no') }}
                                        @elseif($question->type == 'multiple-choice')
                                            {{ __('multiple') }}
                                        @endif
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
