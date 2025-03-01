
@extends('layouts.app')

@section('content')
<div class="py-16 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 md:px-6">
        <div class="bg-white shadow-md rounded-lg p-6 animate-fade-in">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Dashboard</h1>
            
            <div class="bg-streamline-50 border border-streamline-200 rounded-lg p-6 mb-6">
                <h2 class="text-lg font-semibold text-streamline-800 mb-2">Welcome, {{ Auth::user()->name }}!</h2>
                <p class="text-streamline-600">You've successfully logged into your StreamLine account.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="font-medium text-gray-800 mb-2">Your Projects</h3>
                    <p class="text-gray-600 text-sm">You have 0 active projects</p>
                </div>
                
                <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="font-medium text-gray-800 mb-2">Tasks</h3>
                    <p class="text-gray-600 text-sm">You have 0 pending tasks</p>
                </div>
                
                <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="font-medium text-gray-800 mb-2">Messages</h3>
                    <p class="text-gray-600 text-sm">You have 0 unread messages</p>
                </div>
            </div>
            
            <div class="mt-8 flex justify-end">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 transition-colors">
                        Sign Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
