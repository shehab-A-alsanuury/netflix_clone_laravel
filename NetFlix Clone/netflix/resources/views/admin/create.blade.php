@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Create Movie</h1>

        <form action="{{ route('admin.movies.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                       value="{{ old('title') }}" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" 
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="release_date" class="block text-sm font-medium text-gray-700">Release Date</label>
                <input type="date" name="release_date" id="release_date" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                       value="{{ old('release_date') }}" required>
                @error('release_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="duration" class="block text-sm font-medium text-gray-700">Duration (minutes)</label>
                <input type="number" name="duration" id="duration" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                       value="{{ old('duration') }}" required>
                @error('duration')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Genres</label>
                <div class="mt-2 space-y-2">
                    @foreach($genres as $genre)
                        <div class="flex items-center">
                            <input type="checkbox" name="genre_ids[]" 
                                   value="{{ $genre->id }}" 
                                   id="genre_{{ $genre->id }}"
                                   class="rounded border-gray-300 text-blue-600 shadow-sm">
                            <label for="genre_{{ $genre->id }}" 
                                   class="ml-2 text-sm text-gray-700">
                                {{ $genre->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('genre_ids')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.movies.index') }}" 
                   class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create Movie
                </button>
            </div>
        </form>
    </div>
</div>
@endsection