@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Messages</h1>
            <a href="{{ route('admin.dashboard') }}"
                class="mt-4 md:mt-0 bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">
                Back to Dashboard
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Subject</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($messages as $message)
                            <tr class="{{ $message->is_read ? '' : 'bg-indigo-50' }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">{{ $message->first_name }}
                                        {{ $message->last_name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-gray-500">{{ $message->email }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-gray-900">{{ $message->subject }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-gray-500">{{ $message->created_at->format('M d, Y') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $message->is_read ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $message->is_read ? 'Read' : 'Unread' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button type="button" class="text-indigo-600 hover:text-indigo-900"
                                        onclick="toggleMessageDetails({{ $message->id }})">View</button>
                                    @if (!$message->is_read)
                                        <form action="{{ route('admin.messages.mark-read', $message->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            <button type="submit" class="ml-3 text-green-600 hover:text-green-900">Mark as
                                                Read</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            <tr id="message-details-{{ $message->id }}" class="hidden bg-gray-50">
                                <td colspan="6" class="px-6 py-4">
                                    <div class="text-sm text-gray-900 mb-2"><strong>Message:</strong></div>
                                    <div class="text-sm text-gray-700 whitespace-pre-line">{{ $message->message }}</div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                    No messages found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4">
                {{ $messages->links() }}
            </div>
        </div>
    </div>

    <script>
        function toggleMessageDetails(id) {
            const detailsRow = document.getElementById(`message-details-${id}`);
            if (detailsRow.classList.contains('hidden')) {
                detailsRow.classList.remove('hidden');
            } else {
                detailsRow.classList.add('hidden');
            }
        }
    </script>
@endsection
