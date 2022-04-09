<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quizzes List') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <a href="{{ route('quizzes.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-600 active:bg-indigo-600 focus:outline-none focus:border-indigo-600 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">
                   {{ __('Add Quiz') }}
                </a>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-x-auto border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr class="border-b">
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('ID') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Name') }}
                                    </th>
                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($quizzes as $quiz)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $quiz->id }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $quiz->name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('quizzes.show', $quiz->id) }}" class="font-semibold text-green-600 mb-2 mr-2">View</a>
                                            <a href="{{ route('quizzes.edit', $quiz->id) }}" class="font-semibold text-indigo-700 mb-2 mr-2">Edit</a>
                                            <form class="inline-flex" action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST"
                                                x-data="{submit(){swal({title:'Are you sure?',text:'Once deleted, you will not be able to recover this data!',icon:'warning',buttons:!0,dangerMode:!0}).then(t=>{t&&$root.submit()})}}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <!-- <input type="submit" class="text-red-600 mb-2 mr-2" value="Delete"> -->
                                                <a class="font-semibold text-red-600 mb-2 mr-2" href="{{ route('quizzes.destroy', $quiz->id) }}" @click.prevent="submit();">Delete</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div
                        class="py-2 align-middle inline-block min-w-full">
                            {{ $quizzes->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
