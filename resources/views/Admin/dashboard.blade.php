<!-- resources/views/admin/dashboard.blade.php -->
@extends('Admin.Layouts.layouts')

@section('content')
<div class="flex space-x-6">
    <!-- Category Count -->
    <div class="bg-white shadow-lg rounded-lg p-4 flex items-center space-x-4">
        <div class="bg-blue-500 text-white p-3 rounded-full">
            <i class="fas fa-list"></i> <!-- FontAwesome List Icon -->
        </div>
        <div>
            <p class="text-gray-700 text-lg font-bold">Categories</p>
            <p class="text-2xl font-bold">{{ $categoryCount }}</p>
        </div>
    </div>

    <!-- Tag Count -->
    <div class="bg-white shadow-lg rounded-lg p-4 flex items-center space-x-4">
        <div class="bg-green-500 text-white p-3 rounded-full">
            <i class="fas fa-tags"></i> <!-- FontAwesome Tags Icon -->
        </div>
        <div>
            <p class="text-gray-700 text-lg font-bold">Tags</p>
            <p class="text-2xl font-bold">{{ $tagCount }}</p>
        </div>
    </div>
</div>
@endsection
