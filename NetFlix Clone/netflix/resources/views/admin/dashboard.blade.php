@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Admin Dashboard</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Movies Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Movies</h2>
                    <p class="text-3xl font-bold">{{ $stats['movies'] }}</p>
                </div>
                <a href="{{ route('admin.movies.index') }}" class="text-blue-500 hover:text-blue-700">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h18M3 16h18"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Similar cards for Genres, Actors, and Categories -->
        <!-- ... -->
    </div>
</div>
@endsection